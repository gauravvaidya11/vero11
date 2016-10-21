
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Customer Lists
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
                                    Life-ID
                                </th>
                                <th width="10%">
                                    User Name
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
                                <!--<th width="15%">
                                    User Type
                                </th>-->
                                <th width="10%">
                                    Last Loggedin
                                </th>
                                <th width="10%">
                                    Action
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td></td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="life_id" placeholder="Life Id">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="username" placeholder="User Name">
                                </td>
                                
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="First Name">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="last_name" placeholder="Last Name">
                                </td>
                                <td></td>
                                
                                <!--<td>
                                    <?php 
                                        $options = array(
                                                '3' => 'Distributer',
                                                '4' => 'Customers'
                                                );
                                        echo form_dropdown('roll_type', $options, 'Filter Users', 'class="form-control form-filter input-sm"'); 
                                    ?>
                                </td>-->
                                <td></td>
                                <!-- <td>
                                <select class="form-control form-filter input-sm" name="dealer_id">
                                    <option>-select value-</option>
                                    <?php //foreach ($filter_dealers as $value) { ?>
                                        <option value="<?php //echo $value['id'];?>"><?php //echo $value['first_name']." ". $value['last_name'];?></option>
                                    <?php //} ?>    
                                </select>
                                </td> -->
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

  <!-- Start Modal -->
  <div class="modal fade" id="copy_link_model"  role="dialog">
    <div class="modal-dialog">
     <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="height:250px;" >
         <form role="form">
            <div class="form-group">
              <label for="life_id"><span class="fa fa-user"></span> Life Id</label>
             <div id="life_id"></div>
            </div>
           <div class="form-group">
              <label for="fullname"><span class="fa fa-pencil"></span> Name</label>
             <div id="name"></div>
            </div>

              <div class="form-group">
              <label  for="refer_url"><span class="fa fa-link"></span> Refer Url</label>
                 <input type="text" class="form-control" id="refer_url">
                 
            </div>
             <div class="form-group">
             <a class="copy_to_clipboard btn btn-primary btn-sm col-md-2" data-copy-id="refer_url" data-dismiss="modal" id="copy_link" href="javascript:void(0)">Copy</a>
             </div>
            
          </form>
        </div>
        
      </div>
      
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
           var path  = BASE_URL+"customers/admin/getAllUsers" ;
           var sorts = [0, 5, 6, 7];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>customers/admin/setStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>customers/admin/deleteUsers";

</script>