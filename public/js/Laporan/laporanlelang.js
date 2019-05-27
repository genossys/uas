var tgl1 = null;
var tgl2 = null;

var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
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
    ]

});

function cari(){
    table.ajax.reload();
}


function cetak() {
    window.location.href = '/laporanlelang/laporan';
    // alert($('#reservation').val());
}

