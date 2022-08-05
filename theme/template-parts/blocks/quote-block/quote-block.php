<?php

/**
 * Quote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quote-block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quote-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('quote') ?: 'Your quote-block here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image') ?: 295;
$background_color = get_field('background_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> prose-figcaption:m-0 prose-img:m-0">
    <figure>
        <blockquote class="quote-block-blockquote">
            <div class="flex items-center flex-wrap gap-4">
                <?php if ($image) echo wp_get_attachment_image($image, 'thumbnail', '', ["class" => "rounded-full w-20 h-20 border-2 border-gray-300"]); ?>
                <figcaption class="quote-block-author flex flex-col font-bold text-lg not-italic"><?php echo $author; ?><cite class="quote-block-role not-italic text-primary text-base"><?php echo $role; ?></cite></figcaption>
            </div>
            <p class="quote-block-text"><?php echo $text; ?></p>
        </blockquote>
    </figure>
    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?> !important;
        }
    </style>
</div>