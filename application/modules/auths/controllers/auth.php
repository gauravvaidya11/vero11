<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        checkFrontUserLoggedIn();
        $data['module'] = "auths";
        $this->load->view('front/login', $data);
    }

    public function switchLanguage() {
        $language = $this->input->post('language');
        $this->session->set_userdata('site_language', $language);
        echo json_encode($language);
        exit();
    }

    /* function for athlete registration */

    public function register() {
        if($this->session->userdata("player_id")){
            redirect(BASE_URL.'athlete-profile');
        }
        
        $data['module'] = "auths";
        $data['view_file'] = "front/register";
        if ($this->input->post('submit')) {
         
            if ($this->form_validation->runcallback($this, 'athlete_registration') == FALSE) {
                $this->load->view('front/register', $data);
            } else {
                

                if($this->input->post('age') >= 18){

                        $this->password = mt_rand(10000000, 99999999);

                        $login_data = array(
                            'email' => $this->input->post('email'),
                            'password' => md5($this->password),
                        );
                        $user_id = $this->user_model->insertLoginDetails($login_data);

                        if($user_id) {

                            
                            $this->biography_data = array(
                                'player_id' => $user_id
                                );

                            $this->user_data = array(
                                    'user_id' => $user_id,
                                    'first_name' => $this->input->post('fname'),
                                    'last_name' => $this->input->post('lname'),
                                    'email' => $this->input->post('email'),
                                    'gender' => $this->input->post('gender'),
                                    'birthday' => $this->input->post('birthday'),
                                    'age' => $this->input->post('age'),
                                    'cpf' => $this->input->post('cpf_field'),
                                    'hash' => md5(rand(0, 1000))
                                );

                            $result = $this->user_model->insertPlayerDetails($this->user_data);
                            
                            $this->user_model->insert_biography($this->biography_data);

                                if ($result) {
                                    $this->send_verification_mail();
                                    $this->session->set_flashdata('msg', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("registration_successfull").'</div>');
                                    redirect(BASE_URL."signup");
                                }
                                else{
                                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                                    redirect(BASE_URL."signup");
                                }
                        }
                }
                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("age_less_than_18").'</div>');
                    redirect(BASE_URL.'signup');
                }

                
            }
        } else {
            $this->load->view('front/register', $data);
        }
    }
 

    public function login() {
        checkFrontUserLoggedIn(FALSE);
        $data['module'] = "auths";
        if ($this->input->post()) { 
            if ($this->form_validation->run('athlete_login') == FALSE) {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"> <span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                redirect(BASE_URL);
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                if($email=="" && $password==""){
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                    redirect(BASE_URL);
                }

                $usr_result = $this->user_model->get_user($email, $password);
                if(empty($usr_result)){
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                    redirect(BASE_URL);
                }else if($usr_result->is_verified=="0"){
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto">'.lang("user_not_verify").'</div>');
                    redirect(BASE_URL);
                }else{
                    $user = $this->user_model->get_player_info($usr_result->id); 
                    $userData = array(
                        'player_id' => $usr_result->id,
                        'display_name' => $user->first_name." ".$user->last_name,
                        'email' => $usr_result->email,
                        'session_tab_id' => '1'
                    );

                    $number_of_players = $this->user_model->get_number_of_player();
                    $this->session->set_userdata("total_players", $number_of_players);

                    $this->session->set_userdata($userData);
                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.lang("user_logged_id_successfull_msg").'</div>');
                    redirect(BASE_URL."athlete-profile");
                }
            }
        } 

        $this->index();
        
    }

    /* for sending mail for user verfication */

    // public function send_verification_mail() {

    //     $this->load->helper('my_email');
    //     $subject = $this->lang->line("welcome_subject");
    //     $message =  $this->lang->line("thanx_for_signing"). $_POST['fname'];
    //     $message .=  $this->lang->line("account_created");
    //     $message .=  $this->lang->line("account_created")."".$this->lang->line("common_email_placeholder").":".$_POST['email'];
    //     $message .= $this->lang->line("login_password_placeholder"). ":".$this->password; 
    //     $message .= $this->lang->line("activate_your_account");
    //     $message .= base_url() .'verify?'.'&email='.$_POST['email'].'&password='.$this->password . $this->lang->line("hash").$this->user_data['hash'];
    //     // $message = $this->lang->line("thanx_for_signing"). " " . $_POST['fname'] . $this->lang->line("account_created"). " " .
    //     // '-------------------------------------------------
    //     // '.$this->lang->line("common_email_placeholder").'   : ' . $_POST['email'] . '
    //     // '.$this->lang->line("login_password_placeholder").' ' . $this->password . '
    //     // -------------------------------------------------'. $this->lang->line("activate_your_account") . base_url() . $this->lang->line("verify") .
    //     //        $this->lang->line("common_email_placeholder") . $_POST['email'] . $this->lang->line("hash") . $this->user_data['hash'];
    //     $to = $_POST['email'];
    //     $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    // }

    public function send_verification_mail() {
		$result = $this->user_model->get_hash_value($_POST['email']); //get the hash value which belongs to given email from database
        $this->load->helper('my_email');
        $subject = $this->lang->line("welcome_subject");
        $message =  $this->lang->line("hi") .' '. $_POST['fname'] .' <br>' .$this->lang->line("account_created").'
        <br>-------------------------------------------------<br>
        Email   : ' . $_POST['email'] . '<br>
        Password: ' . $this->password . '<br>
        -------------------------------------------------<br>
         <a href="'.BASE_URL.'verify?email='.$_POST['email'].'&hash='.$result['hash'].'">'.$this->lang->line("cpmmon_click_here").' </a>               
        '.$this->lang->line("activate_your_account");
        $to = $_POST['email'];
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }
    /* for changing verification status in user table */

    function verify() {
        $result = $this->user_model->get_hash_value($this->input->get('email')); //get the hash value which belongs to given email from database
        if ($result) {
            if ($result['hash'] == $this->input->get('hash')) {  //check whether the input hash value matches the hash value retrieved from the database
                $result = $this->user_model->verify_user($this->input->get('email')); //update the status of the user as verified
                if($result){
                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("successfull_verification").'</div>');
                    redirect(BASE_URL.'login');    
                }else{
                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("already_verification_msge").'</div>');
                    redirect(BASE_URL.'login');    
                }
                
            }else{
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("common_message_something_wrong_please_try_again").'</div>');
                redirect(BASE_URL.'login');
            }
        }else{
        	$this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("common_message_something_wrong_please_try_again").'</div>');
            redirect(BASE_URL.'login');
        }
    }

    /* for displaying forgot password form */

    public function forgotPassword() {
        $data['module'] = "auths";
        $this->load->view('front/forgot_password',$data);
    }


    public function checkAndSendForgotPassword() {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            if ($this->form_validation->run('forgot_password') == FALSE) {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_email_please_try_again").'</div>');    
                redirect(BASE_URL.'forgot-password'); 
            }else{

                $result = $this->user_model->get_user_email($email);
                if($result){
                    $this->sendResetPasswordMail($result['email']);
                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("mail_sent_forgot_pass").'</div>');    
                    redirect(BASE_URL.'forgot-password');
                }else{
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_email_please_try_again").'</div>');    
                    redirect(BASE_URL.'forgot-password');
                }
            }
        }
    }    

    /* for sending email to reset password */

    public function sendResetPasswordMail($email) {
        $this->load->helper('my_email');
        $subject = lang("reset_password_subject");
        $this->hash = mt_rand(100000, 999999);
        $message = '<br>'.$this->lang->line("one_time_pass_mess") .": ". $this->hash .' <br><a href="'.BASE_URL.'reset-password">'.$this->lang->line("cpmmon_click_here")."</a>". $this->lang->line("activate_your_account").'<br>';
        $to = $email;
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
        $this->user_model->update_otp($email, $this->hash);
    }

    /* for resetting password in user table */

    
    public function resetPasswordFrom() {
        $data['module'] = "auths";
        $this->load->view("front/resetPassword",$data);
    }

    public function resetPassword() {
        
        if ($this->input->post()) {
            //exit();
            $otp = $this->input->post('otp');
            $email = $this->input->post('email');

            $new_password = md5($this->input->post('newpass'));

            $reset_pass_data = array('otp' =>'0', 'password' => $new_password);
            if ($this->form_validation->run('reset_password') == FALSE) {
                redirect(BASE_URL.'reset-password');
            }else{
                $result = $this->user_model->get_otp($email);

                if ($result == $otp) {
                    $reset_pass = $this->user_model->reset_password($email, $reset_pass_data);
                    if($reset_pass){
                        $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("pass_sent_successefully").'</div>');    
                        redirect(BASE_URL.'reset-password');    
                    }
                    
                }else{
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("incorrect_otp").'</div>');    
                    redirect(BASE_URL.'reset-password');
                }
                
            }
        }
            
    }   
    

    /* for change password functionality */

    // public function changePassword() {

        
    //     $data['module'] = "auth";
    //     $data['view_file'] = "front/changePassword";
    //     if ($this->input->post('reset')) {
    //         $old_password = md5($this->input->post('old_password'));
    //         $email = $this->input->post('email');
    //         $new_password = md5($this->input->post('newpass'));
    //         $result = $this->user_model->get_old_password($email);

    //         if ($result == $old_password) {
    //             $this->user_model->reset_password($email, $new_password);
    //         } else {
    //             echo 'incorrect password';
    //             exit;
    //         }
    //     } else {
    //         $this->template->front($data);
    //     }
    // }

    /* callback function for checking unique username */

    public function username_check() {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $res = $this->user_model->check_unique_username($email);
            echo json_encode($res);
            exit();
        } else {
            $email = $this->input->post('email');
            $res = $this->user_model->check_unique_username($email);
            if ($res == TRUE) {
                return TRUE;
            } else {
                $this->form_validation->set_message('username_check', $this->lang->line('username_already_exist_error_message'));
                return FALSE;
            }
        }
    }

    public function age_check() {
        if ($this->input->is_ajax_request()) {
            $age = $this->input->post('age');
            if($age >= '18') {
                $result = TRUE;
            }
            else {
                $result = FALSE;
            }
            echo json_encode($result);
            exit();
        }
    }

    /* callback function validating cpf field */

    public function cpf_check() {

        $cpf = $this->input->post('cpf_field');
        $cpf = sprintf('%011s', preg_replace('{\D}', '', $cpf));
        // Validate length and invalid numbers
        if ((strlen($cpf) != 11) || ($cpf == '00000000000') || ($cpf == '99999999999')) {
            $this->form_validation->set_message('cpf_check', 'Invalid CPF.');
            return false;
        }
        // Validate check digits using a modulus 11 algorithm
        for ($t = 8; $t < 10;) {
            for ($d = 0, $p = 2, $c = $t; $c >= 0; $c--, $p++) {
                $d += $cpf[$c] * $p;
            }
            if ($cpf[++$t] != ($d = ((10 * $d) % 11) % 10)) {
                return false;
                $this->form_validation->set_message('cpf_check', 'Invalid CPF.');
            }
        }
        return true;
    }

    public function logout() {
        $array_items = array(
            'player_id' => '',
            'display_name' => '',
            'email' => ''
        );
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.lang("user_logout_successfully").'</div>');
        redirect(BASE_URL);
    }

}


?>