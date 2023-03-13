<?php

add_filter('the_content', 'get_table_of_content', 99);
function get_table_of_content($content)
{

    if (get_post_type() !== 'post') {
        return $content;
    }
    if (str_contains($content, 'nnoo__TABLE_OF_CONTENT__ooff')) {
        $content = str_replace('<p>nnoo__TABLE_OF_CONTENT__ooff</p>', '', $content);
        return $content;
    }

    // Auto Add Id To Headers
    $content = preg_replace_callback('/(\<h[1-6]([^>]*))\>(.*)(<\/h[1-6]>)/U', function ($matches) {
        if (!stripos($matches[0], 'id=')) {
            $matches[0] = $matches[1] . ' id="' . sanitize_title($matches[3]) . '">' . $matches[3] . $matches[4];
        }
        return $matches[0];
    }, $content);

    // Extract All Headers From The Content
    preg_match_all('/<h([1-6])([^>]*)>(.*)<\/h[1-6]>/U', $content, $matches);

    $tag_num = $matches[1]; // Getting header Tag Number [h1 => 1, h2 => 2, ....]
    $ids = $matches[2]; // Get The Id We Created It Automaticlly
    $titles = $matches[3]; // Get The Content In The Header

    // Don't Create TOC if There Is No Headings In The Content
    if (empty($tag_num)) return $content;

    foreach ($tag_num as $k => $h) {

        $id = '';
        // Check If Header Has Id Attribute
        if (preg_match('#id="([^"]*)"#', $ids[$k], $match) === 1) {
            $id = $match[1];
        }
        $toc[] = array(
            'header'    => $h,
            'title'     => strip_tags($titles[$k]),
            'bookmark'  => $id,
        );
    }

    $currentDepth = 0;
    ob_start();
?>
    <div class="toc mt-3 mt-lg-5" style="background-color: #fff; border: 1px solid #6D54A7; padding: 0.75rem 1rem; width: 500px; max-width: 100%; margin-bottom: 1rem;border-radius: 1rem;">
        <style>
            .toc ol li:before {
                content: counters(item, ".") " ";
                counter-increment: item
            }
        </style>
        <div class="toc-header" style="display: flex; justify-content: space-between; align-items: center; cursor:pointer">
            <p style="margin: 0; font-size: 1.5rem; font-weight:500; color: #6D54A7;">Content</p>
            <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50">
                    <path id="down-chevron" d="M25,0A25,25,0,1,0,50,25,25,25,0,0,0,25,0Zm0,35.95L10.924,21.92l2.327-2.335L25,31.3l11.748-11.71,2.327,2.335Z" fill="#6D54A7" />
                </svg></span>
        </div>
        <div class="toc-holder" style="display: none; margin-top: 1rem;">
            <?php
            foreach ($toc as $data) {

                if ($currentDepth == $data['header']) {
                    echo '</li>';
                    $currentDepth = $data['header'];
                }

                if ($data['header'] > $currentDepth) {
                    echo '<ol style="counter-reset: item; padding-right: 1.1rem; margin:0;">';
                    $currentDepth = $data['header'];
                }

                if ($data['header'] < $currentDepth) {
                    $currentDepth = $data['header'];
                    echo '</li>';
                    echo '</ol>';
                }

            ?>
                <li style="display: block">
                    <a href="#<?php echo $data['bookmark'] ?>" style="font-size: 16px;"><?php echo $data['title'] ?></a>
                <?php

            }
            while ($currentDepth > 0) {
                echo '</li>';
                echo '</ol>';
                $currentDepth--;
            }
                ?>
        </div>
    </div>
    <script type="text/javascript" defer>
        window.onload = function() {
            jQuery(".toc-header").click(function() {
                jQuery(".toc-holder").slideToggle(500);
            });
        }
    </script>
<?php
    $table = ob_get_clean();
    return $table . $content;
}
