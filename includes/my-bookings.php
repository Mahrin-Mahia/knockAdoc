<div class="">
    <h1>My Current Appointment</h1>

    <?php

    $sql = "SELECT doctor.doctor_id,doctor.name, appointment.a_date, appointment.slot,doctor.contact_no, bookingconfirmation.booking_id,appointment.appointment_id
                    FROM bookingconfirmation,doctor,appointment
                    WHERE bookingconfirmation.doctor_id = doctor.doctor_id AND bookingconfirmation.appointment_id = appointment.appointment_id AND bookingconfirmation.patient_id = '$user_id'";

    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {

            $doc_id = $row["doctor_id"];
            $booking_id = $row["booking_id"];
            $appointment = $row["appointment_id"];
            $doc_name = $row["name"];
            $date = $row["a_date"];
            $slot = $row["slot"];
            $contact = $row["contact_no"];

            $doc_sql = "SELECT * FROM profile_pic_doctor WHERE doctor_id = '$doc_id' ";

            $doc_results = $conn->query($doc_sql);

            if ($doc_results->num_rows > 0) {

                while ($row = $doc_results->fetch_assoc()) {
                    $image_doc = $row["image_name"];
                }
            }
            if (!$image_doc) {
                $image_doc = "doctor.png";
            }

            echo "
<div class='row'>
<div class='col'>
<div class=\"card my-booking\" style=\"width: 20rem;\">
  <img class=\"card-img-top\" src=\"images/profile-pics/$image_doc\" alt=\"Card image cap\">
  <div class=\"card-body\">
    <h4 class=\"card-title\"> Dr. $doc_name</h4>
    <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\"><b>Date: </b> $date</li>
    <li class=\"list-group-item\"><b>Time: </b> $slot</li>
    <li class=\"list-group-item\"><b>Contact: </b> $contact</li>
  </ul>
    <a href=\"patientprofile.php?booking=$booking_id&cancel=1&appointment=$appointment\" class=\"btn booking btn-primary\"> Cancel Booking </a>
  </div>
</div>
</div>
</div>
  
        
       
        
        ";
        }
    }

    ?>

</div>
