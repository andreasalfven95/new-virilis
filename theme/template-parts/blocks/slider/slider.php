<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative">
    <?php if (have_rows('slides')) : ?>
        <div class="absolute w-full mx-auto flex justify-center items-center h-full">
            <div class="relative h-full z-10 text-light flex flex-col justify-center p-4 max-w-[960px] mx-auto md:pr-52 lg:pr-96">
                <!-- FIX THE CONDITIONAL DISPLAY OF WYSIWYG FIELD HERE -->
                <?php if (the_field('slider_text')) : the_field('slider_text') ?><?php endif; ?>
            </div>
        </div>
        <div class="slides absolute">
            <?php while (have_rows('slides')) : the_row();
                $image = get_sub_field('image');
            ?>
                <div class="not-prose brightness-50">
                    <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Please add some slides.</p>
    <?php endif; ?>
</div>