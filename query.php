<?php
include "db.php";

class Querys{
    public $db;

    public function __construct(){
        $this->db = new DataBase(); 
    }

    // FUNCTION TO SELECT ALL THE MARKETERS & PROSPECT INFO WHICH THE MARKETER HANDLES
    public function prospect(){
        $query ="SELECT P.*, O.*, M.* FROM prospect_info P " .
        "INNER JOIN organisation_info O ON P.prospect_id = O.prospect_id " .
        "INNER JOIN marketer_info M ON P.prospect_id = M.prospect_id ";;
        $result = $this->db->select($query);
        return $result;
    }

    //FUNCTION TO SELECT ALL THE PROSPECT & MARKETER INFO
    public function marketer(){
        $query ="SELECT DISTINCT marketer_name FROM marketer_info;";
        $result = $this->db->select($query);
        return $result;
    }


    //FUNCTION TO SELECT ALL THE CUSTOMER & TECHNICIAN INFO
    public function tech(){
        $query ="SELECT DISTINCT technician_name FROM technician_info;";
        $result = $this->db->select($query);
        return $result;
    }

    //FUNCTION TO SELECT ALL THE CUSTOMER & TECHNICIAN INFO
    public function customer(){
        $query ="SELECT C.*, S.*, T.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "INNER JOIN technician_info T ON C.id = T.id ";
        $result = $this->db->select($query);
        return $result;
    }


    // FUNCTION TO SELECT ALL THE MARKETERS & PROSPECT INFO WHICH THE MARKETER HANDLES
    public function marketerStat($marketerName){
        $query ="SELECT P.*, O.*, M.* FROM prospect_info P " .
        "INNER JOIN organisation_info O ON P.prospect_id = O.prospect_id " .
        "INNER JOIN marketer_info M ON P.prospect_id = M.prospect_id " .
        "WHERE  M.marketer_name= '$marketerName'";
        $result = $this->db->select($query);
        return $result;
    }

    // FUNCTION TO SELECT ALL THE TECHNICIANS & CUSTOMER INFO WHICH THE TECHNICIAN HANDLES
    public function techStat($technicianName){
        $query ="SELECT C.*, S.*, T.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "INNER JOIN technician_info T ON C.id = T.id " .
        "WHERE  T.technician_name= '$technicianName'";
        $result = $this->db->select($query);
        return $result;
    }

    //FUNCTION TO GET MARKETER NAME FOR THE PROSPECT FORM
    public function marketerName(){
        $query = "SELECT * FROM login where department = 'Marketing' ";
        $result = $this->db->select($query);
        return $result;
    }

    //SELECT A PROSPECT FROM THE ACCOUNT CONFIRMATION END
    public function techMail($prospectID){
        $query ="SELECT P.*, O.*, M.* FROM prospect_info P " .
        "INNER JOIN organisation_info O ON P.prospect_id = O.prospect_id " .
        "INNER JOIN marketer_info M ON P.prospect_id = M.prospect_id " .
        "WHERE  P.prospect_id= '$prospectID'";
        $result = $this->db->select($query);
        return $result;
    }

    //TO DELETE A PROSPECT
    public function deleteProspect($id){
        $query ="DELETE M.* FROM marketer_info M WHERE  M.prospect_id= $id;";
        $query .="DELETE O.* FROM organisation_info O WHERE  O.prospect_id= $id;";
        $query .="DELETE P.* FROM prospect_info P WHERE  P.prospect_id= $id";
        $result = $this->db->delete($query);
        return $result;
    }

    //SELECT ALL THE USER GIVEN ACCESS TO THE DATABASE
    public function userList(){
        $query = "SELECT * FROM login";
        $result = $this->db->select($query);
        return $result;
    }

    //OBSERVE THE DIFFERNCE BETWEEN A MULTIPLY DELETE AND SINGLE DELETE ESPCIALLY THE ASTERIKS *
    public function removeUser($userId){
        $query = "DELETE FROM login WHERE user_id = $userId";
        $result = $this->db->singleDelete($query);
        return $result;
    }

