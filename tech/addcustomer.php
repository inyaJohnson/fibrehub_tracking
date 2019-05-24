<?php
include "template.php";
include "../query.php";
head();
?>
        <div class="row">
            <div class="col-xs-offset-0 col-xs-12  col-md-offset-2 col-md-8">
                <form class="form-horizontal" id="addcustomer" name="addcustomer"
                action="addcustomeraction.php" method="POST" role="form">
                    
                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);">
                            <h3 class="panel-title">CUSTOMER DETAILS</h3>
                        </div>
                        <div class="panel-body">
                            
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
                                    <input type="text" class="form-control" id="customername" name="customername" placeholder="Customer Name" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                    <input type="text" class="form-control" id="customerid" name="customerid" placeholder="Customer ID" />
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
                            <h3 class="panel-title">SERVICE & LOCATION INFO</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
                                    <input type="text" class="form-control" id="service" name="service" placeholder="Service Plan" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-resize-horizontal"></i></span>
                                        <input type="text" class="form-control" id="bandwidth" name="bandwidth" placeholder="Bandwidth" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Splitter Box Location" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" id="cloudno" name="cloudno" placeholder="Cloud Router Number" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" id="modemno" name="modemno" placeholder="Modem Serial Number" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" id="ip" name="ip" placeholder="IP Address" />
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">TECHNICIAN'S INFO</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" id="technicianname" name="technicianname" placeholder="Technician's First Name" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="email" class="form-control" id="technicianemail" name="technicianemail" placeholder="Technician's Mail" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <select id="marketername" name="marketername" class="form-control" role="form">
                                            <option value="Select Marketer Name">Select Marketer Name</option>
                                            <?php
                                            $query = new Querys();
                                            $result = $query->marketerName();
                                            foreach($result as $marketerInfo){
                                                echo "<option value='{$marketerInfo['user_name']}'>{$marketerInfo['user_name']}</option>";
                                            };
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-md-6" >
                                    <div class="input-group input-index">
                                        <input type="submit" class="btn btn-success btn-block" id="signup" name="signup" value="Submit">
                                    </div>
                                </div>
                            </div>
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
           $(document).ready(function () {
               $("#search, .search-icon").hide();
               $("form[name='addcustomer']").validate({
                    //RULES
                    rules :{
                        //RULES FOR PERSONAL DETAILS
                        customername: {
                            required : true,
                            minlength: 2
                        },

                        customerid: {
                            required : true,
                            minlength: 6
                        },

                        email:{
                            required : true
                        },

                        phone:{
                            required : true
                        },

                        address: {
                            required : true
                        },

                        service:{
                        required : true
                        },

                        bandwidth: {
                             required : true
                        },

                        location:{
                            required : true
                       
                        },

                        cloudno: {
                             required : true
                        },

                        routerno:{
                            required : true
                        },

                        marketername: {
                             required : true
                        },

                        technicianname:{
                            required : true
                        },
            
                        technicianemail: {
                           required : true
                        }
                    },
                    //ERROR MEASSAGES
                    messages:{
                        //MESSAGES FOR PERSONAL DETAILS
                        customername: {
                            required : "Please enter the customer's name",
                            minlength: "The name should contain atleast 2 letters"
                        },
                       
                        customerid: {
                            required: "PLease enter the customer ID",
                            minlength: "The customer ID should contain atleast 6 Charaters"
                        },

                        phone:{
                        // required: "Please enter your organisation's telephone",
                        maxlength: "Phone number must not exceed 11 digits"
                        }
                    },

                    submitHandler: function(form) {
                       //console.log($("#signup").attr("action"));
                        $.ajax({
                            type: 'POST',
                            url: $("#addcustomer").attr("action"),
                            data: $("#addcustomer").serialize(),
                            // console.log($("#signup").serialize());
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