@include('SibahNU.template.header')
@include('SibahNU.template.navigator',$display_menus)
<div class="tab-pane fade show active" id="pills-data-persyaratan" role="tabpanel" aria-labelledby="data-persyaratan-tab">
  <!-- Table with stripped rows -->
  @include('sweetalert::alert')
  {{-- loading --}}
  <template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
      <div class="flex h-screen w-full items-center justify-center bg-gray-100">
        <div class="custom-loader"></div>
      </div>
    </div>
  </template>

  <div class="row mt-2 mb-3">
    <div class="text-end">
      <button type="button" id="tambah" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#verticalycentered">
        <i class="ri-file-edit-line"></i>
        Tambah Persyaratan Lembaga
      </button>
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                Tambah Persyaratan Lembaga
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
              <form id="persyaratan_form" method="POST" action="{{route('addPersyaratan')}}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                  <input type="hidden" name="id_persyaratan" value="" />
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label for="input-nama-surat" class="form-label d-flex justify-content-start">
                        Nama Surat
                        <sup class="text-danger">*</sup>
                      </label>
                      <input type="text" name="nama_persyaratan" class="form-control" id="input-nama-surat" required />
                    </div>
                  </div>

                  <div class="row g-3">
                    <div class="col-md-12">
                      <label for="input-no-surat" class="form-label d-flex justify-content-start">
                        Nomor Surat
                        <sup class="text-danger">*</sup>
                      </label>
                      <input type="text" name="nomor_surat" class="form-control" id="input-no-surat" required />
                    </div>
                  </div>

                  <div class="row g-3">
                    <div class="col-md-12">
                      <label for="input-keluarkan" class="form-label d-flex justify-content-start">
                        Mengeluarkan
                        <sup class="text-danger">*</sup>
                      </label>
                      <input type="text" name="yang_mengeluarkan" class="form-control" id="input-keluarkan" required />
                    </div>
                  </div>

                  <div class="row g-3">
                    <div class="col-md-12">
                      <label for="input-file-surat" class="form-label d-flex justify-content-start">
                        File Surat
                        <sup class="text-danger">*</sup>
                      </label>
                      <input type="file" class="form-control" name="file" id="input-file-surat" />
                      <span class="badge bg-success d-flex justify-content-start">
                        File harus berupa PDF
                      </span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-success">
                    <i class="ri-file-edit-line"></i>
                    Simpan data
                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- End Vertically centered Modal-->
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Persyaratan</th>
        <th scope="col">Nomor Surat</th>
        <th scope="col">Yang Mengeluarkan</th>
        <th scope="col">File</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($persyaratan as $syarat)
      <tr>
        <th scope="row">1</th>
        <td>{{$syarat->nama_persyaratan}}</td>
        <td>{{$syarat->nomor_surat}}</td>
        <td>{{$syarat->yang_mengeluarkan}}</td>
        <td><a href="{{asset('storage/'.$syarat->file)}}" class="bg-green-800 p-2 rounded-md text-white">Lihat File</a></td>
        <td>
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="edit col-sm-5 bg-yellow-400 p-1 rounded-md" data-syarat="{{$syarat->id_persyaratan}}"><x-heroicon-o-pencil-square /></button>
              <a href="{{route('deletePersyaratan',['id_persyaratan' => $syarat->id_persyaratan])}}">
                <button type="button" class="delete col-sm-5 bg-red-600 p-1 rounded-md" data-syarat="{{route('deletePersyaratan',$syarat->id_persyaratan)}}"><x-heroicon-o-backspace /></button>
              </a>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- End Table with stripped rows -->
</div>
@include('SibahNU.template.footer')
<script>
  $(document).on('click', '.edit', function(o) {
    let id = $(this).attr('data-syarat');
    getData(id);
  })

  $("#tambah").click(function() {
    $("input[name='id_persyaratan']").val("");
  })

  function getData(id) {
    $.get("{{route('getPersyaratan')}}?id=" + id, function(o) {
      $("input[name='id_persyaratan']").val(o.id_persyaratan);
      $("input[name='nama_persyaratan']").val(o.nama_persyaratan);
      $("input[name='nomor_surat']").val(o.nomor_surat);
      $("input[name='yang_mengeluarkan']").val(o.yang_mengeluarkan);
      $("#verticalycentered").modal('show');
    })
  }
</script>
