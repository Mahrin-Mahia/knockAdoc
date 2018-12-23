<?php require_once 'includes/header.php'; ?>
<title>Sign up</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body id="doc-signup">
<div id="signup">
    <form class="" method="post">
        <h1>Sign Up For Doctor</h1>

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
        <p>Specialist</p>
        <div class="styled-select blue semi-square">
            <select name="specialist" id="specialist">
                <option value="Cardiologist">Cardiologist</option>
                <option value="Pediatrician">Pediatrician</option>
                <option value="Gynecologist">Gynecologist</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Dermatologist">Dermatologist</option>
                <option value="Medicine">Medicine</option>
                <option value="ENT">ENT</option>
                <option value="Oncologist">Oncologist</option>

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
    $specialist = $_POST["specialist"];

    $sql_query = "INSERT INTO doctor (name,  password, confirm_password, contact_no, address, email, dob, blood_group, gender, specialist)
					VALUES ('$name','$password','$confirm_password','$contact_no','$address', '$email', '$dob','$blood_group', '$gender', '$specialist')";

    if (mysqli_query($conn, $sql_query)) {
        echo "<script>alert('Registration Completed!')</script>";
        echo "<script>window.open('loginfordoctor.php','_self')</script>";
    } else {
        echo "<script>alert('Data could not be inseted. Please try again.')</script>";
    }
}
?>
