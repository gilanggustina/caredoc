@extends('template.frontend.template')
@section('content')
  <div class="container-caredoc-dies">
      <h1 class="d-flex justify-content-center tsh"></h1>
  </div>
  <div class="container-fluid p-3">
    <div class="row">
      @forelse ($illnesses as $key => $illness)
        <div class="col-sm-6 p-3">
            <div class="container">
                <div class="card sdh2 mb-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                          @if ($illness->image_name)
                            <img class="card-img mt-10" src="{{asset('images/'.$illness->image_name)}}" alt="{{'gambar penyakit '.$illness->name}}" title="{{'gambar penyakit '.$illness->name}}" >
                          @else
                            <img class="card-img mt-10" src="" alt="No Image">
                          @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$illness->name}}</h5>
                                <p class="card-text text-left" style="overflow: auto;">{{$illness->description}}</p>
                                <a href="{!!route("illness.detail",['id'=>$illness->id])!!}" class="btn btn-primary" data>Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @empty
        <div class="container pdt">
          <div class="site">
            <div class="sketch">
                <div class="bee-sketch red"></div>
                <div class="bee-sketch blue"></div>
            </div>
            <h1><small>Maaf data penyakit <span class="font-weight-bold" style="text-decoration:underline;">{{request()->get('keyword')}}</span> yang anda cari belum tersedia.</h1>
          </div>
        </div>
      @endforelse
    </div>
  </div>
@endsection