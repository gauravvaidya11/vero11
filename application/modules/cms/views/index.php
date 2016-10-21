<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>About us History
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
                <div class="actions">
                    <a href="<?php echo BASE_URL; ?>admin-add-about-us" class="btn default">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-480">
                            Add New
                        </span>
                    </a>
                </div>
                
            </div>

            <div class="portlet-body">
                <div class="table-container table-verticle-menu">
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                            <tr role="row" class="heading">
                                <th width="2%">
                                    S.N.
                                </th>
                                <!-- <th width="10%">
                                    Player ID
                                </th> -->
                                <th width="10%">
                                    Heading
                                </th>
                               
                                <th width="15%">
                                    Play Date
                                </th>
                                <th width="15%">
                                    player_image
                                </th>
                                <th width="15%">
                                    created On
                                </th>
                                <th width="10%">
                                    Action
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="heading" placeholder="About us heading">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="play_date" placeholder="Play Date">
                                </td>
                                
                                <td></td>

                                <td>
                                    <!-- <input type="text" class="form-control form-filter input-sm" name="last_name" placeholder="Name"> -->
                                </td>
                                
                                
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
<script>
    $(function(){
        

        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"cms/admin/getAboutUsHistory" ;
           var sorts = [0, 1, 2];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>cms/admin/setStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>cms/admin/deleteStatus";

</script>