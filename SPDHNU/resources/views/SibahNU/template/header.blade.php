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

<body x-data="{isLoading: false}">
 @include('sweetalert::alert')
  <!-- ======= Header ======= -->
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
  @include('SibahNU.template.sidebar')
  <main id="main" class="main">
    <div class="pagetitle text-success">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="col-lg-12">
        <!-- Default Card -->
        <div class="card">
          <div class="card-body">
            <p class="mt-3">
              Hi,
              <strong> @if (session()->has('logged','id_user'))
                {{$user->nama}}
                @endif
              </strong>
              Sebelum masuk ke tahap selanjutnya, silahkan lengkapi dahulu
              identitas MWCNU Dibawah ini
            </p>

            <p>Keterangan:</p>
            <ul>
              <li>
                Tanda Bintang merah seperti (
                <sup class="text-danger">*</sup>
                ) artinya wajib diisi
              </li>
              <li>
                File yang diupload maksimal
                <strong>2 MB</strong>
              </li>
              <li>
                Ekstention File yang harus diupload akan terlihat dibawah
                inputan
              </li>
            </ul>
          </div>
        </div>
        <!-- End Default Card -->
      </div>

      <div class="col-lg-12">
