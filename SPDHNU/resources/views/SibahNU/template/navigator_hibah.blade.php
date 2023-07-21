<!-- Card with header and footer -->
<div class="card">
  <div class="card-body">
    {{-- <h5 class="card-title text-success">Kelengkapan Identitas MWCNU</h5> --}}
    <!-- Pills Tabs -->
    <ul class="nav nav-pills mb-3 mt-4 gap-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a href="{{ route('bank',$proposal->id_proposal) }}" x-on:click="isLoading = true" class="nav-link {{ $menu['bank'] ? 'active' : '' }}">
          <i class="ri-file-copy-2-line"></i>
          Pengkinian Data
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a href="{{ route('rabKegiatan',$proposal->id_proposal) }}" x-on:click="isLoading = true" class="btn nav-link {{ $menu['kegiatan'] ? 'active' : ''  }}">
          <i class="ri-file-copy-2-line"></i>
          Sub Kegiatan
        </a>
      </li>
      {{-- <li class="nav-item" role="presentation">
        <a href="{{ route('dataRab',$proposal->id_proposal) }}" x-on:click="isLoading = true" class="btn nav-link {{ $menu['rab'] ? 'active' : ''  }}">
          <i class="ri-file-copy-2-line"></i>
          RAB
        </a>
      </li> --}}
      {{-- <li class="nav-item" role="presentation">
        <a href="/history" x-on:click="isLoading = true" class="btn nav-link {{ $menu['history'] ? 'active' : '' }}">
          <i class="ri-file-copy-2-line"></i>
          History / Pelacakan
        </a>
      </li> --}}
    </ul>

    <div class="card bg-success">
      <div class="card-body text-light text-center mt-3">
        Silahkan isi atau lengkapi data dibawah ini
      </div>
    </div>

    <div class="tab-content pt-2" id="myTabContent">
