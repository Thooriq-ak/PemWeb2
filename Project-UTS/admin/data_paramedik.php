<?php
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php'; 

$query = "SELECT id, nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id
            FROM paramedik";
            
$paramediks = $dbh->query($query);

?>
    <title>Data Paramedik</title>
</head>
<body>
    <div class="container p-4">
        <h2>Data Paramedik</h2>
        <a href="form_paramedik.php" class="btn btn-success mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <tr class="table-primary">
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kategori</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Unit Kerja ID</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            foreach($paramediks as $paramedik){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $paramedik['nama']; ?></td>
                    <td><?= $paramedik['gender']; ?></td>
                    <td><?= $paramedik['tmp_lahir']; ?></td>
                    <td><?= $paramedik['tgl_lahir']; ?></td>
                    <td><?= $paramedik['kategori']; ?></td>
                    <td><?= $paramedik['telpon']; ?></td>
                    <td><?= $paramedik['alamat']; ?></td>
                    <td><?= $paramedik['unit_kerja_id']; ?></td>
                    <td>
                        <a href="form_paramedik.php?id=<?= $paramedik['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="proses_paramedik.php?proses=Hapus&id=<?= $paramedik['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr> 
            <?php } ?>
        </table>
    </div>
<?php
    require_once 'footer.html';
?>