<div class="container"><br><br>
    <div class="row">
        <div class="col-sm-6">
            <img src="<?php echo base_url($product['image']); ?>" class="sp-image">
        </div>
        <div class="col-sm-6">
            <h2 class="sp-name"><?php echo $product['name'] ?></h2>
            <hr>
            <b>Price : </b><?php echo $product['price']; ?><br><br> 
            <p class="sp-desc"><strong>Description : </strong><?php echo $product['description']; ?></p>
        </div>
    </div>
</div>