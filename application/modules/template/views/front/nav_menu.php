
<?php 
    $display_name = $this->session->userdata('display_name'); 
    $email = $this->session->userdata('email'); 
     
    //$total_players = $this->session->userdata('total_players');
    $total_players = get_number_of_player();
?>

<?php if($this->session->userdata('player_id')) { 
        $profileUrl = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? BASE_URL."athlete-profile": "javascript:void(0)";
        $trg1       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "" : "target='1'";
        
        $cls        = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us")) ? "" : "showSingle";
        
        $trg2       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "": "target='2'";
        $trg3       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "": "target='3'";
        $trg4       = (($this->uri->segment(1) == "about-us") || ($this->uri->segment(1) == "contact-us"))? "": "target='4'";
        
       
    ?>


<div class="col-sm-3 sec-left">
    <div class="profile_left">
    	<?php $seg = $this->uri->segment(1); ?>
        <?php $user_info = userLoggedInInfo(); ?>
        <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>
        <div class="profile_img"> <img id="profile-image" src="<?php echo $profile_image; ?>"  alt=""/> <!--<span><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>--> </div>
        <h2 id="full-name"><?php if(isset($display_name)) { echo $display_name;} ?></h2>
        <span id="email-address"><?php if(isset($email)) {echo $email;} ?></span>
        <a href="javascript:void(0)" class="changePassword" role="button" data-toggle="modal"><?php echo lang("change_password"); ?></a>
    
        <ul>
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a href="<?php echo $profileUrl; ?>" class="<?php echo $cls; ?>" <?php echo $trg1; ?> ><?php echo lang('edit_profile_tilte'); ?> <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></li> 
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a id="edit-bio" class="<?php echo $cls; ?>" <?php echo $trg2; ?>> <?php echo lang('sidebar_enter_biography'); ?> <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></li>
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a class="<?php echo $cls; ?>" <?php echo $trg3; ?>> <?php echo lang('sidebar_my_images'); ?></a></li>
            <li class="<?php //echo ($seg == "athlete-profile")?'active':''; ?>"><a class="<?php echo $cls; ?>" <?php echo $trg4; ?>> <?php echo lang('sidebar_my_videos'); ?></a></li>
        </ul>
        <h2><?php echo lang('club_member_label'); ?></h2>
        <a id="total-players"><?php echo lang('total_players'); ?> - <?php echo $total_players; ?></a> </div>
</div>
<?php } ?>