<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Tabel User</h2>
    <div class="mb-3">
        <a href="<?= base_url('home/tambahUser') ?>" class="btn btn-success">+Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th width="3%">No</th>
                <th>ID User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $ms = 1; foreach ($takdirestui as $value): ?>
            <tr>
                <td><?= $ms++ ?></td>
                <td><?= $value->id_user ?></td> 
                <td><?= $value->username ?></td> 
                <td><?= $value->password ?></td>
                <td><?= $value->level ?></td> 
                <td>
                    <a href="<?= base_url('home/hapusUser/'.$value->id_user) ?>" class="btn btn-danger">Hapus</a>
                    <a href="<?= base_url('home/editUser/'.$value->id_user) ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
