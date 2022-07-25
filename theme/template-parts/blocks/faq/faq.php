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
$accordionId = get_field('accordionId') ?: 'Item ID here...';
$section_name = get_field('faq_section_name') ?: 'Title goes here...';
$question = the_sub_field('faq_question') ?: 'Your question here...';
$answer = the_sub_field('faq_answer') ?: 'Answer goes here...';
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h2 class=""><?php echo $section_name ?></h2>
    <?php if (have_rows('faq_section')) : ?>
        <div class="accordion" id="accordionExample" data-accordion data-allow-all-closed="true">
            <?php while (have_rows('faq_section')) : the_row(); ?>
                <details data-accordion-item class="accordion-item bg-white overflow-hidden border rounded-md border-gray-300">
                    <summary id="accordion-question-<?php echo $accordionId ?>" class="accordion-header flex w-full relative mb-0 cursor-pointer items-center justify-between border-0 bg-gray-200 py-4 px-5 text-left text-base font-bold text-dark transition focus:outline-none after:content-['⌵']" onclick="accordionActive(this.id)">
                        <?php the_sub_field('faq_question') ?>
                    </summary>
                    <p id="accordion-answer-<?php echo $accordionId ?>" class="accordion-collapse py-4 px-5 hidden">
                        <?php the_sub_field("faq_answer"); ?>
                    </p>
                </details>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    function accordionActive(clicked_id) {
        console.log(clicked_id);
        document.getElementById("accordion-answer-" + clicked_id).classList.toggle("hidden")
        document.getElementById("accordion-question-" + clicked_id).classList.toggle("after:-rotate-180")
    }
</script>