<?php require_once 'includes/header.php'; ?>
<title>Booking</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>
<ul class="nav">
    <h2>Need Doctor</h2>
    <li><a href="patientprofile.php">Profile</a></li>
    <li><a href="searchdoctor.php">Search</a></li>
    <li><a href="  patientfeedback.php">Feedback</a></li>
    <li>
        <?php
        if (!isset($_SESSION['email'])) {
            echo "<a   href = 'loginfordoctor.php'>Login</a>";
        } else {
            echo "<a  href = 'logout.php'>Logout</a>";
        }
        ?>
    </li>

</ul>
<div class="wrapper">
    <div class="box1">

        <img src="image.jpg" align="center"><br>

        <p>Name: Wasit Ahmed <br></p>
        <p>Lorem ipsum dolor sit amet,.</p>
    </div>
    <div class="box2">

        <form class="" action="confirmbooking.php" method="post">
            <h1>Booking</h1>
            <p>Select date</p>
            <input type="date" name="bday">
            <p>Select time</p>
            <input type="radio" name="time" value="time1">10a.m. <br>
            <input type="radio" name="time" value="time1">10:15a.m. <br>
            <input type="radio" name="time" value="time1">10:30a.m. <br>
            <input type="radio" name="time" value="time1">11a.m. <br>
            <input type="radio" name="time" value="time1">11:15a.m. <br>
            <input type="radio" name="time" value="time1">11:30a.m. <br>
            <input type="radio" name="time" value="time1">7p.m. <br>
            <input type="radio" name="time" value="time1">7:15p.m. <br>
            <input type="radio" name="time" value="time1">7:30p.m. <br>
            <input type="radio" name="time" value="time1">8p.m. <br>
            <input type="radio" name="time" value="time1">8:15p.m. <br>
            <input type="radio" name="time" value="time1">8:30p.m. <br>
            <input type="submit" name="booking" value="Confirm">


        </form>
    </div>
    <div class="box3">
        <h1>Notice</h1>
        <marquee direction="up">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
            qui officia deserunt mollit anim id est laborum.
        </marquee>

    </div>


</div>
</body>
</html>
<?php
echo "hi ok " . $_POST['email'];
if (isset($_SESSION['email'])) {
    echo "<p style = 'color:#00688B'>Welcome " . $_SESSION['email'];
} else {
    echo "<p style = 'color:#00688B'>Welcome guest";
}
?>
