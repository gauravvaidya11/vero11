<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * Setting add/update category form validation rules
 */
$config['email_template'] = array(
    array(
        'field' => 'name',
        'label' => 'Email template Name',
        'rules' => 'required|trim|max_length[64]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'html_content',
        'label' => 'Email template content',
        'rules' => 'required|trim'
    )
);


