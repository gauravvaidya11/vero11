<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo (isset($title)) ? $title : getSetting('site_name')->setting_value; ?></title>
<link href="<?php echo base_url(); ?>public/front/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/front/assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/front/assets/css/media.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/front/assets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/common/jquery-ui-bootstrap-master/jquery.ui.theme.font-awesome.css" rel="stylesheet">


<script type="text/javascript">
    var csrf_token = "<?php echo $this->security->get_csrf_hash(); ?>";
    var csrf_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
    var BASE_URL = "<?php echo BASE_URL; ?>";
</script>
<?php $this->load->view("lang"); ?>

<?php
//echo put_headers('jquery.min.js');
