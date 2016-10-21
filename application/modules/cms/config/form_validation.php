<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



$config['add_about_us'] = array( 
    array(
        'field' => 'about_us_heading',
        'label' => 'About us Heading',
        'rules' => 'required|trim||xss_clean|strip_tags'
    ),
    array(
        'field' => 'play_date',
        'label' => 'Play Date',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'facebook_url',
        'label' => 'Facebook Url',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'twitter_url',
        'label' => 'Twitter Url',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'google_plus_url',
        'label' => 'Google Plus Url',
        'rules' => 'required|xss_clean|strip_tags'
    )
    
    // array(
    //     'field' => 'player_image',
    //     'label' => 'Player Image',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    // array(
    //     'field' => 'video_url',
    //     'label' => 'Video Url',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    // array(
    //     'field' => 'about_content',
    //     'label' => 'About Content',
    //     'rules' => 'required|xss_clean|strip_tags'
    // )
);


$config['edit_aboutus'] = array(
    array(
        'field' => 'about_us_heading',
        'label' => 'About us Heading',
        'rules' => 'required|trim||xss_clean|strip_tags'
    ),
    array(
        'field' => 'play_date',
        'label' => 'Play Date',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'facebook_url',
        'label' => 'Facebook Url',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'twitter_url',
        'label' => 'Twitter Url',
        'rules' => 'required|xss_clean|strip_tags'
    ),
    array(
        'field' => 'google_plus_url',
        'label' => 'Google Plus Url',
        'rules' => 'required|xss_clean|strip_tags'
    )

    // array(
    //     'field' => 'player_image',
    //     'label' => 'Player Image',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    // array(
    //     'field' => 'video_url',
    //     'label' => 'Video Url',
    //     'rules' => 'required|xss_clean|strip_tags'
    // ),
    // array(
    //     'field' => 'about_content',
    //     'label' => 'About Content',
    //     'rules' => 'required|xss_clean|strip_tags'
    // )    
);

$config['send_reply_validation'] = array(
    array(
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required|trim||xss_clean|strip_tags'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|xss_clean|strip_tags'
    ),
    array(
        'field' => 'message',
        'label' => 'Message',
        'rules' => 'required|xss_clean|strip_tags'
    )
);
