<?php

namespace App\Http\Controllers\Illness;

use App\Http\Controllers\Controller;
use App\Models\Illness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IllnessC extends Controller
{
    public function index(Request $request){
        $illnesses = Illness::where(function($q) use ($request){
            if($request->kunci){
                $q->where("name","like",DB::raw("'%$request->kunci%'"))
                ->OrWhere("reason","like",DB::raw("'%$request->kunci%'"))
                ->OrWhere("symptom","like",DB::raw("'%$request->kunci%'"))
                ->OrWhere("description","like",DB::raw("'%$request->kunci%'"));
            }
        })->get();
        return view('backend.illness.index', compact('illnesses'));

    }

    public function create(Request $request){
        $illness = Illness::find($request->id);
        return view('backend.illness.create', compact('illness'));
    }

    public function action(Request $request){
        $request->validate([
            'id'            => ['nullable','exists:illnesses,id'],
            'name'          => ['required','string'],
            'description'   => ['required','string'],
            'symptom'       => ['required','string'],
            'reason'        => ['required','string'],
            'treatment'     => ['required','string'],
            'file'          => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
        // Handle file upload
        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $customFileName = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Generate a custom name using UUID
            // $filePath = $file->storeAs('images', $customFileName, 's3'); // Save to S3 bucket in the 'images' folder with custom name
            $filePath = $file->storeAs('public/images',$customFileName); // Save to storage/app/public/images
            $fileName = basename($filePath);
        }
        // Find the illness record if it exists
        $illness = Illness::find($request->id);

        // Prepare the data to be inserted or updated
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'symptom' => $request->symptom,
            'reason' => $request->reason,
            'treatment' => $request->treatment,
        ];

        // Only update the image if a new one was uploaded
        if ($fileName) {
            // Delete the old image if a new one is being uploaded
            if ($illness && $illness->image_name) {
                Storage::delete('public/images/' . $illness->image_name);
                // Storage::disk('s3')->delete('images/' . $illness->image_name);
            }
            $data['image_name'] = $fileName;
        }

        // Update or create the record
        Illness::updateOrCreate(
            ['id' => $request->id], // Search criteria
            $data // Data to update or create
        );
        return redirect()->route('backend.illness.index')->with('success', 'Data '.isset($request->id) ? 'edited' : 'saved'.' successfully!');
    }

    public function delete($id){
        $illness = Illness::findOrFail($id);
        if($illness && $illness->image_name){
            Storage::delete('public/images/' . $illness->image_name);
            // Storage::disk('s3')->delete('images/' . $illness->image_name);
        }
        $illness->delete();

        return redirect()->route("backend.illness.index")->with('success', 'Data deleted successfully!');

    }
}
