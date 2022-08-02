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
        <div class="team-members not-prose grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php while (have_rows('team')) : the_row();
                $team_image = get_sub_field('team_image');
                $team_name = get_sub_field('team_name');
                $team_position = get_sub_field('team_position');
            ?>
                <div class="team-member mt-8 flex flex-col items-center">
                    <?php if ($team_image) : ?>
                        <div class="team_image">
                            <?php echo wp_get_attachment_image($team_image['id'], 'thumbnail', "", ["class" => "rounded-full"]); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($team_name) : ?>
                        <div class="team_name mt-4">
                            <span class="font-bold text-primary">
                                <?php the_sub_field("team_name"); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if ($team_position) : ?>
                        <div class="team_position">
                            <span>
                                <?php the_sub_field("team_position"); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('social_links')) : ?>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
                        <div class="social">
                            <ul class="fa-ul social-links">
                                <?php while (have_rows('social_links')) : the_row(); ?>
                                    <?php $icon = "";
                                    $link = "";
                                    $open_blank = false; ?>

                                    <?php
                                    if (get_sub_field('email')) {
                                        $icon = "fa-envelope-o";
                                        $link = "mailto:" . get_sub_field('email');
                                        $open_blank = false;
                                    } elseif (get_sub_field('phone')) {
                                        $icon = "fa-phone";
                                        $link = "tel:" . get_sub_field('phone');
                                        $open_blank = false;
                                    } elseif (get_sub_field('facebook')) {
                                        $icon = "fa-facebook";
                                        $link = get_sub_field('facebook');
                                        $open_blank = true;
                                    } elseif (get_sub_field('twitter')) {
                                        $icon = "fa-twitter";
                                        $link = get_sub_field('twitter');
                                        $open_blank = true;
                                    } elseif (get_sub_field('linkedin')) {
                                        $icon = "fa-linkedin";
                                        $link = get_sub_field('linkedin');
                                        $open_blank = true;
                                    } elseif (get_sub_field('instagram')) {
                                        $icon = "fa-instagram";
                                        $link = get_sub_field('instagram');
                                        $open_blank = true;
                                    } elseif (get_sub_field('github')) {
                                        $icon = "fa-github";
                                        $link = get_sub_field('github');
                                        $open_blank = true;
                                    }
                                    ?>
                                    <li><a <?php if ($open_blank) echo 'target:"_blank"' ?> href="<?php echo $link; ?>"><i class="fa <?php echo $icon ?>" aria-hidden="true"></i></a></li>


                                    <!-- <?php if (get_sub_field('email')) : ?>
                                        <li><a href="mailto:<?php echo the_sub_field('email'); ?>"><i class="fa fa-email"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('phone')) : ?>
                                        <li><a href="tel:<?php echo the_sub_field('phone'); ?>"><i class="fa fa-phone"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('facebook')) : ?>
                                        <li class="fa-li"><a href="<?php echo the_sub_field('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('twitter')) : ?>
                                        <li><a href="<?php echo the_sub_field('twitter'); ?>"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('linkedin')) : ?>
                                        <li><a href="<?php echo the_sub_field('linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('instagram')) : ?>
                                        <li><a href="<?php echo the_sub_field('instagram'); ?>"><i class="fa fa-instagram"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('github')) : ?>
                                        <li><a href="<?php echo the_sub_field('github'); ?>"><i class="fa fa-github"></i></a></li>
                                    <?php endif; ?> -->
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