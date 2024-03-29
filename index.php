<?php
// Include the database connection file
include 'connect.php';

// Query to fetch the total number of IDs from hrfields table
$queryHrfields = "SELECT COUNT(id) AS total_hrfields_ids FROM hrfields";
$resultHrfields = mysqli_query($con, $queryHrfields);

// Query to fetch the total number of IDs from registration table
$queryRegistration = "SELECT COUNT(id) AS total_registration_ids FROM registration";
$resultRegistration = mysqli_query($con, $queryRegistration);

$totalHrfieldsIds = 0;
$totalRegistrationIds = 0;

if ($resultHrfields) {
    // Fetch the result as an associative array for hrfields table
    $rowHrfields = mysqli_fetch_assoc($resultHrfields);
    $totalHrfieldsIds = $rowHrfields['total_hrfields_ids'];
} else {
    // Handle query error for hrfields table
    $totalHrfieldsIds = 'error';
}

if ($resultRegistration) {
    // Fetch the result as an associative array for registration table
    $rowRegistration = mysqli_fetch_assoc($resultRegistration);
    $totalRegistrationIds = $rowRegistration['total_registration_ids'];
} else {
    // Handle query error for registration table
    $totalRegistrationIds = 'error';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            
            /* Specify the path to your image */
            background-image: url('images/bluehex11.jpg');
            /* Ensure the background image covers the entire body */
            background-size: cover;
            backdrop-filter: blur(2px);
        }
    </style>

    
</head>
<body>
    <!-- Left side dashboard -->
    <section id="menu">
        <div class="logo">
            <img src="images\fnm.png" alt="Shreya">
            <h2>Dashboard</h2>
        </div>
        <div class="items">
            <li><i class="fa-solid fa-house"></i><a href="#">Dashboard</a></li>

            <li class="dropdown">
                <i class="fa-solid fa-users"></i><a href="#">Employee</a>
                <div class="dropdown-content">
                    
                    <a href="form.php
                    ">Add Emp<i class="fa-solid fa-person-circle-plus"></i></a>
                    <hr>
                    <a href="edit.php">Manage Emp<i class="fa-solid fa-people-roof"></i></a>
                    
                </div>
            </li>
            <li class="dropdown">
            <i class="fa-solid fa-user"></i><a href="#">Users</a>
                <div class="dropdown-content">
                    
                    <a href="sign.php">Add User<i class="fa-solid fa-user-plus"></i></a>
                    <hr>
                    <a href="manage_users.php">Manage User<i class="fa-solid fa-people-roof"></i></a> <hr>
                    <a href="login.php">Login<i class="fa-solid fa-right-to-bracket"></i></a>
                    
                </div>
            </li>
            <!-- <li><i class="fa-solid fa-people-roof"></i><a href="#">Manage Employee</a></li> -->

        </div>
    </section>
            <!-- Left side dashboard ends -->
            <!-- Navigation bar -->
    <section id="interface">
       
        <h3 class="i-name">
            Dashboard
        </h3>
        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3><?php echo $totalHrfieldsIds; ?></h3>
                    <span>No.Of Total Employe </span>
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-computer"></i>
                <div>
                    <h3><?php echo $totalRegistrationIds; ?></h3>
                    <span>Signed In Users</span>
                </div>
            </div>

            <!-- <div class="val-box">
                <i class="fa-solid fa-circle-user"></i>
                <div>
                    <h3>56</h3>
                    <span>HR Team</span>
                </div>
            </div> -->

            <!-- <div class="val-box">
                <i class="fa-solid fa-people-group"></i>
                <div>
                    <h3>100</h3>
                    <span>Trainers</span>
                </div>
            </div> -->
        </div>
<!-- boxes end here -->
<script src="script.js">
    
</script> <!-- If you have any JavaScript -->


    </section>
</body>
</html>