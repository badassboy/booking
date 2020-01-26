<?php

session_start();
// var_dump($_SESSION);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style type="text/css">
        .parent {

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 5%;
            /*display: none;*/
        }

        .btn-primary {

            margin-left: 25%;
            width: 40%;
            font-weight: bold;

        }
        
        #children {

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
                <!-- <p>Dummy Heading</p> -->

             
                <li>
                    <a href="#">Add Child</a>
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

            <h2>Children Page</h2>
            <div class="container parent">
                <!-- <div id="response"></div> -->
                <p>
                  

                <?php

                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }


                ?>
               
                </p>

                <header>Please fill form below to child information</header>
               <form method="post" id="children" action="child_process.php">

                 <div class="form-row">

                   <div class="form-group col-md-3">
                     <label>Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Name">
                   </div>

                   <div class="form-group col-md-3">
                     <label>Age</label>
                     <input type="number" class="form-control" name="age" placeholder="Age">
                   </div>

                   <div class="form-group col-md-3">
                     <label>Gender</label>
                     <select class="form-control" name="gender">
                         <option>Select</option>
                         <option>Male</option>
                         <option>Female</option>
                        
                       </select>
                   </div>

                   <div class="form-group col-md-3">
                     <label>Date of Birth</label>
                     <input class="form-control" type="date" name="birth">
                   </div>

                 </div>
                 <!-- end of row1 -->

                 <!-- row2 -->
                 <div class="form-row">

                   <div class="form-group col-md-3">
                     <label>Guardian Name</label>
                     <input type="text" class="form-control" name="guardian" placeholder="Name">
                   </div>

                   <div class="form-group col-md-3">
                     <label>Guardian Contact</label>
                     <input type="text" class="form-control" name="mobile" placeholder="Telephone">
                   </div>
                   
                   <div class="form-group col-md-3">
                     <label>Guardian Address(GPS)</label>
                     <input type="text" class="form-control" name="address" placeholder="GPS Address">
                   </div>
<!-- 
                   <div class="form-group col-md-3">
                     <label>Guardian in the church?</label>
                     <select class="form-control" name="gender">
                         <option>Select</option>
                         <option>Yes</option>
                         <option>No</option>
                        
                       </select>
                   </div> -->

                 </div>
                
                 <button type="submit" class="btn btn-primary">Add Child</button>

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

        // ajax form submission
        $("#children").on("submit",function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"child_process.php",
            data:$("#children").serialize(),
          })

          .done(function(data){
            // $("#response").html(data);
            console.log("success");
          })
          .fail(function(data){
            // $("#response").html(data);
            console.log("failed");

          });

        });


    </script>
</body>

</html>