<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 28/12/14
 * Time: 11:16 PM
 */

/*Database Details*/
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
            <br/><br/><br/>
            <div class="col-sm-4 col-sm-offset-8"><button class="btn btn-info btn-block btn-lg" id="btntgl" onclick="toggle()">Toggle between Direct or Multiway Trips</button></div>
            <br/>
            <!--One Way Trip Form -->
            <div id="OnewayTrip" class="col-md-8 col-lg-6 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1">
                <h2>One Way Trip Form</h2>
                <form method="post" action="query_trip_oneway.php" role="form" class="form-control-static">
                    <!-- Starting Point -->
                    <div class="form-group">
                        <label for="startpoint">Departing Station</label>
                        <select id="startpoint" class="form-control">
                            <?php
                            //get stations to select as a dropdown
                            $q1 = "select * from Stations;";//query
                            $res1 = mysqli_query($connection,$q1);
                            $num = mysqli_num_rows($res1);
                            for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_array($res1);
                                echo '<option>'. $row["Name"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- End Point -->
                    <div class="form-group">
                        <label for="endpoint">Destination</label>
                        <select id="endpoint" class="form-control">
                            <?php
                            //get stations to select as a dropdown
                            $q1 = "select * from Stations;";//query
                            $res1 = mysqli_query($connection,$q1);
                            $num = mysqli_num_rows($res1);
                            for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_array($res1);
                                echo '<option>'. $row["Name"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Date of Travel -->
                    <div class="form-group">
                        <label for="date_travel">Date of Travel</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter Date in mm/dd/yyyy format">
                    </div>

                    <!-- Time -->
                    <div class="form-group">
                        <label for="dep_time">Departing time</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Enter Time of Departure in hh:mm XX where XX can be AM or PM">
                    </div>
                    <!-- Include Return Journey option-->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Plan for Return Journey also
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg pull-right">Submit</button>
                    <button type="reset" class="btn btn-danger btn-lg pull-left">Reset</button>
                </form>
            </div>

            <br/><br/>


            <!-- Same Thing Applied for Multiway Trip, hidden by Default and Background color Changed-->
            <div id="MultiwayTrip" class=" col-md-8 col-lg-6 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 well" >
                <h2>Multi Way Trip Form</h2>
                <form method="post" action="query_trip_mutliway.php" role="form" class="form-control-static">
                    <!-- Starting Point -->
                    <div class="form-group">
                        <label for="startpoint">Departing Station</label>
                        <select id="startpoint" class="form-control">
                            <?php
                            //get stations to select as a dropdown
                            $q1 = "select * from Stations;";//query
                            $res1 = mysqli_query($connection,$q1);
                            $num = mysqli_num_rows($res1);
                            for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_array($res1);
                                echo '<option>'. $row["Name"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- End Point -->
                    <div class="form-group">
                        <label for="endpoint">Destination</label>
                        <select id="endpoint" class="form-control">
                            <?php
                            //get stations to select as a dropdown
                            $q1 = "select * from Stations;";//query
                            $res1 = mysqli_query($connection,$q1);
                            $num = mysqli_num_rows($res1);
                            for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_array($res1);
                                echo '<option>'. $row["Name"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Date of Travel -->
                    <div class="form-group">
                        <label for="date_travel">Date of Travel</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter Date in mm/dd/yyyy format">
                    </div>

                    <!-- Time -->
                    <div class="form-group">
                        <label for="dep_time">Departing time</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Enter Time of Departure">
                    </div>
                    <!--  Return Journey option not included-->

                    <button type="submit" class="btn btn-primary btn-lg pull-right">Submit</button>
                    <button type="reset" class="btn btn-danger btn-lg pull-left">Reset</button>
                </form>
            </div>



            </div>

        </div>
    </div>
    <!--Main Content Ends-->

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
    <script>
        function toggle(){
            $('#OnewayTrip').toggle();
            $('#MultiwayTrip').toggle();
        }
        $(document).ready(function(){
            $('#MultiwayTrip').hide('0');
        })
    </script>
    <!-- Bootstrap Javascript files-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>