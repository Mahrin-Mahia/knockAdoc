<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'doctorpatient';

$conn = mysqli_connect($servername, $username, $password, $dbname)

or	die("Connection failed: " . mysqli_connect_error());

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
                echo "successful"
      } else {
                echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);

            }



	?>
