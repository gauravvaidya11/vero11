<div class="content-wrapper"> <!--start content-wrapper-->

    <div class="page-banner"><img src="<?php echo USER_DASHBOARD_THEME_IMG; ?>banner-img.jpg"  alt="img"> 
    
        
        <div class="banner-details">
            <div class="title-profile">
             
              <span>Lorem ipsom dolor amet eit lrofo lsodi,dool</span>
            </div>
            <div class="btn-profile">
              <a href="javascript:;" class="btn-edit"><?php echo lang("common_edit_profile"); ?></a>
            </div>

            <div class="btn-profile">
              <a href="<?php echo base_url(); ?>signout" class="btn-edit"><?php echo lang("common_logout"); ?></a>
            </div>
        </div>
    </div>


    <div class="follow-row">
        <div class="profile-icon"> 
            <?php 
                if(!empty($users_profiles)){ 
                    if($users_profiles['avatar']!="" && $users_profiles['avatar']!="NULL"){ 
                        $profile_image = 'original/'. $users_profiles['avatar'];
                    }else{
                        $profile_image = 'user-placeholder.jpg';
                    } 
            ?>
            <img src="<?php echo FRONT_THEME_ASSETS; ?>uploads/avatar/<?php echo $profile_image; ?>" alt="profile icon">
            <?php }else{ ?> 
            <img src="<?php echo USER_DASHBOARD_THEME_IMG; ?>banner-icon.jpg" alt="profile icon">
            <?php } ?>
        </div>
      
        <ul class="follow-list">
            <li>
              Mus 2016<span>monofood &reg;  ist <br> das erste</span>
            </li>
            <li><?php echo lang("common_followers"); ?> <span>452 tweets</span> </li>
            <li><?php echo lang("common_messages"); ?> <span>115</span> </li>
        </ul>
        <!-- <div class="send-btn-follow">
            <button type="submit" class="cmn-btn-1"><?php //echo lang("common_send_message"); ?></button>
        </div> -->
      
    </div>

    <section class="content txt-mdl">
        <div class="brd-cm-row">
        <h3 class="small-title"><?php echo lang("common_profile"); ?></h3>
            <ul>
              <li><a href="#"><i class="fa-home fa"></i></a></li>
              <li><a href="#"><?php echo lang("common_dashboard"); ?></a></li>
              <li><a href="#">Pages</a></li>
              <li><a href="#"><?php echo lang("common_profile"); ?></a></li>
            </ul>
        </div>

        <!--alert message here -->
            <?php echo Modules::run('alert_message/front'); ?>
        <!--alert message here -->

        <div class="abt-txt clearfix">
            <div class="about-box">
              <div class="abt-in">
                <h3 class="small-title"><?php echo lang("account_profile_about"); ?></h3>
                <p>monofood &reg;  ist das erste kalorienreduzierende lebensmittel, das zu 100% den energie-, elektrolyt & nährstoffbedarf rein natürlich erfüllt. grundlage ist die europäische nährstoff richtlinie 2008/100/EG monofood®  ist das erste kalorienreduzierende lebensmittel, das zu 100% den energie-, elektrolyt & nährstoffbedarf rein natürlich erfüllt. grundlage ist die europäische nährstoff richtlinie 2008/100/EG monofood®  ist das erste kalorienreduzierende lebensmittel, das zu 100% den energie-, elektrolyt & nährstoffbedarf rein natürlich erfüllt. grundlage ist die europäische nährstoff richtlinie 2008/100/EG </p>
              </div>
            </div>
        <div class="social-box">
            <h3 class="small-title"><?php echo lang("common_social_media"); ?></h3>
            <ul class="home-socials">
               <li><a href="#" class="fb-icon"><i class="fa-facebook fa"></i></a></li>
               <li><a href="#" class="fb-twt"><i class="fa-twitter fa"></i></a></li>
               <li><a href="#" class="fb-g"><i class=" fa-google-plus fa"></i></a></li>
               <li><a href="#" class="fb-in"><i class="fa-linkedin fa"></i></a></li>
            </ul>
        </div>
      </div>
    </section>
</div> <!--end content-wrapper-->
