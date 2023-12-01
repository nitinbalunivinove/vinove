<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once('common/config/config.inc.php');

ob_start();
session_start();
function smtpEmailFunction( $emailTo, $subject, $body, $type, $userEmail, $emailCC = [], $emailBCC = [], $attachments = [], 
    $cname = null, $spam = false ){
    $mail = new PHPMailer(true);
    $smtp = new SMTP;
    try{
        if (!$smtp->connect('smtp.gmail.com', 587)) {
            print_r($smtp->getError());
            throw new Exception('Connect failed!');
        }  

        $mail->isSMTP();
        $mail->Host         = "legolas.vinove.com"; // SMTP server
        $mail->SMTPSecure   = 'tls';
        $mail->Port         = 25;
        $mail->SMTPAuth     = true;
        $mail->Username     = 'info@vinove.com';
        $mail->Password     = 'cQXN*C*rgjGh';
        
        if( $type == "lead" ){
            $mail->setFrom( $userEmail, $cname );
        }else{
            $mail->setFrom( "sales@vinove.com", 'Vinove');
        }
        $mail->addAddress($emailTo);
        if( $emailCC ){
            foreach( $emailCC as $emailC ){
                $mail->addCC( $emailC );        
            }
        }
        if( $emailBCC ){
            foreach( $emailBCC as $emailBC ){
                $mail->addBCC( $emailBC );        
            }
        }
        if( $type == "lead" ){
            $mail->addReplyTo( $userEmail );
        }else{
            $mail->addReplyTo( 'sales@vinove.com' );
        }
        
        if( $attachments ){
            foreach( $attachments as $attachment ){
                $mail->addAttachment( $attachment );
            }
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;    
        $mail->send();
        //echo 'Message has been sent'; die();
    }catch(Exception $e) {
       //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; die();
    }
}

function getClientIP(){
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
    $ipaddress = 'UNKNOWN';
    
    return $ipaddress;
}

function contactUsArray($argArrPost) { 
        /*
        echo "<pre>";
        print_r($argArrPost); die;
        */
        $autoEmailBody = 'Greetings! <br><br>
        Thank you for contacting us here at Vinove.<br><br>
        This auto-reply is just to let you know that we have received your email and will get back to you with a (human) response as soon as possible.<br><br>
        If you have any additional information that you think will help us to assist you, please feel free to reply to this email.<br><br>
        We look forward to chatting soon!<br><br>
        Regards<br>
        Vinove Team';
        if ($argArrPost['frmHiddenContactForm'] == 'Yes') {
            $varUserName = $argArrPost['cont_name'];
            $varUserPhone = $argArrPost['cont_phpne'];
            $varUserEmail = $_POST['cont_email'];
            $varUserSkype = $argArrPost['cont_skype'];
            $varUserCountry = $argArrPost['cont_country'];
            $varUserUrl = $argArrPost['cont_url'];
            $varUserEnquiry = $argArrPost['inquey_type'];
            $varUsercomments = $argArrPost['texteareacostm'];
            $customUrlLink = $argArrPost['customUrllink'];
            $varToUser = CONTACT_US_EMAIL_TO;
            $varFromUser = $argArrPost['frmUserEmail'];
            $varSubject = CONTACT_US_SUBJECT;
            if($argArrPost['job_apply']=='yes') {
                $varSubject = "Ref : ".$argArrPost['job_title'];
                $varToUser = CONTACT_US_EMAIL_TO_CAREER;
            }
            if($argArrPost['inquey_type'] == 'Human Resource'){
			$varToUser = CONTACT_FORM_EMAIL_HR;
			}else{
			$varToUser = CONTACT_US_EMAIL_TO;
			}
            $varDeliminator = "<br /><br />";

            $messageBody .='Dear Admin,' . $varDeliminator . $varDeliminator;
            $messageBody.='Below is the form as submitted by ' . $varUserName . $varDeliminator . $varDeliminator;
            $messageBody.='Name:' . $varUserName . $varDeliminator;
            $messageBody.='Email:' . $varUserEmail . $varDeliminator;
            $messageBody.='Phone:' . $varUserPhone . $varDeliminator;
            //$messageBody.='Company Name:' . $varUserSkype . $varDeliminator;
            $messageBody.='Country Name:' . $varUserCountry . $varDeliminator;
            //$messageBody.='Url :' . $varUserUrl . $varDeliminator;
            //$messageBody.='Nature of Inquiry:' . $varUserEnquiry . $varDeliminator;
            $messageBody.= 'IP:' . getClientIP() . $varDeliminator;
            if ($varUsercomments != 'Comments/Notes') {
                $messageBody.='Comment:' . nl2br($varUsercomments) . $varDeliminator;
            }
            if ($customUrlLink != 'https://') {
               //$messageBody.='Custom URL:' . $customUrlLink . $varDeliminator;
            } else {
                //$messageBody.='Custom URL:' . 'NA' . $varDeliminator;
            }

            /*if ($argArrPost['orderUrllink'] != 'https://') {
                $domain = strstr($argArrPost['orderUrllink'], 'http://');
                if ($domain == '') {
                    $domain = strstr($argArrPost['customUrllink'], 'www');
                    if ($domain == '') {
                        $messageBody .= 'File: ' . $argArrPost['orderUrllink'] . $varDeliminator;
                    } else {
                        $messageBody .= 'File: <a href="' . $argArrPost['orderUrllink'] . '"> ' . $argArrPost['orderUrllink'] . '</a>' . $varDeliminator;
                    }
                } else {
                    $messageBody .= 'File: <a href="' . $argArrPost['orderUrllink'] . '"> ' . $argArrPost['orderUrllink'] . '</a>' . $varDeliminator;
                }
            }*/

            if ($_POST['frmOrderFileUploadedfilename'] != "") {
                $arrFileNameArr = explode(',', $_POST['frmOrderFileUploadedfilename']);
            } else {
                $arrFileNameArr = array();
            }

            if (count($arrFileNameArr) >= 1) {
                foreach ($arrFileNameArr as $fileKey => $fileValue) {
                    //$messageBody .= 'Uploaded File :  <a href="' . SITE_ROOT_URL . 'common/uploaded_files/contact_request/' . $fileValue .'</a>'. $varDeliminator;
                    $messageBody .= 'Uploaded File: <a href="'.SITE_ROOT_URL.'common/uploaded_files/contact_request/'.$fileValue.'"> '.SITE_ROOT_URL.'common/uploaded_files/contact_request/'.$fileValue.'</a>'.$varDeliminator; 
                }
            }
            $allowed = array('psd','doc','docx','jpg','jpeg','gif','png','ai','zip','rar', 'pdf');
            $timestamp = time();

            if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {

                $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

                if (!in_array(strtolower($extension), $allowed)) {
                //echo "Please upload accepted file formats.";
                } else {
                    move_uploaded_file($_FILES['upl']['tmp_name'], UPLOADED_CONTACT_PATH . $timestamp . $_FILES['upl']['name']);
                }
            }

            smtpEmailFunction( $varUserEmail, "Vinove - We've received your request", $autoEmailBody, 'auto',  $varUserEmail );
            smtpEmailFunction( $varToUser, $varSubject, html_entity_decode($messageBody), 'lead',  $varUserEmail, [], [], [], 
            $varUserName );
            unset($_SESSION['security_code']);
            header('Location: thanks');
        }
    }
?>    