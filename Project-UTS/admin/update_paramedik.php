<?php
// update_paramedik.php

require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    // Retrieve other form fields for updating
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori'];
    $telpon = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $unit_kerja_id = $_POST['unit_kerja_id'];

    // Perform the update query
    $query = "UPDATE paramedik SET nama = :nama, gender = :gender, tmp_lahir = :tmp_lahir, tgl_lahir = :tgl_lahir, kategori = :kategori, telpon = :telpon, alamat = :alamat, unit_kerja_id = :unit_kerja_id WHERE id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':tmp_lahir', $tmp_lahir);
    $stmt->bindParam(':tgl_lahir', $tgl_lahir);
    $stmt->bindParam(':kategori', $kategori);
    $stmt->bindParam(':telpon', $telpon);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':unit_kerja_id', $unit_kerja_id);
    
    if ($stmt->execute()) {
        // Redirect back to data_paramedik.php after successful update
        header("Location: data_paramedik.php");
        exit();
    } else {
        echo "Failed to update.";
    }
}
?>
