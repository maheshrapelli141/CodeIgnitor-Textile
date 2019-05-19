<div class="container form-container" style="height: 1400px"><br>
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
    <label for="name">Name :</label>
    <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required autofocus>
    <label for="price">Bag Size :</label>
    <input type="text" name="bagsize" class="form-control" value="<?php echo set_value('bagsize'); ?>" required><br>
    <label for="price">Bag Strap :</label>
    <input type="text" name="bagstrap" class="form-control" value="<?php echo set_value('bagstrap'); ?>" ><br>
    <label for="price">Bag Shape :</label>
    <input type="text" name="bagshape" class="form-control" value="<?php echo set_value('bagshape'); ?>" ><br>
    <label for="price">Weight Capacity :</label>
    <input type="text" name="weightcapacity" class="form-control" value="<?php echo set_value('weightcapacity'); ?>" ><br>
    <label for="price">Strength :</label>
    <input type="text" name="strength" class="form-control" value="<?php echo set_value('strength'); ?>" ><br>
    <label for="price">Bag Color :</label>
    <input type="text" name="bagcolor" class="form-control" value="<?php echo set_value('bagcolor'); ?>"><br>
    <label for="price">Wash :</label>
    <input type="text" name="wash" class="form-control" value="<?php echo set_value('wash'); ?>" ><br>
    <label for="price">Inner Stitches :</label>
    <input type="text" name="innerstitches" class="form-control" value="<?php echo set_value('innerstitches'); ?>" ><br>
    <label for="price">Printing Bags :</label>
    <input type="text" name="printingbags" class="form-control" value="<?php echo set_value('printingbags'); ?>" ><br>
    <label for="description">Description :</label>
    <textarea name="description" class="form-control" value="<?php echo set_value('description'); ?>" ></textarea><br>
    <button type="submit" class="btn btn-primary">Next</button>
</form>    
</div>
</div>