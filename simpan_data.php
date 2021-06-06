<?php
class Simpan
{
    function save($id_data, $hasil)
    {
        require_once "koneksi.php";
        global $con;

        $query = mysqli_query($con, "INSERT INTO `hasil`(`id`,`id_data`,`hasil`) VALUES ('NULL','$id_data','$hasil')");
        return $query;
    }
}
