<?php

function get_suhu()
{
    require "koneksi.php";
    $sql_suhu = "SELECT * FROM `data_suhu`";
    $query_suhu = mysqli_query($con, $sql_suhu) or die("Gagal" . mysqli_error($con));
    while ($row_suhu = mysqli_fetch_array($query_suhu)) {
        $data['min'] = $row_suhu['suhu_min'];
        $data['medB'] = $row_suhu['suhu_med'];
        $data['max'] = $row_suhu['suhu_max'];
    }
    $data['medA'] = ($data['min'] + $data['medB']) / 2;
    $data['medC'] = ($data['medB'] + $data['max']) / 2;

    return $data;
}

function get_klb_udara()
{
    require "koneksi.php";
    $sql_klbp_udara = "SELECT * FROM `data_klbp_udara`";
    $query_klbp_udara = mysqli_query($con, $sql_klbp_udara) or die("Gagal" . mysqli_error($con));
    while ($row_klbp_udara = mysqli_fetch_array($query_klbp_udara)) {
        $data['min'] = $row_klbp_udara['klbp_min'];
        $data['medB'] = $row_klbp_udara['klbp_med'];
        $data['max'] = $row_klbp_udara['klbp_max'];
    }
    $data['medA'] = ($data['min'] + $data['medB']) / 2;
    $data['medC'] = ($data['medB'] + $data['max']) / 2;

    return $data;
}
