
<link href="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<section class="bnrInr"></section>

<!-- Login Sec -->
    <div class="container">
        <div class="formCntnr">
            <h2><?php echo lang("club_register_form_title"); ?></h2>
            <?php $attributes = array('name' => "club-registration", 'id' => 'club-register-form'); ?>
            <?php echo form_open(BASE_URL.'clubSignup', $attributes); ?>
            
            <?php $genderType = array("1" => lang("common_male_gender_select_option"), "2"=> lang("common_female_gender_select_option")); ?>
            
              <?php echo $this->session->flashdata('msg'); ?>

                <div class="topRadioBtns">
                    <div class="snglRdo">
                        <input checked="checked" type="radio" id="freeReg" name="paid_status" value="1" />
                        <label for="freeReg"><?php echo lang("register_user_free");?></label>
                    </div>
                    <div class="snglRdo">
                        <input type="radio" id="paidReg" name="paid_status" value="2" />
                        <label for="paidReg"><?php echo lang("register_user_paid");?></label>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="firstname"><?php echo lang("common_club_name_placeholder"); ?></label>
                    <input class="form-control" maxlength="50" placeholder="<?php echo lang("common_club_name_placeholder"); ?>" name="club_name" />
                    <?php echo form_error('lname', '<div class="has-error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="firstname"><?php echo lang("common_club_manager_name_placeholder"); ?></label>
                    <input class="form-control" maxlength="50" placeholder="<?php echo lang("common_club_manager_name_placeholder"); ?>" name="club_manager_name"/>
                    <?php echo form_error('fname', '<div class="has-error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="firstname"><?php echo lang("common_email_placeholder"); ?></label>
                    <input class="form-control" id="username"  placeholder="<?php echo lang("common_email_placeholder"); ?>" type="text" name="email"/>
                    <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="firstname"><?php echo lang("date_of_foundtaion_of_club_label"); ?></label>
                    <input type="text" class="form-control datepicker" readonly="readonly" placeholder="<?php echo lang("date_of_foundtaion_of_club_label"); ?>" id="birthday" name="birthday"/>
                    <?php echo form_error('birthday', '<div class="has-error">', '</div>'); ?>
                    <input type="hidden" name="age" id="age"/>
                </div>

                <!-- <div class="form-group">
                    <label for="gender"><?php echo lang("common_gender"); ?></label><br>
                    <select name="gender" class="selectpicker">
                        <option value=""><?php echo lang("common_gender"); ?></option>
                        <?php foreach ($genderType as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php }?>
                    </select>
                </div> -->
                
                <div class="plcyTerms">
                    <label><input type="checkbox" value="" name="tnc" data-toggle="modal" role="button" href="#modal-container-783299" id="modal-783299"><?php echo lang("terms_condition_link"); ?></label>
                    <div id="register_tnc_error"></div>
                </div>

                <input type="submit" name="club_submit" class="btn btn-default btn-block btn-danger" value="<?php echo lang("common_submit_button"); ?>">

                <!-- <a href="#" class="facebook"><span><i class="fa fa-facebook" aria-hidden="true"></i></span><?php echo lang("sign_up_with_facebook"); ?></a>  -->
                <!-- <a href="<?php echo BASE_URL; ?>login" class="registration_sign_in"><?php echo lang("sign_in_link"); ?></a>  -->
                
                <div class="form-group clearfix">
                    <!-- <div class="forgtPass"><a href="<?php base_url(); ?>forgot-password"><?php echo lang("login_forgot_password_button"); ?></a></div> -->
                    <div class="registration_sign_in"> <a href="<?php echo BASE_URL; ?>login"><?php echo lang("sign_in_link"); ?></a></div>
                </div>
                
                

                <!-- <div class="checkbox custom_checkbox">
                    <label><input type="checkbox" value="" name="tnc" data-toggle="modal" role="button" href="#modal-container-783299" id="modal-783299"><?php echo lang("terms_condition_link"); ?></label>
                    <div id="register_tnc_error"></div>
                </div> -->

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
                                <button type="button" data-dismiss="modal" class="btn btn-default btn-block btn-danger" >
                                    <?php echo lang("terms_condition_iaccept_button"); ?>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

            <?php echo form_close();?>
        </div>
    </div>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo base_url(); ?>public/front/assets/js/custom/auth_js/register.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/js/jquery.validate.min.js"></script>
        