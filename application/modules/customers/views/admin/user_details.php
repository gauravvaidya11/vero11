<?php if (getSetting("map_api_key_local_flag")->setting_value === "1") { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmzvG6kLZKfcadCTZKfnPXAKCOpVMbAZQ&libraries=places"></script>
<?php } else { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBofK5fjkhMm7ZGShp3D7p3dvtKE4fGHEA&libraries=places"></script>
<?php } ?>
<!-- BEGIN PAGE CONTENT-->

<?php
$refer_url = get_refer_url($users_details['id']);
if ($refer_url != '') {
    ?>
    <div class="row" >
        <div class="col-md-8 col-md-offset-2">
            <h5 class="col-md-offset-5">
                Referal Link
            </h5>
            <div class="input-group">
                <input type="text"  value="<?php echo $refer_url; ?>" class="form-control valid" id="referral_url" >                                            
                <div class="input-group-addon btn btn-default copy_to_clipboard" data-copy-id="referral_url" id="live_show_password" title="Copy Refer Link"><i class="fa fa-files-o"></i></div>
            </div>
        </div>
    </div>
    <p></p>
<?php } ?>


<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i><?php
                                if ($tag) {
                                    echo $tag;
                                }
                                ?>
                            </div>

                            <?php
                            if ($this->uri->segment(2) && $this->uri->segment(2) > 0) {
                                $id = $this->uri->segment(2);
                            }
                            ?>
                            <div class="tools">


                                <div class="pull-right">
                                    <a rel="<?php echo $id; ?>" class="customer-order btn btn-sm blue filter-submit margin-bottom"  href="" data-toggle="modal" id="make_delaer_modal_button" data-target="#make_delaer_modal">Make My Dealer</a>
                                    <a rel="<?php echo $id; ?>" class="customer-order btn btn-sm yellow filter-submit margin-bottom" href="<?php echo BASE_URL; ?>admin-customer-order/<?php echo $id; ?>">Order Details</a>
                                    <a rel="<?php echo $id; ?>" class="customer-order btn btn-sm red" title="Suggest for dealer" href="<?php echo base_url();?>admin-suggest-customer/<?php echo $id;?>">Suggest For Dealer</a>
                                </div>

                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <?php echo form_open(base_url(), array("id" => "", "class" => "form-horizontal", "method" => "post")); ?>
                            <div class="form-body">
                                <h3 class="form-section">Personal Info</h3>



                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('First Name:', 'first_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['first_name'] != '') {
                                                    echo $users_details['first_name'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Last Name:', 'last_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['last_name'] != '') {
                                                    echo $users_details['last_name'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Username:', 'Username', array('class' => 'control-label col-md-3')); ?>

                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['username'] != '') {
                                                    echo $users_details['username'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">															
                                            <?php echo form_label('Email:', 'email', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['email'] != '') {
                                                    echo $users_details['email'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Gender:', 'gender', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['gender'] != '') {
                                                    if ($users_details['gender'] == 'm')
                                                        echo 'Male';
                                                    else
                                                        echo 'Female';
                                                }else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">															
                                            <?php echo form_label('Life Id:', 'life_id', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['life_id'] != '') {
                                                    echo $users_details['life_id'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <h3 class="form-section">Business Address</h3>
                                <!--/row-->
                                <div class="row">

                                    <!-- Modal-->
                                    <div class="modal fade" id="make_delaer_modal" role="dialog">
                                        <div class="modal-dialog">
                                            <?php //echo form_open('email/send', array("")); ?>   
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Select Category</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" value="" id="make_customer_dealer_id">
                                                    <p>Assign Category To This Dealer</p>
                                                    <select name="cat" class="form-control" id="make_customer_dealer_cat_id">
                                                        <?php
                                                        if (count($cat)) {
                                                            foreach ($cat as $value) {
                                                                echo"<option value='" . $value->id . "'>" . $value->business_name . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="" id="make_dealer_button">Make Dealer</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                            <?php //echo form_close(); ?>

                                        </div>
                                    </div>
                                    <!-- Modal-->



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Street Number:', 'street_number', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['street_number'] != '') {
                                                    echo $users_details['street_number'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                                <input type="text" style="display:none" name="address" class="autocomplete" id="autocomplete">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo form_label('Street Address:', 'street_address', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['street_address'] != '') {
                                                    echo $users_details['street_address'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                                <input type="text" style="display:none" name="address" class="autocomplete" id="autocomplete">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo form_label('Country:', 'country', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">

                                                <?php
                                                if ($users_details['country_id'] != '' and intval($users_details['country_id']) > 0) {
                                                    $country_data = getCountryById($users_details['country_id']);
                                                    if (count($country_data)) {
                                                        echo $country_data->name;
                                                    } else {
                                                        echo 'N/A';
                                                    }
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <?php echo form_label('Mobile:', 'mobile', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">


                                                <?php
                                                $dialing_code = '';
                                                if ($users_details['country_dailing_code'] != '' and intval($users_details['country_dailing_code']) > 0) {
                                                    $mob_dialing = getCountryById($users_details['country_dailing_code']);
                                                    if (count($mob_dialing)) {
                                                        if ($country_data->country_dailing_code != '')
                                                            $dialing_code = $country_data->country_dailing_code;
                                                    }
                                                }

                                                if ($users_details['mobile'] != '') {
                                                    echo $dialing_code . ' ' . $users_details['mobile'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <?php echo form_label('State:', 'state', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">

                                                <?php
                                                if ($users_details['zone_id'] != '' and intval($users_details['zone_id']) > 0) {
                                                    $state_data = getZoneById($users_details['zone_id']);
                                                    if (count($state_data)) {
                                                        echo $state_data->name;
                                                    } else {
                                                        echo 'N/A';
                                                    }
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_label('City:', 'city', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['city'] != '') {
                                                    echo $users_details['city'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo form_label('Area:', 'area', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">

                                                <?php
                                                if ($users_details['area_id'] != '' and intval($users_details['area_id']) > 0) {
                                                    $area_data = getAreaById($users_details['area_id']);
                                                    if (count($area_data)) {
                                                        echo $area_data->code;
                                                    } else {
                                                        echo 'N/A';
                                                    }
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>


                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <?php echo form_label('Post Code:', 'postcoee', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['post_code'] != '') {
                                                    echo $users_details['post_code'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <?php echo form_label('Latitude:', 'latitude', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['latitude'] != '') {
                                                    echo $users_details['latitude'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <?php echo form_label('Longitude:', 'longitude', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($users_details['longitude'] != '') {
                                                    echo $users_details['longitude'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>

                                        </div>



                                        <div style="display:none" class="form-group">
                                            <?php echo form_label('Latitude:<span class="required">*</span>', 'latitude', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'latitude', 'id' => 'latitude', 'value' => set_value('latitude', ($edit) ? $users_details['latitude'] : ''), 'placeholder' => 'Latitude', 'class' => 'field form-control')); ?>
                                            </div>

                                        </div>

                                        <div style="display:none" class="form-group">
                                            <?php echo form_label('Longitude:<span class="required">*</span>', 'longitude', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9">
                                                <?php echo form_input(array('name' => 'longitude', 'id' => 'longitude', 'value' => set_value('longitude', ($edit) ? $users_details['longitude'] : ''), 'placeholder' => 'Longitude', 'class' => 'field form-control')); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- BEGIN GEOLOCATION PORTLET-->
                                        <div class="portlet">

                                            <div class="portlet-body">
                                                <div class="label label-danger visible-ie8">
                                                    Not supported in Internet Explorer 8
                                                </div>
                                                <div id="googleMap" style="width:500px;height:350px;"></div>
                                            </div>
                                        </div>
                                        <!-- END GEOLOCATION PORTLET-->
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
    var latitude = "<?php echo $users_details['latitude']; ?>";
    var longitude = "<?php echo $users_details['longitude']; ?>";
    var userid = "<?php echo $id; ?>";

    $(function() {
        $("#make_delaer_modal_button").click(function() {
            var id = $(this).attr("rel");
            $("#make_customer_dealer_id").val(id);
        });
        $("#make_dealer_button").click(function() {
            var id = $("#make_customer_dealer_id").val();
            var cat_id = $("#make_customer_dealer_cat_id").val();
             autoLogIn(id,cat_id)
        });
    })
    function confirmMakeDealer(id) {
        bootbox.confirm("Are you sure, you want to change this account into dealer", function(choice) {
            if (choice === true) {
                window.location = "<?php echo BASE_URL; ?>admin-make-dealer/" + id;
            }
        });
    }

    function autoLogIn(id,cat_id) {
        var form = document.createElement("form");
        var element1 = document.createElement("input");
        var element2 = document.createElement("input");
        var element3 = document.createElement("input");
        
        form.method = "POST";
        form.action = BASE_URL+'admin-make-dealer';

        element1.value = id;
        element1.name = "id";
        form.appendChild(element1);

        element2.value = cat_id;
        element2.name = "cat_id";
        form.appendChild(element2);
        
        element3.value = csrf_token;
        element3.name = csrf_token_name;
        form.appendChild(element3);

        document.body.appendChild(form);

        form.submit();
    }
</script>