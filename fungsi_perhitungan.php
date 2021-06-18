<?php
class Suhu
{
    public $min_suhu;
    public $medA_suhu;
    public $medB_suhu;
    public $medC_suhu;
    public $max_suhu;

    function __construct($min_suhu, $medA_suhu, $medB_suhu, $medC_suhu, $max_suhu)
    {
        $this->min_suhu = $min_suhu;
        $this->medA_suhu = $medA_suhu;
        $this->medB_suhu = $medB_suhu;
        $this->medC_suhu = $medC_suhu;
        $this->max_suhu = $max_suhu;
    }
}

class Kelembapan
{
    public $min_kelembapan;
    public $medA_kelembapan;
    public $medB_kelembapan;
    public $medC_kelembapan;
    public $max_kelembapan;

    function __construct($min_kelembapan, $medA_kelembapan, $medB_kelembapan, $medC_kelembapan, $max_kelembapan)
    {
        $this->min_kelembapan = $min_kelembapan;
        $this->medA_kelembapan = $medA_kelembapan;
        $this->medB_kelembapan = $medB_kelembapan;
        $this->medC_kelembapan = $medC_kelembapan;
        $this->max_kelembapan = $max_kelembapan;
    }
}

class Fuzzyfikasi
{
    function hitung($nilai_suhu, $nilai_kelembapan)
    {
        require "koneksi.php";

        // Menentukan nilai suhu min, med dan max
        $sql_suhu = "SELECT * FROM `data_suhu`";
        $query_suhu = mysqli_query($con, $sql_suhu) or die("Gagal" . mysqli_error($con));
        while ($row_suhu = mysqli_fetch_array($query_suhu)) {
            $suhu_min = $row_suhu['suhu_min'];
            $suhu_medB = $row_suhu['suhu_med'];
            $suhu_max = $row_suhu['suhu_max'];
        }
        $suhu_medA = ($suhu_min + $suhu_medB) / 2;
        $suhu_medC = ($suhu_medB + $suhu_max) / 2;

        // Menentukan nilai kelemb. udara min, med dan max
        $sql_klbp_udara = "SELECT * FROM `data_klbp_udara`";
        $query_klbp_udara = mysqli_query($con, $sql_klbp_udara) or die("Gagal" . mysqli_error($con));
        while ($row_klbp_udara = mysqli_fetch_array($query_klbp_udara)) {
            $klbp_udara_min = $row_klbp_udara['klbp_min'];
            $klbp_udara_medB = $row_klbp_udara['klbp_med'];
            $klbp_udara_max = $row_klbp_udara['klbp_max'];
        }
        $klbp_udara_medA = ($klbp_udara_min + $klbp_udara_medB) / 2;
        $klbp_udara_medC = ($klbp_udara_medB + $klbp_udara_max) / 2;

        $suhu['rendah'] = $this->rendah($nilai_suhu, $suhu_min, $suhu_medB);
        $suhu['sedang'] = $this->sedang($nilai_suhu, $suhu_medA, $suhu_medB, $suhu_medC);
        $suhu['tinggi'] = $this->tinggi($nilai_suhu, $suhu_medB, $suhu_max);

        $kelembapan['kering'] = $this->rendah($nilai_kelembapan, $klbp_udara_min, $klbp_udara_medB);
        $kelembapan['sedang'] = $this->sedang($nilai_kelembapan, $klbp_udara_medA, $klbp_udara_medB, $klbp_udara_medC);
        $kelembapan['basah'] = $this->tinggi($nilai_kelembapan, $klbp_udara_medB, $klbp_udara_max);

        $hasil = array(
            "suhu" => $suhu,
            "kelembapan" => $kelembapan,
        );
        $hasil;
        return $hasil;
    }

    function rendah($nilai, $min, $max)
    {
        if ($nilai <= $min) {
            return 1;
        } elseif ($min <= $nilai && $nilai <= $max) {
            $hasil = ($max - $nilai) / ($max - $min);
            return $hasil;
        } elseif ($nilai >= $max) {
            return 0;
        }
    }

    function sedang($nilai, $medA, $medB, $medC)
    {
        if ($nilai <= $medA || $nilai >= $medC) {
            return 0;
        } elseif ($medA <= $nilai && $nilai <= $medB) {
            $hasil = ($nilai - $medA) / ($medB - $medA);
            return $hasil;
        } elseif ($medB <= $nilai && $nilai <= $medC) {
            $hasil = ($medC - $nilai) / ($medC - $medB);
            return $hasil;
        }
    }

    function tinggi($nilai, $min, $max)
    {
        if ($nilai <= $min) {
            return 0;
        } elseif ($min <= $nilai && $nilai <= $max) {
            $hasil = ($nilai - $min) / ($max - $min);
            return $hasil;
        } elseif ($nilai >= $max) {
            return 1;
        }
    }
}
