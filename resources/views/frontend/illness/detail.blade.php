@extends('template.frontend.template')
@section('content')
<a style="position: fixed;
  bottom: 30px;
  right: 105px;
  outline: none;
  border: none;
  height: 50px;
  width: auto;
  display: flex;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border-radius: 20px;
  background: #0098ff;
  transition: all 0.2s ease;
  color: white;
  padding: 0px 10px;
  z-index: 10"
  href="https://si-manis.my.id/"
  target="_blank">
  <iconify-icon icon="ion:paper-plane" style="transform: scale(1.2)"></iconify-icon> &nbsp;
  Visit For Consultan Diabetes
</a>
    <div class="container-fluid p-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="card2 sdh">
                    <div class="card-body" id="textdies">
                        <h5 class="ts">{{$illness->name}}</h5>
                        <p class="card-text">
                            {{$illness->description}}
                        </p>
                        <p class="card-text">
                            -Gejala<br>
                            @php
                              $data_gejala = explode(",", $illness->symptom);
                              $no_langkah = 1;
                            @endphp
                            @foreach ($data_gejala as $key => $gejala)
                              {{($key+1).".".$gejala."."}} <br>
                            @endforeach
                        <p>
                            -Penyebab<br>
                            {{$illness->reason}}
                        </p>

                        <p class="card-text" id>
                            -Cara mengobati<br>
                            @php
                              $data_pengobatan = explode(",", $illness->treatment);
                              $no_langkah = 1;
                            @endphp
                            @foreach ($data_pengobatan as $key => $pengobatan)
                              {{($key+1).".".$gejala."."}} <br>
                            @endforeach
                        </p>
                        <div class="modal-footer">
                            <button type="button" onclick="play();" class="btn btn-primary">Play</button>
                            <button type="button" onclick="pause();" class="btn btn-primary">Resume</button>
                            <button type="button" onclick="stop();" class="btn btn-primary">Stop</button>
                        </div>
                    </div>
                </div>
                <p class="note text-danger">catatan: "fitur suara hanya dapat berjalan pada browser chrome!"</p>
            </div>
            {{-- <a target="_blank" href="" class="btn btn-primary">Play</button> --}}
        </div>
    </div>
    <!-- animasi bubble -->
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
@endsection
