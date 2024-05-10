<?php
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php';

$_idx = isset($_GET['id']) ? $_GET['id'] : null;
if ($_idx) {
    $sql = "SELECT * FROM pasien WHERE id_pasien=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_idx]);
    $row = $stmt->fetch();
    $tombol = "Ubah";
} else {
    $tombol = "Tambah";
}
?>

<body class="">
    <div class="container p-4">
        <h2>Form <?= $tombol ?> Data Pasien</h2>
        <form method="POST" action="proses_pasien.php">
            <div class="row">
            <div class="form-group col-md-6 my-2">
                <label for="kode">Kode Pasien:</label>
                <input type="text" class="form-control" id="kode" name="kode" value="<?= isset($row['kode']) ? $row['kode'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($row['nama']) ? $row['nama'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="tmp_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= isset($row['tmp_lahir']) ? $row['tmp_lahir'] : '' ?>" required>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($row['email']) ? $row['email'] : '' ?>">
            </div>

            <div class="form-group col-md-4 my-2">
                <label>Jenis Kelamin:</label><br>
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
                <label for="kelurahan">Kelurahan:</label>
                <select class="form-control" id="kelurahan" name="kelurahan" required>
                    <option value="">Pilih Kelurahan</option>
                    <?php
                    $query = "SELECT * FROM kelurahan";
                    $result = $dbh->query($query);
                    while ($kelurahan = $result->fetch(PDO::FETCH_ASSOC)) {
                        $selected = isset($row['kelurahan_id']) && $row['kelurahan_id'] == $kelurahan['id_kelurahan'] ? 'selected' : '';
                        echo "<option value='{$kelurahan['id_kelurahan']}' $selected>{$kelurahan['nama']}</option>";
                    }
                    ?>
                </select>
            </div>

            
            <div class="form-group col-md-4 my-2">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= isset($row['tgl_lahir']) ? $row['tgl_lahir'] : '' ?>" required>
            </div>

            <div class="form-group col-md-12 my-2">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" cols="50"><?= isset($row['alamat']) ? $row['alamat'] : '' ?></textarea>
            </div>
            
            <?php
            if ($_idx) {
                echo "<input type='hidden' name='idx' value='{$_idx}'>";
            }
            ?>
            <div>
            <input type="submit" class="btn btn-primary ms-auto" value="<?= $tombol ?>" name="proses"/>
            <button type="button" class="btn btn-danger" onclick="window.history.back();">Batal</button>
            </div>
        </div>
        </form>
    </div>
<?php
    require_once 'footer.html';
?>