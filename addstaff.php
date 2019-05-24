<?php
include "stafftemplate.php";
head();
?>
        <div class="row">
            <div class="col-xs-offset-0 col-xs-12  col-md-offset-2 col-md-8">
                <form class="form-horizontal" id="addstaff" name="addstaff"
                action="addstaffaction.php" method="POST" role="form" enctype = "multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    
                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);">
                            <h3 class="panel-title">PERSONAL INFORMATION</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user "></i></span>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                    <input type="text" class="form-control" id="othernames" name="othernames" placeholder="Other Names" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <label for="sex">Sex :</label>&nbsp;
                                    <input type="radio" id="sex" name="sex" value="Male" />&nbsp; Male &nbsp;
                                    <input type="radio" id="sex" name="sex" value="Female" />&nbsp; Female
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <label for="sex">Marital Status :</label>&nbsp;
                                    <input type="radio" id="status" name="status" value="Single" />&nbsp; Single &nbsp;
                                    <input type="radio" id="status" name="status" value="Married" />&nbsp; Married &nbsp;
                                    <input type="radio" id="status" name="status" value="Divorced" />&nbsp; Divorced
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                    <input type="text" class="form-control" id="dof" name="dof" placeholder="D.O.F (DD/MM/YYYY)" />
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

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="fa fa-home "></i></span>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State of Origin " />
                                </div>
                            </div> 

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index" >
                                    <label for="profilepicture">Upload Profile Picture(Size must be less than 2Mb):</label>
                                    <input type="file" class="form-control" id="profilepicture" name="profilepicture"  />
                                </div>
                            </div>    
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">HEALTH INFORMATION</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="fa fa-wheelchair"></i></span>
                                    <input type="text" class="form-control" id="disability" name="disability" placeholder="Disabilities (State if Any)" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                                        <input type="text" class="form-control" id="bloodgroup" name="bloodgroup" placeholder="Blood Group" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                                        <input type="text" class="form-control" id="genotype" name="genotype" placeholder="Genotype" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                                    <input type="text" class="form-control" id="allergy" name="allergy" placeholder="Allergies(State if Any)" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">NEXT OF KIN INFORMATION</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="nextofkinname" name="nextofkinname" placeholder="Full Name" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input type="text" class="form-control" id="nextofkintelephone" name="nextofkintelephone" placeholder="Phone No" />
                                </div>
                            </div>
        
                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" id="nextofkinemail" name="nextofkinemail" placeholder="E-mail" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="input-group input-index">
                                    <span class="input-group-addon"><i class="fa fa-home "></i></span>
                                    <input type="text" class="form-control" id="nextofkinaddress" name="nextofkinaddress" placeholder="Address" />
                                </div>
                            </div>                           
                        </div>
                    </div>
                
                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">BANK ACCOUNT INFORMATION</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control" id="accountname" name="accountname" placeholder="Account Name" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control" id="accountnumber" name="accountnumber" placeholder="Account Number" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name" />
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>  


                    <div class="panel panel-default">
                        <div class="panel heading" style="background-color:rgb(51, 122, 183);"> 
                            <h3 class="panel-title">MANAGEMENT INFO</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" class="form-control" id="employername" name="employername" placeholder="Employer Name" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Employee's Role" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control" id="dateofemployment" name="dateofemployment" placeholder="Date of Employment(DD/MM/YYYY)" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control" id="department" name="department" placeholder="Department" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12">
                                    <div class="input-group input-index">
                                        <textarea type="text" class="form-control" id="worktools" name="worktools" placeholder="Please State any Device(s) given to the employee upon employment" rows=5 cols=85></textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-md-6">
                                    <div class="input-group input-index">
                                        <input type="submit" class="btn btn-success btn-block" id="submit" name="submit" value="Submit" />
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
    
        <script src="jquery-3.3.1.min.js"></script>
        <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <script src="bootbox.min.js"></script>
        <script src="jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
        <script>
           $(document).ready(function (e) {
               $("form#addstaff").submit( function(e){
                   e.preventDefault();
            
                $("#addstaff").validate({
                        //RULES
                        rules :{
                            //RULES FOR PERSONAL DETAILS
                            lastname: {
                                required : true,
                                minlength: 2
                            },
                            
                            othernames: {
                                required : true,
                                minlength: 2
                            },

                            sex:{
                                required: true
                            },

                            status:{
                                required : true
                            },
                            
                            dof: {
                                required : true
                            },

                            email:{
                                required : true
                            },

                            phone:{
                                required : true,
                                maxlength : 11,
                                minlength : 11
                            },
                            
                            address: {
                                required : true
                            },
                            
                            state: {
                                required : true
                            },

                            profilepicture: {
                                required : true
                            },

                            bloodgroup:{
                                required : true
                            },

                            genotype: {
                                required : true
                            },
                            
                            nextofkinname:{
                                required : true
                            },

                            nextofkintelephone:{
                                required : true,
                                maxlength : 11,
                                minlength : 11
                            },

                            nextofkinemail:{
                                required: true
                            },

                            nextofkinaddress:{
                                required: true

                            },

                            accountname:{
                                required : true
                            },

                            accountnumber:{
                                required : true
                            },
                            
                            bankname:{
                                required: true
                            },

                            employername:{
                                required: true
                            },

                            role:{
                                required: true
                            },

                            dateofemployment:{
                                required : true
                            },

                            department:{
                                required : true
                            },

                            worktool:{
                                required : true
                            },
                        },

                        //ERROR MEASSAGES
                        messages:{
                            //MESSAGES FOR PERSONAL DETAILS       
                            lastname: {
                                required: "Please enter your last name",
                                minlength: "Your last name should contain atleast 2 letters"
                            },

                            othernames: {
                                required : "Please enter your first name",
                                minlength: "Your first name should contain atleast 2 letters"
                            },
                            profilepicture: {
                                required : "Please upload a picture"
                            },
                        },

                        submitHandler:function(form){
                            var formData = new FormData(this);
                            //    console.log(formData);             
                            $.ajax({
                                url: $('#addstaff').attr("action"),
                                type: 'POST',
                                data: formData,
                                success: function (response) {
                                    if(response.status == 1)
                                    {
                                        bootbox.alert(response.message);
                                        
                                    }else{
                                        bootbox.alert(response.message);
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });  
                        }
                    });
                });
            });

        </script>
    </body>
</html>