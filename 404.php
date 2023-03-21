<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bonyan
 */

get_header();
?>
<style>
    .content-of-404 {
        display: flex;
        justify-content: center;
        margin: 200px 0 75px;
        flex-direction: column;
        align-items: center;
    }

    @media (max-width: 1024px) {
        .content-of-404 {
            margin: 150px 0 55px;
        }
    }

    .lottie-container {
        height: 500px;
        width: 100%;
    }

    @media (max-width: 1400px) {
        .lottie-container {
            height: auto;
        }
    }

    .content-of-404--text-cta {
        display: flex;
        flex-direction: column;
        gap: 15px;
        text-align: center;
        margin-top: -2rem;
    }

    .content-of-404--text-cta p {
        font-weight: bold;
        font-size: 1.5em;
        max-width: 700px;
        width: 100%;
        color: #38c2cf;
    }

    @media (max-width: 768px) {
        .content-of-404--text-cta p {
            font-size: 1.25em;
        }
    }

    .content-of-404-cta {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .content-of-404-cta form {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .content-of-404-cta input {
        width: 400px;
        max-width: 100%;
    }
    
    @media (max-width: 992px) {
        .content-of-404-cta input {
            width: 100%;
        }

        .wpb-bonyan-btn {
            width: 100%;
        }
    }

    .back-to-home{
        color: #6D54A7;
    }
</style>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<div class="container">
    <div class="content-of-404">
        <div class="content-of-404--image">
            <lottie-player class="lottie-container" src="<?php echo get_template_directory_uri() . '/dist/imgs/404.json' ?>" background="transparent" speed="1" style="width: 100%;" autoplay></lottie-player>
        </div>

        <div class="content-of-404--text-cta mt-4">
            <p>
                <?php _e("Sorry, but nothing matched your search terms. Please try again with some different keywords.", "bonyan") ?>
            </p>

            <div class="content-of-404-cta">
                <?php get_search_form() ?>
                <a href="<?php echo home_url(); ?>" class="wpb-bonyan-btn back-to-home">
                    <span><?php _e('Back To Home', 'bonyan'); ?></span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
