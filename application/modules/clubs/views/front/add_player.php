<link href="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<?php $positions = array("1"=>lang("goalkeeper"),
                             "2" =>lang("right_wing"),
                             "3" =>lang("center_back"),
                             "4" =>lang("left_back"),
                             "5" =>lang("left_wing"),
                             "6" =>lang("defensive_mid_fielder"),
                             "7" =>lang("right_mid_fielder"),
                             "8" =>lang("left_mid_fielder"),
                             "9" =>lang("right_forward"),
                             "10" =>lang("striker"),
                             "11" =>lang("left_forward")
                        );
    //pr($positions);
    $laterality = array("1"=>lang("right_footed"),"2" =>lang("left_footed"),"3" =>lang("two_footed"));

    $playerType = array("2" =>lang("free"),"1"=>lang("hired"));

    $weight = array("1"=>"45-50",
                    "2" =>"50-55",
                    "3" =>"55-60",
                    "4" =>"60-65",
                    "5" =>"65-70",
                    "6" =>"70-75",
                    "7" =>"75-80",
                    "8" =>"80-85",
                    "9" =>"85-90",
                    "10"=>"90-95",
                    "11"=>"95-100"
            );
    $genderType = array("1" => lang("common_male_gender_select_option"), "2"=> lang("common_female_gender_select_option")); 
    ?>
    <section class="bnrInr">
        <div class="profilePicUser">   
            <div class="container">
                <div class="profilePicBnr">
                    <div class="ppCntn">
                         <?php $user_info = userLoggedInInfo(); ?>
                    <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>
                     <img src="<?php echo $profile_image; ?>" alt="Profile Image" id="profileImage"/>
                        </div>
                        <div class="userLogin">
                            <span class="profileName"><?php if($user_info['club_name']){ echo ucfirst($user_info['club_name']); } ?>  </span>
                        </div>
                    </div>
            </div>
        </div>
    </section>

