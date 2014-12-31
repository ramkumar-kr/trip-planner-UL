<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 31/12/14
 * Time: 11:43 PM
 */
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
                <li class="active"><a href=".">Home</a></li>
                <li><a href="" data-toggle="modal" data-target="#about">About Developer</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Navigation bar ends-->

<!--Main Content -->
<div class="container">
    <div class="row">
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