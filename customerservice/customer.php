<?php
session_start();
function customer(){
    head();

    ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Customer Info</th>
                <th>Due Date</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if(empty($_POST['search'])){
                customerList();
            }else{
                $searchResult = dataSearch($_POST);
                customersPageIfSearch($searchResult);
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php
    footer();
    ?>
    <div class='modal fade payment-modal' id='payment' role='dialog' data-backdrop='false'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' style='color:red;'>&times;</button>
                    <h4 class='modal-title'><i class='fa fa-credit-card'></i>Payment History</h4>
                </div>
                <div class='modal-body'>
                    <h3 id='id' style='font-weight:bold;'></h3>
                    <h4 id='name' style='font-weight:bold;'></h4>
                    <button type='button' class='btn btn-primary btn-md add-payment' id="<?php echo "add-payment{$clientInfo['id']}";?>" name="<?php echo"add-payment{$clientInfo['id']}";?>" data-id ="<?php echo"{$clientInfo['id']}";?>" data-toggle='modal' data-target='#add-payment-detail'>+Add New Payment</button>
                    <div id='tbody'></div>
                </div>

                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class='modal fade add-payment-detail' id='add-payment-detail' role='dialog' data-backdrop='false'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' style='color:red;'>&times;</button>
                    <h4 class='modal-title'><i class='fa fa-credit-card'></i>Payment History</h4>
                </div>
                <div class='modal-body'>
                    <div class='row'>
                        <form class='horizontal-form add-payment-form col-xs-offset-1 col-xs-10' id='add-payment-form' name='add-payment-form' action ='addpayment.php' role='form'>
                            <div class='col-xs-12'>
                                <h3>Add Payment</h3>
                            </div>
                            <div class='col-xs-6 add-payment-form-input'>
                                <select id='usedservice' name='usedservice' class='form-control' form="add-payment-form">
                                    <option value=''>Select a Service</option>
                                    <option value='iLite'>iLite</option>
                                    <option value='Digital'>Digital</option>
                                    <option value='Silver'>Silver</option>
                                    <option value='Premium'>Premium</option>
                                </select>
                            </div>

                            <div class='col-xs-6 add-payment-form-input'>
                                <select id='usedbandwidth' name='usedbandwidth' class='form-control' form="add-payment-form">
                                    <option value=''>- Select Bandwidth - </option>
                                    <option value='Shared - 1Mbps/1Mbps'>Shared - 1Mbps/1Mbps </option>
                                    <option value='Shared - 2Mbps/2Mbps'>Shared - 2Mbps/2Mbps </option>
                                    <option value='Shared - 3Mbps/3Mbps'>Shared - 3Mbps/3Mbps </option>
                                    <option value='Shared - 4Mbps/4Mbps'>Shared - 4Mbps/4Mbps </option>
                                    <option value='Shared - 5Mbps/5Mbps'>Shared - 5Mbps/5Mbps </option>
                                    <option value='Shared - 6Mbps/6Mbps'>Shared - 6Mbps/6Mbps </option>
                                    <option value='Shared - 7Mbps/7Mbps'>Shared - 7Mbps/7Mbps </option>
                                    <option value='Shared - 10Mbps/10Mbps'>Shared - 10Mbps/10Mbps </option>
                                    <option value='Dedicated - 2Mbps/2Mbps'>Dedicated - 1Mbps/1Mbps </option>
                                    <option value='Dedicated - 2Mbps/2Mbps'>Dedicated - 2Mbps/2Mbps </option>
                                    <option value='Dedicated - 4Mbps/4Mbps'>Dedicated - 4Mbps/4Mbps </option>
                                    <option value='Dedicated - 5Mbps/5Mbps'>Dedicated - 5Mbps/5Mbps </option>
                                    <option value='Dedicated - 6Mbps/6Mbps'>Dedicated - 6Mbps/6Mbps </option>
                                    <option value='Dedicated - 7Mbps/7Mbps'>Dedicated - 7Mbps/7Mbps </option>
                                    <option value='Dedicated - 10Mbps/10Mbps'>Dedicated - 10Mbps/10Mbps </option>
                                </select>
                            </div>

                            <div class='col-xs-6 add-payment-form-input '>
                                <input type='text' class='form-control' id='amount' name='amount' placeholder='Amount (₦)'>
                            </div>

                            <div class='col-xs-6 add-payment-form-input'>
                                <input type='text' class='form-control' id='outstanding' name='outstanding' placeholder='Outstanding (₦)'>
                            </div>

                            <div class='col-xs-6 add-payment-form-input'>
                                <input type='text' class='form-control' id='paydate' name='paydate' placeholder=' Date Paid(dd/mm/yyyy)'>
                            </div>

                            <div class='col-xs-6 add-payment-form-input'>
                                <input type='text' class='form-control' id='duedate' name='duedate' placeholder=' Due Date(dd/mm/yyyy)'>
                            </div>

                            <div class='col-xs-6'>
                                <input type='submit' class='form-control btn-success' id='submit' name='submit' value='Submit'>
                            </div>
                        </form>
                    </div>
                </div>

                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade edit-info" id="edit-info" role="dialog" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style='color:red;'>&times;</button>
                    <h4 class='modal-title'><i class='fa fa-edit'></i>Edit Customer Info</h4>
                </div>
                <div class="modal-body" id="edit-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade full-info" id="full-info" role="dialog" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style='color:red;'>&times;</button>
                    <h4 class='modal-title'><i class='fa fa-edit'></i>Customer Info</h4>
                </div>
                <div class="modal-body" id="info-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
    <script src="../jquery-ui.js"></script>
    <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="../bootbox.min.js"></script>
    <script src="../jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.payment').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "payment.php",
                    data: {id:id},
                    success: function(response){
                        $('#id').html(response.id);
                        $('#name').html(response.name);
                        $('#tbody').html(response.value);
                        $('#payment').modal('show');
                    }
                })
            });

            $.validator.addMethod("notEqual", function(value, element, param){
                return param !== value;
            }, "Value must not equal the param.");

            $('#add-payment-form').validate({
                rules:{
                    usedservice:{
                        notEqual : ""
                    },

                    usedbandwidth:{
                        notEqual : ""
                    },

                    amount:{
                        required: true
                    },

                    outstanding:{
                        required: true
                    },

                    paydate:{
                        required: true
                    },

                    duedate:{
                        required: true
                    },
                },

                messages:{
                    usedservice:{
                        notEqual: "Please select the service"
                    },

                    usedbandwidth:{
                        notEqual: "Please select the bandwidth"
                    },
                },

                submitHandler:function(form){
                    $.ajax({
                        type:"POST",
                        url: "addpayment.php",
                        data: $("#add-payment-form").serialize(),
                        success: function(response){
                            bootbox.alert(response.message, function () {
                                $('.add-payment-detail, .payment-modal').modal('hide');
                            });

                        }
                    })
                }

            });
