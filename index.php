<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 28/12/14
 * Time: 11:16 PM
 */
error_reporting(E_ALL);
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
                    <li><a href="" data-toggle="modal" data-target="#about">Readme</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Navigation bar ends-->

    <!--Main Content -->
    <div class="container-fluid">
        <div class="row">
            <br/><br/><br/>
            <div class="col-sm-4 col-sm-offset-8"><button class="btn btn-info btn-block btn-lg btn-warning" id="btntgl" onclick="toggle()">Toggle between Direct or Multiway Trips</button></div>
            <br/>
            <!--One Way Trip Form -->
            <div id="OnewayTrip" class="col-md-8 col-lg-6 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1">
                <h2>One Way Trip Form</h2>
                <form method="post" action="query_trip_oneway.php" role="form" class="form-control-static">
                    <!-- Starting Point -->
                        <div class="form-group">
                            <label for="startpoint">Departing Station</label>
                            <select id="startpoint" class="form-control" name="startpoint">
                                <?php
                                //get stations to select as a dropdown
                                $q1 = "select * from Stations order by Name ASC;";//query
                                $res1 = mysqli_query($connection,$q1);
                                $num = mysqli_num_rows($res1);
                                for($i=0;$i<$num;$i++){
                                    $row = mysqli_fetch_array($res1);
                                    ?>
                                    <option value="<?echo $row['St_id'];?>"><? echo $row['Name']; ?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>

                        <!-- End Point -->
                        <div class="form-group">
                            <label for="endpoint">Destination</label>
                            <select id="endpoint" class="form-control" name="endpoint">
                                <?php
                                //get stations to select as a dropdown
                                $q1 = "select * from Stations order by Name ASC;";//query
                                $res1 = mysqli_query($connection,$q1);
                                $num = mysqli_num_rows($res1);
                                for($i=0;$i<$num;$i++){
                                    $row = mysqli_fetch_array($res1);
                                    ?>
                                    <option value="<?echo $row['St_id'];?>"><? echo $row['Name']; ?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Date of Travel -->
                        <div class="form-group">
                            <label for="date_travel">Date of Travel</label>
                            <input type="date" class="form-control" id="date_travel" name="date_travel" placeholder="Enter Date in yyyy-mm-dd format" required>
                        </div>

                        <!-- Time -->
                        <div class="form-group">
                            <label for="dep_time">Departing time</label>
                            <input type="time" class="form-control" id="dep_time" name="dep_time" placeholder="Enter Time of Departure in hh:mm format (24 hour format)" required>
                        </div>
                    <div class="checkbox form-group">
                        <label for="return">
                        <input type="checkbox" id="return" name="return" value="1" checked/> Plan for Return Journey</label>
                    </div>

                        <button type="submit" class="btn btn-primary btn-lg pull-right">Submit</button>
                        <button type="reset" class="btn btn-danger btn-lg pull-left">Reset</button>
                    </form>
            </div>

            <br/><br/>


            <!-- Same Thing Applied for Multiway Trip, hidden by Default and Background color Changed-->
            <div id="MultiwayTrip" class=" col-md-8 col-lg-6 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-3 col-sm-offset-1 col-xs-offset-1 well" >
                <h2>Multi Way Trip Form</h2>
                <form method="post" action="query_trip_multiway.php" role="form" class="form-control-static">
                    <!-- Starting Point -->
                    <div class="form-group">
                        <label for="startpoint">Departing Station</label>
                        <select id="startpoint" class="form-control" name="startpoint" required>
                            <?php
                            //get stations to select as a dropdown
                            $q1 = "select * from Stations order by Name ASC;";//query
                            $res1 = mysqli_query($connection,$q1);
                            $num = mysqli_num_rows($res1);
                            for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_array($res1);
                                ?>
                                <option value="<?echo $row['St_id'];?>"><? echo $row['Name']; ?></option>
                            <?
                            }
                            ?>
                        </select>
                    </div>

                    <!-- End Point -->
                    <div class="form-group">
                        <label for="endpoint">Destination</label>
                        <select id="endpoint" class="form-control" name="endpoint" required>
                            <?php
                            //get stations to select as a dropdown
                            $q1 = "select * from Stations order by Name ASC;";//query
                            $res1 = mysqli_query($connection,$q1);
                            $num = mysqli_num_rows($res1);
                            for($i=0;$i<$num;$i++){
                                $row = mysqli_fetch_array($res1);
                                ?>
                                <option value="<?echo $row['St_id'];?>"><? echo $row['Name']; ?></option>
                            <?
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Date of Travel -->
                    <div class="form-group">
                        <label for="date_travel">Date of Travel</label>
                        <input type="date" class="form-control" id="date_travel" name="date_travel" placeholder="Enter Date in mm/dd/yyyy format" required>
                    </div>

                    <!-- Time -->
                    <div class="form-group">
                        <label for="dep_time">Departing time</label>
                        <input type="time" class="form-control" id="dep_time" name="dep_time" placeholder="Enter Time of Departure" required>
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
                    <h3 class="modal-title">Some Notes</h3>

                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item ">All Timings are in 24 hour format</li>
                        <li class="list-group-item ">Only Some Trains such as Chennai Express, Pushpak Express(From Mumbai to Lucknow) and Kamkhya Ledo Intercity Express journey details are added to the database</li>
                        <li class="list-group-item text-danger">Code has not been written to add a train journey to the database. </li>
                        <li class="list-group-item text-danger">If the browser supports HTML5 input as date functionality, a pop up appears to select date and time. If not, a text field will be shown</li>
                        <li class="list-group-item">The Procedure to add a train data to database is as follows<br/>
                            <ol>
                                <li>Add the stations/locations (if already not present) to the stations table</li>
                                <li>Add the train to the trains table with the required parameters</li>
                                <li>Complete the visit table by adding appropriate data for every station visited by the train</li>
                            </ol></li>
                        <li class="list-group-item text-info text-justify">The days stored in the visit table are encoded as follows:<br/>
                            Each day of the week has a specific number associated with it.(numbers are powers of 2).<br/>
                            The numbers are specified in non-decreasing order starting from Monday till Sunday<br/>
                            Monday -> 1, Tuesday -> 2, Wednesday -> 4, Thursday -> 8, Friday ->16, Saturday -> 32, Sunday ->64<br/>
                            If a train runs on multiple days, just add the specific numbers of all the days.<br/>
                            For example, if a train runs on wednesday and saturday, the value will be 36<br/><br/>
                            The main intention of using this is to minimize amount of time spent in fetching data from the database by performing few more computations.
                        </li>
                        <li class="list-group-item">Few improvements are possible in incorporating date and time of departure and arrival</li>
                    </ul>
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
        num=1;
        function toggle(){
            $('#btntgl').toggleClass('btn-warning');
            $('#OnewayTrip').toggle('slow');
            $('#MultiwayTrip').toggle('slow');
        }
        $(document).ready(function(){
            $('#MultiwayTrip').hide('0');

        })
    </script>
    <!-- Bootstrap Javascript files-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>