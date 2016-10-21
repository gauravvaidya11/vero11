<?php if (getSetting("map_api_key_local_flag")->setting_value === "1") { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmzvG6kLZKfcadCTZKfnPXAKCOpVMbAZQ&libraries=places"></script>
<?php } else { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBofK5fjkhMm7ZGShp3D7p3dvtKE4fGHEA&libraries=places"></script>
<?php } ?>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i>Edit Customer's Profile
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <?php echo form_open(base_url() . 'admin-save-customer', array("id" => "edit-customer", "class" => "form-horizontal", "method" => "post")); ?>
                            <div class="form-body">
                                <h3 class="form-section">Personal Info</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_hidden('customer_id', $this->uri->segment(2)); ?>
                                            <?php echo form_label('First Name <span class="required">*</span>', 'first_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'first_name', 'id' => 'first-name', 'value' => set_value('first_name', ($customer_info['first_name']) ? $customer_info['first_name'] : ''), 'placeholder' => 'First Name', 'class' => 'form-control')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Last Name', 'last_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'last_name', 'id' => 'last-name', 'value' => set_value('last_name', ($customer_info['last_name']) ? $customer_info['last_name'] : ''), 'placeholder' => 'Last Name', 'class' => 'form-control')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Username <span class="required">*</span>', 'Username', array('class' => 'control-label col-md-3')); ?>

                                            <div class="col-md-9">
                                                <?php
                                                echo form_input(array('name' => 'username', 'id' => 'valid_username', 'value' => set_value('username', ($customer_info['username']) ? $customer_info['username'] : ''), 'placeholder' => 'Username', 'class' => 'form-control', 'disabled' => true));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">															
                                            <?php echo form_label('Email <span class="required">*</span>', 'email', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ($customer_info['email']) ? $customer_info['email'] : ''), 'placeholder' => 'Email', 'class' => 'field form-control')); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Gender', 'gender', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php
                                                $options = array(
                                                    'm' => 'Male',
                                                    'f' => 'Female'
                                                );
                                                echo form_dropdown('gender', $options, ($customer_info['gender']) ? $customer_info['gender'] : '', 'class="form-control"');
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <h3 class="form-section">Business Address</h3>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <?php echo form_label('StreetAddress <span class="required">*</span>', 'street_address', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'street_address', 'id' => 'street_address', 'value' => set_value('street_address', ($customer_info['street_address']) ? $customer_info['street_address'] : ''), 'placeholder' => 'Street Address', 'class' => 'field form-control geo_stree_address')); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('StreetNumber <span class="required">*</span>', 'street_address', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'street_number', 'id' => 'street_number', 'value' => set_value('street_number', ($customer_info['street_number']) ? $customer_info['street_number'] : ''), 'placeholder' => 'Street Number', 'class' => 'field form-control geo_stree_number')); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Post Code <span class="required">*</span>', 'postcoee', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'post_code', 'id' => 'postal_code', 'value' => set_value('post_code', ($customer_info['post_code']) ? $customer_info['post_code'] : ''), 'placeholder' => 'Post Code', 'class' => 'field form-control geo_zip')); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('City <span class="required">*</span>', 'city', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'city', 'id' => 'locality', 'value' => set_value('city', ($customer_info['city']) ? $customer_info['city'] : ''), 'placeholder' => 'City', 'class' => 'field form-control geo_city')); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-9 col-md-offset-2">
                                                <button class="col-md-offset-2 btn btn-block  btn-success hvr-rectangle-out saveUsers searchGeoLocation" type="button"><?php echo lang("common_find_me_on_map") ?></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('Country <span class="required">*</span>', 'country', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <select name="country" id="country" class="geo_country country_id field form-control">    
                                                    <?php
                                                    $country = getCountry();
                                                    foreach ($country as $value) {
                                                        if ($customer_info['country_id']) {
                                                            $selected = ($value['id'] == $customer_info['country_id']) ? ' selected="selected"' : '';
                                                        } else {
                                                            $selected = "";
                                                        }
                                                        ?>
                                                        <option data-ref="<?php echo $value['iso_code_2']; ?>" value="<?php echo $value['id']; ?>" <?php echo $selected; ?> ><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select> 
                                                <?php
                                                if ($customer_info['country_id']) {
                                                    echo '<span class="alert-danger">Note:&nbsp;Are you sure, do you want to change country? it will affect your life account.</span>';
                                                }
                                                ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <?php echo form_label('Dialing code <span class="required">*</span>', 'Dialing code', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">

                                                <select  name="country_dailing_code" id="country_dailing_code" class="form-control country_dailing_code">    
                                                    <?php
                                                    $dailing = get_country_dialing_code();
                                                    echo '<option value="">Select</option>';
                                                    foreach ($dailing as $value) {
                                                        $selected = "";
                                                        if ($customer_info['country_dailing_code']) {
                                                            if ($value->id == $customer_info['country_dailing_code']) {
                                                                $selected = "selected='selected'";
                                                            }
                                                        }
                                                        ?>
                                                        <option  value="<?php echo $value->id; ?>" <?php echo $selected; ?> ><?php echo $value->country_dailing_code; ?></option>
                                                    <?php } ?>
                                                </select> 


                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <?php echo form_label('Mobile <span class="required">*</span>', 'mobile', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">

                                                <?php echo form_input(array('name' => 'mobile', 'id' => 'mobile', 'value' => set_value('mobile', ($customer_info['mobile']) ? $customer_info['mobile'] : ''), 'placeholder' => 'Mobile number', 'class' => 'form-control')); ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <?php echo form_label('State <span class="required">*</span>', 'state', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php
                                                $get_state = getStateById();
                                                ?>
                                                <div class="login-input login-select">
                                                    <select name="state" id="administrative_area_level_1" class="geo_state get-state field form-control">    
                                                        <?php
                                                        foreach ($get_state as $value) {
                                                            if ($customer_info['zone_id']) {
                                                                $selected = ($value['id'] == $customer_info['zone_id']) ? ' selected="selected"' : '';
                                                            } else {
                                                                $selected = "";
                                                            }
                                                            ?>
                                                            <option data-ref="<?php echo $value['code']; ?>" value="<?php echo $value['id']; ?>" <?php echo $selected; ?>><?php echo $value['name']; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    <span class="stat_enote_type alert-warning"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <?php echo form_label('Area', 'area', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">

                                                <select name="area" id="area" class="field form-control get-area"> 
                                                    <option  value="">--Select Area--</option>
                                                    <?php
                                                    if ($customer_info['zone_id']) {
                                                        $area_data = getCityById($customer_info['zone_id'], 'active');

                                                        foreach ($area_data as $value) {

                                                            if ($value['id'] == $customer_info['area_id']) {
                                                                $selected = ' selected="selected"';
                                                            } else {
                                                                $selected = "";
                                                            }
                                                            ?>
                                                            <option  value="<?php echo $value['id']; ?>" <?php echo $selected; ?>><?php echo $value['code']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select> 


                                            </div>
                                        </div>






                                        <div class="form-group">
                                            <?php echo form_label('Latitude <span class="required">*</span>', 'latitude', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'latitude', 'id' => 'latitude', 'value' => set_value('latitude', ($customer_info['latitude']) ? $customer_info['latitude'] : ''), 'placeholder' => 'Latitude', 'class' => 'field form-control geo_latitude')); ?>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <?php echo form_label('Longitude <span class="required">*</span>', 'longitude', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'longitude', 'id' => 'longitude', 'value' => set_value('longitude', ($customer_info['longitude']) ? $customer_info['longitude'] : ''), 'placeholder' => 'Longitude', 'class' => 'field form-control geo_longitude')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if (isset($customer_info['latitude']) && isset($customer_info['longitude'])) { ?>
                                            <input id="set_lat" type="hidden" value="<?php echo $customer_info['latitude']; ?>"/>
                                            <input id="set_lon" type="hidden" value="<?php echo $customer_info['longitude']; ?>"/>
                                        <?php } ?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div id="googleMap" style="width:500px;height:500px;"></div>
                                            <div  id="lat_long_link_div"><?php echo "If you face difficulties to find Latitude and Longitude you can try this Link: <a href='" . getSetting("location_url")->setting_value . "' target='_blank'>" . getSetting("location_url")->setting_value . "</a>"; ?></div> 
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-offset-3 col-md-9">
                                            <?php
                                            $button = array(
                                                'name' => 'button',
                                                'id' => 'button',
                                                'class' => 'btn green editCustomer',
                                                'value' => 'true',
                                                'type' => 'button',
                                                'content' => 'Save Customer'
                                            );


                                            echo form_button($button);
                                            ?>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>admin-business-user-list"><i class="fa fa-times"></i> Cancel</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
<script>
    var profile_path = "<?php echo BASE_URL; ?>customers/admin/changeLifeAccount";
<?php if ($customer_info['latitude'] && $customer_info['longitude']) { ?>
        var latitude = "<?php echo $customer_info['latitude']; ?>";
        var longitude = "<?php echo $customer_info['longitude']; ?>";
<?php } ?>
</script>