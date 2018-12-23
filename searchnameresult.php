<?php require_once 'includes/header.php'; ?>
<title>Search Result</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>

<?php require_once 'includes/menu.php'?>
<div class="wrapper">
  <?php require_once 'includes/left-sidebar.php' ?>
    <div class="box2">
        <?php



        $searchname = $_POST['searchname'];
        $sql = mysqli_query($conn, "SELECT * FROM doctor where name = '$searchname'");
        echo "<h1>Search Result</h1>";


        while ($pro = mysqli_fetch_array($sql)) {
            #  $_SESSION["id"] = $pro["patient_id"];
            $name = $pro["name"];
            $email = $pro["email"];
            $address = $pro["address"];
            $specialist = $pro["specialist"];


            $sql_query = mysqli_query($conn, "SELECT * FROM appointment LEFT JOIN bookingconfirmation ON appointment.appointment_id <> bookingconfirmation.appointment_id where email = '$email'");
            while ($pro = mysqli_fetch_array($sql_query)) {
                $slot = $pro["slot"];
                $a_date = $pro["a_date"];


                echo '
                <form class="nested" action="Confirmbooking.php" method="post">


                <p>Name: <b> ' . $name . ' </b></p>
                <p>Address: ' . $address . ' </p>
								<p>Email: ' . $email . ' </p>
                <p>Specialist: ' . $specialist . ' </p>
								<p>Slot: ' . $slot . ' </p>
								<p>Date: ' . $a_date . ' </p>
								<input type ="hidden" name = "email" value =' . $email . '>
								<input type ="hidden" name = "a_date" value =' . $a_date . '>
								<input type ="hidden" name = "slot" value =' . $slot . '>
                <input type="submit" name="booking" value="Confirm booking" >
                </form>




      ';
            }

        }


        ?>
    </div>

  <?php require_once 'includes/right-sidebar.php' ?>


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
