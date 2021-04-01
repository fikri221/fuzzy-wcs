<!-- Header -->
<?php $page = "home";
$title = "Dashboard";
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
                    <!-- Content Perhitungan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Perhitungan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Suhu</th>
                                            <th>Kadar pH</th>
                                            <th>Nutrisi</th>
                                            <th>Ketinggian Air</th>
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
                                                <td><?= $row['ketinggian_air']; ?>cm</td>
                                                <td><?= $row['hasil']; ?></td>
                                            </tr>
                                        <?php } ?>
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
                                            <th>Ketinggian Air</th>
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
                                                <td><?= $row['ketinggian_air']; ?>cm</td>
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