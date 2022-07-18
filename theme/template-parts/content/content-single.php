<?php

/**
 * Template for displaying single post.
 */
$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header mb-4">
        <?php the_title(sprintf('<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1">', esc_url(get_permalink())), '</h1>'); ?>
        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>


        <?php
        //Post thumbnail
        if ($has_post_thumbnail) {
        ?>
            <div class="entry-image mb-4 h-full">
                <?php
                the_post_custom_thumbnail(
                    $the_post_id,
                    'featured-thumbnail w-full max-h-96',
                    [
                        'class' => 'attachment-featured-thumbnail size-featured-image',
                    ]
                ); ?>
            </div>
        <?php
        }
        ?>
    </header>

    <div class="entry-content">
        <?php
        the_content();
        ?>
        <div class="previous-post">
            <p>Previous post:
                <?php
                previous_post_link();
                ?>
            </p>
        </div>
        <div class="next-post">
            <p>Next post:
                <?php
                next_post_link();
                ?>
            </p>
        </div>


        <?php
        wp_link_pages(
            [
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'virilis_theme') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'virilis_theme') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            ]
        );
        ?>
    </div>

</article>