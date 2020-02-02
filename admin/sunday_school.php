
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
        .classes {
            background-color: rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .group {
            background-color: rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
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
                    <a id="create_class">Create Class</a>
                </li>

                
                <li>
                    <a id="add_member">Add member to class</a>
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

            <h2>Sunday School</h2>
            <div class="container classes">
              <div id="msg"></div>
                    <header>Create Class</header>
                <form method="post" action="" id="sunday_school">

                  <div class="form-group">
                    <label>Class Name</label>
                    <input type="text" class="form-control" name="class_name" placeholder="class">
                  </div>


                  <div class="form-group">
                    <label>Teacher</label>
                    <input type="text" class="form-control" name="teacher" placeholder="teacher">
                  </div>

                  <button type="submit" class="btn btn-primary">Create Class</button>
                </form>
                
            </div>

            <div class="container group">
              <div id="response"></div>
                    <header>Add member to class</header>
                <form method="post" id="sunday_classes">

                  <div class="form-group">
                    <label>Member Name</label>
                    <input type="text" class="form-control" name="member" placeholder="Class Name">
                  </div>

                  <div class="form-group">
                     <label>Classes</label>
                     <select class="form-control" id="class_select" name="selected_class">
                       <option>Select</option>
                     </select>
                   </div>
                     



                  <button type="submit" class="btn btn-primary">Member Added</button>
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

        $(document).ready(function () {
            $('#create_class').on('click', function () {
                $('.classes').show();

            });
        });

        $(document).ready(function () {
            $('#add_member').on('click', function () {
                $('.group').show();
            });
        });


        // ajax for creating sunday school
        $(document).ready(function(){

            $("#sunday_school").submit(function(e){
              e.preventDefault();
              $.ajax({
                type:"post",
                url:"sunday_processing.php",
                data:$("#sunday_school").serialize()
              })

              .done(function(data){
                $("#msg").html(data);
                console.log("hello");
              })

              .fail(function(data){
                $("#msg").html(data);
                console.log("hi");
              });

             $("#sunday_school").find('input').val(" ");
                
            });

        });


        // ajax for adding member to class
        $(document).ready(function(){

            $("#sunday_classes").submit(function(e){
              e.preventDefault();
              $.ajax({
                type:"post",
                url:"sunday_class.php",
                data:$("#sunday_classes").serialize()
              })

              .done(function(data){
                $("#response").html(data);
                console.log("hello");
              })

              .fail(function(data){
                $("#response").html(data);
                console.log("hi");
              });

             $("#sunday_classes").find('input').val(" ");
                
            });

        });

        // ajax for getting displaying class in select form
        $(document).ready(function(){

              $.ajax({
                url:"sunday_ajax.php",
                type:"get",
                dataType:"JSON",
                success:function(response){
                  // console.log(response);
                    var len = response.length;
                    for (var i = 0; i < len; i++) {


                        var class_name = response[i]["class"];
                        // console.log(class_name);

                            var option_string = "<option>" + class_name + "</option>";

                             $("form select").append(option_string);

                       
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
                             

                            

             

                
