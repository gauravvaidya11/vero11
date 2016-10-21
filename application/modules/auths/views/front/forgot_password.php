
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
            var BASE_URL = "<?php echo BASE_URL; ?>";
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
                
                        
                            <h4><?php echo lang("heading_pelase_enter_email");?></h4>
                            
                            <div id="forgot-form" class="form_section form-group">
                                <?php $attributes = array('name' => "forgotpass", 'id' => 'forgot-password');
                                echo form_open(BASE_URL.'send-forgot-password', $attributes);
                                ?>  
                                <?php echo $this->session->flashdata('success_message'); ?>
                                <?php echo $this->session->flashdata('error_message'); ?>
                                <ul>
                                    <li>
                                        <input class="form-control" id="inputEmail3" type="email"  placeholder="<?php echo lang("login_username_placeholder"); ?>" name="email"/>
                                    <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                                    </li>
                                </ul>
                                <button type="submit" name="submit" id="forgot-btn" value="Submit" class="btn btn-default">Submit</button>
                                <a href="<?php echo base_url(); ?>login" class="registration_sign_in demo-3"><?php echo lang("sign_in_link"); ?></a>
                                </form>
                            </div>

                            <!-- <div id="reset-form"  class="form_section form-group">
                                <?php $attributes = array('name' => "resetPass", 'id' => 'reset-password');
                                echo form_open('reset-password', $attributes);
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
 -->

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