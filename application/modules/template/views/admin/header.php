<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>

        <meta charset="utf-8"/>
        <title><?php echo getBasicSetting('site_name')->setting_value; ?> | Administrator</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- <link rel="shortcut icon" href="<?php //echo BASE_URL . getSetting('site_logo_favicon')->setting_value; ?>" type='image/x-icon' />  -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo ADMIN_THEME_PLUGINS; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo ADMIN_THEME_PLUGINS; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo ADMIN_THEME_PLUGINS; ?>uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo ADMIN_THEME_PLUGINS; ?>data-tables/DT_bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ADMIN_THEME_CSS; ?>plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>public/common/jquery-ui-bootstrap-master/jquery.ui.theme.font-awesome.css" rel="stylesheet">

        <!--this default.css for change dynamic admin themes color so this is require included as a hardcoded-->
        <link id="style_color" rel="stylesheet" href="<?php echo ADMIN_THEME_CSS; ?>themes/default.css" type="text/css" />

        <?php echo put_admin_headers(); ?>
        <script>
            var csrf_token = "<?php echo $this->security->get_csrf_hash(); ?>";
            var csrf_token_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
            var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
            var BASE_URL = "<?php echo BASE_URL; ?>";

            var lang_js = {common_message_session_expried: 'Your session has expired.'};
        </script>
        <script>
            // $(document).ready(function() {    
            //    App.init(); // initlayout and core plugins
            // });
        </script>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed"> 
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <a class="navbar-brand" href="<?php echo base_url(); ?>">

                    <span style="margin-left:8px;color:#C43737;">
                        <?php echo getBasicSetting('site_name')->setting_value; ?>
                    </span>
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <img src="<?php echo ADMIN_THEME_IMG; ?>menu-toggler.png" alt=""/>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right">



              
                  

                   
                    <!-- END NOTIFICATION DROPDOWN -->

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <?php $adminInfo = loggedInInformation(); ?>
                    <li class="dropdown user">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <?php if (!empty($adminInfo['avatar'])) { ?>
                                <img src="<?php echo ADMIN_IMAGE_UPLOAD_PATH; ?>avatar/original/<?php echo $adminInfo['avatar']; ?>" style="max-width: 30px; max-height: 30px;">
                                <?php
                            }
                            else {
                                ?>
                                <i class="fa fa-user"></i>
                            <?php } ?>

<!-- <img alt="" src="<?php echo base_url(); ?>public/admin/assets/img/avatar1_small.jpg"/> -->
                            <span class="username">
                                <?php echo ucfirst($adminInfo['firstname'] . " " . $adminInfo['lastname']); ?>
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo BASE_URL; ?>admin-profile">
                                    <i class="fa fa-user"></i> My Profile
                                </a>
                            </li>



                            <li class="divider"></li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin-logout">
                                    <i class="fa fa-key"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
