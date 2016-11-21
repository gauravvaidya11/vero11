<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paypal extends Front_Controller {

    private $payment_module = 'paypal';

    function __construct() {
        parent::__construct();
        $this->load->model('paypal_model');
        
        if($this->session->userdata('player_id')){
            $this->user_id = $this->session->userdata('player_id');    
        }else{
            $this->user_id = $this->session->userdata('user_id');    
        }
        
    }



    /*==========================================
    *This function is use for choose payment option by view page
    */
    public function userPaymentOption() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }

        if(empty($this->user_id)){
            redirect(BASE_URL);
        }
        $data['module'] = "paypal";
        $data['view_file'] = "front/payment_option";

        if($this->input->post()){
            if($this->input->post('payment_type')==1){
                redirect(BASE_URL.'credit-card-payment');
            }
        }   
        $this->template->front($data);
    }//END userPaymentOption()


    /* ==============================================
    * This function for display thanks payment page
    */

    public function orderFailed() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }
        $data['title'] = "Payment Information";
        $data['module'] = "paypal";
        $data['view_file'] = "front/payment_failure";
        $this->session->unset_userdata('order_data');//unset the array  
        $this->template->front($data);
    }//END thanksPayment()


    /* ==============================================
    * This function for display thanks payment page
    */

    public function thanksPayment() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }
        $obj_order = new Paypal_model();
        if ($this->session->userdata('order_data')) {
            $order_data = $this->session->userdata('order_data');
            
            //$data['order_details'] = $obj_order->get_order_basic_details($order_data['order_id']);

            $data['title'] = "Payment Information";
            $data['module'] = "paypal";
            $data['view_file'] = "front/thanks_payment";
            $this->template->front($data);
             
            $this->session->unset_userdata('order_data');//unset the array  
        }else{
            redirect(BASE_URL);
        }
        
    }//END thanksPayment()


    /*==========================================
    *This function is use for payment plan for credit card payment page
    */
    public function userSignupCreditCardPayment() {
        $user_info = userLoggedInInfo();
        if($user_info){
            if($user_info['user_type']==1){
                redirect(BASE_URL); // redirect home because this only club
            }
        }
        if(empty($this->user_id)){
            redirect(BASE_URL);
        }
        $data['module'] = "paypal";
        $data['view_file'] = "front/payment_plan";
        $this->template->front($data);
    }//END userSignupCreditCardPayment()

    
    /*===============================================
    *This function is use for signup with paid user payment 
    */
    public function userCreditCardPayment(){
        $plan_price = getBasicSetting('plan_price')->setting_value;
        $API_UserName = API_USERNAME;
        $API_Password = API_PASSWORD;
        $API_Signature = API_SIGNATURE;

        if($this->input->post()){
            if($this->form_validation->run('credit_card_validation') == FALSE){
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("please_enter_required_field").'</div>');    
                redirect(BASE_URL.'credit-card-payment');
            }else{
                $cardNumber = $this->input->post('number');
                $expiry_date = $this->input->post('expiry');
                $creditCvv = $this->input->post('cvc');
                $totalPrice = $plan_price;
                $cardname = cardTypeName($cardNumber);
                
                $explode_date = explode("/",$expiry_date);
            
                $exp_date = trim($explode_date[0]).ltrim($explode_date[1]);

                $country_code = 'US';
                $currency_type = 'USD';

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
                    'USER' => $API_UserName,
                    'PWD' => $API_Password,
                    'SIGNATURE' => $API_Signature,
                    'METHOD' => 'DoDirectPayment',
                    'IPADDRESS'=>'127.0.0.1',
                    'VERSION' => '86',
                    'PAYMENTACTION' => 'Sale',
                    'AMT' => $totalPrice,
                    'ACCT' => $cardNumber,
                    'CREDITCARDTYPE' => $cardname,
                    'CVV2' => $creditCvv,
                    'EXPDATE' => $exp_date,
                    'FIRSTNAME' => $this->session->userdata('userFullName'),
                    'LASTNAME' => '',
                    'COUNTRYCODE' => $country_code,
                    'CURRENCYCODE' => $currency_type
                )));

                $response = curl_exec($curl); 
                curl_close($curl);
                $nvp = array();
                if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
                    foreach ($matches['name'] as $offset => $name) {
                        $nvp[$name] = urldecode($matches['value'][$offset]);
                    }
                }
                //pr($nvp['ACK']);
                if(isset($nvp['ACK']) && $nvp['ACK']=='Success'){
                    $payment_date = explode("T",$nvp['TIMESTAMP']);
                    $orderStatusData = array('user_id'=>$this->user_id,'currency' => $nvp['CURRENCYCODE'] , 'amount'=> $nvp['AMT'], 'transaction_id' => $nvp['TRANSACTIONID'], 'payment_date' => $payment_date[0], 'payment_type' =>1, 'order_status' => 1, 'payment_status'=> $nvp['ACK'], 'created_at'=> date('Y-m-d'));
                    $order_id = $this->paypal_model->save_user_payment($orderStatusData);
                    
                    if($order_id){
                        $order_data = array(
                            'order_id' => $order_id, //Item Number    
                        );

                        $this->session->set_userdata('order_data', $order_data);

                        $accountStatusData = array('user_id'=>$this->user_id, 'order_id'=>$order_id, 'currency' => $nvp['CURRENCYCODE'] ,  'amount'=> $nvp['AMT'], 'transaction_id' => $nvp['TRANSACTIONID'], 'payment_date' => $payment_date[0], 'payment_type' =>1, 'order_status' => 1, 'payment_status'=> $nvp['ACK'], 'created_at'=> date('Y-m-d'));
                        $this->paypal_model->update_user_payment_account($accountStatusData, $this->user_id);

                        $update_paid_status = array("paid_status" => '2'); // for paid user
                        $this->paypal_model->update_paid_status($update_paid_status, $this->user_id);

                        //=====This function is use for send payment transaction notification message for user=======
                        
                        $fullname = $this->session->userdata('userFullName');
                        $to = $this->session->userdata('email');

                        $pay_message = lang("thanks_payment_message_for_email_notification");
                        $paypal_subject = lang("thanks_payment_subject_for_email_notification");

                        $this->sendPaymentNotificationEail($to, $paypal_subject, $fullname, $nvp['TRANSACTIONID'], $pay_message, $nvp['AMT']);
                        //=====This function is use for send payment transaction notification message for user=======

                        $unser_user_data = array("userFullName"=> '', 'email'=> '');
                        $this->session->unset_userdata($unser_user_data); // for unset session user info

                        $this->session->set_flashdata('success_message', '
                                <div class="alert alert-success">
                                    <span class="ui-icon ui-icon-check" style="float:left"></span> 
                                        '.$this->lang->line("action_completed_successefully").'<br>'.lang("message_for_transation_id").': '.$nvp['TRANSACTIONID'].'
                        </div>');    
                        redirect(BASE_URL.'thanks-payment');    
                    }else{
                        $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("common_message_something_wrong_please_try_again").'</div>');    
                        redirect(BASE_URL.'credit-card-payment');
                    }
                }else{

                    $accountStatusData = array('user_id'=>$this->user_id, 'order_id'=>$order_id, 'currency' => $nvp['CURRENCYCODE'] , 'amount'=> $nvp['AMT'], 'transaction_id' => $nvp['TRANSACTIONID'], 'payment_date' => $payment_date[0], 'payment_type' =>1, 'order_status' => 0, 'payment_status'=> $nvp['ACK'], 'created_at'=> date('Y-m-d'));
                    $this->paypal_model->update_user_payment_account($accountStatusData, $this->user_id);

                    $orderStatusData = array('user_id'=>$this->user_id,'currency' => $nvp['CURRENCYCODE'] , 'amount'=> $nvp['AMT'], 'transaction_id' => $nvp['TRANSACTIONID'], 'payment_date' => $payment_date[0], 'payment_type' =>1, 'order_status' => 0, 'payment_status'=> $nvp['ACK'], 'created_at'=> date('Y-m-d'));
                    $result = $this->paypal_model->save_user_payment($orderStatusData);

                    //=====This function is use for send payment transaction notification message for user=======
                        
                        $fullname = $this->session->userdata('userFullName');
                        $to = $this->session->userdata('email');

                        $pay_message = lang("thanks_payment_message_for_email_notification");
                        $paypal_subject = lang("thanks_payment_subject_for_email_notification");
                        $this->sendPaymentNotificationEail($to, $paypal_subject, $fullname, $nvp['TRANSACTIONID'], $pay_message, $nvp['AMT']);
                    //=====This function is use for send payment transaction notification message for user=======


                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("common_message_something_wrong_please_try_again").'</div>');    
                    redirect(BASE_URL.'credit-card-payment'); 
                }
            }
        }
        

    }//END userPayment();

    /*==============================================
    *This function is use for paypal express checkout
    */
    public function paypalExpressPayment() {
        $plan_price = getBasicSetting('plan_price')->setting_value;
        $this->load->library('mypaypal');

        $this->paypal_mode_url = '.sandbox'; // sandbox or live
        $this->paypal_mode = 'sandbox'; // sandbox or live

        $this->paypal_api_username = API_USERNAME; //PayPal API Username
        $this->paypal_api_password = API_PASSWORD; //Paypal API password
        $this->paypal_api_signature = API_SIGNATURE; //Paypal API Signature
        $this->paypal_currency_code = 'USD'; //Paypal Currency Code
        $this->paypal_return_url = BASE_URL . 'paypal/orderConfirmed'; //Point to process.php page
        $this->paypal_cancel_url = BASE_URL . 'paypal/orderFailed'; //Cancel URL if user clicks cancel
        $this->paypal_notify_url = BASE_URL . 'paypal/ipn'; //Cancel URL if user clicks cancel
        $this->paypal_error_url = BASE_URL . 'paypal/orderFailed'; //Cancel URL if user clicks cancel
        $img = getBasicSetting('site_name')->setting_code; //thumb img

        if (!empty($img)) {

            if (file_exists(BASE_PATH . $img)) {
                $img = base_url() . $img;
            }
            else {
                $img = SITE_NAME;
            }
        }
        $this->site_logo = $img;
//------------------------------------------------------------------------------
        if ($_POST) {
            $order_number = $this->user_id;
            $order_id = $this->user_id; //Item Number
            $ItemName = getBasicSetting('site_name')->setting_value . $this->user_id; //Item Name
            $ItemPrice = $plan_price; //Item Price
            $ItemNumber = $this->user_id; //Item Number
            $ItemDesc = $this->user_id; //Item Number
            $ItemQty = 1; // Item Quantity
            $ItemTotalPrice = $plan_price; //(Item Price x Quantity = Total) Get total amount of product; 
            //Other important variables like tax, shipping cost
            $TotalTaxAmount = 0.00;  //Sum of tax for all items in this order. 
            $HandalingCost = 0.00;  //Handling cost for this order.
            $InsuranceCost = 0.00;  //shipping insurance cost for this order.
            $ShippinDiscount = 0.00; //Shipping discount for this order. Specify this as negative number.
            $ShippinCost = 0.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
            //Grand total including all tax, insurance, shipping cost and discount
            $GrandTotal = $plan_price;

            $order_data = array(
                        'order_id' => $order_id, //Item Number    
                    );

            $this->session->set_userdata('order_data', $order_data);

            //Parameters for SetExpressCheckout, which will be sent to PayPal
            $padata='&METHOD=SetExpressCheckout' .
                    '&RETURNURL=' . urlencode($this->paypal_return_url) .
                    '&CANCELURL=' . urlencode($this->paypal_cancel_url) .
                    '&NOTIFYURL='.urlencode($this->paypal_notify_url).
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
                    '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
                    '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
                    '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
                    '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .


                    '&NOSHIPPING=1' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping

                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($this->paypal_currency_code) .
                    '&PAYMENTREQUEST_0_NOTIFYURL=' . urlencode($this->paypal_notify_url) .
                    '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
                    '&LOGOIMG=' . $this->site_logo . //site logo
                    '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
                    '&ALLOWNOTE=1';

            ############# set session variable we need later for "DoExpressCheckoutPayment" #######
            

            //We need to execute the "SetExpressCheckOut" method to obtain paypal token

            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $this->paypal_api_username, $this->paypal_api_password, $this->paypal_api_signature, $this->paypal_mode);

            //pr($httpParsedResponseAr);
            //Respond according to message we receive from Paypal
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                //Redirect user to PayPal store with Token received.
                //$paypalurl ='https://www'.$this->paypal_mode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
                $paypalurl = 'https://www' . $this->paypal_mode_url . '.paypal.com/checkoutnow?token=' . $httpParsedResponseAr["TOKEN"] . '';
                redirect($paypalurl);
            }
            else {
                //pr($httpParsedResponseAr);
                $order_data['status'] = 1; //error on sending data to paypal
                $order_data['note'] = urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);
                $this->session->set_userdata('order_data', $order_data);
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("common_message_something_wrong_please_try_again").'</div>');    
                redirect(base_url() . 'payment-option');
