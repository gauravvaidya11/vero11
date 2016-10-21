<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
	
	function __construct($config = array()) {
        parent::__construct($config);
    }

    function runcallback($module = '', $group = '') {
        (is_object($module)) AND $this->CI =& $module;
        return parent::run($group);
    }

    function error_array() {
        if (count($this->_error_array) === 0)
            return FALSE;
        else
            return $this->_error_array;
    }

    // --------------------------------------------------------------------
}