    //SELECT ALL THE STAFF OF THE ORGANISATION
    public function staffList(){
        $query = "SELECT SPI.*, SEI.* FROM staff_personal_info SPI " .
        "INNER JOIN staff_employment_info SEI ON SPI.staff_id = SEI.staff_id";
        $result = $this->db->select($query);
        return $result;
    }

    //OBSERVE THE DIFFERNCE BETWEEN A MULTIPLY DELETE AND SINGLE DELETE ESPCIALLY THE ASTERIKS *
    public function removeStaff($staffId){
        $query ="DELETE SEI.* FROM staff_employment_info SEI WHERE  SEI.staff_id= $staffId;";
        $query .="DELETE SBI.* FROM staff_bank_info SBI WHERE  SBI.staff_id= $staffId;";
        $query .="DELETE SNI.* FROM staff_next_of_kin_info SNI WHERE  SNI.staff_id= $staffId;";
        $query .="DELETE SHI.* FROM staff_health_info SHI WHERE  SHI.staff_id= $staffId;";
        $query .="DELETE SPI.* FROM staff_personal_info SPI WHERE  SPI.staff_id= $staffId;";
        $result = $this->db->delete($query);
        return $result;
    }

    //JOINT SELECT

    public function showProfile($staffId){
        $query = "SELECT SPI.*, SHI.*, SNI.*, SBI.*, SEI.* FROM staff_personal_info SPI " .
        "INNER JOIN staff_health_info SHI ON SPI.staff_id = SHI.staff_id " . 
        "INNER JOIN staff_next_of_kin_info SNI ON SPI.staff_id = SNI.staff_id " .
        "INNER JOIN staff_bank_info SBI ON SPI.staff_id = SBI.staff_id " .
        "INNER JOIN staff_employment_info SEI ON SPI.staff_id = SEI.staff_id " .
        "WHERE SPI.staff_id = $staffId";
        $result = $this->db->select($query);
        return $result;
    }
   

    //INSERT NEW PRROSPECT DATA
    public function addProspect(array $data){
        $query = "INSERT INTO prospect_info(first_name, last_name, email, phone, address, contact_date) " .
        " VALUES('{$data['firstname']}', '{$data['lastname']}', '{$data['email']}', '{$data['phone']}', '{$data['address']}', now());";

        $query .= "INSERT INTO organisation_info(organisation_name, organisation_email, organisation_telephone, prospect_id) " .
        " VALUES('{$data['organisationname']}', '{$data['organisationemail']}', '{$data['organisationtelephone']}',(select prospect_id from prospect_info where email ='{$data['email']}'));";

        $query .= "INSERT INTO marketer_info(marketer_name, marketer_email, prospect_id) " .
        " VALUES('{$data['marketername']}', '{$data['marketeremail']}', (select prospect_id from prospect_info where email ='{$data['email']}'))";
        $result = $this->db->insert($query);
        return $result;
    }

    /* CHECKING FOR EXISTING PROSPECT AND USERS IN THE DATABASE */
    //SELECT A PROSPECT FROM THE VIA MAIL
    public function prospectEmailCheck($newProspectEmail){
        $query ="SELECT P.*, O.*, M.* FROM prospect_info P " .
        "INNER JOIN organisation_info O ON P.prospect_id = O.prospect_id " .
        "INNER JOIN marketer_info M ON P.prospect_id = M.prospect_id " .
        "WHERE  P.email= '$newProspectEmail'";
        $result = $this->db->select($query);
        return $result;
    }

