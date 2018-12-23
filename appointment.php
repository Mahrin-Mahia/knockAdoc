<?php require_once 'includes/header.php'; ?>
    <title>Doctor Finder</title>
<?php require_once 'includes/header-bottom.php'; ?>
  <body>
<?php require_once 'includes/menudoctor.php'?>

    <div class="wr">
      <div class="box1">
				<?php require_once 'includes/left-sidebar-doctor.php'; ?>
       <div>
      <h1>Appointments</h1>
      <div class="nested">

      <?php
			$email=$_SESSION['email'];
			$sql13=mysqli_query($conn,"Select * FROM appointment where email='$email'");
			while($pro=mysqli_fetch_array($sql13)){
				$a_id=$pro["appointment_id"];

				#echo "$a_id";
				#echo "<br>";
				$sql14=mysqli_query($conn,"Select * FROM appointment RIGHT JOIN bookingconfirmation ON appointment.appointment_id='$a_id' AND bookingconfirmation.appointment_id='$a_id'");
				while($pro=mysqli_fetch_array($sql14)){
				  $a_id=$pro["appointment_id"];
				  $a_date=$pro["a_date"];
				  $slot=$pro["slot"];
					$patient_email=$pro["patient_email"];
				  #echo "$a_id";
					#echo $patient_email;
					#echo "<br>";

				  echo  $a_date;
					echo "<br>";
				  echo $slot;
				  echo "<br>";


				}

			}




			 ?>
      </div>
      </div>
    <?php require_once 'includes/right-sidebar.php' ?>
    </div>
  </body>
</html>
<?php
	if(isset($_SESSION['email'])){
		#echo "<p style = 'color:#00688B'>Welcome ".$_SESSION['email'];
	}
	else{
		#echo "<p style = 'color:#00688B'>Welcome guest";
	}
?>
