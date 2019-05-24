<?php
include "template.php";
include "../query.php";
            head();
            $technicianName = $_GET['technician_name'];
            
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Customer_ID</th>
                            <th>Customer Name</th>
                            <th>Splitter Location</th>
                            <th>Modem Number</th>
                            <th>IP Address</th>
                            <th>Technician Name</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                 $query = new Querys();
                $result = $query->techStat($technicianName);
                // var_dump($result);
                // exit;
                foreach($result as $clientInfo){
            ?>
                <tr>
                    <td><?php echo $clientInfo['id']; ?></td>
                    <td><?php echo $clientInfo['customer_id']; ?></td>
                    <td><?php echo $clientInfo['customer_name']; ?></td>
                    <td><?php echo $clientInfo['location']; ?></td>
                    <td><?php echo $clientInfo['modem_no']; ?></td>
                    <td><?php echo $clientInfo['ip_address']; ?></td>
                    <td><?php echo $clientInfo['technician_name']; ?></td>
                </tr>        
            <?php
            }
            ?>
                    </tbody>
                </table>
            </div>
            <?php
            footer();
            ?>
            </div>

            <!-- for the market directory -->
            <script src="../jquery-3.3.1.min.js"></script>
            <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
            <script src="../bootbox.min.js"></script>
            <script src="../jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
        </body>
    </html>
