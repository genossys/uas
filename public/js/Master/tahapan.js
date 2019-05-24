
var alertSukses = $('.alert-success');
var alertDanger = $('.alert-danger');

var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: '/tahapan/getDataTahapan',
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false},
        {data: 'idTahapan', name: 'idTahapan'},
        {data: 'idLelang', name: 'idLelang'},
        {data: 'batasUpload', name: 'batasUpload'},
        {data: 'pekerjaan', name: 'pekerjaan'},
        {data: 'action', name: 'action', searchable: false, orderable: false}
    ]

});

$('#formSimpanTahapan').on('submit', function (e) {
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
        data: new FormData($('#formSimpanTahapan')[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response.valid) {
                clearSave();
                alertSukses.show().html('<p> Berhasil Menambahkan Data ' + response.sukses.idTahapan + '</p>');
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

$('#formEditTahapan').on('submit', function (e) {
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
        data: new FormData($('#formEditTahapan')[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response.valid) {
                $('#modaleditTahapan').modal('hide');
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

function deleteTahapan(id) {
    if (confirm('Apakah Anda Yakin Menghapus Data ' + id)) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/tahapan/hapusDataTahapan',
            data: {
                _method: 'DELETE',
                _token: $('input[name=_token]').val(),
                idTahapan: id
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
    $('#txtIdTahapan').val('');
    $('#dateBatasUp').val('');
    $('#txtPekerjaan').val('');
    alertDanger.hide();
    alertSukses.hide();
}

function showDetail(idTahapan, idLelang, batas, pekerjaan){
    $('#txtOldIdTahapan').val(idTahapan);
    $('#txtIdLelangEdit').val(idLelang);
    $('#txtIdTahapanEdit').val(idTahapan);
    $('#dateBatasUpEdit').val(batas);
    $('#txtPekerjaanEdit').val(pekerjaan);
    $('#modaleditTahapan').modal('show');
}
