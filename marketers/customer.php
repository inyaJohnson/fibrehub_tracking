<?php
function customer(){
            head();
            
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Plan/Bandwidth</th>
                            <th>Due Date</th>
                          
                        </tr>
                    </thead>
                    <tbody>
            <?php
            if(empty($_POST['search'])){
                customerList();
            }else{
                $searchResult = dataSearch($_POST);
                customersPageIfSearch($searchResult);
            }
                
                ?> 
                    </tbody>
                </table>
            </div>
            <?php
            footer();
            ?>
            <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
            <script src="jquery-ui.js"></script>
            <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
            <script src="bootbox.min.js"></script>       
            <script src="jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>     
        </body>
    </html>
    <?php      
};

function customerList(){
    $query = new Querys();
    $result = $query->customer();
    foreach($result as $clientInfo){
        $result2 =$query->customerPaymentHistoryView($clientInfo['id']);
        foreach($result2 as $clientInfo2);
        $dueDate = strtotime($clientInfo2['due_date']);
        $now = strtotime(date("m/d/Y"));
        $daysLeft = calculateDueDate($dueDate, $now);
        $daysLeftInFigure = dueDateFigure($dueDate, $now);
        ?>
            <tr>
                <td><?php echo $clientInfo['id']?></td>
                <td>
                    <strong ><?php 
                    if($daysLeftInFigure > 5){ 
                        echo "<div style='color: rgb(0, 175, 0);'>{$clientInfo['customer_id']}</div>";
                    }elseif(($daysLeftInFigure <= 5) && ($daysLeftInFigure > 0)){
                        echo "<div style='color:rgb(255, 175, 0)'>{$clientInfo['customer_id']}</div>";
                    }else{
                        echo "<div style='color: rgb(255, 0, 0);'>{$clientInfo['customer_id']}</div>";
                    }
                    echo"</strong>
                </td>
                <td>{$clientInfo['customer_name']}</td>
                <td>{$clientInfo['address']}</td>
                <td>{$clientInfo['email']}</td>
                <td>{$clientInfo['phone']}</td>
                <td>{$clientInfo['bandwidth']}</td>
                <td>$daysLeft</td>
            </tr>   
        ";
    }
};

function calculateDueDate($dueDate, $now){ 

    if($dueDate >= $now){
    $diff = abs($dueDate - $now);
    $years = floor($diff/(365*60*60*24));
    $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
    $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $result = "{$years} years,  {$months} months, {$days} days";
    }else{
        $diff = abs($now - $dueDate);
        $years = floor($diff/(365*60*60*24));
        $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
        $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $result = "<div style='color:red;'>Expired {$years} years,  {$months} months, {$days} days ago</div>";
    }
    return $result;
}

function dueDateFigure($dueDate, $now){
    if($dueDate >= $now){
    $diff = abs($dueDate - $now);
    $years = floor($diff/(365*60*60*24));
    $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
    $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $result = floor(($years*365) + ($months * 30) + $days);
    }else{
        $diff = abs($now - $dueDate);
        $years = floor($diff/(365*60*60*24));
        $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
        $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $result = -(floor(($years*365) + ($months * 30) + $days));
    }
    return $result;
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


function customersPageIfSearch($resultFromSearch){
    if(!empty($resultFromSearch)){
        foreach($resultFromSearch as $clientInfo){
            $query = new Querys();
            $result2 =$query->customerPaymentHistoryView($clientInfo['id']);
            foreach($result2 as $clientInfo2);
            $dueDate = strtotime($clientInfo2['due_date']);
            $now = strtotime(date("m/d/Y"));
            $daysLeft = calculateDueDate($dueDate, $now);
            $daysLeftInFigure = dueDateFigure($dueDate, $now);
            ?>
                <tr>
                    <td><?php echo $clientInfo['id']?></td>
                    <td>
                        <strong ><?php 
                        if($daysLeftInFigure > 5){ 
                            echo "<div style='color: rgb(0, 175, 0);'>{$clientInfo['customer_id']}</div>";
                        }elseif(($daysLeftInFigure <= 5) && ($daysLeftInFigure > 0)){
                            echo "<div style='color:rgb(255, 175, 0)'>{$clientInfo['customer_id']}</div>";
                        }else{
                            echo "<div style='color: rgb(255, 0, 0);'>{$clientInfo['customer_id']}</div>";
                        }
                        echo"</strong><br />
                    </td>
                    <td>{$clientInfo['customer_name']}</td>
                    <td>{$clientInfo['address']}</td>
                    <td>{$clientInfo['email']}</td>
                    <td>{$clientInfo['phone']}</td>
                    <td>{$clientInfo['bandwidth']}</td>
                    <td>$daysLeft</td>
                </tr>   
            ";
        }
    }else{
        echo"
        <tr>
            <td>
                <div id='header' class='text-center text-danger'> 
                    NO RESULT FOUND
                </div>
            </td>
        </tr>
        ";
        
    }
}

?>