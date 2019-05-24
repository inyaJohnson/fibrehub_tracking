<?php
include "../query.php";


if(isset($_POST)){
    $addCustomer = new Addcustomer();
    $result = $addCustomer->checkIfCustomerExist($_POST);

    if(!empty($result)){
        $response = [
            'status' => 0,
            'message' => "<div style='color:red; font-weight:bold;'>A Customer Already Exit with this ID</div>",
        ];
    }else{
        $query = new Querys();
        if($query->addCustomer($_POST)){
            $response = [
                'status' => 1,
                'message' => "<div style='color:green; font-weight:bold;'>Operation Successful</div>",
            ];
        }else{
            $response = [
                'status' => 0,
                'message' => "<div style='color:red; font-weight:bold;'>Operation Failed</div>",
            ];
        }
    }

    header('Content-type: application/json');
    echo json_encode($response);
    exit();
}


class Addcustomer{
    protected $query; 

    public function __construct(){
        $this->query = new Querys();
    }
    
    // THIS VALIDATION IS DONE VIA MAIL
    public function checkIfCustomerExist(array $data){
        $customerId = $data['customerid'];
        // $customerId = $data['customerid'];
        $result = $this->query->customerIdCheck($customerId);
        return $result;
    }

}

?>