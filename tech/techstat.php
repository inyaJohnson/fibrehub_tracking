<?php
session_start();
include "template.php";
include "../query.php";
            head();
            if(isset($_GET['technician_name'])){
                $_SESSION['technicianName'] = $_GET['technician_name'];
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Customer_ID</th>
                            <th>Customer Name</th>
                            <th>Splitter Location</th>
                            <th>Modem Number</th>
                            <th>IP Address</th>
                            <th>Technician Name</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php

                if(empty($_POST['search'])){
                    customerList($_SESSION['technicianName']);
                }else{
                    $searchResult = dataSearch($_POST);
                    customerListPageIfSearch($searchResult);    
                }
                
            ?>
                    </tbody>
                </table>
            </div>
            <?php
            footer();
            ?>
            </div>

            <!-- for the market directory -->
            <script src="../jquery-3.3.1.min.js"></script>
            <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
            <script src="../bootbox.min.js"></script>
            <script src="../jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
        </body>
    </html>


<?php
    function customerList($technicianName){
        
            $query = new Querys();
            $result = $query->techStat($_SESSION['technicianName']);
            // var_dump($result);
            // exit;
        
        foreach($result as $clientInfo){
            echo"
                <tr>
                    <td>{$clientInfo['id']}</td>
                    <td>{$clientInfo['customer_id']}</td>
                    <td>{$clientInfo['customer_name']}</td>
                    <td>{$clientInfo['location']}</td>
                    <td>{$clientInfo['modem_no']}</td>
                    <td>{$clientInfo['ip_address']}</td>
                    <td>{$clientInfo['technician_name']}</td>
                </tr>  
            ";
        }
    }

    function dataSearch(array $data){
        $searchWords = explode(' ', $data['search']);
        $temp = $result = [];
        foreach ($searchWords as $word) {
            $query = new Querys();
            $temp[] = $query->customerSearch($word);
        }
        
        foreach($temp as $resultSet) {
            foreach($resultSet as $record) {
                if(!in_array($record, $result)){
                    $result[] = $record;
                }
            }
        }
        return $result;    
            
    }
    
    function customerListPageIfSearch($resultFromSearch){
        $count = 1;
        // $countIncrement = $count++;
        if(!empty($resultFromSearch)){
            foreach($resultFromSearch as $clientInfo){  
                $countIncrement = $count++;       
            echo"
                <tr>
                    <td>{$clientInfo['id']}</td>
                    <td>{$clientInfo['customer_id']}</td>
                    <td>{$clientInfo['customer_name']}</td>
                    <td>{$clientInfo['location']}</td>
                    <td>{$clientInfo['modem_no']}</td>
                    <td>{$clientInfo['ip_address']}</td>
                    <td>{$clientInfo['technician_name']}</td>
                </tr>  
                ";
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
    }

?>