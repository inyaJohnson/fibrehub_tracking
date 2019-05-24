<?php
function searchedprospect($searchResult){
            head();
            
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Marketer</th>
                            <th>Contact Date</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                if(!empty($searchResult)){
                    foreach($searchResult as $clientInfo){
                ?>
                    <tr>
                        <td><?php echo $clientInfo['prospect_id']; ?></td>
                        <td><?php echo $clientInfo['last_name'].' '.$clientInfo['first_name'] ; ?></td>
                        <td><?php echo $clientInfo['address']; ?></td>
                        <td><?php echo $clientInfo['email']; ?></td>
                        <td><?php echo $clientInfo['phone']; ?></td>
                        <td><?php echo $clientInfo['marketer_name']; ?></td>
                        <td>
                                <button type='button' class='btn btn-success btn-block confirm_btn' data-id="<?php echo $clientInfo['prospect_id']; ?>"
                                id='confirm-<?php echo $clientInfo['prospect_id']; ?>' name='confirm-<?php echo $clientInfo['prospect_id']; ?>'>Confirm</button>
                        </td>
                        
                    </tr>        
            <?php
                    }
                }else{
                        echo"
                        
                                    </tbody>
                                </table>
                            </div>
                            <div id='header' class='text-center text-danger'> 
                                NO RESULT FOUND
                            </div>
                        ";
                }
            ?>
                    </tbody>
                </table>
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
                $(".confirm_btn").click(function(){
                    var id = $(this).attr('data-id');
                    // Ajax request
                    $.ajax({
                        type: 'POST',
                        url: 'techmail.php',
                        data: {id:id},
                        success: function(response){
                            if(response.status == 1){
                                bootbox.alert(response.message);
                            }else{
                                bootbox.alert(response.message);
                            }
                        }
                    })
                });
            });
            </script>
        </body>
    </html>

<?php

}
?>