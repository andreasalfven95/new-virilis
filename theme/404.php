<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package virilis
 */

get_header();
?>
<section class="my-16 flex justify-center content-center">
	<div class="entry-content ">
		<h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'virilis'); ?></h1>
		<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'virilis'); ?></p>

		<?php
		get_search_form();

		the_widget('WP_Widget_Recent_Posts');
		?>

		<div>
			<h2><?php esc_html_e('Most Used Categories', 'virilis'); ?></h2>
			<ul>
				<?php
				wp_list_categories(
					array(
						'orderby'    => 'count',
						'order'      => 'DESC',
						'show_count' => 1,
						'title_li'   => '',
						'number'     => 10,
					)
				);
				?>
			</ul>
		</div>

		<?php
		$virilis_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'virilis'), convert_smilies(':)')) . '</p>';
		the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$virilis_archive_content");

		the_widget('WP_Widget_Tag_Cloud');
		?>

	</div>
</section>
<!-- <div class="w-full md:w-1/2 flex items-center justify-center">
	<div class="max-w-sm m-8">
		<div class="text-5xl md:text-15xl text-gray-800 border-primary border-b">404</div>
		<div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>
		<p class="text-gray-800 text-2xl md:text-3xl font-light mb-8"><?php _e('Sorry, the page you are looking for could not be found.', 'virilis_theme'); ?></p>
		<a href="<?php echo get_bloginfo('url'); ?>" class="bg-primary px-4 py-2 rounded text-white">
			<?php _e('Go Home', 'virilis_theme'); ?>
		</a>
	</div>
</div> -->

<?php
get_footer();
