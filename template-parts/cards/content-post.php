<a href="<?php echo get_permalink($post) ?>" class="blog-card">
    <div class="blog-img">
        <img data-src="<?= esc_url(!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : wp_get_attachment_image_url(get_option('general_placeholder_img_url'), 'full')); ?>" alt="" class="lazyload">
    </div>

    <h3 class="blog-title primary-color"><strong><?php the_title(); ?></strong></h3>

    <p class="blog-desc">
        <?php echo get_the_excerpt() ?>
    </p>

    <div class="blog-more">
        <span class="primary-btn no-border py-2 px-4"><?php _e('More', 'bonyan') ?></span>
    </div>
</a>