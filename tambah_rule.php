<!-- Header -->
<?php $title = "Tambah Rule Baru";
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
                $sql = mysqli_query($con, "SELECT * FROM `rule` WHERE `id`='$id'");
                if ($row = mysqli_fetch_array($sql)) {
                    $suhu = $row['suhu'];
                    $ph = $row['ph'];
                    $nutrisi = $row['nutrisi'];
                    $kelembapan = $row['kelembapan'];
                    $hasil = $row['hasil'];

                    $link = "action.php?action=update-rule&id=" . $id;
                }
            } else {
                // Jika Input Data Baru
                $suhu = 0;
                $ph = 0;
                $nutrisi = 0;
                $kelembapan = 0;
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
                                    <div class="form-group col-md-2 mx-3">
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
                                    <div class="form-group col-md-2 mx-3">
                                        <label for="">Kadar pH</label>
                                        <select id="ph" name="ph" class="selectpicker show-tick form-control">
                                            <option value="rendah" <?php $ph1 = "rendah";
                                                                    if ($ph == $ph1) {
                                                                        echo "selected";
                                                                    } ?>>Rendah</option>
                                            <option value="sedang" <?php $ph2 = "sedang";
                                                                    if ($ph == $ph2) {
                                                                        echo "selected";
                                                                    } ?>>Sedang</option>
                                            <option value="tinggi" <?php $ph3 = "tinggi";
                                                                    if ($ph == $ph3) {
                                                                        echo "selected";
                                                                    } ?>>Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mx-3">
                                        <label for="">Nutrisi</label>
                                        <select id="nutrisi" name="nutrisi" class="selectpicker show-tick form-control">
                                            <option value="rendah" <?php $nutrisi1 = "rendah";
                                                                    if ($nutrisi == $nutrisi1) {
                                                                        echo "selected";
                                                                    } ?>>Rendah</option>
                                            <option value="sedang" <?php $nutrisi2 = "sedang";
                                                                    if ($nutrisi == $nutrisi2) {
                                                                        echo "selected";
                                                                    } ?>>Sedang</option>
                                            <option value="tinggi" <?php $nutrisi3 = "tinggi";
                                                                    if ($nutrisi == $nutrisi3) {
                                                                        echo "selected";
                                                                    } ?>>Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mx-3">
                                        <label for="">Kelembapan</label>
                                        <select id="kelembapan" name="kelembapan" class="selectpicker show-tick form-control">
                                            <option value="Basah" <?php $kelembapan1 = "Basah";
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
                                    <div class="form-group col-md-2 mx-3">
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