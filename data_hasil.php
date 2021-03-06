<!-- Header -->
<?php 
$page = "data_hasil";
$title = "Data Hasil";
include "layouts/header.php";
?>
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
                    <h1 class="h3 mb-2 text-gray-800">Data Hasil</h1>
                    <p class="mb-4">Data hasil yang telah disimpan kedalam database.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Hasil</h6>
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
                                        $sql_data = mysqli_query($con, "SELECT hasil.hasil, data.id, data.suhu, data.kelembapan, data.tanggal FROM hasil INNER JOIN data ON hasil.id_data = data.id ORDER BY data.tanggal DESC") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_data)) {
                                        ?>
                                            <tr>
                                                <td><a href="formula_hasil.php?edit=<?= $row['id'] ?>"><?= date("j F Y, H:i a", strtotime($row['tanggal'])) ?></a></td>
                                                <td><?= $row['suhu']; ?> &degC</td>
                                                <td><?= $row['kelembapan']; ?> %</td>
                                                <td><?= $row['hasil'] ?></td>
                                            </tr>
                                        <?php
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
    <?php include "layouts/logout_modal.php" ?>

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>
    <!-- End of Scripts -->

</body>

</html>