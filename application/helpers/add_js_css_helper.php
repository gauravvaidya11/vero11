<?php

//Dynamically add Javascript files to header page
if (!function_exists('add_admin_js')) {

    function add_admin_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_admin_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_js[] = $item;
            }
            $ci->config->set_item('header_admin_js', $header_js);
        }
        else {
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_admin_js', $header_js);
        }
    }

}

//Dynamically add CSS files to header page
if (!function_exists('add_admin_css')) {

    function add_admin_css($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_admin_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('header_admin_css', $header_css);
        }
        else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_admin_css', $header_css);
        }
    }

}
if (!function_exists('add_admin_plugin_css')) {

    function add_admin_plugin_css($file = array()) {
        $ci = &get_instance();
        if (empty($file)) {
            return;
        }
        if (!is_array($file) && count($file) <= 0) {
            return;
        }
        foreach ($file AS $item) {
            $header_css[] = $item;
        }
        $ci->config->set_item('header_admin_plugin_css', $header_css);
    }

}


//Dynamically add CSS files to header page
if (!function_exists('add_admin_plugin')) {

    function add_admin_plugin($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_plugin = $ci->config->item('header_admin_plugin');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_plugin[] = $item;
            }
            $ci->config->set_item('header_admin_plugin', $header_plugin);
        }
        else {
            $str = $file;
            $header_plugin[] = $str;
            $ci->config->set_item('header_admin_plugin', $header_plugin);
        }
    }

}



if (!function_exists('put_admin_headers')) {

    function put_admin_headers() {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_admin_css');
        $header_js = $ci->config->item('header_admin_js');
        $header_plugin = $ci->config->item('header_admin_plugin');
        $header_plugin_css = $ci->config->item('header_admin_plugin_css');
        $common_css = $ci->config->item('common_css');


        foreach ($header_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . ADMIN_THEME_CSS . $item . '" type="text/css" />' . "\n";
        }
        foreach ($header_plugin_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . ADMIN_THEME_PLUGINS . $item . '" type="text/css" />' . "\n";
        }
        foreach ($header_plugin AS $item) {
            $str .= '<script type="text/javascript" src="' . ADMIN_THEME_PLUGINS . $item . '"></script>' . "\n";
        }


        foreach ($header_js AS $item) {
            $str .= '<script type="text/javascript" src="' . ADMIN_THEME_JS . $item . '"></script>' . "\n";
        }
        foreach ($common_css AS $item) {
            if (!empty($item)) {
                $str .= '<link rel="stylesheet" href="' . COMMON_JS_CSS . $item . '" type="text/css" />' . "\n";
            }
        }


        return $str;
    }

}

// Common function for include footer js and css
if (!function_exists('add_footer_admin_js')) {

    function add_footer_admin_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('footer_admin_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $footer_js[] = $item;
            }
            $ci->config->set_item('footer_admin_js', $footer_js);
        }
        else {
            $str = $file;
            $footer_js[] = $str;
            $ci->config->set_item('footer_admin_js', $footer_js);
        }
    }

}

/* ================================================
 * Common function for include footer js and css
 */

if (!function_exists('put_admin_footers')) {

    function put_admin_footers() {
        $str = '';
        $ci = &get_instance();

        $footer_js = $ci->config->item('footer_admin_js');
        foreach ($footer_js AS $item) {
            $str .= '<script type="text/javascript" src="' . ADMIN_THEME_JS . $item . '"></script>' . "\n";
        }
        $str .= put_common_footer_js(array());
        return $str;
    }

}
if (!function_exists('put_common_footer_js')) {

    function put_common_footer_js() {
        $str = '';
        $ci = &get_instance();

        $footer_js = $ci->config->item('common_footer_js');


        foreach ($footer_js AS $item) {
            if (!empty($item)) {
                $str .= '<script type="text/javascript" src="' . COMMON_JS . $item . '"></script>' . "\n";
            }
        }
        return $str;
    }

}
// Common function for include footer js 
if (!function_exists('add_common_footer_js')) {

    function add_common_footer_js($file = array()) {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('common_footer_js');

        if (is_array($file)) {
            if (count($file) > 0) {
                foreach ($file AS $item) {
                    $footer_js[] = $item;
                }
                $ci->config->set_item('common_footer_js', $footer_js);
            }
        }
    }

}

