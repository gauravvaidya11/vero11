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


<div class="pmntOptn">
    <div class="container">
        <div class="formCntnr">
            <h2><?php echo lang("heading_choose_payment_option"); ?></h2>
            <?php $attributes = array('name' => "club-payment", 'id' => 'club-payment-form'); ?>
                <?php echo form_open(BASE_URL.'payment-type', $attributes); ?>
                <div class="pmntOptMtr">
                    <p>
                        <?php echo lang("payment_option_contant_first"); ?>
                        <?php echo lang("payment_option_contant_second"); ?>
                        <?php echo lang("payment_option_contant_third"); ?>
                    </p>
                </div>
                <div class="topRadioBtns">
                
                    <div class="snglRdo">
                        <input checked="checked" type="radio" class="paypalBtn" id="credit_card" name="payment_type" value="1" />
                        <label for="credit_card"><?php echo lang("payment_by_credit_card"); ?></label>
                    </div>
                    <div class="snglRdo">
                        <input type="radio" class="paypalBtn" id="paypal_express" name="payment_type" value="2" />
                        <label for="paypal_express"><?php echo lang("payment_by_paypal"); ?></label>
                    </div>
                </div>

                <div class="plcyTerms">
                    <p>
                        <?php echo lang("terms_condition_link");?> 
                        <a href=""><?php echo lang("cpmmon_click_here"); ?></a> 
                    </p>
                </div>

                <div>
                    <div class="form-group showProceedBtn">                                          
                        <button type="submit" id="btnSave" class="btn btn-default btn-block btn-danger"><?php echo lang('button_proceed'). ' $'.getBasicSetting('plan_price')->setting_value; ?></button>
                    </div>
                    <?php echo form_close();?>
                    
                    <div class="form-group showCheckoutBtn">
                            <?php
                                echo form_open(base_url() . 'paypal-express', array(
                                    'id' => 'paymentContainer',
                                    'method' => 'post'
                                ));
                                echo form_hidden('order_type', 'order');
                                echo form_close();
                                ?>
                            <script>
                                window.paypalCheckoutReady = function () {
                                    paypal.checkout.setup('7ZRBZ9EU63EY8', {
                                        container: 'paymentContainer',
                                        environment: 'sandbox'

                                    });

                                }

                            </script>
                            <script src="//www.paypalobjects.com/api/checkout.js" async></script>
                        </div>
                    </div>
            </div> 

        </div>
    </div>
</div>


<script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/credit_card_js/card.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/bootstrap-select.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>
