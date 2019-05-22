

var alertSukses = $('.alert-success');
var alertDanger = $('.alert-danger');

var template = Handlebars.compile($("#details-template").html());

var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: '/lelang/getDataLelang',
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false},
        {data: 'idLelang', name: 'idLelang'},
        {data: 'kdLelang', name: 'kdLelang'},
        {data: 'namaLelang', name: 'namaLelang'},
        {data: 'link', name: 'link'},
        {data: 'action', name: 'action', searchable: false, orderable: false}
    ], order: [[1, 'asc']]

});


$('#example2 tbody').on('click', 'td a.details-control', function (e) {
    e.preventDefault();
    var tr = $(this).closest('tr');
    var row = table.row(tr);

    if (row.child.isShown()) {
        row.child.hide();
        tr.removeClass('shown');
    } else {
        row.child(
            template(row.data())
        ).show();
        tr.addClass('shown');
    }
    // alert('b');
});



$('#formSimpanLelang').on('submit', function (event) {
    event.preventDefault();
    var url = $(this).attr("action");
    $.ajax({
        url: url,
        method: "POST",
        data: new FormData($('#formSimpanLelang')[0]),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if (response.valid) {
                console.log(response);
                alertSukses.show().html('<p> Berhasil Menambahkan Data ' + response.sukses.idLelang + '</p>');
                table.draw();
            } else {
                alertDanger.hide();
                alertSukses.hide();
                $.each(response.errors, function (key, value) {
                    alertDanger.show().append('<p>' + value + '</p>');
                });
            }

        },
        error: function (respoxhr, textStatus, errorThrownnse) {
            alert(respoxhr + textStatus + errorThrownnse);
        }
    });
});