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
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        header img{
            margin-bottom: 18px;
        }

        header p{
            margin-bottom: 28px;
        }

        .biodata p,ul,li{
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }
        .content p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }

        .footer{
            position: relative;
            margin-top: 20px;
        }
        .footer .ttd{
            position: absolute;
            text-align: center;
            left: 20rem;
            top: 20px;
            z-index: 20px;
        }
        .content img {
            position: absolute;
            right: 20px;
            object-fit: cover;
            z-index: -1;
        }
    </style>
    <body class="w-[700px] mx-auto">
        <header>
            <div class="text-center">
                <img src="{{public_path('storage/'.$lembaga->kop_surat)}}" alt="">
                <p>FAKAT INTEGRITAS PENERIMA HIBAH</p>
            </div>
        </header>
        <section class="biodata">
            <p>Yang bertanda tangan dibawah ini : </p>
            <ul class="bodata_lengkap">
                <li>Nama Ketua MWCNU <span class="ml-24">: {{$pengurus->nama_pengurus}}</span></li>
                <li>Jabatan <span style="margin-left: 195px">: {{$pengurus->jabatan}}</span></li>
                <li>Nomor KTP <span style="margin-left: 164px">: {{$pengurus->no_ktp}}</span></li>
                <li>Alamat Sesuai KTP <span style="margin-left: 116px">: {{$pengurus->alamat_ktp}}</span></li>
                <li>Bertindak Untuk dan Atas Nama <span style="margin-left: 34px">: {{$user->nama_mwc}}</span></li>
                <li>Alamat Lembaga <span style="margin-left: 133px">: {{$lembaga->alamat_lembaga}}</span></li>
                <li>Telepon/HP <span style="margin-left: 167px">: {{$lembaga->no_telp}}</span></li>
                <li>Email <span style="margin-left: 206px;">: {{$lembaga->email_lembaga}}</span></li>
            </ul>
        </section>
        <section class="content mt-4">
            <p>Dengan ini, menyatakan dengan sebenarnya bahwa untuk memenuhi tujuan transparansi dan akuntabilitas penggunaan belanja hibah :</p>
            <ul>
                <li>1. Akan menggunakan belanja hibah sesuai dengan Naskah Perjanjian Hibah Nahdlatul Ulama (NPHNU) yang telah  disepakati.</li>
                <li>2. Bertanggung jawab penuh baik formal maupun materil atas penggunaan belanja hibah yang diterima.</li>
                <li>3. Menyampaikan laporan penggunaan belanja hibah</li>
                <li>4. Bersedia diaudit/diperiksa sesuai peraturan perundang-undangan.</li>
            </ul>
            <p class="mt-4">
                Demikian pernyataan ini dibuat dengan penuh kesadaran dan rasa tanggung jawab serta tidak ada unsur paksaan dari pihak manapun.
                </p>
                <div class="footer">
                    <div class="ttd">
                        <p>Tasikmalaya, {{$date}}</p>
                        <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
                        <P>Kecamatan {{$kecamatan->nama}}</P>
                        <p>Ketua</p>
                        <p class="mt-16">{{($pengurus->nama_pengurus)}}</p>
                    </div>
                    <img src="{{public_path('/aseets/Picture1.jpg')}}" alt="" class="mt-12">
                </div>
        </section>
    </body>
</body>
</html>
