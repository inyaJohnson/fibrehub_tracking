<?php
include "query.php";
if(isset($_POST)){
    $prospect = new Account();
    $info = $prospect->prospectInfo($_POST);
    // unset($info['organisation_name']);
    $id = $info['prospect_id']; 
     
    ob_start();
    include "mailbody.php";
    $output = ob_get_contents();
    ob_end_clean();
    
    $prospect->customerRegistrationMail($html, $id);

}

class Account{
    protected $db;
    protected $html; 
    protected $query;
    

    public function __construct(){
         $this->db = new DataBase();
         $this->query = new Querys();

    }

    public function prospectInfo(array $data){
        $prospectID = $data['id'];
        $result = $this->query->techMail($prospectID);
        // var_dump($result);
        foreach($result as $paidProspect){ 
            $id = $paidProspect['prospect_id']; 
        }
    }

    public function customerRegistrationMail($html, $id){
        $to = 'techsupport@fibrehub.com.ng';
        $subject = 'New Customer Registration';
        $message = $html;
        $from = 'account@fibrehub.com.ng';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'From:' . $from;
        if(mail($to, $subject, $message, $headers) && $this->query->deleteProspect($id)){
                $response = [
                    'status' => 1,
                    'message' => "<div class='text-success' style='font-weight: bold;' >Operation Successful</div>",
                ];
        }else{
                $response = [
                    'status' => 0,
                    'message' => "<div class='text-danger' style='font-weight: bold;' >Operation Failed</div>",
                ];
        }
    
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }

}
?>