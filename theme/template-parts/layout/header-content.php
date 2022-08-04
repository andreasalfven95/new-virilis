<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package virilis
 */

?>

<header id="masthead" class="site-header fixed px-4 min-w-full transition-all duration-300 top-0 z-50 bg-light lg:bg-opacity-80 lg:backdrop-blur lg:flex lg:gap-6 lg:justify-between lg:items-center lg:drop-shadow-lg shadow-light" role="banner">
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
				'li_class'        => 'text min-w-max',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->