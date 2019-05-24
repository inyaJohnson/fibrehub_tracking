<?php
include "stafftemplate.php";
include "query.php";
    head();
        echo"<div class='table-reponsive'>
        <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>Other Names</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>View Profile</th>
                    <th>Delete Staff</th>
                </tr>
            </thead>
            <tbody>";
            $query = new Querys();
            $result = $query->staffList();
            foreach($result as $staff){
                echo"<tr>
                        <td>{$staff['staff_id']}</td>
                        <td>{$staff['last_name']}</td>
                        <td>{$staff['other_names']}</td>
                        <td>{$staff['email']}</td>
                        <td>{$staff['department']}</td>
                        <td><button type='button' class='btn btn-block btn-success profile_btn' id='profile{$staff['staff_id']}' name='profile{$staff['staff_id']}'
                        data-id='{$staff['staff_id']}' >{$staff['last_name']}'s Profile</button></td>
                        <td><button type='button' class='btn btn-danger delete_btn btn-block' id='delete{$staff['staff_id']}' name='delete{$staff['staff_id']}'
                         data-id='{$staff['staff_id']}' >Delete {$staff['last_name']}</button></td>
                    </tr>
                ";
            }
            echo"</tbody>
        <table>;

        ";
        ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">FibreHub</h4>
                        </div>
                        <div class="modal-body">
                        <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                
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
            $(document).ready(function(){

                $(".delete_btn").click(function(){
                    var id = $(this).attr('data-id');
                    //AJAX REQUEST
                    $.ajax({
                        type: "POST",
                        url: "deletestaff.php",
                        data: {id:id},
                        success : function(response){
                            if(response.status == 1){
                                bootbox.alert(response.message);
                            }else{
                                bootbox.alert(response.message);
                            }
                        }
                    });
                });

                $(".profile_btn").click(function(){
                    var staff_id = $(this).attr('data-id');
                    //AJAX REQUEST
                    $.ajax({
                        type: "POST",
                        url: "staffprofile.php",
                        data: {staffId:staff_id},
                        success: function(response){
                            //ADD RESPONSE TO MODAL BODY
                            $('.modal-body').html(response);

                            //DISPLAY THE MODAL
                            $('#myModal').modal('show');
                        }

                    });
                });
            });
        </script>
    </body>
</html>