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
					<p class="mb-2">
						<a href="mailto:<?php echo esc_html__($email, "virilis") ?>">
							<?php echo esc_html__($email, "virilis") ?>
						</a>
					</p>
				<?php endif; ?>
				<?php if ($telephone) : ?>
					<p class="mb-2">
						<a href="tel:<?php echo esc_html__($telephone, "virilis") ?>">
							<?php echo esc_html__($telephone, "virilis") ?>
						</a>
					</p>
				<?php endif; ?>
				<?php if ($org_nr) : ?>
					<p class="mb-2">
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
		<?php if (have_rows('connect_links', 'options')) : ?>
			<div class="md:max-w-[25%]">
				<p class="mb-2 text-left md:text-right min-w-max">
					<span class="text-lg uppercase font-black">
						<?php esc_html_e('Följ oss', 'virilis') ?>
					</span>
				</p>
				<ul class="icon-container flex flex-wrap md:justify-end gap-2">
					<?php while (have_rows('connect_links', "option")) : the_row();
						$connect_channel = get_sub_field('connect_channel', "option");
						$connect_url = get_sub_field('connect_url', "option");
						$folder = "";

						if (($connect_channel ==  "envelope") || ($connect_channel == "phone")) {
							$folder = "solid";
						} else {
							$folder = "brands";
						}

						if ($connect_channel == "envelope") {
							$attribute = "mailto:";
						} elseif ($connect_channel == "phone") {
							$attribute = "tel:";
						}
					?>
						<li>
							<a class="bg-primary hover:bg-secondary rounded-full p-2 flex items-center justify-center transition w-8 h-8" rel="nofollow" target="_blank" href="<?php if ($attribute) echo $attribute ?><?php echo $connect_url; ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/inc/icons/font-awesome/<?php echo $folder ?>/<?php echo $connect_channel ?>.svg" alt="<?php echo $connect_channel ?> icon" class="invert"></img>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
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