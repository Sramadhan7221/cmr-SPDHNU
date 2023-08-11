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
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
   <!-- Template Main CSS File -->
   <link href="{{asset('css/style.css')}}" rel="stylesheet" />
   <link rel="stylesheet" href="{{asset('build/assets/app-bb628048.css')}}">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body x-data="{isLoading: false}">
   @include('sweetalert::alert')
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
   <!-- End Header -->

   <!-- ======= Sidebar ======= -->
   @include('SibahNU.template.sidebar')
   <!-- End Sidebar-->
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Admin</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            </ol>
         </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
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

         <div class="modal fade" id="moodal-detail" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Detail MWC NU</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row mt-3">
                        <div class="col-md-12">
                        <label for="nama_lembaga" class="form-label d-flex justify-content-start">
                           Nama Lembaga
                        </label>
                        <input type="text" class="form-control" id="nama_lembaga" readonly />
                        </div>
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-12">
                        <label for="alamat_lembaga" class="form-label d-flex justify-content-start">
                           Alamat Lembaga
                        </label>
                        <input type="text" class="form-control" id="alamat_lembaga" readonly />
                        </div>
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-6">
                        <label for="no_telp" class="form-label d-flex justify-content-start">
                           No Telp
                        </label>
                        <input type="text" class="form-control" id="no_telp" readonly />
                        </div>
                        <div class="col-md-6">
                        <label for="email_lembaga" class="form-label d-flex justify-content-start">
                           Email Lembaga
                        </label>
                        <input type="text" class="form-control" id="email_lembaga" readonly />
                        </div>
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-12">
                        <label class="form-label d-flex justify-content-start">
                           Kop Surat
                        </label>
                        <img src="#" type="application/pdf" class="img-fluid" id="kop_surat" />
                        </div>
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-12">
                        <label class="form-label d-flex justify-content-start">
                           Surat Domisili
                        </label>
                        <embed src="#" type="application/pdf" width="100%" height="600px" id="domisili" />
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     
                  </div>
                  </form>
               </div>
            </div>
         </div>

         <div class="col-lg-12">
            <!-- Card with header and footer -->
            <div class="card">
               <div class="card-body">
                  <h5 class="card-title">Daftar Riwayat Hibah</h5>

                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col" width="20%">Nama MWC NU</th>
                           <th scope="col" width="20%">Kecamatan</th>
                           <th scope="col" width="20%">Alamat</th>
                           <th scope="col" width="10%" class="text-center">Status</th>
                           <th scope="col" width="20%" class="text-center">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($lembaga_list as $item)
                        <tr>
                           <td>{{ $item->nama_mwc }}</td>
                           <td>{{ $item->kecamatan ?? "" }}</td>
                           <td>{{ $item->alamat_lembaga ?? "" }}</td>
                           <td class="text-center">{!! $item->status !!}</td>
                           <td>
                              <div class="col-md-12">
                                 <div class="col-md-3">
                                    <button type="button" class="b-detail btn btn-outline-primary" data-item="{{ $item->id_lembaga }}">Detail</button>

                                 </div>
                              </div>
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
<script>
   $(document).on('click','.b-detail', function () {
      var id_lembaga = $(this).attr("data-item");
      $.get(`{{ route('adminMwcDetail')}}?id_lembaga=${id_lembaga}`, function (o) {
         var kop_surat = "{{ asset('SPDHNU/public/storage/'."+o.kop_surat+") }}";
         var domisili = "{{ asset('SPDHNU/public/storage/'."+o.domisili+") }}";

         $("#nama_lembaga").val(o.nama_lembaga);
         $("#alamat_lembaga").val(o.alamat_lembaga);
         $("#no_telp").val(o.no_telp);
         $("#email_lembaga").val(o.email_lembaga);
         $("#kop_surat").attr("src",kop_surat);
         $("#domisili").attr("src",domisili);

         $("#moodal-detail").modal('show');
      });
   })
</script>