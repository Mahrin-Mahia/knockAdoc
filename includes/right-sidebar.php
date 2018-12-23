<div class="box3">
    <h1>Notice</h1>
    <?php

    $text = (mysqli_query($conn, "SELECT * FROM notice ;"));
    while ($row = mysqli_fetch_assoc($text)) {


        echo $row['notice'];
        echo "<br> <br>";
    }

    ?>
</div>
