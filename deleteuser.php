<?php
include "query.php";

if(isset($_POST)){
    $del = new DeleteUser();
    $del->deleteExistingUser($_POST);
    if($del->deleteExistingUser($_POST)){
        $response = ['status' => 1 , 
        'message' => 'User deleted, Please Refresh page',
    ];
    }else{
        $response = ['status' => 0 , 
        'message' => 'Operation Failed',
        ];
    }
    header('Content-type: application/json');
    echo json_encode($response);
    exit();
}


class DeleteUser{
    protected $db;
    protected $query;
    public function __construct(){
        $this->db = new DataBase();
        $this->query = new Querys();
    }

    public function deleteExistingUser(array $data){
        $userId = $data['id'];
        $result = $this->query->removeUser($userId);
        return $result;
    }
    
}


?>