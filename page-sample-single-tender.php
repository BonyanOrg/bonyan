<?php get_header(); ?>
<?php echo get_template_part('template-parts/page-head'); ?>

<div class="single-tender">
    <div class="container">
        <div class="content-with-info-panel">
            <div class="inner-content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>
            </div>

            <div class="info-panel">
                <?php echo get_template_part('template-parts/report-card') ?>
            </div>
        </div>

        <div class="contact-us-container my-4 my-md-5">
            <div class="contact-details">
                <h2 class="bonyan-title primary-color">Apply now</h2>
                <p>You can contact with us directly using one of the information below or you can send email using the form, we’ll be happy to assist you, don’t hesitate to contact us</p>

                <?php get_template_part('template-parts/contact-info'); ?>

                <div class="map-location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1591.9616502370418!2d37.3792826496942!3d37.059310909078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531e14abe53fe11%3A0xa97272ab75601058!2sAlaybey%2C%2027010%20%C5%9Eahinbey%2FGaziantep!5e0!3m2!1sen!2str!4v1677050872149!5m2!1sen!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="133" title="Tenders"]'); ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer();
