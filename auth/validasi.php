<?php
$action = $_GET['action'];

if ($action == "register") {
    require_once '../koneksi.php';
    $username = mysqli_real_escape_string($con, $_POST['register-form-username']);
    $email = mysqli_real_escape_string($con, $_POST['register-form-email']);
    $password = mysqli_real_escape_string($con, $_POST['register-form-password']);
    $status = '1';

    if (!empty($username) && !empty($email) && !empty($password)) {

        $query = mysqli_query($con, "INSERT INTO `user`(`username`, `email`, `password`, `status`) VALUES ('$username', '$email', '$password', '$status')");

        if ($query) {
            echo "<script>alert('Anda berhasil Registrasi'); window.location ='login.php' </script>";
        } else {
            echo "<script>alert('Anda gagal Registrasi'); window.location ='login.php' </script>";
        }
    } else {
        echo "<script>alert('Anda gagal Registrasi'); window.location ='login.php' </script>";
    }
} elseif ($action == "login") {
    include '../koneksi.php';

    $username = mysqli_real_escape_string($con, $_POST['login-form-username']);
    $password = mysqli_real_escape_string($con, $_POST['login-form-password']);

    if (!empty($username) && !empty($password)) {
        $query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
        $result = mysqli_fetch_array($query);

        $status = $result['status'];
        $id = $result['id'];

        $data = mysqli_num_rows($query);

        if ($data == 1) {

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $status;
            header('location: ../index.php');
        } else {
            echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";
            session_destroy();
        }
    } else {
        echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";
        session_destroy();
    }
} elseif ($action == "logout") {
    if (!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
    echo "<script>alert('Logout Berhasil!'); window.location ='../index.php' </script>";
}