//                echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
//                echo '<pre>';
//                print_r($httpParsedResponseAr);
//                echo '</pre>';
            }
        }
        else {
            $this->session->set_flashdata('error_message', '<div class="alert alert-danger hideauto"><span class="ui-icon ui-icon-alert" style="float:left"></span> '.$this->lang->line("common_message_something_wrong_please_try_again").'</div>');    
            redirect(base_url() . 'payment-option');
        }

    }//END paypalExpressPayment()


    /*==============================================
    *This function is use for redirect confirmed order
    */
    public function orderConfirmed() {
        $plan_price = getBasicSetting('plan_price')->setting_value;
        $obj_order = new Paypal_model();
        $order_data = $this->session->userdata('order_data');

        //pr($order_data);
        $this->paypal_return_url = base_url() . 'paypal/orderConfirmed'; //Point to process.php page
        $this->paypal_cancel_url = base_url() . 'paypal/orderFailed'; //Cancel URL if user clicks cancel
        //   $this->paypal_notify_url = base_url() . 'paypal/ipn'; //Cancel URL if user clicks cancel
        $this->paypal_error_url = base_url() . 'paypal/orderFailed'; //Cancel URL if user clicks cancel
        //      if ($order_data) {
        //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID

        if ($order_data && $this->input->get('token') && $this->input->get('PayerID')) {
            $this->load->library('mypaypal');

            $this->paypal_mode_url = '.sandbox'; // sandbox or live
            $this->paypal_mode = 'sandbox';// sandbox or live
            $this->paypal_module_mode = 0; // 0 sandbox 1 live

            $this->paypal_api_username = API_USERNAME; //PayPal API Username
            $this->paypal_api_password = API_PASSWORD; //Paypal API password
            $this->paypal_api_signature = API_SIGNATURE; //Paypal API Signature

            $this->paypal_currency_code = 'USD'; //Paypal Currency Code
            //------------------------------------------------------------------------------

            $token = $this->input->get('token');
            $payer_id = $this->input->get('PayerID');

            //we will be using these two variables to execute the "DoExpressCheckoutPayment"
            //Note: we haven't received any payment yet.
            //get session variables

            //$order = $obj_order->getOrderBasicDetails($order_id, $this->user_id);

            $GrandTotal = $plan_price;

            $padata='&TOKEN=' . urlencode($token) .
                    '&PAYERID=' . urlencode($payer_id) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($this->paypal_currency_code);

            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $this->paypal_api_username, $this->paypal_api_password, $this->paypal_api_signature, $this->paypal_mode);

            //pr($httpParsedResponseAr);
            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    $order_status = 1;
                    $orderStatusData = array('user_id'=>$this->user_id,
                                             'currency' => 'USD', 
                                             'transaction_id' => $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], 
                                             'payment_date' => getDateTime(), 
                                             'payment_type' =>2, 
                                             'amount' => urldecode($httpParsedResponseAr['PAYMENTINFO_0_AMT']),
                                             'order_status' => $order_status, 
                                             'payment_status'=> $httpParsedResponseAr['ACK'], 
                                             'created_at'=> getDateTime()
                                        );
                    
                    $orderId = $obj_order->save_user_payment($orderStatusData);

                    $user_info = getUserInfoById($this->user_id);
                    //=====This function is use for send payment transaction notification message for user=======
                        
                        $fullname = $user_info('first_name'). " ".$user_info['last_name'];
                        $to = $user_info('email');

                        $pay_message = lang("thanks_payment_message_for_email_notification");
                        $paypal_subject = lang("thanks_payment_subject_for_email_notification");
                        $this->sendPaymentNotificationEail($to, $paypal_subject, $fullname, $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], $pay_message, $httpParsedResponseAr['PAYMENTINFO_0_AMT']);
                    //=====This function is use for send payment transaction notification message for user=======


                    $order_data = array(
                        'order_id' => $orderId, //Item Number    
                    );

                    $this->session->set_userdata('order_data', $order_data);


                    $orderStatusData = array('user_id'=>$this->user_id,
                                             'order_id' => $orderId, 
                                             'currency' => 'USD', 
                                             'transaction_id' => $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], 
                                             'payment_date' => getDateTime(),
                                             'payment_type' =>2, 
                                             'amount' => urldecode($httpParsedResponseAr['PAYMENTINFO_0_AMT']),
                                             'order_status' => $order_status, 
                                             'payment_status'=> $httpParsedResponseAr['ACK'], 
                                             'created_at'=> getDateTime()
                                        );
                    
                    $order_id = $obj_order->update_user_payment_account($orderStatusData, $this->user_id);

                    $update_paid_status = array("paid_status" => '2'); // for paid user
                    $this->paypal_model->update_paid_status($update_paid_status, $this->user_id);
                    
                    //set the payment status 
                    $order_data['order_status'] = 1; //successfull place now you can redirect to success page
                    //         $order_data['payment_status'] = 2; // transaction completed
                    $this->session->set_userdata('order_data', $order_data);
                    $this->session->set_flashdata('success_message', '
                                <div class="alert alert-success">
                                    <span class="ui-icon ui-icon-check" style="float:left"></span> 
                                        '.$this->lang->line("action_completed_successefully").'<br>'.lang("message_for_transation_id").': '.$httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'].'
                        </div>');  
                    redirect(BASE_URL.'thanks-payment');    
                }
                elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {

                    $order_status = 0;
                    $orderStatusData = array('user_id'=>$this->user_id,
                                             'currency' => 'USD', 
                                             'transaction_id' => $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], 
                                             'payment_date' => getDateTime(),
                                             'payment_type' =>2, 
                                             'amount' => urldecode($httpParsedResponseAr['PAYMENTINFO_0_AMT']),
                                             'order_status' => $order_status, 
                                             'payment_status'=> $httpParsedResponseAr['ACK'], 
                                             'created_at'=> getDateTime()
                                        );
                    
                    $orderId = $obj_order->save_user_payment($orderStatusData);


                    $orderStatusData = array('user_id'=>$this->user_id,
                                             'order_id' => $orderId, 
                                             'currency' => 'USD', 
                                             'transaction_id' => $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], 
                                             'payment_date' => getDateTime(),
                                             'payment_type' =>2, 
                                             'amount' => urldecode($httpParsedResponseAr['PAYMENTINFO_0_AMT']),
                                             'order_status' => $order_status, 
                                             'payment_status'=> $httpParsedResponseAr['ACK'], 
                                             'created_at'=> getDateTime()
                                        );
                    
                    $order_id = $obj_order->update_user_payment_account($orderStatusData, $this->user_id);
                    $order_data['order_status'] = 1; //successfull place now you can redirect to success page
                    $this->session->set_userdata('order_data', $order_data);

                    $user_info = getUserInfoById($this->user_id);
                    //=====This function is use for send payment transaction notification message for user=======
                        
                        $fullname = $user_info('first_name'). " ".$user_info['last_name'];
                        $to = $user_info('email');

                        $pay_message = lang("thanks_payment_message_for_email_notification");
                        $paypal_subject = lang("thanks_payment_subject_for_email_notification");
                        $this->sendPaymentNotificationEail($to, $paypal_subject, $fullname, $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], $pay_message, $httpParsedResponseAr['PAYMENTINFO_0_AMT']);
                    //=====This function is use for send payment transaction notification message for user=======


                    $this->session->set_flashdata('success_message', '<div class="alert alert-success hideauto"><span class="ui-icon ui-icon-check" style="float:left"></span> 
                                                  '.$this->lang->line("pending_transaction_msg_transaction_complete").'<br>
                                                  '.$this->lang->line("you_need_to_manually_authrize_this_payment").
                                                  '<a target="_new" href="http://www.paypal.com">'.lang("button_paypal_account").'</a></div>');    
                    redirect(BASE_URL . 'thanks-payment');
                }
                  
                redirect($this->paypal_error_url);
                exit;
            }
            else {

                $order_status = 2;

                $orderStatusData = array('user_id'=>$this->user_id,
                                         'order_status' => $order_status, 
                                         'created_at'=> getDateTime()
                                        );
                    
                $orderId = $obj_order->save_user_payment($orderStatusData);
                
                $err = '';
                foreach (array($httpParsedResponseAr["L_LONGMESSAGE0"]) as $key => $value) {
                    $err .=$value . '<br>';
                }
                $this->session->set_flashdata('error_message', $err);
                  
                redirect($this->paypal_error_url);
                exit;

            }
        }else {
            
            redirect($this->paypal_error_url);
            exit;
        }
    }
