<?php 

$categories_to_hide = array("Qurbani", "Eid", "Kaffarah", "Aqiqah", "Sadaqah",
 "Sadaqah Jariyah", "Zakat", "Ramadan", "Waqf", 
 "الصدقة", "الكفارة", "العقيقة", "الزكاة", "النذر", "الوقف", "رمضان", "كفالة اليتيم"); // add the categories you want to hide here

if (isset($args['archive']) && $args['archive'] == true) : ?>
    <div class="categories-and-search">
        <div class="categories-filter">
            <?php if (!empty($args['taxonomy_name'])) {
                $terms = get_terms(array(
                    'taxonomy' => $args['taxonomy_name'],
                    'hide_empty' => true,
                    'parent' => 0
                ));
                if (count($terms) > 0) {
                    foreach ($terms as $term) {
                        if (!in_array($term->name, $categories_to_hide)) {
            ?>
                            <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item">
                                <span><?php echo $term->name  ?></span>
                            </a>
            <?php
                        }
                    }
                }
            } ?>
        </div>

        <div class="input-holder search">

            <div class="input-holder search-input-holder">
                <div class="search-icon">
                    <svg id="Group_262" data-name="Group 262" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_153" data-name="Path 153" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_154" data-name="Path 154" d="M18.031,16.617,22.314,20.9,20.9,22.314l-4.282-4.283a9,9,0,1,1,1.414-1.414Zm-2.006-.742a7,7,0,1,0-.15.15l.15-.15Z" fill="#6d54a7" />
                    </svg>
                </div>
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : ''; ?>
                <input type="search" id="ajax-search-input" data-paged="<?php echo $paged; ?>" data-taxonomy="<?php echo $args['taxonomy_name']; ?>" data-postType="<?php echo get_post_type(); ?>" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
            </div>
            <?php //get_search_form() 
            ?>
        </div>
    </div>
<?php elseif (!isset($args['archive'])) : ?>
    <div class="categories-and-search">
        <div class="categories-filter-scroll">
            <div class="categories-filter">
                <?php if (!empty($args['taxonomy_name'])) {
                    $parent_id = get_term($args['queried_object']->term_id, $args['taxonomy_name'])->parent;
                    $current_term_id = "";
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
                            if (!in_array($term->name, $categories_to_hide)) {
                                $active = "";
                                if ($term->term_id == $args['queried_object']->term_id) {
                                    $active = "active";
                                    $current_term_id = $term->term_id;
                                }
                ?>
                                <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item <?php echo $active ?>">
                                    <span><?php echo $term->name  ?></span>
                                </a>
                            <?php
                            }
                        }
                    } else if (count($terms) > 0) {
                        foreach ($terms as $term) {
                            if (!in_array($term->name, $categories_to_hide)) {
                                $active = "";
                                if ($term->term_id == $args['queried_object']->term_id) {
                                    $active = "active";
                                    $current_term_id = $term->term_id;
                                }
                            ?>
                                <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item <?php echo $active ?>">
                                    <span><?php echo $term->name  ?></span>
                                </a>
                <?php
                            }
                        }
                    }
                } ?>
            </div>
        </div>


        <div class="input-holder search">

            <div class="input-holder search-input-holder">
                <div class="search-icon">
                    <svg id="Group_262" data-name="Group 262" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_153" data-name="Path 153" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_154" data-name="Path 154" d="M18.031,16.617,22.314,20.9,20.9,22.314l-4.282-4.283a9,9,0,1,1,1.414-1.414Zm-2.006-.742a7,7,0,1,0-.15.15l.15-.15Z" fill="#6d54a7" />
                    </svg>
                </div>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : '';
                if (empty($current_term_id) && empty($parent_id)) {
                    $current_term_id = $args['queried_object']->term_id;
                }
                ?>
                <input type="search" id="ajax-search-input" data-paged="<?php echo $paged; ?>" data-postType="<?php echo get_post_type(); ?>" data-taxonomy="<?php echo $args['taxonomy_name']; ?>" data-term="<?php echo $current_term_id ?>" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
            </div>
            <?php //get_search_form() 
            ?>
        </div>
    </div>


<?php endif; ?>