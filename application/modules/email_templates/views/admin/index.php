<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart"></i>Email Template Listing
                </div>
                <div class="actions">
                    <!--<a href="<?php echo base_url(); ?>admin-add-email-templates" class="btn btn-default">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-480">
                            New Email Template
                        </span>
                    </a>-->
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                            <tr role="row" class="heading">
                                <th width="2%">
                                    <input type="checkbox" class="group-checkable">
                                </th>
                                <th width="5%">
                                    S.N.
                                </th>
                                <th width="15%">
                                    Email Template Name
                                </th>
                                 <th width="15%">
                                    Email Template Type
                                </th>
                                <th width="10%">
                                    Actions
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                 <input type="text" class="form-control form-filter input-sm" name="name" placeholder="Email Template Name">
                                 </td>
                                <td>
                                   
                                </td>
                               
                                <td>
                                    <!--<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>-->
                                    <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
<!-- END PAGE CONTENT-->

<script>
    $(function () {

        var post_data = {
            name: '<?php echo $this->security->get_csrf_token_name(); ?>',
            val: '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
        var path = BASE_URL + "email_templates/admin/emailTemplateList";
        var sorts = [0,1,3];
        var col_sort = [2, "asc"];
        //App.init();
        TableAjax.init(path, sorts, post_data, col_sort);
    });
var set_status_path  = "<?php echo BASE_URL; ?>categories/admin/setStatus";
</script>
