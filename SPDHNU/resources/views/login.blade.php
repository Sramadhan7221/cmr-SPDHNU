<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('build/assets/app-bb628048.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/app-0d91dc04.js')}}">
    <title>LOGIN</title>
</head>
<body>
    <section class="h-screen">
        <div class="h-full lg:w-[1000px] mx-auto">
            <!-- Left column container with background-->
            <div
            class="g-6 flex h-full flex-wrap items-center justify-center">
            <div
              class="shrink-1 w-full mx-8 mb-4 lg:mx-0 lg:mb-0 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
              <img
                src="https://tse1.mm.bing.net/th/id/OIP.CRQFoZJdpELDLXrankr5SQHaE-?pid=ImgDet&rs=1"
                class="w-[300px]"
                alt="Sample image" />
                <h1 class="text-xl font-semibold mb-8">SIBAHNU TASIKMALAYA</h1>
                <p>SIBAHNU (Sistem Informasi Hibah Nahdlathul Ulama) merupakan aplikasi pengelolaan data dari dana hibah.</p>
            </div>
            @include('sweetalert::alert')
            <!-- Right column container -->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-fit xl:w-5/12 w-full mx-6">
              <form method="POST" class="bg-slate-100 p-6" action="{{route('login')}}">
                @csrf
                <!--Sign in section-->
                <!-- Email input -->
                <div class="mb-6 flex flex-col">
                    <label
                      for="email"
                      >Email address
                    </label>
                  <input
                    type="text"
                    name="email"
                    class="border-2 border-slate-400 w-full px-3 py-2 rounded-lg mt-2 active:border-green-700"
                    placeholder="Email address" />
                </div>

                <!-- Password input -->
                <div class="flex flex-col mb-6">
                    <label
                      for="password"
                      >Password
                    </label>
                  <input
                    type="password"
                    class="mt-2 w-full py-2 px-3 border-2 border-slate-400 rounded-lg"
                    name="password"
                    placeholder="Password" />
                </div>

                <!-- Login button -->
                <div class="text-center lg:text-left">
                  <button
                    type="submit"
                    class="bg-green-600 px-4 py-1 text-lg text-white rounded-md w-full">
                    Login
                  </button>
                </div>
                {{-- <div class="flex gap-2 mt-3">
                    <p>Belum mempunyai akun?</p><a href="{{route('register')}}" class="text-cyan-600">Daftar Sekarang?</a>
                </div> --}}
              </form>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
