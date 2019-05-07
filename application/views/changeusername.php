<div class="container form-container"><br>
    <h2>Change Username </h2><hr>
    <div class="form-box" style="top: 50%;">

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
        if($this->session->flashdata('update_username_message')!="" && $this->session->flashdata('update_username_message')!=NULL){
            echo '<div class="alert alert-dismissible alert-primary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$this->session->flashdata('update_username_message').'
      </div>';
        }
        ?>
        <?php
        $formURL = base_url('index.php/admin/changeusername');
        echo form_open($formURL); ?>
        <label for="password">Old password :</label>
        <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required>
        <label for="username">New Username :</label>
        <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required><br>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>