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
        #church_group {

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

      

        #add_member {

            background-color:rgb(255, 255, 255);
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
               
                <li>
                    <a href="#" id="create_group">Create Group</a>
                </li>
               
               
                <li>
                    <a href="#" id="group">Add member to group</a>
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

            <h2>Church Group</h2>
            <div class="container" id="church_group">
                <div id="response"></div>
                <form method="post" action="chgroups_process.php" id="chgroup">

                  <div class="form-group">
                    <label>Group Name</label>
                    <input type="text" name="group_name" class="form-control" placeholder="Group Name" required="required">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description"
                    required="required"></textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Create Group</button>
                </form> 
                 
            </div>
            <!-- end of church group divs -->

           

            <div class="container" id="add_member">
              <div id="message"></div>
              <header>Add member to group</header>
              <form method="post">

                <div class="form-group">
                  <label>Member Name</label>
                  <input type="text" class="form-control" name="member_name" placeholder="Member Name">
                </div>

                <div class="form-group">
                    <label>Group Name</label>
                    <select class="form-control" id="existing_groups" name="groups">
                      <option>Select</option>
                    </select>
                  </div>
               
                <button type="submit" class="btn btn-primary">Add Member</button>
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

        // hide and show divs based on element clicked
        $(document).ready(function(){
            $("#create_group").click(function(){
                $("#church_group").show();
            })
        })

     

        $(document).ready(function(){
            $("#group").click(function(){
                $("#add_member").show();
            })
        })

                // ajax form submission
                $("#chgroup").submit(function(e){
                  e.preventDefault();
                  $.ajax({
                    type:"post",
                    url:"chgroups_process.php",
                    data:$("#chgroup").serialize(),
                  })
        
                  .done(function(data){
                    $("#response").html(data);
                    console.log("hello");
                  })
                  .fail(function(data){
                    $("#response").html(data);
                    console.log("hi");

                  });

                });

                    // ajax form submission
                    $("#memberchgroup").submit(function(e){
                      e.preventDefault();
                      $.ajax({
                        type:"post",
                        url:"memberchgroup.php.php",
                        data:$("#memberchgroup").serialize(),
                      })
                    
                      .done(function(data){
                        $("#msg").html(data);
                      })
                      .fail(function(data){
                        $("#msg").html(data);

                      });

                    });



                    // ajax for getting displaying groupsin select form
                    $(document).ready(function(){

                          $.ajax({
                            url:"chgroupajax.php",
                            type:"get",
                            dataType:"JSON",
                            success:function(response){
                              console.log(response);
                                var len = response.length;
                                for (var i = 0; i < len; i++) {


                                    var my_groups = response[i]["created_group"];

                                    var option_string = "<option>" + my_groups + "</option>";

                                     $("#existing_groups").append(option_string);

                                   
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