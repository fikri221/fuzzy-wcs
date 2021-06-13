<!-- Header -->
<?php 
$title = "Tambah Jadwal";
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
            <?php
            // Jika Memperbarui Data
            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];

                require_once "koneksi.php";
                $sql = mysqli_query($con, "SELECT * FROM `jadwal_siram` WHERE `id`='$id'");
                if ($row = mysqli_fetch_array($sql)) {
                    $pagi = $row['pagi'];
                    $sore = $row['sore'];

                    $link = "action.php?action=update-jadwal&id=" . $id;
                }
            } else {
                // Jika Input Data Baru
                $pagi = 0;
                $sore = 0;

                $link = "action.php?action=save-jadwal";
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
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= $link ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-2 mx-3">
                                        <label for="">Pagi</label>
                                        <input type="time" class="form-control" id="pagi" name="pagi" value="<?= $pagi ?>">
                                    </div>
                                    <div class="form-group col-md-2 mx-3">
                                        <label for="">Sore</label>
                                        <input type="time" class="form-control" id="sore" name="sore" value="<?= $sore ?>">
                                    </div>
                                </div>
                                <div class="mx-3">
                                    <p><strong>Note:</strong> Masukkan waktu dalam format 24 jam.</p>
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
    <?php include "layouts/logout_modal.php" ?>

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>
    <!-- End of Scripts -->

</body>

</html>