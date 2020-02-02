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

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

   <style type="text/css">
       #funeral {

            background-color:   rgb(255, 255, 255);
            height: 550px;
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
                <p>Dummy Heading</p>


              
                <li>
                    <a href="#">Coming Soon</a>
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

            <h2>Funeral Contribution Form</h2>
            <div class="container" id="funeral">
                <div id="response"></div>
               
               <form  method="post" id="funeral-form">
                 <div class="form-group">
                   <label>Contributor Name</label>
                   <input type="text" name="person" class="form-control" placeholder="Contributor Name" required="required">
                 </div>

                 <div class="form-group">
                   <label>Amount</label>
                   <input type="number" name="amount" class="form-control" placeholder="Amount" required="required">
                 </div>

                 <div class="form-group">
                   <label>Bereaved Name</label>
                   <input type="text" name="bereaved" class="form-control" placeholder="Bereaved Name">
                 </div>

                 <div class="form-group">
                   <label>Leader Name</label>
                   <input type="text" name="leader" class="form-control" placeholder="Leader Name">
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
        $(document).ready(function(){

          $("#funeral-form").submit(function(e){
            e.preventDefault();
            $.ajax({
              type:"post",
              url:"funeral_processing.php",
              data:$("#funeral-form").serialize(),
            })

            .done(function(data){
              $("#response").html(data);
              console.log("hello");

            })
            .fail(function(data){
              $("#response").html(data);

            });
                // clear the form input after submission
              $("#funeral").find('input').val(" ");
          });
          // end of form submission
        });


    </script>
</body>

</html>