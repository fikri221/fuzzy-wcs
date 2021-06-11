<!-- Header -->
<?php $title = "Tambah Data Tanaman";
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
            <?php
            // Jika Memperbarui Data
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];

                require_once "koneksi.php";
                $sql_suhu = mysqli_query($con, "SELECT * FROM `data_suhu` WHERE `id`='$id'");
                $sql_klbp_udara = mysqli_query($con, "SELECT * FROM `data_klbp_udara` WHERE `id`='$id'");
                $sql_siram = mysqli_query($con, "SELECT * FROM `data_siram` WHERE `id`='$id'");
                if ($row_suhu = mysqli_fetch_array($sql_suhu)) {
                    $suhu_min = $row_suhu['suhu_min'];
                    $suhu_med = $row_suhu['suhu_med'];
                    $suhu_max = $row_suhu['suhu_max'];

                    $link = "action.php?action=update-data-tanaman&id=" . $id;
                }
                if ($row_klbp_udara = mysqli_fetch_array($sql_klbp_udara)) {
                    $klbp_min = $row_klbp_udara['klbp_min'];
                    $klbp_med = $row_klbp_udara['klbp_med'];
                    $klbp_max = $row_klbp_udara['klbp_max'];

                    $link = "action.php?action=update-data-tanaman&id=" . $id;
                }
                if ($row_siram = mysqli_fetch_array($sql_siram)) {
                    $siram_min = $row_siram['siram_min'];
                    $siram_med = $row_siram['siram_med'];
                    $siram_max = $row_siram['siram_max'];

                    $link = "action.php?action=update-data-tanaman&id=" . $id;
                }
            } else {
                // Jika Input Data Baru
                $suhu_min = 0;
                $suhu_med = 0;
                $suhu_max = 0;

                $klbp_min = 0;
                $klbp_med = 0;
                $klbp_max = 0;

                $siram_min = 0;
                $siram_med = 0;
                $siram_max = 0;

                $link = "action.php?action=save-data-tanaman";
            }
            ?>
            <div id="content">

                <!-- Topbar -->
                <?php include "layouts/topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Masukkan Rule / Aturan</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= $link ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Suhu Minimum (&degC)</label>
                                        <input type="number" class="form-control" id="suhu_min" name="suhu_min" placeholder="0" value="<?= $suhu_min ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Suhu Medium (&degC)</label>
                                        <input type="number" class="form-control" id="suhu_med" name="suhu_med" placeholder="0" value="<?= $suhu_med ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Suhu Maksimum (&degC)</label>
                                        <input type="number" class="form-control" id="suhu_max" name="suhu_max" placeholder="0" value="<?= $suhu_max ?>">
                                    </div>
                                </div>

                                <div class="form-row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="">Kelembapan Udara Minimum (%)</label>
                                        <input type="number" class="form-control" id="klbp_min" name="klbp_min" placeholder="0" value="<?= $klbp_min ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Kelembapan Udara Medium (%)</label>
                                        <input type="number" class="form-control" id="klbp_med" name="klbp_med" placeholder="0" value="<?= $klbp_med ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Kelembapan Udara Maksimum (%)</label>
                                        <input type="number" class="form-control" id="klbp_max" name="klbp_max" placeholder="0" value="<?= $klbp_max ?>">
                                    </div>
                                </div>

                                <div class="form-row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="">Lama Siram Minimum (Detik)</label>
                                        <input type="number" class="form-control" id="siram_min" name="siram_min" placeholder="0" value="<?= $siram_min ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Lama Siram Medium (Detik)</label>
                                        <input type="number" class="form-control" id="siram_med" name="siram_med" placeholder="0" value="<?= $siram_med ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Lama Siram Maksimum (Detik)</label>
                                        <input type="number" class="form-control" id="siram_max" name="siram_max" placeholder="0" value="<?= $siram_max ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary font-weight-bold mx-3 my-3">SUBMIT</button>
                            </form>
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