    //INSERT NEW CUSTOMER DATA
    public function addCustomer(array $data){
        $query = "INSERT INTO customer_info(customer_id, customer_name , email, phone, address) " .
        " VALUES('{$data['customerid']}', '{$data['customername']}', '{$data['email']}', '{$data['phone']}', '{$data['address']}');";

        $query .= "INSERT INTO service_info(service, bandwidth, location, cloud_no, modem_no, ip_address, id) " .
        " VALUES('{$data['service']}', '{$data['bandwidth']}', '{$data['location']}', '{$data['cloudno']}', '{$data['modemno']}', '{$data['ip']}', (select id from customer_info where customer_id ='{$data['customerid']}'));";

        $query .= "INSERT INTO technician_info(technician_name, technician_email, id) " .
        " VALUES('{$data['technicianname']}', '{$data['technicianemail']}', (select id from customer_info where customer_id = '{$data['customerid']}' ));";
        
        $query .= "INSERT INTO customer_marketer(customer_marketer_name, id) " .
        "VALUE('{$data['marketername']}', (select id from customer_info where customer_id = '{$data['customerid']}' )) ;";

        $query .= "INSERT INTO payment_info(pay_date, due_date, amount, outstanding,  id) " .
        "VALUE('00/00/0000', '00/00/0000', '0.00', '0.00', (select id from customer_info where customer_id = '{$data['customerid']}' ))";

        $result = $this->db->insert($query);
        return $result;
    }

    // CUSTOMER VALIDATION FROM THE VIA MAIL
    public function customerIdCheck($newCustomerId){
        $query ="SELECT C.* FROM customer_info C " .
        "WHERE  C.customer_id= '$newCustomerId'";
        $result = $this->db->select($query);
        return $result;
    }

    // CUSTOMER VALIDATION FROM THE VIA MAIL
    public function customerEdit($id){
        $query ="SELECT C.*, S.*, T.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "INNER JOIN technician_info T ON C.id = T.id " .
        "WHERE  C.id= '$id'";
        $result = $this->db->select($query);
        return $result;
    }

