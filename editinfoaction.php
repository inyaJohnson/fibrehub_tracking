<?php
include "query.php";

if(isset($_POST)){
    $data = $_POST;
    $query = new Querys();
    if($query->editCustomer($data)){
        $response = ['status' => 1,
                    'message' => "<div style='color:green; font-weight:bold;'>Customer Info Successfully Edited</div>",];
    }else{
        $response =['status' => 0,
        'message' => "<div style='color:red; font-weight:bold;'>Error occur while Editing Customer Info</div>"];
    }
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
};

?>