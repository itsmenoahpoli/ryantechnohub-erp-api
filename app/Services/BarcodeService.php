<?php

namespace App\Services;

class BarcodeService
{
    public static function generateBarcode()
    {
        $time = time();

        $barcode = '20' . str_pad($time, 10, '0');
        $weightflag = true;
        $sum = 0;

        for ($i = strlen($barcode) - 1; $i >= 0; $i--) {
            $sum += (int)$barcode[$i] * ($weightflag ? 3 : 1);
            $weightflag = !$weightflag;
        }

        $barcode .= (10 - ($sum % 10)) % 10;

        return $barcode;
    }

    public static function searchByBarcode($barcode)
    {

    }
}
