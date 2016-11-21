<section class="bnrInr"></section>

<!-- Login Sec -->
    <div class="container">
        <div class="formCntnr">
            <h2><?php echo lang("reset_password");?></h2>
            <?php $attributes = array('name' => "resetPass", 'id' => 'reset-password');
            echo form_open('send-reset-password', $attributes);
            ?>
              <?php echo $this->session->flashdata('success_message'); ?>
              <?php echo $this->session->flashdata('error_message'); ?>
                <div class="form-group">
                    <label for="email"><?php echo lang("email_address"); ?></label>
                    <input class="form-control" id="inputEmail3" type="text"  placeholder="<?php echo lang("enter_otp"); ?>" name="otp"/>
                    <?php echo form_error('otp', '<div class="has-error">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="pass"><?php echo lang("new_password"); ?></label>
                    <input type="password" class="form-control" id="inputPassword3" placeholder="<?php echo lang("new_password"); ?>" name="newpass"/>
                    <?php echo form_error('newpass', '<div class="has-error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="pass"><?php echo lang("registered_email"); ?></label>
                    <input type="text" class="form-control" id="email" placeholder="<?php echo lang("registered_email"); ?>" name="email"/>
                    <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                </div>

                
                
                <button type="submit" name="reset" class="btn btn-default btn-block btn-danger"><?php echo lang("common_submit_button"); ?></button>
                
                <div class="form-group clearfix">
                    <div class="forgtPass"><a href="<?php base_url(); ?>forgot-password"><?php echo lang("login_forgot_password_button"); ?></a></div>
                    <div class="signUp"> <a href="<?php echo base_url(); ?>signup"><?php echo lang("login_signin_link"); ?></a></div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>

<script src="<?php echo base_url(); ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo base_url(); ?>public/front/assets/js/custom/auth_js/login.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/js/jquery.validate.min.js"></script>
