@include('SibahNU.template.header')
<div class="col-lg-12">
  <!-- Card with header and footer -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Kelengkapan Identitas MWCNU</h5>

      <!-- Pills Tabs -->
      <ul class="nav nav-pills mb-3 mt-4 gap-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-data-mwcnu-tab" data-bs-toggle="pill" data-bs-target="#pills-data-mwcnu" type="button" role="tab" aria-controls="pills-data-mwcnu" aria-selected="true">
            <i class="ri-file-copy-2-line"></i>
            Data MWCNU
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-data-pimpinan-tab" data-bs-toggle="pill" data-bs-target="#pills-data-pimpinan" type="button" role="tab" aria-controls="pills-data-pimpinan" aria-selected="false">
            <i class="ri-file-copy-2-line"></i>
            Data Pimpinan MWCNU
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-data-operator-tab" data-bs-toggle="pill" data-bs-target="#pills-data-operator" type="button" role="tab" aria-controls="pills-data-operator" aria-selected="false">
            <i class="ri-file-copy-2-line"></i>
            Data Operator MWCNU
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-data-persyaratan-tab" data-bs-toggle="pill" data-bs-target="#pills-data-persyaratan" type="button" role="tab" aria-controls="pills-data-persyaratan" aria-selected="false">
            <i class="ri-file-copy-2-line"></i>
            Data Persyaratan Lembaga
          </button>
        </li>
      </ul>

      <div class="card bg-primary">
        <div class="card-body text-light text-center mt-3">
          Silahkan isi atau lengkapi data dibawah ini
        </div>
      </div>

      <div class="tab-content pt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="pills-data-mwcnu" role="tabpanel" aria-labelledby="data-mwcnu-tab">
          @include('sweetalert::alert')
          <!-- Multi Columns Form -->

          <!-- End Multi Columns Form -->
        </div>
        <div class="tab-pane fade" id="pills-data-pimpinan" role="tabpanel" aria-labelledby="data-pimpinan-tab">
          <!-- Multi Columns Form -->

          <!-- End Multi Columns Form -->
        </div>
        <div class="tab-pane fade" id="pills-data-operator" role="tabpanel" aria-labelledby="data-operator-tab">
          <!-- Multi Columns Form -->
          
          <!-- End Multi Columns Form -->
        </div>
        <div class="tab-pane fade" id="pills-data-persyaratan" role="tabpanel" aria-labelledby="data-persyaratan-tab">
          <!-- Table with stripped rows -->

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
        </div>
      </div>
      <!-- End Pills Tabs -->
    </div>
  </div>
  <!-- End Card with header and footer -->
</div>
@include('SibahNU.template.footer')