// function to add common css
if (!function_exists('add_common_css')) {

    function add_common_css($file = array()) {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('common_css');
        if (is_array($file)) {
            if (count($file) > 0) {
                foreach ($file AS $item) {
                    $header_css[] = $item;
                }
                $ci->config->set_item('common_css', $header_css);
            }
        }
    }

}

//====================Front functions==============================
//Dynamically add Javascript files to header page
if (!function_exists('add_js')) {

    function add_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js', $header_js);
        }
        else {
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js', $header_js);
        }
    }

}

//Dynamically add CSS files to header page
if (!function_exists('add_css')) {

    function add_css($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css', $header_css);
        }
        else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css', $header_css);
        }
    }

}


//Dynamically add JS files to header page
if (!function_exists('add_plugin_js')) {

    function add_plugin_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_plugin = $ci->config->item('header_plugin_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_plugin[] = $item;
            }
            $ci->config->set_item('header_plugin_js', $header_plugin);
        }
        else {
            $str = $file;
            $header_plugin[] = $str;
            $ci->config->set_item('header_plugin_js', $header_plugin);
        }
    }

}
//Dynamically add CSS files to header page
if (!function_exists('add_plugin_css')) {

    function add_plugin_css($file = array()) {
        $str = '';
        $ci = &get_instance();

        if (!is_array($file)) {
            return;
        }
        foreach ($file AS $item) {
            $header_plugin[] = $item;
        }
        $ci->config->set_item('header_plugin_css', $header_plugin);
    }

}



if (!function_exists('put_headers')) {

    function put_headers($js_mini = '') {

        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        $header_js = $ci->config->item('header_js');
        $header_plugin_js = $ci->config->item('header_plugin_js');
        $header_plugin_css = $ci->config->item('header_plugin_css');
        $common_css = $ci->config->item('common_css');

        foreach ($header_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . FRONT_THEME_CSS . $item . '" type="text/css" />' . "\n";
        }
        foreach ($header_plugin_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . FRONT_THEME_PLUGINS . $item . '" type="text/css" />' . "\n";
        }
        if ((is_array($header_js) && !empty($header_js)) || (is_array($header_plugin_js) && !empty($header_plugin_js))) {
            $str .= '<script type="text/javascript" src="' . FRONT_THEME_JS . $js_mini . '"></script>' . "\n";
        }
        foreach ($header_js AS $item) {
            $str .= '<script type="text/javascript" src="' . FRONT_THEME_JS . $item . '"></script>' . "\n";
        }

        foreach ($header_plugin_js AS $item) {
            $str .= '<script type="text/javascript" src="' . FRONT_THEME_PLUGINS . $item . '"></script>' . "\n";
        }
        foreach ($common_css AS $item) {
            if (!empty($item)) {
                $str .= '<link rel="stylesheet" href="' . COMMON_JS_CSS . $item . '" type="text/css" />' . "\n";
            }
        }


        return $str;
    }

}



//====================Front functions==============================
//Dynamically add Javascript files to header page
if (!function_exists('dashboard_add_js')) {

    function dashboard_add_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('user_dashboard_header_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_js[] = $item;
            }
            $ci->config->set_item('user_dashboard_header_js', $header_js);
        }
        else {
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('user_dashboard_header_js', $header_js);
        }
    }

}

//Dynamically add CSS files to header page
if (!function_exists('dashboard_add_css')) {

    function dashboard_add_css($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('user_dashboard_header_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('user_dashboard_header_css', $header_css);
        }
        else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('user_dashboard_header_css', $header_css);
        }
    }

}


//Dynamically add JS files to header page
if (!function_exists('dashboard_add_plugin_js')) {

    function dashboard_add_plugin_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_plugin = $ci->config->item('user_dashboard_header_plugin_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_plugin[] = $item;
            }
            $ci->config->set_item('user_dashboard_header_plugin_js', $header_plugin);
        }
        else {
            $str = $file;
            $header_plugin[] = $str;
            $ci->config->set_item('user_dashboard_header_plugin_js', $header_plugin);
        }
    }

}
//Dynamically add CSS files to header page
if (!function_exists('dashboard_add_plugin_css')) {

    function dashboard_add_plugin_css($file = array()) {
        $str = '';
        $ci = &get_instance();

        if (!is_array($file)) {
            return;
        }
        foreach ($file AS $item) {
            $header_plugin[] = $item;
        }
        $ci->config->set_item('user_dashboard_header_plugin_css', $header_plugin);
    }

}



