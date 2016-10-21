<link href="<?php echo BASE_URL; ?>public/front/assets/css/common/validation_error.css" rel="stylesheet">
<style>
    .error {
        color: red;
    }
    .gal_js_error{
        color: #E13323;
    }
</style>
<div class="col-sm-9 sec-right">
    <?php echo $this->session->flashdata('success_message'); ?>
    <?php echo $this->session->flashdata('error_message'); ?>

    <?php $positions = array("1"=>lang("goalkeeper"),
                             "2" =>lang("right_wing"),
                             "3" =>lang("center_back"),
                             "4" =>lang("left_back"),
                             "5" =>lang("left_wing"),
                             "6" =>lang("defensive_mid_fielder"),
                             "7" =>lang("right_mid_fielder"),
                             "8" =>lang("left_mid_fielder"),
                             "9" =>lang("righ_forward"),
                             "10" =>lang("striker"),
                             "11" =>lang("left_forward")
                        );

    $player_type = array("1"=>lang("hired"),"2" =>lang("free"));

    $laterality = array("1"=>lang("right_footed"), "2" =>lang("left_footed"),"3" =>lang("two_footed"));

    ?>
    
    <div class="targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 1)?"style='display:block;'":"style='display:none;'" ?> id="div1">
        <div class="profile_right">
            <h2 class="enter_bio"><?php echo lang('edit_profile_tilte'); ?> <span class="add_more"><a id="edit_btn" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> <?php echo lang('edit_button'); ?></a></span></h2>
            <div class="row">
                <div class="col-sm-12 main-contact-form">
                    
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('common_firstname_placeholder'); ?></label>
                                <p id="first-name"><?php if($player_info->first_name){ echo $player_info->first_name;}else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('common_lastname_placeholder'); ?></label>
                                <p id="last-name"><?php if(isset($player_info->last_name)) {echo $player_info->last_name; }else{ echo "<strong>N/A</strong>"; }?></p>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('nick_name_label'); ?></label>
                                <p id="nick-name"><?php if($player_info->nick_name && $player_info->nick_name!='0'){ echo $player_info->nick_name;}else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('birthday_label'); ?></label>
                                <p id="birth-day"><?php if($player_info->birthday && $player_info->birthday!='0') { echo $player_info->birthday;} else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('common_age_placeholder'); ?></label>
                                <p id="ag"><?php if($player_info->age && $player_info->age!='0'){ echo $player_info->age;}else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('common_gender'); ?></label>
                                <p id="gen"><?php if($player_info->gender && $player_info->gender!='0') { echo $player_info->gender;}else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('height_label'); ?></label>
                                <p id="hgt"><?php if(isset($player_info->height) && $player_info->height!='0') {echo $player_info->height; } else{ echo "<strong>N/A</strong>"; }?></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('weight_label'); ?></label>
                                <p id="wgt"><?php if(isset($player_info->weight) && $player_info->weight!='0'){ echo $player_info->weight;} else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('laterality_label'); ?></label>
                                <p id="lat"><?php if(isset($player_info->laterality) && $player_info->laterality!='0'){ echo $player_info->laterality;}else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('country_label'); ?></label>
                                <p id="count"><?php if(isset($player_info->country)) { echo $player_info->country;} ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('cpf_label'); ?></label>
                                <p id="cpff"><?php if(isset($player_info->cpf) && $player_info->cpf!='0') { echo $player_info->cpf;} else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('playing_position1_label'); ?></label>
                                <p id="position-1"><?php if(isset($player_info->position_1) && $player_info->position_1!='0') {echo $positions[$player_info->position_1];} else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('playing_position2_label'); ?></label>
                                <p id="position-2"><?php if(isset($player_info->position_2) && $player_info->position_2){ echo $positions[$player_info->position_2]; } else{ echo "<strong>N/A</strong>"; }?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('playing_position3_label'); ?></label>
                                <p id="position-3"><?php if(isset($player_info->position_3) && $player_info->position_3!='0'){ echo $positions[$player_info->position_3];} else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('playing_type_label'); ?></label>
                                <p id="play-type"><?php if(isset($player_info->player_type) && $player_info->player_type!='0'){ echo $player_type[$player_info->player_type]; }else{ echo "<strong>N/A</strong>"; }?></p>
                            </div>
                        </div>
                        <div class="col-sm-12 commann-heading commann-heading-2 ">
                            <h3>Contact us</h3>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('contact_mobile_label'); ?></label>
                                <p id="contact_mobile"><?php if(isset($player_info->mobile) && $player_info->mobile!='0') {echo $player_info->mobile; }else{ echo "<strong>N/A</strong>"; }?></p>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('contact_email_label'); ?></label>
                                <p id="contact_email"><?php if(isset($player_info->email) && $player_info->email!='0'){ echo $player_info->email;}else{ echo "<strong>N/A</strong>"; } ?></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('contact_facebook_label'); ?></label>
                                <p id="contact_fb"><a href="javascript:void(0)"><?php if(isset($player_info->facebook) && $player_info->facebook!='0' && $player_info->facebook!='') { echo $player_info->facebook;}else{ echo "<strong>N/A</strong>"; } ?></a></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('contact_instagram_label'); ?></label>
                                <p id="contact_insta"><a href="javascript:void(0)"><?php if(isset($player_info->instagram) && $player_info->instagram!='0') {echo $player_info->instagram;}else{ echo "<strong>N/A</strong>"; } ?></a></p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group comman-group">
                                <label for="exampleInputEmail1"><?php echo lang('contact_twitter_label'); ?></label>
                                <p id="contact_twitter"><a href="javascript:void(0)"><?php if(isset($player_info->twitter) && $player_info->twitter!='0') {echo $player_info->twitter;}else{ echo "<strong>N/A</strong>"; } ?></a></p>
                            </div>
                        </div>

                    <!-- <div class="col-sm-12">
                        <div class="add_more custom-add-more1"> <a id="edit_btn" href="javascript:void(0)" role="button" data-toggle="modal"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> <?php echo lang('edit_button'); ?></a> </div>
                    </div> -->

                </div>
            </div>

        </div>
    </div>
    

