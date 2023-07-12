<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Components / Tabs - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>
<body>
    @include('sweetalert::alert')
    <main id="main" class="main">
        <template x-if="isLoading">
        <div class="fixed inset-0 z-[100] bg-white">
            <div class="flex h-screen w-full items-center justify-center bg-gray-100">
              <div class="custom-loader"></div>
            </div>
          </div>
        </template>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo d-flex align-items-center">
              <img src="{{asset('aseets/logo.png')}}" alt="" />
              <span class="d-none text-green-800 d-lg-block">PCNU Tasikmalaya</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn "></i>
        </div>
        <!-- End Logo -->
    </header>
    @include('SibahNU.template.sidebar')
    <div class="pagetitle">
      <h1>Detail Data Hibah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Permohonan</li>
          <li class="breadcrumb-item active">Detail Hibah</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="col-lg-12">
        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">informasi Data Hibah #150</h5>
            <table class="table">
              <thead>
                <tr>
                  <td scope="col">NO PJBR</td>
                  <td>150</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col">Sub Kegiatan</td>
                  <td>Pengelolaan Sarana dan Prasarana Spiritual</td>
                </tr>
                <tr>
                  <td scope="col">Lembaga</td>
                  <td>PST Cipasung</td>
                </tr>
                <tr>
                  <td scope="col">Alamat Lembaga</td>
                  <td>Jl. KH.Ruhiat no 1 Cipasung</td>
                </tr>

                <tr>
                  <td scope="col">Peruntukan</td>
                  <td></td>
                </tr>
                <tr>
                  <td scope="col">Tahun</td>
                  <td>2023</td>
                </tr>

                <tr>
                  <td scope="col">Jumlah</td>
                  <td>Rp. 10.000.000.-</td>
                </tr>
                <tr>
                  <td scope="col">Status</td>
                  <td>
                    <button type="button" class="btn btn-light">
                      <span class="badge text-primary">
                        Menunggu Pengisian
                      </span>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
        <!-- End Default Card -->
      </div>

      <div class="col-lg-12">
        <!-- Card with header and footer -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Kelengkapan Identitas MWCNU</h5>

            <!-- Pills Tabs -->
            <ul
              class="nav nav-pills mb-3 mt-4 gap-3"
              id="pills-tab"
              role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="pills-pengkinian-data-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-pengkinian-data"
                  type="button"
                  role="tab"
                  aria-controls="pills-pengkinian-data"
                  aria-selected="true">
                  <i class="ri-file-copy-2-line"></i>
                  Pengkinian Data
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-proposal-awal-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-proposal-awal"
                  type="button"
                  role="tab"
                  aria-controls="pills-proposal-awal"
                  aria-selected="false">
                  <i class="ri-file-copy-2-line"></i>
                  Proposal Awal
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-rab-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-rab"
                  type="button"
                  role="tab"
                  aria-controls="pills-rab"
                  aria-selected="false">
                  <i class="ri-file-copy-2-line"></i>
                  RAB
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-history-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-history"
                  type="button"
                  role="tab"
                  aria-controls="pills-history"
                  aria-selected="false">
                  <i class="ri-file-copy-2-line"></i>
                  History / Pelacakan
                </button>
              </li>
            </ul>

            <div class="card bg-primary">
              <div class="card-body text-light text-center mt-3">
                Silahkan isi atau lengkapi data dibawah ini
              </div>
            </div>

            <div class="tab-content pt-2" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="pills-pengkinian-data"
                role="tabpanel"
                aria-labelledby="pengkinian-data-tab">
                <!-- Multi Columns Form -->
                <form method="POST" action="{{route('addDataBank')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="row g-3">
                    <div class="col-md-3">
                      <label for="input-bank" class="form-label">
                        Bank
                        <sup class="text-danger">*</sup>
                      </label>
                      <select id="input-bank" class="form-select" name="bank" >
                        <option selected value="{{$dataBank->bank}}">Choose...</option>
                        <option value="BANK BNI">BNI</option>
                        <option value="BANK BRI">BRI</option>
                        <option value="BANK BSI">BSI</option>
                        <option value="BANK MANDIRI">MANDIRI</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="input-rekening" class="form-label">
                        No Rekening
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="input-rekening"
                        name="no_rek"
                        value="{{$dataBank->no_rek}}"
                        required />
                    </div>
                    <div class="col-md-3">
                      <label for="input-nama-rekening" class="form-label">
                        Nama Lembaga di Rekening
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="input-nama-rekening"
                        name="nama_rekening"
                        value="{{$dataBank->nama_rekening}}"
                        required />
                    </div>
                    <div class="col-md-3">
                      <label for="input-cabang-bank" class="form-label">
                        Cabang Bank
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="input-cabang-bank"
                        name="cabang_bank"
                        value="{{$dataBank->cabang_bank}}"
                        required />
                    </div>
                  </div>

                  <div class="row g-3 pt-4">
                    <div class="col-md-6">
                      <label for="input-buku-tabungan" class="form-label">
                        File Buku Tabungan
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="file"
                        name="file_buku_tabungan"
                        class="form-control"
                        id="input-buku-tabungan"
                        required
                        accept="application/pdf" />
                      <span class="badge bg-primary">
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
                      <button type="submit" class="btn btn-primary col-md-3">
                        <i class="ri-file-edit-line"></i>
                        Simpan Data Pengkinian
                      </button>
                    </div>
                  </div>
                </form>
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
                <!-- End Multi Columns Form -->
              </div>

              <div
                class="tab-pane fade"
                id="pills-proposal-awal"
                role="tabpanel"
                aria-labelledby="proposal-awal-tab">
                <!-- Multi Columns Form -->
                <form method="POST" action="{{route('addProposal')}}" enctype="multipart/form-data">
                 @csrf
                  <div class="row g-3 mt-4">
                    <div class="col-md-4">
                      <label for="input-peruntukan-dana" class="form-label">
                        Peruntukan Dana
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="input-peruntukan-dana"
                        name="peruntukan"
                        value="{{$dataProposal->peruntukan}}"
                        required />
                    </div>
                    <div class="col-md-4">
                      <label for="input-nphd" class="form-label">
                        No Surat NPHD dari MWCNU
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="input-nphd"
                        name="no_NPHD"
                        value="{{$dataProposal->no_NPHD}}"
                        required />
                    </div>
                    <div class="col-md-4">
                      <label for="input-nik" class="form-label">
                        File Proposal
                        <sup class="text-danger">*</sup>
                      </label>
                      <input
                        type="file"
                        class="form-control"
                        id="input-nik"
                        name="file_proposal"
                        value="{{$dataProposal->file_proposal}}"
                        required
                        accept="application/pdf" />
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
              <div
                class="tab-pane fade"
                id="pills-rab"
                role="tabpanel"
                aria-labelledby="rab-tab">
                <!-- Multi Columns Form -->

                <div class="text-end">
                  <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#verticalycentered">
                    <i class="ri-file-edit-line"></i>
                    Tambah RAB
                  </button>
                </div>
                <div class="modal fade" id="verticalycentered" tabindex="-1">
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
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="row g-3">
                            <div class="col-md-12">
                              <label
                                for="input-nama-surat"
                                class="form-label d-flex justify-content-start">
                                Nama Uraian Kegiatan
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-nama-surat"
                                required />
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="submit"
                          class="btn btn-primary"
                          data-bs-dismiss="modal">
                          <i class="ri-file-edit-line"></i>
                          Simpan data
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Uraian</th>
                      <th scope="col">Volume / Satuan</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Total</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><strong>Peralatan</strong></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <button
                          type="button"
                          class="btn btn-outline-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#add-sub-kegiatan">
                          <i class="bi bi-plus-lg"></i>
                        </button>
                        <button
                          type="button"
                          class="btn btn-outline-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#edit-sub-kegiatan">
                          <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger">
                          <i class="bi bi-trash"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>1.1</td>
                      <td>PC CPU</td>
                      <td>1 Unit</td>
                      <td>Rp. 13.000.000.-</td>
                      <td>Rp. 13.000.000.-</td>
                      <td>
                        <button type="button" class="btn btn-outline-primary">
                          <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger">
                          <i class="bi bi-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="modal fade" id="add-sub-kegiatan" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Sub Kegiatan</h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="row g-3">
                            <div class="col-md-12">
                              <label
                                for="input-uraian"
                                class="form-label d-flex justify-content-start">
                                Uraian Kegiatan / Pengelompokan Pengeluaran
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-uraian"
                                required
                                disabled
                                placeholder="Peralatan" />
                            </div>
                          </div>
                          <div class="row g-3 mt-2">
                            <div class="col-md-12">
                              <label
                                for="input-sub-uraian"
                                class="form-label d-flex justify-content-start">
                                Nama Uraian Kegiatan
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-sub-uraian"
                                required />
                            </div>
                          </div>

                          <div class="row g-3 mt-2">
                            <div class="col-md-8">
                              <label
                                for="input-sub-uraian"
                                class="form-label d-flex justify-content-start">
                                Volume / Satuan
                                <sup class="text-danger">*</sup>
                              </label>
                              <div
                                class="d-flex justify-content-start"
                                id="input-sub-uraian">
                                <input
                                  type="text"
                                  class="form-control"
                                  required />
                                <select class="form-select">
                                  <option selected>Unit</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row g-3 mt-2">
                            <div class="col-md-8">
                              <label
                                for="input-harga"
                                class="form-label d-flex justify-content-start">
                                Harga
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-harga"
                                required />
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="submit"
                          class="btn btn-primary"
                          data-bs-dismiss="modal">
                          <i class="ri-file-edit-line"></i>
                          Simpan data
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="edit-sub-kegiatan" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Sub Kegiatan</h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="row g-3">
                            <div class="col-md-12">
                              <label
                                for="input-uraian"
                                class="form-label d-flex justify-content-start">
                                Uraian Kegiatan / Pengelompokan Pengeluaran
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-uraian"
                                required
                                disabled
                                placeholder="Peralatan" />
                            </div>
                          </div>
                          <div class="row g-3 mt-2">
                            <div class="col-md-12">
                              <label
                                for="input-sub-uraian"
                                class="form-label d-flex justify-content-start">
                                Nama Uraian Kegiatan
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-sub-uraian"
                                required />
                            </div>
                          </div>

                          <div class="row g-3 mt-2">
                            <div class="col-md-8">
                              <label
                                for="input-sub-uraian"
                                class="form-label d-flex justify-content-start">
                                Volume / Satuan
                                <sup class="text-danger">*</sup>
                              </label>
                              <div
                                class="d-flex justify-content-start"
                                id="input-sub-uraian">
                                <input
                                  type="text"
                                  class="form-control"
                                  required />
                                <select class="form-select">
                                  <option selected>Unit</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row g-3 mt-2">
                            <div class="col-md-8">
                              <label
                                for="input-harga"
                                class="form-label d-flex justify-content-start">
                                Harga
                                <sup class="text-danger">*</sup>
                              </label>
                              <input
                                type="text"
                                class="form-control"
                                id="input-harga"
                                required />
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="submit"
                          class="btn btn-primary"
                          data-bs-dismiss="modal">
                          <i class="ri-file-edit-line"></i>
                          Simpan data
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="pills-history"
                role="tabpanel"
                aria-labelledby="history-tab">
                <!-- Table with stripped rows -->

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Jenis</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Pengajuan</td>
                      <td>Pengajuan Dana Hibah</td>
                      <td>12 Juni 2023</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
              </div>
            </div>
            <!-- End Pills Tabs -->
          </div>
        </div>
        <!-- End Card with header and footer -->
        <div class="d-grid">
          <button type="button" class="btn btn-warning mt-2">
            <i class="ri-send-plane-fill"></i>
            Submit Data Untuk Dilakukan Verifikasi !
          </button>
        </div>
      </div>
    </section>
  </main>
@include('SibahNU.template.footer')
</body>
