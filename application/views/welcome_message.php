<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="custom-container">
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="./assets/img/slide1.jpg" class="slider-img">
            <!--<div class="text">Caption Text</div>-->
        </div>

        <div class="mySlides fade">
            <img src="./assets/img/slide2.jpeg" class="slider-img">
            <!--<div class="text">Caption Two</div>-->
        </div>

        <div class="mySlides fade">
            <img src="./assets/img/slide3.jpg" class="slider-img">
            <!--<div class="text">Caption Three</div>-->
        </div>

    </div>

    <div style="text-align:center;" class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>
<!--<div class="container" style="min-height:auto;">-->
<!--    <br><br><br>-->
<!--    <div class="row">-->
<!--        <div class="col-sm-8 cell-padding">-->
<!--            <h2 align="center">Rohit Textile</h2>-->
<!--            <p style="text-align:justify;">Rohit Textiles is a young company based in Bhiwandi, Thane District of Maharashtra which is a Industrial-->
<!--                Belt comprising one of India’s biggest yarn manufacturer’s. Bhiwandi has emerged has the most favored-->
<!--                manufacturing, Warehousing, Transportation destination for all the leading brands and companies with-->
<!--                access to the Nhava Sheva Port and Rail connectivity across the country.-->
<!--                Rohit Textiles has been making polyester yarn (inhouse facility of 50000 sq feet).Rohit Textiles has now-->
<!--                diversified into making Cotton Carry Bags for the Domestic and Export Market.-->
<!--                Rohit Textiles foresees quantum growth in the carry bag market due to the ban on plastic bags across-->
<!--                the country. We have established strong inhouse manufacturing facility for exclusively making carry-->
<!--                bags. </p>-->
<!--        </div>-->
<!--        <div class="col-sm-4 cell-padding">-->
<!--            <img src="./assets/img/side-image.jpeg" style="height:auto;width:100%;">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container about-section">
    <h2>Who we are ? </h2><hr>
    <p>Rohit Textiles is a young company based in Bhiwandi, Thane District of Maharashtra which is a Industrial
    Belt comprising one of India’s biggest yarn manufacturer’s. Bhiwandi has emerged has the most favored
    manufacturing, Warehousing, Transportation destination for all the leading brands and companies with
    access to the Nhava Sheva Port and Rail connectivity across the country.
    Rohit Textiles has been making polyester yarn (inhouse facility of 50000 sq feet).Rohit Textiles has now
    diversified into making Cotton Carry Bags for the Domestic and Export Market.
    Rohit Textiles foresees quantum growth in the carry bag market due to the ban on plastic bags across
    the country. We have established strong inhouse manufacturing facility for exclusively making carry
    bags.</p>
        </div>
<div class="container product-section">
    <h2 align="center">Our Products </h2><hr><br><br><br>
    <div class="row">
        <?php
        if(isset($error) && $error!=""){
            echo '<h3>$error</h3>';
        } else {
            $i=0;
            foreach ($products as $product){
                if ($i == 4) {
                    break;
                }
                ?>
                <div class="product-card col-sm-6 col-md-4 col-lg-3">
                    <?php $url = "/index.php/products/product/" . $product['product_id']; ?>
                    <a href="<?php echo base_url($url); ?>">
                        <div class="card-inner">
                            <img src="<?php echo base_url($product['image']); ?>" class="product-image">
                            <p class="product-name"><?php echo $product['name']; ?></p>
                            <p><!--<i class="fas fa-rupee-sign"></i>-->Size
                                    : <?php echo $product['bag_size']; ?></p>
                        </div>
                    </a>
                </div>
                <?php
                $i++;
            }
            echo "<a class='btn btn-primary btn-sm' href=" . base_url('index.php/products') . " style='float:right;'>Show more</a>";
        }
        ?>
    </div>
</div>
<div class="testimonials-section">
    <div class="container">
    <h2>Our Customers say's </h2><hr>
       <div class="show-testimonial">
           <h3 id="client">Pawan Kumbhar</h3><hr>
           <h5 id="testimonial">Nice Product</h5>
       </div>
        <div class="show-testimonial">
            <h3 id="client">Ravi Gaini</h3><hr>
            <h5 id="testimonial">Excellent customer service</h5>
        </div>
        <div class="show-testimonial">
            <h3 id="client">Mahesh Rapelli</h3><hr>
            <h5 id="testimonial">Excellent quality</h5>
        </div>
    </div>
</div>
        <script>
            var slideIndex = 0;
            showSlides();

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }
            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 5000); // Change image every 2 seconds
            }

            var elementIndex = 0;
            function testimonialSlider() {
                var elements = document.getElementsByClassName('show-testimonial');
                for (var i = 0; i < elements.length; i++) {
                    elements[i].style.display = "none";
                }
                if(elementIndex>2){ elementIndex = 0;}
                elements[elementIndex].style.display = "block";
                console.log(elementIndex);
                elementIndex++;
            }

            setInterval(testimonialSlider,2000);
        </script>
