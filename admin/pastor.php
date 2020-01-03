<?php

// ajax form submission foreach form
// appointment form processing


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>


                <li>
                    <a href="#" id="appointment">Preaching Appointment</a>
                </li>

                <li>
                    <a href="#" id="event">Event to attend</a>
                </li>

               <!--  <li>
                    <a href="#" id="visit">People to visit</a>
                </li> -->

                <li>
                    <a href="#" id="counsel">Counselling Appointment</a>
                </li>
               


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    
                </div>
            </nav>

            <h2>Pastor Page</h2>

            <div class="container appointment">
                    <h5>Preaching Appointment</h5>
               <form method="post">
                 <div class="form-group">
                   <label>Host Church Name</label>
                   <input type="text" class="form-control" placeholder="Branch Name">
                 </div>

                 <div class="form-group">
                   <label>Location</label>
                   <input type="text" class="form-control" placeholder="Location">
                 </div>


                 <div class="form-group">
                   <label>Date</label>
                  <input class="form-control" name="birth" type="date" id="example-date-input" required="required">
                 </div>

                 <div class="form-group">
                     <label for="exampleFormControlSelect1">Schedule</label>
                     <select class="form-control" id="exampleFormControlSelect1">
                       <option>Select</option>
                       <option>Morning</option>
                       <option>Afternoon</option>
                       <option>Evening</option>
                     </select>
                   </div>

                 <button type="submit" class="btn btn-primary">Create Appointment
                 </button>
               </form> 
            </div>


                

                


            <div class="container event">
                <h5>Event to attend</h5>
               <form method="post">
                 <div class="form-group">
                   <label>Event Name</label>
                   <input type="text" class="form-control" placeholder="Event Name" required="required">
                 </div>

                 <div class="form-group">
                   <label>Date</label>
                  <input class="form-control" name="birth" type="date" id="example-date-input" required="required">
                 </div>


               

                 <div class="form-group">
                   <label>Event Location</label>
                   <input type="text" class="form-control" placeholder="Event Location" required="required">
                 </div>

                 <div class="form-group">
                     <label for="exampleFormControlSelect1">Schedule</label>
                     <select class="form-control" id="exampleFormControlSelect1">
                       <option>Select</option>
                       <option>Morning</option>
                       <option>Afternoon</option>
                       <option>Evening</option>
                     </select>
                   </div>

                 <button type="submit" class="btn btn-primary">Create Event</button>
               </form> 
            </div>


            <div class="container counselling">
                    <h5>Counselling Appointment</h5>
               <form method="post">
                 <div class="form-group">
                   <label>Date</label>
                  <input class="form-control" name="birth" type="date" id="example-date-input" required="required">

                 </div>

                 <div class="form-group">
                   <label>Time</label>
                   <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                 </div>

                 <button type="submit" class="btn btn-primary">Counsel</button>
               </form> 
            </div>

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

                


           

          

    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        $(document).ready(function(){
          $("#appointment").click(function(){
              $(".appointment").show();
          });
        });

        $(document).ready(function(){
          $("#event").click(function(){
              $(".event").show();
          });
        });

        $(document).ready(function(){
          $("#counsel").click(function(){
              $(".counselling").show();
          });
        });


    </script>
</body>

</html>