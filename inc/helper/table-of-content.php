<?php

add_filter('the_content', 'get_table_of_content', 99);
function get_table_of_content($content)
{
    global $withSideBar;
    $old_content = $content;
    $allowed_post_types = ['post'];
    if (!in_array(get_post_type(), $allowed_post_types)) {
        return $content;
    }

    if (str_contains($content, 'nnoo__TABLE_OF_CONTENT__ooff')) {
        $content = str_replace('<p>nnoo__TABLE_OF_CONTENT__ooff</p>', '', $content);
        return $content;
    }



    // Auto Add Id To Headers
    $content = preg_replace_callback('/(\<h[1-6]([^>]*))\>(.*)(<\/h[1-6]>)/U', function ($matches) {
        if (!stripos($matches[0], 'id=')) {
            $matches[0] = $matches[1] . ' id="' . urldecode(sanitize_title($matches[3])) . '">' . $matches[3] . $matches[4];
        }
        return $matches[0];
    }, $content);
    // Check If the content Has been modified
    if ($old_content !== $content) {
        $withSideBar = true; // Then The post will Get Sidebar
    }
    return $content;
}