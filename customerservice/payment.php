<?php 
session_start();
include "../query.php";
$query = new Querys();

if(isset($_POST)){
    $_SESSION['id'] = $_POST['id'];
    $customerInfo = $query->customerPayment($_SESSION['id']);
    foreach($customerInfo as $clientInfo);
    $paymentInfo =  $query->customerPaymentHistory($_SESSION['id']);
    
        
    foreach($paymentInfo as $payment){
        $html ="
            <div class='row' style='background: #eee; border: thin solid #aaa;'>
                <div class='table-responsive col-xs-6' >
                    <table class='table-striped table-bordered' style='margin: 20px;'>
                        <tbody>
                        <tr >
                        <td style='padding:10px;'>Paid</td>
                        <td style='padding:10px;'>{$payment['pay_date']}</td>
                        </tr>
                        <tr>
                        <td style='padding:10px;'>Expired</td>
                        <td style='padding:10px;'>{$payment['due_date']}</td>
                        </tr>
                        <tr>
                        <td style='padding:10px;'>Amount</td>
                        <td style='padding:10px;'>{$payment['amount']}</td>
                        </tr>

                        <tr>
                        <td style='padding:10px;'>Outstanding</td>
                        <td style='padding:10px;'>{$payment['outstanding']}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class='col-xs-6 text-center ' >
                    <div style='padding-top: 90px;'>
                        <button type='button' class='btn btn-success btn-md send-acknowledgement' id='acknowlegement{$payment['payment_id']}' name='acknowlegement{$payment['payment_id']}' data-id ='{$payment['payment_id']}'>Send Acknowledgement</button>
                        <button type='button' class='btn btn-danger btn-md delete-payment' id='payment{$payment['payment_id']}' name='payment{$payment['payment_id']}' data-id ='{$payment['payment_id']}'>Delete</button>
                    </div>
                </div>
            </div>
        ";
        $trans[]= $html;
    }
    $response = ['id'=> $clientInfo['customer_id'], 'name'=>$clientInfo['customer_name'], 'value' =>$trans, ];
    header('Content-type: application/json');
    echo json_encode($response);
    exit;
}
?>

 