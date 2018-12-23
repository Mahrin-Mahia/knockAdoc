<?php

if (isset($_POST['image'])) {
    $filetmp = $_FILES['name']['tmp'];
    $filename = '/images/profile-pics/' . $_SESSION['id'] . 'jpg';

    move_uploaded_file($filetmp, $filename);
}