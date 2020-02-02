<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../database.php");
$dbh = DB();

$stmt = $dbh->prepare("SELECT * FROM calendar");
$stmt->execute();



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">
    <link rel="stylesheet" href="css/calendar.css">
   

    <!-- Font Awesome JS -->
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
   

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
                    <a href="#" id="event">Create Event</a>
                </li>

                <li> 
                    <a href="#" id="total_event">All Event</a>
                </li>

             

            </ul>
               

               

             
                

            
        </nav>

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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>

            <h2>Calendar Page</h2>

            <div class="container calend_form" style="display: none;">
                <p id="msg"></p>
                <header>Create Event</header>
                <form method="post"  id="calendar">

                    
                  <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="inputName">Event Name</label>
                 <input type="text" class="form-control" id="inputName" placeholder="Event Name" required="required" name="event_name">
               </div>

               <div class="form-group col-md-4">
                 <label for="inputTheme">Theme</label>
                 <input type="text" class="form-control" id="inputTheme" placeholder="Theme" required="required"
                 name="theme">
                
               </div>

               <div class="form-group col-md-4">
                 <label>Leader</label>
                 <input type="text" class="form-control" id="leader" placeholder="Leader" required="required"
                 name="leader">
               </div>
                  </div>
                  <!-- end of row1 -->

             
                  <div class="form-row">
                    
                <div class="form-group col-md-6">
                  <label>Schedule</label>
                  <select id="inputState" class="form-control" id="schedule" name="schedule">
                    <option selected>Choose...</option>
                    <option>Weekly</option>
                    <option>Monthly</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label>Date</label>
                 <input class="form-control" name="cal_date" type="date"  required="required">
                </div>
                
                  </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  placeholder="event description" name="describe"></textarea>
                </div>

              <button type="submit" class="btn  btn-primary">Create event</button>

                </form>
            </div>
            <!-- end of calendar event form -->





            <!-- see alll events -->
            <div class="container all_event" style="display: none;">
              <ul class="list-group">

                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

                <li class="list-group-item">
                <a href="event_details.php?id=<?php echo $row['id'];?>"><?php echo $row['event_name'];?></a>
                </li>
                
              </ul>

            <?php } ?>
               
              
            </div>
            <!-- see alll events -->

           
            
        </div>
    </div>

    <!-- jQuery CDN -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <!-- <script type="text/javascript" src="javascript/script.js"></script> -->
    
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>
    


    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

         $(document).ready(function(){
          $("#event").on('click',function(){
              $(".calend_form").show();
              
          });

        });

          $(document).ready(function(){
           $("#total_event").on('click',function(){
               $(".all_event").show();
               
           });

         });

         


          $(document).ready(function(){

              $("#calendar").submit(function(e){
                e.preventDefault();
                $.ajax({
                  type:"post",
                  url:"create_calendar.php",
                  data:$("#calendar").serialize()
                })

                .done(function(data){
                  $("#msg").html(data);
                  console.log("hello");
                })

                .fail(function(data){
                  $("#msg").html(data);
                  console.log("hi");
                });

               $("#calendar").find('input').val(" ");
                  
              });

          });

    </script>
</body>

</html>