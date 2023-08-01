@include('SibahNU.template.header_hibah',['actived_menu'=>$actived_menu])
@include('SibahNU.template.navigator_hibah',['menu'=>$display_menu, 'proposal'=>$proposal])

<div class="tab-pane fade show active" id="pills-pengkinian-data" role="tabpanel" aria-labelledby="pengkinian-data-tab">
  <template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
      <div class="flex h-screen w-full items-center justify-center bg-gray-100">
        <div class="custom-loader"></div>
      </div>
    </div>
  </template>
  <!-- Multi Columns Form -->
  <form method="POST" action="{{route('addDataBank')}}" enctype="multipart/form-data">
    @csrf
        <div class="row g-3">
      <div class="col-md-6">
        <label for="peruntukan" class="form-label d-flex justify-content-start">
          No NPHD
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" name="no_NPHD" value="{{ $proposal->no_NPHD }}" required />
        <input type="hidden" name="id_proposal" value="{{ $proposal->id_proposal }}" />
      </div>
      <div class="col-md-6">
        <label for="peruntukan" class="form-label d-flex justify-content-start">
          Peruntukan
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" name="peruntukan" value="{{ $proposal->peruntukan }}" required />
      </div>
      <div class="col-md-4">
        <label for="file_proposal" class="form-label">
          File Proposal
          <sup class="text-danger">*</sup>
        </label>
        <input type="file" name="file_proposal" class="form-control" id="file_proposal" required accept="application/pdf" />
        <span class="badge bg-success">
          File harus berupa PDF
        </span>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#display-file_proposal">
          <i class="fa-solid fa-file-pdf"></i>
          Lihat file
        </button>
      </div>
    </div>
    <div class="row g-3 pt-4">
      <div class="col-md-4">
        <label for="input-bank" class="form-label">
          Bank
          <sup class="text-danger">*</sup>
        </label>
        <select id="input-bank" class="form-select" name="bank">
          <option selected value="{{$dataBank->bank}}">
            @if($dataBank->bank < 1)
            -- Pilih Bank --
            @else
            {{ $dataBank->bank }}
            @endif
          </option>
          <option value="BANK BNI">BNI</option>
          <option value="BANK BRI">BRI</option>
          <option value="BANK BSI">BSI</option>
          <option value="BANK MANDIRI">MANDIRI</option>
          <option value="BANK BJB">BJB</option>
          <option value="BANK BJB SYARIAH">BJB SYARIAH</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="input-rekening" class="form-label">
          No Rekening
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" id="input-rekening" name="no_rek" value="{{$dataBank->no_rek}}" required />
      </div>
      <div class="col-md-4">
        <label for="input-nama-rekening" class="form-label">
          Nama Lembaga di Rekening
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" id="input-nama-rekening" name="nama_rekening" value="{{$dataBank->nama_rekening}}" required />
      </div>
      <div class="col-md-6">
        <label for="input-cabang-bank" class="form-label">
          Cabang Bank
          <sup class="text-danger">*</sup>
        </label>
        <input type="text" class="form-control" id="input-cabang-bank" name="cabang_bank" value="{{$dataBank->cabang_bank}}" required />
      </div>
      <div class="col-md-6">
        <label for="input-buku-tabungan" class="form-label">
          File Buku Tabungan
          <sup class="text-danger">*</sup>
        </label>
        <input type="file" name="file_buku_tabungan" class="form-control" id="input-buku-tabungan" required accept="application/pdf" />
        <span class="badge bg-success">
          File harus berupa PDF
        </span>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#display-file_tabungan">
          <i class="fa-solid fa-file-pdf"></i>
          Lihat file
        </button>
      </div>
    </div>
    <div class="row g-3 pt-4 mt-4 mb-4">
      <div class="text-end">
        <button type="submit" class="btn btn-outline-success col-md-3">
          <i class="ri-file-edit-line"></i>
          Simpan Data Pengkinian
        </button>
      </div>
    </div>
  </form>
  {{-- Modall --}}
  <div class="modal fade" id="display-file_tabungan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
          <embed src="{{ asset('storage/'.$dataBank->file_buku_tabungan) }}" type="application/pdf" width="100%" height="600px" />
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="display-file_proposal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
          <embed src="{{ asset('storage/'.$proposal->file_proposal) }}" type="application/pdf" width="100%" height="600px" />
        </div>
      </div>
    </div>
  </div>
  <!-- End Multi Columns Form -->
</div>
@include('SibahNU.template.footer')
