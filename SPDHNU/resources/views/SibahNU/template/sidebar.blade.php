 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-heading">Permohonan</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('daftarHibah')}}">
          <i class="ri-file-copy-2-line"></i>
          <span>Daftar Hibah</span>
        </a>
      </li>
      <!-- End Hibah Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('generateFile')}}">
          <i class="bi bi-printer-fill"></i>
          <span>Cetak file</span>
        </a>
      </li>
    </ul>
    <a class="" href="{{route('logout')}}" data-confirm-delete=" true ">
    <button class="px-4 py-2 w-full mx-aut mt-80  btn btn-outline-success">
          <i class="ri-file-copy-2-line"></i>
          <span>Log Out</span>
        </button>
    </a>
  </aside>
  <!-- End Sidebar-->
