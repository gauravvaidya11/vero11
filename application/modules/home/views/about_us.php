<section class="bnrInr"></section>
<div class="aboutClub">
    <div class="container">
        <div class="topHead"><span>About Club</span></div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et mauris 
            in felis vestibulum consectetur et nec diam. Ut eget orci vel nisl dictum 
            ultrices. Morbi in euismod justo. Morbi a molestie mauris. Vivamus et ante 
            vehicula, mattis eros at, feugiat risus. Aenean condimentum congue hendrerit. 
            Pellentesque placerat dui quam, sed aliquam neque luctus sit amet. Etiam eu 
            justo purus. 
        </p>
        <p>
            Nam tempus tristique purus. Cras molestie felis sed varius porttitor. 
            Praesent in maximus nibh. Morbi ac ante nonunc venenatis malesuada. Vivamus 
            et ante vehicula, mattis eros at, feugiat risus.
        </p>
        
    </div>
</div>
<div class="clubHstry">
    <div class="container">
        <div class="topHead"><span>Club History</span></div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Nunc et mauris in felis vestibulum consectetur et nec diam. 
            Ut eget orci vel nisl dictum ultrices. Morbi in euismod justo. 
            Morbi a molestie mauris. Vivamus et ante vehicula, mattis eros at, 
            feugiat risus. 
        </p>
        
        <div class="tabCntnr">
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting 
            industry. Lorem Ipsum has been the industry's standard dummy text ever 
            since the 1500s, when an unknown printer.
        </p>
        
        
        <div class="tabCntInr">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
            <?php if(!empty($about_us_history)){ ?>
            <?php foreach ($about_us_history as $value) { ?>
                    <li role="presentation">
                        <a data-toggle="tab" role="tab" aria-controls="<?php echo display_date($value['play_date'],'4');?>" href="#<?php echo display_date($value['play_date'],'4');?>"><?php echo display_date($value['play_date'],'4');?></a>
                    </li>
                    
            <?php }  
            } ?>
            </ul>
        </div>
    </div>
    </div>
</div>
<div class="abtVdo">
    <div class="container">
        <div class="topHead"><span><?php echo lang("heading_videos"); ?></span></div>
        <div class="vdoCntnr">
        <?php if(!empty($about_us_history)){ ?>
        <!--Start tab-content-->
        <?php foreach ($about_us_history as $value) { ?>
                <div class="snglVdo clearfix">
                    <?php if($value['image_video_type']=='1'){ 
                            if($value['player_image']=='null' || $value['player_image']==""){
                                $player_images = PLAYER_PLAY_IMAGE;  
                            }else{
                                $player_images = BASE_URL. 'public/uploads/about_us_image/'.$value['player_image'];
                            }
                        ?>
                            <div class="vdoImg">
                                <img alt="Video Image" src="<?php echo $player_images; ?>">
                            </div>
                    <?php }else{ ?> 
                            <div class="vdoImg">
                                <img alt="Video Image" src="<?php echo BASE_URL; ?>public/front/assets/images/leftVdoImg.jpg">
                            </div>
                    <?php } ?>
                    <div class="vdoMtr">
                        <h3><?php if($value['about_us_heading']){ echo $value['about_us_heading']; }?></h3>
                        <p>
                            <?php if($value['about_us_content']){ echo $value['about_us_content']; }?>
                        </p>
                        <div class="dteScl">
                            <span><?php echo display_date($value['play_date'],'3');?></span>

                            <ul>
                                <?php if($value['facebook_url']){ ?>
                                <li><a href="<?php echo $value['facebook_url']?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                                <?php }else{?> 
                                 <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>   
                                <?php } ?>

                                <?php if($value['twitter_url']){ ?>
                                <li><a href="<?php echo $value['twitter_url']?>"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                                <?php }else{?> 
                                 <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>   
                                <?php } ?>

                                <?php if($value['google_url']){ ?>
                                <li><a href="<?php echo $value['google_url']?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a></li>
                                <?php }else{?> 
                                 <li><a href="javascript:;"><i aria-hidden="true" class="fa fa-google-plus"></i></a></li>   
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } 
            }else{
                echo lang("no_data_found");
            }
        ?>

        </div>
        
    </div>
</div>
    

