

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>User Listing
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
                
            </div>

            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                            <tr role="row" class="heading">
                                <th width="5%">
                                    S.N.
                                </th>
                                <th width="15%">
                                    Username
                                </th>
                                <th width="15%">
                                    First Name
                                </th>
                                <th width="15%">
                                    Last Name
                                </th>
                                <th width="15%">
                                    Email
                                </th>
                                <th width="10%">
                                    Mobile
                                </th>
                                <th width="10%">
                                    Last Loggedin
                                </th>
                               
                                <th width="10%">
                                    Action
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="Firstname">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="last_name" placeholder="Lastname">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="email" placeholder="Email">
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="margin-bottom-5">
                                        <!--<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>-->
                                        
                                        <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                    </div>
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
<?php if($this->uri->segment(2) && $this->uri->segment(2)>0){
    $dealer_id = $this->uri->segment(2);    
}?>
<script>
    $(function(){
        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"customers/admin/getDealerUsers/<?php echo $dealer_id; ?>" ;
           var sorts = [0, 1, 4, 5, 6, 7];
           var col_sort = [1, "DESC"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>customers/admin/setStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>customers/admin/deleteUsers";

</script>