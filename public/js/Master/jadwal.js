
var alertSukses = $('.alert-success');
var alertDanger = $('.alert-danger');

var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: '/jadwal/getDataJadwal',
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false},
        {data: 'idJadwal', name: 'idJadwal'},
        {data: 'idLelang', name: 'idLelang'},
        {data: 'jadwal', name: 'jadwal'},
        {data: 'batasUpload', name: 'batasUpload'},
        {data: 'keterangan', name: 'keterangan'},
        {data: 'action', name: 'action', searchable: false, orderable: false}
    ]

});

$('#formSimpanJadwal').on('submit', function (e) {
    e.preventDefault();
    var method = $(this).attr("method");
    var url = $(this).attr("action");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: method,
        url: url,
        dataType: 'JSON',
        data: new FormData($('#formSimpanJadwal')[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response.valid) {
                clearSave();
                alertSukses.show().html('<p> Berhasil Menambahkan Data ' + response.sukses.idJadwal + '</p>');
                table.draw();
            } else {
                alertDanger.hide();
                alertSukses.hide();
                $.each(response.errors, function (key, value) {
                    alertDanger.show().append('<p>' + value + '</p>');
                });
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert(errorThrown + xhr + textStatus);
        }

    });

});

$('#formEditJadwal').on('submit', function (e) {
    e.preventDefault();
    var method = $(this).attr("method");
    var url = $(this).attr("action");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: method,
        url: url,
        dataType: 'JSON',
        data: new FormData($('#formEditJadwal')[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response.valid) {
                $('#modaleditJadwal').modal('hide');
                table.draw();
            } else {
                alertDanger.hide();
                alertSukses.hide();
                $.each(response.errors, function (key, value) {
                    alertDanger.show().append('<p>' + value + '</p>');
                });
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert(errorThrown + xhr + textStatus);
        }

    });

});

function deleteJadwal(id) {
    if (confirm('Apakah Anda Yakin Menghapus Data ' + id)) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/jadwal/hapusDataJadwal',
            data: {
                _method: 'DELETE',
                _token: $('input[name=_token]').val(),
                idJadwal: id
            },
            success: function (response) {
                console.log(response);
                alert('Data Berhasil Di Hapus');
                table.draw();
            }, error: function (xhr, textStatus, errorThrown) {
                alert(xhr + textStatus + errorThrown);
            }

        });
    }
}

function clearSave(){
    $('#txtIdLelang').val('');
    $('#txtIdJadwal').val('');
    $('#dateJadwalPraQ').val('');
    $('#dateBatasUp').val('');
    $('#txtKetJadwal').val('');
    alertDanger.hide();
    alertSukses.hide();
}
function clearEdit(){
    $('#txtIdLelangEdit').val('');
    $('#txtIdJadwalEdit').val('');
    $('#dateJadwalPraQEdit').val('');
    $('#dateBatasUpEdit').val('');
    $('#txtKetJadwalEdit').val('');
    alertDanger.hide();
    alertSukses.hide();
}

function showDetail(idJadwal, idLelang, jadwal, batas, keterangan){
    $('#txtOldIdJadwalEdit').val(idJadwal);
    $('#txtIdLelangEdit').val(idJadwal);
    $('#txtIdJadwalEdit').val(idLelang);
    $('#dateJadwalPraQEdit').val(jadwal);
    $('#dateBatasUpEdit').val(batas);
    $('#txtKetJadwalEdit').val(keterangan);
    $('#modaleditJadwal').modal('show');
}

