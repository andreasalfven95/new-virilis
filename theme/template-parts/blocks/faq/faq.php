<?php

/**
 * faq Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq not-prose';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
?>

<?php if (have_rows('faq')) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php while (have_rows('faq')) : the_row(); ?>
            <div class="faq-section mb-4">
                <?php if (get_sub_field('faq_section_name')) : ?>
                    <h2><?php the_sub_field('faq_section_name'); ?></h2>
                <?php endif; ?>
                <?php if (have_rows('faq_section')) : ?>
                    <?php while (have_rows('faq_section')) : the_row(); ?>
                        <details class="accordion-item bg-light overflow-hidden border rounded-md border-gray-300 group">
                            <summary class="accordion-question flex mb-0 cursor-pointer items-center justify-between bg-gray-200 py-4 px-5 text-base font-bold text-dark after:transition-transform open: after:content-['⌵'] group-open:after:-rotate-180">
                                <?php the_sub_field("faq_question"); ?>
                            </summary>
                            <div class="accordion-answer py-4 px-5">
                                <?php the_sub_field("faq_answer"); ?>
                            </div>
                        </details>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>

    <?php
    global $schema;
    $schema = array(
        '@context'   => "https://schema.org",
        '@type'      => "FAQPage",
        'mainEntity' => array()
    );
    if (have_rows('faq')) {
        while (have_rows('faq')) : the_row();
            if (have_rows('faq_section')) {
                while (have_rows('faq_section')) : the_row();
                    $questions = array(
                        '@type'          => 'Question',
                        'name'           => get_sub_field('faq_question'),
                        'acceptedAnswer' => array(
                            '@type' => "Answer",
                            'text' => get_sub_field('faq_answer')
                        )
                    );
                    array_push($schema['mainEntity'], $questions);
                endwhile;
            }
        endwhile;

        function virilis_generate_faq_schema($schema)
        {
            global $schema;
            echo '<!-- Auto generated FAQ Structured data by Bakemywp.com --><script type="application/ld+json">' . json_encode($schema) . '</script>';
        }
        add_action('wp_footer', 'virilis_generate_faq_schema', 100);
    }
    ?>
<?php endif; ?>
<!-- endif have_rows('faq'); -->