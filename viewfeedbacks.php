<?php require_once 'includes/header.php'; ?>
<title>Doctor Finder</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>
<?php require_once 'includes/menudoctor.php'?>

<div class="wr">
    <div class="box1">
      <?php require_once 'includes/left-sidebar-doctor.php'; ?>


    </div>
    <div class="box2">
        <h2>Feedbacks</h2>
        <?php

        $feedback = (mysqli_query($conn, "SELECT * FROM feedBack ;"));
        while ($row = mysqli_fetch_assoc($feedback)) {
            echo "<p><b>Patient Email: </b></p>";
            echo $row['patient_email'];

            echo "<p><b>Feedbacks: </b></p>";
            echo $row['feedback'];
            echo "<br>";
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
