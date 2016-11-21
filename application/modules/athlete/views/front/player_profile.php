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

$playerType = array("2" =>lang("free"), "1"=>lang("hired"));

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
                 <img src="<?php echo TIMTHUMB.$profile_image.'&w=150h=150'; ?>" alt="Profile Image" id="profileImage" class="profileImage"/>
                    </div>
                    <div class="userLogin">
                        <span class="profileName"><?php if($user_info['first_name']){ echo ucfirst($user_info['first_name'].' '. $user_info['last_name']); } ?>  </span>
                    </div>
                </div>
        </div>
    </div>
</section>

<div class="clubProfile">
    <div class="container">

        <?php $this->load->view("front/nav_menu"); ?>

        <?php $user_info = userLoggedInInfo(); ?>
        <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>

        <div class="clbPrflRght targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 1)?"style='display:block;'":"style='display:none;'" ?> id="div1">
            <div class="comm-message"></div>
            <?php echo $this->session->flashdata('success_message'); ?>
            <?php echo $this->session->flashdata('error_message'); ?>
            <div class="topHead"><span><?php echo lang("heading_about_player_profile"); ?></span></div>
            <div class="editSubHead"><p><?php echo lang("heading_you_can_mange_club_profile_here"); ?></p></div>
            
            <?php echo form_open_multipart('athlete/updateProfileImage',array("id"=>"updateProfileImageForm"));?> 
            <div class="editPrfImage">
                <div class="editImg">
                    <div class="editImgInr">
                        <img src="<?php echo TIMTHUMB.$profile_image.'&w=150h=150'; ?>" alt="Profile Image" id="profileImage" class="profileImage"/>
                    </div>
                            <label>
                                <div class="editImgIcn"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                                <input type="file" name="user_profile" style="display: none;" id="img">
                            </label>
                    
                </div>
                <p> 
                    <span class="profileName" ><?php if($user_info['first_name']){ echo ucfirst($user_info['first_name'].' '. $user_info['last_name']); } ?></span> 
                    <?php if($user_info['user_type']==2){ ?>
                    <span class="super_script"><?php echo lang("heading_as_a"); ?></span>
                    <?php } ?>
                </p>
                <?php if($user_info['user_type']==2){
                        if($user_info['paid_status']==1){ ?>
                            <span class="custom_free_user freeuser"> <?php echo lang("heading_club_free_user"); ?></span>        
                <?php }else{ ?>
                            <span class="custom_free_user paiduser"> <?php echo lang("heading_club_paid_user"); ?></span>        
                 <?php }
                    } ?>
                
            </div>
            <?php echo form_close();?>

            <div class="prflFrmCntnr">
                <div class="snglRowPrfl clearfix">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('common_firstname_placeholder'); ?></label>
                            <p id="first-name"><?php if($player_info->first_name){ echo $player_info->first_name;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('common_lastname_placeholder'); ?></label>
                            <p id="last-name"><?php if(isset($player_info->last_name) && $player_info->last_name!='0' && $player_info->last_name!='') {echo $player_info->last_name; }else{ echo "<strong>N/A</strong>"; }?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('nick_name_label'); ?></label>
                            <p id="nick-name"><?php if($player_info->nick_name && $player_info->nick_name!='0'){ echo $player_info->nick_name;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                </div>
                <div class="snglRowPrfl clearfix">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('birthday_label'); ?></label>
                            <p id="birth-day"><?php if($player_info->birthday && $player_info->birthday!='0' && $player_info->birthday!='') { echo $player_info->birthday;} else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('common_age_placeholder'); ?></label>
                            <p id="ag"><?php if($player_info->age && $player_info->age!='0' && $player_info->age!=''){ echo $player_info->age;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">

                            <label><?php echo lang('common_gender'); ?></label>
                            <p id="gen"><?php if($player_info->gender && $player_info->gender!='0' && $player_info->gender!='') { echo $genderType[$player_info->gender];}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                </div>
                <div class="snglRowPrfl clearfix">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('height_label'); ?></label>
                            <p id="hgt"><?php if(isset($player_info->height) && $player_info->height!='0' && $player_info->height!='') {echo $player_info->height; } else{ echo "<strong>N/A</strong>"; }?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('weight_label'); ?></label>
                            <p id="wgt"><?php if(isset($player_info->weight) && $player_info->weight!='0' && $player_info->weight!=''){ echo $player_info->weight;} else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('laterality_label'); ?></label>
                            <p id="lat"><?php if(isset($player_info->laterality) && $player_info->laterality!='0' && $player_info->laterality!=''){ echo $laterality[$player_info->laterality];}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                </div>
                <div class="snglRowPrfl clearfix">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('country_label'); ?></label>
                            <p id="count"><?php if(isset($player_info->country) && $player_info->country!='0' && $player_info->country!='' && $player_info->country!='null') { 
                                    $country_name = getCountryByCountryId($player_info->country); 
                                    echo $country_name['country_name'];}else{ echo "<strong>N/A</strong>";} ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('cpf_label'); ?></label>
                            <p id="cpff"><?php if(isset($player_info->cpf) && $player_info->cpf!='0' && $player_info->cpf!='' && $player_info->cpf!='null') { echo $player_info->cpf;} else{ echo "<strong>xxx.xxx.xxx-xx</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('playing_position1_label'); ?></label>
                            <p id="position-1"><?php if(isset($player_info->position_1) && $player_info->position_1!='0' && $player_info->position_1!='') {echo $positions[$player_info->position_1];} else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                </div>
                <div class="snglRowPrfl clearfix">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('playing_position2_label'); ?></label>
                            <p id="position-2"><?php if(isset($player_info->position_2) && $player_info->position_2!='0' && $player_info->position_2!=''){ echo $positions[$player_info->position_2]; } else{ echo "<strong>N/A</strong>"; }?></p>
                        </div>
                    </div>

                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('playing_position3_label'); ?></label>
                            <p id="position-3"><?php if(isset($player_info->position_3) && $player_info->position_3!='0' && $player_info->position_3!=''){ echo $positions[$player_info->position_3];} else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>

                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('playing_type_label'); ?></label>
                            <p id="play-type"><?php if(isset($player_info->player_type) && $player_info->player_type!='0' && $player_info->player_type!=''){ echo $playerType[$player_info->player_type]; }else{ echo "<strong>N/A</strong>"; }?></p>
                        </div>
                    </div>

                </div>

                <?php if($player_info->player_type=='1'){ ?>
                 <div class="snglRowPrfl clearfix show_hide_club">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('hire_club_name_label'); ?></label>
                            <p id="club_name"><?php if(isset($player_info->hire_club_name) && $player_info->hire_club_name!='0' && $player_info->hire_club_name!=''){ echo $player_info->hire_club_name; }else{ echo "<strong>N/A</strong>"; }?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="snglRowPrfl clearfix">
                    <div class="clbNameHed"><?php echo lang('contact_us_heading'); ?></div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('contact_mobile_label'); ?></label>
                            <p id="contact_mobile"><?php if(isset($player_info->mobile) && $player_info->mobile!='0' && $player_info->mobile!='') {echo $player_info->mobile; }else{ echo "<strong>N/A</strong>"; }?></p>
                        </div>
                    </div>
                   
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('contact_email_label'); ?></label>
                            <p id="contact_email"><?php if(isset($player_info->email) && $player_info->email!='0' && $player_info->email!=''){ echo $player_info->email;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                </div>
                <div class="snglRowPrfl clearfix">
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('contact_facebook_label'); ?></label>
                            <p id="contact_fb"><?php if(isset($player_info->facebook) && $player_info->facebook!='0' && $player_info->facebook!='') { echo $player_info->facebook;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('contact_twitter_label'); ?></label>
                            <p id="contact_twitter"><?php if(isset($player_info->twitter) && $player_info->twitter!='0' && $player_info->twitter!='') {echo $player_info->twitter;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <label><?php echo lang('contact_instagram_label'); ?></label>
                            <p id="contact_insta"><?php if(isset($player_info->instagram) && $player_info->instagram!='0' && $player_info->instagram!='') {echo $player_info->instagram;}else{ echo "<strong>N/A</strong>"; } ?></p>
                        </div>
                    </div>
                </div>
                
                
                <!-- Popup Edit Profile -->
                
                <!-- Button trigger modal -->
                <button type="button" id="edit_btn" class="editBtn" data-toggle="modal" ><i class="fa fa-pencil"></i> <?php echo lang("edit_button"); ?></button>
                
                <!-- Modal -->
                <script>
                $(function () {
                    $("#birthday").datepicker({
                        format: "dd/mm/yyyy",
                        autoclose: true
                    });
                });
                </script>
                <div class="modal fade" id="player-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                        <?php echo form_open_multipart('athlete/edit',array("id"=>"editProfileForm"));?> 
                        <div class="prflFrmCntnr vdoImgMain">
                                <div class="comm_profile-message"></div>
                                <div class="snglRowPrfl clearfix">
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('common_firstname_placeholder'); ?> <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control vAlphabetsOnly"  placeholder="" id="fname" name="fname">
                                        </div>
                                    </div>
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('common_lastname_placeholder'); ?><span style="color: red;">*</span></label>
                                            <input type="text" class="form-control vAlphabetsOnly" placeholder="" id="lname" name="lname">
                                        </div>
                                    </div>
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('nick_name_label'); ?></label>
                                            <input type="text" class="form-control vAlphabetsOnly"  placeholder="" id="nickname" name="nickname">
                                        </div>
                                    </div>
                                </div>
                                <div class="snglRowPrfl clearfix">
                                   
                                    <div class="snglFldPrfl">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('birthday_label'); ?><span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" placeholder="" id="birthday" name="birthday" value="">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('common_age_placeholder'); ?><span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="" id="age" name="age">
                                        </div>
                                    </div>

                                   
                                    
                                    
                                </div>

                                <div class="snglRowPrfl clearfix">
                                     <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('weight_label'); ?><span style="color: red;">*</span></label>
                                            <select class="selectpicker" id='weight' name="weight">
                                               <!-- <option value=""><?php echo lang('weight_label'); ?></option> -->
                                                <?php foreach ($weight as $key => $value) { ?>
                                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>        
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label for="exampleInputEmail1"><?php echo lang('height_label'); ?><span style="color: red;">*</span></label>
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
                                </div>

                                <div class="snglRowPrfl clearfix">
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('laterality_label'); ?><span style="color: red;">*</span></label>
                                            <select class="selectpicker" id='laterality' name="laterality">
                                               <!-- <option value="">-<?php echo lang("laterality_label"); ?>-</option> -->
                                                <?php foreach ($laterality as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>        
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="snglFldPrfl custom-country-dropdown">
                                        <div class="input-group">
                                            <label><?php echo lang('country_label'); ?><span style="color: red;">*</span></label>
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
                                            <label><?php echo lang('cpf_label'); ?></label>
                                            <input type="text" class="form-control vNumericOnly"  placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf">
                                        </div>
                                    </div>
                                </div>
                                <div class="snglRowPrfl clearfix">
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('playing_position1_label'); ?></label>
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
                                            <label><?php echo lang('playing_position2_label'); ?></label>
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
                                            <label><?php echo lang('playing_type_label'); ?><span style="color: red;">*</span></label>
                                            <select id="player_type" class="selectpicker" name="player_type">
                                              <!-- <option value=""><?php echo lang('playing_type_label'); ?></option> -->
                                              <?php foreach ($playerType as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="snglFldPrfl show_hide_club">
                                        <div class="input-group">
                                            <label><?php echo lang('hire_club_name_label'); ?><span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" maxlength="30"  placeholder="<?php echo lang('hire_club_name_label'); ?>" id="clubname" name="hire_club_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="snglRowPrfl clearfix">
                                    <div class="clbNameHed"><?php echo lang("contact_us_heading");?></div>
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('contact_mobile_label'); ?></label>
                                            <input type="text" class="form-control vNumericOnly" id="mobile" name="mobile" placeholder="+xx xx xxxxx xxxx">
                                        </div>
                                    </div>
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('contact_email_label'); ?></label>
                                            <input type="text" maxlength="90" class="form-control" id="email" name="email"  readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="snglRowPrfl clearfix">
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('contact_facebook_label'); ?></label>
                                            <input type="text" maxlength="90" class="form-control" id="facebook" name="facebook">
                                        </div>
                                    </div>
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('contact_instagram_label'); ?></label>
                                            <input type="text" maxlength="90" class="form-control" id="instagram" name="instagram">
                                        </div>
                                    </div>
                                    <div class="snglFldPrfl">
                                        <div class="input-group">
                                            <label><?php echo lang('contact_twitter_label'); ?></label>
                                            <input type="text" maxlength="90" class="form-control" id="twitter" name="twitter">
                                        </div>
                                    </div>
                                </div>
                                <div class="prflSavebtn">
                                    <button type="button" id="editProfile" class="btn btn-default btn-danger"><?php echo lang('save_button'); ?></button>
                                </div>
                        </div>
                        <?php echo form_close();?>
                      </div>
                    </div>
                  </div>
                </div> <!--Close modal here--> 


            </div>
        </div>

        <!--Start biography section here-->

        <div class="clbPrflRght targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 2)?"style='display:block;'":"style='display:none;'" ?> id="div2">
            
            <div class="prflFrmCntnr customPadding">

                <h2 class="enter_bio" id="biotitle"></h2>

                <p id="bio_content"></p>
                <!-- <div class="add_mores custom-add-more1"> 
                    <a id="edit-bioBtn" href="javascript:void(0)" role="button" data-toggle="modal">
                        <span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span> <?php echo lang('edit_button'); ?>
                    </a> 
                </div> -->

                <!--start Enter Bio code-->
                <div class="modal fade" id="player-biography" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true"></i>

                            </button>
                            <div class="modal-header">
                                <div class="col-md-12">
                                    <div class="pop-up-inner">
                                        <h2><?php echo lang('bio_title'); ?></h2>
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="comm-message"></div> -->
                        <?php $attributes = array('name' => "biography", 'id' => 'biography-form'); ?>
                        <?php echo form_open('', $attributes); ?>
                            <!--start pop up code add more-->
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <div class="main-contact-form">

                                        <div class="form-group video_box">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?> <span style="color: red;">*</span></label>
                                            <input type="text" maxlength="60" placeholder="" class="form-control vAlphabetsOnly vSingleSpace" name="bio_title" id="bio-title">
                                        </div>
                                        <div class="tax-box">
                                            <!-- <textarea class="form-control" rows="3" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.">

                                            </textarea> -->

                                            <textarea cols="80" id="edi" name="content" rows="10" maxlength='600'>

                                            </textarea>
                                            
                                        </div>


                                    </div> 
                                </div>
                                <!--end of pop up code-->
                            </div>
                            <div style="clear:both;height:5px;"></div>
                            <div class="modal-footer">
                                <div class="prflSavebtn">
                                <input type="button" name="submit" value="Save" id="editBio"  class="btn btn-default btn-danger">
                                </div>
                            </div>
                           <?php echo form_close();?>
                        </div>
                       
                    </div>

                </div>
                <!--end Enter Bio code-->        

                


            </div>
        <button type="button" id="edit-bioBtn" class="editBtn custom_btn_bio" data-toggle="modal" ><i class="fa fa-pencil"></i> <?php echo lang("edit_button"); ?></button>
        </div>
         <!--Close biography section here-->
        

         <!--Start player image section here-->
         <div class="clbPrflRght targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 3)?"style='display:block;'":"style='display:none;'" ?> id="div3">
            <div class="prflFrmCntnr vdoImgMain">
                
                <ul id="image-list">
                <h2 class="enter_bio"><?php echo lang('sidebar_my_images'); ?></h2>
                </ul>

    
                <!--start pop up code-->
            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabe1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

<!-- <form method="post" name="form"> -->
                        <!-- <div class="comm-message"></div> -->
                        <?php echo form_open_multipart('athlete/upload_player_image',array("id"=>"imageform"));?> 
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('add_image_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">

                            <!--start pop up code add more-->
                            <div class="col-md-12">
                                <div class="main-contact-form">
                                    <div class="video_box">

                                        <div class="form-group comman-group">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?> <span style="color: red;">*</span></label>
                                            <input type="text" placeholder="" maxlength="60" class="form-control" id="title" name="image_title">
                                        </div>
                                        <div class="form-group comman-group">
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        <?php echo lang('browse_button'); ?>&hellip; <input type="file" name="image" id="photoimg" style="display: none;"><span class="has-error"></span>
                                                    </span>
                                                </label>
                                                <div class="inptCntnrUpI"><input type="text" class="form-control" readonly></div>
                                            </div>
                                        </div>

                                    </div> 

                                </div>
                            </div>
                            <!--end of pop up code-->
                        </div>
                        
                        <div id='preview'> </div>
                        <div style="clear:both;height:5px;"></div>
                        <div class="modal-footer">
                            <div class="prflSavebtn">
                                <input type="submit" value="<?php echo lang('upload_button'); ?>" id="submit-image" class="btn btn-default btn-danger">
                             <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
                               <!--  <button type="button" name="upload"  class="btn btn-primary btn-custom" >
                                    Save
                                </button> -->
                            </div>  
                        </div>
                    <?php echo form_close();?>
                </div>

            </div>

        </div>
        <!--end pop up code-->


<!--start pop up code-->
            <div class="modal fade" id="editImage" role="dialog" aria-labelledby="myModalLabe1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- <div class="comm-message"></div> -->
<!-- <form method="post" name="form"> -->
                        <?php echo form_open_multipart('athlete/update_player_image',array("id"=>"update-image-form"));?> 
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('edit_image_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">

                            <!--start pop up code add more-->
                            <div class="col-md-12">
                                <div class="main-contact-form">
                                    <div class="video_box">
                                        <div class="form-group comman-group">
                                        <input type="hidden" name="imageid" id="imageid">
                                        <input type="hidden" name="hidden_player_image" id="playerImg">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?> <span style="color: red;">*</span></label>
                                            <input type="text" maxlength="80" placeholder="" class="form-control" id="image_title" name="image_title">
                                        </div>
                                        <img id="player-image" src="" height="100px" width="100px">
                                        
                                        <div class="form-group comman-group leftside">
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        <?php echo lang('browse_button'); ?>&hellip; <input type="file" name="image" id="" style="display: none;">
                                                    </span>
                                                </label>
                                                <div class="inptCntnrUpI"><input type="text" class="form-control" readonly></div>
                                            </div>
                                        </div>

                                    </div> 

                                </div>
                            </div>
                            <!--end of pop up code-->
                        </div>
                        
                            <div id='preview'>
                            </div>
                            <div style="clear:both;height:5px;"></div>
                            <div class="modal-footer">
                                <div class="prflSavebtn">
                                    <input type="submit" value="<?php echo lang('upload_button'); ?>" id="update-image" class="btn btn-default btn-danger">
                                 <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
                                   <!--  <button type="button" name="upload"  class="btn btn-primary btn-custom" >
                                        Save
                                    </button> -->
                                </div>  
                            </div>
                       <?php echo form_close();?>
                    </div>

                </div>

            </div>



            </div>
        </div>
        <!--End player image section here-->
        
         <!--Start player image section here-->
         <div class="clbPrflRght targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 4)?"style='display:block;'":"style='display:none;'" ?> id="div4">
            <div class="prflFrmCntnr vdoImgMain">
                
                <p> </p>
                <h2 class="enter_bio"><?php echo lang('sidebar_my_videos'); ?></h2>
                <ul id="video-list">
                    
                    
                </ul>

                <div class="modal fade" id="play-video" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true"></i>

                            </button>.
                            <div class="modal-header">
                                <div class="col-md-12">
                                    <div class="form-group comman-group">
                                        <label for="exampleInputEmail1" id="vid_title"><?php echo lang('common_title'); ?></label>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="modal-body">
                                 <div id="play">
                               
                                 <iframe id="video1" width="100%" height="360" src="" frameborder="0"></iframe>
                                 </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--end video uploae pop up code-->      
                </div>

                

                <div class="modal fade" id="modal-video" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>.
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('add_video_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="comm-message"></div>
                        <?php echo form_open_multipart('athlete/upload_video',array("id"=>"video-form"));?>
                        <div class="modal-body">

                            <!--start pop up code-->
                            <div class="col-sm-12">
                                <div class=" main-contact-form">
                                    <div class="video_box">
                                        <div class="form-group comman-group">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?> <span style="color: red;">*</span></label>
                                            <input type="text" placeholder="" class="form-control" name="video_title" id="video_title">
                                        </div>
                                        <div class="video_box">
                                            <div class="form-group comman-group">
                                                <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?> <span style="color: red;">*</span></label>
                                                <input type="text" maxlength="80" placeholder="" class="form-control" name="video_url" id="video_url">
                                            <input type="hidden" name="video_type" id="video_type">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--end of pop up code-->
                            </div>
                            <div style="clear:both;height:5px;"></div>
                            <div class="modal-footer">
                                <div class="prflSavebtn">
                                <input type="submit" value="<?php echo lang('save_button'); ?>" name="submit" id="uploadVideo" class="btn btn-default btn-danger">
                                <!-- <input type="submit" value="upload" id="update-image" class="btn btn-primary btn-custom" /> -->
                                   <!--  <button type="button" data-dismiss="modal" class="btn btn-primary btn-custom" >
                                        Share
                                    </button> -->
                                </div>
                            </div>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
                <!--end video uploae pop up code-->      
            </div>



            <div class="modal fade" id="edit-video" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>.
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('edit_video_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="comm-message"></div> -->
                        <?php echo form_open_multipart('athlete/update_player_video',array("id"=>"update-video-form"));?>
                        <div class="modal-body">

                            <!--start pop up code-->
                            <div class="col-sm-12">
                                <div class=" main-contact-form">
                                    <div class="video_box">
                                        <div class="form-group comman-group">
                                        <input type="hidden" name="videoid" id="videoid">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?> <span style="color: red;">*</span></label>
                                            <input type="text" maxlength="80" placeholder="" class="form-control" name="video_title" id="video-title">
                                        </div>
                                        <div class="video_box">
                                            <div class="form-group comman-group">
                                                <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?> <span style="color: red;">*</span></label>
                                                <input type="text" placeholder="" class="form-control" name="video_url" id="update_video_url">
                                            <input type="hidden" name="video_type" id="video-type">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--end of pop up code-->
                            </div>

                            <div style="clear:both;height:5px;"></div>
                            <div class="modal-footer">
                                <div class="prflSavebtn">
                                <input type="submit" value="<?php echo lang('save_button'); ?>" id="updateVideo" class="btn btn-default btn-danger">
                                <!-- <input type="submit" value="upload" id="update-image" class="btn btn-primary btn-custom" /> -->
                                   <!--  <button type="button" data-dismiss="modal" class="btn btn-primary btn-custom" >
                                        Share
                                    </button> -->
                                </div>
                            </div>
                        </div>
                       <?php echo form_close();?>
                    </div>
                </div>
                <!--end video uploae pop up code-->      
            </div>

    
            </div>  
        </div>
        <!--End player Video section here-->



    </div>
</div>



<!--=====this is use for mobile no mask=========-->
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>public/front/assets/ckeditor/ckeditor.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


<link href="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<script src="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


<script src="<?php echo BASE_URL; ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.form.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/jquery.validate.cpf.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/profile_js/player.js"></script>

<style>
    .modal-footer {
       /* margin-left: -16px;
        padding: 0;*/
    }
</style>
<!--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js">
<script src="<?php //echo BASE_URL; ?>public/front/assets/js/countries/countries.js"></script>
<script src="https://raw.github.com/RobinHerbots/jquery.inputmask/2.x/js/jquery.inputmask.js" type="text/javascript"></script>
<script src="https://raw.github.com/RobinHerbots/jquery.inputmask/2.x/js/jquery.inputmask.extensions.js" type="text/javascript"></script>
-->


