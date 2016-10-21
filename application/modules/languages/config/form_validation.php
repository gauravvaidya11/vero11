<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Setting add language management form validation rules
 */
$config['language'] = array(
    array(
        'field' => 'lang_name',
        'label' => 'Language Name',
        'rules' => 'required|trim|max_length[100]|is_unique[tbl_languages.lang_name]|xss_clean'
    ),
    array(
        'field' => 'lang_code',
        'label' => 'Language Code',
        'rules' => 'required|trim|max_length[100]|is_unique[tbl_languages.lang_code]|xss_clean'
    ),

);

/**
 * Setting add language management form validation rules
 */
$config['add_lang_field'] = array(
    array(
        'field' => 'field',
        'label' => 'Language Name',
        'rules' => 'required|trim|max_length[100]|xss_clean'
    )
);




