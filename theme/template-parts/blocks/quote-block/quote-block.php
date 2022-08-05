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
$quote = get_field('quote');
$quote_url = get_field('quote_url');
$quote_author = get_field('quote_author');
$quote_source = get_field('quote_source');
$image = get_field('image');
$background_color = get_field('background_color');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> prose-figcaption:m-0 prose-img:m-0">
    <figure class="flex flex-col-reverse">
        <blockquote <?php if ($quote_url) echo 'cite="' . $quote_url . '"' ?>class="quote-block-blockquote">
            <p class="quote-block-text"><?php echo $quote; ?></p>
        </blockquote>
        <div class="flex items-center flex-wrap gap-4">
            <?php if ($image) {
                echo wp_get_attachment_image($image['id'], 'thumbnail', '', ["class" => "rounded-full w-20 h-20 border-2 border-gray-300"]);
            }
            ?>
            <figcaption class="quote-block-author flex flex-col not-italic font-bold text-lg">
                <?php echo $quote_author; ?>
                <cite class="quote-block-role not-italic text-primary text-base">
                    <?php if ($quote_url) {
                        echo '<a href="' . $quote_url . '" target="_blank" rel="noopener" class="font-bold">' . $quote_source . '</a>';
                    } else {
                        echo $quote_source;
                    }
                    ?>
                </cite>
            </figcaption>
        </div>
    </figure>
    <?php if ($background_color) : ?>
        <style type="text/css">
            #<?php echo $id; ?> {
                background: <?php echo $background_color; ?>;
            }
        </style>
    <?php endif ?>
</div>

<!-- INSERT SCHEMA MARKUP IN CASE OF BLOCK BEING A REVIEW, AND IN THAT CASE ADD OPTIONAL STARS -->