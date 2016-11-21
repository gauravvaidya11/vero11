<!-- <div class="mainWrpr"> -->
    <header>
        <div class="container">
            <div class="headLogo"><a href="<?php echo BASE_URL; ?>"><?php echo lang("site_title"); ?></a></div>
            <div class="menuIcn">
                <div class="menuIcnInr">
                    <span></span>
                </div>
            </div>
            <div class="overlayBg"></div>
            
            <nav>
                <?php $user_info = userLoggedInInfo();
                //pr($user_info);
                 ?>
                <div class="crossIcn"><div class="crossIcnInr"><span></span></div></div>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    <li>
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo lang("naivigatio_more"); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php if($this->session->userdata("player_id") && $this->session->userdata('user_type')==2){ ?>
                                <li><a href="<?php echo BASE_URL; ?>club-profile" class="dem-3"><?php echo lang("navigation_profile"); ?></a></li>
    
                                <?php if($user_info['paid_status']==1){ // if payment done then this menu is hide form here for club user ?>
                                <li><a href="<?php echo BASE_URL; ?>payment-option" class="dem-3"><?php echo lang("navigation_payment_option"); ?></a></li>
                                <?php } ?>
                                
                            <?php }else if($this->session->userdata("player_id") && $this->session->userdata('user_type')==1){ ?>
                                <li><a href="<?php echo BASE_URL; ?>athlete-profile" class="dem-3"><?php echo lang("navigation_profile"); ?></a></li>
                            <?php } ?>
                            <li><a href="<?php echo BASE_URL; ?>about-us" class="dem-3"><?php echo lang("navigation_about_us"); ?></a></li>
                            <li><a href="<?php echo BASE_URL; ?>contact-us" class="dem-3"><?php echo lang("navigation_contact_us"); ?></a></li>
                        </ul>
                    </li>
                    <?php if($this->session->userdata("player_id") && $this->session->userdata('user_type')==2){ ?>
                    <li>
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo lang("navigation_player_management"); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="<?php echo BASE_URL; ?>player-list"><?php echo lang("navigation_player_list"); ?></a></li>
                            <li><a href="<?php echo BASE_URL; ?>add-player"><?php echo lang("navigation_add_player"); ?></a></li>
                            <li><a href="<?php echo BASE_URL; ?>favorite-list"><?php echo lang("navigation_favorite_list"); ?></a></li>
                        </ul>
                    </li>
                    <?php } ?>
    
                    <?php if($this->session->userdata("player_id") && $this->session->userdata('user_type')==2){ ?>
                    <li><a href="<?php echo BASE_URL; ?>search-players" class="dem-3"> <?php echo lang("navigation_search_players"); ?></a></li>
                    <?php } ?>
    
                    <?php  if($this->session->userdata("player_id")){ ?>
                    <li><a href="<?php echo BASE_URL; ?>logout"><?php echo lang("profile_logout_button"); ?> <span><i class="fa fa-sign-out" aria-hidden="true"></i></span></a></li>
                    <?php } else{ ?>
                        <li><a href="<?php echo BASE_URL; ?>register-by"><?php echo lang("naivigatio_signup"); ?> </a></li>    
                        <li><a href="<?php echo BASE_URL; ?>login"><?php echo lang("login_form_title"); ?> <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>    
                    <?php } ?>
                </ul>
    
    
                <div class="custom_language_dropdownl"> 
                    <?php
                    $language = getLanguages();
                    $lang_id = 'english';
                    if ($this->session->userdata('site_language')) {
                        $lang_id = $this->session->userdata('site_language');
                    }
    
                    $lang_option = '';
                    $sel_lang = 'Select Language';
                    foreach ($language as $key => $value) {
                        $lang = '';
                        $lang_option .= '<li class="sel_country" rel="' . $value['id'] . '" dada-lang="'.$value['lang_name'].'">';
                        $lang = '<a href="javascript:void(0);"><img src="' . BASE_URL . 'public/uploads/language/flag/thumb/' . $value['lang_flag'] . '" alt=""><span> ' . ucfirst($value['lang_name']) . '</span></a>';
    
                        if ($lang_id == $value['lang_name']) {
                            $sel_lang = $lang;
                        }
                        $lang_option .= $lang;
                        $lang_option .= '</li>';
                    }
                    ?>
                    <div id="select_bx" class="select_bx"><?php echo $sel_lang; ?></div>
                    <ul id="language_code" class="language">
                        <?php echo $lang_option; ?>
                    </ul>
    
                </div>
            </nav> 
        </div>
    </header>
