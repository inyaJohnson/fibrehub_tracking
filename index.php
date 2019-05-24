<?php

include "template.php";
?>
<!DOCTYPE html >
<html lang="en">
    <head>
        <meta charset="UTF-8" content="width=device-width" name="viewpoint" intial-scale=1.0>
        <title>Fibrehub | Login</title>
        <link rel="stylesheet" type="text/css" href="fibrehub.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css"> 
        
        
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 loginheader">
                    <div id="header">Login</div>
                </div>
            </div>

            <div class="row">
                <form id="loginform" action="login.php" method="POST" class="form col-xs-offset-3 col-xs-6 form-horizontal" role="form">
                    <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter User Name" /> 
                    </div>
                    <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" /> 
                    </div>
                    <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <select class="form-control " name="department" id="department" form="loginform">
                            <option>Select Your Department</option> 
                            <option value="Customer Service">Customer Service</option>
                            <option value="Management">Management</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Technical Support">Technical Support</option>
                        </select>
                        <strong><div id='msg' name='msg'></div></strong>
                    </div>
                    
                    <div class="loginform-style col-xs-offset-4 col-xs-4">
                        <input class="form-control btn btn-primary" type="submit" name="submit" id="submit" value="Submit" /> 
                    </div>
                </form>
            
            </div>

            <?php
            footer();
            ?>
        </div>

        <script src="jquery-3.3.1.min.js"></script>
        <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <script src="bootbox.min.js"></script>
        <script src="jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
        <script>

        $(document).ready(function(){
                $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
                }, "Value must not equal arg.");
                
                $("#loginform").validate({
                    rules: {
                        username :{
                            required : true,
                            minlength : 2
                        },
                        department: { 
                            valueNotEquals: "Select Your Department"
                             },

                        password :{
                            required : true
                        },
                    },
                    messages:{
                        username : {
                            minlength: 'Your Username must be more than 1 letter'
                        },
                        department: { 
                            valueNotEquals: "Please select your department!" 
                            },
                    }

                    // add the rule here
 
                    
                });
                
            });
        </script>
    </body>
</html>



