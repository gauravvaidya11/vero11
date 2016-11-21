<!-- BEGIN PAGE CONTENT-->
 <link href="<?php echo BASE_URL; ?>public/front/assets/data-tables/DT_bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo BASE_URL; ?>public/front/assets/css/plugins.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo BASE_URL; ?>public/front/assets/css/style-metronic.css" rel="stylesheet" type="text/css" />
 

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
    
<div class="plyrsLst">
    <div class="container">
        <!--=======Sidebar Navigation here==================-->
        <?php $this->load->view("front/nav_menu"); ?>
        <!--=======Sidebar Navigation here==================-->
        
        <div class="clbPrflRght">
            <div class="topHead"><span><?php echo lang("heading_player_list"); ?></span></div>
            <div class="comm-message"></div>
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="plysLstCntnr table-responsive">
                <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                     <thead>
                        <tr role="row" class="heading">
                            <th width="1%">
                                <?php echo lang("heading_serial_number"); ?>
                            </th>
                            <th width="10%">
                                <?php echo lang("common_firstname_placeholder"); ?>
                            </th>
                           
                            <th width="10%">
                                <?php echo lang("common_lastname_placeholder"); ?>
                            </th>
                            <th width="15%">
                                <?php echo lang("common_email_placeholder"); ?>
                            </th>

                            <th width="15%">
                                <?php echo lang("common_heading_position"); ?>
                            </th>
                          
                            <th width="10%">
                                <?php echo lang("table_hading_action");?>
                            </th>
                        </tr>
                        <tr role="row" class="filter">
                            <td></td>

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="<?php echo lang("common_firstname_placeholder"); ?>">
                            </td>
                            
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="last_name" placeholder="<?php echo lang("common_lastname_placeholder"); ?>">
                            </td>

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="email" placeholder="<?php echo lang("common_email_placeholder"); ?>">
                            </td>
                            
                            <td></td>
                            
                            <td>
                                <div class="margin-bottom-5">
                                    <!--<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>-->
                                      <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> <?php echo lang("button_reset"); ?></button>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!--========start player profile modal here========-->

<script>
    $(function () {
        $("#birthday").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true
        });
    });
    </script>
                
        <div class="modal fade" id="editPlayerProfileModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <div class="prflFrmCntnr">
                    <?php echo form_open('clubs/club/updatePlayerProfile',array("id"=>"editPlayerProfileForm12"));?> 
                        <div class="comm_profile-message"></div>
                        <div class="snglRowPrfl clearfix">
                            <div class="snglFldPrfl">
                                <div class="input-group">
                                    <label><?php echo lang('common_firstname_placeholder'); ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control vAlphabetsOnly"  placeholder="" id="fname" name="fname">
                                    <input type="hidden" id="playerId" name="hidePlayerId">
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
                                    <select class="selectpicker" id='height_cm' name="heightCm">
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
                            <div class="snglFldPrfl">
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
                                    <input type="text" class="form-control" id="email" name="email"  readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="snglRowPrfl clearfix">
                            <div class="snglFldPrfl">
                                <div class="input-group">
                                    <label><?php echo lang('contact_facebook_label'); ?></label>
                                    <input type="text" class="form-control" id="facebook" name="facebook">
                                </div>
                            </div>
                            <div class="snglFldPrfl">
                                <div class="input-group">
                                    <label><?php echo lang('contact_instagram_label'); ?></label>
                                    <input type="text" class="form-control" id="instagram" name="instagram">
                                </div>
                            </div>
                            <div class="snglFldPrfl">
                                <div class="input-group">
                                    <label><?php echo lang('contact_twitter_label'); ?></label>
                                    <input type="text" class="form-control" id="twitter" name="twitter">
                                </div>
                            </div>
                        </div>
                        <div class="prflSavebtn">
                            <button type="button" id="updateProfile" class="btn btn-default btn-danger"><?php echo lang('save_button'); ?></button>
                        </div>
                    <?php echo form_close();?>
                </div>
              </div>
            </div>
          </div>
        </div> <!--Close modal here--> 


    </div>
</div>

<!--========End Player profole model here=========-->


  <!-- end Model -->
<!-- END PAGE CONTENT-->
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/app.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/table-ajax.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/datatable.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/data-tables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/data-tables/DT_bootstrap.js"></script>


<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/mobile_mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


<link href="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<script src="<?php echo BASE_URL; ?>public/front/assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.form.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/jquery.validate.cpf.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/club_js/club.js"></script>



<script>
    $(function(){
        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"clubs/club/getAllPlayers" ;
           var sorts = [0, 4, 5];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>clubs/club/setStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>clubs/club/deleteStatus";

</script>