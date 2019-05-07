<div class="container form-container"><br>
    <h2>Change Password </h2><hr>
    <div class="form-box" style="top: 55%;">

        <?php
        if(isset($error) && $error!=""){
            echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$error.'
      </div>';
        }
        else if(isset($_POST['username'])){
            echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.validation_errors().'
      </div>';
        }
        else {}
        if($this->session->flashdata('update_password_message')!="" && $this->session->flashdata('update_password_message')!=NULL){
            echo '<div class="alert alert-dismissible alert-primary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$this->session->flashdata('update_password_message').'
      </div>';
        }
        ?>
        <?php
        $formURL = base_url('index.php/admin/changepassword');
        echo form_open($formURL); ?>
        <label for="oldpassword">Old password :</label>
        <input type="password" name="oldpassword" class="form-control" value="<?php echo set_value('oldpassword'); ?>" required>
        <label for="password">New Password :</label>
        <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required><br>
        <label for="confirmpassword">Confirm Password :</label>
        <input type="password" name="confirmpassword" class="form-control" value="<?php echo set_value('confirmpassword'); ?>" required><br>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>