     // CUSTOMER VALIDATION FROM THE VIA MAIL
     public function customerFullInfo($id){
        $query ="SELECT C.*, S.*, T.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "INNER JOIN technician_info T ON C.id = T.id " .
        "WHERE  C.id= '$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }


    /*...............................SEARCH QUERIES....................................... */
    public function prospectSearch($search) { 
        $query = "SELECT P.*, O.*, M.* FROM prospect_info P " . 
        " INNER JOIN organisation_info O ON P.prospect_id = O.prospect_id " .
        " INNER JOIN marketer_info  M ON P.prospect_id = M.prospect_id " . 
        " WHERE " .
        "P.prospect_id LIKE '%$search%' OR P.first_name LIKE '%$search%' OR P.last_name LIKE '%$search%' " .
        "OR P.address LIKE '%$search%' OR P.email LIKE '%$search%' OR P.phone LIKE '%$search%' " .
        "OR O.organisation_id LIKE '%$search%' OR O.organisation_name LIKE '%$search%' OR O.organisation_email LIKE '%$search%' " . 
        "OR O.organisation_telephone LIKE '%$search%' OR O.prospect_id LIKE '%$search%' " .
        "OR M.marketer_id LIKE '%$search% 'OR M.marketer_name LIKE '%$search%' OR M.marketer_email LIKE '%$search%' OR M.prospect_id LIKE '%$search%'"; 
        return $this->db->select($query);
    }


    public function marketerSearch($search){
        $query = "SELECT DISTINCT MI.marketer_name FROM marketer_info MI WHERE " .
        "MI.marketer_name LIKE '%$search%'";
        return $this->db->select($query); 
    }

    public function technicianSearch($search){
        $query = "SELECT DISTINCT TI.technician_name FROM technician_info TI WHERE " .
        "TI.technician_name LIKE '%$search%'";
        return $this->db->select($query); 
    }
    
    // public function customerServiceSearch($search){
    //     $query = "SELECT DISTINCT user_name FROM login L WHERE " .
    //     "L.user_name LIKE '%$search%'";
    //     return $this->db->select($query); 
    // }
    public function customerSearch($search) { 
        $query ="SELECT C.*, S.*, T.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "INNER JOIN technician_info T ON C.id = T.id " .
        "WHERE " .
        "C.id LIKE '%$search%' OR C.customer_id LIKE '%$search%' OR C.customer_name LIKE '%$search%' " .
        "OR C.address LIKE '%$search%' OR C.email LIKE '%$search%' OR C.phone LIKE '%$search%' " .
        "OR S.id LIKE '%$search%' OR S.service_id LIKE '%$search%' OR S.service LIKE '%$search%' " . 
        "OR S.bandwidth LIKE '%$search%' OR S.location LIKE '%$search%' OR S.cloud_no LIKE '%$search%' OR S.modem_no LIKE '%$search%'" .
        "OR T.id LIKE '%$search% 'OR T.technician_name LIKE '%$search%' OR T.technician_email LIKE '%$search%' OR T.technician_id LIKE '%$search%'  "; 
        return $this->db->select($query);
    }

    //FUNCTION TO SELECT ALL THE CUSTOMER AND THE PAYMENT & TECHNICIAN INFO
    public function customerPayment($id){
        $query ="SELECT C.*, S.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "WHERE C.id = $id ";
        $result = $this->db->select($query);
        return $result;
    }

    public function customerPaymentHistory($id){
        $query ="SELECT  P.* FROM payment_info P " .
        "WHERE P.id = $id ORDER BY due_date DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function customerPaymentHistoryView($id){
        $query ="SELECT  P.* FROM payment_info P " .
        "WHERE P.id = $id ORDER BY payment_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    // DELETE PAYMENT
    public function deletePayment($id){
        $query ="DELETE FROM payment_info WHERE payment_id = $id ";
        $result = $this->db->singleDelete($query);
        return $result;
    }

    //ADD NEW PAYMENT 
    public function addNewPayment($id, array $data){
        $query = "UPDATE service_info set service = '{$data['usedservice']}', bandwidth = '{$data['usedbandwidth']}' " . 
        "WHERE id = $id ;";
        $query .= "INSERT INTO payment_info(pay_date, due_date, amount, outstanding, id) " .
        "VALUES('{$data['paydate']}','{$data['duedate']}','{$data['amount']}','{$data['outstanding']}', $id)"; 
        $result = $this->db->insert($query);
        return $result;

    }

    // NOTE INSERT QUERY WAS USED FOR UPDATE BECAUSE THEY ARE SAME
    public function editCustomer(array $data){
        $query = "UPDATE customer_info SET customer_id = '{$data['customerid']}', customer_name ='{$data['customername']}', " .
        "phone ='{$data['phone']}', email='{$data['email']}', address ='{$data['address']}' WHERE id='{$data['id']}';";
        $query .="UPDATE service_info SET service ='{$data['usedservice']}', bandwidth ='{$data['usedbandwidth']}'  WHERE id='{$data['id']}'";
        $result = $this->db->insert($query);
        return $result;
    }

    // FUNCTION TO SELECT ALL THE CUSTOMER INFO BY CUSTOMER ID 
    public function customerGeneralInfo($id){
        $query ="SELECT C.*, S.*, T.*, P.* FROM customer_info C " .
        "INNER JOIN service_info S ON C.id = S.id " .
        "INNER JOIN technician_info T ON C.id = T.id " .
        "INNER JOIN payment_info P ON C.id = P.id " .
        "WHERE  C.id= '$id' ORDER BY payment_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }


    public function customerNotification($id){
        $query ="SELECT  P.* FROM payment_info P " .
        "WHERE P.id = $id ORDER BY payment_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function removeNotification($paymentId){
        $query ="UPDATE payment_info P " .
        "SET notification = 1 WHERE P.payment_id = $paymentId";
        $result = $this->db->singleInsert($query);
        return $result;
    }

    public function acknowledge($paymentId){
        $query = "SELECT C.*, P.* FROM payment_info P " .
            "INNER JOIN customer_info C ON P.id = C.id " .
            "WHERE P.payment_id = $paymentId LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
}

?>

