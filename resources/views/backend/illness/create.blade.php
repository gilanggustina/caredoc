@extends('template.backend.template')
@section('content')
  <center>
        <font size="6">{{isset($illness) ? 'Edit' : 'Tambah'}} Data</font>
  </center>
  <hr>
  <form action="{!! route('backend.illness.action') !!}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($illness)
      <input type="hidden" name="id" value="{{$illness->id}}">
    @endif
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="name" value="{{$illness->name ?? ''}}" class="form-control" required>
                @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="description" value="{{$illness->description ?? ''}}" class="form-control" required>
                @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gejala</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="symptom" value="{{$illness->symptom ?? ''}}" class="form-control" required>
                @if ($errors->has('symptom'))
                  <span class="text-danger">{{ $errors->first('symptom') }}</span>
                @endif
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Penyebab</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="reason" value="{{$illness->reason ?? ''}}" class="form-control" required>
                @if ($errors->has('reason'))
                  <span class="text-danger">{{ $errors->first('reason') }}</span>
                @endif
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pengobatan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="treatment" value="{{$illness->treatment ?? ''}}" class="form-control" required>
                @if ($errors->has('treatment'))
                  <span class="text-danger">{{ $errors->first('treatment') }}</span>
                @endif
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar:</label>
            <div class="col-sm-6 p-3" style="padding-top: 0% !important;">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="float-left">
                            <label id="inputGroupFile01" class="btn btn-outline-secondary">
                              <input type="file" for="inputGroupFile01" accept="image/*" name="file">Upload</input>
                            </label>
                            @if ($errors->has('file'))
                              <span class="text-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 d-flex justify-content-between">
              <div>
                <a href="{!! route('backend.illness.index') !!}" class="btn btn-secondary">Kembali</a>
              </div>
              <div>
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
              </div>
            </div>
        </div>
    </form>
@endsection