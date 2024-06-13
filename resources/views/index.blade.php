@extends('template.frontend.template')

@section('content')
   <!-- landing page -->
    <div class="landing">
        <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
            <h2>Hidup Sehat</span> </h2>
            <h3>Bersama Kami.</h3>
            <div class="btn">
                <a href="#about" class="scroll">Baca Selengkapnya</a>
            </div>
        </div>
        <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
            <img src="{!!asset('assets/images/3674274.png')!!}" alt="">
        </div>
    </div>
    <!-- akhir landing page -->


    <!-- about -->
    <section class="section">
        <div class="about" id="about">
            <div class="content-about">
                <h3 class="title-about" data-aos="fade-right" data-aos-duration="1000">
                    Tentang Aplikasi Ini
                    <div class="line"></div>
                </h3>
                <p class="text-about" data-aos="fade-right" data-aos-duration="1000">Merupakan sebuah website yang bisa digunakan untuk masyarakat yang memerlukan
                    informasi kesehatan secara efesien,
                    website ini dapat mengetahui daftar penyakit-penyakit, memberikan informasi bagaimana cara untuk
                    mencegah dan mengatasi
                    penyakit tersebut. Tampilan yang sederhana akan memudahkan pengguna untuk berinteraksi dengan
                    website ini, di dalamnya
                    pengguna dimanjakan dengan system voice dan edukasi animasi robot sederhana yang berfungsi untuk
                    interaksi antara system
                    dan pengguna sehinga pengguna tidak merasa jenuh dan merasa kesulitan pada saat mengakses website.
                    Website ini cocok
                    digunakan untuk semua kalangan.disease</p>
            </div>
            <div class="imgContainer" data-aos="fade-up" data-aos-duration="1000">
                <img src="{!!asset('assets/images/medl.png')!!}" alt="">
            </div>
        </div>
    </section>
    <!-- akhir about -->


    <!-- bagaimana ini bekerja? -->
    <div class="container my-5">
        <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
            <span class="text-secondary">Langkah</span>
            <h4 class="text-capitalize font-weight-bold">Bagaimana ini <span style="color: #0089ff">Bekerja?</span></h4>
        </div>

        <div class="col-12 col-md-8 mx-auto">

            <div class="d-flex my-4 align-items-start" data-aos="fade-right" data-aos-duration="1000">
                <div class="mr-3 text-center mt-2">
                    <div class="p-4 ml-2 rounded-circle text-white font-weight-bold d-flex align-items-center justify-content-center" style="height: 40px; width: 40px; background-color: #0089ff">1</div>
                </div>
                <div class="rounded bg-light p-4">
                    <h5 class="mb-3" style="font-weight: 600;">Apa yang anda rasakan?</h5>
                    <p class="text-secondary font-weight-light">Kenali keluhan yang anda rasakan,lalu sampaikan keluhan yang anda rasakan kepada caredoc.</p>
                </div>
            </div>
            <div class="d-flex my-4 align-items-start" data-aos="fade-right" data-aos-duration="800">
                <div class="mr-3 text-center mt-2">
                    <div class="p-4 ml-2 rounded-circle text-white font-weight-bold d-flex align-items-center justify-content-center" style="height: 40px; width: 40px; background-color: #0089ff">2</div>
                </div>
                <div class="rounded bg-light p-4">
                    <h5 class="mb-3" style="font-weight: 600;">Konsultasikan keluhan anda pada caredoc</h5>
                    <p class="text-secondary font-weight-light">Dengan mengkonsultasikan apa yang anda rasakan kepada caredoc anda akan mendapatkan informasi keluhan yang dirasakan.</p>
                </div>
            </div>
            <div class="d-flex my-4 align-items-start" data-aos="fade-right" data-aos-duration="600">
                <div class="mr-3 text-center mt-2">
                    <div class="p-4 ml-2 rounded-circle text-white font-weight-bold d-flex align-items-center justify-content-center" style="height: 40px; width: 40px; background-color: #0089ff">3</div>
                </div>
                <div class="rounded bg-light p-4">
                    <h5 class="mb-3" style="font-weight: 600;">Dapatkan informasi kesehatan</h5>
                    <p class="text-secondary font-weight-light">Anda mendapatkan solusi terhadap keluhan yang dirasakan sehingga merasa dekat dengan kesembuhan setelah mendapatkan informasi.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir bagaimana ini bekerja? -->

    <!-- caredoc -->
    <div class="container-caredoc" id="caredoc">
        <div class="content-caredoc">
            <div class="title-caredoc">
                <h3 data-aos="zoom-out" data-aos-duration="900">Care<span>doc</span></h3>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{!!asset('assets/images/Untitled-2.gif')!!}" alt="caredoc">
            </div>
            <div class="container-form">
                <form action="{!! route('illness.index') !!}" method="get" id="search-form">
                    <div class="input-group mb-3">
                        <input id="textbox" name="keyword" type="text" placeholder="Masukan apa yang anda rasakan..." autocomplete="off" required>
                        <div class="input-group-append">
                            <!-- <button type="submit" class="d-none"></button> -->
                            <button type="button" class="btn btn-light btn-lg mr-1" id="start-btn" title="Start">
                                <iconify-icon icon="ic:outline-mic" id="micoff"></iconify-icon>
                                <iconify-icon icon="fa:assistive-listening-systems" class="d-none" id="micon"></iconify-icon>
                            </button>
                        </div>
                    </div>
                </form>
                <p class="info"></p>
            </div>
        </div>
    </div>
    <!-- akhir caredoc -->

    <!-- bagaimana ini bekerja? -->
    <div class="container my-5" id="reservasi">
        <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
            <span class="text-secondary">Reservasi</span>
            <h4 class="text-capitalize font-weight-bold">Mulai konsultasi dengan dokter dengan cara <span style="color: #0089ff">Reservasi</span></h4>
        </div>
        <div class="alert alert-success alert-reservation d-none"></div>
        <form id="formReservation" class="col-12 col-md-8 mx-auto" action="#" method="post">
            @csrf
            <div class="d-flex my-2 align-items-start" data-aos="fade-right" data-aos-duration="1000">
                <div class="item form-group w-100">
                    <label class="col-form-label col-md-12 label-align">Nama Lengkap</label>
                    <div class="col-md-12">
                        <input type="text" name="name" value="" placeholder="Masukan Nama Lengkap" class="form-control" required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex my-2 align-items-start" data-aos="fade-right" data-aos-duration="1000">
                <div class="item form-group w-100">
                    <label class="col-form-label col-md-12 label-align">Email</label>
                    <div class="col-md-12">
                        <input type="text" name="email" value="" placeholder="Masukan Email" class="form-control" required>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex my-2 align-items-start" data-aos="fade-right" data-aos-duration="1000">
                <div class="item form-group w-100">
                    <label class="col-form-label col-md-12 label-align">Nomor Telepon</label>
                    <div class="col-md-12">
                        <input type="text" name="hp" value="" placeholder="Masukan Nomor Telepon" class="form-control" required>
                        @if ($errors->has('hp'))
                        <span class="text-danger">{{ $errors->first('hp') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex my-2 align-items-start" data-aos="fade-right" data-aos-duration="1000">
                <div class="item form-group w-100">
                    <label class="col-form-label col-md-12 label-align">Keluhan</label>
                    <div class="col-md-12">
                        <textarea name="complaint" class="form-control" id="" cols="30" rows="5"></textarea>
                        @if ($errors->has('complaint'))
                        <span class="text-danger">{{ $errors->first('complaint') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex my-2 align-items-start aos-init aos-animate" data-aos="fade-right" data-aos-duration="1000">
                <div class="col-md-12 d-flex justify-content-between">
                    <div style="margin: auto;">
                        <input type="submit" name="submit" class="btn btn-primary" value="Kirim" fdprocessedid="1q5qzi">
                    </div>
                </div>
            </div>
        </form>
        <script>
            document.getElementById('formReservation').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this); // Create FormData object from the form
                var url = "{!! route('reservasi') !!}"; // Replace 'submit.form' with your route name
                const routes = {
                    submitForm: encodeURIComponent(`{{ route('reservasi') }}`)
                };
                console.log(routes.submitForm);

                // Send AJAX request
                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json()) // Parse response as JSON
                .then(data => {
                    // Handle response data
                    console.log(data);
                    document.getElementsByClassName('alert-reservation')[0].classList.remove('d-none');
                    document.getElementsByClassName('alert-reservation')[0].innerHTML = `<p>${data.message}</p>`;
                    document.getElementById('formReservation').reset();
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
            });
            // function onSubmitReservation(event){
            //     event.preventDefault();
            //     $.ajax({
            //         url: "{!! route('reservasi') !!}",
            //         type: "POST",,
            //         data: $('#formReservation').serialize(),
            //         dataType: 'json',
            //         beforeSend: function(data) {
    
            //         },
            //         success: function(data) {
            //             console.log(data);
            //         },
            //         error: function(data) {
            //             console.log(data);
            //         }
            //     })
            // }
        </script>
    </div>
    <!-- akhir bagaimana ini bekerja? -->
@endsection
