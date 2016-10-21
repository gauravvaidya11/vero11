<?php 
if($this->session->flashdata('success')){
	echo '<div class="alert alert-success hideauto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<strong>Success!</strong> '.$this->session->flashdata('success').'
		  </div>';
}else if($this->session->flashdata('info')){
	echo '<div class="alert alert-info hideauto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<strong>Info!</strong> '.$this->session->flashdata('info').'
		  </div>';
}else if($this->session->flashdata('warning')){
	echo '<div class="alert alert-warning hideauto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<strong>Warning!</strong> '.$this->session->flashdata('warning').'
		  </div>';
}else if($this->session->flashdata('error')){
	echo '<div class="alert alert-danger hideauto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<strong>Error!</strong> '.$this->session->flashdata('error').'
		  </div>';
}
if(validation_errors()){
        echo '<div class="alert alert-danger hideauto">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Error!</strong> '.validation_errors().'
              </div>';
}
?>
<div class="comm-message"></div>