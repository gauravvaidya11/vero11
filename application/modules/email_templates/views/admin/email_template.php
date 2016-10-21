<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_THEME_PLUGINS; ?>bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <?php
        $attributes = array(
            'class' => 'form-horizontal form-row-seperated',
            'id' => 'frm_email_template',
            'method' => 'post'
        );
        echo form_open_multipart(base_url() . $module . '/admin/email_template', $attributes);
        ?>


        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart"></i><?php echo ($edit) ? 'Edit Email Template' : 'Add Email Template'; ?> 
                </div>
                <div class="actions btn-set">
                    <a href="<?php echo base_url(); ?>admin-email-templates" class="btn btn-default text-danger"><i class="fa fa-times"></i> Cancel</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-reply"></i> Reset</button>
                    <?php
                    echo form_button(
                            array(
                                'name' => 'submit',
                                'id' => 'email_temp_submit',
                                'content' => '<i class="fa fa-save"></i> Save',
                                'class' => 'btn btn-success',
                                'type' => 'submit'
                            )
                    );
                    ?>
                </div>
            </div>
            <div class="portlet-body">

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_general" data-toggle="tab">
                                General
                            </a>
                        </li>
                       
                    </ul>
                    <div class="tab-content no-space">
                        <div class="tab-pane active" id="tab_general">
                            <div class="form-body">

                                <div class="form-group">
                                    <?php  
                                    echo form_label(
                                            'Name <span class="required">*</span>', 'name', array(
                                            'class' => 'col-md-2 control-label',
                                            )
                                    );
                                    ?>
                                    <div class="col-md-10">

                                    <?php
                                        echo form_input(
                                                array(
                                                    'name' => 'name',
                                                    'id' => 'name',
                                                    'value' => set_value('name', ($edit) ? $email_temp['name'] : ''),
                                                    'maxlength' => '64',
                                                    'class' => 'form-control',
                                                )
                                        );
                                        ?>
                                    </div>
                                </div>

                               <!-- <div class="form-group">
                                    <?php  
                                    echo form_label(
                                            'Type <span class="required">*</span>', 'type', array(
                                            'class' => 'col-md-2 control-label',
                                            )
                                    );
                                    ?>
                                    <div class="col-md-10">
                                        <?php
                                        $option = $email_temp_dropdown;
                                        echo form_dropdown('type', $option, set_value('type', ($edit) ? $email_temp['type'] : ''), 'class="form-control"');
                                        ?>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <?php  
                                    echo form_label(
                                            'Content <span class="required">*</span>', 'Content', array(
                                        'class' => 'col-md-2 control-label',
                                            )
                                    );
                                    ?>
                                    <div class="col-md-10">
                                        <?php
                                        echo form_textarea(
                                                array(
                                                    'name' => 'html_content',
                                                    'id' => 'html_content',
                                                    'value' => set_value('html_content', ($edit) ? stripslashes($email_temp['content']) : ''),
                                                    'class' => 'ckeditor',
                                                    'rows' => '3',
                                                    'cols' => '40'
                                                )
                                        );
                                        ?>

                                        <div class="alert alert-danger">
                                           <p> Note <span class="required">*</span>  These are required parameters <br/>
                                           <strong>{{siteName}},&nbsp;&nbsp;{{siteLogo}},&nbsp;&nbsp;{{emailBannerTitle}},&nbsp;&nbsp; {{contents}},&nbsp;&nbsp;{{currentdate}} </strong></p>
                                        </div>
                                        
                                    </div>



                                </div>
                                
                  
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <input type="hidden" name="edit" value="<?php echo ($edit) ? $email_temp['id'] : 0; ?>" />
        <?php echo form_close(); ?>
    </div>
</div>
<!-- END PAGE CONTENT-->
