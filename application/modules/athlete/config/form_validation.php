<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * Setting front profile and user validation rules
 */
$config['video_validation'] = array(
    array(
        'field' => 'video_title',
        'label' => 'Title',
        'rules' => 'required|trim|max_length[30]|xss_clean|strip_tags'
    )

    // array(
    //     'field' => 'video_url',
    //     'label' => 'Video URL',
    //     'rules' => 'required|trim|max_length[50]|xss_clean|strip_tags'
    // )
);

/**
 * Setting change admin profile form validation rules
 */
$config['athlete_rofile'] = array( 
    array(
        'field' => 'fname',
        'label' => 'Firstname',
        'rules' => 'required|trim||xss_clean|strip_tags'
    ),
    array(
        'field' => 'lname',
        'label' => 'Lastname',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'age',
        'label' => 'Age',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'birthday',
        'label' => 'Birthday',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'weight',
        'label' => 'Weight',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'height_m',
        'label' => 'Height',
        'rules' => 'required|xss_clean|strip_tags'
    ),

    array(
        'field' => 'height_cm',
        'label' => 'Height',
        'rules' => 'required|xss_clean|strip_tags'
    ),

    array(
        'field' => 'laterality',
        'label' => 'Laterality',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'cpf',
        'label' => 'CPF',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'position_1',
        'label' => 'Position_1',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'player_type',
        'label' => 'Player type',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'mobile',
        'label' => 'Mobile',
        'rules' => 'required|xss_clean'
    )
);

/**
 * Setting change admin profile form validation rules
 */
$config['adminprofile'] = array( 
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|min_length[8]|max_length[50]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'firstname',
        'label' => 'Firstname',
        'rules' => 'required|trim|max_length[50]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'lastname',
        'label' => 'Lastname',
        'rules' => 'required|trim|max_length[50]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|xss_clean|strip_tags'
    )
);

/**
 * Setting change password validation rules
 */
$config['changepassword'] = array(
    array(
        'field' => 'old_password',
        'label' => 'Current Password',
        'rules' => 'trim|required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'new_password',
        'label' => 'New Password',
        'rules' => 'required|trim|min_length[6]|max_length[30]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'confirm_password',
        'label' => 'Confirm Password',
        'rules' => 'required|trim|min_length[6]|max_length[30]|xss_clean|strip_tags'
    )
);

/**
 * Setting change password validation rules
 */
$config['changeAdminPassword'] = array(
    array(
        'field' => 'currentpass',
        'label' => 'Current Password',
        'rules' => 'trim|required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'new_password',
        'label' => 'New Password',
        'rules' => 'required|trim|min_length[6]|max_length[30]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'retry_password',
        'label' => 'Confirm Password',
        'rules' => 'required|trim|min_length[6]|max_length[30]|xss_clean|strip_tags'
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
        'field' => 'password',
        'label' => 'New Password',
        'rules' => 'required|min_length[5]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'confirm_pass',
        'label' => 'Confirm Password',
        'rules' => 'required|min_length[5]|matches[password]|xss_clean|strip_tags'
    )
);


/**
 * Setting front profile and user validation rules
 */
$config['biography_validation'] = array(
    array(
        'field' => 'bio_title',
        'label' => 'Bio Title',
        'rules' => 'required|trim|xss_clean|max_length[60]|strip_tags'
    ),
    array(
        'field' => 'content',
        'label' => 'Bio Content',
        'rules' => 'trim|max_length[1000]|xss_clean|strip_tags'
    )
);


/**
 * Setting front profile and user validation rules
 */
$config['upload_player_image_validation'] = array(
    array(
        'field' => 'image_title',
        'label' => 'Image Title',
        'rules' => 'required|trim|xss_clean|strip_tags'
    )
);

$config['edit_upload_player_image_validation'] = array(
    array(
        'field' => 'image_title',
        'label' => 'Image Title',
        'rules' => 'required|trim|xss_clean|strip_tags'
    )
);





/**
 * Setting change images validation rules
 */
// $config['images'] = array(
//     array(
//         'field' => 'avtarimage',
//         'label' => 'Select Image',
//         'rules' => 'required|xss_clean|strip_tags'
//     )
// );



/**
 * Setting add language management form validation rules
 */
$config['language'] = array(
    array(
        'field' => 'lang_name',
        'label' => 'Language Name',
        'rules' => 'required|trim|max_length[100]|is_unique[tbl_languages.lang_name]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'lang_code',
        'label' => 'Language Code',
        'rules' => 'required|trim|max_length[100]|is_unique[tbl_languages.lang_code]|xss_clean|strip_tags'
    )
);


