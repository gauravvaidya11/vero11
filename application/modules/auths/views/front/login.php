

<section class="bnrInr"></section>

<!-- Login Sec -->
    <div class="container">
        <div class="formCntnr">
            <h2><?php echo lang("login_for_club"); ?></h2>
            <?php $attributes = array('name' => "login", 'id' => 'login-form');
            echo form_open('login', $attributes);
            ?>
              <?php echo $this->session->flashdata('success_message'); ?>
              <?php echo $this->session->flashdata('error_message'); ?>
                <div class="form-group">
                    <label for="email"><?php echo lang("email_address"); ?></label>
                    <input class="form-control" id="inputEmail3" type="email"  placeholder="<?php echo lang("email_address"); ?>" name="email"/>
                    <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label for="pass"><?php echo lang("login_password_placeholder"); ?></label>
                    <input class="form-control" id="inputPassword3" type="password" placeholder="<?php echo lang("login_password_placeholder"); ?>" name="password"/>
                    <?php echo form_error('password', '<div class="has-error">', '</div>'); ?>
                </div>
                
                <button type="submit" name="login" class="btn btn-default btn-block btn-danger"><?php echo lang("login_form_title"); ?></button>
                
                <div class="form-group clearfix">
                    <div class="forgtPass"><a href="<?php BASE_URL; ?>forgot-password"><?php echo lang("login_forgot_password_button"); ?></a></div>
                    <div class="signUp"> <a href="<?php echo BASE_URL; ?>register-by"><?php echo lang("login_signin_link"); ?></a></div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/auth_js/login.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>
        