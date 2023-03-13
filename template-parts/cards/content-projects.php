<a href="<?php echo get_permalink($post) ?>" class="project-card">
    <!-- Project Img -->
    <div class="project-img">
        <img src="<?php echo !empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : "https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&w=0&k=20&c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk="; ?>" alt="">
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