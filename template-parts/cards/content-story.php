<a href="<?php echo get_permalink($post) ?>" class="success-card">
    <div class="success-img">
        <img data-src="<?= esc_url(!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : wp_get_attachment_image_url(get_option('general_placeholder_img_url'), 'full')); ?>" alt="" class="lazyload">
    </div>

    <h3 class="success-title primary-color"><strong><?php the_title(); ?></strong></h3>

    <p class="success-desc">
        <?php echo get_the_excerpt() ?>
    </p>

    <div class="success-more">
        <span><?php _e('More', 'bonyan') ?></span>
    </div>
</a>