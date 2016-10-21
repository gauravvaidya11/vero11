<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="<?php echo base_url(); ?>public/front/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/front/assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/front/assets/css/media.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/front/assets/css/common/validation_error.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/front/assets/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/common/jquery-ui-bootstrap-master/jquery.ui.theme.font-awesome.css" rel="stylesheet">
        <script type="text/javascript">
            var csrf_token = "<?php echo $this->security->get_csrf_hash(); ?>";
            var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
            var BASE_URL = "<?php echo base_url(); ?>";
        </script>
        <?php $this->load->view("template/lang"); ?>
    </head>
    <body>
    <?php $this->load->view("template/front/header"); ?>
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login_form">
                            <h4><?php echo lang("login_form_title"); ?></h4>
                            
                            <div class="form_section form-group">

                                <?php $attributes = array('name' => "login", 'id' => 'login-form');
                                echo form_open('login', $attributes);
                                ?>
                                  <?php echo $this->session->flashdata('success_message'); ?>
                                  <?php echo $this->session->flashdata('error_message'); ?>
                                <ul>
                                    <li>
                                        <input class="form-control" id="inputEmail3" type="email"  placeholder="<?php echo lang("login_username_placeholder"); ?>" name="email"/>
                                    <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                                    </li>
                                    <li>
                                        <input class="form-control" id="inputPassword3" type="password" placeholder="<?php echo lang("login_password_placeholder"); ?>" name="password"/>
                                    <?php echo form_error('password', '<div class="has-error">', '</div>'); ?>
                                    </li>
                                </ul>
                                <button type="submit" name="login" value="<?php echo lang("login_button"); ?>" class="btn btn-default"><?php echo lang("login_button"); ?></button>
                                </form>
                            </div>
                            <a href="<?php base_url(); ?>forgot-password" class="demo-3"><?php echo lang("login_forgot_password_button"); ?></a> <a href="<?php echo base_url(); ?>signup" class="sign_up demo-3"><?php echo lang("login_signin_link"); ?></a> </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo base_url(); ?>public/front/assets/js/jquery.min.js"></script> 
        <script src="<?php echo base_url(); ?>public/front/assets/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url(); ?>public/front/assets/js/scripts.js"></script> 
        <script src="<?php echo base_url(); ?>public/front/assets/js/anchorHoverEffect.js"></script> 
        <script src="<?php echo base_url(); ?>public/front/assets/js/custom/auth_js/login.js"></script>
        <script src="<?php echo base_url(); ?>public/front/assets/js/jquery.validate.min.js"></script>
        <script>
            $(".demo-3").anchorHoverEffect({type: 'flip'});
        </script>
    </body>
</html>
<style>
    
</style>