<?php 
    require_once '../MyClass.php';
    $con = new MyClass();
    session_start();
    if(!isset($_SESSION['Unm']))
      {
        header('location:Login.php');
      }
  if(isset($_REQUEST['change']))
  {
    if($_REQUEST['new_pwd'] == $_REQUEST['con_new_pwd'])
    {
        $res = $con->changePwd($_SESSION['Unm'],$_REQUEST['old_pwd'],$_REQUEST['new_pwd']);
        if($res == 1)
        {
            echo "<script>alert('Password Change Successfully');</script>";
        }
        else
        {
            echo "<script>alert('Password is Not Change');</script>";
        }
    }
    else
    {
          echo "<script>alert('Password and Confirm Password Not same ');</script>";
    }
  }

  if(isset($_REQUEST['addres']))
  {
   $res = $con->insertResData($_REQUEST['rname'],$_REQUEST['rqty'],$_REQUEST['rprice'],$_REQUEST['rdate']);
   if($res == 1)
   {
       echo "<script>alert('Resource add successfully');</script>";
   }
   else
   {
       echo "<script>alert('Resource is not add');</script>";
   }

  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Add resource
        </title>
        <link rel="icon" href="">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="\bootstrap-4.0.0\dist\css\bootstrap.css" rel="stylesheet">
        <link href="\bootstrap-4.0.0\dist\css\bootstrap.min.css" rel="stylesheet">
		<script src="\bootstrap-4.0.0\dist\js\jquery.js"></script>
        <script src="\bootstrap-4.0.0\dist\js\bootstrap.js"></script>
        <script src="\bootstrap-4.0.0\dist\js\bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            body {font-family: "Lato", sans-serif;}
            
            .sidebar {
                
              height: 100%;
              width: 250px;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #111;
              overflow-x: hidden;
              padding-top: 16px;
            }
            
            .active{
                background-color:blue;
                border-radius:10px 10px 10px 10px;  
                width:230px;
            }
            .active h5{
                color:white;
            }
            
            .sidebar a {
              padding: 6px 8px 6px 16px;
              text-decoration: none;
              font-size: 20px;
              color: #818181;
              display: block;
            }
            
            .sidebar a:hover {
              color: #f1f1f1;
            }
            
            .main {
              margin-left: 250px; /* Same as the width of the sidenav */
              padding: 0px 10px;
              overflow: hidden;
            }
            .main2 {
              margin-left: 250px; /* Same as the width of the sidenav */
              height:165px;
              
            }
            .main2 h1{
                text-align:left;
                color:Green;
            }
            
            @media screen and (max-height: 450px) {
              .sidebar {padding-top: 15px;}
              .sidebar a {font-size: 18px;}
            }
            
            #sideimg{
                border-radius:5px 5px 5px 5px;
            }
            
            
            .dropdown-container {
                  display: none;
                  background-color: #262626;
                  padding-left: 8px;
                }
            .sidenav a, .dropdown-btn {
              padding: 6px 8px 6px 16px;
              text-decoration: none;
              font-size: 20px;
              color: #818181;
              display: block;
              border: none;
              background: none;
              width: 100%;
              text-align: left;
              cursor: pointer;
              outline: none;
            }
            
            /* On mouse-over */
            .sidenav a:hover, .dropdown-btn:hover {
              color: #f1f1f1;
            }
            /*dropdown in header*/
            
            .dropbtn {
                      background-color: #4CAF50;
                      color: white;
                      padding: 12px;
                      font-size: 16px;
                      border: none;
                      width:160px;
                      border-radius:10px 10px 0px 0px;
                    }
                    
                    .dropdown {
                      position: relative;
                      display: inline-block;
                      
                    }
                    
                    .dropdown-content {
                      display: none;
                      position: absolute;
                      background-color: lightblue;
                      min-width: 160px;
                      border-radius:0px 0px 10px 10px;
                      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                      z-index: 1;
                    }
                    
                    .dropdown-content a {
                      color: black;
                      padding: 14px 16px;
                      text-decoration: none;
                      display: block;
                    }
                    
                    .dropdown-content a:hover {background-color: #ddd;}
                    
                    .dropdown:hover .dropdown-content {display: block;}
                    
                    .dropdown:hover .dropbtn {background-color: #3e8e41;}
                    
                    
                    /*card */
                    
                    .card {
                      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                      transition: 0.3s;
                      padding:10px 10px 10px 10px;
                      border-radius:10px 10px 10px 10px;
                      background-color:silver;
                    }
                    
                    .card:hover {
                      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                    }
                    
                    .container {
                      padding: 2px 16px;
                      
                    }
                    
                    
                    /*form */
                    
                     input[type=text],[type=email],[type=password],[type=conpassword],[type=number], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                }

                label {
                padding: 10px 10px 10px 0;
                display: inline-block;
                }

                input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right;
                }

                input[type=submit]:hover {
                background-color: #45a049;
                }

                

                .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
                }

                .col-75 {
                float: left;
                width: 60%;
                margin-top: 6px;
                }

                /* Clear floats after the columns */
                .row:after {
                content: "";
                display: table;
                clear: both;
                }

                /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
                @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 2%; 
                }
                }
                

            </style>

