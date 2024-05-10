<?php 
require_once 'navbar.php';
require_once 'sidebar.html';
require_once 'koneksi.php';

$query_pasien = $dbh->query("SELECT COUNT(*) AS jumlah FROM pasien")->fetch(PDO::FETCH_ASSOC);
$query_periksa = $dbh->query("SELECT COUNT(*) AS jumlah FROM periksa")->fetch(PDO::FETCH_ASSOC);
$query_paramedik = $dbh->query("SELECT COUNT(*) AS jumlah FROM paramedik")->fetch(PDO::FETCH_ASSOC);
$query_unit_kerja = $dbh->query("SELECT COUNT(*) AS jumlah FROM unit_kerja")->fetch(PDO::FETCH_ASSOC);

$dbh = null;
?>


<div class="container-fluid p-4">
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Selamat Datang <?= $_SESSION['user']['name']; ?></h1>
        </div>

        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="data_pasien.php" style="text-decoration: none; color: inherit;">
                    <div class="card bg-primary text-white shadow h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Jumlah <br>Pasien</div>
                                    <div class="h5 mb-0 font-weight-bold"><?= $query_pasien['jumlah']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-user-check fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="data_paramedik.php" style="text-decoration: none; color: inherit;">
                    <div class="card bg-warning text-white shadow h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Jumlah <br>Paramedik</div>
                                    <div class="h5 mb-0 font-weight-bold"><?= $query_paramedik['jumlah']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-md fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="data_periksa.php" style="text-decoration: none; color: inherit;">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Jumlah <br>Periksa</div>
                                    <div class="h5 mb-0 font-weight-bold"><?= $query_periksa['jumlah']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-check fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="data_unit_kerja.php" style="text-decoration: none; color: inherit;">
                    <div class="card bg-danger text-white shadow h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Jumlah <br>Unit Kerja</div>
                                    <div class="h5 mb-0 font-weight-bold"><?= $query_unit_kerja['jumlah']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-wrench fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>




<?php require_once 'footer.html';?>
