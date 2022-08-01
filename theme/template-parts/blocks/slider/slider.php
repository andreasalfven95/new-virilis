<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$allowed_blocks = [/* 'core/heading', 'core/social-links', */'core/paragraph', 'core/button'];
$template = [
    /* [
        'core/heading',
        [
            'level' => 6,
            'content' => '<strong>Title</strong>',
            'align' => 'center',
            'className' => 'card-heading'
        ],], */
    /* ['core/paragraph', ['placeholder' => 'Description', 'align' => 'center']], */
    ['core/buttons'],
    /* ['core/social-links', ['align' => 'center']], */
];

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
        <?php if (get_field('slider_text') || have_rows('cta_buttons')) : ?>
            <div class="prose-p:mb-0 prose-headings:mt-0 prose-h1:mb-0 px-4 py-8 h-full w-full text-light flex flex-col justify-center max-w-content mx-auto">

                <?php the_field('slider_text'); ?>
                <?php while (have_rows('cta_buttons')) : the_row();
                    $cta_button = get_sub_field('cta_button');
                ?>
                    <div class="cta-buttons">

                    </div>
                <?php endwhile; ?>
                <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" templateLock="false" />
            </div>
        <?php endif; ?>
        <div class="slides -z-10
        <?php if (get_field("slider_text")) : ?>
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