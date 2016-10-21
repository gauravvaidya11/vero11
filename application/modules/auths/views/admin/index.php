<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo getBasicSetting('site_name')->setting_value; ?> | Administration Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_PLUGINS; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_PLUGINS; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_PLUGINS; ?>uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo ADMIN_THEME_CSS; ?>style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_CSS; ?>style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_CSS; ?>style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_CSS; ?>pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo ADMIN_THEME_CSS; ?>pages/custom.css" rel="stylesheet" type="text/css"/>


<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="javascript:void(0);">
		<span style="margin-left:8px;color:#C43737;"><?php echo getBasicSetting('site_name')->setting_value; ?></span>
		<!-- <img src="<?php echo ADMIN_THEME_IMG; ?>logo-big.png" alt=""/> -->
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<?php echo form_open('admin-login',array('class' => 'login-form')); ?>
		<h3 class="form-title">Login to your account</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				 Enter any username and password.
			</span>
		</div>
		<?php
			//echo validation_errors();
           	if($this->session->userdata('loginerror')){
            ?>                        
		        <div class="alert alert-danger alert-dismissable hideauto">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <strong>Input Warnings :</strong><br>
		            <?php echo $this->session->userdata('loginerror'); ?>
		        </div>
        <?php
        	$this->session->unset_userdata('loginerror');
    		}
		    if (validation_errors() != "") {
		        ?>
		        <div class="alert alert-danger alert-dismissable hideauto">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <strong>Input Warnings :</strong><br>
		            <?php echo validation_errors(); ?>
		        </div>
		        <?php
		    }
        ?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<?php 
			$formlabel = array('class' => 'control-label');
			echo form_label('Username', 'username', $formlabel);
			?>
			<div class="input-icon">
			<i class="fa fa-user"></i>
			<?php $user_name = array(
					'name' => 'admin_username',
					'id' => 'username',
					'class'=> 'form-control placeholder-no-fix',
					'value' => '',
					'placeholder' =>'Username'
					);
					echo form_input($user_name);
			?>
			</div>
		</div>

		<div class="form-group">
			<?php 
				$formlabel = array('class' => 'control-label');
				echo form_label('Password', 'password', $formlabel);
			?>
			<div class="input-icon">
			<i class="fa fa-lock"></i>
			<?php $password = array(
				'type'=> 'password',
				'name' => 'admin_password',
				'id' => 'password',
				'class'=> 'form-control placeholder-no-fix',
				'value' => '',
				'placeholder' =>'Password'
				);
				echo form_input($password);
			?>
			</div>
		</div>

		<div class="form-actions">
			<?php 	$checkdata = array(
				        'name'          => 'remember',
				        'id'            => 'remember',
				        'value'         => '',
				        'style'         => 'margin:3px'
					);

					$submitbutton = array(
				        'name'          => 'remember',
				        'id'            => 'remember',
				        'value'         => '',
					);

			?>
			<label class="checkbox">
				<span><?php echo form_checkbox($checkdata); ?></span> Remember me 
			</label>
			<?php 
				$button = array(
					    'name' => 'button',
					    'id' => 'button',
					    'class' => 'btn blue pull-right',
					    'value' => 'true',
					    'type' => 'submit',
					    'content' => 'Login <i class="m-icon-swapright m-icon-white"></i>'
					);
				echo form_button($button);
			?>
			
		</div>
		
		<div class="create-account">
			<p>
				<!--  Don't have an account yet ?&nbsp; -->
				<!-- <a href="javascript:;" id="register-btn">
					 Create an account
				</a> -->
			</p>
		</div>
	<?php echo form_close(); ?>
	<!-- END LOGIN FORM -->
	
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 <?php echo date('Y'); ?> &copy; <?php echo getBasicSetting('site_name')->setting_value; ?>.
</div>
<script src="<?php echo ADMIN_THEME_PLUGINS; ?>jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_THEME_PLUGINS; ?>jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_THEME_PLUGINS; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo ADMIN_THEME_PLUGINS; ?>jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_THEME_JS; ?>custom/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ADMIN_THEME_PLUGINS; ?>select2/select2.min.js"></script>
<script src="<?php echo ADMIN_THEME_JS; ?>custom/auth_js/login-soft.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() { 
  Login.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>