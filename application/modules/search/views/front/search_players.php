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

    $playerAge = array("1"=>"13-16",
                    "2" =>"17-20",
                    "3" =>"21-24",
                    "4" =>"25-28",
                    "5" =>"29-32",
                    "6" =>"33-36",
                    "7" =>"37-40",
                    "8" =>"41-44"
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
<div class="clubProfile">
    <div class="container">

        <?php $this->load->view("front/nav_menu"); ?>

        <?php $user_info = userLoggedInInfo(); ?>
        <?php //if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>

        <div class="clbPrflRght">
            <div class="topHead"><span><?php echo lang("heading_search_players"); ?></span></div>
            <div class="editSubHead"><p><?php echo lang("sub_title_of_you_can_search_player_here"); ?></p></div>
            <div class="comm-message"></div>
            
            <?php $attributes = array('name' => "search_player", 'id' => 'searchPlayerForm'); ?>
            <?php echo form_open(BASE_URL.'search-players-info', $attributes); ?>

            <div class="remove_serach">
                <input type="button" class="btn btn-default btn-danger" id="removeSearch" name="resetform" value="<?php echo lang("button_name_reset_search");?>"><br>    
            </div>
            
            
            <div class="plyrRegClb">
                <!--=======End search form=====================-->

                <div class="snglRowPrfl">
                    <?php 
                        if(isset($_COOKIE['searchPlayerData']) && $_COOKIE['searchPlayerData']!='null'){
                            $array_data = json_decode($_COOKIE['searchPlayerData']);
                            foreach ($array_data as $value){
                                $arrayname[] = $value->name;    
                                $arrayvalue[] = $value->value;
                            } 
                            $search_data = array_combine($arrayname,$arrayvalue);
                        }else{
                            $search_data = "";
                            $search_data['player_name'] = "";
                            $search_data['search_age'] = "";
                            $search_data['search_country'] = "";
                            $search_data['position_1'] = "";
                            $search_data['position_2'] = "";
                            $search_data['position_3'] = "";
                            $search_data['weight'] = "";
                            $search_data['height_m'] = "";
                            $search_data['height_cm'] = "";
                            $search_data['page_no_value'] = "0";
                            
                            
                        }
                    ?>

                    <div class="snglFldPrfl">
                        <div class="input-group">
                            <input type="text" id="playerNAme" name="player_name" class="form-control searchPlayers" placeholder="<?php echo lang("placeholder_player_name"); ?>" value="<?php if($search_data['player_name']){ echo $search_data['player_name']; } ?>" />
                        </div>
                    </div>

                    <div class="snglFldPrfl">
                        <select id="search_age" name="search_age" class="selectpicker searchPlayers">
                            <option value=""><?php echo lang('heading_select_age'); ?></option>
                            <?php //for ($i=1; $i <= 100; $i++) { ?>
                            <?php foreach ($playerAge as $value) { ?>
                                <option value="<?php echo $value; ?>" <?php if($search_data['search_age']==$value){ echo "selected='selected'"; } ?>><?php echo $value; ?></option>    
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="snglFldPrfl">
                          <?php $country = getCountry(); ?>
                        <select id="country" name="search_country" class="selectpicker searchPlayers">
                            <option value=""><?php echo lang('heading_select_country'); ?></option>   
                            <?php foreach ($country as $value) { ?>
                                <option value="<?php echo $value['country_id']; ?>" <?php if($search_data['search_country']==$value){ echo "selected='selected'"; } ?>><?php echo $value['country_name']; ?></option>    
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="snglRowPrfl">
                
                    <div class="snglFldPrfl">
                        <select id="player_postion1" name="position_1" class="selectpicker searchPlayers">
                            <option value=""><?php echo lang("playing_position1_label"); ?></option>
                        <?php foreach ($positions as $key => $value) { ?>
                            <option value="<?php echo $key; ?>" <?php if($search_data['position_1']==$value){ echo "selected='selected'"; } ?>><?php echo $value; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="snglFldPrfl">
                         <select id="player_postion2" name="position_2" class="selectpicker searchPlayers" >
                            <option value=""><?php echo lang("playing_position2_label"); ?></option>
                            <?php foreach ($positions as $key => $value) { ?>
                                <option value="<?php echo $key; ?>" <?php if($search_data['position_2']==$value){ echo "selected='selected'"; } ?>><?php echo $value; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="snglFldPrfl">
                        <select id="player_postion3" name="position_3" class="selectpicker searchPlayers" >
                           <option value=""><?php echo lang("playing_position3_label"); ?></option>
                           <?php foreach ($positions as $key => $value) { ?>
                                <option value="<?php echo $key; ?>" <?php if($search_data['position_3']==$value){ echo "selected='selected'"; } ?>><?php echo $value; ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="snglRowPrfl ">
                
                    <div class="snglFldPrfl">
                        <select id='search_weight' name="weight" class="selectpicker searchPlayers" >
                           <option value=""><?php echo lang('weight_label'); ?></option>
                            <?php foreach ($weight as $key => $value) { ?>
                                    <option value="<?php echo $value; ?>" <?php if($search_data['weight']==$value){ echo "selected='selected'"; } ?>><?php echo $value; ?></option>        
                            <?php }?>
                        </select>
                    </div>

                    <div class="snglFldPrfl">
                        <select id='search_height_m' name="height_m" class="selectpicker searchPlayers" >
                            <option value="">-<?php echo lang("meter_label"); ?>-</option>
                            <option value="1" <?php if($search_data['height_m']==1){ echo "selected='selected'"; } ?>>1</option>
                            <option value="2" <?php if($search_data['height_m']==2){ echo "selected='selected'"; } ?>>2</option>
                        </select>
                    </div>
                    
                    <div class="snglFldPrfl">
                        <select id='search_height_cm' name="height_cm" class="selectpicker searchPlayers" >
                            <option value="">-<?php echo lang("centimeter_label"); ?>-</option>
                            <?php for($i=1;$i<=100;$i++){ ?>
                                <option value="<?php echo $i; ?>" <?php if($search_data['height_cm']==$i){ echo "selected='selected'"; } ?>><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <input type="hidden" id="page_no_value" name="page_no_value" value="<?php if($search_data['page_no_value']){ echo $search_data['page_no_value'];}?>"/>
                <?php echo form_close();?>
                <!--=======End search form=====================-->
                <?php //pr($seach_result);
                    //echo $search_count;
                 ?>
                <div class="srchPlyrs">
                    <div class="srchPlyrsRw">    
                        <ul class="clearfix" id="searchPlayerResult">
                        <?php if($seach_result){
                                foreach ($seach_result as $record) {
                            ?>
                            <li>
                                <div class="imgCnt">
                                <?php
                                    if($record['profile_image'] && $record['profile_image']!='null' && $record['profile_image']!=''){
                                        $profileImage = BASE_URL.'public/uploads/profile_image/'.$record['profile_image'];    
                                    }else{
                                        $profileImage = BASE_URL.'public/front/assets/images/srchPlyr.jpg';    
                                    } 

                                ?>
                                    <img src="<?php echo TIMTHUMB.$profileImage. "&w=150&h=150"; ?>" alt="Profile Image" />

                                    <?php $radom_user_id = str_rand(5, 'numeric') . $record['user_id']; ?>
                                    
                                    <a target="_blank" href="<?php echo BASE_URL.'player-details/'.base64_encode($radom_user_id); ?>"><?php echo lang("common_button_view_detail"); ?> </a>
                                </div>
                                
                                <div class="pNameLike clearfix">
                                <?php 
                                    if($record['first_name']){ ?>
                                        <div class="plyrName"><?php echo ucfirst($record['first_name'].' '.$record['last_name']); ?> </div>
                                <?php }else{ ?>
                                        <div class="plyrName">N/A</div>
                                <?php } ?>
                                    
                                    <div class="likeIcn liked">
                                        <?php if($record['favorite_status']==0){ ?>
                                                <i id="like_status_<?php echo $record['user_id']; ?>" class="fa fa-heart-o likeDislike" data-rel="<?php echo $record['user_id']; ?>" aria-hidden="true"></i>
                                        <?php }else{ ?>
                                                <i id="like_status_<?php echo $record['user_id']; ?>" class="fa fa-heart likeDislike" data-rel="<?php echo $record['user_id']; ?>" aria-hidden="true"></i>
                                        <?php  } ?>
                                                
                                    </div>

                                     <?php 
                                        if($record['position_1']){ ?>
                                            <div class="position"><?php echo lang("common_heading_position").': '. ucfirst($positions[$record['position_1']]); ?></div>
                                        <?php }else{ ?>
                                            <div class="position">N/A</div>
                                      <?php } ?>

                                      <?php 
                                          if($record['age']){ ?>
                                              <div class="player_age"><?php echo lang("common_age_placeholder").': '. $record['age']; ?></div>
                                          <?php }else{ ?>
                                              <div class="player_age">N/A</div>
                                      <?php } ?>

                                </div>
                            </li>
                        <?php }
                        }else{
                            echo '<li class="no_record">'. lang("no_data_found").'</li>';  
                        }    
                        ?>
                        </ul>
                    </div>
                    
                    
                    <nav aria-label="Page navigation" id="page_list">
                      
                    </nav>
                 </div>
            </div>
        </div>


    </div>
</div>
<style>
    .snglRowPrfl{
        border-top:none;
    }
</style>

<?php if($search_count) { ?>
        <script>
            var searcCount = "<?php echo $search_count; ?>";
        </script>
<?php } else{ ?>
        <script>
            var searcCount = "0";
        </script>
<?php } ?>

<!--=====this is use for mobile no mask=========-->
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.cookie.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.form.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/search_js/search.js"></script>
