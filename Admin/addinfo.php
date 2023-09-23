<!DOCTYPE html>
<html>
    <head>
        <title>Train Tracker</title>
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
            body{
                margin: 50px;
                background-color: floralwhite;
            }
            
        </style>
    </head>
    <script type="text/javascript">
        function sid(){
			if(document.getElementById('SMID').value.length<2){
				//alert('too short');
				return false;
			}
			else
				return true;
		}
		function sn(){
			if(document.getElementById('sn').value.length<2){
				//alert('too short');
				return false;
			}
			else
				return true;
		}
		function ps(){
			if(document.getElementById('ps').value.length<2){
				//alert('too short');
				return false;
			}
			else
				return true;
		}
		function cp(){
			if(document.getElementById('cp').value==document.getElementById('ps').value){
				//alert('too short');
				return true;
			}
			else
				return false;
		}
		
		function sub(){
			if(sid()&&sn()&&ps()&&cp()){
				document.frm.submit();

			}
			else
				alert('not ok');
		}
		
</script>
    <body>
        
        <div class="center"> 
            <form name="frm" action="AddStationMaster.php" method="get">
                
                Station Master ID:<br>
                <input type="text" name="StationMasterID" id="SMID" onkeyup="sid()" required><br/>

                Station Name:<br>
                <select id="sn" name="StationName">
                    <option value="" selected>select</option>
        <?php require'../database.php'; $station=json_decode(read("select * from trainstation;"));
                    for($i=0;$i<sizeof($station);$i++){ ?>
                    <option value="<?php echo $station[$i]->station_name?>"><?php echo $station[$i]->station_name?></option>
    <?php } ?>
                </select><br><br>

                Password:<br>
                <input type="password" id="ps" name="password" onkeyup="ps()" required><br><br>

                Confirm Password:<br>
                <input type="password" id="cp" name="cpassword" onkeyup="cp()" required><br> <span id="pass"></span><br>


                <input type="button" onclick="sub()" value="Add Station Master">
            </form>
        </div>
        
        
    </body>
</html>