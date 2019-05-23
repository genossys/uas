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



<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true" id="modaltambahlelang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambah">Tambah Data Lelang</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('simpanLelang') }}" id="formSimpanLelang" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                                <input type="file" class="custom-file-input" id="fileKualifikasi" name="fileKualifikasi" >
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-right">
                    <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true" id="modaleditlelang">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Modal Edit Siswa</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('editLelang')}}" id="formEditLelang" enctype="multipart/form-data">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="hidden"  id="txtOldIdLelang" name="txtOldIdLelang">
                            <div class="form-group">
                                <label>ID Lelang</label>
                                <input type="text" class="form-control" placeholder="ID Lelang" id="txtIdLelangEdit" name="txtIdLelangEdit">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kode Lelang</label>
                                <input type="text" class="form-control" placeholder="Kode Lelang" id="txtKodeLelangEdit" name="txtKodeLelangEdit">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lelang</label>
                                <input type="text" class="form-control" placeholder="Nama Lelang" id="txtNamaLelangEdit" name="txtNamaLelangEdit">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Password Lelang</label>
                                <input type="text" class="form-control" placeholder="Password Lelang" id="txtPswLelangEdit" name="txtPswLelangEdit">
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Link Website</label>
                                <input type="text" class="form-control" placeholder="Link Website" id="txtLinkWebEdit" name="txtLinkWebEdit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>File Dok. Penawaran</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="filePenawaranEdit" name="filePenawaranEdit">
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
                                    <input type="file" class="custom-file-input"id="fileTeknisEdit" name="fileTeknisEdit" >
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
                                    <input type="file" class="custom-file-input" id="fileKualifikasiEdit" name="fileKualifikasiEdit" >
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <div class="text-right">
                    <button type="submit" id="btnEdit" class="btn btn-primary">Update</button>
                </div>
            </div>
                </form>
        </div>
    </div>
</div>


        
        @endsection

        @section('script')
        
        
        <script src="{{ asset('js/tampilan/fileinput.js') }}"></script>
        
        <script src="{{ asset('js/handlebars.js') }}"></script>
        <script id="details-template" type="text/x-handlebars-templatel">
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <td>Penawaran</td>
                            <td>:</td>
                            
                            <td><a href="fpenawaran/@{{ 'urlPenawaran' }}">
                                Download
                        </a></td>
                            
                        </tr>
                        <tr>
                            <td>Teknis</td>
                            <td>:</td>
                            <td><a href="fteknis/@{{ 'urlTeknis' }}">Download</a></td>
                        </tr>
                        <tr>
                            <td>Kualifikasi</td>
                            <td>:</td>
                            <td><a href="fkualifikasi/@{{ 'urlKualifikasi' }}">Download</a></td>
                        </tr>
                    </tbody>
                </table>
        </script>
        <script src="{{ asset('js/Master/lelang.js') }}"></script>
        

        
        @endsection
