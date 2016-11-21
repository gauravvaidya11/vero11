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


// /**
//  * Setting front profile and user validation rules
//  */
// $config['video_validation'] = array(
//     array(
//         'field' => 'video_title',
//         'label' => 'Title',
//         'rules' => 'required|trim|max_length[40]|xss_clean|strip_tags'
//     ),
    
//     array(
//         'field' => 'video_url',
//         'label' => 'Video URL',
//         'rules' => 'required|trim|xss_clean|strip_tags'
//     ),

//     array(
//         'field' => 'upload_video',
//         'label' => 'Upload Video',
//         'rules' => 'required|trim|xss_clean|strip_tags'
//     )

// );

/**
 * Setting front profile and user validation rules
 */
$config['add_video_validation'] = array(
    array(
        'field' => 'video_title',
        'label' => 'Title',
        'rules' => 'required|trim|max_length[40]|xss_clean|strip_tags'
    )
    

);


/**
 * Setting front profile and user validation rules
 */
$config['add_video_url_validation'] = array(
    array(
        'field' => 'video_title',
        'label' => 'Title',
        'rules' => 'required|trim|max_length[40]|xss_clean|strip_tags'
    ),
    array(
        'field' => 'video_url',
        'label' => 'Video URL',
        'rules' => 'required'
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
 * Setting change club profile form validation rules
 */
$config['club_rofile'] = array( 
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
        'field' => 'age',
        'label' => 'Age',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'birthday',
        'label' => 'Birthday',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    // array(
    //     'field' => 'weight',
    //     'label' => 'Weight',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    // array(
    //     'field' => 'height_m',
    //     'label' => 'Height',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),

    // array(
    //     'field' => 'height_cm',
    //     'label' => 'Height',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),

    // array(
    //     'field' => 'laterality',
    //     'label' => 'Laterality',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    array(
        'field' => 'country',
        'label' => 'Country',
        'rules' => 'required|xss_clean|strip_tags'
    )
    // array(
    //     'field' => 'cpf',
    //     'label' => 'CPF',
    //     'rules' => 'required|xss_clean'
    // ),
    // array(
    //     'field' => 'position_1',
    //     'label' => 'Position_1',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    // array(
    //     'field' => 'player_type',
    //     'label' => 'Player type',
    //     'rules' => 'required|xss_clean|strip_tags'
    // )
    
    // array(
    //     'field' => 'mobile',
    //     'label' => 'Mobile',
    //     'rules' => 'required|xss_clean'
    // )
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
        'field' => 'height_m',
        'label' => 'Height',
        'rules' => 'required|xss_clean|strip_tags'
    ),

    array(
        'field' => 'heightCm',
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
    )
   
);
