$(document).ready(function()
{
$('div.SliderInner > img:not(#first)').fadeOut(1); // fade out all except the first slide
var num = 1;

setInterval(function() // set an interval to change to slideshow
{
var currentImg = $('.active');
                var nextImg = currentImg.next();

                if(nextImg.length == 0)
                {

                        nextImg = $('#first');
                        $('#botton1');
                        num = 0;
                }

                num++;
                $('#slideNum').text(num);
                currentImg.removeClass('active').fadeOut("slow");
                nextImg.addClass('active').fadeIn("slow");

}, 7000); // this is the interval (in miliseconds) between automatic slide transitions

$('.next').on('click', function()
{
var currentImg = $('.active');
var nextImg = currentImg.next();
if(nextImg.length == 0)
{
nextImg = $('#first');
$('#botton1');
num = 0;
}
num++;
$('#slideNum').text(num);
currentImg.removeClass('active').fadeOut("slow");
nextImg.addClass('active').fadeIn("slow");
});

$('.prev').on('click', function()
        {
                var currentImg = $('.active');
                var prevImg = currentImg.prev();
if(prevImg.length == 0)
{
prevImg = $('#last');
num = 4;
}

num--;
                $('#slideNum').text(num);

currentImg.removeClass('active').fadeOut("slow");
                prevImg.addClass('active').fadeIn("slow");
        });
});