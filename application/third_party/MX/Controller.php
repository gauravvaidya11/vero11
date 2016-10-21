<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions * */
require dirname(__FILE__) . '/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * */
class MX_Controller {

    public $autoload = array();

    public function __construct() {
        //$this->session->unset_userdata('site_language');
        $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
        log_message('debug', $class . " MX_Controller Initialized");
        Modules::$registry[strtolower($class)] = $this;

        /* copy a loader instance and initialize */
        $this->load = clone load_class('Loader');
        $this->load->initialize($this);
        /* unset the cache */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        /* autoload module items */
        $this->load->_autoloader($this->autoload);

        //$ci =& get_instance();
        $this->load->helper('language');
        $language = $this->session->userdata('site_language');

        if (!$language) {
            $lang_table = $this->db->dbprefix('languages');
            $language = $this->db->query('select lang_name from ' . $lang_table . ' where `default`= 1' )->row_array();

            if ($language) {
                $language  = $language['lang_name'];
            }else{
                $language = "english";
            }
            $this->session->set_userdata('site_language', $language);
        }

        $language = $this->session->userdata('site_language');
        $this->lang->load($language,$language);

        
        // if ($this->input->cookie('my_language')) {
        //     $language_id = intval($this->input->cookie('my_language'));
        //     $lang_table = $this->db->dbprefix('languages');
        //     $lang = $this->db->query('select id,lang_name from ' . $lang_table . ' where id=' . $language_id)->row_array();
        //     if ($lang) {
        //         $this->lang->load($lang['lang_name'], $lang['lang_name']);
        //     }
        //     else {
        //         $lang = $this->db->query('select id,lang_name from ' . $lang_table . ' where `default`= 1')->row_array();
        //         if ($lang) {
        //             $this->lang->load($lang['lang_name'], $lang['lang_name']);

        //             $cookie = array(
        //                 'name' => 'my_language',
        //                 'value' => $lang['id'],
        //                 'expire' => '86500'
        //             );

        //             $this->input->set_cookie($cookie);
        //         }
        //     }
        // }
        // else {
        //     $lang_table = $this->db->dbprefix('languages');
        //     $lang = $this->db->query('select id,lang_name from ' . $lang_table . ' where `default`= 1')->row_array();
        //     if ($lang) {
                
        //         $this->lang->load($lang['lang_name'], $lang['lang_name']);
        //         $cookie = array(
        //             'name' => 'my_language',
        //             'value' => $lang['id'],
        //             'expire' => '86500'
        //         );

        //        $this->input->set_cookie($cookie);
        //     }
        // }
        //  pre($lang);
        /* autoload template module for theme render */
        $this->load->module('template');
    }

    public function __get($class) {
        return CI::$APP->$class;
    }

}
