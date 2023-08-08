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

        header {
            margin-top: 10px;
        }

        p {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        ul {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        li {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        .kanan {
            position: relative;
            top: -175px;
            right: -220px;
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

        .footer .ttd{
            position: absolute;
            top: -80px;
            left: 150px;
            z-index: 10;
        }

        .footer img{
            position: absolute;
            z-index: -1;
            top: -80px;
            left: -170px;
        }

        .kecamatan{
            margin-left: 20px;
        }
    </style>
</head>
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
                    <li> : {{strtoupper($pengurus->nama_pengurus)}}</li>
                    <li> : {{strtoupper($pengurus->jabatan)}}</li>
                    <li> : {{strtoupper($pengurus->no_ktp)}}</li>
                    <li> : {{strtoupper($pengurus->alamat_ktp)}}</li>
                    <li> : {{strtoupper($user->nama_mwc)}}</li>
                    <li> : {{strtoupper($lembaga->alamat_lembaga)}}</li>
                    <li> : {{strtoupper($lembaga->no_telp)}}</li>
                    <li> : {{$lembaga->email_lembaga}}</li>
                </div>
            </ul>
        </section>
        <section class="mt-4 px-4 w-full" style="position: relative; top: -10rem;">
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
            <div class="ttd">
                <p class="kecamatan">{{strtoupper($kecamatan->nama)}}, {{$date}}</p>
                <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
                <p>KECAMATAN {{strtoupper($kecamatan->nama)}}</p>
                <p>KETUA</p>
                <p style="margin-top: 40px; color:dimgray;">MATREI Rp.10.000</p>
                <p style="margin-top: 50px;">{{strtoupper($pengurus->nama_pengurus)}}</p>
            </div>
        </div>
    </body>
</html>
