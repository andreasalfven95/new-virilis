<?php

/**
 * Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

/* INNER BLOCKS */
$allowed_blocks = ['core/social-links', 'core/social-link'];
$template = [
    [
        'core/social-links',
    ]
];

//Block variables

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team';
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
    <?php if (get_field('team_text')) : ?>
        <div class="team-text">
            <?php the_field('team_text'); ?>
        </div>
    <?php endif; ?>
    <?php if (have_rows('team')) : ?>
        <div class="team-members text-center not-prose grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php while (have_rows('team')) : the_row();
                $team_image = get_sub_field('team_image');
                $team_name = get_sub_field('team_name');
                $team_position = get_sub_field('team_position');
            ?>
                <div class="team-member mt-8 flex flex-col items-center">
                    <div class="team_image mb-2 md:mb-4 cursor-default">
                        <?php if ($team_image) : ?>
                            <?php echo wp_get_attachment_image($team_image['id'], 'thumbnail', "", ["class" => "rounded-full w-[150px] h-[150px] border-2 border-gray-300"]); ?>
                        <?php else : ?>
                            <div aria-hidden="true" class="bg-primary rounded-full w-[150px] h-[150px] border-2 border-gray-300 flex items-center justify-center">
                                <?php if ($team_name) : ?>
                                    <span class="font-bold text-light text-2xl text-center">
                                        <?php echo $team_name; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($team_name) : ?>
                        <div class="team_name">
                            <span class="font-bold text-primary text-lg">
                                <?php echo $team_name; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if ($team_position) : ?>
                        <div class="team_position">
                            <span>
                                <?php echo $team_position; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('connect_links')) : ?>
                        <div class="social mt-2 flex items-center justify-center w-full">
                            <ul class="social-links flex gap-2 flex-wrap items-center justify-center sm:max-w-[80%]">
                                <?php while (have_rows('connect_links')) : the_row();
                                    $connect_channel = get_sub_field('connect_channel');
                                    $connect_url = get_sub_field('connect_url');
                                    $attribute = "";
                                    $folder = "";

                                    if (($connect_channel ==  "envelope") || ($connect_channel == "phone")) {
                                        $folder = "solid";
                                    } else {
                                        $folder = "brands";
                                    }

                                    if ($connect_channel == "envelope") {
                                        $attribute = "mailto:";
                                    } elseif ($connect_channel == "phone") {
                                        $attribute = "tel:";
                                    }
                                ?>
                                    <li>
                                        <a class="bg-primary hover:bg-secondary rounded-full p-2 flex items-center justify-center hover:scale-110 transition w-8 h-8" rel="nofollow" target="_blank" href="<?php if ($attribute) echo $attribute ?><?php echo $connect_url; ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/inc/icons/font-awesome/<?php echo $folder ?>/<?php echo $connect_channel ?>.svg" alt="<?php echo $connect_channel ?> icon" class="invert"></img>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Please add some members to the team.</p>
    <?php endif; ?>
</div>