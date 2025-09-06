<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">📊 Daftar Transaksi</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Dari Tanggal</label>
                        <input type="date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Sampai Tanggal</label>
                        <input type="date" id="end_date" class="form-control">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button id="filterBtn" class="btn btn-success me-2">Filter</button>
                        <button id="resetBtn" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <table id="transaksiTable" class="table table-striped table-bordered" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Jenis</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            let table = $('#transaksiTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('transaksi.datatable') }}",
                    data: function(d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
                columns: [{
                        data: 'transaksi_id'
                    }, // pakai alias dari controller
                    {
                        data: 'kategori'
                    },
                    {
                        data: 'amount',
                        render: function(data) {
                            return new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(data);
                        }
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'jenis',
                        render: function(data) {
                            return data === 'pemasukan' ?
                                `<span class="badge bg-success">${data}</span>` :
                                `<span class="badge bg-danger">${data}</span>`;
                        }
                    }
                ],
                dom: 'Bfrtip',
                buttons: ['pdf', 'excel', 'csv', 'print']
            });

            $('#filterBtn').on('click', () => table.ajax.reload());
            $('#resetBtn').on('click', () => {
                $('#start_date').val('');
                $('#end_date').val('');
                table.ajax.reload();
            });
        });
    </script>
</body>

</html>