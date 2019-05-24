<?php
function head(){
?>
<!DOCTYPE html>
<html lange ="en">
    <head>
        <meta charset="UTF-8" content="width=device-width" name ="viewport" initial-scale="1.0">
        <title>FibreHub | Home</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <!-- <link rel="stylesheet" type="text/css" href="fibrehub.css"> -->
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
        
    </head>

    <body>
        <div class="navbar my-nav" role="navigation">
            <div class="navbar navbar-header col-xs-12 col-md-4"> 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu">
                    <div class="button-style">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                </button>
                <div id="header" class="navbar navbar-brand nav-font">FibreHub</div>
            </div>
            <div class="collapse navbar-collapse pull-right" id="nav-menu">
                <ul class="nav navbar-nav">
                    <li><a class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/fibrehub.php'){ echo "active";}?>" href="fibrehub.php">Home</a></li>
                    <li><a class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/addlist.php'){ echo "active";}?>" href="userlist.php">User List</a>
                    <li><a class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/adduser.php'){ echo "active";}?>" href="adduser.php">Add User</a>
                    <li><a class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/staff.php'){ echo "active";}?>" href="stafflist.php">Staff List</a>
                    <li><a class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/addstaff.php'){ echo "active";}?>" href="addstaff.php">Add Staff</a>
                </ul>
            </div>

        </div>
        <div class="container-fluid">


<?php
}

function footer(){
?>

    <div class="row">
        <div id ="footer" class="col-xs-12">
            <div id="copyright">Copyright &copy; FibreHub 2018</div>
        </div>
    </div>

<?php
}

?>