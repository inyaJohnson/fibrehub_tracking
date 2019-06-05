<?php
function upperCase($name){
    return strtoupper($name);
}

$caps = upperCase($info['last_name']. ' ' .$info['first_name']);

if(isset($info['organisation_name'])){
    
    $organisationDetail = <<<END
    <div style ='margin-top: 15px; margin-bottom: 15px;'>
        <strong>ORGANISTION INFO</strong><br />
        Organisation Name - {$info['organisation_name']}<br />
        Organisation Email - {$info['organisation_email']}<br />
        Organisation Telephone - {$info['organisation_telephone']}<br />
    </div>
END;

}else{
    $organisationDetail = <<<END
END;

}

$html = <<<END
<html>
    <body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.5; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: justify;'>
        <div style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 680px; padding: 20px;'>
            <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate;  width: 100%; background-color: #f6f6f6; line-height: 1.5; padding: 20px;'>       
                <tbody>
                    <tr>
                        <td>
                            <div style ='margin-top: 15px; margin-bottom: 15px;'>
                            <span style='text-align: center; background-color: rgb(51, 122, 183); display: block; Margin: 0 auto; padding: 20px; font-size: 30px; font-weight: bold; color:#f6f6f6; width: auto'>FibreHub</span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div style ='margin-top: 15px; margin-bottom: 15px;' >
                            
                                <span style='font-size:15px;'>Dear  <strong>Team</strong>, </span><br />
                                I hereby Acknowledge the payment made by $caps for our services.
                                Stated below is the information of the prospect:<br />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div style ='margin-top: 15px; margin-bottom: 15px;'>
                                Prospect Name - {$info['last_name']} {$info['first_name']}<br />
                                Prospect Email - {$info['email']}<br />
                                Prospect Phone - {$info['phone']}<br />
                                Prospect Address - {$info['address']}<br />
                            </div>
                            $organisationDetail
                            
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <div style ='margin-top: 15px; margin-bottom: 15px;' >
                                Kindly proceed for installation.<br />
                                For further information about the customer please contact he's / her market handler {$info['marketer_name']}.<br />  
                                Please reply to the mail if you have any question(s) or have any reason not to carry out the task.<br />   
                                Thanks.
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div style ='margin-top: 15px; margin-bottom: 15px;' >
                                Human Resource Manager / Accounts
                            </div>
                        </td>
                    </tr>                
                </tbody>
            </table>
        </div>  
    </body>
</html>

END;

return $html;

?>