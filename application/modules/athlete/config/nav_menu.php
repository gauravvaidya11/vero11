
<?php 
    $display_name = $this->session->userdata('display_name'); 
    $email = $this->session->userdata('email'); 
     
    //$total_players = $this->session->userdata('total_players');
    $total_players = get_number_of_player();
?>

<?php if($this->session->userdata('player_id')) { 
        $profileUrl = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? BASE_URL."athlete-profile": "javascript:void(0)";
       
        $trg1       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "" : "1";
        
        $cls        = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us")) ? "" : "showSingle";
        
        $trg2       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "": "2";
        $trg3       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "": "3";
        $trg4       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "": "4";
        
       
    ?>
<script type="text/javascript">
    var isLogin = "<?php echo $this->session->userdata('player_id'); ?>";
    var AVATAR_IMAGE = "<?php echo AVATAR_IMAGE; ?>";
    var PROFILE_IMAGE = "<?php echo PROFILE_IMAGE; ?>";
    
</script>

<div class="col-sm-3 sec-left">
    <div class="profile_left">
    	<?php $seg = $this->uri->segment(1); ?>
        <?php $user_info = userLoggedInInfo(); ?>
        <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>
        <div class="profile_img"> <img id="profile-image" src="<?php echo $profile_image; ?>"  alt=""/> <!--<span><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>--> </div>
        <h2 id="full-name"><?php if(isset($display_name)) { echo $display_name;} ?></h2>
        <span id="email-address"><?php if(isset($email)) {echo $email;} ?></span>
        <a href="javascript:void(0)" class="changePassword" role="button" data-toggle="modal"><?php echo lang("change_password"); ?></a>
    
        <ul>
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a href="<?php echo $profileUrl; ?>" class="<?php echo $cls; ?>" rel="<?php echo $trg1; ?>" ><?php echo lang('edit_profile_tilte'); ?> <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></li> 
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a href="<?php echo $profileUrl; ?>" id="edit-bio" class="<?php echo $cls; ?>" rel="<?php echo $trg2; ?>"> <?php echo lang('sidebar_enter_biography'); ?> <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></li>
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a href="<?php echo $profileUrl; ?>" class="<?php echo $cls; ?>" rel="<?php echo $trg3; ?>"> <?php echo lang('sidebar_my_images'); ?></a></li>
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a href="<?php echo $profileUrl; ?>" class="<?php echo $cls; ?>" rel="<?php echo $trg4; ?>"> <?php echo lang('sidebar_my_videos'); ?></a></li>
        </ul>
        <h2><?php echo lang('club_member_label'); ?></h2>
        <a id="total-players"><?php echo lang('total_players'); ?> - <?php echo $total_players; ?></a> </div>
</div>
<link href="<?php echo BASE_URL; ?>public/front/assets/css/common/validation_error.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<script src="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.form.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/jquery.validate.cpf.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/profile_js/player.js"></script>



<div class="modal fade" id="change-pass" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="change-pass-message"></div>
        <?php $attributes = array('name' => "chnagePassword", 'id' => 'change-password-form'); ?>
            <?php echo form_open('athlete/chnagePassword', $attributes); ?>
            <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            

            <div class="modal-body">
                <!--start pop up code-->
                <div class=" main-contact-form">
                    
                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            <label for="exampleInputEmail1">Old Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="oldpass" name="old_password">
                        </div>
                        <input type="hidden" name="test" id="test">
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            <label for="exampleInputEmail1">New Password<span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            <label for="exampleInputEmail1">Confirm Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control"  name="confirm_password">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-lg-12">
                         <input type="button" value = "Save" id="changePassBtn" class="btn btn-primary btn-custom"/>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>           
        </div>
    </div>
</div>

<?php } ?>
