<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 31/12/14
 * Time: 11:42 PM
 */

require('oneway.php');

$start=$_POST['startpoint'];
$end=$_POST['endpoint'];
$date=$_POST['date_travel'];
$time=$_POST['dep_time'];

$host="localhost";
$uname="root";//uname => username
$pwd="";//pwd => password
$dbname="trip_planner";//dbname => database name
$connection = mysqli_connect($host,$uname,$pwd,$dbname);

//check for errors during connection
if(mysqli_connect_error($connection)) {
    echo "Failed to establish connection with database. Please try again or contact administrator.";
    exit();
}
else{
    //proceed to display options

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Trip Planner</title>

    <!-- Bootstrap CSS -->
    <link href = "bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href=".">Trip Planner </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-hidden="true">
            <ul class="nav navbar-nav">
                <li ><a href=".">Home</a></li>
                <li><a href="" data-toggle="modal" data-target="#about">About Developer</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Navigation bar ends-->

<!--Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br/><br/><br/><br/><br/>
                <?php
                $q1 = "select distinct number from visit where((number in (select  number from visit where St_id=14 and type=1)or number in (select  number from visit where St_id=18 and type=0)  ) and St_id!=$start and St_id!=$end)";//query
                $res1 = mysqli_query($connection,$q1);
                $num = mysqli_num_rows($res1);
                if($num == 0)
                {
                    echo '<tr><td colspan=8 class="text-center">No Transit Routes Found</td></tr>';
                }
                else {
                    $row = mysqli_fetch_row($res1);
                    $train1=$row[0];
                    $row = mysqli_fetch_row($res1);
                    $train2=$row[0];
                    $q2="SELECT DISTINCT v.St_id,s.Name FROM visit AS v, Stations AS s WHERE v.St_id IN ( SELECT DISTINCT St_id FROM visit WHERE ( number ='$train1' ) ) AND v.St_id IN ( SELECT DISTINCT St_id FROM visit WHERE ( number ='$train2' ) ) AND ( v.number = '$train1' OR v.number = '$train2' ) AND v.St_id = s.St_id ";

                    $res2 = mysqli_query($connection,$q2);

                    $num2 = mysqli_num_rows($res2);

                        $row2 = mysqli_fetch_array($res2);
                        $transit=$row2[0];

                            getonewaydata($connection,$start,$transit);
                            echo '<hr/><h4> Transit Station : '.$row2[1].'<hr/></h4>';
                            getonewaydata($connection,$transit,$end);

                        ?>

                    <?

                }
                ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go Back </a>
        </div>
    </div>
</div>
<!-- Modal Window for info about me -->
<div class="modal fade" aria-hidden="true" id="about" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hidden="true" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> </button>
                <h3 class="modal-title">About the developer</h3>

            </div>
            <div class="modal-body">
                <div class="well"><h4 class="h4">Ram Kumar K R</h4> Information Science Branch, <br/> R V College of Engineering</div>
            </div>
            <div class="modal-footer">
                <a role="button" href="mailto:ramkumarkr@outlook.in" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Send a message</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Window for info about me ends-->

<!--jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Bootstrap Javascript files-->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>