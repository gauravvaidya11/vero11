<!-- BEGIN PAGE CONTENT-->
<link href="<?php echo BASE_URL; ?>public/admin/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo BASE_URL; ?>public/admin/assets/ckeditor/ckeditor.js"></script>
<div class="row">
<div class="col-md-12">
<div class="tabbable tabbable-custom boxless tabbable-reversed">
<div class="tab-content">
<div class="tab-pane active">
	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i><?php if($tag){ echo $tag;}else{ echo "Add About us"; }?>
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"></a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<?php //pr($dealer_info);?>
			<?php echo form_open_multipart(BASE_URL.'admin-add-about-us',array("id"=>"addAboutUsForm","class"=>"form-horizontal","method"=>"post")); ?>
				<div class="form-body">
					<h3 class="form-section">About us Information</h3>
					<?php $id = ($edit) ? $about_us_info['id'] : ''; ?>
					<?php $hidden_image = ($edit) ? $about_us_info['player_image'] : ''; ?>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="hidden_player_image" value="<?php echo $hidden_image; ?>">
					<div class="form-group">
						<label class="col-md-2 control-label">About Us Heading <span class="required">*</span></label>
						<div class="col-md-8">
							<?php echo form_input(array('name'=>'about_us_heading','id'=>'about_us_heading','value'=> set_value('about_us_heading', ($edit) ? $about_us_info['about_us_heading'] : ''), 'placeholder'=>'About us heading','class'=>'form-control')); ?>
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-md-2 control-label">Club Name </label>
						<div class="col-md-8">
							<?php echo form_input(array('name'=>'club_name','id'=>'club_name','value'=> set_value('club_name', ($edit) ? $about_us_info['club_name'] : ''), 'placeholder'=>'Club Name','class'=>'form-control')); ?>
						</div>
					</div> -->

					<div class="form-group">
						<label class="col-md-2 control-label">Play Date <span class="required">*</span></label>
						<div class="col-md-8">
							<?php echo form_input(array('name'=>'play_date','id'=>'play_date','value'=> set_value('play_date', ($edit) ? $about_us_info['play_date'] : ''), 'readonly'=>'readonly', 'placeholder'=>'Play date', 'class'=>'form-control')); ?>
						</div>
					</div>

					
					<div class="form-group">
						<label class="col-md-2 control-label">Facebook Url: <span class="required">*</span></label>
						<div class="col-md-8">
							<?php echo form_input(array('name'=>'facebook_url', 'id'=>'facebook_url', 'value'=> set_value('facebook_url', ($edit) ? $about_us_info['facebook_url'] : ''), 'placeholder'=>'Facebook Url','class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Twitter Url: <span class="required">*</span></label>
						<div class="col-md-8">
							<?php echo form_input(array('name'=>'twitter_url','id'=>'twitter_url','value'=> set_value('twitter_url', ($edit) ? $about_us_info['twitter_url'] : ''), 'placeholder'=>'Twitter Url','class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Google Plus Url: <span class="required">*</span></label>
						<div class="col-md-8">
							<?php echo form_input(array('name'=>'google_plus_url','id'=>'google_plus_url','value'=> set_value('google_plus_url', ($edit) ? $about_us_info['google_url'] : ''), 'placeholder'=>'Goofle Plus Url','class'=>'form-control')); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">Image/Video</label>
						 
						<div class="col-md-8 leftradio">
							<div class="radio-list">
								<?php 
								$defaultcheck = "";
								if($edit){
									//echo $about_us_info['image_video_type'];die;
									if($about_us_info['image_video_type']=='1'){ $imgchecked = "checked='checked'"; }else{ $imgchecked= ""; }
									if($about_us_info['image_video_type']=='2'){ $checked = "checked='checked'";}else{ $checked= ""; }
								}else{
									$imgchecked = "";
									$checked = "";
									$defaultcheck = "checked='checked'";
									} ?>
								<label class="radio-inline">
									<input class="setPlayerImage" <?php echo $imgchecked; echo $defaultcheck; ?> type="radio" value="1" id="optionsRadios25" name="image_video_type"> Image 
								</label>

								<label class="radio-inline">
									<input class="setPlayerImage" <?php echo $checked; ?> type="radio" value="2" id="optionsRadios26" name="image_video_type" > Video 
								</label>
							</div>
						</div>
					</div>
					
					<div class="show_image">
						<div class="form-group">
							<label class="col-md-2 control-label">Player Image:</label>
							<div class="col-md-8">
								<input type="file" name="player_image" id="player_image" class="form-control">
							</div>
						</div>
						<div class="gal_js_error"></div>
					</div>

					<div class="show_video">	
						<div class="form-group">
							<label class="col-md-2 control-label">Player Video Url: <span class="required">*</span></label>
							<div class="col-md-8">
								<?php echo form_input(array('name'=>'video_url','id'=>'video_url','value'=> set_value('video_url', ($edit) ? $about_us_info['player_video_url'] : ''), 'placeholder'=>'video Url','class'=>'form-control')); ?>
								
								<input type="hidden" name="video_type" id="video_type" value="<?php echo ($edit)? $about_us_info['video_type']:''?>">
							</div>
						</div>
					</div>
					

					<div class="form-group">
						<label class="col-md-2 control-label">About Content: <span class="required">*</span></label>
						<div class="col-md-8">
							<textarea name="about_content" id="about_content"><?php echo ($edit) ? $about_us_info['about_us_content'] : ''; ?></textarea>
						</div>
					</div>

				</div> <!--close form body-->
				<div class="form-actions fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="col-md-offset-3 col-md-9">
							<?php 
								$button = array(
									    'name' => 'button',
									    'id' => 'button',
									    'class' => 'btn green addAboutUsBtn',
									    'value' => 'true',
									    'type' => 'button',
									    'content' => $tag
									);


								echo form_button($button);
                                                                            
							?>
							<a class="btn btn-danger" href="<?php echo BASE_URL; ?>admin-about-us-list"><i class="fa fa-times"></i> Cancel</a>
							</div>
						</div>
						<div class="col-md-6">
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!-- END FORM-->
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<!-- END PAGE CONTENT-->
<script>
$(document).ready(function(){
	CKEDITOR.replace('about_content', {
	  uiColor: '#79bc49',
	  toolbar: [
	    [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-' ],
	  ]
	});
});
</script>
<style>
	.leftradio{
		margin-left: 17px;
	}
	.gal_js_error {
	    color: #b94a48;
	    margin-bottom: 17px;
	    margin-left: 182px;
	}
</style>
