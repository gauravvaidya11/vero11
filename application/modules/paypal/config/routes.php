<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//==========Stary Front routes here==========

$route['credit-card-payment'] = "paypal/userSignupCreditCardPayment";
$route['payment-option'] = "paypal/userPaymentOption";
$route['payment-type'] = "paypal/userPaymentOption";

$route['paypal-express'] = "paypal/paypalExpressPayment";


$route['club-payment'] = "paypal/userCreditCardPayment";

$route['thanks-payment'] = "paypal/thanksPayment";

$route['admin-payment-account-list'] = "paypal/admin/paymentList";
$route['admin-payment-details/(:any)'] = "paypal/admin/viewPaymentDetails/$1";
$route['admin-payment-list/(:any)'] = "paypal/admin/getAllPaymentList/$1";


//==========End front routes here==========







/* End of file routes.php */
/* Location: ./application/config/routes.php */
