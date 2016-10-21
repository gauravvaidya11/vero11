<div class="row">
    <div class="col-md-6 col-sm-offset-3">
        <?php
        /*======================================================
        *start show alert! This alert message is use for show alert
        */
        if ($this->session->flashdata('success_show')) {
            echo '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
			<strong>Success!</strong> ' . $this->session->flashdata('success_show') . '
		  </div>';
        }
        else if ($this->session->flashdata('info_show')) {
            echo '<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
			<strong>Info!</strong> ' . $this->session->flashdata('info_show') . '
		  </div>';
        }
        else if ($this->session->flashdata('warning_show')) {
            echo '<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
			<strong>Warning!</strong> ' . $this->session->flashdata('warning_show') . '
		  </div>';
        }
        else if ($this->session->flashdata('error_show')) {
            echo '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
			<strong>Error!</strong> ' . $this->session->flashdata('error_show') . '
		  </div>';
        }
        /*======================================================
        *End show alert 
        */



        /*======================================================
        *start hide alert! This alert message is use for autohide alert
        */
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success hideauto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
            <strong>Success!</strong> ' . $this->session->flashdata('success') . '
          </div>';
        }
        else if ($this->session->flashdata('info')) {
            echo '<div class="alert alert-info hideauto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
            <strong>Info!</strong> ' . $this->session->flashdata('info') . '
          </div>';
        }
        else if ($this->session->flashdata('warning')) {
            echo '<div class="alert alert-warning hideauto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
            <strong>Warning!</strong> ' . $this->session->flashdata('warning') . '
          </div>';
        }
        else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger hideauto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
            <strong>Error!</strong> ' . $this->session->flashdata('error') . '
          </div>';
        }
        /*======================================================
        *End hide alert 
        */

        if (validation_errors()) {
            echo '<div class="alert alert-danger hideauto">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                <strong>Error!</strong> ' . validation_errors() . '
              </div>';
        }
        ?>
        <div id="common_msg_js"></div>
    </div>
</div>