</div>      
<!--  popup-->
<div class="modal fade" id="player-profile" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open_multipart('athlete/edit',array("id"=>"editProfileForm"));?> 
            <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-times" aria-hidden="true"></i>

            </button>
            <div class="modal-header">
                <div class="col-sm-12">
                    <div class="pop-up-inner">


<!-- <form id="form1" runat="server">
    <input type='file' id="imgInp" />
    <img id="blah" src="#" alt="your image" />
</form> -->


<?php //echo $error;?> 

<div class="comm_profile-message"></div>
<div class="profile_img profile_img1">

    <img alt="" id="profileImage" src=""> 

    <span><label class="btn btn-primary">
        <?php echo lang('edit_pfile_pic_button'); ?> <i aria-hidden="true" class="fa fa-camera"></i> <input type="file" name="userfile" style="display: none;" id="img">
        

    </label></span> 
    
</div>


<h3 class="heading"><?php echo lang('edit_profile_pic_label'); ?></h3>
<div style="clear:both;"></div>
<span class="gal_js_error"></span>
</div>
</div>
</div>

<div class="modal-body">

    <!--start pop up code-->


    <div class=" main-contact-form">

        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('common_firstname_placeholder'); ?> <span style="color: red;">*</span></label>
                <input type="text" class="form-control"  placeholder="" id="fname" name="fname">
                <input type="hidden" id="hidden_profile_image" name="profile_image">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('common_lastname_placeholder'); ?><span style="color: red;">*</span></label>
                <input type="text" class="form-control"  placeholder="" id="lname" name="lname">
            </div>
        </div>


        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('nick_name_label'); ?></label>
                <input type="text" class="form-control"  placeholder="" id="nickname" name="nickname">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('birthday_label'); ?><span style="color: red;">*</span></label>
                <input type="text" readonly="readonly" class="form-control datepicker" id="birthday" name="birthday"/>
                <img src="<?php echo BASE_URL; ?>public/front/assets/images/date_picker.png" alt="">
            </div>
        </div>


        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('common_age_placeholder'); ?><span style="color: red;">*</span></label>
                <input type="text" class="form-control" placeholder="" id="age" name="age">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="col-sm-6 paddingLeft">
                <div class="form-group comman-group">
                    <label for="exampleInputEmail1"><?php echo lang('height_label'); ?><span style="color: red;">*</span></label>
                    <select class="form-control" id='height_m' name="height_m">
                        <option value="">-M-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 paddingLeft">
                <div class="form-group comman-group">
                    <label for="exampleInputEmail1">&nbsp;</label>
                    <select class="form-control" id='height_cm' name="height_cm">
                        <option value="">-CM-</option>
                        <?php for($i=0;$i<=100;$i++){ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('height_label'); ?><span style="color: red;">*</span></label>
                <input type="text" class="form-control"  placeholder="" id="height" name="height">

            </div>
        </div> -->
            
        <div class="col-sm-4">
            <?php $weight = array("1"=>"45-50",
                                  "2" =>"50-55",
                                  "3" =>"55-60",
                                  "4" =>"60-65",
                                  "5" =>"65-70",
                                  "6" =>"70-75",
                                  "7" =>"75-80",
                                  "8" =>"80-85",
                                  "9" =>"85-90",
                                  "10"=>"90-95",
                                  "11" =>"95-100",
                        );
            ?>
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('weight_label'); ?><span style="color: red;">*</span></label>
                <select class="form-control" id='weight' name="weight">
                    <option value=""><?php echo lang('weight_label'); ?></option>
                    <?php foreach ($weight as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>        
                    <?php }?>
                </select>
            </div>

            <!-- <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('weight_label'); ?><span style="color: red;">*</span></label>
                <input type="text" class="form-control"  placeholder="" id="weight" name="weight">

            </div> -->
        </div>

        <div class="col-sm-4">
            <div class="form-group comman-group">
                
                <label for="exampleInputEmail1"><?php echo lang('laterality_label'); ?><span style="color: red;">*</span></label>
                <select class="form-control" id='laterality' name="laterality">
                   <option value="">-<?php echo lang("laterality_label"); ?>-</option>
                    <?php foreach ($laterality as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>        
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('country_label'); ?><span style="color: red;">*</span></label>
                <select id="country" name="country" class="form-control">
                </select>
             </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('cpf_label'); ?><span style="color: red;">*</span></label>
                <input type="text" class="form-control vNumericOnly"  placeholder="" id="cpf" name="cpf">

            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group comman-group">
                <label for="exampleInputEmail1"><?php echo lang('playing_position1_label'); ?><span style="color: red;">*</span></label>
                <select id="pos1" class="form-control" name="position_1">
                    <option value=""><?php echo lang("playing_position1_label"); ?></option>
                    <?php foreach ($positions as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group comman-group">
                    <label for="exampleInputEmail1"><?php echo lang('playing_position2_label'); ?></label>
                    <select id="pos2" class="form-control" name="position_2">
                        <option value=""><?php echo lang("playing_position2_label"); ?></option>
                        <?php foreach ($positions as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group comman-group">
                        <label for="exampleInputEmail1"><?php echo lang('playing_position3_label'); ?></label>
                        <select id="pos3" class="form-control" name="position_3">
                        <option value=""><?php echo lang("playing_position3_label"); ?></option>
                       <?php foreach ($positions as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            
                            <label for="exampleInputEmail1"><?php echo lang('playing_type_label'); ?><span style="color: red;">*</span></label>
                            <select id="player_type" class="form-control" name="player_type">
                              <option value=""><?php echo lang('playing_type_label'); ?></option>
                              <?php foreach ($player_type as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?> </option>
                                <?php } ?>
                            </select>
                      </div>
                  </div>



                  <div class="col-sm-12 commann-heading commann-heading-2 ">
                    
                </div>

                <div class="col-sm-4">
                    <div class="form-group comman-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_mobile_label'); ?><span style="color: red;">*</span></label>
                        <input type="text" class="form-control vNumericOnly" id="mobile" name="mobile" placeholder="+xx xx xxxxx xxxx">
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group comman-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_email_label'); ?></label>
                        <input type="text" class="form-control" id="email" name="email"  readonly="">
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group comman-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_facebook_label'); ?></label>
                        <input type="text" class="form-control" id="facebook" name="facebook">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group comman-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_instagram_label'); ?></label>
                        <input type="text" class="form-control" id="instagram" name="instagram">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group comman-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_twitter_label'); ?></label>
                        <input type="text" class="form-control" id="twitter" name="twitter">
                    </div>
                </div>            
            </div> 

            <!--end of pop up code-->
        </div>
        <div class="modal-footer">
            <div class="col-lg-12">
             <input type = "button" value = "<?php echo lang('save_button'); ?>" id="editProfile" class="btn btn-primary btn-custom"/>
             <!-- <input type="submit" value="<?php echo lang('upload_button'); ?>" id="update-image" class="btn btn-primary btn-custom" /> -->
                   <!--  <button type="submit" data-dismiss="modal" class="btn btn-primary btn-custom" >
                        Save
                    </button> -->
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</div>
</div>


<div class="modal fade" id="change-pass" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="change-pass-message"></div>
        <?php $attributes = array('name' => "chnagePassword", 'id' => 'change-password-form'); ?>
            <?php echo form_open('athlete/chnagePassword', $attributes); ?>
            <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            

            <div class="modal-body">
                <!--start pop up code-->
                <div class=" main-contact-form">
                    
                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            <label for="exampleInputEmail1">Old Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="oldpass" name="old_password">
                        </div>
                        <input type="hidden" name="test" id="test">
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            <label for="exampleInputEmail1">New Password<span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group comman-group">
                            <label for="exampleInputEmail1">Confirm Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control"  name="confirm_password">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-lg-12">
                         <input type="button" value = "Save" id="changePassBtn" class="btn btn-primary btn-custom"/>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>           
        </div>
    </div>
</div>
<script type="text/javascript">
    var isLogin = "<?php echo $this->session->userdata('player_id'); ?>";
    var AVATAR_IMAGE = "<?php echo AVATAR_IMAGE; ?>";
    var PROFILE_IMAGE = "<?php echo PROFILE_IMAGE; ?>";
    
</script>


<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/scripts.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.form.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/jquery.validate.cpf.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/countries/countries.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/profile_js/player.js"></script>

<!--=====this is use for mobile no mask=========-->
<!--<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.js"></script>-->

<script src="https://raw.github.com/RobinHerbots/jquery.inputmask/2.x/js/jquery.inputmask.js" type="text/javascript"></script>
<script src="https://raw.github.com/RobinHerbots/jquery.inputmask/2.x/js/jquery.inputmask.extensions.js" type="text/javascript"></script>