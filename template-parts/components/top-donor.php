<?php
$give_form_id = get_post_meta($args['post_id'], "co_give_form_id", true);
if (!empty($give_form_id)) {
    echo do_shortcode('[give_form id="' . $give_form_id . '"]', true);
    global $wpdb;
    $sql = "
SELECT p1.ID FROM bn_posts as p1 INNER JOIN bn_give_donationmeta as m1 ON (p1.ID = m1.donation_id)
INNER JOIN bn_give_donationmeta as m2 ON (p1.ID = m2.donation_id)
WHERE p1.post_status IN ('publish')
AND p1.post_type = 'give_payment'
AND m1.meta_key='_give_payment_total'
AND m1.meta_value>0 AND m2.meta_key='_give_payment_form_id'
AND m2.meta_value IN ('" . $give_form_id . "')
ORDER BY p1.post_date DESC, p1.ID DESC";

    $donation_ids = $wpdb->get_col($sql);
    $donation_ids = !empty($donation_ids)
        ? '\'' . implode('\',\'', $donation_ids) . '\''
        : '';

    if (!empty($donation_ids)) {
        $sql = "
SELECT m1.*, p1.post_date as donation_date FROM bn_give_donationmeta as m1
INNER JOIN bn_posts as p1 ON (m1.donation_id=p1.ID)
WHERE m1.donation_id IN ( {$donation_ids} )
ORDER BY FIELD( p1.ID, {$donation_ids} );
";

        $results = (array) $wpdb->get_results($sql);

        if (!empty($results)) {
            $temp = [];
            $give_payment_totals = [];

            /* @var stdClass $result */
            foreach ($results as $result) {
                $temp[$result->{'donation_id'}][$result->meta_key] = maybe_unserialize($result->meta_value);

                // Set donation date.
                if (empty($temp[$result->{'donation_id'}]['donation_date'])) {
                    $temp[$result->{'donation_id'}]['donation_date'] = $result->donation_date;
                }
            }


            if (!empty($temp)) {
                foreach ($temp as $donation_id => $donation_data) {
                    $temp[$donation_id]['donation_id'] = $donation_id;
                    array_push($give_payment_totals, $temp[$donation_id]["_give_payment_total"]);
                }
                $results = !empty($temp) ? $temp : [];
                $top_donation = max($give_payment_totals);
                foreach ($temp as $donation_id => $donation_data) {
                    $temp[$donation_id]['donation_id'] = $donation_id;
                    if (!empty(array_search($top_donation, $temp[$donation_id]))) {
                        $top_donor_email = $temp[$donation_id]["_give_payment_donor_email"];
                    }
                }
                $top_donor = get_user_by('email', $top_donor_email);
                $top_donor_name = get_user_meta($top_donor->ID, 'first_name', true) . ' ' . get_user_meta($top_donor->ID, 'last_name', true);
                $user_profile_photo = ($user_profile_photo = get_user_meta($top_donor->ID, 'user_profile_photo', true)) ? $user_profile_photo : 'https://st3.depositphotos.com/9998432/13335/v/600/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg';
?>

            <?php get_template_part('template-parts/components/campaign-timer'); ?>
			<div class="data-and-share mt-4">
				<div class="post-share">
					<span><?php _e('Share via', 'bonyan'); ?></span>

					<div class="share-socialmedia">
						<a rel="noreferrer" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo home_url() . '?p=' . get_the_ID(); ?>"><i class="fa-brands fa-facebook-f"></i></a>

						<a rel="noreferrer" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo home_url() . '?p=' . get_the_ID(); ?>"><i class="fa-brands fa-twitter"></i></a>

						<!-- <a rel="noreferrer" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php //echo get_permalink(); 
																												?>"><i class="fa-brands fa-linkedin"></i></a> -->

						<!-- <a rel="noreferrer" target="_blank" href="https://t.me/share/url?url=<?php //echo get_permalink(); 
																									?>&text=<?php //the_title(); 
																											?>"><i class="fa-brands fa-telegram"></i></a> -->

						<!-- <a rel="noreferrer" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php //echo urlencode(get_permalink()); 
																															?>"><i class="fa-brands fa-twitter"></i></a> -->

						<a rel="noreferrer" target="_blank" href="mailto:?subject=<?php the_title(); ?>&body=<?php echo home_url() . '?p=' . get_the_ID(); ?>"><i class="fa-solid fa-envelope"></i></a>
					</div>
				</div>
			</div>
                <div class="top-donation-stats mt-3 mt-lg-4">
                    <!-- Start Top Donations -->
                    <div class="top-donation-stats-item top-donations">

                        <h3 class="top-donation-stats-title bonyan-title primary-color"><?php _e('Top Donation', 'bonyan') ?></h3>

                        <div class="top-donation-stats-card">
                            <div class="top-donations--amount">
                                <div class="star-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68.981" height="68.468" viewBox="0 0 68.981 68.468">
                                        <defs>
                                            <filter id="Icon_awesome-star" x="0" y="0" width="68.981" height="68.468" filterUnits="userSpaceOnUse">
                                                <feOffset dy="3" input="SourceAlpha" />
                                                <feGaussianBlur stdDeviation="3" result="blur" />
                                                <feFlood flood-opacity="0.161" />
                                                <feComposite operator="in" in2="blur" />
                                                <feComposite in="SourceGraphic" />
                                            </filter>
                                        </defs>
                                        <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Icon_awesome-star)">
                                            <path id="Icon_awesome-star-2" data-name="Icon awesome-star" d="M18.232,1.252l-4.591,9.309-10.273,1.5A2.251,2.251,0,0,0,2.123,15.9L9.555,23.14,7.8,33.37a2.249,2.249,0,0,0,3.262,2.37l9.19-4.83,9.19,4.83A2.25,2.25,0,0,0,32.7,33.37L30.945,23.14,38.377,15.9a2.251,2.251,0,0,0-1.245-3.839l-10.273-1.5L22.268,1.252a2.252,2.252,0,0,0-4.036,0Z" transform="matrix(0.85, 0.53, -0.53, 0.85, 26.86, 5.24)" fill="#ac93e4" />
                                        </g>
                                    </svg>
                                </div>
                                <span class="the-currency">$</span>
                                <span class="the-amount"><?php echo number_format($top_donation, 2, ',', '') ?></span>
                            </div>

                            <div class="top-donation-stats-name">
                                <span><?php echo $top_donor_name ?></span>
                            </div>

                            <!-- <div class="top-donation-stats-city">
                <span>Emarates</span>
            </div> -->
                        </div>
                    </div>
                    <!-- End Top Donations -->

                    <!-- Start Top Donors -->
                    <div class="top-donation-stats-item top-donors">
                        <h3 class="top-donation-stats-title bonyan-title primary-color"><?php _e('Top Donor', 'bonyan') ?></h3>

                        <div class="top-donation-stats-card">
                            <div class="top-donors--avatar">
                                <div class="star-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68.981" height="68.468" viewBox="0 0 68.981 68.468">
                                        <defs>
                                            <filter id="Icon_awesome-star" x="0" y="0" width="68.981" height="68.468" filterUnits="userSpaceOnUse">
                                                <feOffset dy="3" input="SourceAlpha" />
                                                <feGaussianBlur stdDeviation="3" result="blur" />
                                                <feFlood flood-opacity="0.161" />
                                                <feComposite operator="in" in2="blur" />
                                                <feComposite in="SourceGraphic" />
                                            </filter>
                                        </defs>
                                        <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Icon_awesome-star)">
                                            <path id="Icon_awesome-star-2" data-name="Icon awesome-star" d="M18.232,1.252l-4.591,9.309-10.273,1.5A2.251,2.251,0,0,0,2.123,15.9L9.555,23.14,7.8,33.37a2.249,2.249,0,0,0,3.262,2.37l9.19-4.83,9.19,4.83A2.25,2.25,0,0,0,32.7,33.37L30.945,23.14,38.377,15.9a2.251,2.251,0,0,0-1.245-3.839l-10.273-1.5L22.268,1.252a2.252,2.252,0,0,0-4.036,0Z" transform="matrix(0.85, 0.53, -0.53, 0.85, 26.86, 5.24)" fill="#ac93e4" />
                                        </g>
                                    </svg>
                                </div>
                                <img data-src="<?php echo $user_profile_photo; ?>" alt="" class="lazyload">
                            </div>

                            <div class="top-donation-stats-name">
                                <span><?php echo $top_donor_name ?></span>
                            </div>

                            <!-- <div class="top-donation-stats-city">
                <span>Emarates</span>
            </div> -->
                        </div>
                    </div>
                    <!-- End Top Donors -->
                </div>
<?php

            }
        }
    }
}

?>