<?php
include "query.php";
$query = new Querys();

function showSelected($info, $text){
    return $info === $text ? 'selected' : '';
}

if(isset($_POST)){
    $id = $_POST['id'];

    $customerInfo = $query->customerEdit($id);
    foreach($customerInfo as $clientInfo) {
        $response = "
            <form class='horizontal-form col-xs-offset-1 col-xs-10' id='edit-form' name='edit-form' role='form' method='POST' action='editinfoaction.php'>
                <div class='label-input col-xs-12'>
                    <label for='customerid'> Customer ID</label>
                    <input type='text' class='form-control' id='customerid' name='customerid' value='{$clientInfo['customer_id']}'>
                </div>

                <div class='label-input col-xs-12' >
                    <label for='customername'> Customer Name</label>
                    <input type='text' class='form-control' id='customername' name='customername' value='{$clientInfo['customer_name']}'>
                </div>

                <div class='label-input col-xs-12'>
                    <label for= 'address'> Address </label>
                    <input type='text' class='form-control' id='address' name='address' value='{$clientInfo['address']}'>
                </div>

                <div class='label-input col-xs-12'>
                    <label for='email'>Email</label>
                    <input type='text' class='form-control' id='email' name='email' value='{$clientInfo['email']}'>
                </div>

                <div class='label-input col-xs-12'>
                    <label for='phone'> Phone</label>
                    <input type='text' class='form-control' id='phone' name='phone' value='{$clientInfo['phone']}'>
                </div>

                <div class='label-input col-xs-6'>
                    <select id='usedservice' name='usedservice' class='form-control' form='edit-form'>
                        <option value='iLite' ".showSelected($clientInfo['service'], 'iLite').">iLite</option>
                        <option value='Digital' ".showSelected($clientInfo['service'], 'Digital').">Digital</option>
                        <option value='Silver' ".showSelected($clientInfo['service'], 'Silver').">Silver</option>
                        <option value='Premium' ".showSelected($clientInfo['service'], 'Premium').">Premium</option>
                    </select>
                </div>

                <div class='label-input col-xs-6'>
                    <select id='usedbandwidth' name='usedbandwidth' class='form-control' form='edit-form'>
                        <option value='Shared - 1Mbps/1Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 1Mbps/1Mbps').">Shared - 1Mbps/1Mbps </option>
                        <option value='Shared - 2Mbps/2Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 2Mbps/2Mbps').">Shared - 2Mbps/2Mbps </option>
                        <option value='Shared - 3Mbps/3Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 3Mbps/3Mbps').">Shared - 3Mbps/3Mbps </option> 
                        <option value='Shared - 4Mbps/4Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 4Mbps/4Mbps').">Shared - 4Mbps/4Mbps </option>
                        <option value='Shared - 5Mbps/5Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 5Mbps/5Mbps').">Shared - 5Mbps/5Mbps </option>
                        <option value='Shared - 6Mbps/6Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 6Mbps/6Mbps').">Shared - 6Mbps/6Mbps </option>
                        <option value='Shared - 7Mbps/7Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 7Mbps/7Mbps').">Shared - 7Mbps/7Mbps </option>
                        <option value='Shared - 10Mbps/10Mbps' ".showSelected($clientInfo['bandwidth'], 'Shared - 10Mbps/10Mbps').">Shared - 10Mbps/10Mbps </option>
                        <option value='Dedicated - 1Mbps/1Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 1Mbps/1Mbps').">Dedicated - 1Mbps/1Mbps </option>
                        <option value='Dedicated - 2Mbps/2Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 2Mbps/2Mbps').">Dedicated - 2Mbps/2Mbps </option>
                        <option value='Dedicated - 4Mbps/4Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 4Mbps/4Mbps').">Dedicated - 4Mbps/4Mbps </option>
                        <option value='Dedicated - 5Mbps/5Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 5Mbps/5Mbps').">Dedicated - 5Mbps/5Mbps </option>
                        <option value='Dedicated - 6Mbps/6Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 6Mbps/6Mbps').">Dedicated - 6Mbps/6Mbps </option>
                        <option value='Dedicated - 7Mbps/7Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 7Mbps/7Mbps').">Dedicated - 7Mbps/7Mbps </option>
                        <option value='Dedicated - 10Mbps/10Mbps' ".showSelected($clientInfo['bandwidth'], 'Dedicated - 10Mbps/10Mbps').">Dedicated - 10Mbps/10Mbps </option>
                    </select>
                </div>

                <div class='label-input'>
                    <input type='hidden' class='form-control' id='id' name='id' value='{$clientInfo['id']}'>
                    <button type='button' class='form-control col-xs-4 btn-success' id='submit' name='submit'>Submit</button>
                </div>
            </form>
    ";

        header('Content-type: application/json');
        echo json_encode($response);
        exit;
    }

};
?>