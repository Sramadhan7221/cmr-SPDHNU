<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  @vite('resources/js/index.js')
  <title>LOGIN</title>
</head>

<body>
  <section class="h-screen">
    <div class="h-full lg:w-[1000px] mx-auto">
      <!-- Left column container with background-->
      <div class="flex h-full flex-wrap items-center justify-center">
        <div class="shrink-1 w-full mx-8 mb-4 lg:mx-0 lg:mb-0 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12">
          <img src="https://tse1.mm.bing.net/th/id/OIP.CRQFoZJdpELDLXrankr5SQHaE-?pid=ImgDet&rs=1" class="w-[300px]" alt="Sample image" />
          <h1 class="text-xl font-semibold mb-8">SIBAHNU TASIKMALAYA</h1>
          <p>SIBAHNU (Sistem Informasi Hibah Nahdlathul Ulama) merupakan aplikasi pengelolaan data dari dana hibah.</p>
        </div>
        @include('sweetalert::alert')
        <!-- Right column container -->
        <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 w-full mx-6">
          <form method="POST" class="bg-slate-100 p-6 lg:w-[500px]" action="{{route('register')}}">
            @csrf
            <!--Sign in section-->
            <!-- Email input -->
            <div class="lg:flex w-full gap-6">
              <div class="mb-6 flex flex-col">
                <label for="kecamatan">Kecamatan
                </label>
                <select name="kecamatan" id="kecamatan" placeholder="" class="border-2 border-slate-400 w-[205px] px-3 py-2 rounded-lg mt-2 active:border-green-700">
                  <option value="0">--Pilih Kecamatan--</option>
                  @foreach ($kecamatan as $item)
                  <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Password input -->
              <div class="flex flex-col mb-6">
                <label for="nama_mwc">MWCNU
                </label>
                <input type="text" class="mt-2 w-full py-2 px-3 border-2 border-slate-400 rounded-lg" id="nama_mwc" name="nama_mwc" placeholder="Pilih MWCNU" />
              </div>

              <!-- Login button -->
            </div>
            <div class="lg:flex gap-6">
              <div class="mb-6 flex flex-col">
                <label for="nik">Nomor Induk Kependudukan
                </label>
                <input type="text" name="nik" class="border-2 border-slate-400 w-full px-3 py-2 rounded-lg mt-2 active:border-green-700" placeholder="Masukan NIK" />
              </div>

              <!-- Password input -->
              <div class="flex flex-col mb-6">
                <label for="nama">Nama Lengkap
                </label>
                <input type="text" class="mt-2 w-full py-2 px-3 border-2 border-slate-400 rounded-lg" name="nama" placeholder="Masukan Nama Lengkap" />
              </div>

              <!-- Login button -->
            </div>
            <div class="lg:flex gap-6">
              <div class="mb-6 flex flex-col">
                <label for="email">Email
                </label>
                <input type="text" name="email" class="border-2 border-slate-400 w-full px-3 py-2 rounded-lg mt-2 active:border-green-700" placeholder="Masukan Email" />
              </div>

              <!-- Password input -->
              <div class="flex flex-col mb-6">
                <label for="no_telp">No Handphone
                </label>
                <input type="text" class="mt-2 w-full py-2 px-3 border-2 border-slate-400 rounded-lg" name="no_telp" placeholder="Masukan No Handphone" />
              </div>

              <!-- Login button -->
            </div>
            <div class="lg:flex gap-6">
              <div class="mb-6 flex flex-col">
                <label for="password">Kata Sandi
                </label>
                <input type="password" name="password" class="border-2 border-slate-400 w-full px-3 py-2 rounded-lg mt-2 active:border-green-700" placeholder="Masukan Kata Sandi" />
              </div>

              <!-- Password input -->
              <div class="flex flex-col mb-6">
                <label for="password">Konfirmasi Kata Sandi
                </label>
                <input type="password" class="mt-2 w-full py-2 px-3 border-2 border-slate-400 rounded-lg" name="konfirmpassword" placeholder="Konfirmasi Kata Sandi" />
              </div>

              <!-- Login button -->
            </div>
            <div class="text-center lg:text-left">
              <button type="submit" class="bg-green-600 px-4 py-1 text-lg text-white rounded-md w-full">
                Daftar
              </button>
            </div>
            <div class="flex gap-2 mt-3">
              <p>Sudah mempunyai akun?</p><a href="{{route('login')}}" class="text-cyan-600">Login?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  $("#kecamatan").change(function() {
    $("#nama_mwc").val(`MWC ${$(this).find(":selected").text()}`)
  })
</script>

</html>