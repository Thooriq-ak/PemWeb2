<?php
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php'; 

$query = "SELECT pasien.*, kelurahan.nama as nama_kelurahan
            FROM pasien
            LEFT JOIN kelurahan ON pasien.kelurahan_id = kelurahan.id_kelurahan";
$pasiens = $dbh->query($query);

?>
<head>
    <title>Data Pasien Puskesmas</title>
</head>
<body>
    <div class="container p-4">
        <h2>Data Pasien Puskesmas</h2>
        <a href="form_pasien.php" class="btn btn-success mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <tr class="table-primary">
                <th>No</th>
                <th>Kode Pasien</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kelurahan</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            foreach($pasiens as $pasien){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pasien['kode']; ?></td>
                    <td><?= $pasien['nama']; ?></td>
                    <td><?= $pasien['gender']; ?></td>
                    <td><?= $pasien['tmp_lahir']; ?></td>
                    <td><?= $pasien['tgl_lahir']; ?></td>
                    <td><?= $pasien['nama_kelurahan']; ?></td>
                    <td>
                    <a href="form_pasien.php?id=<?= $pasien['id_pasien'] ?>" class="btn btn-primary">Edit</a>
<a href="proses_pasien.php?proses=Hapus&id=<?= $pasien['id_pasien'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr> 
            <?php } ?>
        </table>
<?php
    require_once 'footer.html';
?>