//                    function testAlert(text){
//                        alert(text);
//                    }

            $('#payment').on('click', '.delete-payment', function(){
                // $('#add-payment.delete-payment').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "deletepayment.php",
                    data: {id:id},
                    success: function(response){
                        //ADD RRESPONSE TO THE
                        bootbox.alert(response.message, function () {
                            $('.payment-modal').modal('hide');
                        });
                    }
                })
            });


            $('#payment').on('click', '.send-acknowledgement', function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "acknowledgement.php",
                    data: {id:id},
                    success: function(response){
                        bootbox.alert(response.message, function () {
                            $('.payment-modal').modal('hide');
                        });
                    }
                })
            });


            $('.edit').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "editinfo.php",
                    data: {id:id},
                    success: function(response){
                        //ADD RRESPONSE TO THE
                        if(response){
                            $('#edit-body').html(response);
                            $('#edit-info').modal('show');
                        }
                    }
                })
            });

            $("#edit-body").on("click", "#submit", function(){
                // console.log($("#edit-form").serialize());
                $.ajax({
                    type: "POST",
                    url: $("#edit-form").attr("action"),
                    data: $("#edit-form").serialize(),
                    success: function(response){
                        //ADD RRESPONSE TO THE
                        bootbox.alert(response.message);
                    }
                })

            });

            $(".info").click(function (){
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "customerinfo.php",
                    data: {id:id},
                    success: function(response){
                        //ADD RRESPONSE TO THE
                        $("#info-body").html(response);
                        $(".full-info").modal('show');
                    }
                })

            });

        });
    </script>
    <script>
        $( function() {
            $( "#paydate, #duedate" ).datepicker();
        } );
    </script>


    </body>
    </html>
    <?php
};

