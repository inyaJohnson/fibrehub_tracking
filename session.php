<?php
class Session{

    public function checkIfLoggedIn(){
        if(!empty($_SESSION['user_id'])){
            header('Location: fibrehub.php');
        }
    }

    public function setSessionVariable(array $data){
        if(!empty($data['user_id'])){
            $_SESSION['user_id'] = $data['user_id'];
        }
       

    }

    public function logOut(){
        //unset variable
        session_unset();

        //destroy variable
        session_destroy();

        //REDIRECT TO HOME PAGE
        Header('Location:index.php');
    }
}
?>

