<a href="<?php echo get_permalink($post) ?>" class="project-card">
    <!-- Project Img -->
    <div class="project-img">
        <img src="<?= esc_url(!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : wp_get_attachment_image_url(get_option('general_placeholder_img_url'), 'full')); ?>" alt="" style="border-radius: 8px 8px 0 0;">
    </div>

    <!-- Project Title -->
    <div class="project-title">
        <h3 class="bonyan-title"><?php the_title(); ?></h3>
    </div>

    <!-- Project Description -->
    <div class="project-desc">
        <p>
            <?php echo get_the_excerpt($post) ?>
        </p>
    </div>
</a>