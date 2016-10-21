<?php $seg = $this->uri->segment(1); ?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <br>
            <!-- <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!--<form class="sidebar-search" action="extra_search.html" method="POST">
               <div class="form-container">
                  <div class="input-box">
                     <a href="javascript:;" class="remove">
                     </a>
                     <input type="text" placeholder="Search..."/>
                     <input type="button" class="submit" value=" "/>
                  </div>
               </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
            <!--</li> -->
            <li class="<?php echo ($seg == 'admin-dashboard') ? 'start active' : ''; ?>">
                <a href="<?php echo base_url(); ?>admin-dashboard">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Dashboard
                    </span>
                    <span class="selected">
                    </span>
                </a>
            </li>


<!--Player Management -->
            <li class="<?php echo ($seg == 'admin-player-list' || $seg=='admin-player-details') ? 'open active' : ''; ?>" >
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">Player Management</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ($seg == 'admin-player-list' || $seg=='admin-player-details') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>admin-player-list">
                            <i class="fa fa-users"></i>
                            All Players
                        </a>
                    </li>                  
                </ul>
            </li>
            
            
            <li class="<?php echo ($seg == 'admin-languages' || $seg == 'admin-edit-languages') ? 'open active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-language"></i>
                    <span class="title">
                        Language Management
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ($seg == 'admin-languages' || $seg == 'admin-edit-languages') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-languages'; ?>">
                            <i class="fa fa-globe"></i>
                            Languages
                        </a>
                    </li>
                </ul>
            </li>
           

            <li class="<?php echo ($seg == 'admin-about-us-list' || $seg == 'admin-contact-us-list' || $seg == 'admin-faq' || $seg== 'admin-add-about-us' || $seg=='admin-contact-details') ? 'open active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span class="title">
                        CMS
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ($seg == 'admin-about-us-list' || $seg== 'admin-add-about-us' || $seg=='admin-edit-aboutus') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-about-us-list'; ?>">
                            <i class="fa fa-briefcase"></i>
                            About Us
                        </a>
                    </li>
                    <li class="<?php echo ($seg == 'admin-contact-us-list' || $seg=='admin-edit-aboutus' || $seg=='admin-contact-details') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-contact-us-list'; ?>">
                            <i class="fa fa-briefcase"></i>
                            Contact Us
                        </a>
                    </li>
                    <!-- <li class="<?php echo ($seg == 'admin-cms-privacy-policy') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-faq'; ?>">
                            <i class="fa fa-briefcase"></i>
                            FAQs
                        </a>
                    </li> -->
                </ul>
            </li>

            <li class="<?php echo ($seg == 'admin-basic-settings') ? 'open active' : ''; ?>">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">
                        Settings
                    </span>
                    <span class="arrow ">
                    </span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo ($seg == 'admin-basic-settings') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-basic-settings'; ?>">
                            <i class="fa fa-cog"></i>
                            Basic Settings
                        </a>
                    </li>
                    
                    <!-- <li class="<?php echo ($seg == 'admin-add-Paypal') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-add-Paypal'; ?>">
                            <i class="fa fa-paypal"></i>
                            PayPal Settings
                        </a>
                    </li>
                    <li class="<?php echo ($seg == 'admin-payment-settings') ? 'active' : ''; ?>">
                        <a href="<?php echo BASE_URL . 'admin-payment-settings'; ?>">
                            <i class="fa fa-money"></i>
                            Payment Settings
                        </a>
                    </li> -->
                    
                </ul>
            </li>
            

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>