<?php

include "template.php";
include "query.php";

head();

?>


    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table-bordered table-striped">
                    <div class="caption">CLIENT STATISTICS</div>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Prospect</td>
                            <td>100</td>
                        </tr>

                        <tr>
                            <td>Customers</td>
                            <td>59</td>
                            <td>
                                <table class="table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Active</td>
                                            <td>40</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>Inactive</td>
                                            <td>17</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <span class="heading-progress"><h3>Customer to Prospect Ratio</h3></span>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" role="progressbar"
                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                     style="width: 95%;">
                    <span class="sr-only">95% Complete (Sucess)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <span class="heading-progress"><h3>Active to Inactive Customers Ratio</h3></span>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" role="progressbar"
                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                     style="width: 95%;">
                    <span class="sr-only">95% Complete (Sucess)</span>
                </div>
            </div>
        </div>
    </div>



<?php
footer();

?>