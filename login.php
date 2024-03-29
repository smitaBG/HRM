<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database connection
    include 'connect.php';

    // Retrieve form data
    $fnmid = $_POST['fnmid'];
    $password = $_POST['password'];

    // Query to check if the FNMID and password match
    $fnmid_query = "SELECT * FROM registration WHERE fnmid = '$fnmid'";
    $fnmid_result = $con->query($fnmid_query);

    if ($fnmid_result->num_rows === 0) {
        // FNMID doesn't exist, show error message
        $fnmid_error = "FNMID doesn't exist";
    } else {
        // FNMID exists, check password
        $password_query = "SELECT * FROM registration WHERE fnmid = '$fnmid' AND password = '$password'";
        $password_result = $con->query($password_query);

        if ($password_result->num_rows === 0) {
            // Password is incorrect, show error message
            $password_error = "Incorrect password";
        } else {
            // FNMID and password match, redirect to dashboard
            $_SESSION['fnmid'] = $fnmid; // Store FNMID in session for dashboard access
            header('Location: form.html');
            exit();
        }
    }


    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="credentials.css">
    <style>
        .error-message {
    color: red;
    font-size: 14px;
}
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="fnmid">FNMID:</label>
            <input type="text"  id="fnmid" name="fnmid" required>
            <?php if(isset($fnmid_error)) { ?>
                <p class="error-message"><?php echo $fnmid_error; ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password"  id="password" name="password" required>
            <?php if(isset($password_error)) { ?>
                <p class="error-message"><?php echo $password_error; ?></p>
            <?php } ?>
        </div>
        <div>
            <button type="submit" class="btn">Login</button>
        </div>
    </form>
</div>
</body>
</html>
