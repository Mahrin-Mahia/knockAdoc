<?php require_once 'includes/header.php'; ?>
<title>Doctor Finder</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>
<?php require_once 'includes/menudoctor.php'?>

<div class="wr">
    <div class="box1">
      <?php require_once 'includes/left-sidebar-doctor.php'; ?>

    </div>
    <div>
        <h2>Please provide the date of appointment below</h2>

        <form action="doctortiming.php" method="POST">
            <p>Set Appointment Date:</p>
            <input type="date" name="a_date"><br>
            <p>Set Timing</p>
            <form class="" action="" method="post">


                <div class="styled-select blue semi-square">
                    <select name="slot" id="slot">
                        <option value="6p.m">6p.m.</option>
                        <option value="6:30p.m">6:30p.m.</option>
                        <option value="7p.m">7p.m.</option>
                        <option value="7:30p.m">7:30p.m.</option>
                        <option value="8p.m">8p.m.</option>

                    </select>
                </div>
                <br>
                <input type="submit" name="submit" value="Confirm">


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
<?php



if (isset($_POST["submit"])) {
    $email = $_SESSION["email"];
    $a_date = $_POST["a_date"];
    $slot = $_POST["slot"];


    $sql_query = "INSERT INTO appointment (email, a_date, slot)
					   VALUES ('$email','$a_date','$slot')";


    if (mysqli_query($conn, $sql_query)) {
        echo "<script>alert('Slot Updated!')</script>";
        echo "<script>window.open('doctortiming.php','_self')</script>";
    } else {
        echo "<script>alert('Data could not be inseted. Please try again.')</script>";
    }
}
?>
