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
$accordionId = get_field('id') ?: 'Item ID here...';
$question = get_field('question') ?: 'Your question here...';
$answer = get_field('answer') ?: 'Answer';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="headingOne">
                <button id="<?php echo $accordionId ?>" class="
            relative
            flex
            items-center
            justify-between
            w-full
            py-4
            px-5
            text-base font-bold text-gray-800 text-left
            bg-white
            border-0
            rounded-none
            transition
            focus:outline-none
          " type="button" onclick="accordionActive(this.id)">
                    <?php echo $question; ?>
                    <div id="accordion-arrow<?php echo $accordionId ?>" class="ml-2 transition-transform duration-300">⌵</div>
                </button>
            </h2>
            <div id="accordion-answer<?php echo $accordionId ?>" class="accordion-collapse collapse show hidden">
                <div class="accordion-body py-4 px-5">
                    <?php echo $answer; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function accordionActive(clicked_id) {
        console.log(clicked_id);
        document.getElementById("accordion-answer" + clicked_id).classList.toggle("hidden")
        document.getElementById("accordion-arrow" + clicked_id).classList.toggle("-rotate-180")
    }
</script>