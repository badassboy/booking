<?php

session_start();
require("../database.php");
$dbh = DBCreate();

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

        #changePassword{
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

<?php
  
  if (isset($_SESSION['msg'])) {
     ?>
     <body onload="alert('<?php echo $_SESSION['msg']; ?>');">
     <?php
   }
   else
   {
     ?>
     <body onload="alert('no message');">
      <?php


       
   }

   ?>


  


<body>
      <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="#" id="addButton">Add Admin</a>
                </li>

                <li>
                    <a href="#" id="password_change">Change Password</a>
                </li>

                <li>
                    <a href="#" id="all_admin">All Admin</a>
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

                 <div class="form-group">
                   <label for="usernameInput">Username</label>
                   <input type="text" name="username" class="form-control" id="usernameInput" required="required"
                   placeholder="username">
                 </div>
                   
                 <div class="form-group">
                   <label for="exampleInputPassword1">Password</label>
                   <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="required" placeholder="password">
                 </div>

                 <div class="form-group row">

                 <button type="submit" name="add" class="btn btn-primary">Add User</button>

                 <button type="submit" class="btn btn-primary" id="delete">Discard</button>
                  
                 </div>

               </form> 
            </div>


                

                
              <!-- start here -->
              <!--where is the login script?-->
            <div class="container" id="changePassword">
             

              <div id="response"></div>
                <h5>Change Password</h5>
               <form method="post" action="change_password.php" id="change_password">

                <div class="form-group">
                  <label>Old Password</label>
                  <input type="password" name="pwd3" class="form-control" required="required" id="myoldpass"
                  placeholder="New Password">
                </div>

                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" name="pwd1" class="form-control" required="required" id="mypass"
                  placeholder="New Password">
                </div>

                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="pwd2" class="form-control" required="required" id="yourpass" 
                  placeholder="Confirm Password">
                </div>
                  

                <div class="form-group row">
                    
                <button type="submit" class="btn btn-primary" id="change">Change Password</button>
                <button type="submit" class="btn btn-primary" id="discard">Discard</button>

                </div>
                     
               </form>

            </div>

            <!-- end here -->


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

                    <tbody>


                      <tr>
                        <th scope="row">
                          <a><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </th>
                        <td>hello</td>
                        <td>hello</td>
                        <td>hello</td>
                        <td>hello</td>
                        
                      </tr>
                    </tbody>
                    
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

        $(document).ready(function(){
          $("#addButton").click(function(){
              $("#addUser").show();
          });
        });

        $(document).ready(function(){
          $("#password_change").click(function(){
              $("#changePassword").show();
          });
        });

        $(document).ready(function(){
          $("#all_admin").click(function(){
              $("#admin_table").show();
          });
        });
        // end of show/hide div upon  clicking

        // removing forms
        $(document).ready(function(){
          $("#delete").click(function(){
            $(".addUser").remove();
          });
        });

        $(document).ready(function(){
          $("#discard").click(function(){
            $(".changePassword").remove();
          });
        });

        $(document).ready(function(){
          $("#clear").click(function(){
            $("#admin_table").remove();
          });
        });



        // var form1 = document.getElementById("add_user");
        // var url = form1.getAttribute("action");
        // ajaxCall(form1,url);

        // var form2 = document.getElementById("change_password");
        // var url = form2.getAttribute("action");
        // ajaxCall(form2,url);

       
        // function ajaxCall(form,url){
        //   var form = form;
        //   form.submit(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //       type:"post",
        //       url:"url",
        //       data:form.serialize(),

        //     })
        //     .done(function(data){
        //       $("#response").html(data);
        //     })
        //     .fail(function(data){
        //       $("#response").html(data);
        //     });
        //   });

        // }






        


    </script>
</body>

</html>