function customerList(){
$query = new Querys();
$result = $query->customer();
foreach($result as $clientInfo){
$result2 =$query->customerPaymentHistoryView($clientInfo['id']);
foreach($result2 as $clientInfo2);
// var_dump($clientInfo2);
// exit;
$dueDate = strtotime($clientInfo2['due_date']);
$now = strtotime(date("m/d/Y"));
$daysLeft = calculateDueDate($dueDate, $now);
$daysLeftInFigure = dueDateFigure($dueDate, $now);
?>
<tr>
    <td><?php echo $clientInfo['id']?></td>
    <td>
        <strong ><?php
            if($daysLeftInFigure > 5){
                echo "<div style='color: rgb(0, 175, 0);'>{$clientInfo['customer_id']}</div>";
            }elseif(($daysLeftInFigure <= 5) && ($daysLeftInFigure > 0)){
                echo "<div style='color:rgb(255, 175, 0)'>{$clientInfo['customer_id']}</div>";
            }else{
                echo "<div style='color: rgb(255, 0, 0);'>{$clientInfo['customer_id']}</div>";
            }
            echo"</strong><br />
                    <button type='button' class='btn btn-primary btn-xs payment' id='payment{$clientInfo['id']}' name='payment{$clientInfo['id']}' data-id ='{$clientInfo['id']}' data-toggle='modal' data-target='#payment'>Payment</button>
                    <button type='button' class='btn btn-default btn-xs edit' id='edit{$clientInfo['id']}' name='edit{$clientInfo['id']}' data-id='{$clientInfo['id']}' data-toggle='modal' data-target='#edit-info'>Edit-Info</button>
                </td>
                <td>{$clientInfo['customer_name']}</td>
                <td>{$clientInfo['address']}</td>
                <td>{$clientInfo['email']}</td>
                <td>{$clientInfo['phone']}</td>
                <td><button type='button' class='btn btn-primary btn-md info' id='info{$clientInfo['id']}' name='info{$clientInfo['id']}' data-id ='{$clientInfo['id']}' data-toggle='modal' data-target='#full-info'> {$clientInfo['customer_id']} Info</button></td>
                <td>$daysLeft</td>
            </tr>   
        ";
            }
            };

            function calculateDueDate($dueDate, $now){

                if($dueDate >= $now){
                    $diff = abs($dueDate - $now);
                    $years = floor($diff/(365*60*60*24));
                    $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
                    $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    $result = "{$years} years,  {$months} months, {$days} days";
                }else{
                    $diff = abs($now - $dueDate);
                    $years = floor($diff/(365*60*60*24));
                    $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
                    $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    $result = "<div style='color:red;'>Expired {$years} years,  {$months} months, {$days} days</div>";
                }
                return $result;
            }

            function dueDateFigure($dueDate, $now){
                if($dueDate >= $now){
                    $diff = abs($dueDate - $now);
                    $years = floor($diff/(365*60*60*24));
                    $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
                    $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    $result = floor(($years*365) + ($months * 30) + $days);
                }else{
                    $diff = abs($now - $dueDate);
                    $years = floor($diff/(365*60*60*24));
                    $months = floor(($diff - $years*365*60*60*24)/ (30*60*60*24));
                    $days = floor (($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                    $result = -(floor(($years*365) + ($months * 30) + $days));
                }
                return $result;
            }


            function dataSearch(array $data){
                $searchWords = explode(' ', $data['search']);
                $temp = $result = [];
                foreach ($searchWords as $word) {
                    $query = new Querys();
                    $temp[] = $query->customerSearch($word);
                }

                foreach($temp as $resultSet) {
                    foreach($resultSet as $record) {
                        if(!in_array($record, $result)){
                            $result[] = $record;
                        }
                    }
                }
                return $result;

            }


            function customersPageIfSearch($resultFromSearch){
            if(!empty($resultFromSearch)){
            foreach($resultFromSearch as $clientInfo){
            $query = new Querys();
            $result2 =$query->customerPaymentHistoryView($clientInfo['id']);
            foreach($result2 as $clientInfo2);
            $dueDate = strtotime($clientInfo2['due_date']);
            $now = strtotime(date("m/d/Y"));
            $daysLeft = calculateDueDate($dueDate, $now);
            $daysLeftInFigure = dueDateFigure($dueDate, $now);
            ?>
<tr>
    <td><?php echo $clientInfo['id']?></td>
    <td>
        <strong ><?php
            if($daysLeftInFigure > 5){
                echo "<div style='color: rgb(0, 175, 0);'>{$clientInfo['customer_id']}</div>";
            }elseif(($daysLeftInFigure <= 5) && ($daysLeftInFigure > 0)){
                echo "<div style='color:rgb(255, 175, 0)'>{$clientInfo['customer_id']}</div>";
            }else{
                echo "<div style='color: rgb(255, 0, 0);'>{$clientInfo['customer_id']}</div>";
            }
            echo"</strong><br />
                        <button type='button' class='btn btn-primary btn-xs payment' id='payment{$clientInfo['id']}' name='payment{$clientInfo['id']}' data-id ='{$clientInfo['id']}' data-toggle='modal' data-target='#payment'>Payment</button>
                        <button type='button' class='btn btn-default btn-xs edit' id='edit{$clientInfo['id']}' name='edit{$clientInfo['id']}' data-id='{$clientInfo['id']}' data-toggle='modal' data-target='#edit-info'>Edit-Info</button>
                    </td>
                    <td>{$clientInfo['customer_name']}</td>
                    <td>{$clientInfo['address']}</td>
                    <td>{$clientInfo['email']}</td>
                    <td>{$clientInfo['phone']}</td>
                    <td><button type='button' class='btn btn-primary btn-md info' id='info{$clientInfo['id']}' name='info{$clientInfo['id']}' data-id ='{$clientInfo['id']}' data-toggle='modal' data-target='#full-info'>{$clientInfo['customer_id']} Info</button></td>
                    <td>$daysLeft</td>
                </tr>   
            ";
            }
            }else{
                echo"
        <tr>
            <td>
                <div id='header' class='text-center text-danger'> 
                    NO RESULT FOUND
                </div>
            </td>
        </tr>
        ";

            }
            }

            ?>
       