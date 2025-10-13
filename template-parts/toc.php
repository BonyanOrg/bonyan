<?php

$content = $args['content'];

$allowed_post_types = ['post'];
if (!in_array(get_post_type(), $allowed_post_types)) {
    return $content;
}



// Extract All Headers From The Content
preg_match_all('/<h([1-6])([^>]*)>(.*)<\/h[1-6]>/U', $content, $matches);

$tag_num = $matches[1]; // Getting header Tag Number [h1 => 1, h2 => 2, ....]
$ids = $matches[2]; // Get The Id We Created It Automaticlly
$titles = $matches[3]; // Get The Content In The Header

// Don't Create TOC if There Is No Headings In The Content
if (empty($tag_num))
    return $content;

foreach ($tag_num as $k => $h) {

    $id = '';
    // Check If Header Has Id Attribute
    if (preg_match('#id="([^"]*)"#', $ids[$k], $match) === 1) {
        $id = $match[1];
    }
    $toc[] = array(
        'header' => $h,
        'title' => strip_tags($titles[$k]),
        'bookmark' => $id,
    );
}

$currentDepth = 0;
ob_start();
?>
<div class="toc px-2 px-lg-4 my-4" style="background-color: #fff; border: 1px solid #1877F2; padding: 0.75rem 1rem; width: 500px; max-width: 100%; border-radius: 1rem;">
    <style>
        .toc ol li:before {
            content: counters(item, ".") " ";
            counter-increment: item
        }
    </style>

    <div class="toc-header mb-2" style="display: flex; justify-content: space-between; align-items: center;">
        <p style="margin: 0; font-size: 1.5rem; font-weight:500; color: #1877F2;"><?php _e('Content', 'bonyan') ?></p>
    </div>

    <div class="toc-holder" style="max-height: 300px; overflow-y: auto;">
        <?php
        foreach ($toc as $data) {

            if ($currentDepth == $data['header']) {
                echo '</li>';
                $currentDepth = $data['header'];
            }

            if ($data['header'] > $currentDepth) {
                echo '<ol class="px-2 px-lg-4" style="counter-reset: item; margin:0;">';
                $currentDepth = $data['header'];
            }

            if ($data['header'] < $currentDepth) {
                $currentDepth = $data['header'];
                echo '</li>';
                echo '</ol>';
            }

        ?>
            <li style="display: block;">
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
<!-- <script type="text/javascript" defer>
        window.onload = function() {
            jQuery(".toc-header").click(function() {
                jQuery(".toc-holder").slideToggle(500);
            });
        }
    </script> -->
<?php
$table = ob_get_clean();
echo $table;
