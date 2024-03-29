<?php
session_start();

// Adjust the allowed roles as per the page requirement
$allowed_roles = ['superadmin']; // Example for index.php

if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], $allowed_roles)) {
    die("Access Denied");
}
 ?>
<?php
session_start();

// Set the time limit to 2 minutes (120 seconds)
$timeout_duration = 300;

// Check if the user is "logged in" and if the last activity is set
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Check if the last activity timestamp is older than the timeout duration
    if (isset($_SESSION['last_activity']) && 
        (time() - $_SESSION['last_activity']) > $timeout_duration) {
        // If the timeout duration has passed, clear the session and redirect to logout
        session_unset();
        session_destroy();
        header('Location: logout.php');
        exit();
    }

    // If the user is still within the timeout duration, update last activity time
    $_SESSION['last_activity'] = time();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- <link rel="stylesheet" href="//use.fontawesomgte.com/releases/v5.0.7/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> If you have any JavaScript -->
    <style>
        .container {
            position: relative;
        }
        .message {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
        
    </style>
</head>
<body>
    
    <!-- Left side dashboard -->
    <section id="menu">
        <div class="logo">
            <img src="images/logo.jfif" alt="Shreya">
            <h3>Dashboard</h3>
        </div>
        <div class="items">
            <li><i class="fa-solid fa-chart-simple"></i><a href="index.php">Dashboard</a></li>

            <li class="dropdown">
                <i class="fa-solid fa-users"></i><a href="#">Employee</a>
                <div class="dropdown-content">
                    
                    
                    <a href="edit.php">Manage Employee<i class="fa-solid fa-people-roof"></i></a>
                    
                </div>
            </li>

            <!-- <li><i class="fa-solid fa-people-roof"></i><a href="#">Manage Employee</a></li> -->

        </div>
    </section>
            <!-- Left side dashboard ends -->
            <!-- Navigation bar -->
    <section id="interface">
        <!-- Add a new bar on top for fnmid and logout -->
        <div class="top-bar">
            <span class="fnmid">User ID: <?php echo htmlspecialchars($_SESSION['fnmid']); ?></span>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
        <!-- <div class="navigation">
            <div class="n1">
                <div class="search">
                    
                    <input type="text" placeholder="SEARCH" name="search" style="background-color: whitesmoke;">
                    
                    <button class="searchButton" style="background-color: whitesmoke; color: #c55b7f; border: none; border-radius: 1px; padding: 5px 5px; cursor: pointer; margin-left: 1px; margin-right: 10px;  ">
                    <i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i></button>
                    
                </div>
                
            </div>
            <div class="profile">
                <i class="fa-solid fa-bell"></i>
                <img src="images/logo.jfif" alt="">

            </div>
        </div>
            Navigation bar ends here
             for the boxes under dashboard(right side) -->
             <!-- <br><br><br><br> -->
        
            
  

<form id="interviewForm" action="mainconn.php" method="POST">
    <div class="form-container">
        <!-- <h1>FINMECH BUSINESS SERVICES</h1> -->
        <h2>Interview Details Of Candidates</h2>
        
        <!-- Personal Details -->
        <div class="form-section">
            <h3>Personal Details</h3>
            <div class="education-row">
                <!-- Add personal details fields here -->
                <!-- Example for Position Applied For -->
                <div class="form-group">
                <input type="text" id="position" class="form-control" placeholder="Position Applied For:" name="position">
                </div>
                <div class="form-group">
                    <input type="text" id="name" class="form-control" placeholder="Candidate Name:" name="cname">
                </div> 
                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="email" id="email" class="form-control" placeholder="Email ID:" name="email">
                </div>
                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="bigint" id="mobile" class="form-control" placeholder="Mobile Number:" name="mobile">
                </div>
                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="bigint" id="alternatenum" class="form-control" placeholder="Alternate Number:" name="alternatenumber">
                </div>
                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="text" id="address" class="form-control" placeholder="Current Address:" name="currentaddress">
                </div>
                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="bigint" id="dob" class="form-control" placeholder="Date Of Birth:" name="dob">
                </div>

                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="text" id="meet" class="form-control" placeholder="Person to Meet:" name="meetperson">
                </div>
                <div class="form-group">
                    <!-- <label for="position">Position Applied For:</label> -->
                    <input type="file"  class="form-control" id="custom-file-label" placeholder="Upload Resume:" name="resume">
                </div>
                <!--  -->
            </div>
            <!-- Repeat for other personal details fields -->
        </div>
        
        <!-- Education Section -->
    <div class="responsive-table">
        <div class="form-section education-section">
            <h3>Education</h3>
            <table class="education-table">
                <thead>
                    <tr>
                       <!-- <th>SR.NO</th> -->
                        <th>Degree/Diploma</th>
                        <th>Year of Passing</th>
                        <th>University/College</th>
                        <th>Branch</th>
                        <th>Percentage/CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <td><input type="text" id="sr1" class="form-control" placeholder="1"></td> -->
                        <td><input type="text" id="degree1" class="form-control" placeholder="SSC" name="degree1"></td>

                        <td><input type="text" id="year1" class="form-control" placeholder="Year of Passing" name="Passingyear1"></td>

                        <td><input type="text" id="university1" class="form-control" placeholder="University/College" name="uni1"></td>

                        <td><input type="text" id="branch1" class="form-control" placeholder="Branch" name="branch1"></td>

                        <td><input type="text" id="percentage1" class="form-control" placeholder="Percentage/CGPA" name="percentage1"></td>
                    </tr>
                    <tr>
                        <!-- <td><input type="text" id="sr2" class="form-control" placeholder="2"></td> -->
                        <td><input type="text" id="degree2" class="form-control" placeholder="HSC" name="degree2"></td>
                        <td><input type="text" id="year2" class="form-control" placeholder="Year of Passing" name="Passingyear2"></td>
                        <td><input type="text" id="university2" class="form-control" placeholder="University/College" name="uni2"></td>
                        <td><input type="text" id="branch2" class="form-control" placeholder="Branch" name="branch2"></td>
                        <td><input type="text" id="percentage2" class="form-control" placeholder="Percentage/CGPA" name="percentage2"></td>
                    </tr>
                    <tr>
                        <!-- <td><input type="text" id="sr3" class="form-control" placeholder="3"></td> -->
                        <td><input type="text" id="degree3" class="form-control" placeholder="Graduation" name="degree3"></td>
                        <td><input type="text" id="year3" class="form-control" placeholder="Year of Passing" name="Passingyear3"></td>
                        <td><input type="text" id="university3" class="form-control" placeholder="University/College" name="uni3"></td>
                        <td><input type="text" id="branch3" class="form-control" placeholder="Branch" name="branch3"></td>
                        <td><input type="text" id="percentage3" class="form-control" placeholder="Percentage/CGPA" name="percentage3"></td>
                    </tr>
                    <tr>
                        <!-- <td>
                            <input type="text" id="sr4" class="form-control" placeholder="4"></td> -->
                        <td><input type="text" id="degree4" class="form-control" placeholder="Post Graduation" name="degree4"></td>
                        <td><input type="text" id="year4" class="form-control" placeholder="Year of Passing" name="Passingyear4"></td>
                        <td><input type="text" id="university4" class="form-control" placeholder="University/College" name="uni4"></td>
                        <td><input type="text" id="branch4" class="form-control" placeholder="Branch" name="branch4"></td>
                        <td><input type="text" id="percentage4" class="form-control" placeholder="Percentage/CGPA" name="percentage4"></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Duplicate the grid for additional education entries if needed -->
        </div>
        
        <!-- Experience Section -->
        <div class="form-section education-section">
            <h3>Experience (if any)</h3>
           <table class="education-table">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Tenurity & Position</th>
                    <th>Last Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" id="company1" class="form-control" placeholder="Company" name="company1"></td>
                    <td><input type="text" id="designation1" class="form-control" placeholder="Designation" name="designation1" ></td>
                    <td><input type="text"  id="salary1" class="form-control" placeholder="Offered Salary" name="salary1"></td>
                </tr>
                <tr>
                    <td><input type="text" id="company2" class="form-control" placeholder="Company" name="company2"></td>
                    <td><input type="text" id="designation2" class="form-control" placeholder="Designation" name="designation2" ></td>
                    <td><input type="text"  id="salary2" class="form-control" placeholder="Offered Salary" name="salary2"></td>
                </tr>
            </tbody>
           </table>
        </div>
        
        <!-- Reference Section -->
        <div class="form-section education-section">
            <h3>Reference</h3>
            <table class="education-table">
                <thead>
                    <tr>
                        <th>Candidate Name</th>
                        <th>Number</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" id="Candidate1" class="form-control" placeholder="Name" name="Candidate1"></td>
                        <td><input type="text" id="phno1" class="form-control" placeholder="Ph.No" name="ph1"></td>
                        <td><input type="text"  id="location1" class="form-control" placeholder="Current Loc." name="loc1"></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="Candidate2" class="form-control" placeholder="Name" name="Candidate2"></td>
                        <td><input type="text" id="phno2" class="form-control" placeholder="Ph.No" name="ph2"></td>
                        <td><input type="text"  id="location2" class="form-control" placeholder="Current Loc." name="loc2"></td>
                    </tr>
                </tbody>
               </table>
        </div>
    </div>
    <!-- Table Form ends here -->
    <!-- HR Roun-->
    <br><br>
<div class=""><h3><input type="text" id="interviewer" class="unique-name" placeholder="Interviewer's Name" name="interviewername1"> </h3>
    <div class="final-status"><h3>HR Round:</h3></div>

    <div class="hr-section">
        
        
        <div class="hr-round1">
            
          <div class="radio-buttons">
           
            <label for="selected"><input type="radio" name="hr_round" value="selected">Selected</label>
            
            <label for="on_hold"><input type="radio" name="hr_round" value="on_hold">On Hold</label>
            
            <label for="rejected"><input type="radio" name="hr_round" value="rejected">Rejected</label>
          </div>
         
        </div>
    <!-- radio button ends here -->
    <!-- remark box starts here -->
        <div class="hr-remark1">
            <!-- <label for="remark">Remark</label> -->
            <input type="text" id="remark" name="remark" class="form-control" placeholder="Remark" >
        </div>
    </div>
</div>
    <!-- remark box ends here -->
    <!-- ops round -->
    <div class=""><h3><input type="text" id="interviewer" class="unique-name" placeholder="Interviewer's Name" name="interviewername2"> </h3>
        <div class="final-status"><h3>OPS Round:</h3></div>
        <div class="hr-section">
            
            
            <div class="hr-round1">
                
              <div class="radio-buttons">
               
                <label for="selected"><input type="radio" name="ops_round" value="selected">Selected</label>
                
                <label for="on_hold"><input type="radio"  name="ops_round" value="on_hold">On Hold</label>
                
                <label for="rejected"><input type="radio" name="ops_round" value="rejected">Rejected</label>
              </div>
             
            </div>
            <div class="hr-remark1">
                <!-- <label for="remark">Remark</label> -->
                <input type="text" id="remark1" name="remark1" class="form-control" placeholder="Remark" >
            </div>
        </div>
    </div>
    <div class="final-status">
        <h3>Final Status:</h3>
        <!-- <input type="text" name="" id=""> -->
    </div>
    <div>
        <div class=""><h3><input type="text" id="interviewer" class="unique-name" placeholder="Comment:" name="comment"> </h3>
        <div class="hr-section">
            
            
            <div class="hr-round1">
                
              <div class="radio-buttons">
               
                <label for="selected"><input type="radio" name="final_status" value="selected2">Selected</label>
                
                <label for="on_hold"><input type="radio"  name="final_status" value="on_hold2">On Hold</label>
                
                <label for="rejected"><input type="radio" name="final_status" value="rejected2">Rejected</label>
              </div>
             
            </div>
    </div>
    <div>
        <h3>Offered Salary:</h3>
    </div>
    <div>
        <input type="text" name="net" id="net" placeholder="Net">
        <input type="text" name="gross" id="gross" placeholder="Gross">
        <input type="text" name="ctc" id="ctc" placeholder="CTC">
    </div>
    <div>
        <h3>Status:</h3>
        <div class="hr-section">
            
            
            <div class="hr-round1">
                
              <div class="radio-buttons">
               
                <label for="pf"><input type="radio"  name="status" value="pf">PF</label>
                
                <label for="nps"><input type="radio"  name="status" value="nps">NPS</label>
                
                
              </div>
             
            </div>
    </div>
    </div>

    <br><br>
    <button type="submit" class="btn btn-primary" style="background-color: green;" name="submit">Submit</button>

     <!-- <a href="index.html" class="btn">Save & Next</a> -->
    </div>

</form>



    </section>
    <script>
// Set the timeout duration in milliseconds
var TIMEOUT_DURATION = 300000; // 120 seconds or 2 minutes

var timeout;

// Function to reset the timeout timer
function resetTimer() {
    // Clear the existing timer
    clearTimeout(timeout);

    // Set a new timer
    timeout = setTimeout(function() {
        // If the timer runs out, redirect to the logout page
        window.location.href = 'logout.php';
    }, TIMEOUT_DURATION);
}

// Add event listeners to reset the timer on user activities
window.onload = resetTimer;
window.onmousemove = resetTimer;
window.onmousedown = resetTimer; // Catch touchscreen presses
window.onclick = resetTimer;     // Catch touchpad clicks
window.onscroll = resetTimer;    // Catch scrolling with arrow keys
window.onkeypress = resetTimer;

</script>

</body>
</html>

