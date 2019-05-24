<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>PT.IKS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/adminlte/css/adminlte.min.css')}}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href=" {{ asset('/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    <!-- Genosstyle -->
    <link rel="stylesheet" href="{{ asset('/css/genosstyle.css')}}">
</head>

<body class="">

    <section class="header">
        <div class="row">
            <div class="col-sm-3 text-right">
                <img src="{{asset('assets/gambar/logoiks.png')}}" alt="" class="imgpdf">
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

    <section>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="table-responsive-lg">
                        <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Lelang</th>
                                    <th>Kode Lelang</th>
                                    <th>Nama Lelang</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- jQuery -->
    <script src="{{ asset ('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src=" {{asset ('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src=" {{ asset ('/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('/adminlte/js/adminlte.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>

</body>

</html>
