<div class="container form-container">
    <div class="form-box">

    <?php if(isset($error) && $error!=""){
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
     ?>
    <?php
    $formURL = base_url('index.php/admin/login');
    echo form_open($formURL); ?>
    <label for="username">Username :</label>
    <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required>
    <label for="password">Password :</label>
    <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required><br>
    <button type="submit" class="btn btn-primary">Login</button>
</form>    
</div>
</div>