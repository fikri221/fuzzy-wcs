<!-- Header -->
<?php
$title = "Dashboard";
include "layouts/header.php";
?>
<!-- End of Header -->

<?php
// Panggil koneksi.php
require "koneksi.php";

// Mengambil id data yang akan dihitung
$id_data = $_GET['edit'];
$sql = "SELECT * FROM `data` WHERE id = $id_data";
$query = mysqli_query($con, $sql) or die("Gagal" . mysqli_error($con));
while ($row = mysqli_fetch_array($query)) {
    $suhu = $row['suhu'];
    $kelembapan = $row['kelembapan'];
}

include "simpan_data.php";
require "fungsi_perhitungan.php";
require "mesin_inferensi.php";

// Menentukan nilai suhu min, med dan max
$sql_suhu = "SELECT * FROM `data_suhu`";
$query_suhu = mysqli_query($con, $sql_suhu) or die("Gagal" . mysqli_error($con));
while ($row_suhu = mysqli_fetch_array($query_suhu)) {
    $suhu_min = $row_suhu['suhu_min'];
    $suhu_medB = $row_suhu['suhu_med'];
    $suhu_max = $row_suhu['suhu_max'];
}
$suhu_medA = ($suhu_min + $suhu_medB) / 2;
$suhu_medC = ($suhu_medB + $suhu_max) / 2;

// Menentukan nilai kelemb. udara min, med dan max
$sql_klbp_udara = "SELECT * FROM `data_klbp_udara`";
$query_klbp_udara = mysqli_query($con, $sql_klbp_udara) or die("Gagal" . mysqli_error($con));
while ($row_klbp_udara = mysqli_fetch_array($query_klbp_udara)) {
    $klbp_udara_min = $row_klbp_udara['klbp_min'];
    $klbp_udara_medB = $row_klbp_udara['klbp_med'];
    $klbp_udara_max = $row_klbp_udara['klbp_max'];
}
$klbp_udara_medA = ($klbp_udara_min + $klbp_udara_medB) / 2;
$klbp_udara_medC = ($klbp_udara_medB + $klbp_udara_max) / 2;

// Menentukan nilai minimum dan maksimum suhu
$nilai_suhu = new Suhu(
    $suhu_min,
    $suhu_medA,
    $suhu_medB,
    $suhu_medC,
    $suhu_max
);
$min_suhu = $nilai_suhu->min_suhu;
$medA_suhu = $nilai_suhu->medA_suhu;
$medB_suhu = $nilai_suhu->medB_suhu;
$medC_suhu = $nilai_suhu->medC_suhu;
$max_suhu = $nilai_suhu->max_suhu;

// Menentukan nilai minimum dan maksimum kelembapan air
$nilai_kelembapan = new Kelembapan(
    $klbp_udara_min,
    $klbp_udara_medA,
    $klbp_udara_medB,
    $klbp_udara_medC,
    $klbp_udara_max
);
$min_kelembapan = $nilai_kelembapan->min_kelembapan;
$medA_kelembapan = $nilai_kelembapan->medA_kelembapan;
$medB_kelembapan = $nilai_kelembapan->medB_kelembapan;
$medC_kelembapan = $nilai_kelembapan->medC_kelembapan;
$max_kelembapan = $nilai_kelembapan->max_kelembapan;

// Fuzzyfikasi dilakukan pada File 'fungsi_perhitungan.php'
$hitung = new Fuzzyfikasi();
$hasil = $hitung->hitung($suhu, $kelembapan);

