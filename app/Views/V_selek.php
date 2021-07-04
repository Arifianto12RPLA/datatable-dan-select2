<html>

<head>
    <title>Halaman Awal</title>
    <link href="<?= base_url('assets/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/select2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/jquery.dataTables.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/buttons.dataTables.min.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1 class="text-primary">SELECT2</h1>
        <div class="card">
            <div class="card-header">
                <form action="" method="POST" id="formku" class="col-lg-2" style="float:right;">
                    <select name="role" id="role" class="form-control form-control-lg" aria-placeholder="Pilih Data">
                    </select>
                </form>
                <script>
                    $('#formku').change((function() {
                        document.getElementById('formku').submit();
                    }));
                </script>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped" id="datatabel" style="margin-top: 100px;">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($user as $row) {
                            $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['telepon'] ?></td>
                                <td><?= $row['nama_role'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/select2.min.js'); ?>"></script>
    <script>
        function getDataRole() {
            $('#role').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'Cari Role',
                ajax: {
                    dataType: 'json',
                    url: "<?= base_url('selek/getRole') ?>",
                    delay: 500,
                    data: function(params) {
                        return {
                            search: params.term
                        }
                    },
                    processResults: function(data, page) {
                        return {
                            results: data
                        }
                    }
                }
            });
        }
        $(document).ready(function() {
            getDataRole();
            $('#role').change(function() {
                $('#formku').submit();
            });
        });
        $('#datatabel').DataTable({
            columnDefs: [{
                orderable: false,
                targets: "no-sort"
            }],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
</body>

</html>