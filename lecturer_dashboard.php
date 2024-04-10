<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Include database connection
include 'config/db_connection.php';
?>

<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Luyanzi Students</title> 
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="responsive.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="pop.css">
    <link rel="stylesheet" href="pop2.css">
    <link rel="stylesheet" href="css/views.css">
    
</head> 
 
<body> 
    
    <!-- for header part -->
    <header>
        
        <div class="log">
            <div class="logo">
                <img src="logo/logo.png" style="width: 100px;">
            </div>
            <div class="menu-icon">
                <i class="material-icons" id="menu-icon" alt="menu-icon">menu</i> 
            </div>

        </div>

         

        <div class="text"> 
            <div class="heading-txt">Luyanzi Institute</div> 
             
        </div> 

        <div class="message"> 
            <div class="nofication">
                <i class="material-icons" style="color: #04AA6D;">notifications</i>
            </div> 
             
            <div class="dp"> 
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn"
                    alt="dp"> 
            </div> 
        </div> 

    </header> 

    <div class="main-container"> 
        <div class="navcontainer"> 
            <nav class="nav"> 
                <div class="nav-upper-options"> 
                    <div class="nav-option option1"> 
                    
                        <h3>Lecturer</h3> 
                    </div> 

                    <div class="option2 nav-option">
                        <div class="log">
                            <i class="material-icons">groups</i>&nbsp;&nbsp;&nbsp;
                            <h3>Students</h3>
                        </div> 
                        <div class="dropdown-content">
                          <a href="#">Students Attendance</a>
                        </div>
                    </div>

                    <div class="option2 nav-option"> 
                        <div class="log">
                            <i class="material-icons">category</i>&nbsp;&nbsp;&nbsp;
                            <h3>Course Units</h3> 
                        </div>
                        <div class="dropdown-content">
                            
                            <a href="#" onclick="loadView('view_course_units.php')">View Course Units</a>
                        </div>
                    </div>
                

                    <div class="option2 nav-option"> 
                        <hr style="margin-left: -14px; color:rgba(255, 166, 0, 0.445);">
                        <h3>Attendence Reports</h3> 
                        
                        <div class="dropdown-content">
                          <a href="Qr/index.html">Qr-code</a>
                          <a href="#"onclick="loadView('attendencelist.php')">Roll-Call</a>
                        </div>
                    </div>

                  

                   

                    <div class="nav-option option6"> 
                        <i class="material-icons">settings</i>
                        <h3>Settings</h3> 
                    </div> 

                    <div class="nav-option logout"> 
                        <i class="material-icons">logout</i>
                        <h3>Logout</h3> 
                    </div> 

                </div> 
            </nav> 
        </div> 
        <div class="main"> 

            <div class="searchbar2"> 
                <input type="text"
                    name=""
                    id=""
                    placeholder="Search"> 
                <div class="searchbtn"> 
                 
                </div> 
            </div> 
            <!-- for header  boxes -->

            <div class="box-container"> 

                <div class="box box1"> 
                    <div class="text">
                        <h2 class="topic-heading">200</h2> 
                        <div class="log">
                            <i class="material-icons">groups</i>&nbsp;&nbsp;
                            <h2 class="topic">Total Students</h2>
                        </div> 
                    </div> 

                     
                </div>

                <div class="box box3"> 
                    <div class="text"> 
                        <h2 class="topic-heading">320</h2> 
                        <div class="log">
                            <i class="material-icons">terminal</i>&nbsp;&nbsp;
                            <h2 class="topic">Programs</h2>
                        </div> 
                    </div> 

                </div> 

                <div class="box box4"> 
                    <div class="text">
                        <h2 class="topic-heading">70</h2> 
                        <div class="log">
                            <i class="material-icons">dataset</i>&nbsp;&nbsp;
                            <h2 class="topic">Departments</h2> 
                        </div>
                    </div> 

        
                </div> 
            </div>
            <div id="student-attendance-report" class="report-container" >
                <div id="viewContainer" class="section">
                    <!-- Loaded views will appear here -->
                </div>
            
                
                </div>
            </div>
            

        </div> 
    </div>
    
    <div id="popupContainer"></div>


	<script src="script.js"></script>
    <script src="pops.js"></script>
    <script src="pop.js"></script>
    <script src="js/views.js"></script>
</body> 
</html>
