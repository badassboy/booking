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

        .convert {
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
            <div class="container convert">
              <div id="message"></div>
              
                <h5>New Convert Form</h5>
               <form method="post" id="convert" action="converts.php">

                   <div class="form-row">
                       <div class="form-group col-md-3">
                         <label>Name of Person</label>
                         <input type="text" name="person" class="form-control" placeholder="Name of Person">
                       </div>

                       <div class="form-group col-md-3">
                         <label>Date</label>
                        <input class="form-control" name="birth" type="date">
                       </div>
                         

                       <div class="form-group col-md-3">
                        <label>Baptism Date</label>
                        <input class="form-control" name="baptism" type="date">
                       </div>

                      <div class="form-group col-md-3">
                        <label for="inputZip">Invited By</label>
                        <input type="text" name="invited" class="form-control" placeholder="Invited By">
                      </div>
                      
                     </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Phone</label>
                      <input class="form-control" name="mobile" type="tel"  placeholder="Phone Number">
                    </div>

                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email">
            
                    </div>
                      

                    <div class="form-group col-md-4">
                      <label>Address</label>
                        <input type="address" name="address" class="form-control" placeholder="Address">
                    </div>

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

        // ajax form submission
            $(document).ready(function(){

                $("#convert").submit(function(e){
                  e.preventDefault();
                  $.ajax({
                    type:"post",
                    url:"converts.php",
                    data:$("#convert").serialize(),
                  })

                  .done(function(data){
                    $('#message').html(data);

                  })
                  .fail(function(data){
                    $('#message').html(data);

                  });
                    
                    $("#convert").find('input').val(" ");


                });

            });

           
         



       


    </script>
</body>

</html>