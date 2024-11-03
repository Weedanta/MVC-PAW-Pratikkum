<?php
include_once("koneksiMVC.php");
include_once("m_programKerja.php");

$nomorProgram = $_GET['edit'] ?? '';
$model = new m_programKerja();
$programKerja = null;

// Ambil data program kerja berdasarkan nomorProgram yang dipilih untuk ditampilkan di form
if ($nomorProgram) {
    // Menggunakan query untuk mengambil data program kerja tertentu
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM proker WHERE nomorProgram = ?");
    $stmt->bind_param("i", $nomorProgram);
    $stmt->execute();
    $result = $stmt->get_result();
    $programKerja = $result->fetch_assoc();
    $stmt->close();
}

// Redirect jika data tidak ditemukan
if (!$programKerja) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Edit Program Kerja</h3>
                    </div>
                    <div class="card-body">
                        <form action="index.php?action=update" method="post">
                            <div class="mb-3">
                                <label for="nomorProgram" class="form-label">ID Program</label>
                                <input type="text" id="nomorProgram" name="nomorProgram" class="form-control" value="<?php echo $programKerja['nomorProgram']; ?>" required readonly />
                            </div>
                            <div class="mb-3">
                                <label for="namaProgram" class="form-label">Nama Program</label>
                                <input type="text" id="namaProgram" name="namaProgram" class="form-control" value="<?php echo htmlspecialchars($programKerja['namaProgram']); ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="suratKeterangan" class="form-label">Surat Keterangan</label>
                                <input type="text" id="suratKeterangan" name="suratKeterangan" class="form-control" value="<?php echo htmlspecialchars($programKerja['suratKeterangan']); ?>" required />
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
</body>
</html>
