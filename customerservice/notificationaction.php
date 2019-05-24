<?php
include "../query.php";
if(isset($_POST)){
    $id = $_POST['id'];
    $query = new Querys();
    $client = $query->customerGeneralInfo($id);
    
    ob_start();
    include "notificationmessage.php";
    $output = ob_get_contents();
    ob_end_clean();
     
    
    
    if(sendNotification($html, $client[0]) && $query->removeNotification($client[0]['payment_id'])){
        $response = [
            "status" => 1,
            "message" => "<div>Notification Successfully sent to {$client[0]['customer_id']}</div>",
        ];
    }else{

        $response = [
            "status" => 0,
            "message" => "<div>Notification Failed</div>",
        ];

    };
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
}



function sendNotification($html, array $client){
    
    $to = $client['email'];
    $subject = "Subscription Reminder";
    $message = $html;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: <customerservice@fibrehub.com.ng>" . "\r\n";
    $headers .= "Cc: info@fibrehub.com.ng" . "\r\n";

    mail($to, $subject, $message, $headers);
}


?>