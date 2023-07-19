<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Surat Permohonan Pencairan Dana</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <style>
    .fill {
      width: 100%;
    }
    .my-text {
      display: unset;
      margin-top: 0;
      margin-bottom: 1rem;
      overflow: unset;
      font-size: inherit;
      font-family: inherit;
    }
    .ttd {
      position: relative;
      top: 9rem;
    }
  </style>
  <header>
    <img class="fill" src="{{asset('storage/'.'kop-surat.png')}}" alt="">
  </header>
  <div class="container">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-7">
          <div class="row">
            <div class="col-lg-2">
              <p> Nomor </p>
              <p> Lampiran </p>
              <p> Perihal </p>
            </div>
            <div class="col-lg-5">
              <p>: 123</p>
              <p>: 1(Satu) Berkas </p>
              <pre class="my-text">: Permohonan Pencairan<br>  Bantuan Hibah Nahdlatul Ulama Tahun<br>  Anggaran 2023<pre>
            </div>
          </div>
        </div>
        <div class="col-lg-5 d-flex justify-content-end">
          <p><pre class="my-text">Tasikmalaya, 18 Juli 2023<br>  Kepada<br>Yth. Ketua PCNU Kab.Tasikmalaya<br>di Tasikmalaya<pre></p>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <p>Berdasarkan Peraturan Pengurus Cabang Nahdlatul Ulama Kab. Tasikmalaya Nomor 121/PC-A.II/D.22/XII/2022 tahun 2022 tentang Bantuan Hibah PCNU Kab. Tasikmalaya Tahun Anggaran 2023, bahwa Majelis Wakil Cabang Nahdlatul Ulama kami tercatat sebagai satu diantara calon penerima Bantuan Hibah bersumber dari Anggaran PCNU Kab. Tasikmalya dengan nilai Rp. 1.000.000,- (seratus juta Rupiah) (Nominal Terisi Otomatis)</p>
      <p>Sehubungan dengan hal tersebut, dengan ini Kami sampaikan permohonan pencairan bantuan hibah sebesar Rp. 10.000.000,- (seratus juta Rupiah), yang akan di gunakan untuk Pembangunan Ruang Kelas Baru Keagamaan sebagaimana naskah perjanjian hibah Nahdlatul Ulama (NPHNU), dengan kelengkapan terlampir, sebagai berikut</p>
      <ol type="number">
        <li>Rincian rencana penggunaan belanja hibah;</li>
        <li>Fotocopy Kartu Tanda Penduduk Elektronik atas nama Ketua;</li>
        <li>Fotocopy rekening bank yang masih aktif;</li>
        <li>Dokumen asli dan terbaru, Surat keterangan domisili dari desa;</li>
        <li>Fakta integritas/Surat Pertanggungjawaban bermaterai;</li>
        <li>Surat Pernyataan.</li>
      </ol>
      <p>Demikain surat ini dibuat, atas pelayanannya diucapkan terima kasih.</p>
      <div class="row mt-5 ttd">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
          <p class="text-center">MAJELIS WAKIL CABANG NAHDLATUL UALAMA</p>
          <p class="text-center">Nama Pimpinan<p>
          <p class="text-center">Ketua<p>
          <p class="text-center mt-5">
            (Nama Ketua Terisi Otomatis)
          </p>
        </div>
      </div>
    </div>
  </div>
  <div>
    <img class="fill" src="{{ public_path('/aseets/report-footer.png') }}" alt="">
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
