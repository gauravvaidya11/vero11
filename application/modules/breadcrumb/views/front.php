<div class="brd-cm-row">
    <h3 class="small-title "><?php if(isset($title)) { echo $title; } ?></h3>
	<ul>
		<?php 
	    if(isset($breadcrumb)){
	    	$i = 0;
	    	$limit = count($breadcrumb);
	    	foreach ($breadcrumb as $key => $value) {
	    		$i++;
	    		$url = ($value == '')?'javascript:void(0);': base_url().$value;
	    		if($i == 1){
	    			echo '<li><i class="fa fa-home"></i>
	        				<a href="'.$url.'">'.$key.'</a>
	        			 </li>';
	    		}else{
	    			echo '<li><i class="fa"></i>
	 						<a href="'.$url.'">'.$key.'</a>';
	        		echo '</li>';
	    		}
	    	}
	    }

	    ?>
	</ul>
</div>

<?php echo Modules::run('alert_message/front'); ?>