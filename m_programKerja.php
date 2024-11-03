<?php
require "koneksiMVC.php";

class m_programKerja {
    public function createProgramKerja($nomorProgram, $namaProgram, $suratKeterangan) {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO proker (nomorProgram, namaProgram, suratKeterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $nomorProgram, $namaProgram, $suratKeterangan);
        $stmt->execute();
        $stmt->close();
    }

    public function readProgramKerja() {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM proker");
        $programKerjaList = array();
        while ($row = $result->fetch_assoc()) {
            $programKerjaList[] = $row;
        }
        return $programKerjaList;
    }

    public function updateProgramKerja($nomorProgram, $namaProgram, $suratKeterangan) {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE proker SET namaProgram = ?, suratKeterangan = ? WHERE nomorProgram = ?");
        $stmt->bind_param("ssi", $namaProgram, $suratKeterangan, $nomorProgram);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteProgramKerja($nomorProgram) {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM proker WHERE nomorProgram = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        $stmt->close();
    }
}
?>
