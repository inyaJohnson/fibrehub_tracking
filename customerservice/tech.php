<?php
include "template.php";
include "../query.php";

head();
?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Technician Name</th>
                    <th>Conversion Rate</th>
                </tr>
            </thead>
            <tbody>
            <?php

                if(empty($_POST['search'])){
                    techniciansPage();
                }else{
                    $searchResult = dataSearch($_POST);
                    techniciansPageIfSearch($searchResult);    
                };
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
    </body>
</html>

<?php
function techniciansPage(){
    $query = new Querys();
    $result = $query->tech();
    $count = 1;
    foreach($result as $clientInfo){ 
        $countIncrement = $count++;     
    echo"
    <tr>
        <td>$countIncrement</td>
        <td><a href='techstat.php?technician_name={$clientInfo['technician_name']}'>{$clientInfo['technician_name']}</a></td>
        <td> Conversion Rate</td>
    </tr> "; 
    } 
}

function dataSearch(array $data){
    $searchWords = explode(' ', $data['search']);
    $temp = $result = [];
    foreach ($searchWords as $word) {
        $query = new Querys();
        $temp[] = $query->technicianSearch($word);
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

function techniciansPageIfSearch($resultFromSearch){
    $count = 1;
    // $countIncrement = $count++;
    if(!empty($resultFromSearch)){
        foreach($resultFromSearch as $clientInfo){  
            $countIncrement = $count++;       
        echo"
        <tr>
            <td> $countIncrement</td>
            <td><a href='techstat.php?technician_name={$clientInfo['technician_name']}'>{$clientInfo['technician_name']}</a></td>
            <td> Conversion Rate</td>
        </tr> "; 
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