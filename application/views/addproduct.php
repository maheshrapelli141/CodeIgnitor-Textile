<div class="container form-container"><br>
    <h2>Add Product : </h2><hr>
    <div class="form-box" style="top: 50%">

    <?php 
    if(isset($_POST['name'])){
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.validation_errors().'
      </div>';
    }
    if(isset($flag) && $flag!=""){
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$flag.'
      </div>';
    }
     ?>
    <?php
    $formURL = base_url('index.php/products/add');
    echo form_open($formURL); ?>
    <label for="username">Name :</label>
    <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
    <label for="password">Price :</label>
    <input type="number" name="price" class="form-control" value="<?php echo set_value('price'); ?>" required><br>
    <label for="description">Description :</label>
    <textarea name="description" class="form-control" value="<?php echo set_value('description'); ?>" required></textarea><br>
    <button type="submit" class="btn btn-primary">Next</button>
</form>    
</div>
</div>