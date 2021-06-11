<?php
class Mesin_Inferensi
{

    function hasil_cepat($nilai_min)
    {
        require "koneksi.php";

        // Menentukan nilai siram min, med dan max
        $sql_siram = "SELECT * FROM `data_siram`";
        $query_siram = mysqli_query($con, $sql_siram) or die("Gagal" . mysqli_error($con));
        while ($row_siram = mysqli_fetch_array($query_siram)) {
            $siram_min = $row_siram['siram_min'];
            $siram_medB = $row_siram['siram_med'];
        }

        $var2 = $siram_medB - $siram_min;
        $hitung_kiri1 = min($nilai_min) * $var2;
        $hitung_kiri2 = ($hitung_kiri1 - $siram_medB) / -1;
        $hasil_cepat = $hitung_kiri2;
        return $hasil_cepat;
    }

    function hasil_normal($nilai_min)
    {
        require "koneksi.php";

        // Menentukan nilai siram min, med dan max
        $sql_siram = "SELECT * FROM `data_siram`";
        $query_siram = mysqli_query($con, $sql_siram) or die("Gagal" . mysqli_error($con));
        while ($row_siram = mysqli_fetch_array($query_siram)) {
            $siram_min = $row_siram['siram_min'];
            $siram_medB = $row_siram['siram_med'];
        }
        $siram_medA = ($siram_min + $siram_medB) / 2;

        $var2 = $siram_medB - $siram_medA;
        $hitung_kiri1 = min($nilai_min) * $var2;
        $hitung_kiri2 = ($hitung_kiri1 - $siram_medA) / -1;
        $hasil_normal = $hitung_kiri2;
        return $hasil_normal;
    }

    function hasil_lama($nilai_min)
    {
        require "koneksi.php";

        // Menentukan nilai siram min, med dan max
        $sql_siram = "SELECT * FROM `data_siram`";
        $query_siram = mysqli_query($con, $sql_siram) or die("Gagal" . mysqli_error($con));
        while ($row_siram = mysqli_fetch_array($query_siram)) {
            $siram_medB = $row_siram['siram_med'];
            $siram_max = $row_siram['siram_max'];
        }

        $var2 = $siram_max - $siram_medB;
        $hitung_kiri1 = min($nilai_min) * $var2;
        $hitung_kiri2 = ($hitung_kiri1 - $siram_max) / -1;
        $hasil_lama = $hitung_kiri2;
        return $hasil_lama;
    }
}
