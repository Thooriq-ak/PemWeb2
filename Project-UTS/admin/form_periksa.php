<?php
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php';

$_idx = isset($_GET['id']) ? $_GET['id'] : null;
if ($_idx) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $row = $stmt->fetch();
    $tombol = "Ubah";
} else {
    $tombol = "Tambah";
}

$sql = "SELECT * FROM pasien";
$stmt = $dbh->prepare($sql);
    $stmt->execute();
    $pasien = $stmt->fetchAll();

$sql = "SELECT * FROM unit_kerja";
$stmt = $dbh->prepare($sql);
    $stmt->execute();
    $unitkerja = $stmt->fetchAll();
// echo json_encode($pasien);
// exit();
?>
<body>
    <div class="container p-4">
        <h2>Form <?= $tombol ?> Data Periksa</h2>
        <form method="POST" action="proses_periksa.php">
            <div class="row">
            <div class="form-group col-md-6 my-2">
                <label for="tanggal">Tanggal Pemeriksaan:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= isset($row['tanggal']) ? $row['tanggal'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="berat">Berat (kg):</label>
                <input type="number" class="form-control" id="berat" name="berat" value="<?= isset($row['berat']) ? $row['berat'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="tinggi">Tinggi (cm):</label>
                <input type="number" class="form-control" id="tinggi" name="tinggi" value="<?= isset($row['tinggi']) ? $row['tinggi'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="tensi">Tensi:</label>
                <input type="text" class="form-control" id="tensi" name="tensi" value="<?= isset($row['tensi']) ? $row['tensi'] : '' ?>" required>
            </div>

            

            <div class="form-group col-md-6 my-2">
                <label for="pasien_id">Nama Pasien:</label>
                <!-- <input type="text" class="form-control" id="pasien_id" name="pasien_id" value="<?= isset($row['pasien_id']) ? $row['pasien_id'] : '' ?>" required> -->
                <select class="form-select" name="pasien_id" id="pasien_id">
                    <option value="" disabled <?php echo ((!$_idx) ? 'selected' : '' )?> > Pilih Pasien </option>
                    <?php foreach ($pasien as $p) { ?>
                        <option <?php echo (($_idx && $row['pasien_id'] == $p['id_pasien']) ? 'selected' : '' ) ?> value="<?= $p['id_pasien'] ?>"><?= $p['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="dokter_id">Unit Kerja:</label>
                <select class="form-select" name="dokter_id" id="dokter_id">
                    <option value="" disabled <?php echo ((!$_idx) ? 'selected' : '' )?> > Pilih Unit Kerja </option>
                    <?php foreach ($unitkerja as $uk) { ?>
                        <option <?php echo (($_idx && $row['dokter_id'] == $uk['id']) ? 'selected' : '' ) ?> value="<?= $uk['id'] ?>"><?= $uk['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-12 my-2">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" cols="50" required><?= isset($row['keterangan']) ? $row['keterangan'] : '' ?></textarea>
            </div>

            <?php
            if ($_idx) {
                echo "<input type='hidden' name='idx' value='{$_idx}'>";
            }
            ?>
            <div>
            <input type="submit" class="btn btn-primary" value="<?= $tombol ?>" name="proses"/>
            <button type="button" class="btn btn-danger" onclick="window.history.back();">Batal</button>
            </div>
            </div>
        </form>
    </div>
<?php
    require_once 'footer.html';
?>