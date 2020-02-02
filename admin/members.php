<?php

require("../functions.php");
$ch = new Church();
$dbh = DB();

$info = "";
$msg = "";

if (isset($_POST['save'])) {

    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $otherName = trim($_POST['other_name']);
    $residence = trim($_POST['residence']);
    $mobile = trim($_POST['tel']);
    $email = trim($_POST['email']);
    $emergency = trim($_POST['emergency']);
    $nationality = trim($_POST['nation']);
    $address= trim($_POST['address']);
    $hometown = trim($_POST['hometown']);
    $job = trim($_POST['job']);
    $depart = trim($_POST['department']);
    $birth_day = trim($_POST['birth']);
    $date_joined = trim($_POST['date_joined']);
    $gender = trim($_POST['gender']);
    $status = trim($_POST['status']);
    $child1 = trim($_POST['child1']);
    $child2 = trim($_POST['child2']);
    $child3 = trim($_POST['child3']);
    $child4 = trim($_POST['child4']);

    if (!empty($firstName) || !empty($lastName) || !empty($otherName) || !empty($mobile) || !empty($email)
        || !empty($residence) || !empty($nationality) || !empty($address) || !empty($hometown) || !empty($job) || !empty($depart) || !empty($emergency)||!empty($birth_day) || !empty($date_joined) || !empty($gender) || !empty($status)) {
        
        $registered = $ch->addMember($firstName,$lastName,$otherName,$mobile,$email,$nationality,$address,$homewtown,$job,$birth_day,$gender,$status);
        if ($registered) {
            $info = "member added successfully";
            
          // Generate random password for each user.
          $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
          $random_password = substr(str_shuffle($characters), 0,10);

          // send password and login link to member using mail function
          $send_link = $ch->sendEmail($email,$random_password);
          

          
        }else{
            $info = "an error occured";
        }
    }
}



