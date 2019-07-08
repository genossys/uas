var tgl1 = null;
var tgl2 = null;

var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    searching: false,
    ajax: {
        url:'/laporanlelang/getData',
        data: function (d) {
            var tgl = $('#reservation').val();
            if (tgl != '') {
                var temp = tgl.split(' - ');
                tgl1 = temp[0];
                tgl2 = temp[1];
            }
            d.awal = tgl1,
            d.akhir = tgl2
        }
    },
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false},
        {data: 'idJadwal', name: 'idJadwal'},
        {data: 'idLelang', name: 'idLelang'},
        {data: 'jadwal', name: 'jadwal'},
        {data: 'batasUpload', name: 'batasUpload'},
        {data: 'keterangan', name: 'keterangan'},
        {data: 'kdLelang', name: 'kdLelang'},
        {data: 'namaLelang', name: 'namaLelang'},
    ]

});

function cari(){
    table.draw();
}


function cetak() {
    // window.location.href = '/laporanlelang/laporan';
    // alert($('#reservation').val());
    var tgl = $('#reservation').val();
        if (tgl != '') {
            var temp = tgl.split(' - ');
            tgl1 = temp[0];
            tgl2 = temp[1];
        }

    $.ajax({
        type: 'GET',
        url: '/laporanlelang/laporan',
        xhrFields: {
            responseType: 'blob'
        },
        data: {
                awal: tgl1,
                akhir: tgl2
        },
        success: function (response) {
            console.log(response);
            var link = document.createElement('a');
            var url = window.URL.createObjectURL(response);
            link.href = url;
            link.target = '_blank';
            // link.download = 'myfile.pdf';
            document.body.appendChild(link);
            link.click();
            setTimeout(function () {
                document.body.removeChild(link);
                window.URL.revokeObjectURL(url);
            }, 100);

        },
        error: function (xhr, textStatus, errorThrown) {
            alert(xhr + textStatus + errorThrown);
        }

    });
}

