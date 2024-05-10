<?php
// update_pasien.php

require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    // Retrieve other form fields for updating, for example:
    $nama = $_POST['nama'];

    // Perform the update query
    $query = "UPDATE pasien SET nama = :nama WHERE id_pasien = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    
    if ($stmt->execute()) {
        // Redirect back to data_pasien.php after successful update
        header("Location: data_pasien.php");
        exit();
    } else {
        echo "Failed to update.";
    }
}
?>
