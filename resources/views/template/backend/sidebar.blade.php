<div class="sidebar">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <span> Selamat Datang <?php echo ucfirst(Auth::user()->name); ?></h4>
    </div>
    <a href="{!! route('backend.dashboard.index') !!}">
      <div class="block">
        <iconify-icon icon="ant-design:dashboard-twotone" class="fas"></iconify-icon>
        <span>Dashboard</span>
      </div>
    <a href="{!! route('backend.administrator.index') !!}">
      <div class="block">
        <iconify-icon icon="ph:user-fill"></iconify-icon></i>
        <span>Data Admin</span>
      </div>
    </a>
    <a href="{!! route('backend.illness.index') !!}">
      <div class="block">
        <iconify-icon icon="fa6-solid:disease"></iconify-icon></i>
        <span>Data Artkiel</span>
      </div>
    </a>

    <a href="{!! route('backend.empty-illness.index') !!}">
      <div class="block">
        <iconify-icon icon="mdi-light:flask-empty"></iconify-icon></i>
        <span>Data Penyakit Kosong</span>
      </div>
    </a>
    <a href="{!! route('index') !!}">
      <div class="block">
        <iconify-icon icon="fluent:location-arrow-12-regular"></iconify-icon></i>
        <span>Halaman Web</span>
      </div>
    </a>
</div>