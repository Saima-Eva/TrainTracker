<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","train_tracker");
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
$jsonData=getJSONFromDB("select * from regnlog where email = '".$_SESSION["email"]."'; ");
$json=json_decode($jsonData);
$getpic=getJSONFromDB("select * from picture where email = '".$_SESSION["email"]."'; ");
$pic=json_decode($getpic);
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Train Tracker</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        xmlhttp = new XMLHttpRequest();
        function showHint() {
            str=document.getElementById('search').value;
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //alert(xmlhttp.responseText);

                    m=document.getElementById("livesearch");
                    m.innerHTML=xmlhttp.responseText;
                }
            };
            var url="search.php?value="+str;
            //alert(url);
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }
    </script>  
</head>
<body>
	<div>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#"><?php echo('user'); ?></a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li class="active"><a href="#">Home</a></li>
      			<li><a href="#">View Profile</a></li>
    		</ul>
    		<form class="navbar-form navbar-right">
      			<div class="form-group">
        			<input type="text" id='search' class="form-control" placeholder="Search">
      			</div>
      			
      			<a href=""><button class="btn btn-default">Log-out</button></a>
    		</form>
  		</div>
	</nav>
	</div>
	<div class="navbar-form navbar-right" id="livesearch" onkeyup="showHint()">pol</div>
</body>
</html>