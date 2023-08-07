<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>SIBAHNU-MediaNu</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="{{asset('aseets/logo.png')}}" rel="icon" />
  <link href="{{asset('aseets/logo.png')}}" rel="apple-touch-icon" />

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

<body x-data="{isLoading: false}">
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
          <li class="breadcrumb-item active">{{ $actived_menu }}</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="col-lg-12">
        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">informasi Data Hibah</h5>
            <table class="table">
              <thead>
                <tr>
                  <td scope="col">NO NHPD</td>
                  <td>{{$proposal->no_NPHD}}</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col">Sumber Dana Hibah</td>
                  <td>{{ $proposal->sumber_dana }}</td>
                </tr>
                <tr>
                  <td scope="col">Lembaga</td>
                  <td>{{ $proposal->nama_lembaga}}</td>
                </tr>
                <tr>
                  <td scope="col">Alamat Lembaga</td>
                  <td>{{ $proposal->alamat_lembaga }}</td>
                </tr>

                <tr>
                  <td scope="col">Peruntukan</td>
                  <td>{{ $proposal->peruntukan}}</td>
                </tr>
                <tr>
                  <td scope="col">Tahun</td>
                  <td>{{ $proposal->tahun }}</td>
                </tr>
                <tr>
                  <td scope="col">Jumlah</td>
                  <td>Rp {{ number_format($proposal->nilai_pengajuan,0,',','.')}}</td>
                </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
        <!-- End Default Card -->
      </div>