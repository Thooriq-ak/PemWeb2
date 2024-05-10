<?php
require_once 'koneksi.php';

// Tangkap data dari form
$_tanggal = $_POST['tanggal'];
$_berat = $_POST['berat'];
$_tinggi = $_POST['tinggi'];
$_tensi = $_POST['tensi'];
$_keterangan = $_POST['keterangan'];
$_pasien_id = $_POST['pasien_id'];
$_dokter_id = $_POST['dokter_id'];

// Simpan data ke dalam array
$data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];

// Tangkap proses apa yang dilakukan (Tambah, Ubah, atau Hapus)
$_proses = $_POST['proses'];

if ($_proses == "Tambah") {
    // Jika proses adalah Tambah, jalankan query INSERT
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header('Location: data_periksa.php'); // Redirect to data_periksa.php after adding data
    exit();
} else if ($_proses == "Ubah") {
    // Jika proses adalah Ubah, jalankan query UPDATE
    $_idx = $_POST['idx'];
    $data[] = $_idx;
    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header('Location: data_periksa.php'); // Redirect to data_periksa.php after updating data
    exit();
} else if (isset($_GET['proses']) && $_GET['proses'] === 'Hapus' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM periksa WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header('Location: data_periksa.php'); // Redirect to data_periksa.php after deleting data
    exit();
}
?>
