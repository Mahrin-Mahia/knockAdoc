<?php require_once 'includes/header.php'; ?>
<title>Login | Patient</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body id="login-page">
<div id="login">
    <form method="post">
        <h1>Log In</h1>
        <h2>Patient</h2>
        <p>Username</p>
        <input type="email" name="email" id="email" placeholder="Enter your username/ id"/><br>
        <p>Password</p>
        <input type="password" name="password" id="password" placeholder="Enter your password"/><br>
        <input type="submit" name="submit" id="login-btn" value="Log In"><br>


</div>

</form>
</body>
</html>


<?php
require_once 'config/db.php';


if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql_query = "SELECT email, password FROM patient WHERE email = '$email' AND password = '$password'";

    $login_acc = mysqli_query($conn, $sql_query);
    $check = mysqli_num_rows($login_acc);


    if ($check == 0) {
        echo "<script>alert('Incorrect combination. Please try again.')</script>";
        echo "<script>window.open('loginforpatient.php','_self')</script>";
    } else {

        $_SESSION['email'] = $email;
        $query = "SELECT * FROM patient WHERE email = '$email' ";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row["patient_id"];
        }
        // echo "<script>alert('Login successful.')</script>";
        echo "<script> window.location = 'patientprofile.php' ;</script>";
    }

}

?>
