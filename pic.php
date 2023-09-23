<!DOCTYPE html>
<html>
<head><script>
function validate(){
	flag=true;
	if(document.mfm.fileToUpload.value.length==0){
		flag=false;
	}
	if(document.mfm.uName.value.length==0){
		flag=false;
	}
	return flag;
}
</script>
</head>
<body>

<form action="upload2.php" method="post" enctype="multipart/form-data" name="mfm"><pre>
picture name : <input type="text" name="uName" id="uName">

Select image to upload : <input type="file" name="fileToUpload" id="fileToUpload">
 
<input type="submit" onclick="return validate();" value="Upload File" name="submit"></pre>
</form>

<!--<a href="uploads/66713154.jpg" target="_blank">
<img width="50px" height="50px" src="uploads/66713154.jpg">
</a>-->
</body>
</html>