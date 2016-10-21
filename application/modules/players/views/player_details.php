<!-- BEGIN PAGE CONTENT-->

<?php $positions = array("1"=>"Goalkeeper",
                             "2" =>"Right Wing",
                             "3" =>"Center Back",
                             "4" =>"Left Bback",
                             "5" =>"Left Wing",
                             "6" =>"Defensive Mid Fielder",
                             "7" =>"Right Mid Fielder",
                             "8" =>"Left Mid Fielder",
                             "9" =>"Right Forward",
                             "10" =>"Striker",
                             "11" =>"Left Forward"
                        );
    //pr($positions);
    $laterality = array("1"=>"Right Footed","2" =>"Left Footed","3" =>"Two Footed");

    $playerType = array("1"=>"Hired","2" =>"Free");
    $genderType = array("1" => "Male", "2"=> "Female");
?>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i>Player Details
                            </div>

                            
                        
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <div class="form-body">
                                <h3 class="form-section">Personal Info</h3>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('First Name:', 'first_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->first_name != '') {
                                                    echo ucfirst($player_info->first_name);
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
                                                if ($player_info->last_name != '') {
                                                    echo ucfirst($player_info->last_name);
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Nick Name:', 'nick_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->nick_name != '') {
                                                    echo $player_info->nick_name;
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
                                                if ($player_info->email != '') {
                                                    echo $player_info->email;
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
                                                if ($player_info->gender != '') {
                                                    echo $genderType[$player_info->gender];
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
                                            <?php echo form_label('Birthday:', 'birthday', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->birthday != '') {
                                                    echo $player_info->birthday;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Age:', 'age', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->age != '') {
                                                    echo $player_info->age;
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
                                            <?php echo form_label('CPF:', 'cpf', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->cpf != '') {
                                                    echo $player_info->cpf;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Height:', 'height', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->height != '') {
                                                    $explod_height = explode(".", $player_info->height); 
                                                    echo $explod_height[0]."m ". $explod_height[1]."cm";
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
                                            <?php echo form_label('Weight:', 'weight', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->weight != '') {
                                                    echo $player_info->weight;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Country:', 'country', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->country != '') {
                                                    $country_name = getCountryByCountryId($player_info->country); 
                                                    echo $country_name['country_name'];
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
                                            <?php echo form_label('Laterality:', 'laterality', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->laterality != '') {
                                                    echo $laterality[$player_info->laterality];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Positions:', 'position_1', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->position_1 != '') {
                                                    echo $positions[$player_info->position_1];
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
                                            <?php echo form_label('Player Type:', 'player_type', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->player_type != '') {
                                                    echo $playerType[$player_info->player_type];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($player_info->player_type ==1) { ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Club Name:', 'club_name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->club_name != '') {
                                                    echo $player_info->club_name;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!--/span-->
                                </div>
                               

                                <h3 class="form-section">Contact Info</h3>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Mobile:', 'mobile', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->mobile != '') {
                                                    echo $player_info->mobile;
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
                                                if ($player_info->email != '') {
                                                    echo $player_info->email;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Instagram:', 'instagram', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->instagram != '') {
                                                    echo $player_info->instagram;
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
                                            <?php echo form_label('Facebook:', 'facebook', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_info->facebook != '') {
                                                    echo $player_info->facebook;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Twitter:', 'twitter', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_info->twitter != '') {
                                                    echo $player_info->twitter;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h3 class="form-section">Biography</h3>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Title:', 'Title', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($player_biography['title'] != '') {
                                                    echo $player_biography['title'];
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
                                            <?php echo form_label('Content:', 'content', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($player_biography['content'] != '') {
                                                    echo $player_biography['content'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                

                                <h3 class="form-section">Images</h3>
                                <!--/row-->
                               

                                   <ul class="ul-menu">

                                <?php 
                                    if(!empty($player_images)){
                                        foreach ($player_images as $image) { ?>
                                        <li>
                                            <div class="my_image">
                                                <img width="100px" src="<?php echo BASE_URL; ?>public/uploads/player_image/<?php echo $image->filename; ?>"/>
                                            </div>
                                            <br>
                                            <p><?php echo $image->title; ?></p>
                                        </li>
                                    <?php }
                                    }else{
                                        echo "No player image are available.";
                                    }
                                    ?>
                                </ul>


                                 <h3 class="form-section">Videos</h3>
                                <!--/row-->
                                
                                   <ul>
                                <?php 
                                    if(!empty($player_videos)){
                                        foreach ($player_videos as $video) { ?>
                                        <li class="detail_video"><a href="javascript:void(0)" class="open-video" role="button" data-toggle="modal">
                                            <div class="my_vedio"><img width="100px" src="<?php echo $video->thumbnail_image; ?>"/></div>
                                            </a>
                                            <br>
                                            <p><?php echo $video->title; ?></p>
                                        </li>
                                <?php }
                                }else{
                                    echo "No Player video available.";
                                    } ?>
                                </ul>

                                                     
                            </div>

                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .detail_video{
        display: inline-block;
        width: 9%;
        margin-left: 10px;
        list-style: none;
    }
</style>
<!-- END PAGE CONTENT-->
