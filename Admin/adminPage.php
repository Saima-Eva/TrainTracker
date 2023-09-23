<?php
session_start();
if($_SESSION['id']){
    require "../database.php";
    //echo $_SESSION['name'];
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <style>
                table{
                    width: 100%;
                    text-align: center
                }
                button{
                    width: 50%;
                    padding: 6px;
                    //color: black;
                    //background-color: darkcyan;
                }

                .left{
                    margin: auto;
                    float: left;
                    padding: 10px;
                    width: 25%;
                    //border: 2px solid #ccc;
                }

                .right{
                    margin: auto;
                    float: right;
                    padding: 10px;
                    width: 70%;
                    //border: 2px solid #ccc;

                }
                .database{ visibility: hidden; }
                .members{ visibility: hidden; }
                .stationmasters{ visibility: hidden; }
            </style>
        </head>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("#vd").click(function(){
                    $(".members").hide();
                    $(".stationmasters").hide();
                    $(".database").show();
                    $(".database").css("visibility","visible");
                });
                $("#vm").click(function(){
                    $(".database").hide();
                    $(".stationmasters").hide();
                    $(".members").show();
                    $(".members").css("visibility","visible");
                });
                $("#vs").click(function(){
                    $(".database").hide();
                    $(".members").hide();
                    $(".stationmasters").show();
                    $(".stationmasters").css("visibility","visible");
                });
    });
        </script>

        <body>
            <div class="left">
                <button id="vd">View Database</button><br><br>
                <button id="vm">view members</button><br><br>
                <button id="vs">view station Masters</button><br><br>
                <a href="logout.php"><button>log out</button></a>
            </div>

            <div class="right">
                <div class="database">
                    <table>
                        <tr>
                            <th>Train No</th>
                            <th>Train Name</th>
                            <th>off-day</th>
                            <th>starting station</th>
                            <th>departure time</th>
                            <th>arrival station</th>
                            <th>arrival time</th>
                        </tr>
                        <?php $json=json_decode(read("select * from trainschedule;"));
                        for($i=0;$i<sizeof($json);$i++){?>
                        <tr>
                            <td><?php echo $json[$i]->train_no;?></td>
                            <td><?php echo $json[$i]->train_name;?></td>
                            <td><?php echo $json[$i]->off_day;?></td>
                            <td><?php echo $json[$i]->starting_station;?></td>
                            <td><?php echo $json[$i]->departure_time;?></td>
                            <td><?php echo $json[$i]->arrival_station;?></td>
                            <td><?php echo $json[$i]->arrival_time;?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <a href="addInfoDatabase.php"><button>Add information</button></a>
                </div>
                <div class="members">
                    <table >
                        <tr>
                            <th>User ID</th>
                            <th>Confirmed</th>
                            <th>Delete data</th>
                        </tr>
                        <?php $json=json_decode(read("select * from regnlog;"));
                        for($i=0;$i<sizeof($json);$i++){?>
                            <tr>
                                <td><?php echo $json[$i]->email;?></td>
                                <td><?php echo $json[$i]->confirmed;?></td>
                                <td><a href="delete.php?mid=<?php echo $json[$i]->email;?>">delete</a></td>
                            </tr>

                        <?php }
                        ?>
                    </table>
                </div>

                <div class="stationmasters">
                    <table>
                        <tr>
                            <th>Station Master ID</th>
                            <th>Station Name</th>
                        </tr>
                        <?php $json=json_decode(read("select * from stationmaster;"));
                        for($i=0;$i<sizeof($json);$i++){?>
                            <tr>
                                <td><?php echo $json[$i]->name;?></td>
                                <td><?php echo $json[$i]->train_station;?></td>
                            </tr>

                        <?php }
                        ?>
                    </table>
                    <a href="addinfo.php"><button>Add information</button></a>
                </div>
            </div>

        </body>
    </html>
<?php }
else
    header('location:adminSignIn.html');
?>