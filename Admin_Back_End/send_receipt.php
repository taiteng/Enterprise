<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include("../Back_End/db_conn.php");
include("../Back_End/function.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if($_SERVER['REQUEST_METHOD'] == "POST"){    
    if(!empty($_POST['serviceID']) && !empty($_POST['siteName']) && !empty($_POST['siteAddress']) && !empty($_POST['siteSize']) && !empty($_POST['serviceType']) && !empty($_POST['serviceDesc']) && !empty($_POST['noppl']) && !empty($_POST['username'])
            && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['eventDate']) && !empty($_POST['eventTime']) && !empty($_POST['nochair']) && !empty($_POST['chairPrice']) && !empty($_POST['nobabychair']) && !empty($_POST['babychairPrice']) && !empty($_POST['notable'])
            && !empty($_POST['tablePrice']) && !empty($_POST['nocup']) && !empty($_POST['cupPrice']) && !empty($_POST['nocutlery'])  && !empty($_POST['cutleryPrice']) &&  !empty($_POST['fndName']) &&  !empty($_POST['nofnd']) &&  !empty($_POST['fndPrice']) &&  !empty($_POST['decoName']) 
            &&  !empty($_POST['decoPrice']) &&  !empty($_POST['funName']) &&  !empty($_POST['funPrice']) &&  !empty($_POST['totalPrice'])){
        
        $service_id = $_POST['serviceID'];
        $site_name = $_POST['siteName'];
        $site_address = $_POST['siteAddress'];
        $site_size = $_POST['siteSize'];
        $username = $_POST['username'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $service_type = $_POST['serviceType'];
        $service_desc = $_POST['serviceDesc'];
        $event_date = $_POST['eventDate'];
        $event_time = $_POST['eventTime'];
        $no_ppl = $_POST['noppl'];
        $no_chair = $_POST['nochair'];
        $chair_price = $_POST['chairPrice'];
        $no_babychair = $_POST['nobabychair'];
        $babychair_price = $_POST['babychairPrice'];
        $no_table = $_POST['notable'];
        $table_price = $_POST['tablePrice'];
        $no_cup = $_POST['nocup'];
        $cup_price = $_POST['cupPrice'];
        $no_cutlery = $_POST['nocutlery'];
        $cutlery_price = $_POST['cutleryPrice'];
        $fnd_name = $_POST['fndName'];
        $no_FND = $_POST['nofnd'];
        $fnd_price = $_POST['fndPrice'];
        $deco_name = $_POST['decoName'];
        $deco_price = $_POST['decoPrice'];
        $fun_name = $_POST['funName'];
        $fun_price = $_POST['funPrice'];
        $total_price = $_POST['totalPrice'];
        $paid_price = $_POST['paidPrice'];
        
        $data = '';
        
        $data .= '<style> p{font-size: 14px; font-family: "times new roman";}'
                . 'table, tr{border: 1px solid;} tableItem{width: 100%} </style>';
        
        $data .= '<p>Receipt</p>
            <div class="container">
                        <table class="table tableItem">
                            <tr class="body">
                                <td>
                                    <table class="table">
                                        <tr class="body" align="left">
                                            <td style="min-width: 150px;">
                                                <p>Service ID:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_id . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Site Name:</p>
                                            </td>
                                            <td>
                                                <p>'. $site_name .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Address:</p>
                                            </td>
                                            <td>
                                                <p>'. $site_address .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Site Size:</p>
                                            </td>
                                            <td>
                                                <p>'. $site_size .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Type of Service:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_type .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Description of Event:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_desc .'</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr class="body" align="left">
                                            <td style="min-width: 180px;">
                                                <p>User Name:</p>
                                            </td>
                                            <td>
                                                <p>' . $username . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Contact:</p>
                                            </td>
                                            <td>
                                                <p>' . $contact . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Email:</p>
                                            </td>
                                            <td>
                                                <p>' . $email . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Date of Event:</p>
                                            </td>
                                            <td>
                                                <p>' . $event_date . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Duration of Event:</p>
                                            </td>
                                            <td>
                                                <p>' . $event_time . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Number of Participants:</p>
                                            </td>
                                            <td>
                                                <p>' . $no_ppl . '</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="body" align="center">
                            <td colspan="2">
                                <table class="table">
                                    <tr class="body" align="left">
                                        <td style="min-width: 400px;">
                                            <p>Description</p>
                                        </td>
                                        <td align="right" style="min-width: 130px;">
                                            <p>Quantity</p>
                                        </td>
                                        <td align="right" style="min-width: 130px;">
                                            <p>Price (RM)</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Chairs</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $no_chair .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $chair_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Baby Chairs</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $no_babychair .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $babychair_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Tables</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $no_table .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $table_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Cups</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $no_cup .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $cup_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Cutlery Sets</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $no_cutlery .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $cutlery_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Food & Beverage Pack:</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>'. $fnd_name .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $no_FND .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $fnd_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Decoration Pack:</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>'. $deco_name .'</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p>'. $deco_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Entertainment Pack:</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>'. $fun_name .'</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p>'. $fun_price .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Total Price</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p>'. $total_price .' (Paid: '. $paid_price .')</p>
                                        </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                        </table>
                    </div>';
        
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = "smtp.gmail.com";                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'taitengchan@gmail.com';                     //SMTP username
            $mail->Password   = 'tdvfxuorappmvakb';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients 
            $mail->setFrom('taitengchan@gmail.com', 'Admin');
            $mail->addAddress($email, 'User');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Receipt';
            $mail->Body    = $data;
            $mail->AltBody = 'This is the quotation for the user';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }
}