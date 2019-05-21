@extends('admin.master')

@section('judul')
Data tahapan
@endsection

@section('content')


<!-- Button to Open the Modal -->
<div>
    <button style="margin-bottom: 10px; margin-top: 20px" type="button" class="btn btn-primary box-tools pull-right" data-toggle="modal" data-target="#modaltambahTahapan">
        Tambah Data tahapan
    </button>

</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID tahapan</th>
                <th>ID Lelang</th>
                <th>Batas Waktu Upload</th>
                <th>Pekerjaan</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>


{{--modal tambah--}}
<div class="modal fade" id="modaltambahTahapan">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data tahapan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanTahapan">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID tahapan</label>
                                <input type="text" class="form-control" placeholder="ID tahapan" id="txtIdTahapan" name="txtIdTahapan">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Lelang</label>
                                <input type="text" class="form-control autocomplete" placeholder="ID jadwal" id="txtIdLelang" name="txtIdLelang">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Batas Upload</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right datepicker" name="dateBatasUp" id="dateBatasUp">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <textarea class="form-control" rows="3" id="txtPekerjaan" name="txtPekerjaan"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleditTahapan">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Edit Data tahapan</h4>
                </div>
                <form action="" method="POST" id="formEditTahapan">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="alert alert-success" style="display:none"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID tahapan</label>
                                    <input type="text" class="form-control" placeholder="ID tahapan" id="txtIdTahapan" name="txtIdTahapan">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ID Lelang</label>
                                    <input type="text" class="form-control autocomplete" placeholder="ID jadwal" id="txtIdLelang" name="txtIdLelang">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Ket. tahapan</label>
                                    <textarea class="form-control" rows="3" id="txtPswTahapan" name="txtPswTahapan"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>tahapan Pra-Kualifikasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right datepicker" name="dateTahapanPraQ" id="dateTahapanPraQ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Batas Upload</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right datepicker" name="dateBatasUp" id="dateBatasUp">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="text-right">
                            <button id="btnSimpan" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/autotext.css')}}">
    @endsection


    @section('script')
    <script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/tampilan/autotextidlelang.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
    <script src="{{ asset('/js/Master/tahapan.js') }}"></script>

    @endsection