</head>
<body>
     <div class="container-fluid">
        <div class="jumbotron main2" >
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <h1 style="margin-top:0px;">Resource management</h1>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="dropdown">
                      <button class="dropbtn">Hello <?php  echo $_SESSION['Unm']  ?></button>
                      <div class="dropdown-content">
                        <a href="#"  value="Change Password" data-toggle="modal" data-target="#myModal">Change Password</a>
                        <a href="../logout.php">Log Out</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="sidebar">
            <div class="container" >
                <a href="../home.php"><img src="../Photos/chicago.jpg" id="sideimg" width="210px" height="auto" alt=""></a> 
            </div>
            <div class="container">
                <a href="../home.php"><h5><i class="fa fa-fw fa-home"></i>Home</h5></a>
            </div>
            <div class="container active">
                <a href="index.php"><h5><i class="fa fa-fw fa-upload"></i>add resource's</h5></a>
            </div>
            <div class="container">
                <a href="../room/"><h5><i class="fa fa-fw fa-upload"></i>add rooms</h5></a>
            </div>
           <div class="container">
               <a href="../allocate/"><h5><i class="fa fa-fw fa-upload"></i>allocate resource's</h5></a>
            </div>
            <div class="container">
                <button class="dropdown-btn" ><h5><i class="fa fa-fw fa-user"></i>view data<i class="fa fa-caret-down"></i></h5>
                  </button>
                  <div class="dropdown-container">
                      <a href="../view_room/"><h5><i class="fa fa-fw fa-newspaper-o"></i>Total room details</h5></a>
                      <a href="../view_res/"><h5><i class="fa fa-fw fa-newspaper-o"></i>total resource's Details</h5></a>
                    
                  </div>
            </div>
           <div class="container">
               <a href="../vr/"><h5><i class="fa fa-fw fa-newspaper-o"></i>virtual room</h5></a>
            </div> 
        </div>
        
        <div class="main">
            <div class="container-fluid" id="mainformdiv">
              <div class="container" id="formdiv">
                  <h1 style="text-align:center;">Add New Resource</h1>
                        <form method="POST" action="">
                            
                              
                            <div class="row">
                                <div class="col-25">
                                    <label for="fname">Resource Name :</label>
                                </div>
                                <div class="col-75">
                                     <input type="text" id="rname" name="rname" placeholder="Resource name.." >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                     <label for="rqty">Resource quantity :</label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="rqty" name="rqty" placeholder="Resource quantity.." >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="rprice">Resource Price :</label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="rprice" name="rprice" placeholder="Resource Price.." >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="rdate">Resource buy date :</label>
                                </div>
                                <div class="col-75">
                                    <input type="date" id="rdate" name="rdate" placeholder="Resource buy date.." >
                                </div>
                            </div>
                            <div class="btn">
                                
                                <input type="submit" class="btn btn-success" name="addres" value="Add Resource">
                           
                            </div>
                        </form>
                  </div>
            </div>
        </div>
   
   
   
    </div>
    
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Admin Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="POST" action="">
                  <div class="row">
                      <div class="col-lg-6">
                          <label>Enter Old Password</label>
                      </div>
                      <div class="col-lg-6">
                          <input type="password" class="form-control" name="old_pwd" placeholder="Old Password" required>
                      </div>
                  </div>    
                  <hr>
                  <div class="row">
                       <div class="col-lg-6">
                          <label>Enter New Password</label>
                      </div>
                      <div class="col-lg-6">
                          <input type="password" class="form-control" name="new_pwd" placeholder="New Password" required>
                      </div>
                   </div>    
                   <hr>   
                    <div class="row">
                           <div class="col-lg-6">
                              <label>Enter Confirm Password</label>
                          </div>
                          <div class="col-lg-6">
                              <input type="password" class="form-control" name="con_new_pwd" placeholder="Confirm Password" required>
                          </div>
                    </div> 
                <hr> 
                <div class="row">
                      <div class="col-lg-12" >
                          <input type="submit" class="btn btn-success" value="Submit" name="change">
                      </div>
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
 </div>  
  

  
    <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html>

