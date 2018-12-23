<h1>Medical history</h1>
<p>you can upload your medical prescriptions and reports in JPG format.</p>
<form action="patientprofile.php" method="post" enctype="multipart/form-data">
    File:
    <input type="file" name="imgToUpload" id="imgToUpload" accept="image/*"><br><br>
    <input type="submit" name="submit-history" value="Upload Image">
</form>

</br>
<hr>

<h2>Past Medical History</h2>

<div class="row">

    <div class="col">

        <div class="medical-pic">

            <?php

            $user_id = $_SESSION["id"];

            $sql = "SELECT * FROM medical_history WHERE patient_id = $user_id";
            $results = $conn->query($sql);

            $medicals = array();

            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    $medicals[] = $row["med_image"];
                }
            }


            ?>


            <?php if ($medicals): ?>
                <?php foreach ($medicals as $medical): ?>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <img src="images/medical-history/<?php echo $medical ?>"/>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>

                </br>
                <hr>

                <h3>No medical history yet!</h3>
            <?php endif; ?>

        </div>

    </div>

</div>


<?php



// Check if image file is a actual image or fake image
if (isset($_POST["submit-history"])) {
  $target_dir = "images/medical-history/";
  $med_image = basename($_FILES["imgToUpload"]["name"]);
  $target_file = $target_dir . $med_image;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }


    // SQL query

    $sql2 = "INSERT INTO medical_history (patient_id,med_image) VALUES ('$user_id','$med_image')";


    if ($conn->query($sql2) === TRUE) {
        echo "<p></p> <b> Medical  history added successfully </b> </p>";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }


    // Check file size
    if ($_FILES["imgToUpload"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["imgToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    echo "<meta http-equiv='refresh' content='0'>";
}


?>


</div>
