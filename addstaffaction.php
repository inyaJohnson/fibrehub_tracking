<?php
include "db.php";

define('IMAGEPATH', 'image/');

if(isset($_POST) && isset($_FILES)){  
    // if(!empty($_POST) && !empty($_FILES)){
        $addingStaff = new AddStaff();
        if($addingStaff->staffValidation($_POST)){
            $response = ['status' => 1,
                'message' => "<div style='color:red; font-weight:bold;'>A Staff Already exist with this email</div>",];
            }else{
                if($addingStaff->addStaffData($_POST, $_FILES)){
                    $addingStaff->profilePictureValidation($_FILES);
                    $response = ['status' => 1,
                    'message' => "<div style='color:green; font-weight:bold;'>Staff Successfully Added to Database</div>",];
                }else{
                    $response =['status' => 0,
                    'message' => "<div style='color:red; font-weight:bold;'>Error Occured while adding Staff info</div>"];
                }
            }
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    // }
}


class AddStaff{
    protected $db;
    function __construct(){
        $this->db = new DataBase();
    }

    public function addStaffData(array $data, array $data2){
        // PERSONAL_INFO
        $lastName = $data['lastname'];
        $otherNames = $data['othernames'];
        $sex = $data['sex'];
        $status = $data['status'];
        $dof = $data['dof'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        $state = $data['state'];
        $profilePicture = $data2['profilepicture']['name'];
        // HEALTH_INFO
        $disability = $data['disability'];
        $bloodGroup = $data['bloodgroup'];
        $genotype = $data['genotype'];
        $allergy = $data['allergy'];
        
        //NEXT_OF_KIN_INFO
        $nextOfKinName = $data['nextofkinname'];
        $nextOfKinTelephone = $data['nextofkintelephone'];
        $nextOfKinEmail = $data['nextofkinemail'];
        $nextOfKinAddress = $data['nextofkinaddress'];

        // BANK_INFO
        $accountName = $data['accountname'];
        $accountNumber = $data['accountnumber'];
        $bankName = $data['bankname'];

        //EMPLOYMENT_INFO
        $employerName = $data['employername'];
        $role = $data['role'];
        $dateOfEmployment = $data['dateofemployment'];
        $department = $data['department'];
        $workTools = $data['worktools'];


        $query = "INSERT INTO staff_personal_info(last_name, other_names, sex, status, dof, email, phone, address, state, profile_picture) " .
        "VALUES('$lastName', '$otherNames', '$sex', '$status', '$dof', '$email', '$phone', '$address', '$state', '$profilePicture');";

        $query .= "INSERT INTO staff_health_info(disability, blood_group, genotype, allergy, staff_id) " .
        "VALUES('$disability', '$bloodGroup', '$genotype', '$allergy', (SELECT staff_id FROM staff_personal_info WHERE email = '$email' ));";
        
        $query .= "INSERT INTO staff_next_of_kin_info(next_of_kin_name, next_of_kin_telephone, next_of_kin_email, next_of_kin_address, staff_id) " .
        "VALUES('$nextOfKinName', '$nextOfKinTelephone', '$nextOfKinEmail', '$nextOfKinAddress', (SELECT staff_id FROM staff_personal_info WHERE email ='$email'));";

        $query .= "INSERT INTO staff_bank_info(account_name, account_number, bank_name, staff_id) " .
        "VALUE('$accountName', '$accountNumber', '$bankName', (SELECT staff_id FROM staff_personal_info WHERE email ='$email'));";

        $query .= "INSERT INTO staff_employment_info(employer_name, role, date_of_employment, department, worktool, staff_id) " .
        "VALUES('$employerName', '$role', '$dateOfEmployment', '$department', '$workTools', (SELECT staff_id FROM staff_personal_info WHERE email ='$email'))";

        $result = $this->db->insert($query);
        return $result;

    }

    public function profilePictureValidation(array $data2){
        $profilePicture = $_FILES['profilepicture']['name'];
        $profilePictureExtension = strtolower(substr($profilePicture, strpos($profilePicture, '.') + 1));
        $profilePictureSize = $_FILES['profilepicture']['size'];
        $maxFileSize = 2097152;
        $target = IMAGEPATH.$profilePicture;

        if(($profilePictureExtension == 'jpeg' || $profilePictureExtension == 'jpg' || $profilePictureExtension == 'png') &&
        ($profilePictureSize > 0 && $profilePictureSize <= $maxFileSize)){
            move_uploaded_file($_FILES['profilepicture']['tmp_name'], $target);
        }
    }

    public function staffValidation(array $data){
        $email = $data['email'];
        $query ="SELECT * FROM staff_personal_info WHERE email = '$email'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>