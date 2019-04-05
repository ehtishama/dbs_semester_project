var slider = document.getElementById('home_slider');
var slides = document.getElementsByClassName('slide');
var totalSlides = slides.length

var currentIndex = 0
var prevIndex = 0

function nextSlide()
{
	prevIndex = currentIndex;
	currentIndex++;

	currentIndex = currentIndex % totalSlides;

	showSlide();
}
function prevSlide()
{
	prevIndex = currentIndex;
	currentIndex--;
	currentIndex < 0 ? currentIndex = totalSlides : currentIndex;

	currentIndex = currentIndex % totalSlides;

	showSlide();
}

function showSlide()
{
	slides[prevIndex].style.display = 'none';
	slides[currentIndex].style.display = 'block';
}
showSlide();

setInterval(nextSlide, 5000);
