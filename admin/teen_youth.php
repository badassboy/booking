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

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .youth {
            background-color:rgb(255, 255, 255);
            height: 400px; 
            padding-top: 3%;
        }

        .btn-primary {

            width: 25%;
            margin-left: 30%;
            margin-top: 2%;
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
                    <a href="#">Add New Convert</a>
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

            <!-- <h2>Membership Page</h2> -->
            <div class="container youth">
                <h5>Youth Registration Form</h5>
                <div id="response"></div>
               <form method="post" id="youth">

                   <div class="form-row">
                       <div class="form-group col-md-3">
                         <label>Name of Person</label>
                         <input type="text" name="person" class="form-control" placeholder="Name of Person">
                       </div>

                       <div class="form-group col-md-3">
                         <label>Gender</label>
                         <select class="form-control" id="exampleFormControlSelect1" name="gender">
                               <option>Select</option>
                               <option>Male</option>
                               <option>Female</option>
                             </select>
                       </div>
                         

                       <div class="form-group col-md-3">
                         <label>Age</label>
                         <input type="number" name="age" class="form-control" placeholder="Name of Person">

                       </div>

                        <div class="form-group col-md-3">
                          <label>Working Status</label>
                          <select class="form-control" name="working_status">
                                <option>Select</option>
                                <option>Employed</option>
                                <option>Self-Employed</option>
                                <option>Unemployed</option>
                              </select>
                        </div>
                     </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Eductional Level</label>
                      <select class="form-control" name="education" onchange="boardingStatus(this);">
                            <option>Select</option>
                            <option>Junior High School</option>
                            <option id="senior">Senior High School</option>

                            <option>Tertiary</option>
                          </select>
                            
                    </div>


                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="name@example.com">
            
                    </div>
                      

                    <div class="form-group col-md-4">
                      <label>Address</label>
                        <input type="address" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                    </div>

                </div>


                <div class="form-group col-md-4" style="display: none;" id="boarding_status">
                  
                <select class="form-control">
                      <option>Select</option>
                      <option>Boarding</option>
                      <option>Day</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>                


                           


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

        function boardingStatus(options){
          if (options) {
            let selected = document.getElementById("senior").value;
            if (selected == options.value) {
              document.getElementById("boarding_status").style.display = "";
            }else {

              document.getElementById("boarding_status").style.display = "none";
            }

          }
        }

        // ajax form submission
        $("#youth").submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"teen_register.php",
            // Encode a set of form elements as a string for submission.
            data:$("#youth").serialize(),
          })

          .done(function(data){
            $("#response").html(data);
          })
          .fail(function(data){
            $("#response").html(data);

          });

          $("#youth").find('input','select').val(" ");

        });

    </script>
</body>

</html>