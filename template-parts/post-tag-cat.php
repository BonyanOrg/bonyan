<div class="custom-widget custom-post-tags my-4">
    <?php
    $post_tags = get_the_tags();
    if ($post_tags) {
        foreach ($post_tags as $tag) {
            ?>
            <a class="tag-item" href="<?php echo get_term_link($tag); ?>">
                <strong>#</strong>
                <?php echo $tag->name; ?>
            </a>
            <?php

        }
    }
    $post_terms = wp_get_post_terms(get_the_ID(), 'category');
    if ($post_tags) {
        foreach ($post_terms as $term) {
            ?>
            <a class="tag-item" href="<?php echo get_term_link($term); ?>">
                <?php echo $term->name; ?></a>
            <?php

        }
    }
    ?>
</div>