<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
      	<?php //pr($users_details);?>
        <div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i>User Details
				</div>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body" style="">

			
							<div class="panel-body">
								 <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Avatar : </label>
				                    </div> 
				                    <div class="col-md-4">
				                        <span class="text-left">	
				                        <?php if($users_details['avatar']){ ?>
				                        		<img width="50px;" src="<?php echo base_url();?>public/admin/assets/uploads/avatar/<?php echo $users_details['avatar']; ?>">
				                        	<?php }else{ ?>
				                        		<img width="50px;" src="<?php echo base_url();?>public/admin/assets/uploads/avatar/user-placeholder.jpg">
				                        <?php } ?>
				                        </span>
				                    </div> 
				                    <?php if ($this->uri->segment(2) && $this->uri->segment(2) > 0) { 
				                    	$id = $this->uri->segment(2);
				                    }?>
				                     
				                </div>

								<div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">User name : </label>
				                    </div> 

				                    <div class="col-md-4">
				                        <span class="text-left"><?php if($users_details['username']){
				                        		echo $users_details['username'];
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                   
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Full name : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left"><?php if($users_details['first_name']){
				                        		echo $users_details['first_name']. " ". $users_details['last_name'];
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Gender: </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left"><?php 
				                        	if($users_details['gender']=='m'){
				                        		echo "Male";
				                        	}else{
				                        		echo "Female";
				                        	}?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Email : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        	<?php if($users_details['email']){
				                        		echo $users_details['email'];
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="mobile">Mobile : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        	<?php if($users_details['mobile']){
				                        		echo $users_details['mobile'];
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>


				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="mobile">Phone : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        	<?php if($users_details['phone']){
				                        		echo $users_details['phone'];
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Life ID : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        <?php if($users_details['life_id']){
				                        		echo "<strong>".$users_details['life_id']."</strong>";
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Life Account : </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        <?php if($users_details['life_account']){
				                        		echo "<strong>".$users_details['life_account']."</strong>";
				                        	}else{
				                        		echo "N/A";
				                        		}?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Billing Address: </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        <?php if($users_details['address']){
				                        		echo $users_details['address'];
				                        	}else{
				                        		echo "N/A";
				                        }?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname text-left">Post Code: </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        	<?php if($users_details['post_code']){
				                        		echo $users_details['post_code'];
				                        	}else{
				                        		echo "N/A";
					                        }?>
				                        </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Latitude: </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="text-left">
				                        <?php if($users_details['latitude']){
				                        		echo $users_details['latitude'];
				                        	}else{
				                        		echo "N/A";
					                        }?>
					                    </span>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Longitude:</label>
				                    </div> 

				                    <div class="col-md-8">
				                         <span class="text-right">
				                         	<?php if($users_details['longitude']){
				                        		echo $users_details['longitude'];
				                        	}else{
				                        		echo "N/A";
					                        }?>

				                         </span>
				                    </div>
				                </div>

				                 
				                <div class="row">
				                    <div class="col-md-4">
				                        <label for="countryname">Created At: </label>
				                    </div> 

				                    <div class="col-md-8">
				                        <span class="created_date">
				                        	<?php if($users_details['created_at']){
				                        		echo display_date($users_details['created_at'],'1');
				                        	}else{
				                        		echo "N/A";
					                        }?>
				                        </span>
				                    </div>
				                </div>


				                 <?php
                                                 if($display_suggest_customer){
							        $attributes = array(
							            'class' => 'form-horizontal form-row-seperated',
							            'id' => 'suggestion_form',
							            'method' => 'post'
							        );
							        echo form_open(base_url() .'admin-suggest-customer/'.$users_details['id'], $attributes);
							        ?>
							     
							    	<div class="form-group">
                                    	<label class="col-md-2 control-label" for="parent_type">Choose Parent<span class="required">*</span></label>                                    
                                    	<div class="col-md-8">
                                    		<div class="col-md-4">
	                                    		<input type="radio" name="parent_type" id="parent_type_1" value="6">
	                                    		<label class="control-label" valign="top">Business User</label>
                                    		</div>
                                    		<div class="col-md-4">
                                    			<input type="radio" name="parent_type" id="parent_type_2" value="3">
                                    			<label class="control-label">Distributor</label>
                                    		</div>
                                   		</div>
                                	</div>
                                	<?php 
                                	//$ids = json_decode($ids);
                                	/*foreach ($ids as $id => $roll) {
                                		echo "id = ".$id." , Roll Type = ".$roll." <br>";
                                	}*/
                                	?>
							        <div class="form-group">
                                    	<label class="col-md-2 control-label" for="business_id">Business User <span class="required">*</span></label>                                    
                                    	<div class="col-md-6">
                                    		<select class="form-control" name="business_id" id="business_id">
                                    		<option value="">Select</option>
                                    		<!-- <?php 
                                		 	/*if($business_users !== FALSE){

                                    			if(is_array($business_users) and count($business_users)){

                                    				foreach ($business_users as $key => $value) {

                                    					echo '<option value= "'.$value['id'].'">'.$value['first_name'].' '.$value['last_name'].' ('.$value['life_id'].')</option>';
                                    				}
                                    			}
											}*/ ?> -->
											<select>
                                   		</div>
                                	</div>
                                	<input type="hidden" name="customer_id" value="<?php echo $users_details['id']; ?>">
                                	

                                	<div class="form-group">
                                    	<label class="col-md-2 control-label" for="business_cat_id">Business category <span class="required">*</span></label>                                    
                                    	<div class="col-md-6">
                                    		<select class="form-control" name="business_cat_id" id="business_cat_id">
                                    		<option value="">Select</option>
                                    		
											<select>
                                   		</div>
                                	</div>

                                	<div class="form-group">
                                    	<label class="col-md-2 control-label" for="note">Note <span class="required">*</span></label>                                    
                                    	<div class="col-md-6">
                                    		<?php echo form_textarea(array('id'=>'note','name'=>'note','class'=>'form-control','rows'=>3,'cols'=>6)); ?>
                                   		</div>
                                	</div>

                                	<div class="form-actions">
									<div class="row">
										<div class="col-md-6">
											<div class="col-md-offset-3 col-md-9">
											<?php 
												$button = array(
													    'name' => 'save',
													    'id' => 'button',
													    'class' => 'btn green addSuggestion',
													    'value' => 'true',
													    'type' => 'submit',
													    'content' => 'Add Suggestion'
													);
												echo form_button($button);
									                                                        
											?>
											<a class="btn btn-danger" href="<?php echo base_url();?>admin-user-list"><i class="fa fa-times"></i> Cancel</a>
											</div>
										</div>
										
									</div>
									</div>
                                                 <?php echo  form_close(); }
                                                 else{?>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="col-md-12" align="center" for="no_suggestion"><label>No Suggestions Available</label></p>
                                                        </div>
                                                    </div>
                                                        </div>
                                                 <?php } ?>        				                
							</div>


				
			</div>
		</div>
<!-- End: life time stats -->


    </div>
</div>
<!-- END PAGE CONTENT-->
<script>

    var set_status_path  = "<?php echo BASE_URL; ?>dealers/admin/setStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>dealers/admin/deleteDealer";

</script>