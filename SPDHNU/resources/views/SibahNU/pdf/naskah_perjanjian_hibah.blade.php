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
        body {
            margin: 0;
            padding: 0;
        }

        header p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            text-align: center;
        }

        .nomor_surat{
            margin-top: 17px;
        }

        .nomor_surat p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            text-align: center;
        }

        .nomor_surat :nth-child(2){
            margin-left: -350px
        }

        .nomor_surat span{
            width: 300px;
            height: 1px;
            background-color: black;
            display: block;
            position: relative;
            left: 210px;
            top: -8px;
        }

        .content p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        .content .pihak1 :nth-child(2){
            position: relative;
            left: 150px;
            top: -22px;
            width: 560px;
        }
        .content .pihak1 :nth-child(3){
            position: relative;
            left: 160px;
            top: -42px;
            width: 560px;
        }
        .content .pihak2{
           position: relative;
           top: -40px;
        }
        .content .pihak2 :nth-child(2){
            position: relative;
            left: 150px;
            top: -22px;
            width: 560px;
        }

        .content .pihak2 :nth-child(3){
            position: relative;
            left: 160px;
            top: -42px;
            width: 560px;
        }

        /* content 2 */
        .content2{
            position: relative;
            top: -60px;
        }
        .content2 p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        .content2 .pasal1{
            text-align: center;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .content2 .rab{
            margin-top: 70px;
        }

        .content2 .rab table thead tr th{
            border: 1px solid black;
            font-size: 11pt;
            padding: 5px 20px 5px 20px;
        }
        .content2 .rab table tbody tr td{
            border: 1px solid black;
            font-size: 11pt;
            padding: 5px 20px 5px 20px;
        }

        .content2 .pasal2{
            text-align: center;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .content2 .list p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            margin-left: 20px;
        }

        .content2 .ham p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            margin-left: 20px;
        }

        /* footer */
        .footer{
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            margin-left: 20px;
        }
        .footer .ttd1{
            position: relative;
            left: -220px;
            text-align: center;
        }

        .footer .ttd2{
            position: relative;
            left: 160px;
            top: -125px;
            text-align: center;
        }

        .page-break{
            page-break-after: always;
            margin-bottom: 100px
        }
    </style>
    <header>
        <p>NASKAH PERJANJIAN HIBAH ANTARA</p>
        <P>PENGURUS CABANG NAHDALTUL ULAMA KAB. TASIKMALAYA</P>
        <P>DENGAN</P>
        <P>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</P>
        <P>KECAMATAN {{strtoupper($kecamatan->nama)}}</P>
        <P>TENTANG</P>
        <P>HIBAH PENGURUS CABANG NAHDALTUL ULAMA KAB. TASIKMALAYA</P>
        <p>TAHUN ANGGARAN 2023</p>
        <hr style="border: 1px solid black; margin-top: 8px;">
    </header>
    <section class="nomor_surat">
        <p>215/PC/A.II/D.22/VIII/2023</p>
        <p>Nomor : </p>
        <span></span>
        <p>{{$nilai_rab->no_NPHD}}</p>
    </section>
    <section style="margin-top: 18px" class="content">
        <p style="text-align: justify;
                  text-justify: inter-word;">Pada hari ini, Senin tanggal Empat Belas bulan Agustus tahun Dua Ribu Dua Puluh Tiga (14-08-2023), yang bertanda tangan di bawah ini:</p>
        <div class="pihak1">
            <p >I. PIHAK KESATU</p>
            <p> : </p>
            <P> Drs. KH. ATAM RUSTAM, M.SI, berkedudukan di Tasikmalaya, Kp. Sukamanah RT 013 RW 003 Desa Sukarapih Kec. Sukarame,
                dalam hal ini bertindak untuk dan atas nama Pengurus Cabang Nahdaltul Ulama Kab. Tasikmalaya, selanjutnya disebut PIHAK KESATU.</P>
        </div>
        <div class="pihak2">
            <p>I. PIHAK KEDUA</p>
            <p> : </p>
            <P> {{strtoupper($pengurus->nama_pengurus)}}. berkedudukan di {{strtoupper($pengurus->alamat_ktp)}}
                dalam hal ini bertindak untuk dan atas nama {{strtoupper($lembaga->nama_lembaga)}}. selanjutnya disebut PIHAK KEDUA.</P>
        </div>
    </section>
    <section class="content2">
        <p style="text-align: justify;
        text-justify: inter-word;">PIHAK KESATU dan PIHAK KEDUA selanjutnya secara bersama-sama dalam Perjanjian Hibah Nahdaltul ulama ini disebut PARA PIHAK.</p>
        <p style="text-align: justify;
        text-justify: inter-word;">PARA PIHAK berdasarkan Peraturan PCNU Kab. Tasikmalaya Nomor 151 Tahun 2022 dan ketentuan mengenai tata cara penganggaran,
            pelaksanaan dan penatausahaan, pertanggungjawaban dan pelaporan serta monitoring dan evaluasi bantuan hibah yang bersumber
            dari Anggaran PCNU Kab. Tasikmalaya, sesuai dengan kedudukan dan kewenangan masing-masing, bersepakat untuk melakukan
            Perjanjian Belanja Hibah berupa uang, dengan ketentuan dan syarat-syarat sebagai berikut:</p>
        <div class="pasal1">
            <p>Pasal 1</p>
            <p>JUMLAH DAN TUJUAN HIBAH</p>
        </div>
        <div class="page-break" style="text-align: justify;
        text-justify: inter-word;">
            <p>(1).	PIHAK KESATU pada Tahun Anggaran 2023 memberikan belanja hibah kepada PIHAK KEDUA, berupa uang sebesar Rp. {{number_format($nilai_rab->nilai_pengajuan,0,',','.')}}.</p>
            <p>(2).	PIHAK KEDUA menyatakan menerima belanja hibah dari PIHAK KESATU berupa uang sebesar Rp. {{number_format($nilai_rab->nilai_pengajuan,0,',','.')}}.</p>
            <p>(3).	Besaran bantuan hibah sebagaimana dimaksud pada ayat (1) sesuai dengan rencana penggunaan belanja hibah/proposal yang diajukan PIHAK KEDUA, yang merupakan bagian tidak terpisahkan dari Naskah Perjanjian Belanja Hibah (NPH) ini, meliputi:</p>
        </div>
        <div class="rab">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>URAIAN</th>
                        <th>VOLUME/SATUAN</th>
                        <th>HARGA SATUAN</th>
                        <th>JUMLAH (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_rab as $item => $value)
                    <tr>
                        <td>{{ $item+1 }}</td>
                        <td>{{ $value['nama_kegiatan'] }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($value['rab'] as $key => $val)
                        <tr>
                            <td>{{ $item+1 }}.{{ $key+1 }}</td>
                            <td>{{ $val->uraian }}</td>
                            <td>{{ $val->qty }} {{ $val->satuan }}</td>
                            <td>Rp. {{ number_format($val->harga ,0,',','.')}}</td>
                            <td>Rp. {{ number_format($val->total ,0,',','.')}}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>Sub Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Rp. {{ number_format($value['sub_total'] ,0,',','.')}}</td>
                        </tr>
                @endforeach
                <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Rp. {{ number_format($nilai_rab->total_rab,0,',','.')}}</td>
                </tr>
                </tbody>
            </table>
        </div>
            <p>(4).	Penggunaan belanja hibah sebagaimana dimaksud pada ayat (3) bertujuan untuk {{$nilai_rab->peruntukan}}</p>
            <div class="pasal2">
                <p>Pasal 2</p>
                <p>PENCAIRAN BELANJA HIBAH</p>
            </div>
            <div style="text-align: justify;
            text-justify: inter-word;">
                <p>(1).	Pencairan belanja hibah berupa uang sebagaimana dimaksud dalam Pasal 1 ayat (1) dilakukan sesuai ketentuan peraturan perundang-undangan.</p>
                <p>(2).	PIHAK KEDUA mengajukan permohonan kepada PIHAK KESATU, dengan melampirkan:</p>
                <div class="list">
                    <p style="margin-left: 20px">a.	Surat Permohonan Pencairan Bantuan Hibah, dilengkapi rencana penggunaan Bantuan Hibah;</p>
                    <p>b.	Naskah Perjanjian Belanja Hibah;</p>
                    <p>c.	Fotokopi Kartu Tanda Penduduk Elektronik atas nama {{strtoupper($pengurus->nama_pengurus)}};</p>
                    <p>d.	Fotokopi Rekening Bank yang masih aktif atas nama {{strtoupper($lembaga->nama_rekening)}} {{($lembaga->no_rek)}};</p>
                    <p>e.	Surat keterangan domisili dari desa setempat; dan</p>
                    <p>f.	Pakta integritas/Surat Pernyataan Tanggung Jawab.</p>
                </div>
                <p>(3).	Belanja hibah sebagaimana dimaksud dalam Pasal 1 ayat (1) dibayarkan melalui pemindah bukuan
                    dari Rekening Kas Umum PCNU Kab. Tasikmalaya ke Rekening Bank BJBS {{strtoupper($lembaga->cabang_bank)}}
                    Atas nama {{strtoupper($lembaga->nama_rekening)}} selaku PIHAK KEDUA dengan nomor Rekening {{($lembaga->no_rek)}}, sebagaimana ketentuan yang berlaku.</p>
                <p>(4).	PIHAK KEDUA dilarang mengalihkan sebagian atau seluruh bantuan hibah sebagaimana dimaksud pada ayat (2) kepada pihak lain dengan dalih apapun juga, kecuali diatur lain sebagaimana tercantum dalam NPH ini.</p>
                <p>(5).	Setelah menerima pencairan bantuan hibah dari PIHAK KESATU, selanjutnya PIHAK KEDUA segera melaksanakan kegiatan dengan berpedoman pada rencana penggunaan hibah/proposal sesuai ketentuan peraturan perundang- undangan.</p>
            </div>
        <div class="pasal2">
            <p>Pasal 3</p>
            <p>HAK DAN KEWAJIBAN PIHAK KESATU</p>
        </div>
        <p>(1).	PIHAK KESATU mempunyai hak:</p>
        <div class="ham" class="page-break" style="text-align: justify;
        text-justify: inter-word;">
            <p style="margin-left: 20px;">a.	menunda pencairan belanja hibah, dalam hal PIHAK KEDUA tidak/belum memenuhi persyaratan yang ditetapkan;</p>
            <p style="margin-left: 20px;">b.	menerima Laporan Pertanggungjawaban Penggunaan Belanja Hibah dari PIHAK KEDUA.</p>
            <p style="margin-left: 20px;">c.	menerima sisa dana hibah, dalam hal sampai akhir kegiatan masih terdapat sisa dana hibah.</p>
        </div>
        <p style="margin-top: 70px">(2). PIHAK KESATU mempunyai kewajiban:</p>
        <div class="ham"style="text-align: justify;
        text-justify: inter-word;" >
            <p>a.	mencairkan belanja hibah, dalam hal seluruh persyaratan dan kelengkapan berkas pengajuan
            pencairan dana telah dipenuhi oleh PIHAK KEDUA; dan</p>
            <p>b.	melaksanakan evaluasi dan monitoring terhadap penggunaan belanja hibah.</p>
        </div>
        <div class="pasal2">
            <p>Pasal 4</p>
            <p>HAK DAN KEWAJIBAN PIHAK KEDUA</p>
        </div>
        <p style="text-align: justify;
        text-justify: inter-word;">(1).	PIHAK KEDUA mempunyai hak menerima belanja hibah, dalam hal seluruh persyaratan dan kelengkapan berkas pengajuan pencairan dana telah dipenuhi oleh PIHAK KEDUA.</p>
        <p style="text-align: justify;
        text-justify: inter-word;">(2).	PIHAK KEDUA mempunyai kewajiban:</p>
        <div class="ham" style="text-align: justify;
        text-justify: inter-word;">
            <p>a.	menandatangani Pakta Integritas/Surat Pernyataan Tanggungjawab Permohonan Belanja Hibah;</p>
            <p>b. membuat dan menyampaikan Laporan Pertanggungjawaban Penggunaan Belanja Hibah PIHAK KESATU kepada PCNU Kab. Tasikmalaya, 1 (satu) bulan setelah kegiatan selesai atau paling lambat tanggal 27 (dua puluh tujuh) bulan Agustus tahun 2023.</p>
            <p>c.	mematuhi proses pengadaan barang dan jasa sesuai ketentuan peraturan perundang- undangan, dalam hal dana hibah digunakan untuk pengadaan barang dan jasa; dan</p>
            <p>d.	mengembalikan sisa dana hibah, ke Kas Umum PCNU Kab. Tasikmalaya dengan nomor rekening 516 012 2700045 dan menyerahkan bukti setorannya kepada PCNU Kab. Tasikmalaya, dalam hal sampai akhir kegiatan masih terdapat sisa dana hibah.</p>
        </div>
        <div class="pasal2">
            <p>Pasal 5</p>
            <p>SANKSI</p>
        </div>
        <p style="text-align: justify;
        text-justify: inter-word;">Dalam hal PIHAK KEDUA melanggar ketentuan Pasal 1 ayat (3) dan Pasal 2 ayat (4), dikenakan sanksi administratif berupa peringatan tertulis, penundaan/penghentian pencairan/penyaluran belanja hibah atau sanksi lain sesuai ketentuan peraturan perundang-undangan.</p>
        <div class="pasal2">
            <p>Pasal 6</p>
            <p>LARANGAN</p>
        </div>
        <P style="text-align: justify;
        text-justify: inter-word;">Belanja hibah sebagaimana dimaksud dalam Pasal 1 dilarang untuk dilakukan pemotongan oleh pihak manapun, dalam jumlah berapapun, untuk tujuan apapun. Dalam hal terjadi pemotongan, maka pelakunya harus dilaporkan kepada yang berwajib dan diproses sesuai ketentuan peraturan perundang- undangan.</P>
        <div class="pasal2">
            <p>Pasal 7</p>
            <p>BEA MATERAI, PAJAK-PAJAK DAN BIAYA LAIN-LAIN</p>
        </div>
        <p class="page-break" style="text-align: justify;
        text-justify: inter-word;">Biaya materai, pajak-pajak serta biaya lainnya yang timbul sehubungan dengan pelaksanaan Perjanjian Hibah Daerah ini, menjadi beban dan tanggungjawab PIHAK KEDUA, sesuai ketentuan peraturan perundang-undangan.</p>
        <div class="pasal2" style="margin-top: 70px;">
            <p>Pasal 8</p>
            <p>PENUTUP</p>
        </div>
        <P style="text-align: justify;
        text-justify: inter-word;">Hal-hal yang belum dan/atau belum cukup diatur dalam Perjanjian Hibah ini akan diatur kemudian oleh PARA PIHAK berdasarkan kesepakatan bersama yang dituangkan dalam Perjanjian Tambahan (addendum), yang merupakan bagian tidak terpisahkan dari Perjanjian Hibah Daerah ini.   </P>
        <p style="margin-top: 18px;">Demikian Perjanjian Hibah ini dibuat dan ditandatangani oleh PARA PIHAK di Tasikmalaya pada hari, tanggal, bulan dan tahun tersebut di atas dalam rangkap 2 (dua) bermaterai cukup, masing- masing mempunyai kekuatan hukum yang sama.
            </p>
    </section>
    <section  class="footer">
        <div class="ttd1">
            <p>KETUA</p>
            <p style="margin-top: 80px;">{{strtoupper($pengurus->nama_pengurus)}}</p>
        </div>
        <div class="ttd2">
            <p>BENDAHARA</p>
            <p style="margin-top: 80px;">.................................................</p>
        </div>
    </section>
</body>
</html>
