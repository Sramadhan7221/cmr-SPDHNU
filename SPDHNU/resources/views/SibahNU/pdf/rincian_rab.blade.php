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

        header p{
            text-align: center;
            margin-bottom: 18px;
            margin-top: 18px;
        }

        .rab table thead tr th{
            border: 1px solid black;
            background-color: green;
            font-size: 11pt;
            padding: 5px 20px 5px 20px;
        }
        .rab table tbody tr td{
            border: 1px solid black;
            font-size: 11pt;
            padding: 5px 20px 5px 20px;
        }
        footer .mwc{
            text-align: center;
            font-size: 11pt;
            margin-top: 18px;
            margin-bottom: 18px;
        }
        footer .ttd .ttd1{
            position: relative;
            font-size: 11pt;
            left: -220px;
            text-align: center;
        }

        footer .ttd .ttd2{
            position: relative;
            font-size: 11pt;
            left: 180px;
            top: -125px;
            text-align: center;
        }


    </style>
    <header>
        <img src="{{public_path('/aseets/report-footer.png')}}" alt="">
        <p>RENCANA ANGGARAN BIAYA</p>
    </header>
    <section class="rab">
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>URAIAN</th>
                    <th>VOLUME/SATUAN</th>
                    <th>JUMLAH</th>
                    <th>HARGA SATUAN</th>
                    <th>JUMLAH (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Kesik</td>
                    <td>Truk</td>
                    <td>2</td>
                    <td>Rp. 200.000</td>
                    <td>Rp. 400.000</td>
                </tr>
            </tbody>
        </table>
    </section>
    <footer>
        <div class="mwc">
            <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
            <P>KECAMATAN TANJUNGJAYA</P>
        </div>
        <div class="ttd">
            <div class="ttd1">
                <p>PIHAK KEDUA,</p>
                <p style="margin-top: 80px;">otomatis</p>
            </div>
            <div class="ttd2">
                <p>PIHAK KESATU,</p>
                <p style="margin-top: 80px;">Drs. KH. ATAM RUSTAM, M.SI</p>
            </div>
        </div>
    </footer>
</body>
</html>
