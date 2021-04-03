<!-- Header -->
<?php $title = "Dashboard";
include "layouts/header.php" ?>
<!-- End of Header -->

<?php
require_once "koneksi.php";
$id = $_GET['edit'];
$sql = "SELECT * FROM `data` WHERE id = $id";
$query = mysqli_query($con, $sql) or die("Gagal" . mysqli_error($con));
while ($row = mysqli_fetch_array($query)) {
    $suhu = $row['suhu'];
    $kelembapan = $row['kelembapan'];
}

require "fungsi_perhitungan.php";
// Menentukan nilai minimum dan maksimum suhu
$nilai_suhu = new Suhu(10, 20, 30, 35, 40);
$min_suhu = $nilai_suhu->min_suhu;
$medA_suhu = $nilai_suhu->medA_suhu;
$medB_suhu = $nilai_suhu->medB_suhu;
$medC_suhu = $nilai_suhu->medC_suhu;
$max_suhu = $nilai_suhu->max_suhu;

// Menentukan nilai minimum dan maksimum kelembapan air
$nilai_kelembapan = new Kelembapan(20, 35, 50, 65, 80);
$min_kelembapan = $nilai_kelembapan->min_kelembapan;
$medA_kelembapan = $nilai_kelembapan->medA_kelembapan;
$medB_kelembapan = $nilai_kelembapan->medB_kelembapan;
$medC_kelembapan = $nilai_kelembapan->medC_kelembapan;
$max_kelembapan = $nilai_kelembapan->max_kelembapan;

// Perhitungan dilakukan pada File 'fungsi_perhitungan.php'
$hitung = new Perhitungan();
$hasil = $hitung->hitung($suhu, $kelembapan);

