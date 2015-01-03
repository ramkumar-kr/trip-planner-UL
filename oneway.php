<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 3/1/15
 * Time: 10:47 PM
 */
require('dayparser.php');
function getonewaydata($connection, $start,$end)
{
    echo '  <table class="table table-bordered table-hover table-responsive">
            <thead><tr><th>Train Number</th><th>Train Name</th><th>Description</th><th>Departing Station</th><th>Days of Departure</th><th>Time of Departure</th><th>Arriving Station</th><th>Arrival Days</th><th>Arrival Time</th></tr></thead>
            <tbody>';
    $q1 = "SELECT v.number,t.name,t.description,s.Name,v.Days,v.time,s2.Name,v2.Days,v2.time FROM visit as v, visit as v2,trains as t, Stations as s,Stations as s2 where v.St_id='$start' and v2.St_id='$end' and v.hop_index<v2.hop_index and v.number=v2.number and v.type=1 and v2.type=0 and t.number=v.number and s.St_id = v.St_id and s2.St_id = v2.St_id";//query
    $res1 = mysqli_query($connection, $q1);
    $num = mysqli_num_rows($res1);
    if ($num == 0) {
        echo '<tr><td colspan=9 class="text-center">No  Routes Found</td></tr>';
    } else {
        for ($i = 0; $i < $num; $i++) {
            $row = mysqli_fetch_array($res1);
            $obtain_departure_days = obtaindays($row[4]);
            $obtain_arrival_days = obtaindays($row[7]);
            $dep_days = implode("  ", $obtain_departure_days);
            $arr_days = implode("  ", $obtain_arrival_days);
            echo '<tr class="table table-responsive"><td>' . $row[0] . '</td><td>' . $row[1] . '</td><td>' . $row[2] . '</td><td>' . $row[3] . '</td><td>' . $dep_days . '</td><td>' . $row[5] . '</td><td>' . $row[6] . '</td><td>' . $arr_days . '</td><td>' . $row[8] . '</td></tr>';

        }
    }
    echo '</tbody></table>';
}