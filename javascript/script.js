/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

const wrapper = document.getElementById("hamburger-wrapper");

wrapper.addEventListener("click", () => {
	wrapper.classList.toggle("open");
});

// Navigation toggle
window.addEventListener("load", function () {
	let main_navigation = document.querySelector("#primary-nav");
	let body = document.querySelector("body");
	document
		.querySelector("#primary-menu-toggle")
		.addEventListener("click", function (e) {
			e.preventDefault();
			/* main_navigation.classList.toggle("hidden"); */
			main_navigation.classList.toggle("translate-x-full");
			body.classList.toggle("overflow-hidden");
		});
});

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

let lastKnownScrollPosition = 0;
let ticking = false;
let logo = document.querySelector(".custom-logo");

function doSomething(scrollPos) {
	// Do something with the scroll position
	if (scrollPos > 80) {
		logo.classList.add("h-10");
	} else {
		logo.classList.remove("h-10");
	}
}

document.addEventListener("scroll", function (e) {
	lastKnownScrollPosition = window.scrollY;

	if (!ticking) {
		window.requestAnimationFrame(function () {
			doSomething(lastKnownScrollPosition);
			ticking = false;
		});

		ticking = true;
	}
});

/* BLOCKS .js */
import "../theme/template-parts/blocks/blocks";
