<?php
class Suhu
{
    public $min_suhu;
    public $medA_suhu;
    public $medB_suhu;
    public $medC_suhu;
    public $max_suhu;

    function __construct(
        $min_suhu,
        $medA_suhu,
        $medB_suhu,
        $medC_suhu,
        $max_suhu
    ) {
        $this->$min_suhu = $min_suhu;
        $this->$medA_suhu = $medA_suhu;
        $this->$medB_suhu = $medB_suhu;
        $this->$medC_suhu = $medC_suhu;
        $this->$max_suhu = $max_suhu;
    }
}

class Ketinggian_Air
{
    public $min_tinggi;
    public $medA_tinggi;
    public $medB_tinggi;
    public $medC_tinggi;
    public $max_tinggi;

    function __construct(
        $min_tinggi,
        $medA_tinggi,
        $medB_tinggi,
        $medC_tinggi,
        $max_tinggi
    ) {
        $this->$min_tinggi = $min_tinggi;
        $this->$medA_tinggi = $medA_tinggi;
        $this->$medB_tinggi = $medB_tinggi;
        $this->$medC_tinggi = $medC_tinggi;
        $this->$max_tinggi = $max_tinggi;
    }
}

class Perhitungan
{
    function hitung($nilai_suhu, $nilai_ketinggianAir)
    {
        // Proses Inisiasi
        $suhu = new Suhu(10, 20, 30, 35, 40);
        $tinggi_air = new Ketinggian_Air(1, 5, 8, 10, 15);

        $min_suhu = $suhu->min_suhu;
        $medA_suhu = $suhu->medA_suhu;
        $medB_suhu = $suhu->medB_suhu;
        $medC_suhu = $suhu->medC_suhu;
        $max_suhu = $suhu->max_suhu;

        $min_tinggi_air = $tinggi_air->min_tinggi;
        $medA_tinggi_air = $tinggi_air->medA_tinggi;
        $medB_tinggi_air = $tinggi_air->medB_tinggi;
        $medC_tinggi_air = $tinggi_air->medC_tinggi;
        $max_tinggi_air = $tinggi_air->max_tinggi;

        $suhu['rendah'] = $this->rendah($nilai_suhu, $min_suhu, $max_suhu);
        $suhu['sedang'] = $this->sedang($nilai_suhu, $medA_suhu, $medB_suhu, $medC_suhu);
        $suhu['tinggi'] = $this->tinggi($nilai_suhu, $min_suhu, $max_suhu);

        $ketinggianAir['rendah'] = $this->rendah($nilai_ketinggianAir, $min_tinggi_air, $max_tinggi_air);
        $ketinggianAir['sedang'] = $this->sedang($nilai_ketinggianAir, $medA_tinggi_air, $medB_tinggi_air, $medC_tinggi_air);
        $ketinggianAir['tinggi'] = $this->tinggi($nilai_ketinggianAir, $min_tinggi_air, $max_tinggi_air);
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
