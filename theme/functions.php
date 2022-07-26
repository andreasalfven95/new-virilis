<?php

/**
 * virilis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package virilis
 */

if (!defined('VIRILIS_VERSION')) {
	// Replace the version number of the theme on each release.
	define('VIRILIS_VERSION', '1.0.0');
}

if (!function_exists('virilis_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function virilis_setup()
	{
		add_theme_support('admin-bar', array('callback' => '__return_false'));
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on virilis, use a find and replace
		 * to change 'virilis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('virilis', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */

		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');

		add_theme_support('align-wide');
		add_theme_support('wp-block-styles');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'virilis-header-menu' => esc_html__('Header Menu', 'virilis'),
				'virilis-footer-menu' => esc_html__('Footer Menu', 'virilis'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'virilis_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Add responsive embeds and block editor styles.
		 */
		add_theme_support('responsive-embeds');
		add_theme_support('editor-styles');
		add_editor_style('style-editor.css');
		remove_theme_support('block-templates');
		/* remove_theme_support('core-block-patterns'); */
	}
endif;
add_action('after_setup_theme', 'virilis_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function virilis_content_width()
{
	$GLOBALS['content_width'] = apply_filters('virilis_content_width', 640);
}
add_action('after_setup_theme', 'virilis_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/* function virilis_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'virilis'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'virilis'),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'virilis_widgets_init'); */

/**
 * Dequeue styles
 */
/* function ebayads_remove_block_styles()
{
	wp_dequeue_style("wp-block-library");
	wp_dequeue_style("wp-block-library-theme");
	wp_dequeue_style("wc-block-style"); //Remove WooCommerce block CSS
}
add_action("wp_enqueue_scripts", "ebayads_remove_block_styles", 100); */

/**
 * Enqueue scripts and styles.
 */
function virilis_scripts()
{
	wp_enqueue_style('virilis-style', get_stylesheet_uri(), array(), VIRILIS_VERSION);
	wp_enqueue_script('virilis-script', get_template_directory_uri() . '/js/script.min.js', array(), VIRILIS_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'virilis_scripts');

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles with no other changes.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function virilis_tinymce_add_class($settings)
{
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}
add_filter('tiny_mce_before_init', 'virilis_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function virilis_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'virilis_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function virilis_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'virilis_nav_menu_add_submenu_class', 10, 3);

/* CUSTOM FUNCTIONS */
function get_the_post_custom_thumbnail($post_id, $additional_attributes = [])
{
	$custom_thumbnail = "";
	if (null === $post_id) {
		$post_id = get_the_ID();
	}
	if (has_post_thumbnail($post_id)) {
		$default_attributes = [
			"loading" => "lazy"
		];

		$attributes = array_merge($additional_attributes, $default_attributes);

		$custom_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), false, $additional_attributes);
	}
	return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $additional_attributes = [])
{
	echo get_the_post_thumbnail($post_id, $additional_attributes);
}

function virilis_excerpt_more($more = "")
{
	if (!is_single()) {
		$more = sprintf('<button class="button-primary"><a href="%1$s">%2$s</a></button>', get_permalink(get_the_ID()), __("Read more...", "virilis"));
	}
	return $more;
}

function virilis_pagination()
{
	$args = [
		"before_page_number" => '<span class="border mx-1 p-2">',
		"after_page_number" => '</span>'
	];
	$allowed_tags = [
		"span" => [
			"class" => []
		],
		"a" => [
			"class" => [],
			"href" => []
		]
	];
	printf('<nav class="virilis-pagination">%s</nav>', wp_kses(paginate_links($args), $allowed_tags));
}


/* Advanced Custom Fields */
/* function acf_init_custom_blocks(){
	if(function_exists("acf_register_block_type")){
		acf_register_block_type(array(
			"name"
			"title"
			"description"
		))
	}
} */

/* CUSTOM BLOCKS */
add_filter('block_categories_all', function ($categories) {

	// Adding a new category.
	$categories[] = array(
		'slug'  => 'virilis',
		'title' => 'Virilis',
		'icon' => 'smiley'
	);

	return $categories;
});

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
	// Check function exists.
	if (function_exists('acf_register_block_type')) {
		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'testimonial',
			'title'             => __('Testimonial'),
			'description'       => __('A custom testimonial block.'),
			'render_template'   => 'template-parts/blocks/faq/testimonial.php',
			'category'          => 'virilis',
			'icon'              => 'smiley',
			'keywords'          => array('testimonial', 'quote'),
		));
		acf_register_block_type(array(
			'name'              => 'faq',
			'title'             => __('FAQ'),
			'description'       => __('A custom FAQ block.'),
			'render_template'   => 'template-parts/blocks/faq/faq.php',
			'category'          => 'virilis',
			'icon'              => 'smiley',
			'keywords'          => array('faq', 'accordion '),
		));
	}
}
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Website settings',
		'menu_title'	=> 'Website settings',
		'menu_slug' 	=> 'website-settings',
		'capability'	=> 'edit_posts',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Contact',
		'menu_title'	=> 'Contact information',
		'parent_slug' 	=> 'website-settings',
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Design settings',
		'menu_title'	=> 'Design settings',
		'parent_slug' 	=> 'website-settings',
	));

	/* acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	)); */
}

/* BLOCK PATTERNS */
function my_plugin_register_my_patterns()
{
	register_block_pattern(
		'my-plugin/my-awesome-pattern',
		array(
			'title'       => __('Two buttons', 'virilis'),
			'description' => _x('Two horizontal buttons, the left button is primary.', 'Block pattern description', 'virilis'),
			'content'     => "
			<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html__('Button One', 'my-plugin') . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button  -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html__('Button Two', 'my-plugin') . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->
			"
		)
	);
}
add_action('init', 'my_plugin_register_my_patterns');

/* BLOCK STYLES */
/* Buttons */
if (function_exists('register_block_style')) {
	register_block_style(
		'core/button',
		[
			'name'         => 'primary-button-fill',
			'label'        => __('Primary button with fill', 'virilis'),
		],
	);
	register_block_style(
		'core/button',

		[
			'name'         => 'primary-button-outline',
			'label'        => __('Primary button with outline', 'virilis'),
		],
	);
	register_block_style(
		'core/button',
		[
			'name'         => 'secondary-button-fill',
			'label'        => __('Secondary button with fill', 'virilis'),
		],
	);
	register_block_style(
		'core/button',

		[
			'name'         => 'secondary-button-outline',
			'label'        => __('Secondary button with outline', 'virilis'),
		],
	);
}


/* FAQ SCHEMA */
/* function virilis_generate_faq_schema($schema)
{
	global $schema;
	echo '<!-- Auto generated FAQ Structured data by Andreas Alfvén --><script type="application/ld+json">' . json_encode($schema) . '</script>';
}
add_action('wp_footer', 'virilis_generate_faq_schema', 100); */
