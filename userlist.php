<?php
include "stafftemplate.php";
include "query.php";
    head();
        echo"<div class='table-reponsive'>
        <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Remove User</th>
                </tr>
            </thead>
            <tbody>";
            $query = new Querys();
            $result = $query->userList();
            foreach($result as $user){
                echo"<tr>
                        <td>{$user['user_id']}</td>
                        <td>{$user['user_name']}</td>
                        <td>{$user['password']}</td>
                        <td><button type='button' class='btn btn-danger delete_btn' id='delete{$user['user_id']}' name='delete{$user['user_id']}'
                         data-id='{$user['user_id']}' >Delete User</button></td>
                    </tr>
                ";
            }
            echo"</tbody>
        <table>";
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
                        url: "deleteuser.php",
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
            });
        </script>
    </body>
</html>