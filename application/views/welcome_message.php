<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="custom-container">
	<div class="slideshow-container">

		<div class="mySlides fade">
			<img src="./assets/img/slide1.jpg" style="width:100%;height:350px;" class="slider-img">
			<div class="text">Caption Text</div>
			</div>

			<div class="mySlides fade">
			<img src="./assets/img/slide2.jpeg" style="width:100%;height:350px;" class="slider-img">
			<div class="text">Caption Two</div>
			</div>

			<div class="mySlides fade">
			<img src="./assets/img/slide3.jpg" style="width:100%;height:350px;" class="slider-img">
			<div class="text">Caption Three</div>
		</div>

	</div>

	<div style="text-align:center;" class="dots">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-8 cell-padding">
			<h2 align="center">Rahul Textile</h2>
			<p style="text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis ipsum elementum scelerisque laoreet. Nam hendrerit, tortor a dapibus blandit, metus arcu aliquet arcu, vitae commodo justo odio ut dui. Aliquam eleifend, mauris vel vulputate egestas, metus nisi efficitur ante, at sodales ipsum magna at sem. Duis ut condimentum diam. Morbi at accumsan mi, sit amet maximus turpis. In ac feugiat elit, at mollis nisi. Curabitur consequat lectus felis, vitae iaculis ex semper id. Quisque finibus consectetur malesuada. Aliquam id lobortis velit, aliquam consequat nunc. Duis sit amet erat et massa rutrum sodales. Nulla id suscipit massa. </p>
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
