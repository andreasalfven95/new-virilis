<?php

/**
 * Timeline Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

//Block variables

// Create id attribute allowing for custom "anchor" value.
$id = 'timeline-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'timeline';
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











<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if (get_field('timeline_text')) : ?>
        <div class="timeline-text">
            <?php the_field('timeline_text'); ?>
        </div>
    <?php endif; ?>
    <?php if (have_rows('timeline_items')) : ?>
        <div class="timeline-items py-4 md:py-8 lg:py-16 prose-headings:mt-0 prose-headings:mb-2 prose-p:mb-0 flex flex-col space-y-8 items-start">
            <?php while (have_rows('timeline_items')) : the_row();
                $timeline_image = get_sub_field('timeline_image');
                $timeline_year = get_sub_field('timeline_year');
                $timeline_description = get_sub_field('timeline_description');
            ?>
                <div class="timeline-item flex space-x-4 sm:space-x-8 md:space-x-0 justify-start md:odd:flex-row-reverse md:even:self-end md:max-w-[50%] w-full group">
                    <div class="md:translate-x-14 md:group-even:-translate-x-14 relative cursor-default">
                        <div aria-hidden="true" class="-z-10 group-last:hidden absolute bg-primary w-1 top-14 md:top-24 left-0 right-0 mx-auto h-full"></div>
                        <div class="bg-primary h-16 w-16 md:h-28 md:w-28 rounded-full overflow-hidden flex items-center justify-center text-light font-black text-xl md:text-3xl border-4 border-primary">
                            <?php if ($timeline_image) {
                                echo wp_get_attachment_image($timeline_image['id'], 'thumbnail', "", ["class" => ""]);
                            } elseif ($timeline_year) {
                                echo ($timeline_year);
                            } ?>
                        </div>
                    </div>
                    <div class="md:group-odd:text-right">
                        <span class="text-sm">
                            <?php if ($timeline_image) {
                                echo ($timeline_year);
                            } ?>
                        </span>
                        <?php if ($timeline_description) {
                            echo ($timeline_description);
                        } ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Please add some items to the timeline.</p>
    <?php endif; ?>
</div>