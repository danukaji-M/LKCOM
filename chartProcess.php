<?php
session_start();
require "connection.php";
$total = array();

$date_rs = Database::search("SELECT * FROM `buyitems`");
$num_of_dates = $date_rs->num_rows;
for ($i = 0; $i < $num_of_dates; $i++) {

    $date_data = $date_rs->fetch_assoc();

    $dateTime = new DateTime($date_data['date']);

    // Extract the month and year
    $month = $dateTime->format('m'); // Month in two digits (e.g., 01 for January)
    $year = $dateTime->format('Y');  // Year in four digits (e.g., 2023)
    for ($j = 2023; $j <= $year; $j++) {
        $total1  = 0;
        $price_data = 0;
        if ($month == "1") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '".$year."-".$month."'");
            
            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "2") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "3") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "4") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "5") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "6") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "7") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "8") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "9") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "10") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "11") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        } elseif ($month == "12") {
            $total1 = 0;
            $price_rs = Database::search("SELECT * FROM buyitems WHERE DATE_FORMAT(date, '%Y-%m') = '" . $year . "-" . $month . "'");

            while ($price_data = $price_rs->fetch_assoc()) {
                $total1 = $total1 + $price_data['buy_price'];
            }
            $total[$j."-".$month] = $total1;
        }
    }
}
$jsonArray = json_encode($total);
echo $jsonArray;