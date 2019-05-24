<?php
function head(){
?>
<!DOCTYPE html>
<html lange="en">
<head>
    <meta charset="UTF-8" content="width=device-width" name="viewport" initial-scale="1.0">
    <title>FibreHub | Home</title>
    <link rel="stylesheet" href="jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- <link rel="stylesheet" type="text/css" href="fibrehub.css"> -->
</head>

<body>
<div class="navbar my-nav" role="navigation">
    <div class="navbar navbar-header col-xs-12 col-md-3">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu">
            <div class="button-style">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
        </button>
        <div id="header" class="navbar navbar-brand nav-font">FibreHub</div>
    </div>
    <div class="collapse navbar-collapse" id="nav-menu">
        <ul class="nav navbar-nav pull-right">
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/fibrehub.php') {
                    echo "active";
                } ?>" href="fibrehub.php">Home</a></li>
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/marketers.php') {
                    echo "active";
                } ?>" href="marketers.php">Marketers</a></li>
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/account.php') {
                    echo "active";
                } ?>" href="account.php">Account</a></li>
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/tech.php') {
                    echo "active";
                } ?>" href="tech.php">Tech-Support</a></li>
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/customers.php') {
                    echo "active";
                } ?>" href="customers.php">Customers</a></li>
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/statistics.php') {
                    echo "active";
                } ?>" href="statistics.php">Statistics</a></li>
            <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle nav-font" href="adduser.php">User &
                    Staff<span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><a class="menu-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/addlist.php') {
                            echo "active";
                        } ?>" href="userlist.php">User List</a>
                    <li><a class="menu-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/adduser.php') {
                            echo "active";
                        } ?>" href="adduser.php">Add User</a>
                    <li><a class="menu-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/staff.php') {
                            echo "active";
                        } ?>" href="stafflist.php">Staff List</a>
                    <li><a class="menu-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/addstaff.php') {
                            echo "active";
                        } ?>" href="addstaff.php">Add Staff</a>

                </ul>

            </li>
            <li><a class="nav-font <?php if ($_SERVER['SCRIPT_NAME'] === '/tracking/logout.php') {
                    echo "active";
                } ?>" href="logout.php">LogOut</a></li>
        </ul>

    </div>

</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form class="navbar-form" role="search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="input-group col-xs-offset-4 col-xs-4">
                    <input type="text" class="form-control search " placeholder="Search..." name="search" id="search"/>
                </div>
                <span>
                            <button type="submit" class="form-control input-group-addon search-icon btn-lg"><i
                                        class="fa fa-search"></i></button>
                        </span>
            </form>
        </div>
    </div>

    <?php
    }
    function footer()
    {
        ?>

        <div class="row footer navbar-fixed-bottom">
            <div id="footer" class="col-xs-12">
                <div id="copyright">Copyright &copy; FibreHub 2018</div>
            </div>
        </div>

        <?php
    }

    ?>

