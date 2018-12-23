<div class="row">

    <div class="col">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="#">NEED DOCTOR</a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="doctorprofile.php"> Profile </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="searchpatient.php"> Search </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctortiming.php"> Timing </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="appointment.php"> Appointments </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="viewfeedbacks.php"> Feedback </a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Account
                    </a>
                    <div class="dropdown-menu">
                        <?php
                        if (!isset($_SESSION['email'])) {
                            echo "<a class=\"dropdown-item\"  href = 'loginfordoctor.php'>Login</a>";
                        } else {
                            echo "<a class=\"dropdown-item\"  href = 'logout.php'>Logout</a>";
                        }
                        ?>

                    </div>
                </li>
            </ul>
        </nav>
    </div>

</div>
