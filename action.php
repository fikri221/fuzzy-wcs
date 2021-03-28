<?php
$action = $_GET['action'];

require_once "koneksi.php";
if ($action == "update-rule") {

    $id = $_GET['id'];
    $suhu = $_POST['suhu'];
    $ph = $_POST['ph'];
    $nutrisi = $_POST['nutrisi'];
    $ketinggian_air = $_POST['ketinggian_air'];
    $hasil = $_POST['hasil'];

    $query = mysqli_query($con, "UPDATE `rule` SET `suhu`='$suhu',`ph`='$ph',`nutrisi`='$nutrisi',`ketinggian_air`='$ketinggian_air',`hasil`='$hasil' WHERE `id`='$id'");
    if ($query) {
        echo "<script>alert('Update Rule Berhasil!'); window.location ='data_rule.php' </script>";
    } else {
        echo mysqli_error($con);
    }
} elseif ($action == "save-rule") {
    $suhu = $_POST['suhu'];
    $ph = $_POST['ph'];
    $nutrisi = $_POST['nutrisi'];
    $ketinggian_air = $_POST['ketinggian_air'];
    $hasil = $_POST['hasil'];
    $query = mysqli_query($con, "INSERT INTO `rule`(`suhu`, `ph`, `nutrisi`, `ketinggian_air`, `hasil`) VALUES ('$suhu','$ph','$nutrisi','$ketinggian_air','$hasil')");
    if ($query) {
        echo "<script>alert('Tambah Rule Berhasil!'); window.location ='data_rule.php' </script>";
    } else {
        echo mysqli_error($con);
    }
} elseif ($action == "delete-rule") {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `rule` WHERE `id`='$id'");
    if ($query) {
        echo "<script>alert('Delete Rule Berhasil!'); window.location ='data_rule.php' </script>";
    } else {
        echo mysqli_error($con);
    }
} elseif ($action == "delete-data-kendaraan") {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `data_kendaraan` WHERE `id`='$id'");
    if ($query) {
        echo "<script>alert('Delete Data Kendaraan Berhasil!'); window.location ='data_kendaraan.php' </script>";
    } else {
        echo mysqli_error($con);
    }
}
