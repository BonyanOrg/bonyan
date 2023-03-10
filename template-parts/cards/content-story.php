<a href="<?php echo get_permalink($post) ?>" class="success-card">
    <div class="success-img">
        <img data-src="<?php echo !empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : "https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&w=0&k=20&c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk="; ?>" alt="" class="lazyload">
    </div>

    <h3 class="success-title primary-color"><strong><?php the_title(); ?></strong></h3>

    <p class="success-desc">
        <?php echo get_the_excerpt() ?>
    </p>

    <div class="success-more">
        <span>More</span>
    </div>
</a>