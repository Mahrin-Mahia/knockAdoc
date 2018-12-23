<?php
	session_start();
?>
<?php
    //Connect to DB
	header('Content-type: image/jpeg');


	//echo  "pic";
    #$id = 'rushrukh@gmail.com';//$_SESSION['email'];
		$id=$_SESSION['email'];
	//echo $id;
    $query = mysqli_query($conn,"SELECT image FROM profilepicture WHERE email='$id';");
    $row = mysqli_fetch_assoc($query); //important that it's array not assoc
	echo $row['image'];
?>
<?php
	if(isset($_SESSION['email'])){
		#echo "<p style = 'color:#00688B'>Welcome ".$_SESSION['email'];
	}
	else{
		#echo "<p style = 'color:#00688B'>Welcome guest";
	}
?>
