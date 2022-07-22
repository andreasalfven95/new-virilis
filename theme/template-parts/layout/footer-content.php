<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package virilis
 */

// do something with $variable

$footer_icon = get_field("footer_icon", "option");
$footer_text = get_field("footer_text", "option");

$company_name = get_field("company_name", "option");
$street = get_field("street", "option");
$zip_city = get_field("zip_city", "option");
$email = get_field("email", "option");
$telephone = get_field("telephone", "option");
$org_nr = get_field("org_nr", "option");

$facebook_url = get_field("facebook_url", "option");
$instagram_url = get_field("instagram_url", "option");
$linkedin_url = get_field("linkedin_url", "option");
?>

<footer id="colophon" class="w-full pt-12 px-4 md:px-8 bg-dark text-light">
	<?php do_action('virilis_theme_footer'); ?>
	<div class="container flex justify-between flex-col space-y-8 md:flex-row md:space-x-8 md:space-y-0">
		<div class="md:max-w-[33%]">
			<img class="max-w-[10rem] mb-2" src="<?php echo esc_url($footer_icon['url']); ?>" alt="<?php echo esc_attr($footer_icon['alt']); ?>" />
			<p>
				<?php echo esc_html_e($footer_text, "virilis") ?>
			</p>
		</div>
		<div class="">
			<p>
				<span class="text-lg uppercase font-black">
					<?php esc_html_e('Kontakt', 'virilis') ?>
				</span>
			</p>
			<address>
				<?php echo esc_html__($street, "virilis") ?>
				<br>
				<?php echo esc_html__($zip_city, "virilis") ?>
			</address>
			<p>
				<a href="mailto:<?php echo esc_html__($email, "virilis") ?>">
					<?php echo esc_html__($email, "virilis") ?>
				</a>
			</p>
			<p>
				<a href="tel:<?php echo esc_html__($telephone, "virilis") ?>">
					<?php echo esc_html__($telephone, "virilis") ?>
				</a>
			</p>
			<p>
				<?php echo esc_html__($org_nr, "virilis") ?>
			</p>
		</div>
		<div class="">
			<p>
				<span class="text-lg uppercase font-black">
					<?php esc_html_e('Meny', 'virilis') ?>
				</span>
			</p>
			<nav id="footer-nav" class="">
				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'footer-menu',
						'container_class' => '',
						'menu_class'      => 'flex flex-col',
						'theme_location'  => 'virilis-footer-menu',
						'li_class'        => 'text mb-3',
						'fallback_cb'     => false,
					)
				);
				?>
			</nav>
		</div>
		<div class="">
			<p>
				<span class="text-lg uppercase font-black">
					<?php esc_html_e('Följ oss', 'virilis') ?>
				</span>
			</p>
			<p>
				<a href="<?php echo esc_html__($facebook_url, "virilis") ?>" rel="nofollow">
					Facebook
				</a>
			</p>
			<p>
				<a href="<?php echo esc_html__($instagram_url, "virilis") ?>" rel="nofollow">
					Instagram
				</a>
			</p>
			<p>
				<a href="<?php echo esc_html__($linkedin_url, "virilis") ?>" rel="nofollow">
					LinkedIn
				</a>
			</p>
		</div>
	</div>
	<div class="container mt-8">
		<hr class="mb-4">
		<p>
			<small>
				© <?php echo esc_html__($company_name, "virilis") ?> <script>
					document.write(new Date().getFullYear());
				</script><?php
							if (is_front_page()) {
								echo ' | Skapad av <a href="https://mondify.se/" target="_blank">Mondify - digital marknadsföring & intäktsbyrå</a>';
							} ?>
			</small>
		</p>
	</div>
</footer><!-- #colophon -->