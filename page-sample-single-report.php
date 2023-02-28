<?php get_header(); ?>
<?php echo get_template_part('template-parts/page-head'); ?>


<div class="single-report">
    <div class="container">
        <div class="content-with-info-panel">
            <div class="inner-content">
                <br><br>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>
            </div>

            <div class="info-panel">
                <?php echo get_template_part('template-parts/file-card') ?>
            </div>
        </div>

        <div class="global-header-search">
            <h2 class="bonyan-title primary-color">Recent Tenders</h2>

            <div class="input-holder">
                <input type="search" class="custom-datatable-search" placeholder="Search in this page">
            </div>
        </div>

        <!-- Start Reports Cards -->
        <div class="cards-container grid-4">
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
            <?php echo get_template_part('template-parts/file-card') ?>
        </div>
        <!-- End Reports Cards -->
    </div>
</div>


<?php get_footer();
