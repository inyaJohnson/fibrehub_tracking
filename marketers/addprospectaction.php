<?php
include "../query.php";

if(isset($_POST)){
    $addclient = new Addprospect();
    $result = $addclient->checkIfProspectExist($_POST);
    if(!empty($result)){
        $response = [
            'status' => 0,
            'message' => "<div style='color:red; font-weight:bold;'>A Prospect Already Exit with this Email</div>",
        ];
    }else{
        $query = new Querys();
        if($query->addProspect($_POST)){
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


class Addprospect{
    protected $query; 

    public function __construct(){
        $this->query = new Querys();
    }
    
    // THIS VALIDATION IS DONE VIA MAIL
    public function checkIfProspectExist(array $data){
        $email = $data['email'];
        $result = $this->query->prospectEmailCheck($email);
        return $result;
    }
}

?>