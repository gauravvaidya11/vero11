<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    /*==========================================
    *This function is use for landing index page
    */
    public function index() {
     	$data['title'] = 'Vero11';
	    $data['module'] = "auths";
        $this->load->view('front/index', $data);
    }// END index()

    /*==========================================
    *This function is use for login view page
    */
    public function loginView() {
        checkFrontUserLoggedIn();
        $data['module'] = "auths";
        $data['view_file'] = "front/login";
        $this->template->front($data);
    }//END loginView()

    /*==========================================
    *This function is use for register by view page
    */
    public function registerBy() {
        checkFrontUserLoggedIn();
        $data['module'] = "auths";
        $data['view_file'] = "front/register_by";
        $this->template->front($data);
    }//END registerBy()


    public function switchLanguage() {
        $language = $this->input->post('language');
        $this->session->set_userdata('site_language', $language);
        echo json_encode($language);
        exit();
    }

    /* ==============================================
    * This function for player signup
    */
    public function playerSignupForm() {
        if($this->session->userdata("player_id")){
            redirect(BASE_URL.'athlete-profile');
        }
        $data['module'] = "auths";
        $data['view_file'] = "front/player_signup";
        $this->template->front($data);
    }

    public function playerSignup() {
        if ($this->input->post()) {
            if ($this->form_validation->runcallback($this, 'athlete_registration') == FALSE) {
                redirect(BASE_URL."player-signup");
            } else {
                
                if($this->input->post('age') >= CHECK_AGE){

                        $this->password = mt_rand(10000000, 99999999);

                        $login_data = array(
                            'email' => $this->input->post('email'),
                            'password' => md5($this->password),
                            'user_type' => 1, // for player user
                            'paid_status' => 1,
                        );
                        $user_id = $this->user_model->save_users($login_data);

                        $weight = escapeString($this->input->post('weight'));

                        $height_m = escapeString($this->input->post('height_m'));
                        $height_cm = escapeString($this->input->post('height_cm'));

                        if(($height_m) && ($height_cm || $height_cm==0)){
                            $height = $height_m.'.'.$height_cm;
                        }

                        $laterality = escapeString($this->input->post('laterality'));
                        $position_1 = escapeString($this->input->post('position_1'));
                        $position_2 = escapeString($this->input->post('position_2'));
                        $position_3 = escapeString($this->input->post('position_3'));
                        $player_type = $this->input->post('player_type');

                        if($player_type==1){
                            $hire_club_name = escapeString($this->input->post('hire_club_name'));
                        }else{
                            $hire_club_name = "";
                        }
                        $country = escapeString($this->input->post('country'));


                        if($user_id) {
                            $this->user_data = array(
                                'user_id' => $user_id,
                                'first_name' => $this->input->post('fname'),
                                'last_name' => $this->input->post('lname'),
                                'email' => $this->input->post('email'),
                                'gender' => $this->input->post('gender'),
                                'birthday' => $this->input->post('birthday'),
                                'age' => $this->input->post('age'),
                                'cpf' => $this->input->post('cpf'),
                                'weight' => $weight,
                                'height' => $height,
                                'country' => $country,
                                'laterality' => $laterality,
                                'position_1' => $position_1,
                                'position_2' => $position_2,
                                'position_3' => $position_3,
                                'player_type' => $player_type,
                                'hire_club_name' => $hire_club_name,
                                'hash' => md5(rand(0, 1000))
                            );


                            

                            $result = $this->user_model->insertPlayerDetails($this->user_data);
                            
                            $this->biography_data = array('player_id' => $user_id);

                            $this->user_model->insert_biography($this->biography_data);
                                if ($result) {
                                    $this->send_verification_mail();
                                    $this->session->set_flashdata('msg', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("registration_successfull").'</div>');
                                    redirect(BASE_URL."player-signup");
                                }
                                else{
                                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                                    redirect(BASE_URL."player-signup");
                                }
                        }
                }
                else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("age_less_than_18").'</div>');
                    redirect(BASE_URL.'player-signup');
                }

                
            }
        } 
        
    }


    /* ==============================================
    * This function for club signup
    */
    public function clubSignupForm() {
        if($this->session->userdata("player_id")){
            redirect(BASE_URL.'athlete-profile');
        }
        $data['module'] = "auths";
        $data['view_file'] = "front/club_signup";
        $this->template->front($data);
    }




    /* ==============================================
    * This function for club signup
    */
    public function clubSignup() {
        if ($this->input->post()) {
            if ($this->form_validation->runcallback($this, 'club_registration') == FALSE) {
                redirect(BASE_URL."club-signup");
            } else {
                

                if($this->input->post('age') >= CHECK_AGE){

                        $this->password = mt_rand(10000000, 99999999);

                        $login_data = array(
                            'email' => $this->input->post('email'),
                            'password' => md5($this->password),
                            'user_type' => 2, // for club user
                            'paid_status' => 1, // for free club user
                        );
                        $user_id = $this->user_model->save_users($login_data);

                        


                        if($user_id) {
                            $this->user_data = array(
                                    'user_id' => $user_id,
                                    'club_manager_name' => $this->input->post('club_manager_name'),
                                    'club_name' => $this->input->post('club_name'),
                                    'email' => $this->input->post('email'),
                                    'birthday' => $this->input->post('birthday'),
                                    'age' => $this->input->post('age'),
                                    //'cpf' => $this->input->post('cpf_field'),
                                    'hash' => md5(rand(0, 1000))
                             );

                            
                            $result = $this->user_model->insertPlayerDetails($this->user_data);
                            
                            $this->biography_data = array('player_id' => $user_id);

                            $this->user_model->insert_biography($this->biography_data);
                            if ($result) {
                                $this->send_club_verification_mail();
                                if($this->input->post('paid_status')==2){ 

                                    /*====This function is use for save user default info in payment account table*/
                                    $user_default_info = array("user_id"=> $user_id);
                                    $this->user_model->save_default_user_payment_account($user_default_info);
                                    /*====This function is use for save user default info in payment account table*/

                                    $user_full_name = array("userFullName"=> $this->input->post('club_name'), 'email' =>$this->input->post('email'), 'user_id'=> $user_id);
                                    $this->session->set_userdata($user_full_name);

                                    redirect(BASE_URL."payment-option");
                                }else{
                                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("registration_successfull").'</div>');
                                    redirect(BASE_URL."login");
                                }
                                
                            }else{
                                $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                                redirect(BASE_URL."club-signup");
                            }
                            
                        }
                }else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("age_less_than_13").'</div>');
                    redirect(BASE_URL.'club-signup');
                }

                
            }
        } 
    }
 

    /* ===============================================================
    * This function is use for login user 
    */
    public function login() {
        //checkFrontUserLoggedIn(FALSE);
        $data['module'] = "auths";
        if ($this->input->post()) { 

            if ($this->form_validation->run('athlete_login') == FALSE) {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"> <span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                redirect(BASE_URL.'login');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                if($email=="" && $password==""){
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                    redirect(BASE_URL.'login');
                }

                $usr_result = $this->user_model->get_user($email, $password);
                //pr($usr_result);
                if(empty($usr_result)){
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("invalid_username_pass").'</div>');
                    redirect(BASE_URL.'login');
                }else if($usr_result->is_verified==0){
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto">'.lang("user_not_verify").'</div>');
                    redirect(BASE_URL.'login');
                }else{

                    $userData = array(
                        'player_id' => $usr_result->id,
                        'user_type' => $usr_result->user_type,
                        'session_tab_id' => '1'
                    );

                    $this->session->set_userdata($userData);

                    //$number_of_players = $this->user_model->get_number_of_player();
                   // $this->session->set_userdata("total_players", $number_of_players);

                    //var_dump($set_session);die;

                    if($this->session->userdata('player_id') && $this->session->userdata('user_type')==2){ // for club profile 
                        $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.lang("user_logged_id_successfull_msg").'</div>');
                        redirect(BASE_URL.'club-profile');
                    }else if($this->session->userdata('player_id') && $this->session->userdata('user_type')==1){ // for player profile 
                        //echo "IF else 2";die;
                        $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.lang("user_logged_id_successfull_msg").'</div>');
                        redirect(BASE_URL.'athlete-profile');
                    }
                     
                }
            }
        } 

        $this->loginView();
        
    }

    
    /*============================================
    *This function is use for send player user registration verification mail
    */
    public function send_verification_mail() {
		$result = $this->user_model->get_hash_value($_POST['email']); //get the hash value which belongs to given email from database
        $this->load->helper('my_email');
        $subject = $this->lang->line("welcome_subject");
        $message =  $this->lang->line("hi") .' '. $this->input->post('fname') .' <br>' .$this->lang->line("account_created").'
        <br>-------------------------------------------------<br>
        Email   : ' . $_POST['email'] . '<br>
        Password: ' . $this->password . '<br>
        -------------------------------------------------<br>
         <a href="'.BASE_URL.'verify?email='.$_POST['email'].'&hash='.$result['hash'].'">'.$this->lang->line("cpmmon_click_here").' </a>               
        '.$this->lang->line("activate_your_account");
        $to = $_POST['email'];
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }//END send_verification_mail()


    /*============================================
    *This function is use for send club registration verification mail
    */
    public function send_club_verification_mail() {
        $result = $this->user_model->get_hash_value($_POST['email']); //get the hash value which belongs to given email from database
        $this->load->helper('my_email');
        $subject = $this->lang->line("welcome_subject");
        $message =  $this->lang->line("hi") .' '. $this->input->post('club_name') .' <br>' .$this->lang->line("account_created").'
        <br>-------------------------------------------------<br>
        Email   : ' . $_POST['email'] . '<br>
        Password: ' . $this->password . '<br>
        -------------------------------------------------<br>
         <a href="'.BASE_URL.'verify?email='.$_POST['email'].'&hash='.$result['hash'].'">'.$this->lang->line("cpmmon_click_here").' </a>               
        '.$this->lang->line("activate_your_account");
        $to = $_POST['email'];
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }//END send_club_verification_mail()


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
        checkFrontUserLoggedIn();
        $data['module'] = "auths";
        $data['view_file'] = "front/forgot_password";
        $this->template->front($data);
        //$this->load->view('front/forgot_password',$data);
    }//END forgotPassword()


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
        $subject = lang("reset_password");
        $this->hash = mt_rand(100000, 999999);
        $message = '<br>'.$this->lang->line("one_time_pass_mess") .": ". $this->hash .' <br><a href="'.BASE_URL.'reset-password">'.$this->lang->line("cpmmon_click_here")."</a>". $this->lang->line("activate_your_account").'<br>';
        $to = $email;
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
        $this->user_model->update_otp($email, $this->hash);
    }

    /* for resetting password in user table */

    
    public function resetPasswordFrom() {
        checkFrontUserLoggedIn();
        $data['module'] = "auths";
        $data['view_file'] = "front/resetPassword";
        $this->template->front($data);
    }

    public function resetPassword() {
        
        if ($this->input->post()) {
            //exit();
            $otp = $this->input->post('otp');
            $email = $this->input->post('email');

            $new_password = md5($this->input->post('newpass'));

            $reset_pass_data = array('otp' =>'0', 'password' => $new_password);
            if ($this->form_validation->run('reset_password') == FALSE) {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("please_enter_required_field").'</div>');  
                redirect(BASE_URL.'reset-password');
            }else{
                $result = $this->user_model->get_otp($email, $otp);
                //pr($result);
                if($result){
                    if ($result == $otp) {
                        $reset_pass = $this->user_model->reset_password($email, $reset_pass_data);
                        if($reset_pass){
                            $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.$this->lang->line("action_completed_successefully").'</div>');    
                            redirect(BASE_URL.'login');    
                        }else{
                            $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("incorrect_otp").'</div>');    
                            redirect(BASE_URL.'reset-password');
                        }
                    }
                }else{
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("please_registered_email_and_otp").'</div>');    
                    redirect(BASE_URL.'reset-password');
                }
                
                
            }
        }
            
    }   
    

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
    }// END username_check()


    /*=================================================
    *This function is use for check age 
    */
    public function age_check() {
        if ($this->input->is_ajax_request()) {
            $age = $this->input->post('age');
            //echo "age->". CHECK_AGE;die;
            if($age >=CHECK_AGE) {
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
            'user_type' =>'',
            'display_name' => '',
            'email' => ''
        );
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> '.lang("user_logout_successfully").'</div>');
        redirect(BASE_URL.'login');
    }


}// END class here


?>