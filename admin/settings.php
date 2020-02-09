<?php

session_start();
require("../database.php");
// $dbh = DBCreate();

// Displaying admin info into the table
$dbh = DB();

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

        #addUser{
                background-color:rgb(255, 255, 255);
                height: 350px;
                padding-top: 3%;
                display: none;
            }

     

        #admin_table{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .btn-primary {
          margin-left: 1%;
          margin-right: 3%;
          width: 20%;
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

            <!-- storing div name in hidden input -->
            <input type="hidden" name="" id="tempDivName">

            <ul class="list-unstyled components">

                <li>
                    <a href="#" id="addButton"  onclick="MyFunction('addUser')">Add Admin</a>
                </li>

               
                <li>
                    <a href="#" id="all_admin"  onclick="MyFunction('admin_table')">All Admin</a>
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

            <h2>Admin Settings</h2>

            <div class="container" id="addUser">
              <div id="response"></div>
                    <h5>Add Admin</h5>
               <form method="post"  action="add_user.php" id="add_user">

                <div class="form-row">
                    
                  <div class="form-group col-md-4">
                   <label for="usernameInput">Username</label>
                   <input type="text" name="username" class="form-control" id="usernameInput" required="required"
                   placeholder="username">
                    </div>

                <div class="form-group col-md-4">
                 <label for="usernameInput">FullName</label>
                 <input type="text" name="fullname" class="form-control" id="usernameInput" required="required"
                 placeholder="username">
                  </div>


                  <div class="form-group col-md-4">
                   <label for="usernameInput">Email</label>
                   <input type="email" name="email" class="form-control" id="usernameInput" required="required"
                   placeholder="username">
                    </div>

                </div>
                <!-- end of row 1 -->

                <!--  row 2 -->
                <div class="form-row">
                    
                  <div class="form-group col-md-6">
                  <label>Admin Type</label>
                  <select class="form-control" name="admin_type" required="required">
                    <option>Super Admin</option>
                    <option>Branch Admin</option>
                    <option>Group Admin</option>
                  </select>
                    </div>

                <div class="form-group col-md-6">
                 <label>Date</label>
                 <input class="form-control" name="date_a" type="date" id="example-date-input" required="required">
                  </div>

                </div>
                <!-- end of row 2 -->

                 <button type="submit" class="btn btn-primary">Add User</button>

               </form> 
            </div>
                      
                





                  

          <div class="container" id="admin_table">
              <h5>Administrators</h5>
              
                  <table class="table">

                    <thead>
                      <tr>
                        <th scope="col">Action</th>
                        <th scope="col">Username</th>
                        <th scope="col">FullName</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>

                    <tbody></tbody>
                    
                  </table>
                    
            </div>
            <!-- end of table -->

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

        // this function is used to display div based 
        // link clicked
      function MyFunction(divName){

        //hidden val
        var hiddenVal = document.getElementById("tempDivName"); 

        //hide old
        if(hiddenVal.Value != undefined){
            var oldDiv = document.getElementById(hiddenVal.Value); 
            oldDiv.style.display = 'none'; 
        }

        //show div
            var tempDiv = document.getElementById(divName); 
            tempDiv.style.display = 'block';              

        //save div ID
            hiddenVal.Value = document.getElementById(divName).getAttribute("id");

        }

      
        // ajax form submission
        $(document).ready(function(){

          $("#add_user").submit(function(e){
            e.preventDefault();
            $.ajax({
              type:"post",
              url:"add_user.php",
              data:$("#add_user").serialize(),
            })

            .done(function(data){
              $("#response").html(data);
              console.log("hello");

            })
            .fail(function(data){
              $("#response").html(data);

            });
                // clear the form input after submission
              $("#add_user").find('input').val(" ");
          });
          // end of form submission
        });


        // ajax code for displaying admins
        $(document).ready(function(){

              $.ajax({
                url:"adminajax.php",
                type:"get",
                dataType:"JSON",
                success:function(response){
                  console.log(response);
                    var len = response.length;
                    for (var i = 0; i < len; i++) {


                        var action = '<a><i class="fa fa-trash" aria-hidden="true"></i></a>';
                        var username = response[i]["username"];

                        var fullname = response[i]["fullname"];
                        var email = response[i]["email"];
                        var my_date = response[i]["admin_date"];

                        var table_str = "<tr>" +
                                     "<td>" + action + "</td>" +
                                     "<td>" + username + "</td>" +
                                     "<td>" + fullname + "</td>" +
                                     "<td>" + email + "</td>" +
                                     "<td>" + my_date + "</td>" +
                                     "</tr>";


                             $(".table tbody").append(table_str);

                       
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









        


