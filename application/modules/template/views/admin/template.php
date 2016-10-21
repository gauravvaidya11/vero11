<?php $this->load->view("admin/header"); ?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php $this->load->view("admin/sidebar"); ?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN COLOR SETTING PAGE-->
            <?php $this->load->view('admin/color_setting'); ?>
            <!-- END COLOR SETTING PAGE-->
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        <?php echo $title; ?> <small><?php $this->session->userdata('roll_type'); ?></small>
                    </h3>
                    <?php echo Modules::run('breadcrumb/admin', $breadcrumb); ?>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <?php $this->load->view($module . "/" . $view_file); ?>
        </div>    
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view("admin/footer"); ?>
<?php $this->load->view("admin/loader"); ?>
<?php echo put_admin_footers(); ?>
</body>
<!-- END BODY -->
</html>