// Perhitungan Menggunakan Mesin Inferensi
$inferensi = new Mesin_Inferensi();

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
                                            <th width="50%">Suhu (<?= $suhu ?>)</th>
                                            <th width="50%">Kelembapan Udara (<?= $kelembapan ?>)</th>
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
                                                Kering = (<?= round($hasil_kelembapan['kering'], 3); ?>) <br>
                                                0 = <?= $kelembapan ?> ≥ <?= $medB_kelembapan ?> <br>
                                                <?= $min_kelembapan ?> ≤ <?= $kelembapan ?> ≤ <?= $medB_kelembapan ?> <br>
                                                <?php
                                                if ($hasil_kelembapan['kering'] > 0 && $hasil_kelembapan['kering'] != 1) {
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
                                                <?php
                                                if ($hasil_suhu['sedang'] > 0 && $medA_suhu <= $suhu && $suhu <= $medB_suhu) {
                                                    echo $medA_suhu . " ≤ " . $suhu . " ≤ " . $medB_suhu . "<br>";
                                                    echo "( " . $suhu . " - " . $medA_suhu . " )" . " / " . "( " . $medB_suhu . " - " . $medA_suhu . " )" . "<br>";
                                                }
                                                ?>
                                                <?php
                                                if ($hasil_suhu['sedang'] > 0 && $medB_suhu <= $suhu && $suhu <= $medC_suhu) {
                                                    echo $medB_suhu . " ≤ " . $suhu . " ≤ " . $medC_suhu . "<br>";
                                                    echo "( " . $medB_suhu . " - " . $suhu . " )" . " / " . "( " . $medC_suhu . " - " . $medB_suhu . " )";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                Lembap = (<?= round($hasil_kelembapan['sedang'], 3); ?>) <br>
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
                                                Basah = (<?= round($hasil_kelembapan['basah'], 3); ?>) <br>
                                                0 = <?= $kelembapan ?> ≤ <?= $medB_kelembapan ?> <br>
                                                <?= $medB_kelembapan ?> ≤ <?= $kelembapan ?> ≤ <?= $max_kelembapan ?> <br>
                                                <?php
                                                if ($hasil_kelembapan['basah'] > 0 && $hasil_kelembapan['basah'] != 1) {
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
                                            <th>Kelembapan</th>
                                            <th>THEN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_rule = mysqli_query($con, "SELECT * FROM `rule`") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_rule)) {
                                            $cari_min = array($hasil_suhu[$row['suhu']], $hasil_kelembapan[$row['kelembapan']]);
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $row['suhu']; ?> (<?= $hasil_suhu[$row['suhu']] ?>)
                                                </td>
                                                <td>
                                                    <?= $row['kelembapan']; ?> (<?= ($hasil_kelembapan[$row['kelembapan']] === NULL) ? 0 : $hasil_kelembapan[$row['kelembapan']] ?>)
                                                </td>
                                                <td>
                                                    <?= $row['hasil']; ?> (<?= (min($cari_min) === NULL) ? 0 : min($cari_min) ?>) <br>
                                                    <?php
                                                    if ($row['hasil'] == "cepat") {
                                                        echo "α-predikat" . $row['id'] . " = " . min($cari_min) . "<br>";
                                                        $var1 = 8;
                                                        echo "z" . $row['id'] . ": " . min($cari_min) . " = " . "($var1 - z" . $row['id'] .
                                                            ")" . " / " . "($var2)" . "<br>";
                                                        echo round($inferensi->hasil_cepat($cari_min), 3);
                                                    } else if ($row['hasil'] == "normal") {
                                                        $var1 = 5;
                                                        $var2 = 8 - 5;
                                                        echo "α-predikat" . $row['id'] . " = " . (min($cari_min) === NULL) ? "α-predikat" . $row['id'] . " = " . '0' . '<br>' : min($cari_min) . "<br>";
                                                        echo "z" . $row['id'] . ": " . (min($cari_min) === NULL) ? "z" . $row['id'] . ": " . '0' . " = " . "(z" . $row['id'] .  " - $var1)" .
                                                            " / " . "($var2)" . "<br>" : min($cari_min) . " = " . "(z" . $row['id'] .  " - $var1)" .
                                                            " / " . "($var2)" . "<br>";
                                                        echo round($inferensi->hasil_normal($cari_min), 3);
                                                    } else {
                                                        $var1 = 15;
                                                        $var2 = 15 - 8;
                                                        echo "α-predikat" . $row['id'] . " = " . min($cari_min) . "<br>";
                                                        echo "z" . $row['id'] . ": " . min($cari_min) . " = " . "($var1 - z" . $row['id'] .
                                                            ")" . " / " . "($var2)" . "<br>";
                                                        echo round($inferensi->hasil_lama($cari_min), 3);
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Content Defuzzifikasi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Defuzzifikasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Metode Average</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        require_once "koneksi.php";
                                        $pred = 0;
                                        $hitung_total = 0;
                                        $hasil_hitung_cepat = 0;
                                        $hasil_hitung_normal = 0;
                                        $hasil_hitung_lama = 0;
                                        $sql_rule = mysqli_query($con, "SELECT * FROM `rule`") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_rule)) {
                                            $cari_min = array($hasil_suhu[$row['suhu']], $hasil_kelembapan[$row['kelembapan']]);
                                            if ($row['hasil'] == 'cepat') {
                                                $hitungan_cepat = min($cari_min) * $inferensi->hasil_cepat($cari_min);
                                                $hasil_hitung_cepat += $hitungan_cepat;
                                            } elseif ($row['hasil'] == 'normal') {
                                                $hitungan_normal = min($cari_min) * $inferensi->hasil_normal($cari_min);
                                                $hasil_hitung_normal += $hitungan_normal;
                                            } else {
                                                $hitungan_lama = min($cari_min) * $inferensi->hasil_lama($cari_min);
                                                $hasil_hitung_lama += $hitungan_lama;
                                            }
                                            $hitung_total = $hasil_hitung_cepat + $hasil_hitung_normal + $hasil_hitung_lama;
                                            var_dump($hitung_total);
                                            $pred += min($cari_min);
                                            if ($hitung_total != 0 && $pred != 0) {
                                                $hasil_defuzzy = $hitung_total / $pred . "<br>";
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php
                                                $query = "SELECT `id_data` FROM `hasil` WHERE `id_data` = '$id_data'";
                                                $result = mysqli_query($con, $query);
                                                // Mengecek hasil dari id_data sudah terdapat di database
                                                if (mysqli_num_rows($result) > 0) {
                                                    echo round($hitung_total, 3) . ' / ' . $pred . " = " . $hasil_defuzzy;
                                                } else {
                                                    echo round($hitung_total, 3) . ' / ' . $pred . " = " . $hasil_defuzzy;
                                                    $simpan = new Simpan();
                                                    $simpan->save($id_data, $hasil_defuzzy);
                                                }
                                                ?>
                                            </td>
                                        </tr>
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
    <?php include "layouts/logout_modal.php" ?>

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>
    <!-- End of Scripts -->

</body>

</html>