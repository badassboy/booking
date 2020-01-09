<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome JS -->
   <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">
        .welfare {

            background-color:rgb(255, 255, 255);
            height: 500px;
            padding-top: 3%;
            /*display: none;*/
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
                
                <li>
                    <a href="#">About</a>
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

            <h2>Welfare Page</h2>
            <div class="container welfare">
                <div id="response"></div>
               <form method="post" action="welfare_process.php" id="welfare">

                 <div class="form-group">
                   <label>Name of Person</label>
                   <input type="text" name="person" class="form-control" placeholder="Person Name">
                 </div>

                 <div class="form-group">
                   <label>Amount</label>
                   <input type="number" name="amount" class="form-control" placeholder="Amount">
                 </div>

                

                 <div class="form-group">
                   <label>Date</label>
                   <input type="date" name="date_paid" class="form-control" placeholder="">
                 </div>
                   
                

                

                 <button type="submit" class="btn btn-primary">Pay</button>
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
                $("#welfare").submit(function(e){
                  e.preventDefault();
                  $.ajax({
                    type:"post",
                    url:"welfare_process.php",
                    // Encode a set of form elements as a string for submission.
                    data:$("#welfare").serialize(),
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