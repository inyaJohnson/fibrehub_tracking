<?php
session_start();
include "session.php";
$setSession = new Session;
require "db.php";

if (isset($_POST)) {
    $user = new User();
    $user->login($_POST); 
    $isLoggedIn = $user->login($_POST);

    if(!empty($isLoggedIn)) {
        $setSession->setSessionVariable($isLoggedIn);
        foreach($isLoggedIn as $logInDetails){
            $dept = $logInDetails['department'];
        }
        $user->checkDepartmentOnLogin($dept);   
    } else {
    echo "<div style='font-weight: bold; color:red;'>Please enter valid credentials!</div>";
    }
}


class User{
    protected $db;
    

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function login(array $data){
        $userName = $data['username'];
        $password = $data['password'];
        $department = $data['department'];
        $query = "SELECT * FROM login WHERE user_name = '$userName' && password = '$password' && department ='$department'";
        $result = $this->db->select($query);
        return $result;
    }

    public function checkDepartmentOnLogin($dept){
        switch($dept){
            case 'Customer Service':
                Header('Location:customerservice/customers.php');
                break;
            
            case 'Marketing':
                Header('Location:marketers/fibrehub.php');
                break;

            case 'Management':
                Header('Location:fibrehub.php');
                break;
                
            case 'Technical Support':
                Header('Location:tech/customers.php');
                break;
            
            default:
                echo "<script>alert('Please enter valid credentials!')<script>";
        }
    }

}


?>