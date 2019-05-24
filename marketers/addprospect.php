<?php
include "template.php";
include "../query.php";
head();
?>
        <div class="row">
            <div class="col-xs-offset-0 col-xs-12  col-md-offset-2 col-md-8">
                <form class="form-horizontal" id="addprospect" name="addprospect"
                action="addprospectaction.php" method="POST" role="form">
                    
                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);">
                            <h3 class="panel-title">PROSPECT DETAILS</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" />
                                    </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" />
                                    </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
                                    </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="fa fa-home "></i></span>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                                    </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">ADDITIONAL INFO (FOR ORGANISATIONS)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="organisationname" name="organisationname" placeholder="Organisation Name" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input type="text" class="form-control" id="organisationtelephone" name="organisationtelephone" placeholder="Organisation Telephone" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" id="organisationemail" name="organisationemail" placeholder="Organisation E-mail" />
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">MARKETER'S INFO</h3>
                        </div>
                        <div class="panel-body">
                            <!-- <div class="col-xs-12"> -->
                                <div class="col-xs-12 col-md-5 input-index">
                                    <select id="marketername" name="marketername" class="form-control" role="form">
                                        <option value="Select Marketer Name">Select Marketer Name</option>
                                        <?php
                                        $query = new Querys();
                                        $result = $query->marketerName();
                                        foreach($result as $marketerInfo){
                                            echo "<option value='{$marketerInfo['user_name']}'>{$marketerInfo['user_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="email" class="form-control" id="marketeremail" name="marketeremail" placeholder="Marketer's Mail" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <input type="submit" class="btn btn-success btn-block" id="signup" name="signup" value="Submit">
                                    </div>
                                </div>

                            <!-- </div> -->
                        </div>
                    </div>
                </form>
            </div> 
        </div>
        <?php
        footer();
        ?>
        </div>
    
        <script src="../jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <script src="../bootbox.min.js"></script>
        <script src="../jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
        <script>
           $(document).ready(function (){
                $("#search, .search-icon").hide();
                $.validator.addMethod("notEqual", function(value, element, param){
                   return value !== param;}, "Please select marketer's name");
                $("form[name='addprospect']").validate({
                    //RULES
                    rules :{
                        //RULES FOR PERSONAL DETAILS
                        firstname: {
                            required : true,
                            minlength: 2
                        },

                        email:{
                            required : true
                        },

                        phone:{
                            required : true
                        },

                        lastname: {
                            required : true,
                            minlength: 2
                        },

                        address: {
                            required : true
                        },
                        
                        organisationtelephone:{
                        maxlength: 11
                        },

                        marketername: {
                            notEqual : "Select Marketer Name"
                        },
                        marketeremail: {
                           required : true
                        }

                    },
                    //ERROR MEASSAGES
                    messages:{
                        //MESSAGES FOR PERSONAL DETAILS
                        firstname: {
                           required : "Please enter your first name",
                          minlength: "Your first name should contain atleast 2 letters"
                        },
                       
                        lastname: {
                             required: "PLease enter your last name",
                            minlength: "Your last name should contain atleast 2 letters"
                        },

                        organisationtelephone:{
                        maxlength: "Phone number must not exceed 11 digits"
                        }
                    },

                    submitHandler: function(form) {
                       //console.log($("#addprospect").attr("action"));
                        $.ajax({
                            type: 'POST',
                            url: $("#addprospect").attr("action"),
                            data: $("#addprospect").serialize(),
                            // console.log($("#addprospect").serialize());
                            // exit();
                            success: function (response) {
                                if(response.status == 1)
                                {
                                    bootbox.alert(response.message);
                                    
                                }else{
                                    bootbox.alert(response.message);
                                }
                            }
                            
                        });
                    }
                });
            });

        </script>
    </body>
</html>