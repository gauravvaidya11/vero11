<script>
    jQuery(function () {
        jQuery('.showSingle').click(function () {
            jQuery('.targetDiv').hide();
            jQuery('#div' + $(this).attr('target')).show();
	            // jQuery.post(BASE_URL+"athlete/setTab",{name: csrf_name, value: csrf_token, tab_id: $(this).attr('target')},function(data){
	            // 	console.log(data);
	            // });
	            var tabId = $(this).attr('target');
	            //console.log(tabId);
	          
	     	jQuery.ajax({
		        url: BASE_URL + 'athlete/setTab',
		        type: 'POST',
		        data: [{name: csrf_name, value: csrf_token }, {name: 'tab_id', value: tabId}],
		        dataType: 'json',
		        success: function(data) {
		           // console.log(data);
		        }
    		});
        });
    });
</script>

<script src="<?php echo BASE_URL; ?>public/front/assets/js/anchorHoverEffect.js"></script> 

<script>
    $(".demo-3").anchorHoverEffect({type: 'flip'});
</script>


<div id="loading">
    <center>
        <img id="loading-image" src="<?php echo BASE_URL ?>public/front/assets/images/ajax-loader.gif" alt="Loading..." />
        <!-- <p>Loading...</p> -->
    </center>
</div>
<footer>
	<div class="container">
       <div class="leftFtr">
           <div class="ftrLnks">
             <ul>     
                <li><a href=""> <?php echo lang('about_us'); ?></a></li>
                <li><a href=""> <?php echo lang('matches'); ?> </a></li>
                <li><a href=""> <?php echo lang('followers'); ?></a></li>
                <li><a href=""><?php echo lang('common_contact_us'); ?></a></li>
            </ul>
        </div>
        <div class="ftrFlwUs">
           <h5> <?php echo lang('follow_us'); ?></h5>
           <ul>
               <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
               <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
               <li><a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
               <li><a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
           </ul>
       </div>
   </div>
   <div class="rghtFtr">
       <p><a href=""><?php echo lang('sport_boot_club'); ?></a><?php echo lang('all_rights_reserved'); ?></p>
       <ul>
           <li><a href=""><?php echo lang('terms_of_use'); ?></a></li>
           <li><a href=""><?php echo lang('privacy_policy'); ?></a></li>
       </ul>
   </div>
</div>
</footer>
<!--footer--> 
<?php echo put_footers(); ?>
<!-- .asterisk {
  color:red;
} -->

<style>
  #loading {width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: block;opacity: 0.8;background-color: #fff;z-index: 9999;text-align: center;display: none;}
  #loading-image {position: absolute;top: 40%;left: 43%;z-index: 100;}
  #loading p {
      left: 50%;
      position: absolute;
      top: 60%;
      z-index: 100;
  }

</style>