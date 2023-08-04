 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
    @if(session()->has('logged','id_user'))
      <li class="nav-item">
        <a class="nav-link collapsed" x-on:click="isLoading = true" href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      @endif
      <li class="nav-heading">Permohonan</li>
      <li class="nav-item">
        <a class="nav-link collapsed" x-on:click="isLoading = true" href="{{route('daftarHibah')}}">
            <i class="fa-solid fa-paste"></i>
          <span>Daftar Hibah</span>
        </a>
      </li>
      <!-- End Hibah Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" x-on:click="isLoading = true" href="{{route('generateFile')}}">
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
