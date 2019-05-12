<div class="container products-container">
    <br>
    <h2>Products : </h2><hr>
    <div class="row">
    <?php foreach($products as $product): ?>
    <div class="product-card col-sm-3">
        <?php $url = "/index.php/products/product/".$product['product_id']; ?>
    <a href="<?php echo base_url($url); ?>">
        <div class="card-inner">
            <img src="<?php echo base_url($product['image']); ?>" class="product-image">
            <h4 class="product-name"><?php echo $product['name']; ?></h4>
            <p><strong><i class="fas fa-rupee-sign"></i> <?php echo $product['price']; ?></strong></p>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>
</div>

