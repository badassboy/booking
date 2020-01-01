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
    <link rel="stylesheet" href="css/calendar.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
   

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
                    <a href="#">Create Event</a>
                </li>

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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>

            <h2>Collapsible Sidebar Using Bootstrap 4</h2>

            <div class="container event_form">
                <p id="response"></p>
                <header>Create Event</header>
                <form method="post" action="" id="calendar">

                    <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="inputName">Event Name</label>
                 <input type="text" class="form-control" id="inputName" placeholder="Event Name" required="required" name="event_name">
               </div>

               <div class="form-group col-md-4">
                 <label for="inputTheme">Theme</label>
                 <input type="text" class="form-control" id="inputTheme" placeholder="Theme" required="required"
                 name="theme">
                
               </div>

               <div class="form-group col-md-4">
                 <label>Leader</label>
                 <input type="text" class="form-control" id="leader" placeholder="Leader" required="required"
                 name="leader">
               </div>

             </div>

             <div class="form-row">
                <div class="form-group col-md-2">
                  <label>Schedule</label>
                  <select id="inputState" class="form-control" id="schedule" name="schedule">
                    <option selected>Choose...</option>
                    <option>Weekly</option>
                    <option>Monthly</option>
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label>Date</label>
                 <input class="form-control" name="duration" type="datetime-local"  required="required">
                </div>
                

                <div class="form-group col-md-8">
                  <label>Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  placeholder="event description" name="describe"></textarea>
                </div>
              </div>

              <button type="submit" class="btn  btn-primary">Create event</button>




                </form>
            </div>
            
        </div>
    </div>

    <!-- jQuery CDN -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script type="text/javascript" src="javascript/script.js"></script>
    
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