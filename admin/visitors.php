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
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
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

            <h2>Membership Page</h2>

            <div id="visitor_div">

                <form method="post" action="" id="visitor_form">

                   <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Event Name">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="inputPhone">Phone</label>
                        <input type="tel" class="form-control" id="inputPhone" placeholder="Phone Number">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="inputLocation">Location</label>
                        <input type="text" class="form-control" id="inputLocation" placeholder="Location">

                        
                      </div>
                    </div> 


                    <div class="form-row">
                       <div class="form-group col-md-3">
                         <label for="inputName">Name</label>
                         <input type="text" class="form-control" id="inputName" placeholder="Event Name">
                       </div>

                       <div class="form-group col-md-3">
                         <label for="inputPhone">Phone</label>
                         <input type="tel" class="form-control" id="inputPhone" placeholder="Phone Number">
                       </div>

                       <div class="form-group col-md-3">
                         <label for="inputEmail">Email</label>
                         <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                       </div>

                       <div class="form-group col-md-3">
                         <label for="inputLocation">Location</label>
                         <input type="text" class="form-control" id="inputLocation" placeholder="Location">

                         
                       </div>
                     </div> 



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
    </script>
</body>

</html>