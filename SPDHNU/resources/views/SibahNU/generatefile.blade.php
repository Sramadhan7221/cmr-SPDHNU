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
        <link rel="stylesheet" href="{{asset('build/assets/app-bb628048.css')}}">
      </head>

  <body>
    <!-- ======= Header ======= -->
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
            <span class="d-none text-green-800 d-lg-block">PCNU<br>Kab.Tasikmalaya</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn "></i>
        </div>
        <!-- End Logo -->
      </header>
    @include('SibahNU.template.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Cetak File</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Permohonan</li>
              <li class="breadcrumb-item active">Cetak File</li>
            </ol>
          </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
          <div class="col-lg-12">
            <!-- Default Card -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Silahkan pilih file yang akan anda cetak atau unduh
                </h5>

                <p class="text-danger"><i><b>*</b>Pastikan anda telah mengisi formulir daftar hibah</i></p>
                <table class="table">
                  <thead>
                    <tr>
                      <td scope="col">Surat Permohonan Pencairan</td>
                      <td>
                        <a href="{{route('permohonan-pencairan')}}">
                            <button class="btn btn-outline-primary">
                                <i class="bi bi-download"></i>
                            </button>
                        </a>
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- <tr>
                      <td scope="col">Rincian RAB</td>
                      <td>
                        <a href="{{route('rincian_rab')}}">
                            <button type="button" class="btn btn-outline-primary">
                              <i class="bi bi-download"></i>
                            </button>
                        </a>
                        <button type="button" class="btn btn-outline-success">
                          <i class="bi bi-printer"></i>
                        </button>
                      </td>
                    </tr> --}}
                    <tr>
                      <td scope="col">Fakta Integritas</td>
                      <td>
                        <a href="{{route('fakta_integritas')}}">
                            <button type="button" class="btn btn-outline-primary">
                            <i class="bi bi-download"></i>
                            </button>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td scope="col">Surat Pernyataan</td>
                      <td>
                        <a href="{{route('surat_pernyataan')}}">
                            <button type="button" class="btn btn-outline-primary">
                              <i class="bi bi-download"></i>
                            </button>
                        </a>
                      </td>
                    </tr>

                    <tr>
                      <td scope="col">Surat Pernyataan Keabsahan Dokumen</td>
                      <td>
                        <a href="{{route('surat_keabsahan')}}">
                            <button type="button" class="btn btn-outline-primary">
                              <i class="bi bi-download"></i>
                            </button>
                        </a>
                      </td>
                    </tr>
                    {{-- <tr>
                      <td scope="col">Naskan Perjanjian Hibah Daerah</td>
                      <td>
                        @foreach ($rab_list as $value)
                        <a href="{{route('naskah_perjanjian',$value->id_proposal)}}">
                            <button type="button" class="btn btn-outline-primary">
                              <i class="bi bi-download"></i>
                            </button>
                        </a>
                        @endforeach
                      </td>
                    </tr> --}}
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card">
                <div class="card-title ml-4 pl-3">Naskah Perjanjian Hibah</div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="py-4" scope="col">No</th>
                        <th class="py-4" scope="col">Nama</th>
                        <th class="py-4" scope="col"></th>
                        <th class="py-4" scope="col"></th>
                        <th class="py-4" scope="col"></th>
                        <th class="py-4" scope="col"></th>
                        <th class="py-4 text-center" scope="col">Aksi</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rab_list as $key => $value)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>Naskah Perjanjian Hibah {{$value->peruntukan}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <div class="row d-flex justify-content-center">
                            <a href="{{route('naskah_perjanjian',$value->id_proposal)}}" class="col-sm-2 mx-2 ml-0">
                              <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-download"></i>
                              </button>
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            <!-- End Default Card -->
            <div class="card">
              <div class="card-title ml-4 pl-3">Surat Rincian RAB</div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="py-4" scope="col">No</th>
                      <th class="py-4" scope="col">Nomor NPHD</th>
                      <th class="py-4" scope="col">Proposal</th>
                      <th class="py-4" scope="col">Tahun</th>
                      <th class="py-4" scope="col">MWCNU</th>
                      <th class="py-4" scope="col">Nilai</th>
                      <th class="py-4 text-center" scope="col">Aksi</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rab_list as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->no_NPHD}}</td>
                      <td>{{$value->peruntukan}}</td>
                      <td>{{$value->tahun}}</td>
                      <td>{{$value->nama_lembaga}}</td>
                      <td>Rp. {{number_format($value->nilai_pengajuan,0,',','.')}}</td>
                      <td>
                        <div class="row d-flex justify-content-center">
                          <a href="{{route('rincian_rab',$value->id_proposal)}}" class="col-sm-2 mx-2 ml-0">
                            <button type="button" class="btn btn-outline-primary">
                              <i class="bi bi-download"></i>
                            </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </main>
      @include('SibahNU.template.footer')
  </body>
