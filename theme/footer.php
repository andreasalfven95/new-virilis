<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package virilis
 */

?>

</main>

<?php do_action('virilis_content_end'); ?>

</div>

<?php do_action('virilis_theme_content_after'); ?>

<?php get_template_part('template-parts/layout/footer', 'content'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>