/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

const accordionActive = (clicked_id) => {
	document
		.getElementById("accordion-answer-" + clicked_id)
		.classList.toggle("hidden");
	document.getElementById(clicked_id).classList.toggle("after:-rotate-180");
};

let prevScroll = window.scrollY || document.documentElement.scrollTop;
let curScroll;
let direction = 0;
let prevDirection = 0;

const wrapper = document.getElementById("hamburger-wrapper");
wrapper.addEventListener("click", () => {
	wrapper.classList.toggle("open");
});

// Navigation toggle
window.addEventListener("load", function () {
	const main_navigation = document.querySelector("#primary-nav");
	const body = document.querySelector("body");
	document
		.querySelector("#primary-menu-toggle")
		.addEventListener("click", function (e) {
			e.preventDefault();
			/* main_navigation.classList.toggle("hidden"); */
			main_navigation.classList.toggle("translate-x-full");
			body.classList.toggle("overflow-hidden");
		});
});

//Import headerConfigs from wp.
const reduceLogo = (scrollPos) => {
	const logo = document.querySelector(".custom-logo");
	// Do something with the scroll position
	if (scrollPos > 80) {
		logo.classList.add("h-10");
	} else {
		logo.classList.remove("h-10");
	}
};

const checkScroll = () => {
	let lastKnownScrollPosition = 0;
	let ticking = false;
	lastKnownScrollPosition = window.scrollY;

	if (!ticking) {
		window.requestAnimationFrame(function () {
			reduceLogo(lastKnownScrollPosition);
			ticking = false;
		});

		ticking = true;
	}

	//Find the direction of scroll:
	//0 - initial, 1 - up, 2 - down

	curScroll = window.scrollY || document.documentElement.scrollTop;
	if (curScroll > prevScroll) {
		//scrolled up
		direction = 2;
	} else if (curScroll < prevScroll) {
		//scrolled down
		direction = 1;
	}

	if (direction !== prevDirection) {
		toggleHeader(direction, curScroll);
	}
	/* if(curScroll <= 0 && headerConfigs.isTransperant) {
		header.classList.add('transparent');
	  } */

	prevScroll = curScroll;
};
const toggleHeader = (direction, curScroll) => {
	const header = document.getElementById("masthead");

	if (direction === 2 && curScroll > 500) {
		//replace 80 with the height of your header in px

		header.classList.add("-translate-y-full");
		/* header.classList.remove('transparent'); */

		prevDirection = direction;
	} else if (direction === 1) {
		header.classList.remove("-translate-y-full");
		prevDirection = direction;
	}
};

window.addEventListener("scroll", checkScroll);

// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
/* window.onscroll =
	("load",
	function () {
		let logo = document.querySelector(".custom-logo");
		if (
			document.body.scrollTop > 80 ||
			document.documentElement.scrollTop > 80
		) {
			logo.classList.add("h-10");
		} else {
			logo.classList.remove("h-10");
		}
	}); */

/* BLOCKS .js */
import "../theme/template-parts/blocks/blocks";
