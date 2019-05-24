<?php
include "db.php";

if(isset($_POST)){
   
    $adduser = new addUser();
    $result = $adduser->checkIfUserExit($_POST);
    if(!empty($result)){    
     echo "<div style='color:red; font-weight:bold;'>A Customer Already Exit with this ID</div>";
        
    }else{
        $adduser->addNewUser($_POST);
        // echo "Account Successfully registered";
    }
}
class addUser{
    protected $db;
    function __construct(){
        $this->db = new DataBase();
    }

    public function checkIfUserExit(array $data){
        $userName = $data['username'];
        $dept = $data['department'];
        $query ="SELECT * FROM login WHERE user_name = '$userName' && department = '$dept'";
        $result = $this->db->select($query);
        return $result;
    }

    public function addNewUser(array $data){
        $userName = $data['username'];
        $department = $data['department'];
        $password = $data['password'];
        $confirmPassword = $data['confirmpassword'];

        $userNameCheck = $this->checkIfUserExit($data);
        if(!empty($userNameCheck)){
            foreach($userNameCheck as $userCheck){
                if(($userCheck['user_name'] === $userName) && ($userCheck['department'] === $department)){    
                    echo "User already exist";
                }else{
                    $query = "INSERT INTO login(user_name, department, password) VALUES('$userName', '$department', '$password')";
                    $result = $this->db->singleInsert($query);
                    echo "Account Successfully registered";
                    return $result;
                }
            }
        }else{
            $query = "INSERT INTO login(user_name, department, password) VALUES('$userName', '$department', '$password')";
            $result = $this->db->singleInsert($query);
            echo "Account Successfully registered";
            return $result;
        }
    }


    
}


?>