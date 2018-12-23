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
        <?php


        $search = $_POST['search'];
        $sql = mysqli_query($conn, "SELECT * FROM patient where name = '$search'");
        echo "<h1>Search Result</h1>";


        while ($pro = mysqli_fetch_array($sql)) {
            #  $_SESSION["id"] = $pro["patient_id"];
            $name = $pro["name"];
            $address = $pro["address"];
            $contact_no = $pro["contact_no"];
            $blood_group = $pro["blood_group"];
            $gender = $pro["gender"];
            $dob = $pro["dob"];


            echo '
                <p>Name: <b> ' . $name . ' </b></p>

								<p>Date of birth: <b> ' . $dob . ' </b></p>
                <p>Sex: ' . $gender . ' </p>
								<p>Blood group: <b> ' . $blood_group . ' </b></p>
                <p>Address: ' . $address . ' </p>
								<p>Phone: ' . $contact_no . ' </p>




      ';
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
