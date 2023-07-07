<!-- Card with header and footer -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Kelengkapan Identitas MWCNU</h5>

    <!-- Pills Tabs -->
    <ul class="nav nav-pills mb-3 mt-4 gap-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a href="/home" class="nav-link {{ $home ? 'active' : '' }}">
          <i class="ri-file-copy-2-line"></i>
          Data MWCNU
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a href="/pimpinan" class="btn nav-link {{ $pimpinan ? 'active' : '' }}">
          <i class="ri-file-copy-2-line"></i>
          Data Pimpinan MWCNU
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a href="/operator" class="btn nav-link {{ $operator ? 'active' : '' }}">
          <i class="ri-file-copy-2-line"></i>
          Data Operator MWCNU
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a href="/persyaratan" class="btn nav-link {{ $persyaratan ? 'active' : '' }}">
          <i class="ri-file-copy-2-line"></i>
          Data Persyaratan Lembaga
        </a>
      </li>
    </ul>

    <div class="card bg-primary">
      <div class="card-body text-light text-center mt-3">
        Silahkan isi atau lengkapi data dibawah ini
      </div>
    </div>

    <div class="tab-content pt-2" id="myTabContent">