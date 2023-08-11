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
            text-align: justify;
            text-justify: inter-word;
        }

        li {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            position: relative;
            text-align: justify;
            text-justify: inter-word;
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

        section p{
            text-align: justify;
            text-justify: inter-word;
        }

        .list2 {
            position: relative;
            top: -22px;
        }

        .list3{
            position: relative;
            top: -42px;
        }

        .list4{
            position: relative;
            top: -62px;
        }

        .list5{
            position: relative;
            top: -82px;
        }

        .list6{
            position: relative;
            top: -102px;
        }
        .list7{
            position: relative;
            top: -122px;
        }
        .list8{
            position: relative;
            top: -142px;
        }

        .childList {
            position: relative;
            top: -22px;
            right: -220px;
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
                <div class="list1">
                    <div>
                        <li>Nama Ketua MWCNU</li>
                    </div>
                    <div class="childList">
                        <li> : {{strtoupper($pengurus->nama_pengurus)}}</li>
                    </div>
                <div class="list2">
                    <div>
                        <li>Jabatan </li>
                    </div>
                    <div class="childList">
                        <li> : {{strtoupper($pengurus->jabatan)}}</li>
                    </div>
                </div>
                <div class="list3">
                    <div>
                        <li>Nomor KTP </li>
                    </div>
                    <div class="childList">
                        <li> : {{strtoupper($pengurus->no_ktp)}}</li>
                    </div>
                </div>
                <div class="list4">
                    <div>
                        <li>Alamat Sesuai KTP </li>
                    </div>
                    <div class="childList">
                        <li style="width: 500px;"> : {{strtoupper($pengurus->alamat_ktp)}}</li>
                    </div>
                </div>
                <div class="list5">
                    <div>
                        <li>Bertindak Untuk dan Atas Nama </li>
                    </div>
                    <div class="childList">
                        <li> : {{strtoupper($user->nama_mwc)}}</li>
                    </div>
                </div>
                <div class="list6">
                    <div>
                        <li>Alamat Lembaga </li>
                    </div>
                    <div class="childList">
                        <li style="width: 500px;"> : {{strtoupper($lembaga->alamat_lembaga)}},DESA {{strtoupper($desa->nama)}},KECAMATAN {{strtoupper($kecamatan->nama)}},{{strtoupper($kabupaten->nama)}}</li>
                    </div>
                </div>
                <div class="list7">
                    <div>
                        <li>Telepon/HP </li>
                    </div>
                    <div class="childList">
                        <li> : {{strtoupper($lembaga->no_telp)}}</li>
                    </div>
                </div>
                <div class="list8">
                    <div>
                        <li>Email </li>
                    </div>
                    <div class="childList">
                        <li> : {{$lembaga->email_lembaga}}</li>
                    </div>
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
