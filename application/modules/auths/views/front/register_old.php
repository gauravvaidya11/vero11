
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo lang("registration"); ?></title>
    <link href="<?php echo BASE_URL; ?>public/front/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/front/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/front/assets/css/media.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/front/assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/front/assets/css/common/validation_error.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/front/assets/css/common/common.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">

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
                        <h4><?php echo lang("register_form_title"); ?></h4>
                        <?php echo $this->session->flashdata('msg'); ?>

                        <?php $attributes = array('name' => "registration", 'id' => 'register-form'); ?>
                            <?php echo form_open(BASE_URL.'signup', $attributes); ?>
                            <?php $genderType = array("1" => lang("common_male_gender_select_option"), "2"=> lang("common_female_gender_select_option")); ?>
                        <div class="form_section form-group">
                            
                            <ul>
                                <li>
                                    <input class="form-control vAlphabetsOnly" maxlength="50" placeholder="<?php echo lang("common_firstname_placeholder"); ?>" name="fname"/>
                                    <?php echo form_error('fname', '<div class="has-error">', '</div>'); ?>
                                </li>
                                <li>
                                    <input class="form-control vAlphabetsOnly" maxlength="50" placeholder="<?php echo lang("common_lastname_placeholder"); ?>" name="lname" />
                                    <?php echo form_error('lname', '<div class="has-error">', '</div>'); ?>
                                </li>
                                <li>
                                <input class="form-control" id="username"  placeholder="<?php echo lang("common_email_placeholder"); ?>" type="text" name="email"/>
                                    <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                                </li>
                                <li>
                                    <input type="text" class="form-control datepicker" readonly="readonly" placeholder="<?php echo lang("common_dob_placeholder"); ?>" id="birthday" name="birthday"/>
                                    <?php echo form_error('birthday', '<div class="has-error">', '</div>'); ?>
                                </li>
                                <!-- <input type="hidden" name="age" id="age"> -->
                               
                                    <input type="hidden" name="age" id="age"/>
                                
                                <li>
                                    <select name="gender" class="custom_gender">
                                        <option value=""><?php echo lang("common_gender"); ?></option>
                                        <?php foreach ($genderType as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php }?>
                                    </select>
                                </li>
                            </ul>

                            <button class="btn btn-default" name="submit" value="register" type="submit"><?php echo lang("register_button"); ?></button>
                            
                            <a href="#" class="facebook"><span><i class="fa fa-facebook" aria-hidden="true"></i></span><?php echo lang("sign_up_with_facebook"); ?></a> 
                            <a href="<?php echo BASE_URL; ?>login" class="registration_sign_in demo-3"><?php echo lang("sign_in_link"); ?></a> 
                        </div>


                        <div class="checkbox custom_checkbox">
                            <label><input type="checkbox" value="" name="tnc" data-toggle="modal" role="button" href="#modal-container-783299" id="modal-783299"><?php echo lang("terms_condition_link"); ?></label>
                            <div id="register_tnc_error"></div>
                        </div>

                        <div class="modal fade" id="modal-container-783299" role="dialog" aria-labelledby="myModalLabe1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                                        <i class="fa fa-times" aria-hidden="true"></i>

                                    </button>
                                    <div class="modal-body">
                                        <!--start pop up code add more-->
                                        <div class="col-sm-12 main-contact-form">

                                            <div class="term_and_condtion">
                                                <h2 class=""><?php echo lang("terms_condition_link"); ?></h2>
                                                <p><?php echo lang("terms_condition_content_p1"); ?></p>
                                                <p><?php echo lang("terms_condition_content_p2"); ?></p>
                                            </div>
                                        </div> 
                                        <!--end of pop up code-->
                                    </div>
                                    <div class="modal-footer clearfix share">
                                        <button type="button" data-dismiss="modal" class="btn btn-primary btn-custom" >
                                            <?php echo lang("terms_condition_iaccept_button"); ?>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url(); ?>public/front/assets/js/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>public/front/assets/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url(); ?>public/front/assets/js/scripts.js"></script> 
    <script src="<?php echo base_url(); ?>public/front/assets/js/anchorHoverEffect.js"></script> 
    <script src="<?php echo base_url(); ?>public/front/assets/js/custom/auth_js/register.js"></script>
    <script src="<?php echo base_url(); ?>public/front/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>public/common/js/default_common.js"></script>
    <script src="<?php echo base_url(); ?>public/front/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script>
        $(".demo-3").anchorHoverEffect({type: 'flip'});
    </script>
    
</body>
</html>

<style>


</style>