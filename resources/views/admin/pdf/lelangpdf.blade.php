<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>PT.IKS</title>
    
</head>

<body class="">

    <section class="header">
        <div class="row">
            <div class="col-sm-3 text-right">
               
            </div>
            <div class="col-sm-9">
                <h1 class="headerpdf"> PT. INVESTAMA KOMANDO SECURITY</h1>
                <h5 class="header2pdf">Dusun II Makamhaji Kec. Kartasura Kabupaten Sukoharjo, Jawa Tengah 57161</h5>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2 " style="border-top: 1px solid black;margin-top: 10px">
            </div>
        </div>
    </section>

    <section>
    <div class="row">
                <div class="col-sm-10 offset-sm-1 text-right jenislaporan">
                  <p>Laporan Data Lelang</p>
                  <p>Periode: </p>
                </div>
    </section>

    
                        <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Lelang</th>
                                    <th>Kode Lelang</th>
                                    <th>Nama Lelang</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($lelang as $p)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$p->idLelang}}</td>
                                    <td>{{$p->kdLelang}}</td>
                                    <td>{{$p->namaLelang}}</td>
                                    <td>{{$p->link}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                   
    </section>

</body>

</html>
