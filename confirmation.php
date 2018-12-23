<?php require_once 'includes/header.php'; ?>
<title>Confirmation</title>
<?php require_once 'includes/header-bottom.php'; ?>


<body>
<?php require_once 'includes/menu.php'?>
<div id="select">
    <h1>Appointment confirmed!! <a href="patientprofile.php">click here</a> to go to your profile. </h1>
</div>


</body>
</html>
<?php
if (isset($_SESSION['email'])) {
    #echo "<p style = 'color:#00688B'>Welcome ".$_SESSION['email'];
} else {
    #echo "<p style = 'color:#00688B'>Welcome guest";
}
?>


<?php


$email = $_SESSION['email'];
$doctoremail = $_POST['doctoremail'];
$a_date = $_POST['a_date'];
$slot = $_POST['slot'];


$sql_query = mysqli_query($conn, "SELECT * FROM appointment where slot = '$slot' AND a_date = '$a_date' AND email ='$doctoremail'");
while ($pro = mysqli_fetch_array($sql_query)) {
    $appointment_id = $pro["appointment_id"];
    $patient_email = $email;


    $sql_querynew = "INSERT INTO bookingconfirmation(appointment_id, patient_email)
				VALUES ('$appointment_id','$patient_email')";
    $res = mysqli_query($conn, $sql_querynew) or die ("something went wrong");


}

?>
