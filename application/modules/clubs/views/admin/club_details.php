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
?>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i>Club Details
                            </div>

                            
                        
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <div class="form-body">
                                <h3 class="form-section">Personal Info</h3>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Club Name:', 'club_name', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->club_name != '') {
                                                    echo ucfirst($club_info->club_name);
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
                                            <?php echo form_label('Club Manager Name:', 'club_manager_name', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                               <?php
                                                if ($club_info->club_manager_name != '') {
                                                    echo ucfirst($club_info->club_manager_name);
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

                                            <?php echo form_label('Nick Name:', 'nick_name', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->nick_name != '') {
                                                    echo $club_info->nick_name;
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
                                            <?php echo form_label('Email:', 'email', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                               <?php
                                                if ($club_info->email != '') {
                                                    echo $club_info->email;
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
                                            <?php echo form_label('Date of Foundation of Club:', 'data_of_foundation_of_club', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                               <?php
                                                if ($club_info->birthday != '') {
                                                    echo $club_info->birthday;
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

                                            <?php echo form_label('Age:', 'age', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->age != '') {
                                                    echo $club_info->age;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Country:', 'country', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->country != '') {
                                                    $country_name = getCountryByCountryId($club_info->country); 
                                                    echo $country_name['country_name'];
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <h3 class="form-section">Contact Info</h3>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Mobile:', 'mobile', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->mobile != '') {
                                                    echo $club_info->mobile;
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
                                            <?php echo form_label('Email:', 'email', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                               <?php
                                                if ($club_info->email != '') {
                                                    echo $club_info->email;
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

                                            <?php echo form_label('Instagram:', 'instagram', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->instagram != '') {
                                                    echo $club_info->instagram;
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
                                            <?php echo form_label('Facebook:', 'facebook', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                               <?php
                                                if ($club_info->facebook != '') {
                                                    echo $club_info->facebook;
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

                                            <?php echo form_label('Twitter:', 'twitter', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_info->twitter != '') {
                                                    echo $club_info->twitter;
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

                                            <?php echo form_label('Title:', 'Title', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                                <?php
                                                if ($club_biography['title'] != '') {
                                                    echo $club_biography['title'];
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
                                            <?php echo form_label('Content:', 'content', array('class' => 'control-label col-md-5')); ?>
                                            <div class="col-md-7 details-margin-top">
                                               <?php
                                                if ($club_biography['content'] != '') {
                                                    echo $club_biography['content'];
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
                                    if(!empty($club_images)){
                                        foreach ($club_images as $image) { ?>
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
                                    if(!empty($club_videos)){
                                        foreach ($club_videos as $video) { ?>
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
