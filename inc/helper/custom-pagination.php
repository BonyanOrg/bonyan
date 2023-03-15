<?php
/**
 * Custom pagination functions
 *
 */

if ( ! function_exists( 'custom_pagination' ) ) {

	function custom_pagination( $query = '', $echo = true ) {
		
		// Get global $query
		if ( ! $query ) {
			global $wp_query;
			$query = $wp_query;
		}

		// Set vars
		$total  = $query->max_num_pages;
		$big    = 999999999;

		// Display pagination
		if ( $total > 1 ) {

			// Get current page
			if ( $current_page = get_query_var( 'paged' ) ) {
				$current_page = $current_page;
			} elseif ( $current_page = get_query_var( 'page' ) ) {
				$current_page = $current_page;
			} else {
				$current_page = 1;
			}

			// Get permalink structure
			if ( get_option( 'permalink_structure' ) ) {
				if ( is_page() ) {
					$format = 'page/%#%/';
				} else {
					$format = '/%#%/';
				}
			} else {
				$format = '&paged=%#%';
			}

			$args = apply_filters( 'custom_pagination_args', array(
				'base'      => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
				'format'    => $format,
				'current'   => max( 1, $current_page ),
				'total'     => $total,
				'mid_size'  => 3,
				'type'      => 'array',
				'prev_next' => true,
				'prev_text' => '<div class="prev-pagination-btn"></div>',
				'next_text' => '<div class="next-pagination-btn"></div>',
			) );


			$all_pages = paginate_links( $args );


			// Output pagination
			if ( $echo ) {
				echo '<div class="pagination">';
					foreach ($all_pages as $page) {
						echo str_replace('page-numbers', 'btn', $page) . ($page != end($all_pages) && count($all_pages) >= 1 ? '<span class="delimeter"></span>' : '');
					}
				echo '</div>';
			} else {

				ob_start(); 
				?>

				<div class="pagination">
					<?php foreach ($all_pages as $page) {
						echo str_replace('page-numbers', 'btn', $page) . ($page != end($all_pages) && count($all_pages) >= 1 ? '<span class="delimeter"></span>' : '');
					} ?>
				</div>

				<?php return ob_get_clean();
			}

		}

	}
	
}


