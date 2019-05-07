<div class="container form-container"><br>
    <h2>Edit Product : </h2><hr>
    <div class="row">
        <div class="col-sm-6">
            <div style="width: 100%;min-width: 300px;">
                <?php if(isset($error) && $error!=""){
                    echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$error.'
      </div>';
                }
                ?>
                <?php if(validation_errors()!=""){
                    echo  '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.validation_errors().'
      </div>';
                }
                if($this->session->flashdata('product_image_message')!="" OR $this->session->flashdata('product_image_message')!=NULL){
                    echo '<div class="alert alert-dismissible alert-primary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$this->session->flashdata('product_image_message').'
      </div>';
                }
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo base_url($product['image']); ?>" height="auto" width="100%" style="min-width: 300px;">
                        <?php
                        $formURL = base_url('index.php/products/updatefirstimage');
                        echo form_open_multipart($formURL); ?>
                        <label for="image"><b>Upload Image 1 : </b></label>
                        <input type="file" name="userfile"  class="form-control">
                        <input type="text" name="product_id" value="<?php echo $product['product_id'];?>" style="visibility: hidden;"><br><br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <img src="<?php echo base_url($product['sec_image']); ?>" height="auto" width="100%" style="min-width: 300px;"><?php
                        $formURL = base_url('index.php/products/updatesecondimage');
                        echo form_open_multipart($formURL); ?>
                        <label for="image"><b>Upload Image 2 : </b></label>
                        <input type="file" name="userfile"  class="form-control">
                        <input type="text" name="product_id" value="<?php echo $product['product_id'];?>" style="visibility: hidden;"><br><br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6"><br><br>
            <div class="form-box" style="position: relative;width: 80%;height: auto;">

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
                if($this->session->flashdata('product_details_message')!="" OR $this->session->flashdata('product_details_message')!=NULL){
                    echo '<div class="alert alert-dismissible alert-primary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$this->session->flashdata('product_details_message').'
      </div>';
                }
                ?>
                <?php
                $formURL = base_url('index.php/products/updateproduct');
                echo form_open($formURL); ?>
                <input type="text" name="product_id" value="<?php echo $product['product_id']; ?>" style="visibility: hidden;"><br>
                <label for="username">Name :</label>
                <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
                <label for="price">Price :</label>
                <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>" required><br>
                <label for="description">Description :</label>
                <textarea name="description" class="form-control"  required><?php echo $product['description']; ?></textarea><br>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div></div>