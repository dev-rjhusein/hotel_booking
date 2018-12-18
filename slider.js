$(document).ready(function(){
// variables
var currentPosition = 0;
var slides = $('.slide');
var numberOfSlides = slides.length;
var speed = 3000;
var slideShowInterval = setInterval(changePosition, speed);
slides.wrapAll('<div id="dynamicWindow"></div>')
$('#dynamicWindow').css('width','300%');
function changePosition() {
if (currentPosition == numberOfSlides - 1)
{ currentPosition = 0; }
else { currentPosition++; }
moveSlide();
}
function moveSlide() {
jQuery('#dynamicWindow').animate({'marginLeft':
	(-currentPosition)*100+'%'});
}
});
