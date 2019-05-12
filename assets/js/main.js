$(document).ready(function(){
$('.edit-profile').click(function(){
    $('.dropdown-data').toggle();
});
$('input').focus(function(){
    $('.form-box').css({"box-shadow":"0px 0px 10px #000000","transition":".3s"});
});
$('input').focusout(function(){
    $('.form-box').css({"box-shadow":"0px 0px 0px #000000","transition":".3s"});
});
$('textarea').focus(function(){
    $('.form-box').css({"box-shadow":"0px 0px 10px #000000","transition":".3s"});
});
$('textarea').focusout(function(){
    $('.form-box').css({"box-shadow":"0px 0px 0px #000000","transition":".3s"});
});
$('.side-nav-btn').click(function () {
    $('.side-navbar').show();
    $('.container').css({'width':'70%','margin-left':'30%','margin-top':'80px'});
    $('nav').css({'position':'fixed','top':'0','width':'100%'});
});
$('.side-nav-times').click(function () {
    $('.side-navbar').hide();
    $('.container').css({'width':'100%','margin-left':'auto','margin-top':'0px'});
    $('nav').css({'position':'relative'});
});
});