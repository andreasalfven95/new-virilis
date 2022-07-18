<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package virilis
 */

?>

<header id="masthead" class="site-header fixed px-4 min-w-full transition-all duration-300 top-0 z-50 bg-white lg:flex lg:gap-6 lg:justify-between lg:items-center border-b" role="banner">
	<div class="flex gap-6 justify-between items-center h-full
	">
		<div id="logo-container" class="flex items-center h-full py-4">
			<?php if (has_custom_logo()) { ?>
				<?php the_custom_logo(); ?>
			<?php } else { ?>
				<div class="text-lg uppercase">
					<a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
						<?php echo get_bloginfo('name'); ?>
					</a>
				</div>

				<p class="text-sm font-light text-gray-600">
					<?php echo get_bloginfo('description'); ?>
				</p>

			<?php } ?>
		</div>
		<div class="lg:hidden">
			<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
				<div id="hamburger-wrapper">
					<p class="burger m-0"></p>
				</div>
				<!-- <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
						<g id="icon-shape">
							<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
						</g>
					</g>
				</svg> -->

			</a>
		</div>
	</div>
	<nav id="primary-nav" class="fixed h-fullscreenSmallNavbar lg:h-auto bg-white text-right lg:text-left lg:bg-transparent left-1/3 right-0 mt-[1px] transform transition-all duration-300 translate-x-full lg:translate-x-0 lg:static lg:min-h-0 text-xl lg:text-base">
		<?php
		wp_nav_menu(
			array(
				'container_id'    => 'primary-menu',
				'container_class' => 'px-4 py-24 h-full max-h-[800px] lg:p-0 lg:bg-transparent lg:block',
				'menu_class'      => 'h-full flex flex-col justify-between lg:items-center lg:flex-row lg:gap-8',
				'theme_location'  => 'virilis-header-menu',
				'li_class'        => 'text min-w-max',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->