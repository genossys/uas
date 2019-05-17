@extends('admin.master')

@section('judul')
Data Lelang
@endsection


@section('content')


<!-- Main content -->

<!-- Button to Open the Modal -->
<div>
    <button style="margin-bottom: 10px; margin-top: 20px"  type="button" class="btn btn-primary box-tools pull-right" data-toggle="modal" data-target="#modaltambahlelang">
        Tambah Data Lelang
    </button>

</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Lelang</th>
                <th>Kode Lelang</th>
                <th>Nama Lelang</th>
                <th>Link Website</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>


{{--modal tambah--}}
<div class="modal fade" id="modaltambahlelang">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Lelang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanLelang">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>ID Lelang</label>
                                <input type="text" class="form-control" placeholder="ID Lelang" id="txtIdLelang" name="txtIdLelang">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kode Lelang</label>
                                <input type="text" class="form-control" placeholder="Kode Lelang" id="txtKodeLelang" name="txtKodeLelang">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lelang</label>
                                <input type="text" class="form-control" placeholder="Nama Lelang" id="txtNamaLelang" name="txtNamaLelang">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Password Lelang</label>
                                <input type="text" class="form-control" placeholder="Password Lelang" id="txtPswLelang" name="txtPswLelang">
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Link Website</label>
                                <input type="text" class="form-control" placeholder="Link Website" id="txtLinkWeb" name="txtLinkWeb">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Penawaran</label>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="filePenawaran" name="filePenawaran">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Teknis</label>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input"id="fileTeknis" name="fileTeknis" >
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Kualifikasi</label>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="fileTeknis" name="fileTeknis" >
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
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


        <div class="modal fade" id="modaleditlelang">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Edit Data Lelang</h4>
                        </div>
                        <form action="" method="POST" id="formEditLelang">
                            {{ csrf_field() }}
                            <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>ID Lelang</label>
                                <input type="text" class="form-control" placeholder="ID Lelang" id="txtIdLelang" name="txtIdLelang">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kode Lelang</label>
                                <input type="text" class="form-control" placeholder="Kode Lelang" id="txtKodeLelang" name="txtKodeLelang">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lelang</label>
                                <input type="text" class="form-control" placeholder="Nama Lelang" id="txtNamaLelang" name="txtNamaLelang">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Password Lelang</label>
                                <input type="text" class="form-control" placeholder="Password Lelang" id="txtPswLelang" name="txtPswLelang">
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Link Website</label>
                                <input type="text" class="form-control" placeholder="Link Website" id="txtLinkWeb" name="txtLinkWeb">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Penawaran</label>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="filePenawaran" name="filePenawaran">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Teknis</label>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input"id="fileTeknis" name="fileTeknis" >
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Kualifikasi</label>
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="fileTeknis" name="fileTeknis" >
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section('script')
        <script src="{{ asset('js/Master/lelang.js') }}"></script>
        <script src="{{ asset('js/tampilan/fileinput.js') }}"></script>

        @endsection
