<?php
include "../query.php";
if(isset($_POST)){
    $id = $_POST['id'];
    $query = new Querys();
    $full_info = $query->customerFullInfo($id);
    
    $response = "
        <div class='panel panel-default'>
            <div class='panel heading' style='background-color:rgb(51, 122, 183);'>
                <h3 class='panel-title'>CUSTOMER DETAILS</h3>
            </div>
            <div class='panel-body'>
            
                <div style = 'font-weight:bolder;'>
                    Customer ID : {$full_info[0]['customer_id']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Customer Name : {$full_info[0]['customer_name']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Phone: {$full_info[0]['phone']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Email : {$full_info[0]['email']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Customer ID : {$full_info[0]['customer_id']} 
                </div>
                                    
            </div>
        </div>

        <div class='panel panel-default'>
            <div class='panel heading' style='background-color:rgb(51, 122, 183);'>
                <h3 class='panel-title'>CUSTOMER DETAILS</h3>
            </div>
            <div class='panel-body'>
            
                <div style = 'font-weight:bolder;'>
                    Service : {$full_info[0]['service']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Bandwidth : {$full_info[0]['bandwidth']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Location: {$full_info[0]['location']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Cloud No : {$full_info[0]['cloud_no']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Modem Serial no : {$full_info[0]['modem_no']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    IP Address : {$full_info[0]['ip_address']} 
                </div>
                                    
            </div>
        </div>

        <div class='panel panel-default'>
            <div class='panel heading' style='background-color:rgb(51, 122, 183);'>
                <h3 class='panel-title'>TECHNICIAN DETAILS</h3>
            </div>
            <div class='panel-body'>
            
                <div style = 'font-weight:bolder;'>
                    Technician Name : {$full_info[0]['technician_name']} 
                </div>

                <div style = 'font-weight:bolder;'>
                    Technician Email: {$full_info[0]['technician_email']} 
                </div>
            </div>
        </div>
    ";
}

header('Content-type: application/json');
echo json_encode($response);
exit();

?>