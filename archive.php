<?php


get_header();

get_template_part('template-parts/page', 'header');

get_template_part('template-parts/archive/content', get_post_type());

get_footer();
