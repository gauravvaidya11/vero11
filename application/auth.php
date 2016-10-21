<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MX_Controller {

    public function __construct() {
        parent::__construct();
        // echo $this->session->userdata('site_language');
        // die();
      //  $this->lang->load($this->session->userdata('site_language'), $this->session->userdata('site_language'));
        $this->load->model('user_model');
    }

    public function index() {
        $this->login();
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
            redirect("login");
        }
        
        $data['module'] = "auth";
        $data['view_file'] = "front/register";
        $data['positions'] = $this->user_model->get_player_positions();

        if ($this->input->post('submit')) {
         
            if ($this->form_validation->runcallback($this, 'athlete_registration') == FALSE) {
                $this->load->view('front/register', $data);
            } else {
                $this->user_data = array(
                    'first_name' => $this->input->post('fname'),
                    'last_name' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'gender' => $this->input->post('gender'),
                    'birthday' => $this->input->post('birthday'),
                    'age' => $this->input->post('age'),
                    'cpf' => $this->input->post('cpf_field'),
                    'hash' => md5(rand(0, 1000))
                );

                if($this->input->post('age') >= 18){
                     $user_id = $this->user_model->insertPlayerDetails($this->user_data);
                
                    if ($user_id > 0) {

                    $this->password = mt_rand(10000000, 99999999);
                    $login_data = array(
                        'user_id' => $user_id,
                        'email' => $this->input->post('email'),
                        'password' => md5($this->password),
                    );

                    $this->contact_data = array(
                        'player_id' => $user_id
                        );

                    $this->biography_data = array(
                        'player_id' => $user_id
                        );

                    $result = $this->user_model->insertLoginDetails($login_data);
                    $this->user_model->insert_contact($this->contact_data);
                    $this->user_model->insert_biography($this->biography_data);

                        if ($result) {
                            $this->send_verification_mail();
                            // $data['view_file'] = "front/successful_registration";
                            // $this->load->view('front/register', $data);
                            // $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.$this->lang->line("invalid_username_pass").'</div>');
                            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$this->lang->line("registration_successfull").'</div>');
                            redirect("signup");
                        }
                        // else{
                        //     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.$this->lang->line("invalid_username_pass").'</div>');
                        //     redirect("signup");
                        // }
                    }    
                }
                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.$this->lang->line("age_less_than_18").'</div>');
                    redirect('signup');
                }

                
            }
        } else {
            $this->load->view('front/register', $data);
        }
    }

    /* for athlete login */

    public function login() {
        if($this->session->userdata("player_id")){
            redirect("athlete-profile");
        }
       
        $data['module'] = "auth";
        if ($this->input->post('login')) {

                   
            if ($this->form_validation->run('athlete_login') == FALSE) {
               $this->load->view('front/login', $data);
            } else {

                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $usr_result = $this->user_model->get_user($email, $password);
                $user = $this->user_model->get_player_info($usr_result->id);
                if ($usr_result == 1) {
                    $this->session->set_userdata('player_id', $usr_result['id']);
                    $this->session->set_userdata('display_name', $user->first_name." ".$user->last_name);
                    $this->session->set_userdata('email', $user->email);
                    $this->session->set_userdata('profile_image', $user->profile_image);
                    $this->session->set_userdata("session_tab_id", '1');
                    $player_id = $this->session->userdata('player_id');
                    $number_of_players = $this->user_model->get_number_of_player();
                    $this->session->set_userdata("total_players", $number_of_players);
                    redirect("athlete-profile");
                } 
                else {
                    exit();
                    // $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.$this->lang->line("invalid_username_pass").'</div>');
                    // redirect('login');
                }
            }
        } else {
            $this->load->view('front/login', $data);
        }
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

        $this->load->helper('my_email');
        $subject = $this->lang->line("welcome_subject");
        $message =  $this->lang->line("thanx_for_signing") . $_POST['fname'] . $this->lang->line("account_created").'
        -------------------------------------------------
        Email   : ' . $_POST['email'] . '
        Password: ' . $this->password . '
        -------------------------------------------------
                        
        "'.$this->lang->line("activate_your_account").'"
            
        ' . base_url() . 'verify?' .
                'email=' . $_POST['email'] . '&hash=' . $this->user_data['hash'];
        $to = $_POST['email'];
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }
    /* for changing verification status in user table */

    function verify() {
        $result = $this->user_model->get_hash_value($_GET['email']); //get the hash value which belongs to given email from database
        if ($result) {
            // print_r($_GET['email']);
            // print_r($result);
            if ($result['hash'] == $_GET['hash']) {  //check whether the input hash value matches the hash value retrieved from the database
                $this->user_model->verify_user($_GET['email']); //update the status of the user as verified
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$this->lang->line("successfull_verification").'</div>');
                redirect('login');
            }
        }
    }

    /* for displaying forgot password form */

    public function forgotPassword() {
       
        $data['module'] = "auth";
        $data['view_file'] = "front/forgot_password";
        if ($this->input->post('submit')) {
         //   exit();
            $email = $this->input->post('email');
            $this->sendResetPasswordMail($email);
            $data['message'] = $this->lang->line("mail_sent_forgot_pass");
        }
        $this->load->view('front/forgot_password',$data);
    }

    /* for sending email to reset password */

    public function sendResetPasswordMail($email) {
        $this->load->helper('my_email');
        $subject = 'Password Reset';
        $this->hash = mt_rand(100000, 999999);
        $message = $this->lang->line("one_time_pass_mess") . $this->hash . $this->lang->line("activate_your_account") . base_url() . 'reset-password';
        $to = $email;
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
        $this->user_model->update_otp($email, $this->hash);
    }

    /* for resetting password in user table */

    public function resetPassword() {

        
        if ($this->input->post('reset')) {
            //exit();
            $otp = $this->input->post('otp');
            $email = $this->input->post('email');
            $new_password = md5($this->input->post('newpass'));
            $result = $this->user_model->get_otp($email);
            //print_r($result);
            if ($result == $otp) {
                $this->user_model->reset_password($email, $new_password);
                $data['success'] = $this->lang->line("pass_sent_successefully");
            } else {
                $data['error'] = $this->lang->line("incorrect_otp");
            }
            $this->load->view("front/resetPassword",$data);
        }
        else {
            $this->load->view("front/resetPassword");
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

}

?>