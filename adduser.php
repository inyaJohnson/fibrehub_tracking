<?php
include "stafftemplate.php";
head();
?>
        
            <div class="row">
                <form id="loginform" name ="loginform" action="adduseraction.php" method="POST" class="form col-xs-offset-3 col-xs-6 form-horizontal" role="form">
                    <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter User Name" /> 
                    </div>
                     <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <select class="form-control" name="department" id="department" form="loginform">
                            <option>Select Your Department</option> 
                            <option value="Customer Service">Customer Service</option>
                            <option value="Management">Management</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Technical Support">Technical Support</option>
                        </select>
                        <strong><div id='msg' name='msg'></div></strong>
                    </div>
                   
                    <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" /> 
                    </div>
                    <div class="loginform-style col-xs-offset-1 col-xs-10">
                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" /> 
                    </div>
                    <div id="msg" name="msg"></div>
                    <div class="loginform-style col-xs-offset-3 col-xs-6">
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
                $.validator.addMethod("notEqual", function(value, element, param){
                    return param !== value;
                }, "Value must not equal the param.");
                
                $("#loginform").validate({
                    rules: {
                        username :{
                            required : true,
                            minlength : 2
                        },
                        
                        department:{
                            required : true,
                            notEqual : "Select Your Department"
                        },

                        password :{
                            required : true
                        },

                        confirmpassword : {
                            required : true,
                            equalTo :"#password"
                        },
                    },
                    messages:{
                        username : {
                            minlength: 'Your Username must be more than 1 letter'
                        },

                        confirmpassword : {
                            equalTo : "Password does not match"
                        },
                        department: { 
                            notEqual: "Please select your department!" 
                            },
                    }
                    
                });
                
            });
        </script>
    </body>
</html>


       