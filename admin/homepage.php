<?php
session_start();

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
   <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- custom google font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">


    <!-- Font Awesome JS -->
   <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">
    <style type="text/css">

      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Raleway', sans-serif;


      }
        .admin_table {
          background-color: #ffffff;
          height: 500px;
          /*display: none;*/
        }

        .appointment {
          background-color: #ffffff;
          height: 350px;
          padding-top: 3%;
          display: none;
        }



        .appointment h5 {
          font-weight: bolder;
        }

        .event {
          background-color: #ffffff;
          height: 350px;
          padding-top: 3%;
          display: none;
          position: relative;
        }

        .event h5 {
          font-weight: bolder;
        }

        .event_promoters {
          background-color: #ffffff;
          height: 350px;
          padding-top: 3%;
          display: none;
        }



        .counselling {
          background-color: #ffffff;
          height: 350px;
          padding-top: 3%;
          display: none;
        }

        .show {
          display: block;
        }


        input[type=text]{
            width: 50%;
            font-size: 16px;
        }

        form label {
          font-weight: bold;
        }

        .btn-default {
            width: 50%;
            background-color:#e6e600;
            color: #ffffff;
            height: 50px;
            font-weight: bolder;
            font-size: 20px; 
        }

        .btn-primary {
          position: absolute;
           top: 8px;
           right: 16px;
           font-size: 18px;
        }

        .my_table {
          border-collapse: collapse;
          /*width: 100%;*/
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }







    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Section</h3>
            </div>

            <ul class="list-unstyled components">
               
                <li>
                    <a href="#"   id="add"  data-target="one" class="test">Add Data</a>
                </li>
               
                <li>
                    <a href="#"  id="all_booking" data-target="two" class="test">All Bookings</a>
                </li>

                <li>
                    <a href="#"  id="eventpromoters" data-target="three" class="test">Events & Promoters</a>
                </li>

                <li>
                    <a href="admin_logout.php">Logout</a>
                </li>

               
            </ul>

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

       


            <div class="container appointment show" id="one">

              <div id="message"></div>
                <h5>Add event name and promoter</h5>
               <form method="post" id="add_form">
                  
                  <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="event_name" class="form-control" placeholder="Event Name" required="required" data-toggle="tooltip" data-placement="top" title="Event Name">
                  </div>
                    
                  <div class="form-group">
                    <label>Promoter</label>
                    <input type="text" name="promoter" class="form-control" placeholder="Promoter" required="required" data-toggle="tooltip" data-placement="top" title="Promoter">
                  </div>

                 <button type="submit" class="btn-default">Add</button>
               </form> 
            </div>


             <div class="container event" id="two">
              <?php

              if (isset($msg)) {
                echo $msg;
              }

              if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
              }

              ?>
                <h5>All Bookings</h5>
                <form method="post" action="csv.php">
                <button type="submit" name="report" class="btn btn-primary">Generate Report</button>
                  
                </form>
                  
                 <table class="table">
                   <thead>
                     <tr>
                       <th scope="col">Event</th>
                       <th scope="col">Guest List</th>
                       <th scope="col">Date</th>
                       <th scope="col">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    
                   </tbody>
                 </table>

            </div>
            <!-- end of event two -->



             <div class="container event_promoters" id="three">
             
                <h5>Event & Promoters</h5>
                  
                 <table id="my_table" style="width: 100%;">
                   <thead>
                     <tr>
                       <th scope="col">Event</th>
                       <th scope="col">Promoter</th>
                       <th scope="col">Action</th>
                       <th scope="col">Edit</th>
                     </tr>
                   </thead>
                   <tbody>
                    
                   </tbody>
                 </table>

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

        // hiding and showing divs
           // creating an array-like based of child nodes on a specified class name
           var links = document.getElementsByClassName("test");

        //attach click handler to each
           for (var i = 0; i < links.length; i++) {
               links[i].onclick = toggleVisible;
           }

           function toggleVisible(){
                   //hide currently shown item
                  document.getElementsByClassName('show')[0].classList.remove('show');
                  // getting info from custom data-target  set on the element
                  var id = this.dataset.target;
                  // showing div
                  document.getElementById(id).classList.add('show');
           }


           // ajax form submission
           $(document).ready(function(){

               $("#add_form").submit(function(e){
                 e.preventDefault();
                 $.ajax({
                   type:"post",
                   url:"eventpromote.php",
                   data:$("#add_form").serialize()
                 })

                 .done(function(data){
                   $("#message").html(data);
                   // console.log("hello");
                 })

                 .fail(function(data){
                   $("#message").html(data);
                   // console.log("hi");
                 });

                $("#add_form").find('input').val(" ");
                   
               });

           });
           // end of event


           $(document).ready(function(){

                 $.ajax({
                   url:"bookingajax.php",
                   type:"get",
                   dataType:"JSON",
                   success:function(response){
                     // console.log(response);
                       var len = response.length;
                       for (var i = 0; i < len; i++) {


                           var event = response[i]["one"];

                           // "g" replaces all commas
                          var guest = response[i]["three"].replace(/,/g, '<br>');
                           var date = response[i]["four"];
                           var trash = response[i]['five'];



                           var table_str = "<tr>" +
                                        "<td>" + event + "</td>" +
                                        "<td>" + guest+ "</td>" + 
                                        "<td>" + date + "</td>" +
                                        "<td>" + trash + "</td>" +
                                        "</tr>";


                                $(".table tbody").append(table_str);

                          
                       }
                   },
                   error:function(response){
                       console.log("Error: "+ response);
                   }
                 });

           });


           // showing all event and promoters
           $(document).ready(function(){

                 $.ajax({
                   url:"eventpromoteajax.php",
                   type:"get",
                   dataType:"JSON",
                   success:function(response){
                     // console.log(response);
                       var len = response.length;
                       for (var i = 0; i < len; i++) {

                           var event = response[i]["one"];

                           var promoter = response[i]["two"];
                           var trash = response[i]['three'];
                           var edit = response[i]['four'];

                           var table_data = "<tr>" +
                                        "<td>" + event + "</td>" +
                                        "<td>" + promoter + "</td>" +
                                        "<td>" + trash + "</td>" +
                                        "<td>" + edit + "</td>" +
                                        "</tr>";

                                $("#my_table tbody").append(table_data);

                          
                       }
                   },
                   error:function(response){
                       console.log("Error: "+ response);
                   }
                 });

           });









    </script>
</body>

</html>