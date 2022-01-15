$(document).ready(function(){
	var scroll = new SmoothScroll('a[href*="#section-"]', {
		speed: 2000,
		speedAsDuration: true,
		offset : 80
	})
});


const sections = document.querySelectorAll('section');
const navLi = document.querySelectorAll('.container .collapse .navbar-nav a');

window.addEventListener('scroll', () => {
	let current = '';
	sections.forEach(section => {
		const sectionTop = section.offsetTop;
		const sectionHeight = section.clientHeight;
		if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
			current = section.getAttribute('id');
		}
	})
	navLi.forEach(a => {
		a.classList.remove('active');
		if (a.classList.contains(current)) {
			a.classList.add('active')
		}
	})
})

$(document).ready(function(){
	$('.slider').slick({
		autoplay : true,
		autoplayspeed: 500
	})
});


