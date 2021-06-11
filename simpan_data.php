<?php
class Simpan
{
    function save($id_data, $hasil)
    {
        require_once "koneksi.php";
        global $con;

        $query = mysqli_query($con, "INSERT INTO `hasil`(`id_data`,`hasil`) VALUES ('$id_data','$hasil')");
        return $query;
    }
}
