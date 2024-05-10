<?php
require_once 'koneksi.php';

// Tangkap data dari form
$_nama = $_POST['nama'];
$_gender = $_POST['gender'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_kategori = $_POST['kategori'];
$_telpon = $_POST['telpon'];
$_alamat = $_POST['alamat'];
$_unit_kerja_id = $_POST['unit_kerja_id'];

// Simpan data ke dalam array
$data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id];
// var_dump($data);
// exit();

// Tangkap proses apa yang dilakukan (Tambah, Ubah, atau Hapus)
$_proses = $_POST['proses'];

if ($_proses == "Tambah") {
    // Jika proses adalah Tambah, jalankan query INSERT
    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header('Location: data_paramedik.php'); // Redirect to data_paramedik.php after adding data
    exit();
} else if ($_proses == "Ubah") {
    // Jika proses adalah Ubah, jalankan query UPDATE
    $_idx = $_POST['idx'];
    $data[] = $_idx;
    $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header('Location: data_paramedik.php'); // Redirect to data_paramedik.php after updating data
    exit();
} else if (isset($_GET['proses']) && $_GET['proses'] === 'Hapus' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM paramedik WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header('Location: data_paramedik.php'); // Redirect to data_paramedik.php after deleting data
    exit();
}
?>
