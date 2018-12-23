<?php require_once 'includes/header.php'; ?>
<title>Profile</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>
<?php
$email = $_SESSION['email'];

?>

<?php require_once 'includes/menu.php' ?>

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
            $gender = $pro["gender"];
            $contact_no = $pro["contact_no"];
            $address = $pro["address"];
            $blood_group = $pro["blood_group"];
            $dob = $pro["dob"];

            echo "

<h1> Profile Information </h1>

<hr>

<table class=\"table table-primary table-striped\">
    <thead>
      <tr>
        <th>Title</th>
        <th>Information</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td> <b> Name </b> </td>
        <td>$name</td>
      </tr>
      <tr>
        <td><b>Email</b></td>
        <td>$email</td>
      </tr>
      <tr>
        <td><b>Gender</b></td>
        <td>$gender</td>
      </tr>

      <tr>
        <td><b> Date of Birth </b></td>
        <td> $dob </td>
      </tr>

      <tr>
        <td><b> Contact Number </b></td>
        <td> $contact_no </td>
      </tr>

      <tr>
        <td> <b> Address </b> </td>
        <td> $address </td>
      </tr>

      <tr>
        <td> <b> Blood Group </b></td>
        <td> $blood_group </td>
      </tr>

    </tbody>
  </table>

  ";

        }


        ?>

    </div>

    <?php require_once 'includes/right-sidebar.php' ?>


    <div class="box4">
        <div class="row">
            <div class="col">

                <?php require_once 'includes/my-bookings.php'; ?>

                <?php
                if(isset($_GET['booking']) && isset($_GET['cancel'])) {
                  if ($_GET['booking'] && $_GET['cancel']) {
                      $booking = $_GET['booking'];
                      $app_id = $_GET['appointment'];
                      $sql = "DELETE FROM bookingconfirmation WHERE booking_id = '$booking'";
                      $sql_app = "UPDATE appointment SET booked=0 WHERE appointment_id= '$app_id'";
                      $conn->query($sql);
                      $conn->query($sql_app);
                      echo "<meta http-equiv='refresh' content='0'>";
                  }
                }

                ?>

            </div>
        </div>
        <?php require_once 'includes/medical-history.php' ?>
    </div>


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
