@include('SibahNU.template.header_hibah')
@include('SibahNU.template.navigator_hibah',$display_menu)
<div class="tab-pane fade" id="pills-proposal-awal" role="tabpanel" aria-labelledby="proposal-awal-tab">
    <!-- Multi Columns Form -->
    <form method="POST" action="{{route('addProposal')}}" enctype="multipart/form-data">
      @csrf
      <div class="row g-3 mt-4">
        <div class="col-md-4">
          <label for="input-peruntukan-dana" class="form-label">
            Peruntukan Dana
            <sup class="text-danger">*</sup>
          </label>
          <input type="text" class="form-control" id="input-peruntukan-dana" name="peruntukan" value="{{$dataProposal->peruntukan}}" required />
        </div>
        <div class="col-md-4">
          <label for="input-nphd" class="form-label">
            No Surat NPHD dari MWCNU
            <sup class="text-danger">*</sup>
          </label>
          <input type="text" class="form-control" id="input-nphd" name="no_NPHD" value="{{$dataProposal->no_NPHD}}" required />
        </div>
        <div class="col-md-4">
          <label for="input-nik" class="form-label">
            File Proposal
            <sup class="text-danger">*</sup>
          </label>
          <input type="file" class="form-control" id="input-nik" name="file_proposal" value="{{$dataProposal->file_proposal}}" required accept="application/pdf" />
          <span class="badge bg-primary">
            File harus berupa PDF
          </span>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#display-file_proposal">
            <i class="fa-solid fa-file-pdf"></i>
            Lihat file
          </button>
        </div>
      </div>

      <div class="row g-3 pt-4 mt-4 mb-4">
        <div class="text-end">
          <button type="submit" class="btn btn-primary col-md-3">
            <i class="ri-file-edit-line"></i>
            Simpan Data Pengkinian
          </button>
        </div>
      </div>
    </form>
    <div class="modal fade" id="display-file_proposal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">
            <embed src="{{ asset('storage/'.$dataProposal->file_proposal) }}" type="application/pdf" width="100%" height="600px" />
          </div>
        </div>
      </div>
    </div>
    <!-- End Multi Columns Form -->
  </div>
@include('SibahNU.template.footer')
