         <!-- Start Wishlist Tab Content -->
         <div class="d-none dashboard-tab-content" id="wishlist">
             <div class="dashboard-content-section-heading py-3">
                 <div class="dashboard-content-section-heading-title with-padding">
                     <span>Wishlist</span>
                 </div>
             </div>

             <div class="dashboard-content-section-body">
                 <div class="campaign">
                     <div class="cards-container">
                         <?php

                            $user_id = get_current_user_id();
                            $user_fav_campaigns = get_user_meta($user_id, 'FavCampaigns', true);
                            $fav_campaign_array = explode(",", $user_fav_campaigns);

                            $args = array(
                                'post_type' => 'campaign',
                                'post_status ' => 'publish',
                                'posts_per_page' => -1,
                                'post__in' => $fav_campaign_array,

                            );
                            $favorite_user_campaigns = new WP_Query($args);

                            if ($favorite_user_campaigns->have_posts()) :
                                while ($favorite_user_campaigns->have_posts()) :
                                    $favorite_user_campaigns->the_post();
                            ?>
                                 <?php get_template_part('template-parts/cards/content', 'campaign', array('is_donor_dashboard' => true)); ?>
                         <?php
                                endwhile;
                            endif;
                            ?>

                     </div>
                 </div>
             </div>
         </div>
         <!-- End Wishlist Tab Content -->