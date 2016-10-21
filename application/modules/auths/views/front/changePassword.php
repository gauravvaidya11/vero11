<div class="content">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">

        <?php $attributes = array('name' => "login"); ?>
        <?php echo form_open('changePassword', $attributes); ?>
        <?php if(isset($message)) { echo $message;} ?>
        <h3>Reset Password</h3>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Old password</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Old Password" name="old_password"/>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="New Password" name="newpass"/>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
                </div>
            </div>
        </div>
              

       <div class="form-actions">
            
            <input type="submit" id="register-submit-btn" name="reset" value="Submit" class="btn green pull-right">
            <i class="m-icon-swapright m-icon-white"></i>
        </div>           
        </form>
        <div class="col-lg-5"></div>
    </div>
