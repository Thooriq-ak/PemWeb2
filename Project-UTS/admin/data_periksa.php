<?php
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php'; 

$query = "SELECT periksa.*, pasien.nama as nama_pasien, unit_kerja.nama as unit_kerja
            FROM periksa
            LEFT JOIN pasien ON periksa.pasien_id = pasien.id_pasien
            LEFT JOIN unit_kerja ON periksa.dokter_id = unit_kerja.id";


$periksas = $dbh->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Periksa Puskesmas</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <div class="containe p-4">
        <h2>Data Periksa Puskesmas</h2>
        <a href="form_periksa.php" class="btn btn-success mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <tr class="table-primary">
                <th>No</th>
                <th>Unit Kerja</th>
                <th>Tanggal Periksa</th>
                <th>Nama Pasien</th>
                <th>Berat</th>
                <th>Tinggi</th>
                <th>Tensi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            foreach($periksas as $periksa){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $periksa['unit_kerja']; ?></td>
                    <td><?= $periksa['tanggal']; ?></td>
                    <td><?= $periksa['nama_pasien']; ?></td>
                    <td><?= $periksa['berat']; ?></td>
                    <td><?= $periksa['tinggi']; ?></td>
                    <td><?= $periksa['tensi']; ?></td>
                    <td><?= $periksa['keterangan']; ?></td>
                    <td>
                        <a href="form_periksa.php?id=<?= $periksa['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="proses_periksa.php?proses=Hapus&id=<?= $periksa['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr> 
            <?php } ?>
        </table>
    </div>

<?php
    require_once 'footer.html';
?>
