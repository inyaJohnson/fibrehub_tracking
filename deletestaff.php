<?php
include "query.php";

class DeleteStaff{
    protected $db;
    protected $query;
    public function __construct(){
        $this->db = new DataBase();
        $this->query = new Querys();
    }

    public function deleteExistingStaff(array $data){
        $staffId = $data['id'];
        $result = $this->query->removeStaff($staffId);
        return $result;
    }
    
}

if(isset($_POST)){
    $del = new DeleteStaff();
    
    if($del->deleteExistingStaff($_POST)){
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

?>