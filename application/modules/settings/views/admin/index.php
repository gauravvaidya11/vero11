 <!--BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-reorder"></i>Admin Basic Settings
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <?php echo form_open('', array("id" => "basic_settings", "method" => "post", "class" => "")); ?>
                                    <!-- <div class="form-actions top right"></div> -->
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Plan Price For Club <span class="required">*</span></label>
                                            <div class="col-md-5">
                                                <?php echo form_input(array('valid-data'=>'required', 'name' => 'plan_price', 'id'=>'plan_price', 'value' => ($plan_price)? $plan_price:'', 'placeholder' => 'Enter plan price', 'class' => 'form-control vNumericOnly basic-setting-value')); ?> 
                                            </div>
                                            <div id="setting-message_plan_price"></div>
                                        </div>
                                        <br>
                                        <div style="clear:both;height:15px;border-top:1px solid #ddd;margin-top:10px;"></div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Profile Image Min Size in KB(50)</label>
                                            <div class="col-md-5">
                                                <?php echo form_input(array('name' => 'profile_image_max_size', 'id'=>'profile_image_max_size', 'value' => ($profile_image_max_size)?$profile_image_max_size:'00', 'placeholder' => 'Enter min size KB Ex(50)', 'class' => 'form-control vNumericOnly basic-setting-value')); ?> 
                                            </div>
                                            <div id="setting-message_profile_image_max_size"></div>
                                        </div>
                                        
                                        <div style="clear:both;height:10px;"></div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Profile Image Height in Px(120) </label>
                                            <div class="col-md-5">
                                                <?php echo form_input(array('name' => 'profile_image_height', 'id'=>'profile_image_height', 'value' => ($profile_image_height)? $profile_image_height :'00', 'placeholder' => 'Enter profile image height Px Ex(120)', 'class' => 'form-control vNumericOnly basic-setting-value')); ?>
                                            </div>
                                        </div>
                                        <div id="setting-message_profile_image_height"></div>
                                        <div style="clear:both;height:10px;"></div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Profile Image Width in Px(120)</label>
                                            <div class="col-md-5">
                                                <?php echo form_input(array('name' => 'profile_image_width', 'id'=>'profile_image_width', 'value' => ($profile_image_width)? $profile_image_width :'00', 'placeholder' => 'Enter profile image width Px Ex(120)', 'class' => 'form-control vNumericOnly basic-setting-value')); ?>
                                            </div>
                                            <div id="setting-message_profile_image_width"></div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <?php
                                        //echo form_submit(array('name' => 'submit', 'class' => 'btn green', 'value' => 'Submit', 'content' => 'Submit'));
                                        //echo form_button(array('name' => 'cancel', 'class' => 'btn default', 'value' => 'Cancel', 'content' => 'Cancel'));
                                        ?>
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
        <style>
            .custom-check {
                color: #468847;
                line-height: 26px;
                margin-left: -8px;
            }

            .custom-error {
                color: #b94a48;
                line-height: 26px;
                margin-left: -8px;
            }

            .custom-info {
                color: #c09853;
                line-height: 26px;
                margin-left: -8px;
            }
        </style>