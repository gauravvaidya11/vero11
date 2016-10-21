<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * This is for suggestion for customer by admin to businness user
 * create -773
 */
$config['suggest_customer'] = array(
    array(
        'field' => 'customer_id',
        'label' => 'Customer',
        'rules' => 'required|numeric|trim|xss_clean'
    ),
    array(
        'field' => 'business_id',
        'label' => 'Business User',
        'rules' => 'required|numeric|trim|xss_clean'
    ),
    array(
        'field' => 'business_cat_id',
        'label' => 'Business Category',
        'rules' => 'required|numeric|trim|xss_clean'
    ),
    array(
        'field' => 'note',
        'label' => 'Note',
        'rules' => 'required|max_length[100]|trim|xss_clean'
    )
);

/**
 * Setting login form validation rules
 */
$config['login'] = array(
    array(
        'field' => 'admin_password',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[6]|max_length[20]|xss_clean'
    ),
    array(
        'field' => 'admin_username',
        'label' => 'Username',
        'rules' => 'required|trim|valid_email|xss_clean'
    )
);


/**
 * Setting for front login form validation rules
 */
$config['front_login'] = array(
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[6]|max_length[20]|xss_clean'
    ),
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|xss_clean'
    )
);

/**
 * Setting front profile and user validation rules
 */
$config['users_validation'] = array(
    array(
        'field' => 'username',
        'label' => 'User Name',
        'rules' => 'required|trim|min_length[3]|max_length[30]|xss_clean'
    ),
    array(
        'field' => 'first_name',
        'label' => 'First name',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'phone',
        'label' => 'Phone',
        'rules' => 'required|trim|numeric|xss_clean'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|xss_clean'
    )
);

$config['users_profile'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First name',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'phone',
        'label' => 'Phone',
        'rules' => 'required|trim|numeric|xss_clean'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|xss_clean'
    )
);


/**
 * Setting change admin profile form validation rules
 */
$config['adminprofile'] = array(
    array(
        'field' => 'firstname',
        'label' => 'Firstname',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'lastname',
        'label' => 'Lastname',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|xss_clean'
    )
);

/**
 * Setting change password validation rules
 */
$config['changepassword'] = array(
    array(
        'field' => 'currentpass',
        'label' => 'Current Password',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'new_password',
        'label' => 'New Password',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'retry_password',
        'label' => 'Re-type New Password',
        'rules' => 'required|xss_clean'
    )
);


/**
 * Setting forgot password validation rules
 */
$config['forgot_password'] = array(
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|email|xss_clean'
    )
);


/**
 * Setting for reset password form validation rules
 */
$config['reset_password'] = array(
    array(
        'field' => 'password',
        'label' => 'New Password',
        'rules' => 'required|min_length[5]|xss_clean'
    ),
    array(
        'field' => 'confirm_pass',
        'label' => 'Confirm Password',
        'rules' => 'required|min_length[5]|matches[password]|xss_clean'
    )
);



/**
 * Setting change images validation rules
 */
$config['images'] = array(
    array(
        'field' => 'avtarimage',
        'label' => 'Select Image',
        'rules' => 'required|xss_clean'
    )
);



/**
 * Setting add/update category form validation rules
 */
$config['category'] = array(
    array(
        'field' => 'name',
        'label' => 'Category Name',
        'rules' => 'required|trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'sequence',
        'label' => 'Sequence',
        'rules' => 'integer|trim|max_length[5]|xss_clean'
    ),
    array(
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'excerpt',
        'label' => 'Excerpt',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'slug',
        'label' => 'Slug',
        'rules' => 'trim|max_length[64]|xss_clean'
    )
);


/**
 * Setting update dealer form validation rules
 */
$config['edit_dealer'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'phone',
        'label' => 'phone',
        'rules' => 'required|integer|numeric|max_length[15]|xss_clean'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|xss_clean'
    )
);


/**
 * Setting add/update dealer form validation rules
 */
$config['dealer'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'required|trim|max_length[50]|xss_clean'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|max_length[100]|email|xss_clean'
    ),
    array(
        'field' => 'phone',
        'label' => 'phone',
        'rules' => 'required|integer|max_length[15]|xss_clean'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|trim|xss_clean'
    )
);

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
    )
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

