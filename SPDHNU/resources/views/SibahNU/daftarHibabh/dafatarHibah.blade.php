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

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>

<body>
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
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('SibahNU.template.sidebar')
  <!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Permohonan Hibah</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item text-success">Permohonan</li>
          <li class="breadcrumb-item active">Daftar Hibah</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Filter Daftar Hibah</h5>
            <div class="row">
              <div class="col-lg-3">
                <label for="filter-by-years" class="form-label d-flex justify-content-start">
                  Berdasarkan Tahun Anggaran
                </label>
                <select id="filter-by-years" class="form-select">
                  @foreach($tahun as $item)
                  @if($item == date('Y'))
                  <option value="{{$item}}" selected>{{ $item }}</option>
                  @else
                  <option value="{{$item}}">{{ $item }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="text-end">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mohon-hibah">
                <i class="ri-file-edit-line"></i>
                Daftar Hibah
              </button>
            </div>

            <div class="modal fade" id="mohon-hibah" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Permohonan Hibah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <label for="peruntukan" class="form-label d-flex justify-content-start">
                            No NPHD
                            <sup class="text-danger">*</sup>
                          </label>
                          <input type="text" class="form-control" name="no_NPHD" required />
                          <input type="hidden" name="id_proposal"/>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <label for="peruntukan" class="form-label d-flex justify-content-start">
                            Peruntukan
                            <sup class="text-danger">*</sup>
                          </label>
                          <input type="text" class="form-control" name="peruntukan" required />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <label for="lembaga" class="form-label d-flex justify-content-start">
                            Sumber Dana Hibah
                            <sup class="text-danger">*</sup>
                          </label>
                          <input type="text" class="form-control" name="sumber_dana" required />
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-md-12">
                          <label for="tahun" class="form-label d-flex justify-content-start">
                            Tahun
                            <sup class="text-danger">*</sup>
                          </label>
                          <select id="tahun" name="tahun" class="form-select">
                            @foreach($tahun as $item)
                              @if($item == date('Y'))
                                <option value="{{$item}}" selected>{{ $item }}</option>
                              @elseif((int)$item > (int)date('Y'))
                                <option value="{{$item}}">{{ $item }}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <label for="nilai_pengajuan" class="form-label d-flex justify-content-start">
                            Jumlah
                            <sup class="text-danger">*</sup>
                          </label>
                          <input type="text" class="form-control" name="nilai_pengajuan" required />
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <label for="file_proposal" class="form-label">
                            File Proposal
                            <sup class="text-danger">*</sup>
                          </label>
                          <input type="file" name="file_proposal" class="form-control" id="file_proposal" required accept="application/pdf" />
                          <span class="badge bg-primary">
                            File harus berupa PDF
                          </span>
                          <button type="button" class="btn btn-outline-success" id="display_file">
                            <i class="fa-solid fa-file-pdf"></i>
                            Lihat file
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                      <i class="ri-file-edit-line"></i>
                      Simpan data
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="display-file_tabungan" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
              <embed id="file_display" src="" type="application/pdf" width="100%" height="600px" />
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <!-- Card with header and footer -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Kelengkapan Identitas MWCNU</h5>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Sumber Dana Hibah</th>
                  <th scope="col">Lembaga</th>
                  <th scope="col">Alamat Lembaga</th>
                  <th scope="col">Peruntukan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">File</th>
                  <!-- <th scope="col">Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach($proposals as $item)
                <tr>
                  <td>{{ $item->sumber_dana }}</td>
                  <td>{{ $item->nama_lembaga }}</td>
                  <td>{{ $item->alamat_lembaga }}</td>
                  <td>{{ $item->peruntukan }}</td>
                  <td>{{ $item->tahun }}</td>
                  <td>{{ $item->nilai_pengajuan }}</td>
                  <td>
                    <a class="btn btn-outline-success" href="{{ asset('storage/'.$item->file_proposal) }}">Lihat</a>
                  </td>
                  <td>
                    <a class="btn btn-primary" href="{{route('bank')}}">
                      Detail
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
        <!-- End Card with header and footer -->
      </div>
    </section>
  </main>
  <!-- End #main -->
</body>
@include('SibahNU.template.footer')