<div class="data-and-share mt-4">
    <div class="post-share">
        <span>
            <?php _e('Share via', 'bonyan'); ?>
        </span>

        <div class="share-socialmedia">
            <a rel="noreferrer" target="_blank"
                href="http://www.facebook.com/sharer/sharer.php?u=<?php echo home_url() . '?p=' . get_the_ID(); ?>"><i
                    class="fa-brands fa-facebook-f"></i></a>

            <a rel="noreferrer" target="_blank"
                href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo home_url() . '?p=' . get_the_ID(); ?>"><i
                    class="fa-brands fa-twitter"></i></a>

            <!-- <a rel="noreferrer" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php //echo get_permalink(); 
            ?>"><i class="fa-brands fa-linkedin"></i></a> -->

            <!-- <a rel="noreferrer" target="_blank" href="https://t.me/share/url?url=<?php //echo get_permalink(); 
            ?>&text=<?php //the_title(); 
            ?>"><i class="fa-brands fa-telegram"></i></a> -->

            <!-- <a rel="noreferrer" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php //echo urlencode(get_permalink()); 
            ?>"><i class="fa-brands fa-twitter"></i></a> -->

            <a rel="noreferrer" target="_blank"
                href="mailto:?subject=<?php the_title(); ?>&body=<?php echo home_url() . '?p=' . get_the_ID(); ?>"><i
                    class="fa-solid fa-envelope"></i></a>
        </div>
        <div class="">
            <?php
            $date = date_create($post->post_modified);
            echo date_format($date, "Y/m/d"). "  ";
            echo 'The Author: ' . get_the_author();
            echo "  Tags: ";
            $post_tags = get_the_tags();
            if ($post_tags) {
                foreach ($post_tags as $tag) {
                    ?>
                    <a href="<?php echo get_term_link($tag); ?>">
                        <?php echo $tag->name . ' | '; ?></a>
                    <?php

                }
            }

            ?>

        </div>

    </div>
</div>