// displaying all groups
$stmt = $dbh->prepare("SELECT * FROM  member_group");
$stmt->execute();


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
    <link rel="stylesheet" type="text/css" href="css/member.css">

    <!-- Font Awesome JS -->
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
                <p>Membership Page</p>

                <li class="active">

                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Members</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#" id="add_member">Add Member</a>
                        </li>
                        <li>
                            <a href="#">All Members</a>
                        </li>
                    </ul>
                </li>

                  <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Groups</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#" id="groups">Create Group</a>
                        </li>
                        <li>
                            <a href="#" id="view_group">View Groups</a>
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <!-- <a class="nav-link" href="#">Page</a> -->
                                <form method="get" action="search_member.php">
                                <div class="input-group">
                                    <input class="form-control border-secondary py-2" type="text" placeholder="search by name" name="search_value" id="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="searchmember">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                              </form>
                            </li>
                           
                        </ul>
                    </div>


                    
                </div>
            </nav>

            <div class="member_form container" style="display: none;">
                    <?php

                    if (isset($info)) {
                        echo $info;
                    }

                    ?>
                    <header>Member Basic Data</header>
                <form method="post">

            <div class="form-row">
              <div class="form-group col-md-3">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required="required">
              </div>

              <div class="form-group col-md-3">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required">
              </div>

              <div class="form-group col-md-3">
                <label>Other Name</label>
                <input type="text" class="form-control" placeholder="Other Name" name="other_name">
              </div>

              <div class="form-group col-md-3">
                <label>Current Residence</label>
                <input type="text" class="form-control" placeholder="residence" name="residence" required="required">
              </div>

              </div>
              <!-- end of row -->


              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Phone Number</label>
                  <input class="form-control" type="tel" name="tel" id="example-tel-input" placeholder="Mobile">
                </div>

                <div class="form-group col-md-3">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>

                <div class="form-group col-md-3">
                  <label>Nationality</label>
                  <input type="text" class="form-control" placeholder="Nationality" name="nation">
                </div>

                <div class="form-group col-md-3">
                  <label>Emergency Contact Person</label>
                  <input type="tel" class="form-control" placeholder="phone number" name="emergency">
                </div>

              </div>

              <!-- end of row -->
              <div class="form-row">

                <div class="form-group col-md-3">
                  <label for="inputAddress">Address</label>
                  <input class="form-control" type="text" name="address" id="inputAddress" placeholder="Address">
                </div>

                <div class="form-group col-md-3">
                  <label>Hometown</label>
                  <input type="text" class="form-control" name="hometown" placeholder="Hometown" required="required">
                </div>

                <div class="form-group col-md-3">
                  <label>Department/Group</label>
                  <input type="text" class="form-control" placeholder="department" name="department">
                </div>

                <div class="form-group col-md-3">
                  <label>Occupation</label>
                  <input type="text" class="form-control" placeholder="Job" name="job">
                </div>

              </div>


            <div class="form-row">

                <div class="form-group col-md-3">
                  <label for="inputCity">Date of Birth</label>
                  <input class="form-control" name="birth" type="date" id="example-date-input" required="required">
                </div>

                <div class="form-group col-md-3">
                  <label for="inputCity">Date Joined</label>
                  <input class="form-control" name="date_joined" type="date" id="example-date-input" required="required">
                </div>

                <div class="form-group col-md-3">
                  <label for="inputState">Gender</label>
                  <select id="inputState" class="form-control" required="required" name="gender" required="required">
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>



          <div class="form-group col-md-3">
            <label for="inputState">Marital Status</label>
              <select id="inputState" class="form-control" name="status" id="status" onchange="displayChild(this);">
                <option selected>Choose...</option>
                <option value="1">Single</option>
                <option value="2" id="married">Married</option>
                <option value="3">Divorced</option>
                <option value="4">Separated</option>
                <option value="5">Widow(er)</option>
              </select>
          </div>
                 
              </div>
              <!-- end of row -->


              <div class="form-row" style="display: none;" id="child_div">

                <div class="form-group col-md-3">
                  <label for="inputAddress">Child1</label>
                  <input class="form-control" type="text" name="child1" id="inputAddress" placeholder="Name">
                </div>

                <div class="form-group col-md-3">
                  <label>Child2</label>
                  <input type="text" class="form-control" name="child2" placeholder="Name" required="required">
                </div>

                <div class="form-group col-md-3">
                  <label>Child3</label>
                  <input type="text" class="form-control" placeholder="Name" name="child3">
                </div>

                <div class="form-group col-md-3">
                  <label>Child4</label>
                  <input type="text" class="form-control" placeholder="Name" name="child4">
                </div>

              </div>

                   
                        


              <div class="row">
                <div class="col">
              <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                </div>

                <div class="col">
                  
              <button type="button" id="default">DISCARD</button>
                </div>
                  
              </div>
                    
               
            </form>
            </div>
            <!-- end of membership form data -->

            <!-- group form -->
          <div class="container group_form"style="display: none;">
            <p id="responsegroup"></p>
           
              <header>Group Settings</header>

              <form method="post" id="groupForm" action="create_group.php">
                

                <div class="form-group">
                  <label>Group Name</label>
                  <input type="text" name="group_name" class="form-control" placeholder="Group Name"
                  required="required" id="group_name">
                </div>
                   

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                     <textarea class="form-control" name="describe" id="exampleFormControlTextarea1" rows="3"
                     required="required"></textarea>
                </div>

                <div class="row">

                  <div class="col">
                <button type="submit" class="btn btn-primary" name="create">CREATE</button>
                  </div>

                  <div class="col">
                <button type="button" id="remove_group">DISCARD</button>
                  </div>
                    
                </div>
              </form>
                    
          </div>
          <!-- end of  group form-->

                
                     

          <div class="container group_table" style="display: none;">
            <header>Groups</header>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Actions</th>
                  <th scope="col">Group Name</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                  <th scope="row">
                    <a href="edit_group.php?edit=<?php echo $row['group_id'];?>"><i class="fa fa-pencil fa-sm" aria-hidden="true"></i></a>
                    <a href="delete_group.php?del=<?php echo $row['group_id'];?>"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a>
                  </th>
                  <td><?php echo $row['group_name']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                </tr>

                
              <?php } ?>
              </tbody>
            </table>
          </div>

            <!-- display member after search -->
           <div class="container display-member" style="display: none;" id="display_member">

            <table class="table">
              <div id="result"></div>
              <thead>
                <tr>
                  <th scope="col">Actions</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Mobile</th>
                </tr>
              </thead>
              <tbody id="searchdata">
                <tr>
                  <th scope="row"><i class="fa fa-trash" aria-hidden="true"></i></th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>

                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
            
          </div> 

            


                 
        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script type="text/javascript" src="../javascript/script.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>

   <script type="text/javascript">
    
     function displayChild(options){
       if (options) {
         let selected = document.getElementById("married").value;
         if (selected == options.value) {
           document.getElementById("child_div").style.display = "";
         }else {

           document.getElementById("child_div").style.display = "none";
         }

       }
     }
   </script>

    

</body>

</html>