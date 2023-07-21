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

        .biodata p,ul,li{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        .content{
            margin-top: 18px;
        }

        .content p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
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
            <ul class="bodata_lengkap">
                <li>Nama Ketua MWCNU <span class="ml-24">: {{$pengurus->nama_pengurus}}</span></li>
                <li>Jabatan <span style="margin-left: 187px">: {{$pengurus->jabatan}}</span></li>
                <li>Nomor KTP <span style="margin-left: 158px">: {{$pengurus->no_ktp}}</span></li>
                <li>Alamat Sesuai KTP <span style="margin-left: 114px">: {{$pengurus->alamat_ktp}}</span></li>
                <li>Bertindak Untuk dan Atas Nama <span style="margin-left: 38px">: {{$user->nama_mwc}}</span></li>
                <li>Alamat Lembaga <span style="margin-left: 129px">: {{$lembaga->alamat_lembaga}}</span></li>
                <li>Telepon/HP <span style="margin-left: 160px">: {{$lembaga->no_telp}}</span></li>
                <li>Email <span style="margin-left: 195px;">: {{$lembaga->email_lembaga}}</span></li>
            </ul>
        </section>
        <section class="content">
            <p>Dengan ini menyatakan bahwa, Seluruh Data dan Dokumen yang di Isikan dan di Unggah ke dalam Aplikasi SiBahNU sebagai persyaratan pencairan bantuan hibah tahun anggaran 2023 adalah Data yang sebenar benarnya dan Dokumen Asli milik Majelis Wakil Cabang Nahdlatul Ulama Kecamatan {{$kecamatan->nama}}. Apabila dilain hari ditemukan ketidak sesuaian Data dan Dokumen sepenuhnya adalah tanggung jawab kami.</p>
            <p class="mt-4">
                Demikian surat pernyataan ini dibuat dalam keadaan sadar tanpa ada nya tekanan dari pihak manapun dan bersedia dituntut di pengadilan apabila dikemudian hari terbukti bahwa pernyataan ini tidak benar.
                </p>
            <div class="footer">
                <div class="ttd">
                    <p>Tasikmalaya, {{$date}}</p>
                    <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
                    <P>KECAMATAN {{$kecamatan->nama}}</P>
                    <p>Ketua</p>
                    <p class="mt-16">({{$pengurus->nama_pengurus}})</p>
                </div>
                <img src="{{public_path('aseets/Picture1.jpg')}}" alt="">
            </div>
        </section>
    </body>
</body>
</html>
