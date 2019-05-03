<style>
    .product-image-box{
        height: 300px;
        width: 300px;
        margin-top: 16px;
        border: 1px solid #eeeeee;
    }
    .pi-form {
        margin-top: 20px;
        text-align: left;
        width: 300px;
    }
</style>
<div class="container">
    <div  align="center">
        <div class="product-image-box">
            <img src="<?php echo base_url($product['image']); ?>" height="300px" width="300px">
        </div>
    <div class="pi-form">
        <?php if(isset($error) && $error!=""){
            echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$error.'
      </div>';
        }
        ?>
        <?php if(isset($_POST['userfile'])){
            echo  '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.validation_errors().'
      </div>';
        } ?>

        <?php
        $formURL = base_url('index.php/products/addimage');
        echo form_open_multipart($formURL); ?>
            <label for="image"><b>Upload Image : </b></label>
            <input type="file" name="userfile"  class="form-control">
            <input type="text" name="product_id" value="<?php echo $product['product_id']; ?>" style="visibility: hidden;"><br>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    </div>
</div>