/**
 * Setting add/update products form validation rules
 */
$config['product'] = array(
    array(
        'field' => 'name',
        'label' => 'Product Name',
        'rules' => 'required|trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'quantity',
        'label' => 'Quantity',
        'rules' => 'trim|numeric'
    ),
    array(
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'excerpt',
        'label' => 'Excerpt',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'slug',
        'label' => 'Slug',
        'rules' => 'trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'sku',
        'label' => 'SKU Code',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'weight',
        'label' => 'Slug',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'shippable',
        'label' => 'Shipping value',
        'rules' => 'trim|numeric'
    ),
    array(
        'field' => 'taxable',
        'label' => 'Taxable',
        'rules' => 'trim|numeric'
    ),
    array(
        'field' => 'price',
        'label' => 'Retail Price',
        'rules' => 'trim|numeric|floatval'
    ),
    array(
        'field' => 'saleprice',
        'label' => 'Saling Price',
        'rules' => 'trim|numeric|floatval'
    )
);

/**
 * Setting add/update forum form validation rules
 */
$config['forum'] = array(
    array(
        'field' => 'name',
        'label' => 'Forum category title',
        'rules' => 'required|trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'slug',
        'label' => 'URL Keyword',
        'rules' => 'trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim|xss_clean'
    ),
    array(
        'field' => 'position',
        'label' => 'Position',
        'rules' => 'trim|numeric'
    ),
    array(
        'field' => 'closed',
        'label' => 'closed',
        'rules' => 'trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'trim|xss_clean'
    )
);

/*
 * validation rule of checkout address of order
 */
$config['cart_checkout_address'] = array(
    array(
        'field' => 'company',
        'label' => 'address_company',
        'rules' => 'trim|max_length[128]|xss_clean'
    ),
    array(
        'field' => 'firstname',
        'label' => 'address_firstname',
        'rules' => 'trim|required|max_length[32]'
    ),
    array(
        'field' => 'lastname',
        'label' => 'address_lastname',
        'rules' => 'trim|required|max_length[32]'
    ),
    array(
        'field' => 'email',
        'label' => 'address_email',
        'rules' => 'trim|required|valid_email|max_length[128]'
    ),
    array(
        'field' => 'phone',
        'label' => 'address_phone',
        'rules' => 'trim|required|max_length[32]'
    ),
    array(
        'field' => 'address1',
        'label' => 'address',
        'rules' => 'trim|required|max_length[128]'
    ),
    array(
        'field' => 'address2',
        'label' => 'address2',
        'rules' => 'trim|max_length[128]'
    ),
    array(
        'field' => 'city',
        'label' => 'address_city',
        'rules' => 'trim|required|max_length[32]'
    ),
    array(
        'field' => 'country_id',
        'label' => 'address_country',
        'rules' => 'trim|required|numeric'
    ),
    array(
        'field' => 'zone_id',
        'label' => 'address_state',
        'rules' => 'trim|required|numeric'
    ),
    array(
        'field' => 'zip',
        'label' => 'address_zip',
        'rules' => 'trim|required|max_length[32]'
    )
);


/**
 * Setting add/update forum Comment form validation rules
 */
$config['forum_comment'] = array(
    array(
        'field' => 'id_topic',
        'label' => 'Forum Topic Id',
        'rules' => 'required|trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'id_customer',
        'label' => 'Id Customer',
        'rules' => 'required|trim|max_length[64]|xss_clean'
    ),
    array(
        'field' => 'comment',
        'label' => 'Description',
        'rules' => 'required|trim|xss_clean'
    )
);

/**
 * Setting add Paypal Setting form validation rules
 */
$config['add_live_paypal'] = array(
    array(
        'field' => 'live_user_id',
        'label' => 'User ID ',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'live_password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'live_signature',
        'label' => 'Signature',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    )
);

/**
 * Setting add Paypal Setting form validation rules
 */
$config['add_sandbox_paypal'] = array(
    array(
        'field' => 'sandbox_user_id',
        'label' => 'User ID ',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'sandbox_password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean'
    ),
    array(
        'field' => 'sandbox_signature',
        'label' => 'Signature',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    )
);