if (!function_exists('put_user_dashboard_headers')) {

    function put_user_dashboard_headers($js_mini = '') {

        $str = '';
        $ci = &get_instance();
        $user_dashboard_header_css = $ci->config->item('user_dashboard_header_css');
        $user_dashboard_header_js = $ci->config->item('user_dashboard_header_js');
        $user_dashboard_header_plugin_js = $ci->config->item('user_dashboard_header_plugin_js');
        $user_dashboard_header_plugin_css = $ci->config->item('user_dashboard_header_plugin_css');
        $common_css = $ci->config->item('common_css');

        foreach ($user_dashboard_header_plugin_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . USER_DASHBOARD_THEME_PLUGINS . $item . '" type="text/css" />' . "\n";
        }
        foreach ($user_dashboard_header_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . USER_DASHBOARD_THEME_CSS . $item . '" type="text/css" />' . "\n";
        }
        if ((is_array($user_dashboard_header_js) && !empty($user_dashboard_header_js)) || (is_array($user_dashboard_header_plugin_js) && !empty($user_dashboard_header_plugin_js))) {
            $str .= '<script type="text/javascript" src="' . USER_DASHBOARD_THEME_JS . $js_mini . '"></script>' . "\n";
        }
        foreach ($user_dashboard_header_js AS $item) {
            $str .= '<script type="text/javascript" src="' . USER_DASHBOARD_THEME_JS . $item . '"></script>' . "\n";
        }

        foreach ($user_dashboard_header_plugin_js AS $item) {
            $str .= '<script type="text/javascript" src="' . USER_DASHBOARD_THEME_PLUGINS . $item . '"></script>' . "\n";
        }
        foreach ($common_css AS $item) {
            if (!empty($item)) {
                $str .= '<link rel="stylesheet" href="' . COMMON_JS_CSS . $item . '" type="text/css" />' . "\n";
            }
        }


        return $str;
    }

}

// Common function for include footer js and css
if (!function_exists('add_footer_js')) {

    function add_footer_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('footer_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $footer_js[] = $item;
            }
            $ci->config->set_item('footer_js', $footer_js);
        }
        else {
            $str = $file;
            $footer_js[] = $str;
            $ci->config->set_item('footer_js', $footer_js);
        }
    }

}


// Common function for include footer js and css
if (!function_exists('dashboard_add_footer_js')) {

    function dashboard_add_footer_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $footer_js = $ci->config->item('user_dashboard_footer_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $footer_js[] = $item;
            }
            $ci->config->set_item('user_dashboard_footer_js', $footer_js);
        }
        else {
            $str = $file;
            $footer_js[] = $str;
            $ci->config->set_item('user_dashboard_footer_js', $footer_js);
        }
    }

}

/* ================================================
 * Common function for include footer js and css
 */

if (!function_exists('put_footers')) {

    function put_footers() {
        $str = '';
        $ci = &get_instance();

        $footer_js = $ci->config->item('footer_js');


        foreach ($footer_js AS $item) {
            $str .= '<script type="text/javascript" src="' . FRONT_THEME_JS . $item . '"></script>' . "\n";
        }
        $str .= put_common_footer_js(array());
        return $str;
    }

}


/* ================================================
 * Common function for include user dashboard footer js and css
 */

if (!function_exists('put_user_dashboard_footers')) {

    function put_user_dashboard_footers() {
        $str = '';
        $ci = &get_instance();

        $user_dashboard_footer_js = $ci->config->item('user_dashboard_footer_js');


        foreach ($user_dashboard_footer_js AS $item) {
            $str .= '<script type="text/javascript" src="' . USER_DASHBOARD_THEME_JS . $item . '"></script>' . "\n";
        }
        $str .= put_common_footer_js(array());
        return $str;
    }

}