<!-- Header -->
<?php $page = "data_tanaman";
$title = "Data Tanaman";
include "layouts/header.php" ?>
<!-- End of Header -->

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
                <?php include "layouts/topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Tanaman</h1>
                    <p class="mb-4">Data yang dibutuhkan logika fuzzy sebagai variabel minimum, medium dan maksimum untuk dilakukan perhitungan.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tanaman</h6>
                            <div class="col_full float-right">
                                <?php
                                require_once "koneksi.php";
                                $query_suhu = "SELECT * FROM `data_suhu`";
                                $result_suhu = mysqli_query($con, $query_suhu);
                                $query_klbp_udara = "SELECT * FROM `data_klbp_udara`";
                                $result_klbp_udara = mysqli_query($con, $query_klbp_udara);
                                // Mengecek hasil dari id_data sudah terdapat di database
                                if (mysqli_num_rows($result_suhu) > 0 && mysqli_num_rows($result_klbp_udara) > 0) {
                                    while ($row = mysqli_fetch_array($result_suhu)) {
                                        echo '<a class="btn btn-success" href="tambah_data_tanaman.php?edit=' . $row["id"] . '">Ubah Data</a>';
                                    }
                                } else {
                                    echo '<a class="btn btn-primary mr-3" href="tambah_data_tanaman.php">Tambah Data</a>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="33.3%">Suhu Udara Minimum</th>
                                            <th class="text-center" width="33.3%">Suhu Udara Medium</th>
                                            <th class="text-center" width="33.3%">Suhu Udara Maksimum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_suhu = mysqli_query($con, "SELECT * FROM `data_suhu`") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_suhu)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['suhu_min']; ?> &degC</td>
                                                <td class="text-center"><?php echo $row['suhu_med']; ?> &degC</td>
                                                <td class="text-center"><?php echo $row['suhu_max']; ?> &degC</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="33.3%">Kelemb. Udara Min</th>
                                            <th class="text-center" width="33.3%">Kelemb. Udara Med</th>
                                            <th class="text-center" width="33.3%">Kelemb. Udara Max</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_klbp = mysqli_query($con, "SELECT * FROM `data_klbp_udara`") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_klbp)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['klbp_min']; ?> %</td>
                                                <td class="text-center"><?php echo $row['klbp_med']; ?> %</td>
                                                <td class="text-center"><?php echo $row['klbp_max']; ?> %</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="33.3%">Lama Siram Min</th>
                                            <th class="text-center" width="33.3%">Lama Siram Med</th>
                                            <th class="text-center" width="33.3%">Lama Siram Max</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_siram = mysqli_query($con, "SELECT * FROM `data_siram`") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_siram)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['siram_min']; ?> detik</td>
                                                <td class="text-center"><?php echo $row['siram_med']; ?> detik</td>
                                                <td class="text-center"><?php echo $row['siram_max']; ?> detik</td>
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