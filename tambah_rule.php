<!-- Header -->
<?php
$title = "Tambah Rule Baru";
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
                $sql = mysqli_query($con, "SELECT * FROM `rule` WHERE `id`='$id'");
                if ($row = mysqli_fetch_array($sql)) {
                    $suhu = $row['suhu'];
                    $kelembapan = $row['kelembapan'];
                    $kelembapan_tanah = $row['kelembapan_tanah'];
                    $hasil = $row['hasil'];

                    $link = "action.php?action=update-rule&id=" . $id;
                }
            } else {
                // Jika Input Data Baru
                $suhu = 0;
                $kelembapan = 0;
                $kelembapan_tanah = 0;
                $hasil = 0;

                $link = "action.php?action=save-rule";
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
                                    <div class="form-group col-md-3">
                                        <label for="">Suhu</label>
                                        <select id="suhu" name="suhu" class="selectpicker show-tick form-control">
                                            <option value="rendah" <?php $suhu1 = "rendah";
                                                                    if ($suhu == $suhu1) {
                                                                        echo "selected";
                                                                    } ?>>Rendah</option>
                                            <option value="sedang" <?php $suhu2 = "sedang";
                                                                    if ($suhu == $suhu2) {
                                                                        echo "selected";
                                                                    } ?>>Sedang</option>
                                            <option value="tinggi" <?php $suhu3 = "tinggi";
                                                                    if ($suhu == $suhu3) {
                                                                        echo "selected";
                                                                    } ?>>Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Kelembapan</label>
                                        <select id="kelembapan" name="kelembapan" class="selectpicker show-tick form-control">
                                            <option value="Basah" <?php $kelembapan1 = "basah";
                                                                    if ($kelembapan == $kelembapan1) {
                                                                        echo "selected";
                                                                    } ?>>Basah</option>
                                            <option value="sedang" <?php $kelembapan2 = "sedang";
                                                                    if ($kelembapan == $kelembapan2) {
                                                                        echo "selected";
                                                                    } ?>>Sedang</option>
                                            <option value="kering" <?php $kelembapan3 = "kering";
                                                                    if ($kelembapan == $kelembapan3) {
                                                                        echo "selected";
                                                                    } ?>>Kering</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Kelembapan Tanah</label>
                                        <select id="kelembapan_tanah" name="kelembapan_tanah" class="selectpicker show-tick form-control">
                                            <option value="rendah" <?php $klbp_tnh1 = "rendah";
                                                                    if ($kelembapan_tanah == $klbp_tnh1) {
                                                                        echo "selected";
                                                                    } ?>>Rendah</option>
                                            <option value="sedang" <?php $klbp_tnh2 = "sedang";
                                                                    if ($kelembapan_tanah == $klbp_tnh2) {
                                                                        echo "selected";
                                                                    } ?>>Sedang</option>
                                            <option value="tinggi" <?php $klbp_tnh3 = "tinggi";
                                                                    if ($kelembapan_tanah == $klbp_tnh3) {
                                                                        echo "selected";
                                                                    } ?>>Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Then</label>
                                        <select id="hasil" name="hasil" class="selectpicker show-tick form-control">
                                            <option value="cepat" <?php $hasil1 = "cepat";
                                                                    if ($hasil == $hasil1) {
                                                                        echo "selected";
                                                                    } ?>>Cepat</option>
                                            <option value="normal" <?php $hasil2 = "normal";
                                                                    if ($hasil == $hasil2) {
                                                                        echo "selected";
                                                                    } ?>>Normal</option>
                                            <option value="lama" <?php $hasil3 = "lama";
                                                                    if ($hasil == $hasil3) {
                                                                        echo "selected";
                                                                    } ?>>Lama</option>
                                        </select>
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
    <?php include "layouts/logout_modal.php" ?>

    <!-- Scripts -->
    <?php include "layouts/scripts.php" ?>
    <!-- End of Scripts -->

</body>

</html>