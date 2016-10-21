<div class="row">
    <div class="col-md-6 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Add Language
                </div>
                <div class="tools">
                    <a href="" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <?php echo form_open_multipart(BASE_URL . "languages/addLanguage", array('class' => 'form-horizontal', 'id' => 'add-lang-form')); ?>
                <div class="form-body">
                    <div class="form-group">
                        <?php echo form_label('Name', 'lang_name', array("class" => "col-md-3 control-label")); ?>
                        <div class="col-md-9">
                            <?php echo form_input(array("name" => "lang_name", "class" => "form-control", "placeholder" => "Name")); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Code', 'lang_code', array("class" => "col-md-3 control-label")); ?>
                        <div class="col-md-9">
                            <?php echo form_input(array("name" => "lang_code", "class" => "form-control", "placeholder" => "Code")); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Flag', 'lang_flag', array("class" => "col-md-3 control-label")); ?>
                        <div class="col-md-9">
                            <?php echo form_upload(array("name" => "lang_flag", "class" => "form-control")); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <?php
                    echo form_button(array('class' => 'btn default cancel', 'content' => 'Cancel'));
                    echo '&nbsp;' . form_button(array('class' => 'btn green', 'content' => 'Submit', 'id' => 'add-lang-btn'));
                    ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Update Language
                </div>
                <div class="tools">
                    <a href="" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
<!--                <div align="center" class="help-block">Need to update the max_input_vars to 3000</div>-->
                <?php  echo form_open(BASE_URL . "admin-edit-languages", array("class" => "form-horizontal")); ?>
                <div class="form-body">
                    <div class="form-group">
                        <?php echo form_label('Code', 'lang_code', array("class" => "col-md-3 control-label")); ?>
                        <div class="col-md-9">
                            <?php
                            $langArr = array();
                            if (isset($language_list) && is_array($language_list)) {
                                
                                foreach ($language_list as $value) {
                                    $langArr[$value['lang_name']] = $value['lang_name'] . ' (' . $value['lang_code'] . ')';
                                }
                            }

                            $options = $langArr;
                            echo form_dropdown('lang', $options, '', 'class="form-control"');
                            ?>
                        </div>
                    </div>             
                </div>
                <div class="form-actions right">
                    <?php
                   // echo form_button(array('class'=>'btn default','content'=>'Cancel'));
                    echo form_submit(array('class' => 'btn green', 'value' => 'Submit'));
                    ?>
                </div>
                <?php  echo form_close(); ?>
            </div>
        </div>

        <!-- END SAMPLE FORM PORTLET-->

    </div>
    <div class="col-md-6 ">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i>All Language
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive" id="language-listing">
                    &nbsp; Table Area
                </div>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->

        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue " style="display:none;">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Add Field
                </div>
                <div class="tools">
                    <a href="" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <?php echo form_open(BASE_URL . "languages/addField", array('class' => 'form-horizontal', 'id' => 'add-field-form')); ?>
                <div class="form-body">
                    <div class="form-group">
                        <?php echo form_label('String Name', 'field', array("class" => "col-md-3 control-label")); ?>
                        <div class="col-md-9">
                            <?php echo form_input(array("name" => "field", "class" => "form-control", "placeholder" => "String Name")); ?>
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <?php
                    echo form_button(array('class' => 'btn default cancel', 'content' => 'Cancel'));
                    echo form_button(array('class' => 'btn green', 'content' => 'Submit', 'id' => 'add-field-btn'));
                    ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>


    </div>
</div>