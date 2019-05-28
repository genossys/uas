<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>PT.IKS</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <style>
        body{
            font-size: 12px;
        }
    </style> 
</head>

<body>

    <section class="header">
        <div class="row">
            <div class="col-sm-3 text-right">
               {{-- <img class="img-fluid" src="fpenawaran/PNW.09.png" alt=""> --}}
            </div>
            <div class="col-sm-9">
                <h1 class="headerpdf"> PT. INVESTAMA KOMANDO SECURITY</h1>
                <h5 class="header2pdf">Dusun II Makamhaji Kec. Kartasura Kabupaten Sukoharjo, Jawa Tengah 57161</h5>
            </div>

        </div>
    </section>

    <div class="row">
                <div class="col-sm-10 offset-sm-1 text-right jenislaporan">
                  <p>Laporan Data Lelang</p>
                  <p>Periode: </p>
                </div>

                    
    
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Jadwal</th>
                                    <th>ID Lelang</th>
                                    <th>Jadwal</th>
                                    <th>Batas Upload</th>
                                    <th>Keterangan</th>
                                    <th>Kode Lelang</th>
                                    <th>Nama Lelang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($lelang as $p)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$p->idJadwal}}</td>
                                    <td>{{$p->idLelang}}</td>
                                    <td>{{$p->jadwal}}</td>
                                    <td>{{$p->batasUpload}}</td>
                                    <td>{{$p->keterangan}}</td>
                                    <td>{{$p->kdLelang}}</td>
                                    <td>{{$p->namaLelang}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

</body>

</html>
