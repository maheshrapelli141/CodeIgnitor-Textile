<?php
?><br>
<div class="container">
    <h2>Products : </h2><hr>
    <a class="btn btn-primary" href="<?php echo base_url('index.php/products/addproduct')?>">Add</a><br><br>
    <?php
    if(isset($emptydata) && $emptydata!=""){
        echo '<h3>No products uploaded yet!</h3>';
    }
    else {
        if($this->session->flashdata('delete_message')!="" OR $this->session->flashdata('delete_message')!=NULL){
            echo '<div class="alert alert-dismissible alert-primary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        '.$this->session->flashdata('delete_message').'
      </div>';
        }
        ?>
        <table class="table table-bordered">
            <thead>
            <th>Sr.no</th>
            <th>Image</th>
            <th>Name</th>
            <th>Edit / Delete</th>
            </thead>
            <?php
            $i=1;
            foreach ($products as $product):
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <img src="<?php echo base_url($product['image']); ?>" height="64px" width="64px">
                        <img src="<?php echo base_url($product['sec_image']); ?>" height="64px" width="64px">
                    </td>
                    <td><?php echo $product['name']; ?></td>
                    <td>
                        <a href="<?php echo base_url("/index.php/products/updateproduct/".$product['product_id']); ?>" onclick="return confirm('Are you sure to edit');">
                            <span class="badge badge-warning">Edit</span>
                        </a> /
                        <a href="<?php echo base_url("/index.php/products/deleteproduct/".$product['product_id']); ?>" onclick="return confirm('Are you sure to delete');">
                            <span class="badge badge-danger">Delete</span>
                        </a>
                    </td>
                </tr>
                <?php
                $i++;
            endforeach; ?>
        </table>
    <?php } ?>
</div>