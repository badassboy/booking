<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">
   

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

      #visitor_div {

          background-color:   rgb(255, 255, 255);
          height: 500px;
          padding-top: 3%;
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
                    <a href="#">Visitor Form</a>
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

            <h2>Visitor Form</h2>

            <div id="visitor_div" class="container">
                <div id="response"></div>
                <form method="post" action="visitor_processing.php" id="visitor_form">

                  
                      <div class="form-group">
                        <label>Visitor Name</label>
                        <input type="text" name="person" class="form-control" placeholder="Visitor Name" required="required">
                      </div>
                        
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="tel" name="mobile" class="form-control" placeholder="Phone Number">
                      </div>

                     

                      <div class="form-group">
                        <label>Address</label>
                        <input type="address" name="address" class="form-control" placeholder="Address">
                      </div>

                      <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Location" required="required">
                      </div>

                      <div class="form-group">
                        <label>Member Assigned To</label>
                        <input type="text" name="member" class="form-control" placeholder="Location" required="required">
                      </div>

                     
                      <button type="submit" class="btn btn-primary">Submit</button>



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
        $("#visitor_form").submit(function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"visitor_processing.php",
            // Encode a set of form elements as a string for submission.
            data:$("#youth").serialize(),
          })
/
          .done(function(data){
            $("#response").html(data);
          })
          .fail(function(data){
            $("#response").html(data);

          });

        });
    </script>
</body>

</html>