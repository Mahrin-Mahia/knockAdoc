<div class="booking">
    <?php
    if ($_GET['doc_id'] && $_GET['appointment']) {
        $doc_id = $_GET['doc_id'];
        $appointment = $_GET['appointment'];

        $sql = "SELECT doctor.name,doctor.specialist, appointment.appointment_id ,appointment.slot, appointment.a_date, appointment.booked
                FROM doctor,appointment
                WHERE doctor.doctor_id = appointment.doc_id AND doctor.doctor_id = '$doc_id'";

        $results = $conn->query($sql);

        $slot = array();
        $date = array();
        $booked = array();
        $appointment_id = array();

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $doc_name = $row['name'];
                $doc_specialist = $row['specialist'];
                array_push($appointment_id, $row['appointment_id']);
                array_push($slot, $row['slot']);
                array_push($date, $row['a_date']);
                array_push($booked, $row['booked']);
            }
        }


        echo "
        <div class=\"card\">
  <div class=\"card-header\">
    Make an appointment of <b> Dr. $doc_name </b>
  </div>
  <div class=\"card-body\">
    <h4 class=\"card-title\">$doc_specialist</h4>
    <div class='time'>";
        ?>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Availability</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php

            for ($i = 0; $i < count($slot); $i++) {

                $k = $i + 1;

                if (!$booked[$i]) {
                    $available = 'Yes';
                    $action = "<a href=\"searchdoctor.php?appointment=$appointment_id[$i]&success=1&doctor=$doc_id\" class=\"btn btn-primary\">Confirm Appointment!</a>";
                } else {
                    $available = 'No';
                    $action = '<a href="#" class="btn btn-danger">Not Available!</a>';
                }

                echo "
                <tr>
                <th scope=\"row\"> $k </th>
                <td> $date[$i] </td>
                <td> $slot[$i] </td>
                <td> $available </td>
                <td> $action </td>
            </tr>
            
                
                ";
            }

            ?>


            </tbody>
        </table>


        <?php

        echo "</div>
    
  </div>
</div>
        
        
        ";

    }
    ?>
</div>

<div class="success">
    <?php
    if ($_GET['success'] && $_GET['appointment']) {
        $app_id = $_GET['appointment'];
        $doctor = $_GET['doctor'];
        $sql_app = "UPDATE appointment SET booked=1 WHERE appointment_id= '$app_id'";
        $sql_book = "INSERT INTO bookingconfirmation (appointment_id, patient_id,doctor_id) VALUES ('$app_id', '$user_id', '$doctor')";
        $conn->query($sql_app);
        $conn->query($sql_book);
        echo "<h1> Appointment successful! </h1>";
    }

    ?>


</div>