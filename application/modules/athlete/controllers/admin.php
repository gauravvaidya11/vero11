<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
    
     function __construct() {
        parent::__construct();
        isAdminLoggedIn();
        $this->load->model('profile');
     }
    
    /*=======================================
    * This function is use for change admin profile and reset password
    */ 
    function index() {
      add_admin_plugin(array('bootbox/bootbox.min.js','jquery.form.js','jquery-validation/dist/jquery.validate.min.js','bootstrap-fileinput/bootstrap-fileinput.js'));
      add_admin_js(array('custom/profile_js/profile.js'));
      add_admin_css(array('pages/profile.css'));      
      $data['title'] = "Admin Profile";
      $data['breadcrumb']  = array('Home'=>'admin-dashboard','Admin Profie'=>'admin-profile');
      $data['module'] = "athlete";
      $data['view_file'] = "admin/index";
      $data['admin_profile'] = $this->profile->getAdminProfile();
      $this->template->admin($data); 
    }

    /*=======================================
    * This function is use for change personal profile info
    */ 
    function updatePersonalInfo() {
          if(!$this->input->is_ajax_request()){
            die("Can't direct access!!");
          }
          if($this->form_validation->run('adminprofile') === TRUE){
            $obj = new profile();
            $obj->id = $this->session->userdata('admin_id');
            $obj->username = $this->input->post('username');
            $obj->firstname = $this->input->post('firstname');
            $obj->lastname = $this->input->post('lastname');
            $obj->email = $this->input->post('email');

            if($obj->save()){
              echo json_encode(array('type'=>'success','msg'=>'Your profile is updated successfully.'));   
            }else{
              echo json_encode(array('type'=>'info','msg'=>'Nothing to update.'));   
            }
          }else{
              echo json_encode(array('type'=>'error','msg'=>'Something wrong please try again.'));   
          }
    } //END updatePersonalInfo();

    /*=======================================
    * This function is use for reset admin password
    */ 
    function changePassword() {
      if(!$this->input->is_ajax_request()){
        die("Can't direct access!!");
      }
      //echo $this->session->userdata('admin_id');die;
      if($this->form_validation->run('changeAdminPassword') === TRUE){
        $obj = new profile();
        $obj->id = $this->session->userdata('admin_id');
        $obj->password = md5(trim($this->input->post('currentpass')));
        if($obj->select()->password == $obj->password){
          
            $obj->password = md5(trim($this->input->post('new_password')));
            if($obj->save()){
              echo json_encode(array('type'=>'success','msg'=>'Your password is updated successfully.'));   
            }else{
              echo json_encode(array('type'=>'info','msg'=>'Nothing to update.'));   
            }
          
        }else{
          echo json_encode(array('type'=>'error','msg'=>'Please enter currect current password.'));
        }
      }else{
        echo json_encode(array('type'=>'error','msg'=>'Confirm password does not match.'));
      }

    }



    /*=======================================
    * This function is use for change personal profile info
    */ 
    function updateAvatar() {
        $obj = new profile();
        $obj->id = $this->session->userdata('admin_id');
        $upload_path = './public/admin/assets/uploads/avatar/original/';
        $thumb_path = './public/admin/assets/uploads/avatar/thumb/';
        $data = $obj->get_avatar($obj->id);
        //pr($data);
        if ($data['avatar']) {
            remove_image($upload_path, $data['avatar']);
            remove_image($thumb_path, $data['avatar']);
        }
          
        if ($_FILES['avtarimage']['name']) {
            $fieldName = 'avtarimage';
            
            $upload = do_upload($fieldName, $upload_path);
            //create thumbnail
            $resize_width = 200;
            $resize_height = 200;
            resize_image($upload_path . $upload['file_name'], $resize_width, $resize_height, $thumb_path);
            $obj->avatar = $upload['file_name'];
        }else{
           $obj->avatar = $this->input->post('upd_avtarimage');  
        }

        if($obj->save())
        {
          echo json_encode(array('type'=>'success','msg'=>'Your avatar is updated successfully.'));   
        }else{
          echo json_encode(array('type'=>'error','msg'=>'Please select avatar image.'));
        }
      
    }//END updateAvatar() 

    



} // close class here