<?php require_once 'includes/header.php'; ?>
<title>Doctor Finder</title>
<?php require_once 'includes/header-bottom.php'; ?>

<body>
<?php require_once 'includes/menudoctor.php'?>

<div class="wr">
    <div class="box1">
      <?php require_once 'includes/left-sidebar-doctor.php'; ?>
    <div class="box2">
        <h1>Search</h1>
        <form class="" action="patientsearch.php" method="post">
            <input type="text" name="search" placeholder="Search Patient by name or id">
            <input type="submit" name="submit" value="Search">
    </div>
    </form>
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
