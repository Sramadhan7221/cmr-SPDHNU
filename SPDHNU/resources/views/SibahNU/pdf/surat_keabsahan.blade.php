<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            object-fit: cover;
        }

        header .title{
            text-align: center;
            margin-bottom: 28px;
        }

        p,ul,li{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        .content{
            position: relative;
            top: -9rem;
        }

        .content .paragraf1{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            text-align: justify;
            text-justify: inter-word;
        }

        .footer{
            position: relative;
            margin-top: 20px;
        }
        .footer .ttd{
            position: absolute;
            text-align: center;
            left: 18rem;
            top: 15px;
            z-index: 20px;
        }
        .content img {
            position: absolute;
            right: 20px;
            object-fit: cover;
            top: 120px;
            z-index: -1;
        }
        .kanan {
            position: relative;
            top: -175px;
            right: -220px;
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
    <body class="w-[700px] mx-auto">
        <header>
            <div class="title">
                <img src="{{public_path('storage/'.$lembaga->kop_surat)}}" alt="">
                <p>SURAT PERNYATAAN</p>
                <P>KEBENARAN DATA DAN KEABSAHAN DOKUMEN</P>
            </div>
        </header>
        <section class="biodata">
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
                        <li style="width: 500px"> : {{strtoupper($lembaga->alamat_lembaga)}},DESA {{strtoupper($desa->nama)}},KECAMATAN {{strtoupper($kecamatan->nama)}}, {{strtoupper($kabupaten->nama)}}</li>
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
        <section class="content">
            <div class="paragraf1">
                <p>Dengan ini menyatakan bahwa, Seluruh Data dan Dokumen yang di Isikan dan di Unggah ke dalam Aplikasi SiBahNU sebagai persyaratan pencairan bantuan hibah tahun anggaran 2023 adalah Data yang sebenar benarnya dan Dokumen Asli milik Majelis Wakil Cabang Nahdlatul Ulama Kecamatan {{$kecamatan->nama}}. Apabila dilain hari ditemukan ketidak sesuaian Data dan Dokumen sepenuhnya adalah tanggung jawab kami.</p>
                <p class="mt-4">
                    Demikian surat pernyataan ini dibuat dalam keadaan sadar tanpa ada nya tekanan dari pihak manapun dan bersedia dituntut di pengadilan apabila dikemudian hari terbukti bahwa pernyataan ini tidak benar.
                    </p>
            </div>
                <div class="footer">
                    <div class="ttd">
                        <p>{{strtoupper($kecamatan->nama)}}, {{$date}}</p>
                        <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
                        <P>KECAMATAN {{strtoupper($kecamatan->nama)}}</P>
                        <p>KETUA</p>
                        <p style="margin-top: 90px;">{{strtoupper($pengurus->nama_pengurus)}}</p>
                    </div>
                </div>
            </section>
    </body>
</body>
</html>
