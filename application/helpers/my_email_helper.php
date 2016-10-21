<?php
require 'application/PHPMailer/PHPMailerAutoload.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


function reSendMail($to, $msg, $subject, $cc = FALSE, $attach = array()) { 
       $mail = new PHPMailer();
       $mail->IsSMTP(); // we are going to use SMTP
       $mail->Host       = "ssl://smtp.cisinlabs.com";      // setting GMail as our SMTP server
       $mail->Port       = 465;                   // SMTP port to connect to GMail
       $mail->SMTPAuth   = true; // enabled SMTP authentication
       //$mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
       $mail->Username   = "shifali.s@cisinlabs.com";  // user email address
       $mail->Password   = "tXOb6rghu1";            // password in GMail
       $mail->From = 'http://vero11.rt.cisinlive.com/';  //Who is sending the email
       $mail->FromName = 'Vero11';
       $mail->SingleTo = true; // if you want to send a same email to multiple users. 
       $mail->IsHTML(true); 
       
       $mail->Subject    = $subject;
       $mail->Body      = $msg;


       $mail->AddAddress($to); //email send to $receiver
       //echo $mail->Send();die;
       if(!$mail->Send()) {
            return true;
        }
        else {
            return false;
        }
}

function configSmtpEmail($to, $msg, $subject, $cc = FALSE, $attach = array()) {
    //  return true;
    $ci = & get_instance();
    $config['protocol'] = "smtp";
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '7';

    $config['smtp_user'] = "shifali.s@cisinlabs.com";
    $config['smtp_pass'] = "tXOb6rghu1";

    $config['charset'] = "utf-8";
    $config['newline'] = "\r\n";
    $config['crlf'] = "\r\n"; // for outlook 
    $config['mailtype'] = "html"; // or html or text
    $config['wordwrap'] = TRUE;
    $ci->load->library('email');
    $ci->email->initialize($config);
    $ci->email->from('shifali.s@cisinlabs', getBasicSetting('site_name')->setting_value);
    $ci->email->to($to);

    $ci->email->subject($subject);
    $ci->email->message($msg);

    if ($cc != FALSE) {
        $ci->email->cc($cc);
    }

    foreach ($attach as $value) {
        $ci->email->attach($value);
    }

    if ($ci->email->send()) {
        return true;
    } else {
        // echo $this->email->print_debugger();
        return reSendMail($to, $msg, $subject, $cc = FALSE, $attach = array());
    }
}

/*
 * Custom function to get the error log on email
 */

function sendErrorLog($message = 'N/A') {
    $subject = 'Error log at ' . BASE_URL;
    $to = 'vishal.patidar.cis@outlook.com';
    $emailBannerTitle = 'Error Logs';
    sendEmail($subject, $message, $to, $emailBannerTitle, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array());
}

//get email template from notification file
function getNotificationTheme($subject, $message, $emailBannerLogo, $emailBannerTitle, $templateType = "common") {
    // Call Codeigniter Instance

    $baseURL = base_url();
    $siteName = getBasicSetting('site_name')->setting_value;

    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('email_templates/email_template'); //need to check which profile model will be called
    $emailTemplate = $CI->email_template->getEmailTemplateContent($templateType);

//    //Notification themem file path.
//    $filePath = str_replace("\\", "/", dirname(dirname(dirname(__FILE__)))) . "/application/modules/emails/views/front/email_template.html";
//    //Get HTML contents of theme file.
//    $emailTemplate->content = file_get_contents($filePath);
    //Search with this patterns
    $searchPatterns[0] = '{{{currentdate}}}';
    $searchPatterns[1] = '{{{subject}}}';
    $searchPatterns[2] = '{{{contents}}}';
    $searchPatterns[3] = '{{{baseURL}}}';
    $searchPatterns[4] = '{{{siteName}}}';
    $searchPatterns[5] = '{{{siteLogo}}}';
    $searchPatterns[6] = '{{{emailBannerLogo}}}';
    $searchPatterns[7] = '{{{emailBannerTitle}}}';
    $searchPatterns[8] = '{{{end_message}}}';
    $searchPatterns[9] = '{{{footer_message}}}';

    //Replace with this values
    //$replaceBy[0] = date(FRONTEND_DATE_VIEW_FORMAT);

    $replaceBy[0] = date("Y/m/d");
    $replaceBy[1] = $subject;
    $replaceBy[2] = "<table>" . $message . "</table>";
    $replaceBy[3] = $baseURL;
    // $replaceBy[4] = "<a href='" . base_url() . "'>" . " " . "</a>";
    // $replaceBy[5] = "<a href='" . base_url() . "'><img src ='" . base_url() . getSetting('email_logo')->setting_value . "' width='420' height='93' /></a>";
    // $replaceBy[6] = "";
    // if ($emailBannerLogo != false) {
    //     $replaceBy[6] = '<img src="' . base_url() . $emailBannerLogo . '" width="102" height="104" alt="" />';
    // }

    // $replaceBy[7] = $emailBannerTitle;
    // $replaceBy[8] = '<span style="font-family: Lato, sans-serif, Arial, Helvetica, sans-serif; color:#8d8d8d; font-size:16px; line-height:30px; padding:0 0 30px 0; margin:0;">' . lang('mail_common_end_message') . '</span>';
    // $replaceBy[9] = str_replace(array('{{current_date}}', '{{site_name_link}}'), array(date("Y/m/d"), "<a href='" . base_url() . "'>" . $siteName . "</a>"), lang('mail_common_footer_message'));

    //Return the theme processed contents.
    return preg_replace($searchPatterns, $replaceBy, $emailTemplate->content);
}

function sendEmail($subject, $message, $to, $emailBannerTitle, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common") {
    $body = getNotificationTheme($subject, $message, $emailBannerLogo, $emailBannerTitle, $templateType);
    $result = configSmtpEmail($to, $body, $subject, $cc, $attachment);
    return $result;
}

//action from here
//------------------------------------------------------------------------------


/*
 * This function is used for send order invoice email.
 * Update 533
 */


//END sendContractReAcceptNotification()