<?php
$action = $_GET['action'];

require_once "koneksi.php";
// Kondisi untuk Rule
if ($action == "update-rule") {

    $id = $_GET['id'];
    $suhu = $_POST['suhu'];
    $kelembapan_tanah = $_POST['kelembapan_tanah'];
    $kelembapan = $_POST['kelembapan'];
    $hasil = $_POST['hasil'];

    $query = mysqli_query($con, "UPDATE `rule` SET `suhu`='$suhu',`kelembapan_tanah`='$kelembapan_tanah',`kelembapan`='$kelembapan',`hasil`='$hasil' WHERE `id`='$id'");
    if ($query) {
        echo "<script>alert('Update Rule Berhasil!'); window.location ='data_rule.php' </script>";
    } else {
        echo mysqli_error($con);
    }
} elseif ($action == "save-rule") {
    $suhu = $_POST['suhu'];
    $kelembapan = $_POST['kelembapan'];
    $kelembapan_tanah = $_POST['kelembapan_tanah'];
    $hasil = $_POST['hasil'];
    $query = mysqli_query($con, "INSERT INTO `rule`(`suhu`, `kelembapan_tanah`, `kelembapan`, `hasil`) VALUES ('$suhu','$kelembapan_tanah','$kelembapan','$hasil')");
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

// Kondisi untuk Jadwal Penyiraman
elseif ($action == "update-jadwal") {
    $id = $_GET['id'];
    $pagi = $_POST['pagi'];
    $sore = $_POST['sore'];
    $query = mysqli_query($con, "UPDATE `jadwal_siram` SET `pagi`='$pagi',`sore`='$sore' WHERE `id`='$id'");
    if ($query) {
        echo "<script>alert('Update Jadwal Berhasil!'); window.location ='index.php' </script>";
    } else {
        echo mysqli_error($con);
    }
} elseif ($action == "save-jadwal") {
    $pagi = $_POST['pagi'];
    $sore = $_POST['sore'];
    $query = mysqli_query($con, "INSERT INTO `jadwal_siram`(`pagi`, `sore`) VALUES ('$pagi','$sore')");
    if ($query) {
        echo "<script>alert('Tambah Jadwal Berhasil!'); window.location ='index.php' </script>";
    } else {
        echo mysqli_error($con);
    }
}

// Kondisi untuk Pengaturan Data Tanaman (Suhu Min, Med dan Max)
elseif ($action == "update-data-tanaman") {
    $id = $_GET['id'];
    // Data Suhu
    $suhu_min = $_POST['suhu_min'];
    $suhu_med = $_POST['suhu_med'];
    $suhu_max = $_POST['suhu_max'];

    // Data Kelembapan Udara
    $klbp_min = $_POST['klbp_min'];
    $klbp_med = $_POST['klbp_med'];
    $klbp_max = $_POST['klbp_max'];

    // Data Lama Penyiraman
    $siram_min = $_POST['siram_min'];
    $siram_med = $_POST['siram_med'];
    $siram_max = $_POST['siram_max'];

    $query_suhu = mysqli_query($con, "UPDATE `data_suhu` SET `suhu_min`='$suhu_min',`suhu_med`='$suhu_med',`suhu_max`='$suhu_max' WHERE `id`='$id'");
    $query_klbp_udara = mysqli_query($con, "UPDATE `data_klbp_udara` SET `klbp_min`='$klbp_min',`klbp_med`='$klbp_med',`klbp_max`='$klbp_max' WHERE `id`='$id'");
    $query_siram = mysqli_query($con, "UPDATE `data_siram` SET `siram_min`='$siram_min',`siram_med`='$siram_med',`siram_max`='$siram_max' WHERE `id`='$id'");
    if ($query_suhu && $query_klbp_udara && $query_siram) {
        echo "<script>alert('Update Data Tanaman Berhasil!'); window.location ='index.php' </script>";
    } else {
        echo mysqli_error($con);
    }
} elseif ($action == "save-data-tanaman") {
    // Data Suhu
    $suhu_min = $_POST['suhu_min'];
    $suhu_med = $_POST['suhu_med'];
    $suhu_max = $_POST['suhu_max'];

    // Data Kelembapan Udara
    $klbp_min = $_POST['klbp_min'];
    $klbp_med = $_POST['klbp_med'];
    $klbp_max = $_POST['klbp_max'];

    // Data Lama Penyiraman
    $siram_min = $_POST['siram_min'];
    $siram_med = $_POST['siram_med'];
    $siram_max = $_POST['siram_max'];

    $query_suhu = mysqli_query($con, "INSERT INTO `data_suhu`(`suhu_min`, `suhu_med`, `suhu_max`) VALUES ('$suhu_min','$suhu_med','$suhu_max')");
    $query_klbp_udara = mysqli_query($con, "INSERT INTO `data_klbp_udara`(`klbp_min`, `klbp_med`, `klbp_max`) VALUES ('$klbp_min','$klbp_med','$klbp_max')");
    $query_siram = mysqli_query($con, "INSERT INTO `data_siram`(`siram_min`, `siram_med`, `siram_max`) VALUES ('$siram_min','$siram_med','$siram_max')");
    if (
        $query_suhu && $query_klbp_udara && $query_siram
    ) {
        echo "<script>alert('Tambah Data Tanaman Berhasil!'); window.location ='index.php' </script>";
    } else {
        echo mysqli_error($con);
    }
}
