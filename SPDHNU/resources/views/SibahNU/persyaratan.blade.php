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
          <button
            type="button"
            class="btn btn-outline-success"
            data-bs-toggle="modal"
            data-bs-target="#verticalycentered">
            <i class="ri-file-edit-line"></i>
            Tambah Persyaratan Lembaga
          </button>
          <div
            class="modal fade"
            id="verticalycentered"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">
                    Tambah Persyaratan Lembaga
                  </h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{route('addPersyaratan')}}">
                    @csrf
                    <div class="row g-3">
                      <div class="col-md-12">
                        <label
                          for="input-jenis-dokumen"
                          class="form-label d-flex justify-content-start">
                          Jenis Dokumen
                          <sup class="text-danger">*</sup>
                        </label>
                        <select
                          id="input-jenis-dokumen"
                          class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>

                      <div class="row g-3">
                        <div class="col-md-12">
                          <label
                            for="input-nama-surat"
                            class="form-label d-flex justify-content-start">
                            Nama Surat
                            <sup class="text-danger">*</sup>
                          </label>
                          <input
                            type="text"
                            name="nama_persyaratan"
                            class="form-control"
                            id="input-nama-surat"
                            required />
                        </div>
                      </div>

                      <div class="row g-3">
                        <div class="col-md-12">
                          <label
                            for="input-no-surat"
                            class="form-label d-flex justify-content-start">
                            Nomor Surat
                            <sup class="text-danger">*</sup>
                          </label>
                          <input
                            type="text"
                            name="nomor_surat"
                            class="form-control"
                            id="input-no-surat"
                            required />
                        </div>
                      </div>

                      <div class="row g-3">
                        <div class="col-md-12">
                          <label
                            for="input-keluarkan"
                            class="form-label d-flex justify-content-start">
                            Mengeluarkan
                            <sup class="text-danger">*</sup>
                          </label>
                          <input
                            type="text"
                            name="yang_mengeluarkan"
                            class="form-control"
                            id="input-keluarkan"
                            required />
                        </div>
                      </div>

                      <div class="row g-3">
                        <div class="col-md-12">
                          <label
                            for="input-file-surat"
                            class="form-label d-flex justify-content-start">
                            File Surat
                            <sup class="text-danger">*</sup>
                          </label>
                          <input
                            type="file"
                            class="form-control"
                            name="file"
                            id="input-file-surat"
                            required />
                          <span
                            class="badge bg-success d-flex justify-content-start">
                            File harus berupa PDF
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="submit"
                        class="btn btn-success">
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
                <td><img src="{{Storage::url($syarat->file)}}"/></td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

        <div class="row g-3 pt-4 mt-4 mb-4">
            <div class="text-end">
            <button type="submit" class="bg-green-800 p-2 rounded-md text-white col-md-3">
                <i class="ri-file-edit-line"></i>
                Perbaharui data MWCNU
            </button>
            </div>
        </div>
</div>
@include('SibahNU.template.footer')
