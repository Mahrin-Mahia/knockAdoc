<?php

$conn = mysqli_connect("localhost", "root", "", "doctorpatient");
if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
