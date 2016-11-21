

<section class="bnrInr">
     <div class="profilePicUser">   
        <div class="container">
            <div class="profilePicBnr">
                <div class="ppCntn">
                     <?php $user_info = userLoggedInInfo(); ?>
                <?php if($user_info['profile_image']){ $profile_image = BASE_URL.'public/uploads/profile_image/'.$user_info['profile_image'];}else{ $profile_image = AVATAR_IMAGE; } ?>
                 <img src="<?php echo $profile_image; ?>" alt="Profile Image" id="profileImage"/>
                    </div>
                    <div class="userLogin">
                        <span class="profileName"><?php if($user_info['club_name']){ echo ucfirst($user_info['club_name']); } ?>  </span>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- Login Sec -->
    <div class="container">
        <div class="formCntnr">
            <h2><?php echo lang("heading_credit_card_payment"); ?></h2>
            <?php $attributes = array('name' => "club_payment", 'id' => 'clubPaymentForm'); ?>
            <?php echo form_open(BASE_URL.'club-payment', $attributes); ?>

              <?php echo $this->session->flashdata('success_message'); ?>
              <?php echo $this->session->flashdata('error_message'); ?>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-7">
                            <?php //echo $this->session->userdata('firstName'); ?>
                            <div class="heading-bx">
                                 <h4 class="in-heading"><?php echo lang('label_heading_new_credit_card'); ?></h4><hr>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo lang('label_heading_credit_card_number'); ?><span><sup class="red">*</sup></span></label>
                                        <input type="text" class="form-control" placeholder="<?php echo lang('label_heading_credit_card_number'); ?>" name="number" id="number" value="4032035174717850" />
                                        <!-- <input type="text" class="form-control" placeholder="Credit Card Number" name="number" id="number" value="4032039337593349" /> -->
                                        
                                        <?php echo form_error('number', '<div class="alert-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo lang('label_heading_card_holder_name'); ?><span><sup class="red">*</sup></span></label>
                                        <input type="text" class="form-control" maxlength="40" placeholder="<?php echo lang('label_heading_card_holder_name'); ?>" name="name" id="name" value="" />
                                        
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang('heading_expiration_date');?><span><sup class="red">*</sup></span></label>                    
                                        <input type="text" class="form-control" placeholder="MM/YYYY" name="expiry" id="expiry" value="" />
                                        <?php echo form_error('brand_url', '<div class="alert-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><?php echo lang('label_for_cvv_no');?><span><sup class="red">*</sup></span></label>                    
                                        <input type="text" class="form-control" placeholder="<?php echo lang('label_for_cvv_no'); ?>" name="cvc" id="cvc" value="" />
                                    </div>
                                </div>
                               
                                <div class="pull-left">
                                        <div class="form-group">                                            
                                            <button type="submit" id="btnPayNow" class="btn btn-default btn-block btn-danger"><?php echo lang('button_pay_now'). ' $'. getBasicSetting('plan_price')->setting_value; ?></button></li>
                                        </div>
                                    <!-- </div> -->
                                </div>

                            </div>
                        </div>
                    
                        <div class="col-sm-5">
                            <div class="heading-bx">
                                <h4 class="in-heading">&nbsp;</h4><hr>
                            </div>
                            <div class="card-wrapper"></div>
                        </div>
                    </div>
                </div>
           
                
                   

            <?php echo form_close();?>
        </div>
    </div>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/credit_card_js/card.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/credit_card_js/payment.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>
<script>
    new Card({
        form: document.querySelector('form'),
        container: '.card-wrapper'
    });
    
</script>
<style>
   .formCntnr form{
        width: 100% !important; 
        max-width: 932px;
   }
</style>
        