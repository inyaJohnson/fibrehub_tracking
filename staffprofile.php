<?php
include "query.php";
$view = new ViewStaffProfile();
if(isset($_POST)){
    $info = $view->staffProfile($_POST);
    $view->staffDisplay($info);
}
class ViewStaffProfile{
    protected $db;
    protected $query;
    function __construct(){
        $this->db = new DataBase();
        $this->query = new Querys();
    }

    function staffProfile(array $data){
        $staffId = $data['staffId'];
        $result = $this->query->showProfile($staffId);
        return $result;
    }

    function staffDisplay(array $info){
        foreach($info as $staffInfo){
            $response = "
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-12 text-center'>
                        <img src='image/{$staffInfo['profile_picture']}' class='img-circle' width='150' height='150'  />
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <h3 id='staff-name'>{$staffInfo['last_name']} {$staffInfo['other_names']}</h3>
                    </div>
                </div>
                <div class='row'>
                    <p>
                        Joined FibreHub on {$staffInfo['date_of_employment']}, employed by {$staffInfo['employer_name']} into the {$staffInfo['role']} department,
                        and was given a {$staffInfo['worktool']}.
                    </p>
                    <p>
                        I'm currently {$staffInfo['status']} and have {$staffInfo['disability']} as a disability. 
                        I bank with {$staffInfo['bank_name']}, with an account number {$staffInfo['account_number']} and account name {$staffInfo['account_name']}
                    </p>
                    <p>
                        I can be reached at {$staffInfo['address']}, {$staffInfo['phone']}
                        or {$staffInfo['email']}.
                    </p>
                    <p>
                        Also my Next of kin {$staffInfo['next_of_kin_name']}, can be reached at {$staffInfo['next_of_kin_address']}, {$staffInfo['next_of_kin_telephone']} or
                        {$staffInfo['next_of_kin_email']}
                    </p>
                </div>
            </div>
               
            ";
        }

        header("Content-type: application/json");
        echo json_encode($response);
        exit;
    }
}
?>