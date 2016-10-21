<!-- <div class="content">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">

        <?php $attributes = array('name' => "login"); ?>
        <?php echo form_open('forgotPassword', $attributes); ?>
        <?php if(isset($message)) { echo $message;} ?>
        <h3>Reset Password</h3>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
                </div>
            </div>
        </div>

       <div class="form-actions">
            <button id="register-back-btn" type="button" class="btn">
                <i class="m-icon-swapleft"></i> Back </button>
            <input type="submit" id="register-submit-btn" name="submit" value="Submit" class="btn green pull-right">
            <i class="m-icon-swapright m-icon-white"></i>
        </div>           
        </form>
        <div class="col-lg-5"></div>
    </div> -->

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
                        <?php if($this->session->flashdata('success_message')) { ?>
                                <?php echo $this->session->flashdata('success_message'); ?>
                        <?php } ?>
                        <?php if($this->session->flashdata('error_message')) { ?>
                                <?php echo $this->session->flashdata('error_message'); ?>
                            </div>
                            <?php } ?>
                        <br>
                            <h4><?php echo lang("reset_password");?></h4>
                                                        
                            <div id="reset-form"  class="form_section form-group">
                                <?php $attributes = array('name' => "resetPass", 'id' => 'reset-password');
                                echo form_open('send-reset-password', $attributes);
                                ?>
                                <ul>
                                    <li>
                                        <input class="form-control" id="" type="text"  placeholder="OTP" name="otp"/>
                                    
                                    </li>
                                    <li>
                                        <input class="form-control" id="" type="text"  placeholder="New Password" name="newpass"/>
                                    
                                    </li>
                                    <li>
                                        <input class="form-control" id="" type="email"  placeholder="Email" name="email"/>
                                    
                                    </li>
                                </ul>
                                <button type="submit" name="reset" value="Reset" class="btn btn-default">Reset</button>
                                <a href="<?php echo base_url(); ?>login" class="registration_sign_in demo-3"><?php echo lang("sign_in_link"); ?></a>
                                </form>
                            </div>


                         </div>
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