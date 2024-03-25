<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bonyan
 */

get_header();
ob_start();
the_content();
$content = ob_get_clean();

global $withSideBar;
$withSideBarClass = !empty($withSideBar) ? 'with-sidebar' : '';
?>
<?php get_template_part('template-parts/page', 'header'); ?>
<div class="single-<?php echo get_post_type() ?>" <?php echo (get_post_type() == "campaign" || get_post_type() == "special_case") ? 'style="background-color: #EAEAEA"' : ''; ?>>
	<div class="container">
		<div class="custom-single-post-container <?php echo $withSideBarClass ?>">
			<div class="custom-post-container">
				<div class="inner-content">
					<?php
					if ($post_type === "") {
						get_template_part('template-parts/share-via');
					}
					if ($post_type === "campaign"){
						?><div class="vc_empty_space" style="height: 32px"><span class="vc_empty_space_inner"></span></div><?php
					}
					if ($post_type === "campaign" && is_mobile_or_ipad()) {
						?><div class="vc_empty_space" style="height: 32px"><span class="vc_empty_space_inner"></span></div><?php
						get_template_part('template-parts/components/campaign-timer');
					}
					if ($post_type === "special_case") {
					?>
						<div class="single-campaign-give-form-container py-lg-5 py-4">
							<?php
							get_template_part('template-parts/components/top-donor-special-case');
							?>
						</div>
					<?php
					} ?>
					<?php

					echo $content;

					if ($post_type === "") {
						get_template_part('template-parts/post-tag-cat');
					}

					?>

				</div>
			</div>

			<div class="custom-sidebar-container">
				<?php get_sidebar('post', array('content' => $content)); ?>
			</div>
		</div>
	</div>

</div>

<?php
//get_sidebar();
get_footer();
