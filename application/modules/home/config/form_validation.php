<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Setting contact us form validation rules
 */

$config['contact_us_validation'] = array(
    array(
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required|trim||xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|xss_clean|strip_tags'
    ),
    array(
        'field' => 'message',
        'label' => 'Message',
        'rules' => 'required|trim|xss_clean|strip_tags'
    )
    
);


