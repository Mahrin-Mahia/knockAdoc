<?php require_once 'includes/header.php'; ?>
<title>Sign up</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body id="signup-patient">
<div id="signup">
    <form method="post" action="">
        <h1>Sign Up For Patient</h1>

        <p>Name</p>
        <input type="text" name="firstname" id="firstname" placeholder="Enter your name"/><br>
        <p>Email Address</p>
        <input type="email" name="email" id="email" placeholder="Enter your email"/><br>
        <p>Password</p>
        <input type="password" name="password" id="password" placeholder="Enter your password"/><br>
        <p>Confirm password</p>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password"/><br>
        <p>Contact No</p>
        <input type="tel" name="phonenumber" id="phonenumber" placeholder="Enter your phone number"/><br>
        <p>Address</p>
        <input type="text" name="address" id="address"
               placeholder="Enter your chember area. e.g. Uttara/Dhanmondi"/><br>
        <p>Date of Birth</p>
        <input type="date" name="bday">

        <p>Blood group</p>
        <div class="styled-select blue semi-square">
            <select name="blood_group" id="blood_group">
                <option value="a positive">A+</option>
                <option value="b positive">B+</option>
                <option value="ab positive">AB+</option>
                <option value="o positive">O+</option>
                <option value="a negative">A-</option>
                <option value="b negative">B-</option>
                <option value="ab negative">AB-</option>
                <option value="o negative">O-</option>
            </select>
        </div>
        <p>Gender</p>
        <div class="styled-select blue semi-square">
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <input type="submit" name="submit" id="signup-btn" value="Confirm">
</div>
</form>
</body>
</html>


<?php



if (isset($_POST["submit"])) {
    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $contact_no = $_POST["phonenumber"];
    $address = $_POST["address"];
    $dob = $_POST["bday"];
    $blood_group = $_POST["blood_group"];
    $gender = $_POST["gender"];


    $sql_query = "INSERT INTO patient (name, email, password, confirm_password, contact_no, address, dob, blood_group, gender)
					VALUES ('$name','$email','$password','$confirm_password','$contact_no','$address','$dob','$blood_group', '$gender')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script>alert('Registration Completed!')</script>";
        echo "<script>window.open('loginforpatient.php','_self')</script>";
    } else {
        echo "<script>alert('Data could not be inseted. Please try again.')</script>";
    }
}
?>
