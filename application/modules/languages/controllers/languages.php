<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Languages extends Admin_Controller {

    function __construct() {
        parent::__construct();
        isAdminLoggedIn();
        $this->load->model("language");
    }

    /*
     * This function use for load setting file
     */
    

    function index($page = NULL) {
        add_admin_plugin(array('jquery.form.js', 'jquery-validation/dist/jquery.validate.min.js'));
        add_admin_js(array());
        add_footer_admin_js(array('custom/language_js/languages.js'));
        add_admin_css(array());
        $lang = new language();
        $data['language_list'] = $lang->get_language_list();
        $data['title'] = "Language Management";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Language Management' => '');
        $data['module'] = "languages";
        $data['view_file'] = "admin/index";
        $this->template->admin($data);
    }

//END index();

    function addLanguage() {
        if (!$this->input->is_ajax_request()) {
            die("No direct script access allowed");
        }
        if ($this->input->post()) {

            if ($this->form_validation->run('language') === TRUE) {
                $lang = new language();
                $lang->lang_name = $this->input->post('lang_name');
                $lang->lang_code = $this->input->post('lang_code');
                $lang->created_at = getDateTime();

                if ($_FILES['lang_flag']['name']) {
                    $fieldName = 'lang_flag';
                    $uploadPath = './public/uploads/language/flag/original/';
                    $upload = do_upload($fieldName, $uploadPath);
                    //pr($upload);
                    //create thumbnail
                    $resize_width = 50;
                    $resize_height = 25;
                    $thumbPath = './public/uploads/language/flag/thumb/';
                    resize_image($uploadPath . $upload['file_name'], $resize_width, $resize_height, $thumbPath);
                    $lang->lang_flag = $upload['file_name'];
                }

                if ($lang->save()) {
                    if ($this->makeLanguageDir($this->input->post('lang_name'))) {
                        echo json_encode(array('type' => 'success', 'msg' => 'Language successfully added.'));
                        exit();
                    } else {
                        echo json_encode(array('type' => 'error', 'msg' => 'Something wrong please try again.'));
                        exit();
                    }
                } else {
                    echo json_encode(array('type' => 'info', 'msg' => 'Nothing to update.'));
                    exit();
                }
            } else {
                echo json_encode(array('type' => 'error', 'msg' => validation_errors()));
                exit();
            }
        }
    }


    // function addLanguage() {
    //     if (!$this->input->is_ajax_request()) {
    //         die("No direct script access allowed");
    //     }
    //     if ($this->input->post()) {

    //         // print_r($_FILES['lang_flag']);
    //         // exit();

    //         if ($this->form_validation->run('language') === TRUE) {
    //             $lang = new language();
    //             $lang->lang_name = $this->input->post('lang_name');
    //             $lang->lang_code = $this->input->post('lang_code');
    //             $lang->created_at = getDateTime();

    //             if(!empty($_FILES['lang_flag'])){
    //                // print_r($_FILES);die();
    //                 //if ($_FILES['lang_flag']['error'] != UPLOAD_ERR_NO_FILE) {
    //                     $config['upload_path'] = './public/uploads/language/flag/original/';
    //                     $config['file_name'] = date('ymdHis') . "-" . $_FILES['lang_flag']['name'];
    //                     $config['allowed_types'] = 'gif|jpg|png';
    //                     $config['max_size'] = 100;
    //                     $config['max_width'] = 1024;
    //                     $config['max_height'] = 768;
    //                     $this->load->library('upload', $config);
    //                     $upload = $this->upload->do_upload('lang_flag');
    //               // var_dump($upload);die();
    //                     if ($this->upload->do_upload('lang_flag')) {
    //                         //$this->personal_data["profile_image"] = $this->upload->data()['file_name'];
    //                         $lang->lang_flag = $this->upload->data()['file_name'];
    //                     }

    //                 // }
                    
    //             }

    //             // else {
    //             //         print_r($_FILES['lang_flag']['error']);
    //             //         exit();
    //             //     }

    //             // if ($_FILES['lang_flag']['name']) {
    //             //     //exit();
    //             //     $fieldName = 'lang_flag';
    //             //     $uploadPath = './public/uploads/language/flag/original/';
    //             //     $upload = do_upload($fieldName, $uploadPath);
    //             //     //create thumbnail
    //             //     $resize_width = 50;
    //             //     $resize_height = 25;
    //             //     $thumbPath = './public/uploads/language/flag/thumb/';
    //             //     resize_image($uploadPath . $upload['file_name'], $resize_width, $resize_height, $thumbPath);
    //             //     $lang->lang_flag = $upload['file_name'];
    //             // }

    //             if ($lang->save()) {
    //                 if ($this->makeLanguageDir($this->input->post('lang_name'))) {
    //                     echo json_encode(array('type' => 'success', 'msg' => 'Language successfully added.'));
    //                 } else {
    //                     echo json_encode(array('type' => 'error', 'msg' => 'Something wrong please try again.'));
    //                 }
    //             } else {
    //                 echo json_encode(array('type' => 'info', 'msg' => 'Nothing to update.'));
    //             }
    //         } else {
    //             echo json_encode(array('type' => 'error', 'msg' => validation_errors()));
    //         }
    //     }
    // }

//END addLanguage();

    function makeLanguageDir($langName) {

        if (mkdir(BASE_PATH . 'application/language/' . $langName, 0777, true)) {
            chmod(BASE_PATH . 'application/language/' . $langName, 0777);
            copy(BASE_PATH . 'application/language/english/english_lang.php', BASE_PATH . 'application/language/' . $langName . '/' . $langName . '_lang.php');

            return TRUE;
        }return FALSE;
    }

//END makeLanguageDir();

    /*
     * This function use for add multi language field in all language files.
     */

    function addField() {
        if (!$this->input->is_ajax_request()) {
            die("Can't direct access !!");
        }
        if ($this->input->post()) {
            if ($this->form_validation->run('add_lang_field') === TRUE) {
                $lang = new language();
                $field = $this->input->post('field');
                if (strpos(file_get_contents(BASE_PATH . 'application/language/english/english_lang.php'), '"\.$field.\"') === false) {
                    $this->makeLanguageDir($this->input->post('lang_name'));
                    echo json_encode(array('type' => 'success', 'msg' => 'Language successfully added.'));
                } else {
                    echo json_encode(array('type' => 'info', 'msg' => 'Nothing to update.'));
                }
            } else {
                echo json_encode(array('type' => 'error', 'msg' => 'Something wrong please try again.'));
            }
        }
    }

//END addField();

    public function editLanguageFile() {
        add_admin_plugin(array('jquery.form.js'));
        add_admin_js(array());
        add_footer_admin_js(array('custom/language_js/languages.js'));
        add_admin_css(array());
        $data['title'] = "Language Management";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Language Management' => '');
        $data['module'] = "languages";
        $data['view_file'] = "admin/edit_language";
        if ($this->input->post()) {
            $selected_lang = $this->input->post('lang');
            //$this->session->set_userdata('sel_lang',$selected_lang);
            $data["language_selected"] = $selected_lang;
        }
        $language = $selected_lang;
        $this->lang->load($language, $language);
        $data['lang'] = $language;
        $data['langArray'] = $this->lang->language;
        $this->template->admin($data);
    }

//END updateLanguageFile();
    /* ===========================================================================================================
     *  Modified 720
     */
    public function updateLanguageFile() {
        if ((!$this->input->is_ajax_request())) {
            redirect(base_url() . 'admin-languages');
        }

        if ($this->input->post() && $this->input->post("language_selected")) {
            $language = $this->input->post("language_selected");
            set_error_handler(array($this, "customErrorHandler"), -1 & ~E_NOTICE & ~E_USER_NOTICE);
            $key = $this->input->post('lang_key');
            $value = $this->input->post('lang_value');
            if (count($key) != count($value)) {
                $data['status'] = "error";
                $data['msg'] = "Some error.";
                echo json_encode($data);
                exit();
            }
            $limit = count($key);

            $str = '';
            $str .= '<?php ' . PHP_EOL;
            $macro_type = null;
            for ($i = 0; $i < $limit; $i++) {
                if (!isset($value[$i]) || !isset($key[$i])) {
                    $data['status'] = "error";
                    $data['msg'] = "Some error..";
                    echo json_encode($data);
                    exit();
                }
                $value[$i] = str_replace('"', "'", $value[$i]);

                $str .= '$lang["' . $key[$i] . '"]= my_htmlentities("' . $value[$i] . '");' . PHP_EOL;
                //macro format logic
                $result = isset($key[$i + 1]) ? explode("_", $key[$i + 1]) : array("null");
                if (isset($result[0]) && $result[0] != $macro_type) {
                    $macro_type = $result[0];
                    $str .='' . PHP_EOL . '' . '' . PHP_EOL;
                }
            }
            $str .= ' ?>';

            //--------------------------------------------create backup and then update---------------------------------------
//            if(!$this->session->userdata('sel_lang')){
//                 $data['status'] = "error";
//                    $data['msg'] = "Some error...";
//                    echo json_encode($data);
//                    exit();
//            }
            $date = getdate();
            $time = time();
            $backup_folder = BASE_PATH . 'application/language/' . $language . '/' . "backup";

            //chmod(BASE_PATH . 'application/language', 0777);

            if (!is_dir($backup_folder)) {
                if (!mkdir($backup_folder, 0777)) {
                    $data['status'] = "error";
                    $data['msg'] = "Some error....";
                    echo json_encode($data);
                    exit();
                }
            }
            $backup_file_name = BASE_PATH . 'application/language/' . $language . '/' . "backup/" . "lang_" . $date["mday"] . "-" . $date["mon"] . "-" . $date["year"] . "_" . $time . ".php";
            $file = BASE_PATH . 'application/language/' . $language . '/' . $language . '_lang.php';

            if (copy($file, $backup_file_name)) {
                //updating file
                if (file_put_contents($file, $str) === FALSE) {
                    copy($backup_file_name, $file); //revert code
                    $data['status'] = "error";
                    $data['msg'] = "Some error.....";
                    echo json_encode($data);
                    exit();
                }
            }
            //----------------------------------------------------------------------------------------------------------------

            $this->session->set_flashdata('success', 'Language successfuly updated.');
            $data['status'] = "success";
            $data['msg'] = "Language successfuly updated.";

            echo json_encode($data);
            exit();
        }
    }

//END updateLanguageFile();

    public function changeLanguageStatus() {
        checkSupperAdminLogin($this->session->userdata('admin_logged_in'));
        $id = $this->input->post('id');
        if ($this->language->change_language_status($id)) {
            echo"success";
            exit();
        }
    }

//END changeCategoryStatus();

    public function languageListing() {
        if (!$this->input->is_ajax_request()) {
            die("Can't direct access !!");
        }
        $lang = new language();
        $result = $lang->get_language_detail();
        echo json_encode($result);
        exit();
    }

//END languageList();

    function changeStatus() {
        if (!$this->input->is_ajax_request()) {
            die("Can't direct access !!");
        }
        $lang = new language();
        $lang->id = $this->input->post("id");
        $lang->status = $this->input->post("status");
        if ($lang->set_lang_status()) {
            $data['status'] = "success";
            echo json_encode($data);
        }exit();
    }

//END changeStatus()

    function checkLangName() {
        // if (!$this->input->is_ajax_request()) {
        //     die("Can't direct access !!");
        // }
        $lang = new language();
        $data = $lang->check_language_name($this->input->post('lang_name'));
        echo json_encode($data);
        exit();
    }

//END checkLangName();

    function checkLangCode() {
        // if (!$this->input->is_ajax_request()) {
        //     die("Can't direct access !!");
        // }
        $lang = new language();
        $data = $lang->check_language_code($this->input->post('lang_code'));
        echo json_encode($data);
        exit();
    }

//END checkLangName();


    /* =================================================================================================
     * This is a custom halder for all warning and error 
     */

    public function customErrorHandler($errno, $errstr) {
        die($errno . "-" . $errstr);
        $data['status'] = "error";
        $data['msg'] = "Some error......";
        echo json_encode($data);
        exit();
    }

    //END checkLangName();
}
