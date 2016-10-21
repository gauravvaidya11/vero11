<div class="targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 3)?"style='display:block;'":"style='display:none;'" ?> id="div3">

    <div class="profile_right">
        <h2 class="enter_bio"><?php echo lang('sidebar_my_images'); ?></h2>

        <p></p>
        <ul id="image-list">
        </ul>

            <!--start pop up code-->
            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabe1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

<!-- <form method="post" name="form"> -->
                        <div class="comm-message"></div>
                        <?php echo form_open_multipart('athlete/upload_player_image',array("id"=>"imageform"));?> 
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('add_image_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">

                            <!--start pop up code add more-->
                            <div class="col-md-12">
                                <div class="main-contact-form">
                                    <div class="video_box">

                                        <div class="form-group comman-group">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?></label>
                                            <input type="text" placeholder="" maxlength="80" class="form-control" id="title" name="image_title">
                                        </div>
                                        <div class="form-group comman-group">
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        <?php echo lang('browse_button'); ?>&hellip; <input type="file" name="image" id="photoimg" style="display: none;"><span class="has-error"></span>
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                    </div> 

                                </div>
                            </div>
                            <!--end of pop up code-->
                        </div>
                        
<div id='preview'>
</div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                                <input type="submit" value="<?php echo lang('upload_button'); ?>" id="submit-image" class="btn btn-primary btn-custom" />
                             <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
                               <!--  <button type="button" name="upload"  class="btn btn-primary btn-custom" >
                                    Save
                                </button> -->
                            </div>  
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <!--end pop up code-->


<!--start pop up code-->
            <div class="modal fade" id="editImage" role="dialog" aria-labelledby="myModalLabe1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="comm-message"></div>
<!-- <form method="post" name="form"> -->
                        <?php echo form_open_multipart('athlete/update_player_image',array("id"=>"update-image-form"));?> 
                        <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-times" aria-hidden="true"></i>

                        </button>
                        <div class="modal-header">
                            <div class="col-md-12">
                                <div class="pop-up-inner">
                                    <h2><?php echo lang('edit_image_title'); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">

                            <!--start pop up code add more-->
                            <div class="col-md-12">
                                <div class="main-contact-form">
                                    <div class="video_box">
                                        <div class="form-group comman-group">
                                        <input type="hidden" name="imageid" id="imageid">
                                        <input type="hidden" name="hidden_player_image" id="playerImg">
                                            <label for="exampleInputEmail1"><?php echo lang('common_title'); ?></label>
                                            <input type="text" maxlength="80" placeholder="" class="form-control" id="image_title" name="image_title">
                                        </div>
                                        <img id="player-image" src="" height="100px" width="100px">
                                        
                                        <div class="form-group comman-group leftside">
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        <?php echo lang('browse_button'); ?>&hellip; <input type="file" name="image" id="" style="display: none;">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                    </div> 

                                </div>
                            </div>
                            <!--end of pop up code-->
                        </div>
                        
<div id='preview'>
</div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                                <input type="submit" value="<?php echo lang('upload_button'); ?>" id="update-image" class="btn btn-primary btn-custom" />
                             <!--   <button type="submit" class="btn btn-primary">Submit</button> -->
                               <!--  <button type="button" name="upload"  class="btn btn-primary btn-custom" >
                                    Save
                                </button> -->
                            </div>  
                        </div>
                    </form>
                </div>

            </div>

        </div>




    </div>
</div>
<style>
    .leftside {
        float: right;
        width: 85%;
    }
</style>