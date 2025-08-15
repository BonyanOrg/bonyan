<form method="get" action="<?= home_url('/'); ?>" class="search-form">
	<div class="input-holder search-input-holder">
		<div class="search-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
			  <path d="M21 20.9997L17.5096 17.5095M17.5096 17.5095C19.0471 15.9714 19.998 13.8468 19.998 11.5C19.998 6.80558 16.1929 3 11.499 3C6.80514 3 3 6.80558 3 11.5C3 16.1944 6.80514 20 11.499 20C13.8464 20 15.9715 19.0482 17.5096 17.5095Z" stroke="#455973" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
		<input type="search" name="s" id="header-search-input" placeholder="<?php _e('Search...', 'bonyan') ?>" value="<?php the_search_query(); ?>" class="ps-5 pe-2">
		<?php print_lang_input_if_required_for_search(); ?>
	</div>
</form>