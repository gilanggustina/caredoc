<?php

namespace App\Http\Controllers\frontend\illness;

use App\Http\Controllers\Controller;
use App\Models\Illness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class illnessC extends Controller
{
    public function index(Request $request){
        $illnesses = Illness::where(function($q) use ($request){
            if(isset($request->keyword)){
                $q->where('name','like',DB::raw("'%$request->keyword%'"));
            }
        })->paginate(20);
        return view('frontend.illness.index',compact('illnesses'));
    }

    public function detail($id){
        $illness = Illness::find($id);
        return view('frontend.illness.detail',compact('illness'));
    }

}
