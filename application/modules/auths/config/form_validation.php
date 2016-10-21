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
 * Setting for front customer registration form validation rules
 */
$config['front_customer_registration'] = array(
    array(
        'field' => 'email',
        'label' => 'Email Id',
        'rules' => 'required|email|trim|max_length[50]|xss_clean|strip_tags'
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
//    array(
//        'field' => 'password',
//        'label' => 'Password',
//        'rules' => 'required|min_length[6]|max_length[30]|xss_clean|strip_tags'
//    ),
    array(
        'field' => 'gender',
        'label' => 'Gender',
        'rules' => 'required'
    ),
//    array(
//        'field' => 'height',
//        'label' => 'Height',
//        'rules' => 'required'
//    ),
//    array(
//        'field' => 'weight',
//        'label' => 'Weight',
//        'rules' => 'required'
//    ),
//    array(
//        'field' => 'birthday',
//        'label' => 'Birthday',
//        'rules' => 'required'
//    ),
//     array(
//        'field' => 'laterality',
//        'label' => 'Laterality',
//        'rules' => 'required'
//    ),
    // array(
    //     'field' => 'cpf_field',
    //     'label' => 'CPF',
    //     'rules' => 'required|callback_cpf_check'
    // ),
//    array(
//        'field' => 'position_1',
//        'label' => 'Playing position 1',
//        'rules' => 'required'
//    ),
//    array(
//        'field' => 'player_type',
//        'label' => 'Player Type',
//        'rules' => 'required'
//    ),
//    array(
//        'field' => 'country',
//        'label' => 'Country',
//        'rules' => 'required'
//    ),
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
 * Setting front profile and user validation rules
 */
$config['users_validation'] = array(
    array(
        'field' => 'username',
        'label' => 'User Name',
        'rules' => 'required|trim|max_length[50]|callback_username_valid|xss_clean|strip_tags'
    ),
    array(
        'field' => 'first_name',
        'label' => 'First name',
        'rules' => 'required|trim|max_length[40]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'last_name',
        'label' => 'Last name',
        'rules' => 'trim|max_length[40]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'gender',
        'label' => 'Gender',
        'rules' => 'trim|max_length[1]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'country_dailing_code',
        'label' => 'Dialing Code',
        'rules' => 'trim|required|xss_clean|strip_tags|numeric'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|max_length[50]|valid_email|callback_checkEmailAvailable|xss_clean|strip_tags'
    ),
    array(
        'field' => 'mobile',
        'label' => 'Mobile',
        'rules' => 'trim|required|min_length[9]|max_length[15]|numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'street_address',
        'label' => 'Stress Address',
        'rules' => 'required|max_length[200]|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'street_number',
        'label' => 'Stress Number',
        'rules' => 'required|max_length[200]|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'max_length[700]|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'area',
        'label' => 'Area',
        'rules' => 'trim|numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'city',
        'label' => 'City',
        'rules' => 'required|trim|max_length[60]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'post_code',
        'label' => 'Postal Code',
        'rules' => 'required|trim|max_length[9]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'state',
        'label' => 'State',
        'rules' => 'required|trim|numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'latitude',
        'label' => 'Latitude',
        'rules' => 'required|trim|max_length[45]|greater_than[-91]|less_than[91]numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'longitude',
        'label' => 'Longitude',
        'rules' => 'required|trim|max_length[45]|greater_than[-181]|less_than[181]|numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'birth_day',
        'label' => 'Birth Day',
        'rules' => 'required|trim|max_length[25]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'current_weight',
        'label' => 'Current Weight',
        'rules' => 'required|trim|max_length[5]|xss_clean|strip_tags|numeric'
    ),
    array(
        'field' => 'target_weight',
        'label' => 'Target Weight',
        'rules' => 'required|trim|max_length[5]|xss_clean|strip_tags|numeric'
    ),
    array(
        'field' => 'height',
        'label' => 'Height',
        'rules' => 'required|trim|max_length[10]|xss_clean|strip_tags|numeric'
    ),
    array(
        'field' => 'activity_level',
        'label' => 'Active Level',
        'rules' => 'required|trim|max_length[1]|xss_clean|strip_tags|integer|is_natural_no_zero'
    ),
    array(
        'field' => 'current_weight_unit',
        'label' => 'Current Weight Unit',
        'rules' => 'required|trim|max_length[1]|xss_clean|strip_tags|integer|is_natural_no_zero'
    ),
    array(
        'field' => 'target_weight_unit',
        'label' => 'Target Weight Unit',
        'rules' => 'required|trim|max_length[1]|xss_clean|strip_tags|integer|is_natural_no_zero'
    )
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





/**
 * Setting update dealer form validation rules
 */
$config['edit_dealer'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'required|trim|max_length[40]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'mobile',
        'label' => 'Mobile',
        'rules' => 'integer|numeric|max_length[15]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|xss_clean|strip_tags'
    )
);


/**
 * Setting add/update dealer form validation rules
 */
$config['dealer'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'required|trim|max_length[50]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|max_length[100]|email|xss_clean|strip_tags'
    ),
    array(
        'field' => 'mobile',
        'label' => 'Mobile',
        'rules' => 'required|integer|max_length[15]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|xss_clean|strip_tags'
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
