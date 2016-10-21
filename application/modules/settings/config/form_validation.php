<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * Setting "Paypal Live Setting" form validation rules
 */
$config['add_live_paypal'] = array(
    array(
        'field' => 'live_user_id',
        'label' => 'Live User ID ',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'live_password',
        'label' => 'Live Password',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'live_signature',
        'label' => 'Live Signature',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    )
);

/**
 * Setting "Paypal Sandbox Setting" form validation rules
 */
$config['add_sandbox_paypal'] = array(
    array(
        'field' => 'sandbox_user_id',
        'label' => 'Sandbox User ID',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'sandbox_password',
        'label' => 'Sandbox Password',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'sandbox_signature',
        'label' => 'Sandbox Signature',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    )
);

/**
 * Setting "Payment Setting" form validation rules
 */
$config['payment_settings'] = array(
    array(
        'field' => 'currency_name',
        'label' => 'Currency Name',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'currency_symbol',
        'label' => 'Currency Symbol',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    )
);


/**
 * Setting "Company Setting" form validation rules
 */
$config['company_settings'] = array(
    array(
        'field' => 'creditor_identifier',
        'label' => 'Creditor Identifier Name',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'name_compay',
        'label' => 'Name/Company',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'street',
        'label' => 'Street',
        'rules' => 'required|trim|max_length[10]|xss_clean'
    ),
    array(
        'field' => 'zip',
        'label' => 'Zip',
        'rules' => 'required|numeric|trim|max_length[10]|xss_clean'
    ),
    array(
        'field' => 'place',
        'label' => 'Place',
        'rules' => 'required|trim|max_length[40]|xss_clean'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    )
);




