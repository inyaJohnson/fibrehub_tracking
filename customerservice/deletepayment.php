<?php
include '../query.php';
$query = new Querys();
if(isset($_POST)){
    $id = $_POST['id'];

    if($query->deletePayment($id)){
        $response=[
            'status' => 1,
            'message' => 'Payment Deleted',
        ];
    }else{
        $response=[
            'status' => 0,
            'message' => 'Delete Failed',
        ];
    }

    header('Content-type: application/json');
    echo json_encode($response);
    exit;

}

?>