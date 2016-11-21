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

    $playerType = array("1"=>lang("hired"),"2" =>lang("free"));

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
<div class="plyrDtls">
    <div class="container">
        <?php //$this->load->view("front/nav_menu"); ?>
        
        <div class="">
            <?php //pr($player_info);?>
            <div class="topHead"><span><?php echo lang("heading_player_details");?></span></div>
            <div class="editSubHead"><p><?php echo lang("sub_heading_you_can_view_player_detail");?></p></div>
            
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
                            <label><?php echo lang('club_name_label'); ?></label>
                            <p id="club_name"><?php if(isset($player_info->club_name) && $player_info->club_name!='0' && $player_info->club_name!=''){ echo $player_info->club_name; }else{ echo "<strong>N/A</strong>"; }?></p>
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
            </div>
            <?php 
                $video_data = $this->club_model->get_video_info($player_info->user_id);    
                $image_data = $this->club_model->get_image_info($player_info->user_id);    

                if($image_data){ ?>
                <div class="prflMypics">
                    <div class="topHead"><span><?php echo lang("sidebar_my_images"); ?></span></div>
                    <ul class="clearfix">
                        <?php foreach ($image_data as $value) { 
                                if($value['filename']!=null && $value['filename']!=''){
                                   $image_url = BASE_URL."public/uploads/player_image/".$value['filename']; 
                                }else{
                                   $image_url = BASE_URL. "public/front/assets/images/playesPic1.jpg";
                                }
                            ?>
                              <li><img src="<?php echo $image_url; ?>" alt="Players Image" /></li>    
                        <?php } ?> 
                    </ul>
                </div>
            <?php } 

            if($video_data){ 
            ?>
                <div class="prflMypics">
                    <div class="topHead"><span><?php echo lang("sidebar_my_videos"); ?></span></div>
                    <ul class="clearfix">
                        <?php foreach ($video_data as $value) { 
                                if($value['filename']!=null && $value['filename']!=''){
                                   $videourl = $value['filename']; 
                                }else{
                                   $videourl = BASE_URL. "public/front/assets/images/playesVdo1.jpg";
                                }
                            ?>
                              <li><a class="open-video my_vedio" title="<?php echo $value['title']; ?>" video_url="<?php echo $value['filename']; ?>" href=""><img src="<?php echo $videourl; ?>" alt="Players video" /></a></li>    
                        <?php } ?> 
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!--<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/search_js/search.js"></script>-->