/**
 * rule for shipping carrier to add / update
 */
$config['carrier'] = array(
    array(
        'field' => 'name',
        'label' => 'Carrier Name',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'transit_time',
        'label' => 'Transit Time',
        'rules' => 'required|trim|max_length[150]|xss_clean'
    ),
    array(
        'field' => 'handling_cost',
        'label' => 'Handling Cost',
        'rules' => 'required|trim|intiger|max_length[150]|xss_clean'
    )
);

/**
 * Setting change user_setting validation rules
 */
$config['user_setting'] = array(
    array(
        'field' => 'dealer_range',
        'label' => 'Dealer Range',
        'rules' => 'required|trim|numeric|max_length[50]xss_clean'
    )
);


/*
 * Add Customer Form Validation Rules
 */
$config['add_customer'] = array(
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
        'rules' => 'trim|required|max_length[15]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Password',
        'rules' => 'required|trim|max_length[80]|valid_email|xss_clean|strip_tags'
    ),
    array(
        'field' => 'mobile',
        'label' => 'Mobile',
        'rules' => 'trim|required|min_length[9]|max_length[15]|numeric|xss_clean|strip_tags'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'max_length[700]|trim|xss_clean|strip_tags'
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
//END Add Customer Form Validation Rules

$config['edit_customer'] = array(
    array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'required|trim|max_length[40]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'last_name',
        'label' => 'Last name',
        'rules' => 'trim|max_length[40]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|max_length[50]|valid_email|xss_clean|callback_checkEmailAvailable|strip_tags'
    ),
    array(
        'field' => 'country_dailing_code',
        'label' => 'Country Dailing Code',
        'rules' => 'required|numeric|trim|xss_clean'
    ),
    array(
        'field' => 'mobile',
        'label' => 'Mobile',
        'rules' => 'trim|required|min_length[9]|max_length[15]|numeric|xss_clean'
    ),
    array(
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'trim|xss_clean|max_length[300]|strip_tags'
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
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|numeric|trim|xss_clean'
    ),
    array(
        'field' => 'state',
        'label' => 'State',
        'rules' => 'required|trim|numeric|xss_clean'
    ),
    array(
        'field' => 'city',
        'label' => 'City',
        'rules' => 'required|trim|xss_clean|max_length[60]|strip_tags'
    ),
    array(
        'field' => 'post_code',
        'label' => 'Post Code',
        'rules' => 'required|trim|xss_clean|max_length[9]|strip_tags'
    ),
    array(
        'field' => 'latitude',
        'label' => 'Latitude',
        'rules' => 'required|trim|max_length[45]|greater_than[-91]|less_than[91]numeric|xss_clean'
    ),
    array(
        'field' => 'longitude',
        'label' => 'Longitude',
        'rules' => 'required|trim|max_length[45]|greater_than[-181]|less_than[181]|numeric|xss_clean'
    )
);

/*================================================
 * Setting change country validation rules
 */
// $config['country'] = array(
//     array(
//         'field' => 'name',
//         'label' => 'Country name',
//         'rules' => 'required|trim|max_length[50]|xss_clean'
//     ),
//     array(
//         'field' => 'iso_code_2',
//         'label' => 'ISO Code 2',
//         'rules' => 'required|trim|max_length[2]|xss_clean'
//     ),
//     array(
//         'field' => 'iso_code_3',
//         'label' => 'ISO Code 3',
//         'rules' => 'required|trim|max_length[3]|xss_clean'
//     )
// );

/*================================================
 * Setting change zone validation rules
 */
// $config['zone'] = array(
//     array(
//         'field' => 'name',
//         'label' => 'Zone name',
//         'rules' => 'required|trim|max_length[50]|xss_clean'
//     ),
//     array(
//         'field' => 'zone_code_3',
//         'label' => 'Zone Code 3',
//         'rules' => 'required|trim|max_length[3]|xss_clean'
//     )
// );

/*================================================
 * Setting change zone validation rules
 */
// $config['area'] = array(
//     array(
//         'field' => 'code',
//         'label' => 'Code',
//         'rules' => 'required|trim|max_length[10]|xss_clean'
//     )
// );

