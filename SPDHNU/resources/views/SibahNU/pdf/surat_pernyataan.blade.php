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
<body class="w-[700px] mx-auto">
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        header img{
            margin-top: 0;
            margin-bottom: 18px;
        }

        header .title{
            text-align: center;
            margin-bottom: 20px;
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
            left: 20rem;
            top: 25px;
            z-index: 20px;
        }
        .content img {
            position: absolute;
            right: 20px;
            top: 100px;
            object-fit: cover;
            z-index: -1;
        }

        .page-break{
            page-break-after: always;
        }
    </style>
    <header>
        <div class="title">
            <img src="{{public_path('storage/'.$lembaga->kop_surat)}}" alt="">
            <p>SURAT PERNYATAAN TANGGUNG JAWAB</p>
            <P>PENERIMA HIBAH</P>
        </div>
    </header>
    <section class="biodata">
        <p>Yang bertanda tangan dibawah ini : </p>
        <ul class="bodata_lengkap">
            <li>Nama Ketua MWCNU <span class="ml-24">: {{strtoupper($pengurus->nama_pengurus)}}</span></li>
            <li>Jabatan <span style="margin-left: 187px">: {{strtoupper($pengurus->jabatan)}}</span></li>
            <li>Nomor KTP <span style="margin-left: 158px">: {{strtoupper($pengurus->no_ktp)}}</span></li>
            <li>Alamat Sesuai KTP <span style="margin-left: 114px">: {{strtoupper($pengurus->alamat_ktp)}}</span></li>
            <li>Bertindak Untuk dan Atas Nama <span style="margin-left: 38px">: {{strtoupper($user->nama_mwc)}}</span></li>
            <li>Alamat Lembaga <span style="margin-left: 129px">: {{strtoupper($lembaga->alamat_lembaga)}}</span></li>
            <li>Telepon/HP <span style="margin-left: 160px">: {{$lembaga->no_telp}}</span></li>
            <li>Email <span style="margin-left: 195px;">: {{$lembaga->email_lembaga}}</span></li>
        </ul>
    </section>
    <section class="content">
        <p>Dengan ini menyatakan dengan sebenarnya bahwa : </p>
        <ul class="page-break">
            <li>1. Tidak ada pungutan dan atau memberikan sesuatu (uang, barang dll) dari dan ke pihak PCNU Kab. Tasikmalaya selama proses permohonan bantuan,
                penetapan, pencairan dan realisasi penggunaan dana hibah, bila terjadi pungutan maka akan melaporkannya kepada pihak berwajib.</li>
            <li>2. Semua dokumen yang dibuat dan disampaikan sebagai kelengkapan permohonan pencairan adalah valid tidak ada satupun dokumen
                yang palsu atau dipalsukan, jika ada dokumen yang palsu atau dipalsukan oleh saya, maka saya siap mempertanggungjawabkannya di depan hukum.</li>
            <li>3. Akan membuat laporan pertanggung jawaban penggunaan dana hibah setelah dananya selesai dipergunakan sesuai peruntukkan, dengan memberikan laporannya kepada PCNU Kab. Tasikmalaya.</li>
            <li>4. Sanggup menyediakan anggaran pendamping untuk menyelesaikan kegiatan yang telah diajukan sesuai  dengan permohonan bantuan hibah apabila
                dana bantuan hibah yang berasal dari PCNU Kab. Tasikmalaya Tahun anggaran 2023 tidak mencukupi sebagaimana permohonan pencairan.</li>
            <li>5. Mengembalikan sisa dana hibah ke kas umum PCNU Kab. Tasikmalaya dengan nomor rekening 516 012 2700045 dan
                menyerahkan bukti setornnya kepada PCNU Kab. Tasikmalaya, dalam hal sampai akhir kegiatan masih terdapat sisa dana hibah.</li>
        </ul>
        <p class="mt-4">Demikian pernyataan ini dibuat dengan penuh kesadaran dan rasa tanggung jawab serta tidak ada unsur paksaan dari pihak manapun dalam rangka memenuhi tujuan transparansi dan akuntabilitas penggunaan dana belanja hibah.</p>
        <div class="footer">
            <div class="ttd">
                <p>{{strtoupper($kecamatan->nama)}}, {{$date}}</p>
                <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
                <P>KECAMATAN {{strtoupper($kecamatan->nama)}}</P>
                <p>KETUA</p>
                <p style="margin-top: 40px; color:dimgray;">MATREI Rp.10.000</p>
                <p style="margin-top: 50px;">{{strtoupper($pengurus->nama_pengurus)}}</p>
            </div>
        </div>
    </section>
</body>
</html>
