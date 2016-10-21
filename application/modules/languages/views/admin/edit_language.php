<div class="tab-pane active">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>Update <strong class="text-uppercase"><?php echo $lang; ?></strong> Language
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <?php echo form_open(BASE_URL.'languages/updateLanguageFile',array("id"=>"update-lang-form")); ?>
            <div class="form-actions right">
                    <?php echo form_button(array('class'=>'btn blue save-lang','content'=>'<i class="fa fa-check"></i> Save')); ?>
            </div>
                <div class="form-body">
                   <?php echo form_hidden("language_selected",$language_selected); ?>
                    <h3 class="form-section">Person Info</h3>
                    <?php 
                    $i = 0;
                    foreach ($langArray as $key => $value) { 
                        if($i%2 == 0){
                            echo '<div class="row">';
                        }
                        ?> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php 
                                echo form_label('<code>'.$key.'</code>','',array("class"=>"control-label")); 
                                echo form_hidden("lang_key[]",$key);
                                echo form_textarea(array("name"=>"lang_value[]","value"=>$value,"id"=> $i."_lang","class"=>"form-control" ,"rows" => 5)); ?>
                            </div>
                        </div>
                    <?php 
                        if($i%2 == 0){
                            echo '</div>';
                        }
                    $i++; } ?>
                </div>
                <div class="form-actions right">
                        <?php echo form_button(array('class'=>'btn blue save-lang','content'=>'<i class="fa fa-check"></i> Save')); ?>
                </div>
            <?php echo form_close(); ?>
            <!-- END FORM-->
        </div>
    </div>
</div>