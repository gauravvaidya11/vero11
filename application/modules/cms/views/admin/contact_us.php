<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Contact us History
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
                <div class="actions">
                    <a style="display:none;" href="javascript:void(0)" class="btn yellow reply_mail hideshowreply">
                        <i class="fa fa-reply"></i>
                        <span class="hidden-480">
                            Reply All
                        </span>
                    </a>
                </div>
                
            </div>

            <div class="portlet-body">
                <div class="table-container table-verticle-menu">
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                            <tr role="row" class="heading">
                                <!-- <th width="2%"></th> -->
                                <th width="2%">
                                    S.N.
                                </th>
                                <th width="10%">
                                    Name
                                </th>
                                <th width="10%">
                                    Email
                                </th>
                                <th width="15%">
                                    Phone
                                </th>
                                <th width="15%">
                                    Message
                                </th>
                                <th width="15%">
                                    Created On
                                </th>
                                <th width="10%">
                                    Action
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <!-- <td><input type="checkbox" name="checkall" id="checkall" class="checkall"></td> -->
                                <td></td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="name" placeholder="Name">
                                </td>

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="email" placeholder="Email">
                                </td>
                                
                                <td></td>
                                <td></td>

                                <td>
                                    <!-- <input type="text" class="form-control form-filter input-sm" name="last_name" placeholder="Name"> -->
                                </td>
                                
                                
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

<!-- END PAGE CONTENT-->

<!--Add Music Model-->
<div class="modal fade averageModal" id="showMailModal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- <form method="post" action="<?php echo BASE_URL; ?>admin-reply-email" id="referesh_watermark"> -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center"> Email Details</h2>
                <input type="hidden" name="reply_id" id="replyId">

            </div>
            <div class="modal-body">                        
                <div class="form-group">
                    <label for="Subject">Name</label>
                    <input disabled="disabled" type="text" id="emailName" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Subject">Email</label>
                    <input disabled="disabled" type="text" id="emailEmail" name="email" class="form-control">
                </div>

                 <div class="form-group">
                    <label for="Subject">Subject</label>
                    <input disabled="disabled" type="text" id="emailSubject" name="subject" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="Message">Message</label>
                    <textarea disabled="disabled" id="emailMessage" class="form-control" name="message" rows="5" cols="50"></textarea>
                </div>                
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-success" id="btnSendReply">Reply</button>                
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<!-- END PAGE CONTENT-->

<script>
    $(function(){
        // this code for use select all check box and reply multiple contact for future use
        // $(document).on("click", "#checkall", function(){
        //     var checked = $(this).is(":checked");
        //     if(checked){
        //         $(".hideshowreply").show();
        //     }else{
        //         $(".hideshowreply").hide();
        //     }
        //     $('.checkallReply').each(function () { 
        //         $(this).attr("checked", checked);
        //     });

        // });

        // $(document).on("click", ".checkallReply", function(){
        //     var checked = $(this).is(":checked");
        //     if(checked){
        //         $(".hideshowreply").show();
        //     }else{
        //         $(".hideshowreply").hide();
        //     }
        // });



        var post_data = {
            name : '<?php echo $this->security->get_csrf_token_name(); ?>',
            val  : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        //console.log(post_data);
           var path  = BASE_URL+"cms/admin/getContactUsHistory" ;
           var sorts = [0, 3, 4, 6];
           var col_sort = [1, "asc"];
           //App.init();
           TableAjax.init( path , sorts , post_data, col_sort );
    });
    var set_status_path  = "<?php echo BASE_URL; ?>cms/admin/setContactStatus";
    var delete_status_path  = "<?php echo BASE_URL; ?>cms/admin/deleteContactStatus";

</script>