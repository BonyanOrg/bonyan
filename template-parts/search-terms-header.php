<?php if (isset($args['archive']) && $args['archive'] == true) : ?>
    <div class="categories-and-search">
        <div class="categories-filter">
            <?php if (!empty($args['taxonomy_name'])) {
                $terms = get_terms(array(
                    'taxonomy' => $args['taxonomy_name'],
                    'hide_empty' => false,
                    'parent' => 0
                ));
                if (count($terms) > 0) {
                    foreach ($terms as $term) {
            ?>
                        <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item">
                            <span><?php echo $term->name  ?></span>
                        </a>
            <?php
                    }
                }
            } ?>
        </div>

        <div class="input-holder search">
            <?php get_search_form() ?>
        </div>
    </div>
<?php elseif (!isset($args['archive'])) : ?>
    <div class="categories-and-search">
        <div class="categories-filter-scroll">
            <div class="categories-filter">
                <?php if (!empty($args['taxonomy_name'])) {
                    $parent_id = get_term($args['queried_object']->term_id, $args['taxonomy_name'])->parent;

                    $terms = get_terms(array(
                        'taxonomy' => $args['taxonomy_name'],
                        'hide_empty' => true,
                        'parent' => 0
                    ));
                    $term_childrens = get_terms(array(
                        'taxonomy' => $args['taxonomy_name'],
                        'hide_empty' => true,
                        'hierarchical'          => 1,
                        'child_of'              => !empty($parent_id) ? $parent_id : $args['queried_object']->term_id,

                    ));
                    if (count($term_childrens) > 0 || !empty($parent_id)) {
                        foreach ($term_childrens as $term) {
                            $active = "";
                            if ($term->term_id == $args['queried_object']->term_id) {
                                $active = "active";
                            }
                        ?>
                            <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item <?php echo $active ?>">
                                <span><?php echo $term->name  ?></span>
                            </a>
                        <?php
                        }
                    } else if (count($terms) > 0) {
                        foreach ($terms as $term) {
                            $active = "";
                            if ($term->term_id == $args['queried_object']->term_id) {
                                $active = "active";
                            }
                        ?>
                            <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item <?php echo $active ?>">
                                <span><?php echo $term->name  ?></span>
                            </a>
                <?php
                        }
                    }
                } ?>
            </div>
        </div>


        <div class="input-holder search">
            <?php get_search_form() ?>
        </div>
    </div>


<?php endif; ?>