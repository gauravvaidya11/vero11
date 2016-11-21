<section class="bnrInr">
     <div class="profilePicUser">   
        <div class="container">
            <div class="profilePicBnr">
                <div class="ppCntn">
                     <?php $user_info = userLoggedInInfo(); ?>
                <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>
                 <img src="<?php echo $profile_image; ?>" alt="Profile Image" id="profileImage"/>
                    </div>
                    <div class="userLogin">
                        <span class="profileName"><?php if($user_info['club_name']){ echo ucfirst($user_info['club_name']); } ?>  </span>
                    </div>
                </div>
        </div>
	</div>
</section>

<div class="container">
    <div class="formCntnr">
        <h2><?php echo lang("paymennt_failure"); ?></h2>
        <form>
            <?php echo $this->session->flashdata('success_message'); ?>
            <?php echo $this->session->flashdata('error_message'); ?>
        </form>
    </div>
</div>