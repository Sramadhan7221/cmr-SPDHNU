<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css" media="all">
    <title>Document</title>
</head>
<body>
    <body class="w-[700px] mx-auto">
        <header>
            <div class="text-center">
                <p>FAKAT INTEGRITAS PENERIMA HIBAH</p>
            </div>
        </header>
        <section class="mt-6">
            <p>Yang bertanda tangan dibawah ini : </p>
            <ul class="">
                <div class="text-cyan-600">
                    <li>Nama Ketua MWCNU</li>
                    <li> : {{$pengurus->nama_pengurus}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Jabatan </li>
                    <li> : {{$pengurus->jabatan}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Nomor KTP </li>
                    <li> : {{$pengurus->no_ktp}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Alamat Sesuai KTP </li>
                    <li> : {{$pengurus->alamat_ktp}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Bertindak Untuk dan Atas Nama </li>
                    <li> : {{$user->nama_mwc}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Alamat Lembaga </li>
                    <li> : {{$lembaga->alamat_lembaga}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Telepon/HP </li>
                    <li> : {{$lembaga->no_telp}}</li>
                </div>
                <div class="flex justify-between">
                    <li>Email </li>
                    <li> : {{$lembaga->email_lembaga}}</li>
                </div>
            </ul>
        </section>
        <section class="mt-4">
            <p>Dengan ini, menyatakan dengan sebenarnya bahwa untuk memenuhi tujuan transparansi dan akuntabilitas penggunaan belanja hibah :</p>
            <ul class="mt-4">
                <div class="flex gap-4">
                    <li>1. </li>
                    <li>Akan menggunakan belanja hibah sesuai dengan Naskah Perjanjian Hibah Nahdlatul Ulama (NPHNU) yang telah  disepakati.</li>
                </div>
                <div class="flex gap-4">
                    <li>2. </li>
                    <li>Bertanggung jawab penuh baik formal maupun materil atas penggunaan belanja hibah yang diterima.</li>
                </div>
                <div class="flex gap-4">
                    <li>3. </li>
                    <li>Menyampaikan laporan penggunaan belanja hibah</li>
                </div>
                <div class="flex gap-4">
                    <li>4. </li>
                    <li>Bersedia diaudit/diperiksa sesuai peraturan perundang-undangan.</li>
                </div>
            </ul>
            <p class="mt-4">
                Demikian pernyataan ini dibuat dengan penuh kesadaran dan rasa tanggung jawab serta tidak ada unsur paksaan dari pihak manapun.
                </p>
            <div class="flex justify-end mt-8 relative" style="position: relative;">
                <img src="{{public_path('/aseets/Picture1.jpg')}}" alt="" class="mt-12">
                <div class="text-center absolute mr-4" style="position: absolute;">
                    <p>Tasikmalaya, {{$date}}</p>
                    <p>MAJELIS WAKIL CABANg NAHDLATUL ULAMA</p>
                    <P>Kecamatan {{$kecamatan->nama}}</P>
                    <p>Ketua</p>
                    <p class="mt-16">{{($pengurus->nama_pengurus)}}</p>
                </div>
            </div>
        </section>
    </body>
</body>
</html>
