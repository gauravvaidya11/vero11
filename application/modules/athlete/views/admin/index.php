<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_THEME_PLUGINS; ?>bootstrap-fileinput/bootstrap-fileinput.css"/>
	<div class="row profile">
		<div class="col-md-12">
			<!--BEGIN TABS-->
			<div class="tabbable tabbable-custom tabbable-full-width">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab_1_1" data-toggle="tab">
							 <i class="fa fa-cog"></i> Personal info
						</a>
					</li>
					<li>
						<a href="#tab_1_3" data-toggle="tab">
							 <i class="fa fa-picture-o"></i> Change Avatar
						</a>
					</li>
					<li>
						<a href="#tab_1_4" data-toggle="tab">
							<i class="fa fa-lock"></i> Change Password
						</a>
					</li>
					
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab_1_1">
						<div class="portlet box green"> <!--portlet box green-->
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-reorder"></i>Admin Personal Profile
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<?php echo form_open(BASE_URL.'athlete/admin/updatePersonalInfo', array('class' => 'form-horizontal change-profile', 'id' => 'change-profile')); ?>
									<div class="form-body">


										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
												echo form_label('User Name <span class="required">*</span>', 'username', $formlabel);
											?>
											<div class="col-md-4">
												<div class="input-icon">
													<i class="fa fa-user"></i>
													<?php 
														$user_name = array(
															'name' => 'username',
															'id' => 'username',
															'class'=> 'form-control',
															'value' => set_value('username', $admin_profile['username']),
															'placeholder' =>'Username'
															);
															echo form_input($user_name);
													?>
												</div>
											</div>
										</div>

										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
												echo form_label('First Name <span class="required">*</span>', 'firstname', $formlabel);
											?>
											<div class="col-md-4">
												<div class="input-icon">
													<i class="fa fa-user"></i>
													<?php 
														$first_name = array(
															'name' => 'firstname',
															'id' => 'firstname',
															'class'=> 'form-control',
															'value' => set_value('firstname', $admin_profile['firstname']),
															'placeholder' =>'Firstname'
															);
															echo form_input($first_name);
													?>
												</div>
											</div>
										</div>

										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
												echo form_label('Last Name', 'lastname', $formlabel);
											?>
											<div class="col-md-4">
												<div class="input-icon">
													<i class="fa fa-user"></i>
													<?php
														$last_name = array(
																	'name' => 'lastname',
																	'id' => 'lastname',
																	'class'=> 'form-control',
																	'value' => set_value('lastname', $admin_profile['lastname']),
																	'placeholder' =>'Lastname'
																	);
																	echo form_input($last_name);
													?>	
												</div>
											</div>
										</div>

										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
												echo form_label('Email <span class="required">*</span>', 'email', $formlabel);
											?>	
											<div class="col-md-4">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<?php 
														$email = array(
																'name' => 'email',
																'id' => 'email',
																'class'=> 'form-control',
																'value' => set_value('email', $admin_profile['email']),
																'placeholder' =>'Email'
																);
																echo form_input($email);
													?>
												</div>
											</div>
										</div>

									</div>
									<div class="form-actions fluid">
										<div class="col-md-offset-3 col-md-9">
											<?php 
												$button = array(
													    'name' => 'button',
													    'id' => 'button',
													    'class' => 'btn green chngProfile',
													    'value' => 'true',
													    'type' => 'button',
													    'content' => 'Save'
													);

												echo form_button($button);
											?>
											<a class="btn btn-danger" href="<?php echo base_url();?>admin-dashboard"><i class="fa fa-times"></i> Cancel</a>
											
										</div>
									</div>
								<?php echo form_close(); ?>
								<!-- END FORM-->
							</div>
						</div> <!-- Blue form action-->
					</div>
					<!--tab_1_2-->
					

					<div class="tab-pane" id="tab_1_3">

						<div class="portlet box green"> <!--portlet box green-->
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-reorder"></i>Change Avatar
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
							</div>

							<div class="portlet-body form">

								<!-- BEGIN FORM-->
								<?php echo form_open(base_url().'athlete/admin/updateAvatar', array('class' => 'form-horizontal avatar-iamge', 'id' => 'avatar-iamge', 'enctype' => 'multipart/form-data')); ?>
									<div class="form-body">
										<div class="form-groupt">
										
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
													if($admin_profile['avatar'] && $admin_profile['avatar']!=null){ ?> 
														<img width="100%" src="<?php echo ADMIN_IMAGE_UPLOAD_PATH;?>avatar/original/<?php echo $admin_profile['avatar']; ?>">
												<?php }else{ ?>
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
												<?php } ?>
												</div>

													<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
													</div>
												
												<div>
													
													<span class="btn blue btn-file">
														<i class="fa fa-plus"></i>
														<span class="fileinput-new">
															 Select image
														</span>
													
														<span class="fileinput-exists">
															 Change
														</span>
														<?php  
															$avatar_upload = array(
																		'type' => 'file',
																		'name' => 'avtarimage'
																		);

															echo form_upload($avatar_upload);
															echo form_hidden('upd_avtarimage',$admin_profile['avatar']);
														?>
													</span>
													<a data-dismiss="fileinput" class="btn default fileinput-exists" href="#">
														 Remove
													</a>
												</div>
											</div>

											<div class="clearfix margin-top-10">
												<span class="label label-danger">
													 NOTE!
												</span>&nbsp;
												<span>
													  Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
												</span>
											</div>
										</div>
										

									</div>
									<div class="form-actions fluid">
										<div class="col-md-offset-3 col-md-9">
											<?php 
												$button = array(
													    'name' => 'button',
													    'id' => 'button',
													    'class' => 'btn green chngAvatar',
													    'value' => 'true',
													    'type' => 'button',
													    'content' => 'Update'
													);

												$cancel_button = array(
													    'name' => 'button',
													    'id' => 'button',
													    'class' => 'btn default',
													    'value' => 'true',
													    'type' => 'reset',
													    'content' => 'Cancel'
													);

												echo form_button($button);
												echo form_button($cancel_button);
											?>
										</div>
									</div>
								<?php echo form_close(); ?>
								<!-- END FORM-->
								</div>
							</div>
						</div> <!-- Blue form action-->

					<!--end tab-pane-->
					<div class="tab-pane" id="tab_1_4">

						<div class="portlet box green"> <!--portlet box green-->
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-reorder"></i>Change Password
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
								</div>
							</div>
							<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<?php echo form_open(base_url().'athlete/admin/changePassword', array('class' => 'form-horizontal changepass', 'id' => 'change-pass')); ?>
									<div class="form-body">
										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
												echo form_label('Current Password <span class="required">*</span>', 'currentpass', $formlabel);
											?>
											<div class="col-md-4">
												<div class="input-icon">
													<i class="fa fa-lock"></i>
													<?php 
														$current_password = array(
															'name' => 'currentpass',
															'id' => 'currentpass',
															'class'=> 'form-control',
															'placeholder' =>'Current Password');

														echo form_password($current_password);
													?>
												</div>
											</div>
											

										</div>

										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
												echo form_label('New Password <span class="required">*</span>', 'new_password', $formlabel);

											?>
											<div class="col-md-4">
												<div class="input-icon">
													<i class="fa fa-lock"></i>
													<?php
														$new_password = array(
															'name' => 'new_password',
															'id' => 'new_password',
															'class'=> 'form-control',
															'placeholder' =>'New Password');

															echo form_password($new_password);
													?>	
												</div>
											</div>
										</div>

										<div class="form-group">
											<?php 
												$formlabel = array('class' => 'col-md-3 control-label');
											echo form_label('Re-type New Password <span class="required">*</span>', 'retry_password', $formlabel);
											?>	
											<div class="col-md-4">
												<div class="input-icon">
													<i class="fa fa-lock"></i>
													<?php 
														$retype_password = array(
														'name' => 'retry_password',
														'id' => 'retry_password',
														'class'=> 'form-control',
														'placeholder' =>'Re-type Password');

														echo form_password($retype_password);
													?>
												</div>
											</div>
										</div>

									</div>
									<div class="form-actions fluid">
										<div class="col-md-offset-3 col-md-9">
											<?php 
												$button = array(
													    'name' => 'button',
													    'id' => 'button',
													    'class' => 'btn green chngPass',
													    'value' => 'true',
													    'type' => 'button',
													    'content' => 'Change Password'
													);

												$cancel_button = array(
													    'name' => 'button',
													    'id' => 'button',
													    'class' => 'btn default',
													    'value' => 'true',
													    'type' => 'reset',
													    'content' => 'Cancel'
													);

												echo form_button($button);
												echo form_button($cancel_button);
											?>
										</div>
									</div>
								<?php echo form_close(); ?>
								<!-- END FORM-->
							</div>
						</div> <!-- Blue form action-->

				</div><!--END TABS-->
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT-->