<?php require_once 'includes/header.php'; ?>
<title>Search</title>
<?php require_once 'includes/header-bottom.php'; ?>


<body>

<div class="row">

    <div class="col">



    </div>

</div>

<?php require_once 'includes/menu.php'?>

<div class="wrapper">

    <?php require_once 'includes/left-sidebar.php'; ?>

    <div class="box2">
        <h1>Give your feedback</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


            <textarea rows="10" cols="150" name="feedback"
                      placeholder="Post your feedback. e.g. Dr. Mahia, my feedback"></textarea><br><br>


            <input type="submit" name="submit" value="Done"><br><br><br>
        </form>
        <?php
        $email = $_SESSION['email'];
        if (isset($_POST["submit"])) {

            $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
            $query = "INSERT INTO feedback (patient_email, feedback) VALUES ('$email','$feedback')";
            mysqli_query($conn, $query) or die ('Error updating database' . mysqli_error($conn));
        }

        ?>
        <br>
        <div>
            <br>
            <h2>Feedbacks</h2>
            <?php

            $feedback = (mysqli_query($conn, "SELECT * FROM feedBack ;"));
            while ($row = mysqli_fetch_assoc($feedback)) {
                echo "<p><b>Patient Email: </b></p>";
                echo $row['patient_email'];

                echo "<p><b>Feedback: </b></p>";
                echo $row['feedback'];
                echo "<br>";
            }

            ?>

        </div>

    </div>
    <?php require_once 'includes/right-sidebar.php' ?>


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
