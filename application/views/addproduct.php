<div class="container form-container">
    <div class="form-box">

    <?php 
    if(isset($_POST['username'])){
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.validation_errors().'
      </div>';
    }
    if(isset($flag)){
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$flag.'
      </div>';
    }
     ?>
    <?php
    $formURL = base_url('index.php/products/add');
    echo form_open_multipart($formURL); ?>
    <label for="username">Name :</label>
    <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
    <label for="password">Price :</label>
    <input type="number" name="price" class="form-control" value="<?php echo set_value('price'); ?>" required><br>
    <label for="description">Description :</label>
    <textarea name="description" class="form-control" value="<?php echo set_value('description'); ?>" required></textarea><br>
    <label for="image">Image :</label>
    <input type="file" name="image" class="form-control" value="<?php echo set_value('image'); ?>" required><br>
    <button type="submit" class="btn btn-primary">Login</button>
</form>    
</div>
</div>