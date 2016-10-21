<?php if (getSetting("map_api_key_local_flag")->setting_value === "1") { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmzvG6kLZKfcadCTZKfnPXAKCOpVMbAZQ&libraries=places"></script>
<?php } else { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBofK5fjkhMm7ZGShp3D7p3dvtKE4fGHEA&libraries=places"></script>
<?php } ?>
<div class="content-wrapper"> <!--start content-wrapper-->

    <section class="content txt-mdl">

        <!--start breadcrumb here -->
        <?php echo Modules::run('breadcrumb/front', $breadcrumb); ?>
        <!--end breadcrumb here -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-form listing-tab abt-in">
                    <?php echo form_open(base_url() . 'save-new-customer', array("id" => "add-customer-form", "class" => "personal-info", "method" => "post")); ?>
                    <input style='visibility: hidden;position: absolute;' type='text' name='tempusername'/>
                    <input style='visibility: hidden;position: absolute;' type='password' name='tempword'/>
                    <div class="info-row"> <!-- Start Personal Info -->
                        <div class="col-md-12">
                            <div class="Login-l customer_registration_heading">
                                <h2><?php echo lang("account_setting_personal_information"); ?></h2>
                            </div>
                        </div>
                        <div class="info-row-in">
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_username") . ' <span class="required">*</span>', 'Username'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">



                                                    <?php echo form_input(array('maxlength' => '30', 'name' => 'username', 'value' => set_value('username'), 'placeholder' => lang("common_username"), 'class' => 'vNoSpace', 'id' => 'valid_username')); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                            <?php //echo form_label(lang("common_password") . ' <span class="required">*</span>', 'password'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">
                            <?php //echo form_input(array('maxlength' => '30', 'type' => 'password', 'name' => 'password', 'id' => 'password', 'value' => set_value('password'), 'placeholder' => lang("common_password"))); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->


                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_firstname") . ' <span class="required">*</span>', 'first_name'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">
                                                    <?php echo form_input(array('maxlength' => '40', 'name' => 'first_name', 'id' => 'first-name', 'value' => set_value('first_name'), 'placeholder' => lang("common_firstname"))); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li><?php echo form_label(lang("common_lastname"), 'last_name'); ?></li>
                                            <li>
                                                <div class="login-input">
                                                    <?php echo form_input(array('maxlength' => '40', 'name' => 'last_name', 'id' => 'last-name', 'value' => set_value('last_name'), 'placeholder' => lang("common_lastname"))); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_email") . ' <span class="required">*</span>', 'email'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">
                                                    <?php echo form_input(array('maxlength' => '80', 'name' => 'email', 'id' => 'email', 'value' => set_value('email'), 'placeholder' => lang("common_email"))); ?>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_gender"), 'gender'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input login-select"> 
                                                    <?php
                                                    $options = array('m' => lang("common_male"), 'f' => lang("common_female"));
                                                    echo form_dropdown('gender', $options, '');
                                                    ?> 
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>	<!-- End Personal Info -->
                    <div class="info-row">		<!-- Start Other Info -->
                        <div class="col-md-12">
                            <div class="Login-l customer_registration_heading">
                                <h2><?php echo lang("account_setting_other_information"); ?></h2>
                            </div>
                        </div>
                        <div class="info-row-in">
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_birth_day") . ' <span class="required">*</span>', 'Birth Day'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">
                                                    <?php echo form_input(array('name' => 'birth_day', 'id' => 'birth_day', 'value' => set_value('birth_day'), 'readonly' => 'true', 'placeholder' => lang("common_birth_day"))); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_current_weight") . ' <span class="required">*</span>', 'Current Weight'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input ">
                                                    <div class="small_input-3">
                                                        <?php echo form_input(array('name' => 'current_weight', 'class' => 'small_input-2', 'maxlength' => '5', 'type' => 'text', 'id' => 'current_weight', 'value' => set_value('current_weight'/* ,$other_data['current_weight'] */), 'placeholder' => lang("common_current_weight"))); ?>
                                                        <div class="small_input">   
                                                            <?php
                                                            $options_unit = array(
                                                                "1" => lang("common_kg"),
                                                                "2" => lang("common_pound")
                                                            );
                                                            echo form_dropdown('current_weight_unit', $options_unit, 'class="small_input"');
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_target_weight") . ' <span class="required">*</span>', 'Target Weight'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">
                                                    <div class="small_input-3">
                                                        <?php echo form_input(array('name' => 'target_weight', 'class' => 'small_input-2', 'maxlength' => 5, 'id' => 'target_weight', 'value' => set_value('target_weight'), 'placeholder' => lang("common_target_weight"))); ?>
                                                        <div class="small_input">
                                                            <?php
                                                            echo form_dropdown('target_weight_unit', $options_unit, 'class="small_input"');
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_height") . ' <span class="required">*</span>', 'Height'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input">
                                                    <?php echo form_input(array('name' => 'height', 'maxlength' => 10, 'id' => 'height', 'value' => set_value('height'), 'placeholder' => lang("common_height_cm"))); ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="registration_form wow fadeInDown">
                                    <div class="Login-l">
                                        <ul>
                                            <li>
                                                <?php echo form_label(lang("common_activity_level") . ' <span class="required">*</span>', 'activity_level'); ?>
                                            </li>
                                            <li>
                                                <div class="login-input login-select"> 
                                                    <?php
                                                    $options = array(
                                                        "" => 'Select',
                                                        "1" => lang("common_very_light_option"),
                                                        "2" => lang("common_normal_option"),
                                                        "3" => lang("common_easy_option"),
                                                        "4" => lang("common_active_option"),
                                                        "5" => lang("common_very_active_option"),
                                                        "6" => lang("common_extreme_active_option")
                                                    );
                                                    echo form_dropdown('activity_level', $options);
                                                    ?> 
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		<!-- End Other Info -->

                    <div class="info-row"> <!-- Start Billing Address -->
                        <div class="col-md-12">
                            <div class="Login-l customer_registration_heading">
                                <h2><?php echo lang("account_setting_billing_address"); ?></h2>
                            </div>
                        </div>
                        <div class="info-row-in clearfix">
                            <div class="reg-left col-sm-7">
                                <?php if (0) { ?>
                                    <div class="col-md-12">
                                        <div class="registration_form wow fadeInDown">
                                            <div class="Login-l">
                                                <ul>
                                                    <li>
                                                        <?php echo form_label(lang("common_billing_address") . ' <span class="required">*</span>', 'address'); ?>
                                                        <span class="help-inline"> <?php echo lang('common_message_address_helping_text') ?></span>
                                                    </li>
                                                    <li>
                                                        <div class="login-input">
                                                            <?php echo form_input(array('name' => 'address', 'id' => 'autocomplete', 'value' => set_value('address'), 'placeholder' => lang("common_billing_address"))); ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_street_address") . ' <span class="required">*</span>', 'street_address'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <?php echo form_input(array('class' => 'geo_stree_address', 'name' => 'street_address', 'id' => 'street_address', 'value' => set_value('street_address'), 'placeholder' => lang("common_street_address"))); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_street_number") . ' <span class="required">*</span>', 'street_number'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <?php echo form_input(array('class' => 'geo_stree_number', 'name' => 'street_number', 'id' => 'street_number', 'value' => set_value('city'), 'placeholder' => lang("common_street_number"))); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_postal_code") . ' <span class="required">*</span>', 'postcoee'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <?php echo form_input(array('class' => 'geo_zip', 'name' => 'post_code', 'id' => 'postal_code', 'value' => set_value('post_code'), 'placeholder' => lang("common_postal_code"))); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_city") . ' <span class="required">*</span>', 'city'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <?php echo form_input(array('class' => 'geo_city', 'name' => 'city', 'id' => 'locality', 'value' => set_value('city'), 'placeholder' => lang("common_city"))); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <button class="col-md-12 hvr-rectangle-out  searchGeoLocation" type="button"><?php echo lang("common_find_me_on_map") ?></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_country") . ' <span class="required">*</span>', 'country'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input  login-select">
                                                        <select name="country" id="country" class="country_id geo_country">    
                                                            <?php
                                                            $country = getCountry();
                                                            foreach ($country as $value) {
                                                                ?>
                                                                <option data-ref="<?php echo $value['iso_code_2']; ?>" value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php } ?>
                                                        </select> 
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_state") . ' <span class="required">*</span>', 'state'); ?>
                                                </li>
                                                <li>
                                                    <?php
                                                    $get_state = getStateById();
                                                    //echo form_input(array('name'=>'state','id'=>'administrative_area_level_1','value'=> set_value('state'),'placeholder'=>'State')); 
                                                    ?>
                                                    <div class="login-input  login-select">
                                                        <select name="state" id="administrative_area_level_1" class="get-state geo_state">    
                                                            <?php foreach ($get_state as $value) { ?>
                                                                <option data-ref="<?php echo $value['code']; ?>" value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php } ?>
                                                        </select> 
                                                        <span class="stat_enote_type text-danger"></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_mobile"), 'mobile') . ' <span class="required">*</span>'; ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <div class="small_input-2">
                                                            <select class="country_dailing_code"  name="country_dailing_code">
                                                                <?php
                                                                echo '<option value ="">' . lang("common_select") . '</option>';
                                                                foreach ($dialing_code as $code) {
                                                                    echo '<option value ="' . $code->id . '">' . $code->country_dailing_code . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                            <!--                            <input class="country_dailing_code" type="text" name="country_dailing_code" value="" placeholder="<?php //echo lang("common_dialing_code");                           ?>">  -->
                                                        <div class="small_input-2">
                                                            <?php echo form_input(array('name' => 'mobile', 'id' => 'mobile', 'value' => set_value('mobile'), 'placeholder' => lang("common_mobile"))); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php
                                                    echo form_label(lang("common_area") . '', 'area');
                                                    ?>
                                                </li>
                                                <li>
                                                    <div class="login-input login-select">
                                                        <select name="area" id="area" class="get-area"> 
                                                            <?php echo '<option  value="">' . lang("common_select_area") . '</option>'; ?>
                                                        </select> 
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_latitude") . ' <span class="required">*</span>', 'latitude'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <?php echo form_input(array('class' => 'geo_latitude', 'name' => 'latitude', 'id' => 'latitude', 'value' => set_value('latitude'), 'placeholder' => lang("common_latitude"))); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="registration_form wow fadeInDown">
                                        <div class="Login-l">
                                            <ul>
                                                <li>
                                                    <?php echo form_label(lang("common_longitude") . ' <span class="required">*</span>', 'longitude'); ?>
                                                </li>
                                                <li>
                                                    <div class="login-input">
                                                        <?php echo form_input(array('class' => 'geo_longitude', 'name' => 'longitude', 'id' => 'longitude', 'value' => set_value('longitude'), 'placeholder' => lang("common_longitude"))); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="reg-right col-sm-5">
                                <div class="map-in">
                                    <div id="googleMap" style="width:457px;height:482px;"></div>
                                    <div class="" id="lat_long_link_div"><?php echo lang("common_message_get_lat_long_link") . "<a href='" . getSetting("location_url")->setting_value . "' target='_blank'>" . getSetting("location_url")->setting_value . "</a>"; ?></div> 
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <ul class="submit wow fadeInDown">
                                <?php
                                $button = array(
                                    'name' => 'button',
                                    'id' => 'add-user',
                                    'class' => 'hvr-rectangle-out saveUsers',
                                    'value' => 'true',
                                    'type' => 'button',
                                    'content' => lang("common_save_user")
                                );

                                $cancel_button = array(
                                    'name' => 'button',
                                    'id' => 'button',
                                    'class' => 'hvr-rectangle-out',
                                    'value' => 'true',
                                    'type' => 'reset',
                                    'content' => lang("common_cancel")
                                );
                                ?>
                                <li class="LoginBtn send-btn">
                                    <?php echo form_button($button); ?>
                                </li>
                                <li class="LoginBtn send-btn">
                                    <?php echo form_button($cancel_button); ?>
                                </li>
                            </ul>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>		<!-- END of Profile Form -->
            </div>  <!-- END of col-md-12 -->
        </div> <!-- END of row -->

    </section>
    <script>
        $(document).ready(function() {
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
            $("#birth_day").datepicker({
                format: lang_js.birth_day_format_js,
                viewMode: 2,
                autoclose: true,
                onRender: function(date) {
                    return date.valueOf() > now.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(e) {
                if (e.viewMode === "days") {
                    $(this).datepicker('hide');
                }
            });


        });
    </script>
</div>	<!--end content-wrapper-->