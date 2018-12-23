<?php

if ($doctors->num_rows > 0) {
    while ($row = $doctors->fetch_assoc()) {

        $doc_id = $row["doctor_id"];
        $doc_name = $row["name"];
        $doc_address = $row["address"];
        $doc_email = $row["email"];
        $doc_contact = $row["contact_no"];
        $doc_gender = $row["gender"];
        $doc_specialist = $row["specialist"];
        $doc_dob = $row["dob"];

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
        <div class=\"card\" style=\"width: 20rem;\">
        <img class=\"card-img-top\" src=\"images/profile-pics/$image_doc\" alt=\"Card image cap\">
        <div class=\"card-body get-time\">
            <h4 class=\"card-title\"> $doc_name </h4>
            <p class=\"card-text\">Hello $name, I am Dr. $doc_name. I am specialist in $doc_specialist. See my details below: </p>
        </div>
        <ul class=\"list-group list-group-flush\">
        <li class=\"list-group-item\"> <b>Address: </b> $doc_address </li>
        <li class=\"list-group-item\"> <b> Email: </b> $doc_email</li>
        <li class=\"list-group-item\"> <b> Phone: </b> $doc_contact </li>
        <li class=\"list-group-item\"> <b> Gender: </b> $doc_gender </li>
        <li class=\"list-group-item\"> <b> Date of Birth: </b> $doc_dob </li>
        </ul>
        <div class=\"card-body\">
            <a href=\"mailto:$doc_email?subject=Need an appointment please\" class=\"card-link\">
            <button type=\"button\" class=\"btn btn-success\">Email Me</button>
            </a>
            <a href=\"searchdoctor.php?doc_id=$doc_id&appointment=1\" class=\"card-link\">
                <button type=\"button\" class=\"btn btn-info appointment\">Appointment</button>
            </a>
        </div>
    </div>
</div>
</div>
";
    }
} else {
    if (isset($_POST['doctor-search'])) {
                    echo "
            <div class=\"card w-75\">
            <div class=\"card-body\">
                <h4 class=\"card-title\"> Sorry! No doctor found! </h4>
                <p class=\"card-text\">No Doctor was found according to your criteria. Please try again searching with different criteria! </p>
                <a href=\"patientfeedback.php\" class=\"btn btn-primary\"> Make Feedback </a>
            </div>
            </div>
            
            ";
    }

}