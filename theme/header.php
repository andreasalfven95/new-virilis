<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package virilis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class("antialiased"); ?>>
	<?php if (function_exists("wp_body_open")) {
		wp_body_open();
	}
	do_action('virilis_site_before'); ?>


	<div id="page" class="min-h-[calc(100vh_-_7rem)] flex flex-col">
		<!-- <div id="page" class=""> -->
		<?php do_action('virilis_header'); ?>

		<?php get_template_part('template-parts/layout/header', 'content'); ?>

		<div id="content" class="site-content flex-grow">

			<?php if (is_front_page()) { ?>
				<!-- Start introduction -->

				<!-- End introduction -->
			<?php } ?>

			<?php do_action('virilis_content_start'); ?>

			<main id="primary">