//http://localhost/vero/paypal/orderConfirmed?token=EC-4HS82159UK706143G&PayerID=CC4MYSAZYECL4
    /*
     * function to get ipn notification
     */

    public function ipn() {
        $obj_order = new Paypal_model();
        $this->load->library('ipnlistener');
        $listener = new IpnListener();

        /*
          When you are testing your IPN script you should be using a PayPal "Sandbox"
          account: https://developer.paypal.com
          When you are ready to go live change use_sandbox to false.
         */
        $listener->use_sandbox = TRUE;
        $listener->use_ssl = true;
        $listener->use_curl = false;


        /*
          By default the IpnListener object is going  going to post the data back to PayPal
          using cURL over a secure SSL connection. This is the recommended way to post
          the data back, however, some people may have connections problems using this
          method.

          To post over standard HTTP connection, use:
          $listener->use_ssl = false;

          To post using the fsockopen() function rather than cURL, use:
          $listener->use_curl = false;
         */

        /*
          The processIpn() method will encode the POST variables sent by PayPal and then
          POST them back to the PayPal server. An exception will be thrown if there is
          a fatal error (cannot connect, your server is not configured properly, etc.).
          Use a try/catch block to catch these fatal errors and log to the ipn_errors.log
          file we setup at the top of this file.

          The processIpn() method will send the raw data on 'php://input' to PayPal. You
          can optionally pass the data to processIpn() yourself:
          $verified = $listener->processIpn($my_post_data);
         */
        try {
            $listener->requirePostMethod();
            $verified = $listener->processIpn();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit(0);
        }


        /*
          The processIpn() method returned true if the IPN was "VERIFIED" and false if it
          was "INVALID".
         */
        if ($verified) {
            /*
              Once you have a verified IPN you need to do a few more checks on the POST
              fields--typically against data you stored in your database during when the
              end user made a purchase (such as in the "success" page on a web payments
              standard button). The fields PayPal recommends checking are:

              1. Check the $_POST['payment_status'] is "Completed"
              2. Check that $_POST['txn_id'] has not been previously processed
              3. Check that $_POST['receiver_email'] is your Primary PayPal email
              4. Check that $_POST['payment_amount'] and $_POST['payment_currency']
              are correct

              Since implementations on this varies, I will leave these checks out of this
              example and just send an email using the getTextReport() method to get all
              of the details about the IPN.
             */
            $errors = '';
            // set data
            //$banner_ads_id = explode("_", $_POST['item_number']);
            //$banner_ads_id = end($banner_ads_id);

            /*
             * save the order status and data in database
             */
            
            $post = serialize($_POST);
            if (isset($_POST['PAYMENTREQUEST_n_INVNUM'])) {
                $order_id = $_POST['PAYMENTREQUEST_n_INVNUM'];
            }
            else {
                $order_id = '0';
            }
            $order_status = 0;
            if ($_POST['payment_status'] === 'Completed') { // if payment status completed
                $payment_status = 2;
            }
            else if ($_POST['payment_status'] === 'Pending') { // if payment status pending
                $payment_status = 1;
            }
            else {
                $order_status = 2;
                $payment_status = 3;
            }
//            else if ($_POST['payment_status'] === 'Declined') { // if payment status declined
//            }
            if (isset($order_status) && $order_id > 0) {
                $orderStatusData = array('user_id'=>$this->user_id,
                                         'currency' => 'USD', 
                                         'transaction_id' => $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], 
                                         'payment_date' => getDateTime(),  
                                         'payment_type' =>2, 
                                         'amount' => urldecode($httpParsedResponseAr['PAYMENTINFO_0_AMT']),
                                         'order_status' => $order_status, 
                                         'payment_status'=> $httpParsedResponseAr['ACK'], 
                                         'created_at'=> getDateTime()
                                    );
                    
                $orderId = $obj_order->save_user_payment($orderStatusData);


                $orderStatusData = array('user_id'=>$this->user_id,
                                         'order_id' => $orderId, 
                                         'currency' => 'USD', 
                                         'transaction_id' => $httpParsedResponseAr['PAYMENTINFO_0_TRANSACTIONID'], 
                                         'payment_date' => getDateTime(),  
                                         'payment_type' =>2, 
                                         'amount' => urldecode($httpParsedResponseAr['PAYMENTINFO_0_AMT']),
                                         'order_status' => $order_status, 
                                         'payment_status'=> $httpParsedResponseAr['ACK'], 
                                         'created_at'=> getDateTime()
                                    );
                
                $order_id = $obj_order->update_user_payment_account($orderStatusData, $this->user_id);

            }
            //   succeedTransaction($db, $listener->getTextReport(), $banner_ads_id);
        }
        else {
            /*
              An Invalid IPN *may* be caused by a fraudulent transaction attempt. It's
              a good idea to have a developer or sys admin manually investigate any
              invalid IPN.
             */
            //send('email@email.com', 'Invalid IPN', $listener->getTextReport());
            
            $order_status = 2;
            $orderStatusData = array('user_id'=>$this->user_id,
                                         'order_status' => $order_status, 
                                         'created_at'=> getDateTime()
                                        );
            $orderId = $obj_order->save_user_payment($orderStatusData);

            failedTransaction('Failed Transaction', $listener->getTextReport());
        }
    }


    /*============================================
    *This function is use for send user registration verification mail
    */
    public function sendPaymentNotificationEail($to, $paypal_subject, $fullname, $transaction_id = false, $pay_message, $amount = false) {   
        // echo "To=>". $to."<br>";
        // echo "Subject=>". $paypal_subject."<br>";
        // echo "Full Name=>". $fullname."<br>";
        // echo "TaID=>". $transaction_id."<br>";
        // echo "PayMsh=>". $pay_message."<br>";
        // echo "AMT=>". $amount;
        // die;
        $this->load->helper('my_email');     
        if($transaction_id){
            $tansID = lang("message_for_transation_id") .':'. $transaction_id;
        }else{
            $tansID = "";
        }

        if($amount){
            $amt = lang("label_for_amount") .':'. $amount;
        }else{
            $amt = "";
        }

        $subject = $paypal_subject;
        $message =  $this->lang->line("hi") .' '. $fullname.' <br>' .$pay_message;

        if($tansID && $amt){
            $message = '
            <br>-------------------------------------------------<br>'
            .$tansID.'<br>'
            .$amt. '<br>
            -------------------------------------------------<br>';    
        }
        
        $message = lang("email_footer_label_thanks");
        
        $res = sendEmail($subject, $message, $to, $emailBannerTitle = $subject, $emailBannerLogo = FALSE, $cc = FALSE, $attachment = array(), $templateType = "common");
    }//END send_verification_mail()
    


    
}

// close class here 
