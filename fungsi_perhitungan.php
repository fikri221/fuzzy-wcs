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
        require "get_data.php";

        // Menentukan nilai suhu min, med dan max
        $get_suhu = get_suhu();

        // Menentukan nilai kelemb. udara min, med dan max
        $get_klb_udara = get_klb_udara();

        $suhu['rendah'] = $this->rendah($nilai_suhu, $get_suhu['min'], $get_suhu['medB']);
        $suhu['sedang'] = $this->sedang($nilai_suhu, $get_suhu['medA'], $get_suhu['medB'], $get_suhu['medC']);
        $suhu['tinggi'] = $this->tinggi($nilai_suhu, $get_suhu['medB'], $get_suhu['max']);

        $kelembapan['kering'] = $this->rendah($nilai_kelembapan, $get_klb_udara['min'], $get_klb_udara['medB']);
        $kelembapan['sedang'] = $this->sedang($nilai_kelembapan, $get_klb_udara['medA'], $get_klb_udara['medB'], $get_klb_udara['medC']);
        $kelembapan['basah'] = $this->tinggi($nilai_kelembapan, $get_klb_udara['medB'], $get_klb_udara['max']);

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
        if ($nilai <= $medA && $nilai >= $medC) {
            return 0;
        } elseif ($medA <= $nilai && $nilai <= $medB) {
            $hasil = ($nilai - $medA) / ($medB - $medA);
            return $hasil;
        } elseif ($medB <= $nilai && $nilai <= $medC) {
            $hasil = ($medB - $nilai) / ($medC - $medB);
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
