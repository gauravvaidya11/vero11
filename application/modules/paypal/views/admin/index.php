<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Payment Account Lists
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
                                    First Name
                                </th>
                               
                                <th width="15%">
                                    Last Name
                                </th>
                                <th width="15%">
                                    Transaction ID
                                </th>
                                <th width="5%">
                                    Amount
                                </th>
                                <th width="10%">
                                    Payment Status
                                </th>
                                <th width="10%">
                                    Order Status
                                </th>
                                <th width="9%">
                                    Payment On
                                </th>
                                <th width="9%">
                                    Action
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="club_id" placeholder="Club Id">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="First Name">
                                </td>
                                
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="last_name" placeholder="Last Name">
                                </td>

                                <td></td>
                                <td></td>
                                <td></td>
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
<style>
    .paid_status{
        color: #35aa47;
        font-weight: bold;
    }
    .pending_status{
        color: #d84a38;
        font-weight: bold;
    }
</style>

  <!-- end Model -->
<!-- END PAGE CONTENT-->
<script>
    $(function(){
        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"paypal/admin/getAllPaymentAccountList" ;
           var sorts = [0, 4, 5, 6, 7, 8];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>paypal/admin/setPaymentAccountStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>paypal/admin/deletePaymentAccountStatus";

</script>