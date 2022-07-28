/* "development:esbuild": "npx esbuild ./javascript/script.js --target=esnext --bundle --outfile=./theme/js/script.min.js", */

/* !(function (e) {
	var a = function (e) {
		e.find(".slides").slick({
			arrows: !1,
			autoplay: !0,
			autoplaySpeed: 5e3,
			centerPadding: "50px",
			cssEase: "ease",
			draggable: !1,
			fade: !1,
			dots: !1,
			infinite: !0,
			speed: 1e3,
			slidesToShow: 1,
			centerMode: !0,
			variableWidth: !0,
			adaptiveHeight: !0,
			focusOnSelect: !1,
			mobileFirst: !0,
			pauseOnHover: !1,
			pauseOnFocus: !1,
			swipe: !1,
			lazyLoad: "ondemand",
		});
	};
	e(document).ready(function () {
		e(".slider").each(function () {
			a(e(this));
		});
	}),
		window.acf && window.acf.addAction("render_block_preview/type=slider", a);
})(jQuery); */

(function ($) {
	/**
	 * initializeBlock
	 *
	 * Adds custom JavaScript to the block HTML.
	 *
	 * @date    15/4/19
	 * @since   1.0.0
	 *
	 * @param   object $block The block jQuery element.
	 * @param   object attributes The block attributes (only available when editing).
	 * @return  void
	 */
	var initializeBlock = function ($block) {
		$block.find(".slides").slick({
			arrows: false,
			autoplay: true,
			autoplaySpeed: 5000,
			centerPadding: "50px",
			cssEase: "ease",
			draggable: false,
			fade: false,
			dots: false,
			infinite: true,
			speed: 1000,
			slidesToShow: 1,
			centerMode: true,
			variableWidth: true,
			adaptiveHeight: true,
			focusOnSelect: false,
			mobileFirst: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			swipe: false,
			lazyLoad: "ondemand",
		});
	};

	// Initialize each block on page load (front end).
	$(document).ready(function () {
		$(".slider").each(function () {
			initializeBlock($(this));
		});
	});

	// Initialize dynamic block preview (editor).
	if (window.acf) {
		window.acf.addAction("render_block_preview/type=slider", initializeBlock);
	}
})(jQuery);
