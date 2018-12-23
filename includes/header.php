<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/db.php';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">