<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



/**
 * Setting for athlete registration form validation rules
 */
$config['credit_card_validation'] = array(
    array(
        'field' => 'number',
        'label' => 'Card Number',
        'rules' => 'required|trim|max_length[19]|xss_clean'
    ),
    array(
        'field' => 'expiry',
        'label' => 'Expiry Date',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),
   
    array(
        'field' => 'cvc',
        'label' => 'Cvv No',
        'rules' => 'required|trim|max_length[4]|xss_clean|strip_tags'
    )
);

