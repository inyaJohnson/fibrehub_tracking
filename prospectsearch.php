 <?php
function searchedProspect($searchResult){
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
                            <th>Status</th>
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
                    <td><?php echo $clientInfo['last_name']; ?></td>
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
            // footer();
            ?>
            </div>
        
            <script src="jquery-3.3.1.min.js"></script>
            <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
            <script src="bootbox.min.js"></script>
            <script src="jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
        </body>
    </html>

<?php

}
?>