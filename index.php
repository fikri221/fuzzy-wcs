<?php
// include "simpan_data.php";
// require "fungsi_perhitungan.php";
// require "mesin_inferensi.php";

// require_once "koneksi.php";


// // Mengambil id data yang akan dihitung
// $id_data = $_GET['edit'];
// $sql = "SELECT * FROM `data` WHERE id = $id_data";
// $query = mysqli_query($con, $sql) or die("Gagal" . mysqli_error($con));
// while ($row = mysqli_fetch_array($query)) {
//     $suhu = $row['suhu'];
//     $kelembapan = $row['kelembapan'];

//     // Fuzzyfikasi dilakukan pada File 'fungsi_perhitungan.php'
//     $hitung = new Fuzzyfikasi();
//     $hasil = $hitung->hitung($suhu, $kelembapan);

//     // Perhitungan Menggunakan Mesin Inferensi
//     $inferensi = new Mesin_Inferensi();

//     // Mengeluarkan Value Dari Array Multi
//     $hasil_suhu = $hasil['suhu'];
//     $hasil_kelembapan = $hasil['kelembapan'];

//     $sql_rule = mysqli_query($con, "SELECT * FROM `rule`") or die("Gagal " . mysqli_error($con));
//     while ($row = mysqli_fetch_array($sql_rule)) {

//         $cari_min = array($hasil_suhu[$row['suhu']], $hasil_kelembapan[$row['kelembapan']]);

//         $pred = 0;
//         $hitung_total = 0;
//         $hasil_hitung_cepat = 0;
//         $hasil_hitung_normal = 0;
//         $hasil_hitung_lama = 0;

//         // Melakukan proses inferensi dengan fungsi masing-masing
//         // Untuk kemudian dilakukan proses defuzzyfikasi
//         if ($row['hasil'] == "cepat") {
//             $inferensi_cepat = $inferensi->hasil_cepat($cari_min);
//             $hitungan_cepat = min($cari_min) * $inferensi_cepat;
//             $hasil_hitung_cepat += $hitungan_cepat;
//         } else if ($row['hasil'] == "normal") {
//             $inferensi_normal = $inferensi->hasil_normal($cari_min);
//             $hitungan_normal = min($cari_min) * $inferensi_normal;
//             $hasil_hitung_normal += $hitungan_normal;
//         } else {
//             $inferensi_lama = $inferensi->hasil_lama($cari_min);
//             $hitungan_lama = min($cari_min) * $inferensi_lama;
//             $hasil_hitung_lama += $hitungan_lama;
//         }

//         $hitung_total += $hasil_hitung_cepat + $hasil_hitung_normal + $hasil_hitung_lama;
//         $pred += min($cari_min);
//         if ($hitung_total != 0 && $pred != 0) {
//             $hasil_defuzzy = $hitung_total / $pred;
//         }
//     }
// }
?>

<?php
// $simpan = new Simpan();
// $simpan->save($id_data, $hasil_defuzzy);
// var_dump($simpan->save($id_data, $hasil_defuzzy));
?>

<!-- Header -->
<?php $page = "home";
$title = "Dashboard";
include "layouts/header.php" ?>
<!-- End of Header -->

<body id="page-top">
    <!-- Refresh page every 1 min -->
    <meta http-equiv="refresh" content="60">

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
                <?php include "layouts/topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="row col-xl-8 mr-4">
                            <?php
                            require_once "koneksi.php";
                            $sql = "SELECT * FROM `data` ORDER BY `tanggal` DESC LIMIT 1";

                            $query = mysqli_query($con, $sql) or die("Gagal" . mysqli_error($con));
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <!-- Suhu Card Example -->
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Suhu</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['suhu'] ?>&deg Celcius</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-temperature-high fa-2x text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kelembapan Card Example -->
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Kelembapan Udara</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['kelembapan'] ?>%</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-wind fa-2x text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kelembapan Tanah Card Example -->
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kelembapan Tanah
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">68 %</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-icicles fa-2x text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Ketinggian Air Card Example -->
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ketinggian Air
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">15 cm</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-ruler-vertical fa-2x text-info"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row col-xl-4">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card shadow">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Jadwal Penyiraman</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">

                                            <?php
                                            require_once "koneksi.php";
                                            $sql = "SELECT * FROM `jadwal_siram`";

                                            $query = mysqli_query($con, $sql) or die("Gagal" . mysqli_error($con));
                                            $row = mysqli_fetch_array($query);
                                            ?>
                                            <div class="col mr-2">
                                                <?php if (!$row) : ?>
                                                    <div class="text-center font-weight-bold text-gray-800 mt-2"><i class="far fa-clock fa-3x"></i></div>
                                                    <div class="mt-4 text-center"><a class="btn btn-primary" href="tambah_jadwal.php">Tambah Jadwal</a></div>
                                                <?php else : ?>
                                                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Kondisi</th>
                                                                <th class="text-center">Waktu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="color: black;" class="text-center"><strong>Pagi</strong></td>
                                                                <td style="color: black;" class="text-center"><strong><?= date("H:i", strtotime($row['pagi'])) ?></strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color: black;" class="text-center"><strong>Sore</strong></td>
                                                                <td style="color: black;" class="text-center"><strong><?= date("H:i", strtotime($row['sore'])) ?></strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center"><a class="btn btn-primary" href="tambah_jadwal.php?edit=<?= $row['id'] ?>">Edit Jadwal</a></div>
                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4 my-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Sensor</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Suhu</th>
                                            <th>Kelembapan</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_rule_siram = mysqli_query($con, "SELECT * FROM `jadwal_siram`") or die("Gagal " . mysqli_error($con));
                                        while ($jam_siram = mysqli_fetch_array($sql_rule_siram)) {
                                            $sql_rule = mysqli_query($con, "SELECT * FROM `data` ORDER BY `tanggal` DESC") or die("Gagal " . mysqli_error($con));
                                            while ($row = mysqli_fetch_array($sql_rule)) {
                                                if (
                                                    date("H:i", strtotime($row['tanggal'])) >= date("H:i", strtotime($jam_siram['pagi'])) &&
                                                    date("H:i", strtotime($row['tanggal'])) <= date("H:i", strtotime('+3 hours', strtotime($jam_siram['pagi']))) ||
                                                    date("H:i", strtotime($row['tanggal'])) >= date("H:i", strtotime($jam_siram['sore'])) &&
                                                    date("H:i", strtotime($row['tanggal'])) <= date("H:i", strtotime('+2 hours', strtotime($jam_siram['sore'])))
                                                ) {
                                        ?>
                                                    <tr>
                                                        <td><a href="hasil.php?edit=<?= $row['id'] ?>"><?= date("j F Y, H:i a", strtotime($row['tanggal'])) ?></a></td>
                                                        <td><?= $row['suhu']; ?> &degC</td>
                                                        <td><?= $row['kelembapan']; ?> %</td>
                                                        <td><a class="badge badge-success" href="hasil.php?edit=<?= $row['id'] ?>">Lihat Hasil</a></td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>

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