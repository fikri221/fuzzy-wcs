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

class Perhitungan
{
    function hitung($nilai_suhu, $nilai_kelembapan)
    {
        $min_suhu = 10;
        $medA_suhu = 20;
        $medB_suhu = 30;
        $medC_suhu = 35;
        $max_suhu = 40;

        $min_kelembapan = 20;
        $medA_kelembapan = 35;
        $medB_kelembapan = 50;
        $medC_kelembapan = 65;
        $max_kelembapan = 80;

        $suhu['rendah'] = $this->rendah($nilai_suhu, $min_suhu, $medB_suhu);
        $suhu['sedang'] = $this->sedang($nilai_suhu, $medA_suhu, $medB_suhu, $medC_suhu);
        $suhu['tinggi'] = $this->tinggi($nilai_suhu, $medB_suhu, $max_suhu);

        $kelembapan['rendah'] = $this->rendah($nilai_kelembapan, $min_kelembapan, $max_kelembapan);
        $kelembapan['sedang'] = $this->sedang($nilai_kelembapan, $medA_kelembapan, $medB_kelembapan, $medC_kelembapan);
        $kelembapan['tinggi'] = $this->tinggi($nilai_kelembapan, $min_kelembapan, $max_kelembapan);

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
