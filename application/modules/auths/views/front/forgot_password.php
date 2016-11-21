<section class="bnrInr"></section>
<div class="container">
    <div class="formCntnr">
        <h2><?php echo lang("login_forgot_password_button"); ?></h2>
       

       <?php $attributes = array('name' => "forgotpass", 'id' => 'forgot-password');
        echo form_open(BASE_URL.'send-forgot-password', $attributes);
        ?>
           <?php echo $this->session->flashdata('success_message'); ?>
            <?php echo $this->session->flashdata('error_message'); ?>
            <div class="form-group">
                <label for="email"><?php echo lang("email_address"); ?></label>
                <input class="form-control" id="inputEmail3" type="email"  placeholder="<?php echo lang("email_address"); ?>" name="email"/>
                <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
            </div>
            
            <button type="submit" name="submit" id="forgot-btn" value="Submit" class="btn btn-default btn-block btn-danger"><?php echo lang("common_submit_button"); ?></button>
            
            <div class="form-group clearfix">
                <div class="signUp"> <a href="<?php echo BASE_URL; ?>login"><?php echo lang("sign_in_link"); ?></a></div>
            </div>
        <?php echo form_close();?>
    </div>
</div>

<script src="<?php echo base_url(); ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo base_url(); ?>public/front/assets/js/custom/auth_js/login.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/js/jquery.validate.min.js"></script>
