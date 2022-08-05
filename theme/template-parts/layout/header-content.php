<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package virilis
 */

?>

<header id="masthead" class="site-header fixed px-4 min-w-full transition-all duration-300 top-0 z-50 bg-light lg:bg-opacity-80 lg:backdrop-blur lg:flex lg:gap-6 lg:justify-between lg:items-center shadow-md shadow-black/10" role="banner">
	<div class="flex gap-6 justify-between items-center h-full
	">
		<?php if (has_custom_logo()) { ?>
			<div id="logo-container" class="flex items-center h-full py-4">
				<?php the_custom_logo(); ?>
			</div>
		<?php } else { ?>
			<div id="logo-container" class="flex items-center justify-center h-full py-4">
				<a href="<?php echo get_bloginfo('url'); ?>" class="custom-logo flex items-center justify-center font-bold text-2xl uppercase py-4">
					<?php echo get_bloginfo('name'); ?>
				</a>
			</div>
		<?php } ?>
		<div class="lg:hidden">
			<button aria-label="Toggle navigation" id="primary-menu-toggle">
				<div id="hamburger-wrapper">
					<p class="burger m-0"></p>
				</div>
			</button>
		</div>
	</div>
	<nav id="primary-nav" class="fixed h-fullscreenSmallNavbar lg:h-auto bg-light lg:bg-transparent text-right lg:text-left left-0 right-0 transform transition-all duration-300 translate-x-full lg:translate-x-0 lg:static lg:min-h-0 text-xl lg:text-base">
		<?php
		wp_nav_menu(
			array(
				'container_id'    => 'primary-menu',
				'container_class' => 'px-4 py-8 h-full lg:p-0 lg:block',
				'menu_class'      => 'h-full flex flex-col justify-center lg:items-center lg:flex-row gap-8',
				'theme_location'  => 'virilis-header-menu',
				'li_class'        => 'text-dark sm:min-w-max',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->