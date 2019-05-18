<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="custom-container">
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="./assets/img/slide1.jpg" style="width:100%;height:400px;" class="slider-img">
            <!--<div class="text">Caption Text</div>-->
        </div>

        <div class="mySlides fade">
            <img src="./assets/img/slide2.jpeg" style="width:100%;height:400px;" class="slider-img">
            <!--<div class="text">Caption Two</div>-->
        </div>

        <div class="mySlides fade">
            <img src="./assets/img/slide3.jpg" style="width:100%;height:400px;" class="slider-img">
            <!--<div class="text">Caption Three</div>-->
        </div>

    </div>

    <div style="text-align:center;" class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>
<div class="container" style="min-height:auto;">
    <br><br><br>
    <div class="row">
        <div class="col-sm-8 cell-padding">
            <h2 align="center">Rohit Textile</h2>
            <p style="text-align:justify;">Rohit Textiles is a young company based in Bhiwandi, Thane District of Maharashtra which is a Industrial
                Belt comprising one of India’s biggest yarn manufacturer’s. Bhiwandi has emerged has the most favored
                manufacturing, Warehousing, Transportation destination for all the leading brands and companies with
                access to the Nhava Sheva Port and Rail connectivity across the country.
                Rohit Textiles has been making polyester yarn (inhouse facility of 50000 sq feet).Rohit Textiles has now
                diversified into making Cotton Carry Bags for the Domestic and Export Market.
                Rohit Textiles foresees quantum growth in the carry bag market due to the ban on plastic bags across
                the country. We have established strong inhouse manufacturing facility for exclusively making carry
                bags. </p>
        </div>
        <div class="col-sm-4 cell-padding">
            <img src="./assets/img/side-image.jpeg" style="height:auto;width:100%;">
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
</script>
