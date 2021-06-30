<?php
class CalculatorController {
    public function calculator($obj) {
        $weight = (int)$obj['weight'];
        $lot = (int)$obj['lot'];
        $adress = $obj['adress'];
        $price = null;
        $final_price = null;
        if ($adress == "amba") {
            if ($weight <= 1) {
                $price = $lot * 545;
            } else if ($weight > 1 && $weight <= 5) {
                $price = $lot * 600;
            } else if ($weight > 5 && $weight <= 10) {
                $price = $lot * 830;
            } else if ($weight > 10 && $weight <= 15) {
                $price = $lot * 1010;
            } else if ($weight > 15 && $weight <= 20) {
                $price = $lot * 1210;
            } else if ($weight > 20 && $weight <= 25) {
                $price = $lot * 1470;
            } else {
                $message = "El peso debe ser menor a 25 kg.";
            }
        } else {
            if ($weight <= 1) {
                $price = $lot * 755;
            } else if ($weight > 1 && $weight <= 5) {
                $price = $lot * 930;
            } else if ($weight > 5 && $weight <= 10) {
                $price = $lot * 1240;
            } else if ($weight > 10 && $weight <= 15) {
                $price = $lot * 1530;
            } else if ($weight > 15 && $weight <= 20) {
                $price = $lot * 1790;
            } else if ($weight > 20 && $weight <= 25) {
                $price = $lot * 2150;
            } else {
                $message = "El peso debe ser menor a 25 kg.";
            }
        }
        if ($price > 5000 && $lot > 10) {
            $final_price = $price - ($price*(10/100));
        } else if ($price < 5000 && $lot > 10) {
            $final_price = $price - ($price*(5/100));
        } else {
            $final_price = $price;
        }
        return $final_price;
    }
}
?>