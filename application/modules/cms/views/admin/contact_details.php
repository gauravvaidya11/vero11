<!-- BEGIN PAGE CONTENT-->

<?php ?>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i>Contact Details
                            </div>

                             
                        
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <div class="form-body">
                                <h3 class="form-section">Sender Info From Front</h3>

                                

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Name:', 'name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($contact_info->name != '') {
                                                    echo ucfirst($contact_info->name);
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Email:', 'Email', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($contact_info->email != '') {
                                                    echo ucfirst($contact_info->email);
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Phone:', 'Phone', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($contact_info->phone != '') {
                                                    echo $contact_info->phone;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Message:', 'message', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($contact_info->message != '') {
                                                    echo $contact_info->message;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->


                                <h3 class="form-section">Contact Reply Info by Admin</h3>
                                <?php if(!empty($reply_contact_info)){ 
                                    foreach ($reply_contact_info as $contact_reply) {
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Name:', 'name', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                                <?php
                                                if ($contact_reply->name != '') {
                                                    echo ucfirst($contact_reply->name);
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Email:', 'Email', array('class' => 'control-label col-md-3')); ?>
                                            <div class="col-md-9 details-margin-top">
                                               <?php
                                                if ($contact_reply->email != '') {
                                                    echo $contact_reply->email;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <?php echo form_label('Reply By:', 'reply_by', array('class' => 'control-label col-md-4')); ?>
                                            <div class="col-md-8 details-margin-top">
                                                <?php
                                                if ($contact_reply->sender_id == '1') {
                                                    echo "Admin";
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo form_label('Reply Message:', 'reply_message', array('class' => 'control-label col-md-4')); ?>
                                            <div class="col-md-8 details-margin-top">
                                               <?php
                                                if ($contact_reply->reply_message != '') {
                                                    echo $contact_reply->reply_message;
                                                } else {
                                                    echo 'N/A';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div style="clear:both;height:10px;border-top:1px solid #ddd;"></div>
                                <?php } 
                                }else{
                                    echo "No Reply For This Contact";
                                } ?>
                                <div class="reply_button"><a class="reply_mail btn btn-sm yellow" rel="<?php echo $contact_info->id; ?>" href="javascript:void(0)" data-toggle="modal" > <i class="fa fa-reply"></i> Reply</a></div>                     
                            </div>

                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Add Music Model-->
<div class="modal fade averageModal" id="showReplymailModal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <?php echo form_open(BASE_URL.'admin-contact-reply',array("id"=>"replyContactUsForm", "method"=>"post")); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center"> <i class="fa fa-reply"></i> Reply Contact Email</h2>
                <input type="hidden" name="reply_id" id="replyId">

            </div>
            <div class="modal-body">  
                <div class="form-group">
                    <label for="Subject">Name</label>
                    <input readonly="readonly" type="text" id="replyName" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Subject">Email</label>
                    <input readonly="readonly" type="text" id="replyEmail" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Subject">Subject <span class="required">*</span></label>
                    <input type="text" name="subject" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="Message">Message <span class="required">*</span></label>
                    <textarea class="form-control" name="message" rows="5" cols="50"></textarea>
                </div>                
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" id="btnSendReply">Send</button>                
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<style>
    .detail_video{
        display: inline-block;
        width: 9%;
        margin-left: 10px;
        list-style: none;
    }
</style>
<!-- END PAGE CONTENT-->
