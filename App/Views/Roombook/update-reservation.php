<?php

use App\Models\Roombook; 
require_once "./autoloader.php"; 

$roombook = new Roombook();
$reservations = $roombook->all();

foreach ($reservations as $trow) {
    $check_in = $trow->Cin;

    if (isset($check_in)) {
        echo "<tr>";
        echo "<td>" . $trow->id . "</td>";
        echo "<td>" . $trow->FName . " " . $trow->LName . "</td>";
        echo "<td>" . $trow->Email . "</td>";
        echo "<td>" . $trow->Country . "</td>";
        echo "<td>" . $trow->TRoom . "</td>";
        echo "<td>" . $trow->Bed . "</td>";
        echo "<td>" . $trow->Meal . "</td>";
        echo "<td>" . $trow->Cin . "</td>";
        echo "<td>" . $trow->Cout . "</td>";
        echo "<td>" . $trow->Stat . "</td>";
        echo "<td><a href='roombook.php?rid=" . $trow->id . "' class='btn btn-primary'>Action</a></td>";
        echo "</tr>";
    }
}
