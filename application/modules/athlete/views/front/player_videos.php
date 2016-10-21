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
                                            <input type="text" placeholder="" class="form-control" name="video_title" id="video_title">
                                        </div>
                                        <div class="video_box">
                                            <div class="form-group comman-group">
                                                <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?></label>
                                                <input type="text" maxlength="80" placeholder="" class="form-control" name="video_url" id="video_url">
                                            <input type="hidden" name="video_type" id="video_type">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!--end of pop up code-->
                            </div>

                            <div class="modal-footer">
                                <div class="col-md-12">
                                <input type="submit" value="<?php echo lang('save_button'); ?>" name="submit" id="uploadVideo" class="btn btn-primary btn-custom">
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
                        <div class="comm-message"></div>
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
                                        <div class="video_box">
                                            <div class="form-group comman-group">
                                                <label for="exampleInputEmail1"><?php echo lang('video_url_label'); ?></label>
                                                <input type="text" placeholder="" class="form-control" name="video_url" id="video-url">
                                            <input type="hidden" name="video_type" id="video-type">
                                            </div>
                                        </div>
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