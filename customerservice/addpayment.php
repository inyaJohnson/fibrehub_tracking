<?php
session_start();
include "../query.php";

if(isset($_POST)){
    $data = $_POST;
    $query = new Querys();
    if($query->addNewPayment($_SESSION['id'], $data)){
        $response = [
            'status' => 1,
                    'message' => "<div style='color:green; font-weight:bold;'>Payment Successfully Added</div>",
                ];
    }else{
        $response =[
            'status' => 0,
        'message' => "<div style='color:red; font-weight:bold;'>Error Occur while adding Payment</div>",
        ];
    }
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
};

?>