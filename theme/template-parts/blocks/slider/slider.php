<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

/* INNER BLOCKS */
$allowed_blocks = ['core/buttons'];
$template = [
    [
        'core/buttons',
        ['className' => 'cta-buttons mt-4',]
    ]
];

//Block variables
$has_buttons = get_field('has_buttons');

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if ($is_preview) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative flex items-center">
    <?php if (have_rows('slides')) : ?>
        <?php if (get_field('slider_text') || $has_buttons) : ?>
            <div class="prose-p:mb-0 prose-headings:mt-0 prose-h1:mb-0 z-10 px-4 py-8 h-full w-full text-light flex flex-col justify-center max-w-content mx-auto">
                <?php the_field('slider_text'); ?>
                <?php if ($has_buttons) : ?>
                    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="slides
        <?php if (get_field("slider_text") || $has_buttons) : ?>
            brightness-50
            <?php endif; ?>
            ">
            <?php while (have_rows('slides')) : the_row();
                $image = get_sub_field('image');
            ?>
                <div class="not-prose">
                    <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Please add some slides.</p>
    <?php endif; ?>
</div>