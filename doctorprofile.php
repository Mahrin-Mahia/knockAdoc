<?php require_once 'includes/header.php'; ?>
<title>Doctor Finder</title>
<?php require_once 'includes/header-bottom.php'; ?>


<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["post"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["post"]);
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<?php require_once 'includes/menudoctor.php'?>

<div class="wr">
    <div class="box1">

        <?php require_once 'includes/left-sidebar-doctor.php'; ?>


        <br><br><br>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <textarea name="comments" placeholder="Post your notice here. e.g. your name, your post" rows="5"
                      cols="35"></textarea>
            <input name="submit" type="submit" value="submit"/>
        </form>
        <?php
        $email = $_SESSION['email'];
        if (isset($_POST["submit"])) {

            $text = mysqli_real_escape_string($conn, $_POST['comments']);
            $query = "INSERT INTO notice (doctor_email, notice) VALUES ('$email','$text')";
            mysqli_query($conn, $query) or die ('Error updating database' . mysqli_error($conn));
        }

        ?>

    </div>
    <div>
        <?php




        $sql = mysqli_query($conn, "SELECT * FROM doctor where email = '$email'");

        while ($pro = mysqli_fetch_array($sql)) {
            $_SESSION["id"] = $pro["doctor_id"];
            $name = $pro["name"];
            $email = $pro["email"];
            $gender = $pro["gender"];
            $contact_no = $pro["contact_no"];
            $address = $pro["address"];
            $blood_group = $pro["blood_group"];
            $dob = $pro["dob"];
            $specialist = $pro["specialist"];

            echo "

                <h1>Doctor Information</h1>
                <p><b>Name </b>: $name </p>
                <p><b>Email </b>: $email </p>
                <p><b>Gender </b>: $gender </p>
                <p><b>Date of Birth </b>: $dob </p>
                <p><b>Phone </b>: $contact_no </p>
                <p><b>Address </b>: $address </p>
                <p><b>Blood Group </b>: $blood_group </p>
								<p><b>Specialist </b>: $specialist </p>
      </div>

      ";
        }


        ?>

        <div class="box2">
            <h1>Notice</h1>
            <?php
            $text = (mysqli_query($conn, "select * from notice where doctor_email = '$email';"));
            while ($row = mysqli_fetch_assoc($text)) {


                echo $row['notice'];
                echo "<br> <br>";
            }

            ?>

        </div>


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