// Mengeluarkan Value Dari Array Multi
$hasil_suhu = $hasil['suhu'];
$hasil_kelembapan = $hasil['kelembapan'];
// END PERHITUNGAN 
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "layouts/sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-800 bold">Proses Perhitungan</span>
                                <i class="fas fa-chevron-circle-down text-gray-800"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Fuzzifikasi
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mesin Inferensi
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Defuzzifikasi
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Fuzzifikasi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Fuzzifikasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50%">Suhu</th>
                                            <th width="50%">Ketinggian Air</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Rendah = (<?= round($hasil_suhu['rendah'], 3); ?>) <br>
                                                0 = <?= $suhu ?> ≥ <?= $medB_suhu ?> <br>
                                                <?= $min_suhu ?> ≤ <?= $suhu ?> ≤ <?= $medB_suhu ?> <br>
                                                <?php
                                                if ($hasil_suhu['rendah'] > 0 && $hasil_suhu['rendah'] != 1) {
                                                    echo "( " . $medB_suhu . " - " . $suhu . " )" . " / " . "( " . $medB_suhu . " - " . $min_suhu . " )" . "<br>";
                                                }
                                                ?>
                                                1 = <?= $suhu ?> ≤ <?= $min_suhu ?>
                                            </td>
                                            <td>
                                                Rendah = (<?= round($hasil_kelembapan['rendah'], 3); ?>) <br>
                                                0 = <?= $kelembapan ?> ≥ <?= $medB_kelembapan ?> <br>
                                                <?= $min_kelembapan ?> ≤ <?= $kelembapan ?> ≤ <?= $medB_kelembapan ?> <br>
                                                <?php
                                                if ($hasil_kelembapan['rendah'] > 0 && $hasil_kelembapan['rendah'] != 1) {
                                                    echo "( " . $medB_kelembapan . " - " . $kelembapan . " )" . " / " . "( " . $medB_kelembapan . " - " . $min_kelembapan . " )" . "<br>";
                                                }
                                                ?>
                                                1 = <?= $kelembapan ?> ≤ <?= $min_kelembapan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Sedang = (<?= round($hasil_suhu['sedang'], 3); ?>) <br>
                                                0 = <?= $suhu ?> ≤ <?= $medA_suhu ?> <strong>atau</strong>
                                                <?= $suhu ?> ≥ <?= $medC_suhu ?> <br>
                                                <?= $medA_suhu ?> ≤ <?= $suhu ?> ≤ <?= $medB_suhu ?> <br>
                                                <?php
                                                if ($hasil_suhu['sedang'] > 0) {
                                                    echo "( " . $suhu . " - " . $medA_suhu . " )" . " / " . "( " . $medB_suhu . " - " . $medA_suhu . " )" . "<br>";
                                                }
                                                ?>
                                                <?= $medB_suhu ?> ≤ <?= $suhu ?> ≤ <?= $medC_suhu ?> <br>
                                                <?php
                                                if ($hasil_suhu['sedang'] > 0) {
                                                    echo "( " . $medB_suhu . " - " . $suhu . " )" . " / " . "( " . $medC_suhu . " - " . $medB_suhu . " )";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                Sedang = (<?= round($hasil_kelembapan['sedang'], 3); ?>) <br>
                                                0 = <?= $kelembapan ?> ≤ <?= $medA_kelembapan ?> <strong>atau</strong>
                                                <?= $kelembapan ?> ≥ <?= $medC_kelembapan ?> <br>
                                                <?= $medA_kelembapan ?> ≤ <?= $kelembapan ?> ≤ <?= $medB_kelembapan ?> <br>
                                                <?php
                                                if ($hasil_kelembapan['sedang'] > 0) {
                                                    echo "( " . $kelembapan . " - " . $medA_kelembapan . " )" . " / " . "( " . $medB_kelembapan . " - " . $medA_kelembapan . " )" . "<br>";
                                                }
                                                ?>
                                                <?= $medB_kelembapan ?> ≤ <?= $kelembapan ?> ≤ <?= $medC_kelembapan ?> <br>
                                                <?php
                                                if ($hasil_kelembapan['sedang'] > 0) {
                                                    echo "( " . $medB_kelembapan . " - " . $kelembapan . " )" . " / " . "( " . $medC_kelembapan . " - " . $medB_kelembapan . " )";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tinggi = (<?= round($hasil_suhu['tinggi'], 3); ?>) <br>
                                                0 = <?= $suhu ?> ≤ <?= $medB_suhu ?> <br>
                                                <?= $medB_suhu ?> ≤ <?= $suhu ?> ≤ <?= $max_suhu ?> <br>
                                                <?php
                                                if ($hasil_suhu['tinggi'] > 0 && $hasil_suhu['tinggi'] != 1) {
                                                    echo "( " . $suhu . " - " . $medB_suhu . " )" . " / " . "( " . $max_suhu . " - " . $medB_suhu . " )" . "<br>";
                                                }
                                                ?>
                                                1 = <?= $suhu ?> ≥ <?= $max_suhu ?>
                                            </td>
                                            <td>
                                                Tinggi = (<?= round($hasil_kelembapan['tinggi'], 3); ?>) <br>
                                                0 = <?= $kelembapan ?> ≤ <?= $medB_kelembapan ?> <br>
                                                <?= $medB_kelembapan ?> ≤ <?= $kelembapan ?> ≤ <?= $max_kelembapan ?> <br>
                                                <?php
                                                if ($hasil_kelembapan['tinggi'] > 0 && $hasil_kelembapan['tinggi'] != 1) {
                                                    echo "( " . $kelembapan . " - " . $medB_kelembapan . " )" . " / " . "( " . $max_kelembapan . " - " . $medB_kelembapan . " )" . "<br>";
                                                }
                                                ?>
                                                1 = <?= $kelembapan ?> ≥ <?= $max_kelembapan ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content Mesin Inferensi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mesin Inferensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Suhu</th>
                                            <th>Kadar pH</th>
                                            <th>Nutrisi</th>
                                            <th>Kelembapan</th>
                                            <th>THEN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_rule = mysqli_query($con, "SELECT * FROM `data` ORDER BY `tanggal` DESC") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_rule)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['suhu']; ?></td>
                                                <td><?= $row['ph']; ?></td>
                                                <td><?= $row['nutrisi']; ?>%</td>
                                                <td><?= $row['kelembapan']; ?>%</td>
                                                <td><?= $row['hasil']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "layouts/footer.php" ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>
    <!-- End of Scripts -->

</body>

</html>