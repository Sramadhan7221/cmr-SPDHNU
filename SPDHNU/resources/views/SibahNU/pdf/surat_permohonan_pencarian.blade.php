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
    <header>
        <img src="{{public_path('storage/'.$lembaga->kop_surat)}}" alt="">
        <div class="">
            <div class="w-[400px]">
                <p>Nomor<span class="ml-9"> : </span>{{$proposal->no_NPHD}}</p>
                <p>Lampiran   <span class="ml-5"> : </span> 1 (Satu) Berkas</p>
                <p>Perihal    <span class="ml-9">: </span> Permohonan Pencairan</p>
                <p class="ml-24">Bantuan Hibah Nahdlatul Ulama Tahun Anggaran 2023</p>
            </div>
            <div class="">
                <p>Tasikmalaya<span>,</span>{{$date}}</p>
                <p>Kepada</p>
                <p>Yth. Ketua PCNU Kab. Tasikmalaya</p>
                <p class=" flex flex-col mt-8">di<span>Tasikmalaya</span></p>
            </div>
        </div>
    </header>
    <section>
        <div class="w-full px-4 mt-12">
            <p class="w-full"><span class="ml-20">Berdasarkan Peraturan Pengurus Cabang Nahdlatul Ulama Kab. Tasikmalaya</span> Nomor 121/PC-A.II/D.22/XII/2022 tahun 2022 tentang Bantuan Hibah PCNU Kab. Tasikmalaya Tahun Anggaran 2023,
                bahwa Majelis Wakil Cabang Nahdlatul Ulama kami tercatat sebagai satu diantara calon penerima Bantuan Hibah bersumber dari Anggaran PCNU Kab. Tasikmalya dengan nilai Rp. {{number_format($proposal->nilai_pengajuan,0,',','.')}}</p>
            <p class="mt-4"><span class="ml-20">Sehubungan dengan hal tersebut, dengan ini Kami sampaikan permohonan</span> pencairan bantuan hibah sebesar Rp. {{number_format($proposal->nilai_pengajuan,0,',','.')}}, yang akan di gunakan untuk {{$proposal->peruntukan}} sebagaimana naskah perjanjian hibah Nahdlatul Ulama (NPHNU), dengan kelengkapan terlampir, sebagai berikut</p>
            <ul>
                <li>1.	Rincian rencana penggunaan belanja hibah;</li>
                <li>2.	Fotocopy Kartu Tanda Penduduk Elektronik atas nama Ketua;</li>
                <li>3.	Fotocopy rekening bank yang masih aktif;</li>
                <li>4.	Dokumen asli dan terbaru, Surat keterangan domisili dari desa;</li>
                <li>5.	Fakta integritas/Surat Pertanggungjawaban bermaterai;</li>
                <li>6.	Surat Pernyataan.</li>
            </ul>
            <p class="ml-8 mt-4">Demikain surat ini dibuat, atas pelayanannya diucapkan terima kasih.</p>
        </div>
        <div class="flex mt-10 justify-end relative">
            <img src="{{public_path('aseets/Picture1.jpg')}}" alt="">
            <div class="text-center absolute">
                <p>MAJELIS WAKI CABANG NAHDLATUL ULAMA</p>
                <p>{{$kecamatan->nama}}</p>
                <p>Ketua</p>
                <p class="mt-16">{{($pengurus->nama_pengurus)}}</p>
            </div>
        </div>
    </section>
</body>
</html>
