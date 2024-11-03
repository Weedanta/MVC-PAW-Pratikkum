<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-3">Tambah Program Kerja</h2>
        <form action="index.php?action=create" method="POST">
            <div class="mb-3">
                <label>Nomor Program</label>
                <input type="text" name="nomorProgram" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Program</label>
                <input type="text" name="namaProgram" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Surat Keterangan</label>
                <input type="text" name="suratKeterangan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
