<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css" media="all">
    <title>Document</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        p {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
        }

        ul {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
        }

        li {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
        }

        .kanan {
            position: relative;
            top: -130px;
            right: -160px;
        }

        img {
            width: 100%;
            margin: 0px;
            padding: 0px;
        }

        .footer {
            text-align: center;
            position: relative;
            right: -10rem;
            /* bottom: -7rem; */
        }
    </style>
</head>

<body>

    <body>
        <img src="{{public_path('storage/'.$lembaga->kop_surat)}}" alt="">
        <header>
            <div class="text-center">
                <p>FAKTA INTEGRITAS PENERIMA HIBAH</p>
            </div>
        </header>
        <section class="mt-6 px-4 w-full">
            <p>Yang bertanda tangan dibawah ini : </p>
            <ul class="">
                <div class="">
                    <li>Nama Ketua MWCNU</li>
                    <li>Jabatan </li>
                    <li>Nomor KTP </li>
                    <li>Alamat Sesuai KTP </li>
                    <li>Bertindak Untuk dan Atas Nama </li>
                    <li>Alamat Lembaga </li>
                    <li>Telepon/HP </li>
                    <li>Email </li>
                </div>
                <div class="kanan">
                    <li> : {{$pengurus->nama_pengurus}}</li>
                    <li> : {{$pengurus->jabatan}}</li>
                    <li> : {{$pengurus->no_ktp}}</li>
                    <li> : {{$pengurus->alamat_ktp}}</li>
                    <li> : {{$user->nama_mwc}}</li>
                    <li> : {{$lembaga->alamat_lembaga}}</li>
                    <li> : {{$lembaga->no_telp}}</li>
                    <li> : {{$lembaga->email_lembaga}}</li>
                </div>
            </ul>
        </section>
        <section class="mt-4 px-4 w-full" style="position: relative; top: -8rem;">
            <p>Dengan ini, menyatakan dengan sebenarnya bahwa untuk memenuhi tujuan transparansi dan akuntabilitas penggunaan belanja hibah :</p>
            <ul class="mt-4">
                <li>1. Akan menggunakan belanja hibah sesuai dengan Naskah Perjanjian Hibah Nahdlatul Ulama (NPHNU) yang telah disepakati.</li>
                <li>2. Bertanggung jawab penuh baik formal maupun materil atas penggunaan belanja hibah yang diterima.</li>
                <li>3. Menyampaikan laporan penggunaan belanja hibah</li>
                <li>4. Bersedia diaudit/diperiksa sesuai peraturan perundang-undangan.</li>
            </ul>
            <p class="mt-4">
                Demikian pernyataan ini dibuat dengan penuh kesadaran dan rasa tanggung jawab serta tidak ada unsur paksaan dari pihak manapun.
            </p>
        </section>
        <div class="footer">
            <div class="">
                <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
                <p>{{$kecamatan->nama}}</p>
                <p>Ketua</p>
                <p class="mt-16">{{($pengurus->nama_pengurus)}}</p>
            </div>
        </div>
        <img src="{{public_path('/aseets/Picture1.jpg')}}" alt="">
    </body>
</body>

</html>
