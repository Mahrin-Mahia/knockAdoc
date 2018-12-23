<?php

$profession = array();

$sql = "SELECT * FROM doctor";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    array_push($profession, $row["specialist"]);
}

?>