@include('SibahNU.template.header')
@include('SibahNU.template.navigator',$display_menus)
<div class="tab-pane fade show active" id="pills-data-persyaratan" role="tabpanel" aria-labelledby="data-persyaratan-tab">
  <!-- Table with stripped rows -->
  @include('sweetalert::alert')

  <template x-if="isLoading">
    <div class="fixed inset-0 z-[100] bg-white">
        <div class="flex h-screen w-full items-center justify-center bg-gray-100">
          <div class="custom-loader"></div>
        </div>
      </div>
    </template>

    <template x-if="isLoading">
        <div class="row mt-2 mb-3">
            <div class="text-end">
            <button type="button" class="btn btn-outline-primary">
                <i class="ri-file-edit-line"></i>
                Tambah Persyaratan Lembaga
            </button>
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
            <tr>
                <th scope="row">1</th>
                <td>Administrasi</td>
                <td>01/PST-CPS/VII/2023</td>
                <td>Pesantren CPS</td>
                <td><a href="#">Persyaratan.pdf</a></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

        <div class="row g-3 pt-4 mt-4 mb-4">
            <div class="text-end">
            <button type="submit" class="btn btn-primary col-md-3">
                <i class="ri-file-edit-line"></i>
                Perbaharui data MWCNU
            </button>
            </div>
        </div>
    </template>
</div>
@include('SibahNU.template.footer')
