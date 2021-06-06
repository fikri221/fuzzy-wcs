<?php 
class Mesin_Inferensi {

    function hasil_cepat($nilai_min)
    {
        $var1 = 8;
        $var2 = $var1 - 1;
        $hitung_kiri1 = min($nilai_min) * $var2;
        $hitung_kiri2 = ($hitung_kiri1 - $var1) / -1;
        $hasil_cepat = $hitung_kiri2;
        return $hasil_cepat;
    }

    function hasil_normal($nilai_min)
    {
        $var1 = 5;
        $var2 = 8 - $var1;
        $hitung_kiri1 = min($nilai_min) * $var2;
        $hitung_kiri2 = ($hitung_kiri1 - $var1) / -1;
        $hasil_normal = $hitung_kiri2;
        return $hasil_normal;
    }

    function hasil_lama($nilai_min)
    {
        $var1 = 15;
        $var2 = $var1 - 8;
        $hitung_kiri1 = min($nilai_min) * $var2;
        $hitung_kiri2 = ($hitung_kiri1 - $var1) / -1;
        $hasil_lama = $hitung_kiri2;
        return $hasil_lama;
    }
}
