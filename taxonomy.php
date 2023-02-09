<?php
$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomy;




get_header();



get_template_part('template-parts/page', 'header');





get_template_part('template-parts/taxonomy/content', $taxonomy_name);

get_footer();
