<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {

    private $table = "tbl_admin_email_templates";

    /*==============  email template ========*/

    public function __construct() {
        parent::__construct();
        isLoggedIn();
        $this->load->model('Email_Template', 'et');
    }

    /*
     * This function is for email template listing
     */

    public function index() {
        add_admin_plugin(array('bootbox/bootbox.min.js','data-tables/jquery.dataTables.js', 'data-tables/DT_bootstrap.js', 'uniform/jquery.uniform.min.js'));
        add_admin_js(array('core/datatable.js','custom/common_js/table-ajax.js'));
        $data['title'] = "Email Templates";
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Email Templates' => '');
        $data['module'] = "email_templates";
        $data['view_file'] = "admin/index";
        $this->tamplate->admin($data);
    }
    /* =======================================
     * This function is for email template listing
     */
    public function emailTemplateList() {
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }

        $model = new Email_Template();
        $requestData = $_REQUEST;
        $search = [];
        // sort by datatable column index  => database column name
        //   0 => 'id',
        $columns = array(
            2 => 'name',
        );
        // EMAIL NAME FILTER
        if (!empty($requestData['name'])) {
            $search['name'] = $requestData['name'];
        }
        $search = (object) $search;

        $model->sort_by = $columns[$requestData['iSortCol_0']];
        $model->sort_order = $requestData['sSortDir_0'];
        // start
        $model->offset = intval($requestData['iDisplayStart']);
        // limit 
        $records_count = $model->getEmailTempCount($search);
        $iTotalRecords = $records_count;
        $iDisplayLength = intval($requestData['iDisplayLength']);
        $model->limit = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records = $model->getEmailTemplates($search, $model->sort_by, $model->sort_order, $model->limit, $model->offset);

        $sEcho = intval($_REQUEST['sEcho']);

        // INITIALISE RETURN JSONDATA
        $jsondata = array();
        $jsondata["aaData"] = array();

        $i = 1;
        foreach ($records as $record) {

            $html = '';
            $html .='&nbsp;<a data-toggle="modal" class="view_details btn btn-sm green" href="' . base_url() . 'admin-add-email-templates?id=' . $record->id . '" title="View" >
                     <i class="fa fa-eye"></i> View</a>';

            $html .='&nbsp;<a class="btn btn-sm blue" title="Edit" href="' . base_url() . 'admin-add-email-templates?id=' . $record->id . '">
                     <i class="fa fa-edit"></i> Edit</a>';

            $jsondata["aaData"][] = array(
                '<input type="checkbox" name="id[]" value="' . $record->id . '">',
                $i,
                $record->name,
                $record->type,
                $html,
            );
            $i++;
        }

        if (isset($_REQUEST["sAction"]) && $_REQUEST["sAction"] == "group_action") {
            $jsondata["sStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $jsondata["sMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        $jsondata["sEcho"] = $sEcho;
        $jsondata["iTotalRecords"] = $iTotalRecords;
        $jsondata["iTotalDisplayRecords"] = $iTotalRecords;
        echo json_encode($jsondata); exit();
    }

    /*===============================
     * This function for image upload through ckeditor on email template
    /*=======================================*/
    
    public function uploadCkeditorImage() {

        if(!empty($_FILES) && $_FILES['upload']['size'] > 0){
            
            $config['upload_path'] = './public/admin/assets/uploads/email_template/';
            $upload_data = uploadFile('upload', $config);
            
            $funcNum = $_GET['CKEditorFuncNum'] ;   
            if($upload_data["result"] === "success"){
                $url = base_url().'public/admin/assets/uploads/email_template/'.$upload_data['file'];
                 $message = '';
            }else{
                 $message = strip_tags($upload_data['msg']);
            }
             echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        }else{
           return false;
        }
         exit();
    }

    /* =======================================
     * This function is for creat/edit email template
     */

    public function email_template() {

        add_admin_plugin(array('ckeditor/ckeditor.js','uniform/jquery.uniform.min.js'));
        add_admin_js(array('custom/email_template_js/email_template.js'));    
        
        $email_temp_type = array(
            'registration'=>'Registration Template',
            'forgot_password'=>'Forgot Password',
            'reset_password'=>'Reset Password',
            'email_verification'=>'Email Verification'
        );

        if ($this->input->post()) {
            
            if ($this->form_validation->run('email_template') == TRUE) {
                $obj = new Email_Template();
                $id = intval(escapeString($this->input->post('edit')));
                $obj->name = escapeString($this->input->post('name'));
                //$obj->type = escapeString($this->input->post('type'));

                if ($id > 0) {
                    $obj->id = $id;
                    $data = $obj->getEmailTemplate($id);
                    $msg = 'Email template updated successfuly.';
                }
                else {
                    $obj->created_at = date('Y-m-d H:i:s');
                    $obj->status = 1;
                    $msg = 'Email template added successfuly.';
                }
                                
                $obj->content = $this->input->post('html_content');
                $obj->save();
                
                $this->session->set_flashdata('success', $msg);
                redirect('admin-email-templates');  exit();
            }
        }
        
        $data['edit'] = FALSE;
        $tag = 'Add Email Template';
        if ($this->input->get('id')) {
            $data['edit'] = TRUE;
            $id = escapeString($this->input->get('id'));
            $data['email_temp'] = $this->et->getEmailTemplate($id);
            if (!$data['email_temp']) {
                redirect('admin-email-templates');  exit();
            }
            $tag = 'Upadate Email Template';
        }
        else {
            $id = intval(escapeString($this->input->post('edit')));
            if ($id > 0) {
                $data['email_temp'] = $this->et->getEmailTemplate($id);
                $tag = 'Edit Email Template';
                
            }
        }

        $data['title'] = "Email Templates";
        add_admin_plugin(array('jquery-validation/dist/jquery.validate.min.js', 'bootstrap-fileinput/bootstrap-fileinput.js'));
        $data['breadcrumb'] = array('Home' => 'admin-dashboard', 'Email Templates' => 'admin-email-templates', $tag => '');

        $data['email_temp_dropdown'] = $email_temp_type;
        $data['module'] = "email_templates";
        $data['view_file'] = "admin/email_template";
        $this->load->module('tamplate');
        $this->tamplate->admin($data);
    }
    
}
?>