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

<footer id="colophon" class="w-full pt-12 pb-4 mt-16 px-4 md:px-8 bg-dark text-light">
	<?php do_action('virilis_theme_footer'); ?>
	<div class="max-w-7xl mx-auto flex justify-between flex-col gap-8 md:flex-row">
		<?php if ($footer_icon || $footer_text) : ?>
			<div class="md:max-w-[33%]">
				<?php if ($footer_icon) : ?>
					<img class="max-w-[10rem] mb-2" src="<?php echo esc_url($footer_icon['url']); ?>" alt="<?php echo esc_attr($footer_icon['alt']); ?>" />
				<?php endif; ?>
				<?php if ($footer_text) : ?>
					<p>
						<?php echo esc_html_e($footer_text, "virilis") ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ($street || $zip_city || $email || $telephone || $org_nr) : ?>
			<div>
				<p class="mb-2">
					<span class="text-lg uppercase font-black">
						<?php esc_html_e('Kontakt', 'virilis') ?>
					</span>
				</p>
				<?php if ($street || $zip_city) : ?>
					<address>
						<?php echo esc_html__($street, "virilis") ?>
						<br>
						<?php echo esc_html__($zip_city, "virilis") ?>
					</address>
				<?php endif; ?>
				<?php if ($email) : ?>
					<p>
						<a href="mailto:<?php echo esc_html__($email, "virilis") ?>">
							<?php echo esc_html__($email, "virilis") ?>
						</a>
					</p>
				<?php endif; ?>
				<?php if ($telephone) : ?>
					<p>
						<a href="tel:<?php echo esc_html__($telephone, "virilis") ?>">
							<?php echo esc_html__($telephone, "virilis") ?>
						</a>
					</p>
				<?php endif; ?>
				<?php if ($org_nr) : ?>
					<p>
						<?php echo esc_html__($org_nr, "virilis") ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div>
			<p class="mb-2">
				<span class="text-lg uppercase font-black mb-4">
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
						'li_class'        => 'text mb-2',
						'fallback_cb'     => false,
					)
				);
				?>
			</nav>
		</div>
		<?php if (
			$facebook_url || $instagram_url
			|| $linkedin_url
		) : ?>
			<div class="min-w-max">
				<p class="mb-2 text-left lg:text-right">
					<span class="text-lg uppercase font-black">
						<?php esc_html_e('Följ oss', 'virilis') ?>
					</span>
				</p>
				<div class="flex md:grid md:grid-cols-2 lg:grid-cols-3 justify-items-center items-center gap-2 md:gap-3 lg:gap-2 icon-container">
					<?php if ($facebook_url) : ?>
						<a href="<?php echo esc_html__($facebook_url, "virilis") ?>" rel="nofollow" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/inc/icons/facebook.svg" alt="Facebook icon">
						</a>
					<?php endif; ?>
					<?php if ($instagram_url) : ?>
						<a href="<?php echo esc_html__($instagram_url, "virilis") ?>" rel="nofollow" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/inc/icons/instagram.svg" alt="Instagram icon">
						</a>
					<?php endif; ?>
					<?php if ($linkedin_url) : ?>
						<a href="<?php echo esc_html__($linkedin_url, "virilis") ?>" rel="nofollow" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/inc/icons/linkedin.svg" alt="Linkedin icon">
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="max-w-7xl mx-auto mt-8">
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