<?php require_once 'includes/header.php'; ?>
<title>Search</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>

<?php require_once 'includes/menu.php' ?>

<div class="wrapper">
    <?php require_once 'includes/left-sidebar.php' ?>
    <div class="box2">
        <h1>Doctor Search</h1>

        <?php

        $profession = array();

        $sql = "SELECT DISTINCT * FROM doctor";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($profession, $row["specialist"]);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $speciality = $_POST['speciality'];
            $gender = $_POST['radio'];

            if (isset($_POST['doctor-search']) && ($speciality === "Choose Speciality")) {
                echo "<p class=\"text-danger\"> You must select doctors speciality!</p>";
            }
            if (isset($_POST['doctor-search']) && $speciality !== "Choose Speciality" && ($gender === "male" || $gender === "female")) {
                echo "<br> <p class=\"text-info\"> All $speciality doctors who are $gender are listed below: </p>";
                $sql_doc = "SELECT * FROM doctor WHERE specialist = '$speciality' AND gender = '$gender'";
            }
            if (isset($_POST['doctor-search']) && $speciality !== "Choose Speciality" && (!$gender)) {
                echo "<br> <p class=\"text-info\"> All $speciality doctors are listed below: </p>";
                $sql_doc = "SELECT * FROM doctor WHERE specialist = '$speciality'";
            }

            if ($sql_doc) {
                $doctors = $conn->query($sql_doc);
            }

        }

        ?>

        <hr>
        <!--    Doctor Search -->
        <form class="form-inline" method="POST" action="searchdoctor.php">
            <div class="form-group">
                <select name="speciality" class="custom-select">
                    <option>Choose Speciality</option>

                    <?php
                    foreach ($profession as $result) {
                        echo "<option value=\"$result\">$result</option> ";
                    }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label class="custom-control custom-radio">
                    <input id="radio1" name="radio" value="male" type="radio" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Male</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio2" name="radio" type="radio" value="female" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Female</span>
                </label>
            </div>

            <button type="submit" name="doctor-search" class="btn btn-default">Search</button>
        </form>
        <br>
        <p class="text-info"> Selection of Male/Female is optional.</p>


        <div class="row">
            <div class="col">
                <?php require_once 'includes/search-result.php'; ?>
                <?php require_once 'includes/appointment.php'; ?>
            </div>

        </div>

        <hr>
        <br>

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


