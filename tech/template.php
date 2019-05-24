<?php
function head(){
?>
<!DOCTYPE html>
<html lange ="en">
    <head>
        <meta charset="UTF-8" content="width=device-width" name ="viewport" initial-scale="1.0">
        <title>FibreHub | Home</title>
        
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../index.css"> 
    </head>

    <body>
        <div class="navbar my-nav" role="navigation">
            <div class="navbar navbar-header col-xs-12 col-md-5"> 
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
                <ul class="nav navbar-nav " >
                    <li><a  class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/tech/customers.php'){ echo "active";}?>" href="customers.php">Customers</a></li>
                    <li><a  class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/tech/tech.php'){ echo "active";}?>" href="tech.php">Technicians</a></li>
                    <li><a  class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/tech/addcustomer.php'){ echo "active";}?>" href="addcustomer.php">Add Customer</a></li>
                    <li><a  class="nav-font <?php if($_SERVER['SCRIPT_NAME'] === '/tracking/logout.php'){ echo "active";}?>" href="../logout.php">LogOut</a></li>                
                </ul>
            </div>
            
            

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="navbar-form" role="search" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">    
                        <div class="input-group col-xs-offset-4 col-xs-4">
                            <input type="text" class="form-control search " placeholder="Search..." name="search" id="search" />                    
                        </div>
                        <span>
                            <button type="submit" class="form-control input-group-addon search-icon btn-lg"><i class="fa fa-search"></i></button>
                        </span>
                    </form>
                </div> 
            </div>


<?php
}
function footer(){
?>

    <div class="row footer navbar-fixed-bottom">
        <div id ="footer" class="col-xs-12 ">
            <div id="copyright">Copyright &copy; FibreHub 2018</div>
        </div>
    </div>

<?php
}

?>