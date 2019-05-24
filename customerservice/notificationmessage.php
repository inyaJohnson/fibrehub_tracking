<?php
$html = <<<END
<html>
    <body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.5; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: justify;'>
        <div style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 680px; padding: 20px;'>
            <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate;  width: 100%; background-color: #f6f6f6; line-height: 1.5; padding: 20px;'>       
                <tbody>
                    <tr>
                        <td>
                            <div style ='margin-top: 15px;'>
                            <span style='text-align: center; background:  rgb(51, 122, 183); display: block; Margin: 0 auto; padding: 20px; font-size: 30px; font-weight: bold; color: #FFF; width: auto'>FibreHub</span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table>  
                                <tr>
                                   
                                    <td>
                                        <div style ='background: #fff; padding: 30px;' >
                                            <p style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                Dear Sir/Ma,
                                            </p>

                                            <p style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                            <span style='font-size:20px; font-weight: bolder; padding:120px;'>INTERNET SUBSCRIPTION</span>
                                            </p>

                                            <p style="text-align: left; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.5em;">
                                                A friendly reminder that your subscription to {$client['service']} {$client['bandwidth']} internet service
                                                will expire on {$client['due_date']} <br />
                                               
                                                To keep enjoying this service, you are advised to please renew your subscription.<br /><br />
                                                Your service can be renewed via Bank payment to the Account stated below
                                                .......................
                                                <br /><br /> 
                                                Thanks.
                                            </p>
                                        
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>  
                    </tr>
                    
                    <tr>
                        <td >
                            <div style ='margin-bottom: 15px;padding: 10px; background: rgb(51, 122, 183)' >
                                <table>  
                                    <tr>
                                        <td>
                                            <ul style='list-style-type:none;'>
                                                <a href='https://fibrehub.com.ng' style='text-decoration: none;'><li style='color:#ccc; padding: 2px; font-size: 80%;'>Website : Fibrehub.com.ng</li></a>
                                                <a href='mailto:info@fibrehub.com.ng' style='text-decoration: none;'><li style='color:#ccc; padding: 2px; font-size: 80%;'>info : info@fibrehub.com.ng</li></a> 
                                
                                            </ul>
                                        </td>
                                        <td>
                                            <ul style='list-style-type:none;'>
                                                <a href='javascript:void(0)' style='text-decoration: none;'><li style='color:#ccc; padding: 2px; font-size: 80%;'>Phone : 08090506310, 08033021700</li></a>
                                                <a href='javascript:void(0)' style='text-decoration: none;'><li style='color:#ccc; padding: 2px; font-size: 80%;'> Adderess : 68/72 Allen Avenue, Ikeja, Lagos.</li></a>
                                                
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
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