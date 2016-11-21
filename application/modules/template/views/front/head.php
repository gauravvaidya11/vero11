<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo (isset($title)) ? $title : getBasicSetting('site_name')->setting_value; ?></title>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.min.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/bootbox/bootbox.min.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/common.js"></script> 


<link href="<?php echo BASE_URL; ?>public/front/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/front/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/front/assets/css/common/validation_error.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/front/assets/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/front/assets/css/common/common.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/common/jquery-ui-bootstrap-master/jquery.ui.theme.font-awesome.css" rel="stylesheet">

<link href="<?php echo BASE_URL; ?>public/front/assets/css/layout.css" rel="stylesheet">
<link href="<?php echo BASE_URL; ?>public/front/assets/css/responsive.css" rel="stylesheet">


<script type="text/javascript">
    var csrf_token = "<?php echo $this->security->get_csrf_hash(); ?>";
    var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
    var BASE_URL = "<?php echo BASE_URL; ?>";
    var TIMTHUMB = '<?php echo TIMTHUMB ?>';
</script>
<?php $this->load->view("lang"); ?>

<?php
//echo put_headers('jquery.min.js');
