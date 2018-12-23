<?php require_once 'includes/header.php'; ?>
<title>Booking</title>
<?php require_once 'includes/header-bottom.php'; ?>


<body>

<?php require_once 'includes/menu.php'?>
<div class="wrapper">
  <?php require_once 'includes/left-sidebar.php' ?>
    <div class="box2">

        <?php



        $email = $_SESSION['email'];
        $sql = mysqli_query($conn, "SELECT * FROM patient where email = '$email'");
        while ($pro = mysqli_fetch_array($sql)) {
            $_SESSION["id"] = $pro["patient_id"];
            $name = $pro["name"];
            $email = $pro["email"];
            $contact_no = $pro["contact_no"];


            echo "

											<h1>Booking Confirmation</h1>
											<p><b>Name </b>: $name </p>
											<p><b>Email </b>: $email </p>
											<p><b>Phone </b>: $contact_no </p>

							";

        }
        $email = $_POST['email'];
        $a_date = $_POST['a_date'];
        $slot = $_POST['slot'];

        echo '
										<form class="nested" action="confirmation.php" method="post">


										<p>Doctor Email: <b> ' . $email . ' </b></p>
										<p>Appointment Date: ' . $a_date . ' </p>
										<p>Appointment Slot: ' . $slot . ' </p>
										<input type ="hidden" name = "doctoremail" value =' . $email . '>
										<input type ="hidden" name = "a_date" value =' . $a_date . '>
										<input type ="hidden" name = "slot" value =' . $slot . '>
										<input type="submit" name="ok" value="OK" >
										</form>


			';

        ?>

    </div>
    <?php require_once 'includes/right-sidebar.php' ?>


</div>
</body>
</html>


</body>
</html>
<?php
if (isset($_SESSION['email'])) {
    #echo "<p style = 'color:#00688B'>Welcome ".$_SESSION['email'];
} else {
    #echo "<p style = 'color:#00688B'>Welcome guest";
}
?>
