<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Setting login form validation rules
 */
$config['login'] = array(
    array(
        'field' => 'admin_password',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[6]|max_length[20]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'admin_username',
        'label' => 'Username',
        'rules' => 'required|trim|valid_email|xss_clean|strip_tags'
    )
);


/**
 * Setting for front login form validation rules
 */
$config['front_login'] = array(
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean|strip_tags'
    )
);


/**
 * Setting for athlete registration form validation rules
 */
$config['club_registration'] = array(
    array(
        'field' => 'club_name',
        'label' => 'Club Name',
        'rules' => 'required|trim||xss_clean|strip_tags'
    ),
    array(
        'field' => 'club_manager_name',
        'label' => 'Club Manager Name',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),

    array(
        'field' => 'birthday',
        'label' => 'Birthday',
        'rules' => 'required|xss_clean|strip_tags'
    )
);


/**
 * Setting for athlete registration form validation rules
 */
$config['athlete_registration'] = array(
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|xss_clean|callback_username_check'
    ),
    array(
        'field' => 'fname',
        'label' => 'First Name',
        'rules' => 'required|trim|max_length[50]|xss_clean|strip_tags'
    ),
   
    array(
        'field' => 'lname',
        'label' => 'Last Name',
        'rules' => 'required|trim|max_length[50]|xss_clean|strip_tags'
    ),

    array(
        'field' => 'gender',
        'label' => 'Gender',
        'rules' => 'required'
    )
);


 /* Setting for athlete login form validation rules
 */
$config['athlete_login'] = array(
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|trim|max_length[50]|xss_clean|strip_tags'
    ),   
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|min_length[6]|max_length[30]|xss_clean|strip_tags'
    ),
);



/**
 * Setting change password validation rules
 */
$config['changepassword'] = array(
    array(
        'field' => 'currentpass',
        'label' => 'Current Password',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'new_password',
        'label' => 'New Password',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'retry_password',
        'label' => 'Re-type New Password',
        'rules' => 'required|xss_clean|strip_tags'
    )
);


/**
 * Setting forgot password validation rules
 */
$config['forgot_password'] = array(
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|email|xss_clean|strip_tags'
    )
);


/**
 * Setting for reset password form validation rules
 */
$config['reset_password'] = array(
    array(
        'field' => 'newpass',
        'label' => 'New Password',
        'rules' => 'required|min_length[6]|max_length[30]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|email|xss_clean|strip_tags'
    )
);



/*
 * Form Validation for Admin User Login
 */
$config['user_login'] = array(
    array(
        'field' => 'admin_user_password',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[6]|max_length[20]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'admin_user_username',
        'label' => 'Username',
        'rules' => 'required|trim|valid_email|xss_clean|strip_tags'
    ),
);
