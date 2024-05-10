<?php
require_once 'koneksi.php';

// Tangkap data dari form
$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_gender = $_POST['gender'];
$_email = $_POST['email'];
$_alamat = $_POST['alamat'];
$_kelurahan = $_POST['kelurahan'];

// Simpan data ke dalam array
$data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan];

// Tangkap proses apa yang dilakukan (Tambah, Ubah, atau Hapus)
$_proses = $_POST['proses'];

if ($_proses == "Tambah") {
    // Jika proses adalah Tambah, jalankan query INSERT
    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header('Location: data_pasien.php'); // Arahkan ke halaman data_pasien.php setelah menambahkan data
    exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
} else if ($_proses == "Ubah") {
    // Jika proses adalah Ubah, jalankan query UPDATE
    $_idx = $_POST['idx'];
    $data[] = $_idx;
    $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id_pasien=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header('Location: data_pasien.php'); // Arahkan ke halaman data_pasien.php setelah mengubah data
    exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
} else if (isset($_GET['proses']) && $_GET['proses'] === 'Hapus' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pasien WHERE id_pasien = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header('Location: data_pasien.php'); // Arahkan ke halaman data_pasien.php setelah menghapus data
    exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
}
?>
