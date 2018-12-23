<div class="box1">
    <div class="profile-pic">

        <?php

        $user_id = $_SESSION["id"];

        $sql = "SELECT * FROM profile_pic_doctor WHERE doctor_id = $user_id";

        $results = $conn->query($sql);

        if ($results->num_rows > 0) {

            while ($row = $results->fetch_assoc()) {
                $image = $row["image_name"];
            }
        }


        ?>

        <?php if ($image): ?>
            <img src="images/profile-pics/<?php echo $image ?>"/>
        <?php else: ?>
            <img src="images/profile-pics/icons8-add_user.png"/>
        <?php endif; ?>

    </div>

    <br>
    <hr>

    <h3>Update Profile Picture</h3>

    <form action="doctorprofile.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit-image">
    </form>

    <?php

    $target_dir = "images/profile-pics/";
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit-image"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // check if profile picture already exists

        $sql = "SELECT * FROM profile_pic_doctor WHERE doctor_id = $user_id";
        $results = $conn->query($sql);

        // Check if file already exists
        if ($results->num_rows > 0) {
            $sql = "UPDATE profile_pic_doctor SET image_name = '$filename' WHERE doctor_id = $user_id ";
        } else {
            $sql = "INSERT INTO profile_pic_doctor (doctor_id,image_name) VALUES ('$user_id','$filename')";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<p></p> <b> Profile picture updated successfully </b> </p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        echo "<meta http-equiv='refresh' content='0'>";
    }


    ?>




    <?php


    $email = $_SESSION['email'];
    $sql11 = mysqli_query($conn, "SELECT * FROM patient where email = '$email'");
    while ($pro = mysqli_fetch_array($sql11)) {

        $name = $pro["name"];
        echo "
 			<p><b>Name </b>: $name </p>
 			";
    }
    ?>
</div>