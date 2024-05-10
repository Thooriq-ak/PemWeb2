<?php
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php';

$_idx = isset($_GET['id']) ? $_GET['id'] : null;
if ($_idx) {
    $sql = "SELECT * FROM paramedik WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $row = $stmt->fetch();
    $tombol = "Ubah";
} else {
    $tombol = "Tambah";
}
?>
<body>
    <div class="container p-4">
        <h2>Form <?= $tombol ?> Data Paramedik</h2>
        <form method="POST" action="proses_paramedik.php">
            <div class="row">
            <div class="form-group col-md-6 my-2">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($row['nama']) ? $row['nama'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="telpon">No Telpon:</label>
                <input type="tel" class="form-control" id="telpon" name="telpon" value="<?= isset($row['telpon']) ? $row['telpon'] : '' ?>" required>
            </div>

            

            <div class="form-group col-md-6 my-2">
                <label for="tmp_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= isset($row['tmp_lahir']) ? $row['tmp_lahir'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= isset($row['tgl_lahir']) ? $row['tgl_lahir'] : '' ?>" required>
            </div>

            <div class="form-group col-md-4 my-2">
                <label for="gender">Jenis Kelamin:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="gender_l" name="gender" value="L" <?= isset($row['gender']) && $row['gender'] == 'L' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="gender_l">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="gender_p" name="gender" value="P" <?= isset($row['gender']) && $row['gender'] == 'P' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="gender_p">Perempuan</label>
                </div>
            </div>
            
            
            <div class="form-group col-md-4 my-2">
                <label for="kategori">Kategori:</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="selected">Pilih Kategori</option>
                    <option value="Perawat" <?= isset($row['kategori']) && $row['kategori'] == 'Perawat' ? 'selected' : '' ?>>Perawat</option>
                    <option value="Dokter Umum" <?= isset($row['kategori']) && $row['kategori'] == 'Dokter Umum' ? 'selected' : '' ?>>Dokter Umum</option>
                    <option value="Dokter Gigi" <?= isset($row['kategori']) && $row['kategori'] == 'Dokter Gigi' ? 'selected' : '' ?>>Dokter Gigi</option>
                    <option value="Dokter Kulit" <?= isset($row['kategori']) && $row['kategori'] == 'Dokter Kulit' ? 'selected' : '' ?>>Dokter Telinga</option>
                    <option value="Dokter Bedah" <?= isset($row['kategori']) && $row['kategori'] == 'Dokter Bedah' ? 'selected' : '' ?>>Dokter Bedah</option>
                    <option value="Dokter Kandungan" <?= isset($row['kategori']) && $row['kategori'] == 'Dokter Kandungan' ? 'selected' : '' ?>>Dokter Mata</option>
                </select>
            </div>


            <div class="form-group col-md-4 my-2">
                <label for="unit_kerja_id">Unit Kerja:</label>
                <select class="form-control" id="unit_kerja_id" name="unit_kerja_id" required>
                    <option value="">Pilih Unit Kerja</option>
                    <?php
                    $query_unit_kerja = "SELECT * FROM unit_kerja";
                    $result_unit_kerja = $dbh->query($query_unit_kerja);
                    while ($unit_kerja = $result_unit_kerja->fetch(PDO::FETCH_ASSOC)) {
                        $selected = isset($row['unit_kerja_id']) && $row['unit_kerja_id'] == $unit_kerja['id'] ? 'selected' : '';
                        echo "<option value='{$unit_kerja['id']}' $selected>{$unit_kerja['nama']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-12 my-2">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" cols="50" required><?= isset($row['alamat']) ? $row['alamat'] : '' ?></textarea>
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