<?php

$PDF_file = get_post_meta(get_the_ID(), 'ro_reports_pdf_file', true);
$PDF_file_url = wp_get_attachment_url($PDF_file);
?>
<div class="file-card">
    <!-- File Icon (No need to be dynamic) -->
    <div class="file-icon">
        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/report-icon.png'; ?>" alt="Report Download Icon" class="lazyload">
    </div>

    <!-- File Name -->
    <h3 class="file-name"><?php the_title() ?></h3>

    <!-- File CTAs -->
    <div class="file-cta">
        <a href="<?php echo $PDF_file_url ?>"  class="reversed-primary-btn preview-file"><?php _e('Preview','bonyan') ?></a>
        <a href="<?php echo $PDF_file_url ?>" target="_blank" download class="primary-btn download-file"><?php _e('Download the file','bonyan') ?></a>
    </div>
</div>