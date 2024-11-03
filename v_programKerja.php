<?php
require_once "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerja BEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Program Kerja BEM</h2>
        
        <?php if (isKepalaDepartemen()): ?>
            <a href="v_add.php" class="btn btn-primary my-3">Tambah Program Kerja</a>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Program Kerja</th>
                    <th>Surat Keterangan</th>
                    <?php if (isKepalaDepartemen()): ?>
                        <th>Edit</th>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($proker)) {
                    foreach ($proker as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['nomorProgram']; ?></td>
                            <td><?php echo $row['namaProgram']; ?></td>
                            <td><?php echo $row['suratKeterangan']; ?></td>
                            <?php if (isKepalaDepartemen()): ?>
                                <td><a href="v_edit.php?edit=<?php echo $row['nomorProgram']; ?>" class="btn btn-warning">Edit</a></td>
                                <td><a href="index.php?action=delete&nomorProgram=<?php echo $row['nomorProgram']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</a></td>
                            <?php endif; ?>
                        </tr>
                        <?php
                    }
                } else {
                    echo '<tr><td colspan="5" class="text-center">Tidak ada data program kerja.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
