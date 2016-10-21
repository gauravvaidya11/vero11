<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add language</h3>
            </div><!-- /.box-header -->
            <div class="form-group has-success" id="add-lang-success"></div>
            <!-- form start -->
<!--                 <form role="form" action="<?php echo base_url().'add-language'; ?>" id="add-lang-form" method="post"> -->
            <?php echo form_open('add-language',array("id"=>"add-lang-form")); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="user-profile-image-height">Language Name <code>Ex: english</code></label>
                        <input type="text" name="language_name" class="form-control" id="language-name" onkeypress="return blockSpace(event);" >
                    </div>
                    <div class="form-group">
                        <label for="user-profile-image-width">Language Code <code>Ex: en</code></label>
                        <input type="text" name="language_code" class="form-control" id="language-code" onkeypress="return blockSpace(event);" >
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" id="submit-add-language" class="btn btn-primary">Add</button>
                </div>
            <?php echo form_close(); ?>
        </div><!-- /.box -->

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Edit Language File</h3>
            </div>
            <div class="form-group has-success" id="tags-setting-success"></div>
            <?php echo form_open(ADMIN_URL.'/edit-language')?>
            <div class="box-body" id="language-dropdown">
                    
            </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" id="submit-tags-limit-setting" class="btn btn-primary">Edit</button>
                </div>
            <?php echo form_close(); ?>
        </div><!-- /.box -->

    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6"><div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add language</h3>
            </div><!-- /.box-header -->
            <div class="form-group has-success" id="add-lang-success"></div>
            <!-- form start -->
<!--                 <form role="form" action="<?php echo base_url().'add-language'; ?>" id="add-lang-form" method="post"> -->
            <?php echo form_open('add-language',array("id"=>"add-lang-form")); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="user-profile-image-height">Language Name <code>Ex: english</code></label>
                        <input type="text" name="language_name" class="form-control" id="language-name" onkeypress="return blockSpace(event);" >
                    </div>
                    <div class="form-group">
                        <label for="user-profile-image-width">Language Code <code>Ex: en</code></label>
                        <input type="text" name="language_code" class="form-control" id="language-code" onkeypress="return blockSpace(event);" >
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" id="submit-add-language" class="btn btn-primary">Add</button>
                </div>
            <?php echo form_close(); ?>
        </div><!-- /.box -->

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Edit Language File</h3>
            </div>
            <div class="form-group has-success" id="tags-setting-success"></div>
            <?php echo form_open(ADMIN_URL.'/edit-language')?>
            <div class="box-body" id="language-dropdown">
                    
            </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" id="submit-tags-limit-setting" class="btn btn-primary">Edit</button>
                </div>
            <?php echo form_close(); ?>
        </div><!-- /.box -->

    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
<div class="box">
                            <div class="box-header">
                                <h3 class="box-title">All Language</h3>
                            </div><!-- /.box-header -->
                            <span id="language-list"></span>
                        </div>
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/language_settings.js';?>"></script>
<div class="box">
                            <div class="box-header">
                                <h3 class="box-title">All Language</h3>
                            </div><!-- /.box-header -->
                            <span id="language-list"></span>
                        </div>
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
<script type="text/javascript" src="<?php echo base_url().'assets/admin/js/language_settings.js';?>"></script>