<?php
session_start();
if($_SESSION['id']){
    require '../database.php';
    $train=json_decode(read("select * from train;"));
    $station=json_decode(read("select * from trainstation;"));?>
<html>
<head>
    <style>
        .center{
                margin: auto;
                //float: right;
                width: 30%;
                //border: 3px solid black;
                padding: 10px;
            }
            
            input[type=text],input[type=password],select,input[type=button]{
                width: 100%;
                padding: 10px 0px;
            }
    </style>
</head>
<script>
    function validate(){
        var a=document.getElementById('a').value;
        var b=document.getElementById('b').value;
        var c=document.getElementById('c').value;
        var d=document.getElementById('d').value;
        var e=document.getElementById('e').value;
        var f=document.getElementById('f').value;
        var g=document.getElementById('g').value;
        if(a.length&&b.length&&c.length&&d.length&&e.length&&f.length&&g.length>0)
            document.frm.submit();
        else
            document.getElementById('q').innerHTML="above fields cannot be empty";
    }
</script>
<body>
<form name="frm" action="insert.php" method="post" class="center">
    train no:<br>
    <input type="text" id="a" name="train_no"><br><br>
    train name:<br>
    <select id="b" name="train_name">
        <option value="" selected>select</option>
        <?php for($i=0;$i<sizeof($train);$i++){ ?>
        <option value="<?php echo $train[$i]->train_name?>"><?php echo $train[$i]->train_name?></option>
    <?php } ?>
    </select><br><br>
    off-day:<br>
    <select id="c" name="off_day">
        <option value="" selected>select</option>
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
    </select><br><br>
    starting station:<br>
    <select id="d" name="starting_station">
        <option value="" selected>select</option>
        <?php for($i=0;$i<sizeof($station);$i++){ ?>
        <option value="<?php echo $station[$i]->station_name?>"><?php echo $station[$i]->station_name?></option>
    <?php } ?>
    </select><br><br>
    departure time:<br>
    <input id="e" type="text" name="departure_time"><br><br>
    arrival station:<br>
    <select id="f" name="arrival_station">
        <option value="" selected>select</option>
        <?php for($i=0;$i<sizeof($station);$i++){ ?>
        <option value="<?php echo $station[$i]->station_name?>"><?php echo $station[$i]->station_name?></option>
    <?php } ?>
    </select><br><br>
    arrival time:<br>
    <input id="g" type="text" name="arrival_time"><br><br><span id="q"></span><br>
    <input type="button" name="addinfo" onclick="validate()" value="addInfo">
    
</form>
</body>
</html>
<?php }else
    header('location:adminSignin.html');
?>