<?php
include '../query.php';
$query = new Querys();
if(isset($_POST)) {
    $id = $_POST['id'];
    $clientInfo = $query->acknowledge($id);

    ob_start();
    include 'acknowledgementmessage.php';
    $output = ob_get_contents();
    ob_end_clean();


    $to = $clientInfo[0]['email'];
    $subject = 'New Customer Registration';
    $message = $html;
    $from = 'customerservice@fibrehub.com.ng';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= 'From:' . $from;
    if(mail($to, $subject, $message, $headers)){
        $response = [
            'status' => 1,
            'message' => "<div class='text-success' style='font-weight: bold;' >Operation Successful</div>",
        ];
    }else{
        $response = [
            'status' => 0,
            'message' => "<div class='text-danger' style='font-weight: bold;' >Operation Failed</div>",
        ];
    }

    header('Content-type: application/json');
    echo json_encode($response);
    exit();


}