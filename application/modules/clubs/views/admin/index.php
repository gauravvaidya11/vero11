<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Club Lists
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
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
                                 <th width="10%">
                                    Club ID
                                </th>
                                <th width="10%">
                                    Club Name
                                </th>
                               
                                <th width="15%">
                                    Club Manager Name
                                </th>
                                <th width="15%">
                                    Email
                                </th>
                                <!-- <th width="15%">
                                    Email
                                </th> -->
                                <!--<th width="15%">
                                    User Type
                                </th>-->
                              <!--   <th width="10%">
                                    Last Loggedin
                                </th> -->
                                <th width="10%">
                                    Action
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="club_id" placeholder="Club Id">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="club_name" placeholder="club Name">
                                </td>
                                
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="club_manager_name" placeholder="Club Manager Name">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="email" placeholder="Email">
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


  <!-- end Model -->
<!-- END PAGE CONTENT-->
<script>
    $(function(){
        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"clubs/club/getAllClubs" ;
           var sorts = [0, 4, 5];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>clubs/club/setStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>clubs/club/deleteStatus";

</script>
<style>
    .paid{
        color:green;
        font-weight: bold;
    }
    .free{
        color: #A94442;
        font-weight: bold;
    }
</style>