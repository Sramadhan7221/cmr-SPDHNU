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
          <form method="POST" action="{{route('lembaga')}}">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">
                  Nama MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="inputName5" value="{{$user->nama_mwc}}" disabled placeholder="MWC Singaparna" required />
              </div>
              <div class="col-md-6">
                <label for="input-alamat" class="form-label">
                  Alamat MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" value="{{$kecamatan->nama}}" disabled id="input-alamat" required />
              </div>
            </div>

            <div class="row g-3 pt-4">
              <div class="col-md-6">
                <label for="no_telp" class="form-label">
                  No tlp / Handphone
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="no_telp" class="form-control" id="input-tlp" />
              </div>

              <div class="col-md-6">
                <label for="input-email" class="form-label">
                  Email MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="email" name="email_lembaga" class="form-control" id="input-email" />
              </div>
            </div>
            <div class="row g-3 pt-4">
              <div class="col-md-4">
                <label for="input-kabupaten" class="form-label">
                  Kabupaten
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="kabupaten" disabled class="form-control" value="{{$kabupaten->nama}}" data-kode="{{$kabupaten->kode}}" id="input-kabupaten" />
              </div>

              <div class="col-md-4">
                <label for="input-kecamatan" class="form-label">
                  Kecamatan
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="kecamatan" disabled value="{{$kecamatan->nama}}" data-kode="{{$kabupaten->kode}}" class="form-control" id="input-kecamatan" />
              </div>

              <div class="col-md-4">
                <label for="input-desa" class="form-label">
                  Desa
                  <sup class="text-danger">*</sup>
                </label>
                <select name="desa" class="form-control" id="input-desa">
                  <option value="0">--Pilih Desa--</option>
                  @foreach ($desa as $item)
                  <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row g-3 pt-4">
              <div class="col-md-6">
                <label for="input-kabupaten" class="form-label">
                  Kop surat MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="file" name="kop_surat" class="form-control" id="input-kabupaten" />
                <span class="badge bg-primary">
                  File harus berupa JPG/PNG
                </span>
              </div>

              <div class="col-md-6">
                <label for="input-kecamatan" class="form-label">
                  Domisili MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="file" class="form-control" id="input-kecamatan" name="domisili" accept="application/pdf" />
                <span class="badge bg-primary">
                  File harus berupa PDF
                </span>
              </div>
            </div>
            <div class="row g-3 pt-4 mt-4 mb-4">
              <div class="text-end">
                <button type="submit" class="btn btn-primary col-md-3">
                  <i class="ri-file-edit-line"></i>
                  Perbaharui data MWCNU
                </button>
              </div>
            </div>
          </form>
          <!-- End Multi Columns Form -->
        </div>
        <div class="tab-pane fade" id="pills-data-pimpinan" role="tabpanel" aria-labelledby="data-pimpinan-tab">
          <!-- Multi Columns Form -->
          <form method="POST" action="{{route('pimpinan')}}">
            @csrf
            <div class="row g-3 mt-4">
              <div class="col-md-4">
                <label for="inputName5" class="form-label">
                  Nama Lengkap
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="nama_pengurus" class="form-control" id="inputName5" required />
              </div>
              <div class="col-md-4">
                <label for="input-jabatan" class="form-label">
                  Jabatan
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="jabatan" class="form-control" id="input-jabatan" required />
              </div>
              <div class="col-md-4">
                <label for="input-nik" class="form-label">
                  No KTP Ketua MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="no_ktp" class="form-control" id="input-nik" required />
              </div>
            </div>

            <div class="row g-3 pt-4">
              <div class="col-md-4">
                <label for="input-tlp" class="form-label">
                  No HP Ketua MWC
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" name="no_telp" class="form-control" id="input-tlp" required />
              </div>
              <div class="col-md-4">
                <label for="input-ktp" class="form-label">
                  File KTP Ketua
                  <sup class="text-danger">*</sup>
                </label>
                <input type="file" name="file_ktp" class="form-control" id="input-ktp" required accept="application/pdf" />
                <span class="badge bg-primary">
                  File harus berupa PDF
                </span>
              </div>
            </div>

            <div class="row g-3 pt-4">
              <div class="col-md-12">
                <label for="input-alamat-ketua" class="form-label">
                  Alamat Ketua Sesuai KTP
                  <sup class="text-danger">*</sup>
                </label>
                <div class="col-sm-10">
                  <textarea id="input-alamat-ketua" name="alamat_ktp" class="form-control" style="height: 100px"></textarea>
                </div>
              </div>
            </div>
            <div class="row g-3 pt-4 mt-4 mb-4">
              <div class="text-end">
                <button type="submit" class="btn btn-primary col-md-3">
                  <i class="ri-file-edit-line"></i>
                  Perbaharui data MWCNU
                </button>
              </div>
            </div>
          </form>
          <!-- End Multi Columns Form -->
        </div>
        <div class="tab-pane fade" id="pills-data-operator" role="tabpanel" aria-labelledby="data-operator-tab">
          <!-- Multi Columns Form -->
          <form>
            <div class="row g-3 mt-4">
              <div class="col-md-4">
                <label for="inputName5" class="form-label">
                  Nama Lengkap
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="inputName5" required />
              </div>

              <div class="col-md-4">
                <label for="input-nik" class="form-label">
                  No KTP Operator MWCNU
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-nik" required />
              </div>

              <div class="col-md-4">
                <label for="input-tlp" class="form-label">
                  No HP Operator MWC
                  <sup class="text-danger">*</sup>
                </label>
                <input type="text" class="form-control" id="input-tlp" required />
              </div>
            </div>

            <div class="row g-3 pt-4">
              <div class="col-md-12">
                <label for="input-alamat-operator" class="form-label">
                  Alamat Operator Sesuai KTP
                  <sup class="text-danger">*</sup>
                </label>
                <div class="col-sm-10">
                  <textarea id="input-alamat-operator" class="form-control" style="height: 100px"></textarea>
                </div>
              </div>
            </div>
            <div class="row g-3 pt-4 mt-4 mb-4">
              <div class="text-end">
                <button type="submit" class="btn btn-primary col-md-3">
                  <i class="ri-file-edit-line"></i>
                  Perbaharui data MWCNU
                </button>
              </div>
            </div>
          </form>
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