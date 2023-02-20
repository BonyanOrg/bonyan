<?php get_header(); ?>

<?php echo get_template_part('template-parts/page-head'); ?>

<div class="container">
    <div class="volunteer my-4 my-md-5">
        <div class="contact-details">
            <h2 class="bonyan-title primary-color mb-4">Join us as Volunteer</h2>

            <p>You can contact with us directly using one of the information below or you can send email using the form, we’ll be happy to assist you, don’t hesitate to contact us</p>

            <?php echo get_template_part('template-parts/contact-info'); ?>
        </div>

        <div class="contact-form">
            <?php echo do_shortcode('[contact-form-7 id="86" title="Volunteer"]'); ?>
        </div>
    </div>
</div>
<?php get_footer();