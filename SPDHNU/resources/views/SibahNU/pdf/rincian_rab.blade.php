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

        .page_break {
            page-break-after: always;
        }
    </style>
    <header>
        <img src="{{public_path('storage/'.$lembaga->kop_surat)}}" alt="">
        <p style="margin-top:20px;">RENCANA ANGGARAN BIAYA</p>
    </header>
    <section class="rab">
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
                    <td>Rp. {{ number_format($total_rab->total_rab,0,',','.')}}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <footer>
        <div class="mwc">
            <p>{{strtoupper($kecamatan->nama)}}, {{$date}}</p>
            <p>MAJELIS WAKIL CABANG NAHDLATUL ULAMA</p>
            <P>KECAMATAN {{strtoupper($kecamatan->nama)}}</P>
        </div>
        <div class="ttd">
            <div class="ttd1">
                <p>KETUA</p>
                <p style="margin-top: 80px;">{{strtoupper($pengurus->nama_pengurus)}}</p>
            </div>
            <div class="ttd2">
                <p>BENDAHARA</p>
                <p style="margin-top: 80px;">.................................................</p>
            </div>
        </div>
    </footer>
</body>
</html>
