<ul class="page-breadcrumb breadcrumb">
   <!--  <li class="btn-group">
        <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            <span>
                Actions
            </span>
            <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>
                <a href="#">
                    Action
                </a>
            </li>
            <li>
                <a href="#">
                    Another action
                </a>
            </li>
            <li>
                <a href="#">
                    Something else here
                </a>
            </li>
            <li class="divider">
            </li>
            <li>
                <a href="#">
                    Separated link
                </a>
            </li>
        </ul>
    </li> -->
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
        				<i class="fa fa-angle-right"></i></li>';
    		}else{
    			echo '<li><i class="fa"></i>
 						<a href="'.$url.'">'.$key.'</a>';
 						if($i < $limit){
 							echo '<i class="fa fa-angle-right"></i>';
 						}
        				
        		echo '</li>';
    		}
    	}
    }

    ?>
</ul>

 <?php echo Modules::run('alert_message/admin'); ?>