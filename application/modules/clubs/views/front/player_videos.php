<div <?php echo ($this->session->userdata('session_tab_id') == 4)?"style='display:block;'":"style='display:none;'" ?> class="targetDiv" id="div4">
        <div class="profile_right">
            <h2 class="enter_bio"><?php echo lang('sidebar_my_videos'); ?></h2>
            <p> </p>
            <ul id="video-list">
                
            </ul>

               <div class="modal fade" id="play-video" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>.
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="form-group comman-group">
                                    <label for="exampleInputEmail1" id="vid_title"><?php echo lang('common_title'); ?></label>
                                </div>
                            </div>
                        </div>
                  
                        <div class="modal-body">
                             <div id="play">
                           
                             <iframe id="video1" width="100%" height="360" src="" frameborder="0"></iframe>
                             </div>
                        </div>
                        
                    </div>
                </div>
                <!--end video uploae pop up code-->      
            </div>
            <!--start video uploae pop up code-->
            <div class="modal fade" id="modal-video" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>.
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('add_video_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="comm-message"></div>
                        <?php echo form_open_multipart('athlete/upload_video',array("id"=>"video-form"));?>
                        <div class="modal-body">

                            <!--start pop up code-->
                            <div class="col-sm-12">
                                <div class=" main-contact-form">
                                    <div class="video_box">
                                        <div class="form-group comman-group">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?></label>
                                            <input type="text" placeholder="<?php echo lang('common_title'); ?>" class="form-control" name="video_title" id="video_title">
                                        </div>

                                         <div class="form-group">
                                            <!-- <label class="col-md-2 control-label">Video Url/Upload Video</label> -->
                                            <div class="col-md-12 leftradio">
                                                <div class="radio-list">
                                                    <?php 
                                                    
                                                    ?>
                                                    <label class="left" for="optionsRadios25">
                                                        <input class="setPlayerVideo" type="radio" checked="checked" value="1" id="optionsRadios25" name="upload_videoType"> <?php echo lang("video_url_label"); ?>
                                                    </label>

                                                    <label class="left custom-margin" for="optionsRadios26">
                                                        <input class="setPlayerVideo" type="radio" value="2" id="optionsRadios26" name="upload_videoType" > <?php echo lang("upload_video_label"); ?> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="show_video_url">
                                            <div class="video_box">
                                                <div class="form-group comman-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?></label>
                                                    <input type="text" class="form-control" name="video_url" id="video_url">
                                                    <input type="hidden" name="video_type" id="video_type">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="show_upload_video">
                                            <div class="video_box">
                                                <div class="form-group comman-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('upload_video_label'); ?></label>
                                                    <input type="file" class="form-control" name="upload_video" id="upload_video">
                                                </div>
                                            </div>
                                        </div>

                                       <!--  <div class="video_box">
                                            <div class="form-group comman-group">
                                                <label for="exampleInputEmail1"><?php //echo lang('video_url_label'); ?></label>
                                                <input type="text" maxlength="80" placeholder="" class="form-control" name="video_url" id="video_url">
                                            <input type="hidden" name="video_type" id="video_type">
                                            </div>
                                        </div> -->
                                    </div>
                                </div> 
                                <!--end of pop up code-->
                            </div>

                            <div class="modal-footer">
                                <div class="col-md-12">
                                <input type="submit" value="<?php echo lang('save_button'); ?>" name="submit" id="uploadVideo" class="uploadVideo btn btn-primary btn-custom">
                                <!-- <input type="submit" value="upload" id="update-image" class="btn btn-primary btn-custom" /> -->
                                   <!--  <button type="button" data-dismiss="modal" class="btn btn-primary btn-custom" >
                                        Share
                                    </button> -->
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--end video uploae pop up code-->      
            </div>



            <div class="modal fade" id="edit-video" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>.
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('edit_video_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="upd-comm-message"></div>
                        <?php echo form_open_multipart('athlete/update_player_video',array("id"=>"update-video-form"));?>
                        <div class="modal-body">

                            <!--start pop up code-->
                            <div class="col-sm-12">
                                <div class=" main-contact-form">
                                    <div class="video_box">
                                        <div class="form-group comman-group">
                                        <input type="hidden" name="videoid" id="videoid">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?></label>
                                            <input type="text" maxlength="80" placeholder="" class="form-control" name="video_title" id="video-title">
                                        </div>

                                        <div class="form-group">
                                            <!-- <label class="col-md-2 control-label">Video Url/Upload Video</label> -->
                                            <div class="col-md-12 leftradio">
                                                <div class="radio-list">
                                                    <?php 
                                                    
                                                    ?>
                                                    <label class="left" for="upload_videoType1">
                                                        <input class="setPlayerVideo" type="radio" value="1" id="upload_videoType1" name="upload_videoType"> <?php echo lang("video_url_label"); ?>
                                                    </label>

                                                    <label class="left custom-margin" for="upload_videoType2">
                                                        <input class="setPlayerVideo" type="radio" value="2" id="upload_videoType2" name="upload_videoType" > <?php echo lang("upload_video_label"); ?> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="show_video_url">
                                            <div class="video_box">
                                                <div class="form-group comman-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?></label>
                                                    <input type="text" placeholder="" class="form-control" name="video_url" id="update_video_url">
                                                    <input type="hidden" name="video_type" id="video-type">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="show_upload_video">
                                            <div class="video_box">
                                                <div class="form-group comman-group">
                                                    <label class="left custom-margin" for="exampleInputEmail1"><?php echo lang('upload_video_label'); ?></label>
                                                    <input type="file" class="form-control" name="upload_video" id="upload_video">
                                                    <input type="hidden" name="upload_hidden_thumb_image" id="upload_hidden_thumb_image">
                                                    <input type="hidden" name="upload_hidden_video_type" id="upload_video_type">
                                                    <input type="hidden" name="hidden_player_video" id="hidden_player_video">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="video_box">
                                            <div class="form-group comman-group">
                                                <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?></label>
                                                <input type="text" placeholder="" class="form-control" name="video_url" id="video-url">
                                            <input type="hidden" name="video_type" id="video-type">
                                            </div>
                                        </div> -->

                                    </div>
                                </div> 
                                <!--end of pop up code-->
                            </div>

                            <div class="modal-footer">
                                <div class="col-md-12">
                                <input type="submit" value="<?php echo lang('save_button'); ?>" id="updateVideo" class="btn btn-primary btn-custom">
                                <!-- <input type="submit" value="upload" id="update-image" class="btn btn-primary btn-custom" /> -->
                                   <!--  <button type="button" data-dismiss="modal" class="btn btn-primary btn-custom" >
                                        Share
                                    </button> -->
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--end video uploae pop up code-->      
            </div>
           
        </div>
    </div>  
    <style>
    .leftradio {
        margin-left: -15px;
    }
    .left {
        float: left;
    }
    .custom-margin{
        margin-left:10px;
    }
    </style>