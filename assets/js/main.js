$(document).ready(function(){
$('input').focus(function(){
    $('.form-box').css({"box-shadow":"0px 0px 10px #000000","transition":".3s"});
});
$('input').focusout(function(){
    $('.form-box').css({"box-shadow":"0px 0px 0px #000000","transition":".3s"});
});
})