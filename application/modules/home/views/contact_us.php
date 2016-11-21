    <section class="bnrInr"></section>
    <div class="aboutClub">
    <div class="container">



    <!-- <div class="col-sm-12 sec-right">
		<div class="secRightCntnt"> -->
            <div class="topHead">
            	<span><?php echo lang('navigation_contact_us'); ?></span>
            </div>
            <?php echo $this->session->flashdata('success_message'); ?>
            <?php echo $this->session->flashdata('error_message'); ?>
            <div class="cntctTopCntnt">
                <p>
                	Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer. Lorem Ipsum is simply dummy text of the printing and 
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                    ever since the 1500s, when an unknown printer.
                </p>
			</div>
            <div class="contactMap">
            <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyACKKZdqBdvR2at4D8teXW6S9G0JSpkdIo'></script>
            <div style='overflow:hidden;height:308px;width:1144px;'>
                <div id='gmap_canvas' style='height:308px;width:1144px;'></div>
                <div><small></small></div><div><small><a href="https://www.amazon.com/Extra-Large-Folding-Kennel-Plastic/dp/B00M3NBJ8E/ref=sr_1_5?s=pet-supplies&ie=UTF8&qid=1470313482&sr=1-5keywords=pet+cage">Pet Wire Cage</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(51.61193821412576,0.2471501472656401),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.61193821412576,0.2471501472656401)});infowindow = new google.maps.InfoWindow({content:'<strong>United Stats</strong><br>1600 Apartment Panchey Manormagnaj View, CA 94043 United Stats<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <!-- <img alt="map Image" src="<?php echo base_url(); ?>public/front/assets/images/mapImage.jpg"></div> -->
            <div class="row cntctBtm">
                <div class="cntctBtmLeft col-md-6">
                   <div class="cntctInfo">
                        <div class="topHead">
                            <span><?php echo lang('navigation_contact_us'); ?></span>
                        </div>
                        <div class="cntnInfoSngle clearfix">
                            <span><?php echo lang("contact_us_heading_address"); ?>: </span>
                            <div class="rghtAdrs">
                                <?php echo  lang("contact_us_address"); ?>
                            </div>
                        </div>
                        <div class="cntnInfoSngle clearfix">
                            <span><?php echo lang("contact_us_heading_phone");?>:</span>
                            <div class="rghtAdrs">
                                <?php echo "+12 121 214 2221"; ?>
                            </div>
                        </div>
                        <div class="cntnInfoSngle clearfix">
                            <span><?php echo lang("common_email_placeholder"); ?>:</span>
                            <div class="rghtAdrs">
                                youremail@mail.com
                            </div>
                        </div>
            		</div>
                    <div class="getSocl">
                    	<div class="topHead">
                            <span><?php echo lang('navigation_contact_us'); ?></span>
                        </div>
                        <ul>
                        	<li><a href=""><i aria-hidden="true" class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-instagram"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-youtube"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-tumblr"></i></a></li>
                            <li><a href=""><i aria-hidden="true" class="fa fa-rss"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="cntctBtmRght col-md-6">
                   <div class="cntctInfo">
                        <div class="topHead">
                            <span><?php echo lang('get_in_touch'); ?></span>
                            <?php if(isset($message) && $message != "") {
                                echo $message;
                            }?>
                        </div>
                        <div class="contctFrm">
                        	<p>
                            	<?php echo lang("contact_us_form_content"); ?>
                            </p>
                            <?php 
                                $attributes = array('name' => "contact_us", 'id' => 'contactUsForm');
                                echo form_open('home/contact_us', $attributes); ?>
                            	<div class="snglInpt"><input type="text" placeholder="Name" name="name" value="<?php if($this->session->userdata('display_name')) { echo $this->session->userdata('display_name');} ?>"></div>
                                <div class="snglInpt"><input type="email" placeholder="Email" name="email" value="<?php if($this->session->userdata('email')) { echo $this->session->userdata('email');} ?>"></div>
                                <div class="snglInpt"><input type="tel" placeholder="Phone" name="phone"></div>
                                <div class="snglInpt"><textarea rows="5" placeholder="Message" name="message"></textarea></div>
                                <div class="snglInpt"><button class="btn btn-default btn-block btn-danger" id="sendContact" type="submit" name="submit" value="submit"><?php echo lang('submit_btn'); ?></button></div>
                            <?php echo form_close(); ?>
                        </div>                                                
            		</div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>public/front/assets/js/custom/home_js/home_js.js"></script>
    <script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.validate.min.js"></script>