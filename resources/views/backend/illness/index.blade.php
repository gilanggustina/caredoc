@extends('template.backend.template')
@section('content')
  <div class="" style="margin-top:20px">
      <center>
          <font size="6">Data Penyakit</font>
      </center>
      <hr>
      <br>
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
      @endif
      <div class="row">
          <div class="col-sm-6 mb-3">
              <!-- Search / Cari -->
              <form action="{!! route('backend.illness.index') !!}" method="get">
                  <div class="input-group">
                      <input type="text" name="kunci" value="{{request()->get("kunci")}}" placeholder="Cari..." autocomplete="off" class="form-control"
                          style="padding: 0% 5px !important;">
                      <div class="input-group-append">
                          <button type="submit" class="btn btn-secondary"><iconify-icon icon="mingcute:search-line"></iconify-icon>
                              Cari</button>
                      </div>
                  </div>
              </form>
          </div>
          <br>
          <a href="{!! route('backend.illness.create') !!}"><button class="btn btn-primary right">Tambah Data</button></a>
      </div>
      <div class="table-responsive"><br />
          <table class="table table-bordered table-striped jambo_table bulk_action table-hover">
              <thead>
                  <tr>
                      <th>NO.</th>
                      <th>Nama Penyakit</th>
                      <th>Deskripsi</th>
                      <th>Gejala</th>
                      <th>Penyebab</th>
                      <th>Pengobatan</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($illnesses as $key => $illness)
                  <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$illness->name}}</td>
                      <td>{{$illness->description}}</td>
                      <td>{{$illness->symptom}}</td>
                      <td>{{$illness->reason}}</td>
                      <td>{{$illness->treatment}}</td>
                      <td>
                        @if ($illness->image_name)
                            <img src="{{asset('images/'.$illness->image_name)}}" alt="{{'gambar penyakit '.$illness->name}}" style="width:100px" title="{{'gambar penyakit '.$illness->name}}" >
                        @endif
                      </td>
                      <td>
                        <div class="d-flex" style="column-gap: 5px">
                            <a href="{!! route('backend.illness.create',['id'=>$illness->id]) !!}" class="btn btn-outline-secondary btn-sm">
                                <iconify-icon icon="mdi:pencil"></iconify-icon> edit
                            </a>
                            <form action="{!! route('backend.illness.delete',['id'=>$illness->id]) !!}" method="post" class="delete-form" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm delete-btn" type="submit">
                                    <iconify-icon icon="mdi:trash"></iconify-icon>
                                    Hapus
                                </button>
                            </form>
                        </div>
                      </td>
                    </tr>
                @empty
                  <tr class="text-center">
                    <td colspan="6">Tidak ada data.</td>
                  </tr>
                @endforelse
              <tbody>
          </table>
      </div>
  </div>
  <script type="text/javascript">
        $(document).ready(function() {
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this item?')) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
@endsection
