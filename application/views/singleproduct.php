<style>
    .images ul{
        margin-top: 20px;
        padding: 0px;
        text-align: center;
    }
    .images ul li {
        display: inline;
        height: 80px;
        width: 80px;
        margin: 10px;
    }
    .images li img {
        height: 78px;
        width: 78px;
        border: 1px solid #ffffff;
        box-shadow: 0px 0px 5px #000000;
    }
    .sp-image {
        height: 400px;
        width: auto;
        padding: 5%;
    }
    @media only screen and (max-width: 640px) {
        .sp-image {
            width: 100%;
            height: auto;
        }
    }
</style>
<div class="container"><br><br>
    <div class="row">
        <div class="col-sm-6">
            <img src="#" class="sp-image" id="sp-image">
            <div class="images">
                <ul type="none">
                    <li onclick="showImage(0)"><img id="image1" src="<?php echo base_url($product['image']); ?>"></li>
                    <li onclick="showImage(1)"><img id="image2" src="<?php echo base_url($product['sec_image']); ?>"></li>
                    <li onclick="showImage(2)"><img id="image3" src="<?php echo base_url($product['third_image']); ?>"></li>
                    <li onclick="showImage(3)"><img id="image4" src="<?php echo base_url($product['fourth_image']); ?>"></li>
                    <li onclick="showImage(4)"><img id="image5" src="<?php echo base_url($product['fifth_image']); ?>"></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <h2 class="sp-name"><?php echo $product['name'] ?></h2>
            <hr>
            <?php if(isset($product['bag_size']) && !empty($product['bag_size'])){ ?>
            <b>Size : </b><?php echo $product['bag_size']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['bag_strap']) && !empty($product['bag_strap'])){ ?>
                <b>Strap : </b><?php echo $product['bag_strap']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['bag_shape']) && !empty($product['bag_shape'])){ ?>
                <b>Shape : </b><?php echo $product['bag_shape']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['weight_capacity']) && !empty($product['weight_capacity'])){ ?>
                <b>Weight capacity : </b><?php echo $product['weight_capacity']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['strength']) && !empty($product['strength'])){ ?>
                <b>Strength : </b><?php echo $product['strength']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['bag_color']) && !empty($product['bag_color'])){ ?>
                <b>Color : </b><?php echo $product['bag_color']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['wash']) && !empty($product['wash'])){ ?>
                <b>Wash : </b><?php echo $product['wash']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['inner_stitches']) && !empty($product['inner_stitches'])){ ?>
                <b>Inner stitches : </b><?php echo $product['inner_stitches']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['printing_bags']) && !empty($product['printing_bags'])){ ?>
                <b>Printing bags : </b><?php echo $product['printing_bags']; ?><br><br>
            <?php } ?>
            <?php if(isset($product['description']) && !empty($product['description'])){ ?>
                <b>Description : </b><?php echo $product['description']; ?><br><br>
            <?php } ?>
<!--            <p class="sp-desc"><strong>Description : </strong>--><?php //echo $product['description']; ?><!--</p>-->
        </div>
    </div>
</div>

<script>
    var images = new Array();
    images[0] = '<?php echo base_url($product['image']); ?>';
    images[1] = '<?php echo base_url($product['sec_image']); ?>';
    images[2] = '<?php echo base_url($product['third_image']); ?>';
    images[3] = '<?php echo base_url($product['fourth_image']); ?>';
    images[4] = '<?php echo base_url($product['fifth_image']); ?>';

    for(var i=0;i<images.length;i++){
        var imageElement = document.getElementById("image"+(i+1));
        if(images[i].includes("./assets/img/no_image_available.png") || images[i]=="http://rohittextiles.com/"){
            images[i] = '#';
            imageElement.style.display = 'none';
        }
        imageElement.src = images[i];
    }

    function showImage(i) {
        document.getElementById('sp-image').src = images[i];
    }

    showImage(0);
</script>