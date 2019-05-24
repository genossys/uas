<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>PT.IKS</title>
    <!-- Genosstyle -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background-image: url('../../../public/assets/gambar.bg.png')">


    <section class="header">
        <div class="row">
            <div class="col-sm-12">
                <h1> Laporan Lelang</h1>
                <h4 style="margin-bottom: 0px">PT. INVESTAMA KOMANDO SECURITY</h4>
                <p style="margin-bottom: 30px;font-size: 15px">Dusun II Makamhaji Kec. Kartasura Kabupaten Sukoharjo, Jawa Tengah 57161</p>
                <p>periode:</p>
            </div>

        </div>

    </section>



    <section>
    <table id="example2" class="table table-striped  table-bordered" cellspacing="0" width="100%">
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

    <section>
        <div class="row">
            <div class="col-sm-3 offset-sm-8">
                <p style="margin-bottom: 0">Surakarta, <?php echo date("d M Y"); ?> </p>
                <p style="margin-top: 0;width: 150px;text-align: center">Admin</p>
                <p style="margin-top: 50px;width: 150px;text-align: center"">(...........................)</p>
            </div>
        </div>
    </section>

</body>

</html>
