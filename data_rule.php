<!-- Header -->
<?php
$page = "data_rule";
$title = "Rule";
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
                    <h1 class="h3 mb-2 text-gray-800">Data Rules / Aturan</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            <div class="col_full float-right">
                                <a class="btn btn-primary" href="tambah_rule.php">Tambah Rule</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IF</th>
                                            <th>Suhu Udara</th>
                                            <th>Kelembapan Udara</th>
                                            <th>Kelembapan Tanah</th>
                                            <th>THEN</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "koneksi.php";
                                        $sql_rule = mysqli_query($con, "SELECT * FROM `rule`") or die("Gagal " . mysqli_error($con));
                                        while ($row = mysqli_fetch_array($sql_rule)) {
                                        ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Suhu <?php echo $row['suhu']; ?></td>
                                                <td>Kelembapan Udara <?php echo $row['kelembapan']; ?></td>
                                                <td>kelembapan Tanah <?php echo $row['kelembapan_tanah']; ?></td>
                                                <td><?php echo $row['hasil']; ?></td>
                                                <td class="text-center"><a class="badge badge-success" href="tambah_rule.php?edit=<?= $row['id'] ?>">Edit</a> /
                                                    <a class="badge badge-danger" href="action.php?action=delete-rule&id=<?= $row['id'] ?>">Delete</a>
                                                </td>
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
    <?php include "layouts/logout_modal.php" ?>

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>
    <!-- End of Scripts -->

</body>

</html>