<?php if($this->session->userdata('player_id')) { ?>
<div class="col-sm-9 sec-right">
		<div class="secRightCntnt">
            <div class="commann-heading">
            	<h3><?php echo lang('about_us'); ?></h3>
            </div>
            <div class="cntctTopCntnt">
                <p>
                	Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer. Lorem Ipsum is simply dummy text of the printing and 
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                    ever since the 1500s, when an unknown printer.
                </p>
			</div>
            <div class="commann-heading">
            	<h3><?php echo lang('club_history'); ?></h3>
            </div>
            <div class="tabCntnr">
            	<p>
                	Lorem Ipsum is simply dummy text of the printing and typesetting 
                    industry. Lorem Ipsum has been the industry's standard dummy text ever 
                    since the 1500s, when an unknown printer.
                </p>
                
                
                <div class="tabCntInr">
                	<!-- Nav tabs -->
                	<ul role="tablist" class="nav nav-tabs">
                    <?php if(!empty($about_us_history)){ ?>
                    <?php foreach ($about_us_history as $value) { ?>
                        	<li role="presentation">
                            	<a data-toggle="tab" role="tab" aria-controls="<?php echo display_date($value['play_date'],'4');?>" href="#<?php echo display_date($value['play_date'],'4');?>"><?php echo display_date($value['play_date'],'4');?></a>
                            </li>
                        	
                    <?php }  
                    } ?>
                  	</ul>
                    

                    <?php if(!empty($about_us_history)){ ?>
                    <!--Start tab-content-->
                    <?php foreach ($about_us_history as $value) { ?>
                            <div class="tab-content">
                            	<div id="<?php echo display_date($value['play_date'],'4');?>" class="tab-pane active" role="tabpanel">
                                	<div class="tabPnlInr clearfix">
                                        <?php if($value['image_video_type']=='1'){ 
                                                if($value['player_image']=='null' || $value['player_image']==""){
                                                    $player_images = PLAYER_PLAY_IMAGE;  
                                                }else{
                                                    $player_images = BASE_URL. 'public/uploads/about_us_image/'.$value['player_image'];
                                                }
                                            ?>
                                                <div class="leftImg">
                                                    <img alt="Video Image" src="<?php echo $player_images; ?>">
                                                </div>
                                        <?php }else{ ?> 
                                                <div class="leftImg">
                                                    <img alt="Video Image" src="<?php echo BASE_URL; ?>public/front/assets/images/leftVdoImg.jpg">
                                                </div>
                                        <?php } ?>
                                    	
                                        <div class="RghtPnlCntnt">
                                        	<h4><?php if($value['about_us_heading']){ echo $value['about_us_heading']; }?></h4>
                                            <p>
                                                <?php if($value['about_us_content']){ echo $value['about_us_content']; }?>
                                            </p>
                                            
                                            <div class="btmDatescl clearfix">
                                            	<div class="pnlDate"><?php echo display_date($value['play_date'],'3');?></div>
                                                <div class="pnlScl">
                                                	<ul>
                                                        <?php if($value['facebook_url']){ ?>
                                                        <li><a href="<?php echo $value['facebook_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                        <?php }else{?> 
                                                         <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                                        <?php } ?>

                                                        <?php if($value['twitter_url']){ ?>
                                                        <li><a href="<?php echo $value['twitter_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                        <?php }else{?> 
                                                         <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                                        <?php } ?>

                                                        <?php if($value['google_url']){ ?>
                                                        <li><a href="<?php echo $value['google_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                        <?php }else{?> 
                                                         <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          	</div> <!--End tab-content-->
                    <?php } 
                    }else{
                        echo lang("no_data_found");
                    }?>

                </div>
            </div>
                       
        </div>
    </div>
<?php } else { ?>
<div class="col-sm-12 sec-right">
        <div class="secRightCntnt">
            <div class="commann-heading">
                <h3>About Club</h3>
            </div>
            <div class="cntctTopCntnt">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer. Lorem Ipsum is simply dummy text of the printing and 
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                    ever since the 1500s, when an unknown printer.
                </p>
            </div>
            <div class="commann-heading">
                <h3>Club History</h3>
            </div>
            <div class="tabCntnr">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting 
                    industry. Lorem Ipsum has been the industry's standard dummy text ever 
                    since the 1500s, when an unknown printer.
                </p>
                
                
                <div class="tabCntInr">
                    <!-- Nav tabs -->
                    <ul role="tablist" class="nav nav-tabs">
                        <?php if(!empty($about_us_history)){ ?>
                            <?php foreach ($about_us_history as $value) { ?>
                                <li role="presentation">
                                    <a data-toggle="tab" role="tab" aria-controls="<?php echo display_date($value['play_date'],'4');?>" href="#<?php echo display_date($value['play_date'],'4');?>"><?php echo display_date($value['play_date'],'4');?></a>
                                </li>
                        <?php }  
                        } ?>
                    </ul>
                    
                    <?php if(!empty($about_us_history)){ ?>
                    <!--Start tab-content-->
                    <?php foreach ($about_us_history as $value) { ?>
                            <div class="tab-content">
                                <div id="<?php echo display_date($value['play_date'],'4');?>" class="tab-pane active" role="tabpanel">
                                    <div class="tabPnlInr clearfix">

                                        <?php if($value['image_video_type']=='1'){ 
                                                if($value['player_image']=='null' || $value['player_image']==""){
                                                    $player_images = PLAYER_PLAY_IMAGE;  
                                                }else{
                                                    $player_images = BASE_URL. 'public/uploads/about_us_image/'.$value['player_image'];
                                                }
                                            ?>
                                                <div class="leftImg">
                                                    <img alt="Video Image" src="<?php echo $player_images; ?>">
                                                </div>
                                        <?php }else{ ?> 
                                                <div class="leftImg">
                                                    <img alt="Video Image" src="<?php echo BASE_URL; ?>public/front/assets/images/leftVdoImg.jpg">
                                                </div>
                                        <?php } ?>
                                        

                                        <div class="RghtPnlCntnt">
                                            <h4><?php if($value['about_us_heading']){ echo $value['about_us_heading']; }?></h4>
                                            <p>
                                                <?php if($value['about_us_content']){ echo $value['about_us_content']; }?>
                                            </p>
                                            
                                            <div class="btmDatescl clearfix">
                                                <div class="pnlDate"><?php echo display_date($value['play_date'],'3');?></div>
                                                <div class="pnlScl">
                                                    <ul>
                                                        <?php if($value['facebook_url']){ ?>
                                                        <li><a href="<?php echo $value['facebook_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                        <?php }else{?> 
                                                         <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                                        <?php } ?>

                                                        <?php if($value['twitter_url']){ ?>
                                                        <li><a href="<?php echo $value['twitter_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                        <?php }else{?> 
                                                         <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                                        <?php } ?>

                                                        <?php if($value['google_url']){ ?>
                                                        <li><a href="<?php echo $value['google_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                                        <?php }else{?> 
                                                         <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!--End tab-content-->
                    <?php } 
                    }else{
                        echo lang("no_data_found");
                    }?>

                </div>
            </div>
                       
        </div>
    </div>

<?php } ?>
