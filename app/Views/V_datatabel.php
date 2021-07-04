<html>

<head>
    <title>Datatabel</title>
    <link href="<?= base_url('assets/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/jquery.dataTables.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/buttons.dataTables.min.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div>
            <h1 class="text-primary" style="margin-top: 50px;">DataTable</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-stripped" id="datatabel" style="margin-top: 100px;">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="<?= base_url('assets/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dataTables.buttons.min.js'); ?>"></script>
    <script>
        table = $('#datatabel').DataTable({
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('datatabel/get_data') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [0],
                "orderable": false
            }]
        });
    </script>
</body>

</html>