<!-- Login Sec -->
    <div class="container">
        <!--=======Sidebar Navigation here==================-->
        <?php $this->load->view("front/nav_menu"); ?>
        <!--=======Sidebar Navigation here==================-->
        

        <div class="clbPrflRght">
            <div class="topHead"><span><?php echo lang("heading_register_player_by_club"); ?></span></div>
            <div class="editSubHead"><p><?php echo lang("sub_heading_for_register_player_by_club");?></p></div>
            
            <div class="plyrRegClb">
                <?php $attributes = array('name' => "registration", 'id' => 'player-register-form'); ?>
                    <?php echo form_open(BASE_URL.'save-player', $attributes); ?>
                    
                    
                    <?php echo $this->session->flashdata('msg'); ?>

                    <div class="snglRowPrfl nameFlds clearfix">
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('cpf_label'); ?></label><br>
                                <input type="text" class="form-control vNumericOnly"  placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf">
                            </div>
                        </div>

                        <div class="snglFldPrfl">

                            <div class="input-group">
                                <label for="firstname"><?php echo lang("common_firstname_placeholder"); ?> <span style="color: red;">*</span></label>
                                <input class="form-control" maxlength="50" placeholder="<?php echo lang("common_firstname_placeholder"); ?>" name="fname"/>
                                <?php echo form_error('fname', '<div class="has-error">', '</div>'); ?>
                            </div>
                        </div>

                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label for="firstname"><?php echo lang("common_lastname_placeholder"); ?> <span style="color: red;">*</span></label>
                                <input class="form-control" maxlength="50" placeholder="<?php echo lang("common_lastname_placeholder"); ?>" name="lname" />
                                <?php echo form_error('lname', '<div class="has-error">', '</div>'); ?>
                            </div>
                        </div>

                        
                    </div>
                    <div class="snglRowPrfl clearfix">
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label for="firstname"><?php echo lang("common_email_placeholder"); ?> <span style="color: red;">*</span></label>
                                <input class="form-control" id="username"  placeholder="<?php echo lang("common_email_placeholder"); ?>" type="text" name="email"/>
                                <?php echo form_error('email', '<div class="has-error">', '</div>'); ?>
                            </div>
                        </div>

                       
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label for="firstname"><?php echo lang("common_gender"); ?> <span style="color: red;">*</span></label><br>
                                <select name="gender" class="custom_gender selectpicker">
                                    <?php foreach ($genderType as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="snglFldPrfl">
                            <div class="form-group">
                                <label for="firstname"><?php echo lang("common_dob_placeholder"); ?> <span style="color: red;">*</span></label>
                                <input type="text" class="form-control datepicker" readonly="readonly" placeholder="<?php echo lang("common_dob_placeholder"); ?>" id="birthday" name="birthday"/>
                                <?php echo form_error('birthday', '<div class="has-error">', '</div>'); ?>
                                <input type="hidden" name="age" id="age"/>
                            </div>
                        </div>

                        
                    </div>
                    <div class="snglRowPrfl clearfix">
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label for="exampleInputEmail1"><?php echo lang('height_label'); ?><span style="color: red;">*</span></label> <br>
                                <select class="selectpicker" id='height_m' name="height_m">
                                    <option value="">-<?php echo lang("meter_label"); ?>-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label for="exampleInputEmail1">&nbsp;</label>
                                <select class="selectpicker" id='height_cm' name="height_cm">
                                    <option value="">-<?php echo lang("centimeter_label"); ?>-</option>
                                    <?php for($i=0;$i<=100;$i++){ ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('weight_label'); ?><span style="color: red;">*</span></label><br>
                                <select class="selectpicker" id='weight' name="weight">
                                   <!-- <option value=""><?php echo lang('weight_label'); ?></option> -->
                                    <?php foreach ($weight as $key => $value) { ?>
                                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                       
                    </div>
                    <div class="snglRowPrfl clearfix">
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('country_label'); ?><span style="color: red;">*</span></label><br>
                                <?php $country = getCountry(); ?>
                                <select id="country" name="country" class="selectpicker">
                                    <?php foreach ($country as $value) { ?>
                                        <option value="<?php echo $value['country_id']; ?>"><?php echo $value['country_name']; ?></option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        

                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('laterality_label'); ?><span style="color: red;">*</span></label> <br>
                                <select class="selectpicker" id='laterality' name="laterality">
                                   <!-- <option value="">-<?php echo lang("laterality_label"); ?>-</option> -->
                                    <?php foreach ($laterality as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>        
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        
                    </div>
                    <div class="snglRowPrfl clearfix">
                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('playing_position1_label'); ?></label> <br>
                                <select id="pos1" class="selectpicker" name="position_1">
                                <!-- <option value=""><?php echo lang("playing_position1_label"); ?></option> -->
                                <?php foreach ($positions as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('playing_position2_label'); ?></label><br>
                                <select id="pos2" class="selectpicker" name="position_2">
                                <!-- <option value=""><?php echo lang("playing_position2_label"); ?></option> -->
                                <?php foreach ($positions as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="snglFldPrfl">
                            <div class="input-group">
                                <label><?php echo lang('playing_position3_label'); ?></label>
                                <select id="pos3" class="selectpicker" name="position_3">
                                <!-- <option value=""><?php echo lang("playing_position3_label"); ?></option> -->
                               <?php foreach ($positions as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        

                    </div>
                    <div class="snglRowPrfl clearfix">
                        <div class="snglFldPrfl">
                            <div class="input-group">
                               <label><?php echo lang('playing_type_label'); ?><span style="color: red;">*</span></label><br>
                                <select id="player_type" class="selectpicker" name="player_type">
                                  <!-- <option value=""><?php echo lang('playing_type_label'); ?></option> -->
                                  <?php foreach ($playerType as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="snglFldPrfl">
                            <div class="show_hide_club">
                                <div class="input-group">
                                    <label><?php echo lang('hire_club_name_label'); ?><span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" maxlength="30"  placeholder="<?php echo lang('hire_club_name_label'); ?>" id="clubname" name="hire_club_name">
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="prflSavebtn">
                        <button type="submit" name="player_submit" class="btn btn-default btn-danger"><?php echo lang("common_submit_button"); ?></button>
                    </div>

                   
                <?php echo form_close();?>
            </div>
        </div>

    </div>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo base_url(); ?>public/front/assets/js/custom/auth_js/register.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/front/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.extensions.js" type="text/javascript"></script> 
        