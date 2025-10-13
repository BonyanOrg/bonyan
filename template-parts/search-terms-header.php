<?php if (isset($args['archive']) && $args['archive'] == true) : ?>
    <div class="categories-and-search">
        <div class="categories-filter">
            <?php if (!empty($args['taxonomy_name'])) {
                $terms = get_terms(array(
                    'taxonomy' => $args['taxonomy_name'],
                    'hide_empty' => true,
                    'parent' => 0
                ));
                if (count($terms) > 0) {
                    // Show first 4 categories as buttons
                    $first_four = array_slice($terms, 0, 4);
                    $remaining_terms = array_slice($terms, 4);
                    
                    foreach ($first_four as $term) {
            ?>
                        <a href=" <?php echo get_term_link($term->term_id) ?> " class="category-filter-item">
                            <span><?php echo $term->name  ?></span>
                        </a>
            <?php
                    }
                    
                    // If there are more than 4 categories, show dropdown for remaining (desktop only)
                    if (count($remaining_terms) > 0) {
                        $has_selection = false;
                        foreach ($remaining_terms as $term) {
                            if ($term->term_id == $args['queried_object']->term_id) {
                                $has_selection = true;
                                break;
                            }
                        }
            ?>
                        <div class="select-holder category-select-holder <?php echo $has_selection ? 'has-selection' : ''; ?>">
                            <div class="select-icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                            <select class="category-select" onchange="if(this.value) { this.closest('.category-select-holder').classList.add('has-selection'); window.location.href=this.value; }" onfocus="this.selectedIndex = this.selectedIndex;">
                                <option value=""><?php _e('More Categories...', 'bonyan') ?></option>
                                <?php foreach ($remaining_terms as $term) : ?>
                                    <option value="<?php echo get_term_link($term->term_id) ?>" <?php echo ($term->term_id == $args['queried_object']->term_id) ? 'selected' : ''; ?>><?php echo $term->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
            <?php
                    }
                    
                    // On mobile, show all remaining categories as scrollable buttons
                    if (count($remaining_terms) > 0) {
                        foreach ($remaining_terms as $term) {
                            $active = "";
                            if ($term->term_id == $args['queried_object']->term_id) {
                                $active = "active";
                            }
            ?>
                            <a href="<?php echo get_term_link($term->term_id) ?>" class="category-filter-item mobile-only <?php echo $active ?>">
                                <span><?php echo $term->name ?></span>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M21 20.9997L17.5096 17.5095M17.5096 17.5095C19.0471 15.9714 19.998 13.8468 19.998 11.5C19.998 6.80558 16.1929 3 11.499 3C6.80514 3 3 6.80558 3 11.5C3 16.1944 6.80514 20 11.499 20C13.8464 20 15.9715 19.0482 17.5096 17.5095Z" stroke="#455973" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
                        // Show first 4 child categories as buttons
                        $first_four = array_slice($term_childrens, 0, 4);
                        $remaining_terms = array_slice($term_childrens, 4);
                        
                        foreach ($first_four as $term) {
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
                        
                        // If there are more than 4 child categories, show dropdown for remaining (desktop only)
                        if (count($remaining_terms) > 0) {
                            $has_selection = false;
                            foreach ($remaining_terms as $term) {
                                if ($term->term_id == $args['queried_object']->term_id) {
                                    $has_selection = true;
                                    break;
                                }
                            }
                ?>
                            <div class="select-holder category-select-holder <?php echo $has_selection ? 'has-selection' : ''; ?>">
                                <div class="select-icon">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                                <select class="category-select" onchange="if(this.value) { this.closest('.category-select-holder').classList.add('has-selection'); window.location.href=this.value; }" onfocus="this.selectedIndex = this.selectedIndex;">
                                    <option value=""><?php echo _e('More Categories...', 'bonyan') ?></option>
                                    <?php foreach ($remaining_terms as $term) : ?>
                                        <option value="<?php echo get_term_link($term->term_id) ?>" <?php echo ($term->term_id == $args['queried_object']->term_id) ? 'selected' : ''; ?>><?php echo $term->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                <?php
                        }
                        
                        // Mobile categories are handled by the dropdown, no need for duplicate buttons
                    } else if (count($terms) > 0) {
                        // Show first 4 top-level categories as buttons
                        $first_four = array_slice($terms, 0, 4);
                        $remaining_terms = array_slice($terms, 4);
                        
                        foreach ($first_four as $term) {
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
                        
                        // If there are more than 4 top-level categories, show dropdown for remaining (desktop only)
                        if (count($remaining_terms) > 0) {
                            $has_selection = false;
                            foreach ($remaining_terms as $term) {
                                if ($term->term_id == $args['queried_object']->term_id) {
                                    $has_selection = true;
                                    break;
                                }
                            }
                ?>
                            <div class="select-holder category-select-holder <?php echo $has_selection ? 'has-selection' : ''; ?>">
                                <div class="select-icon">
                                    <i class="fa-solid fa-angle-down"></i>
                                </div>
                                <select class="category-select" onchange="if(this.value) { this.closest('.category-select-holder').classList.add('has-selection'); window.location.href=this.value; }" onfocus="this.selectedIndex = this.selectedIndex;">
                                    <option value=""><?php echo _e('More Categories...', 'bonyan') ?></option>
                                    <?php foreach ($remaining_terms as $term) : ?>
                                        <option value="<?php echo get_term_link($term->term_id) ?>" <?php echo ($term->term_id == $args['queried_object']->term_id) ? 'selected' : ''; ?>><?php echo $term->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                <?php
                        }
                        
                        // Mobile categories are handled by the dropdown, no need for duplicate buttons
                    }
                } ?>
            </div>
        </div>


        <div class="input-holder search">

            <div class="input-holder search-input-holder">
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M21 20.9997L17.5096 17.5095M17.5096 17.5095C19.0471 15.9714 19.998 13.8468 19.998 11.5C19.998 6.80558 16.1929 3 11.499 3C6.80514 3 3 6.80558 3 11.5C3 16.1944 6.80514 20 11.499 20C13.8464 20 15.9715 19.0482 17.5096 17.5095Z" stroke="#455973" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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