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
    </ul>
    <button class="px-4 py-2 w-full mx-auto hover:bg-cyan-400/10 text-cyan-900 font-bold mt-96">
        <a class="" href="{{route('logout')}}" data-confirm-delete=" true ">
          <i class="ri-file-copy-2-line"></i>
          <span>Log Out</span>
        </a>
    </button>
  </aside>
  <!-- End Sidebar-->
