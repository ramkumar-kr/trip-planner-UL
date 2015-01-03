<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 3/1/15
 * Time: 5:51 PM
 */


//The days of the week are stored as numbers as follows
// 1 - Monday
// 2 - Tuesday
// 4 - Wednesday
// 8 - Thursday
// 16 -Friday
// 32 - Saturday
// 64 - Sunday
//To store more than one day just add the numbers.
// Example - For a Train arriving at a station on Tuesday and Thursday, add the days' respective codes which is 2+8=10.
function obtaindays($number){
    $days=array();
    $i=0;
    if($number>=64){
        $days[$i]='Sunday';
        $i++;
        $number=$number%64;
    }

    if($number>=32){
        $days[$i]='Saturday';
        $i++;
        $number=$number%32;
    }

    if($number>=16){
        $days[$i]='Friday';
        $i++;
        $number=$number%16;
    }

    if($number>=8){
        $days[$i]='Thursday';
        $i++;
        $number=$number%8;
    }

    if($number>=4){
        $days[$i]='Wednesday';
        $i++;
        $number=$number%4;
    }

    if($number>=2){
        $days[$i]='Tuesday';$i++;
        $number=$number%2;
    }

    if($number>=1){
        $days[$i]='Monday';$i++;
        $number=$number%1;
    }

    return array_reverse($days);

}

?>