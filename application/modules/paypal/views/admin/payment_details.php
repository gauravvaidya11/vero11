<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
      	<?php //pr($payment_details);?>
        <div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i>Payment Details
				</div>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body" style="">
				<div id="accordion3" class="panel-group accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a href="#collapse_3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle accordion-toggle-styled collapsed">
								 Payment Details
							</a>
							</h4>
						</div>
						<div class="panel-collapse collapse in" id="collapse_3_1" style="height: 0px;">
							<div class="panel-body">
								<div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Full name : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left"><?php if($payment_details['first_name']){
				                        		echo $payment_details['first_name']. " ". $payment_details['last_name'];
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>

				                

				                 <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Register Type:</label>
				                    </div> 

				                    <div class="col-md-8">
				                         <span class="text-right">
				                         	<?php if($payment_details['user_type']==1){
				                        		echo "As a Player";
				                        	}elseif($payment_details['user_type']==2){
				                        		echo "As a Club";
					                        }else{
					                    		echo "N/A";
					                    	}
					                        ?>

				                         </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Payment At: </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="created_date">
				                        <?php //pr($payment_details); ?>
				                        <?php //echo "sdfasdf". $payment_details['user_id'];?>
				                        	<?php if($payment_details['payment_date']){
				                        		echo display_date($payment_details['payment_date'], '5');
				                        	}else{
				                        		echo "N/A";
					                        }?>
				                        </span>
				                    </div>
				                </div>

				                <!--=================Payment list here====================-->
								<div class="row">
								    <div class="col-md-12">
								        <!-- Begin: life time stats -->
								        <div class="portlet box blue">
								            <div class="portlet-title">
								                <div class="caption">
								                    <i class="fa fa-user"></i>Payment Lists
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
								<!--=================Payment list here====================-->

							</div>
							
						</div>
					</div>
					
					<!-- <div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a href="#collapse_3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle accordion-toggle-styled collapsed">
								 Others
							</a>
							</h4>
						</div>
						<div class="panel-collapse collapse" id="collapse_3_4" style="height: 0px;">
							<div class="panel-body">
								<p>
									 This is others details.
								</p>
							</div>
						</div>
					</div> -->
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

<!-- END PAGE CONTENT-->
<script>
    $(function(){
        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"admin-payment-list/<?php echo $payment_details['user_id'];?>";
           var sorts = [0, 4, 5, 6, 7, 8];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var delete_status_path  = "<?php echo BASE_URL; ?>paypal/admin/deletePaymentStatus";

</script>