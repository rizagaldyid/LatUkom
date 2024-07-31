<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Barang</h1>
        <a href="/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php if (!empty($barang) && is_array($barang)): ?>
                    <?php foreach ($barang as $item): ?> 
                        <tr>
                            <td><?= esc($item['id']) ?></td>
                            <td><?= esc($item['nama_barang']) ?></td>
                            <td><?= esc($item['stok']) ?></td>
                            <td><?= esc($item['harga']) ?></td>
                            <td>
                            <a href="/barang/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Update</a>
                                <form action="/barang/delete/<?= $item['id'] ?>" method="post" style="display:inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="confirmDelete(<?= $item['id'] ?>)" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data barang.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>