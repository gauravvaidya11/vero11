<script type="text/javascript" src="<?php echo base_url(); ?>public/front/assets/ckeditor/ckeditor.js"></script>
<div class="targetDiv" <?php echo ($this->session->userdata('session_tab_id') == 2)?"style='display:block;'":"style='display:none;'" ?> id="div2">
    <div class="profile_right ">
        <h2 class="enter_bio" id="biotitle"></h2>

        <p id="bio_content"></p>
        <div class="add_more custom-add-more1"> <a id="edit-bioBtn" href="javascript:void(0)" role="button" data-toggle="modal"><span><i aria-hidden="true" class="fa fa-pencil-square-o"></i></span> <?php echo lang('edit_button'); ?></a> </div>

        <!--start Enter Bio code-->
        <div class="modal fade" id="player-biography" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close custom-close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-times" aria-hidden="true"></i>

                    </button>
                    <div class="modal-header">
                        <div class="col-md-12">
                            <div class="pop-up-inner">
                                <h2><?php echo lang('bio_title'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="comm-message"></div>
                <?php $attributes = array('name' => "biography", 'id' => 'biography-form'); ?>
                <?php echo form_open('', $attributes); ?>
                    <!--start pop up code add more-->
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <div class="main-contact-form">

                                <div class="form-group comman-group">
                                    <label for="exampleInputEmail1"><?php echo lang('common_title'); ?></label>
                                    <input type="text" maxlength="80" placeholder="" class="form-control vAlphabetsOnly vSingleSpace" name="bio_title" id="bio-title">
                                </div>
                                <div class="tax-box">
                                    <!-- <textarea class="form-control" rows="3" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.">

                                    </textarea> -->

                                    <textarea cols="80" id="edi" name="content" rows="10" maxlength='600'>

                                    </textarea>
                                    
                                </div>


                            </div> 
                        </div>
                        <!--end of pop up code-->
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                        <input type="button" name="submit" value="Save" id="editBio"  class="btn btn-primary btn-custom">
                            <!-- <button type="submit" name="submit" data-dismiss="modal" class="btn btn-primary btn-custom" >
                                Save
                            </button> -->
                        </div>
                    </div>
                </div>
</form>
            </div>

        </div>
        <!--end Enter Bio code-->           



    </div>
</div>
 <script>

                                        

                                    </script> 