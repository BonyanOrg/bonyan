<?php
function my_login_logo()
{
    wp_enqueue_style('bonyan-style', get_template_directory_uri() . "/dist/css/style.min.css");
    // Removed reference to non-existent login-register.min.css file

?>

    <style type="text/css">
        body {
            background: linear-gradient(45deg, #3E52C2, transparent) !important;
            padding: 1rem !important;
        }

        .login .message {
            border-left-color: #3E52C2 !important;
        }

        .login label {
            color: #3E52C2;
            font-weight: bold;
        }

        #login {
            max-width: 400px;
            width: 100% !important;
        }

        #login h1 a {
            width: 100% !important;
        }

        form {
            border-radius: 10px;
            border: none !important;
            box-shadow: 0 0 3px rgba(0, 0, 0, .1) !important;
            padding: 3rem !important;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
            grid-gap: 0.5rem;
        }

        @media (max-width: 992px) {
            form {
                padding: 2rem !important;
            }
        }

        #login h1 a,
        .login h1 a {
            	background-image: url(<?php echo get_stylesheet_directory_uri() . '/dist/imgs/smile-logo.png' ?>);
            height: 65px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }

        #wp-submit {
            align-self: flex-start;
            padding: .15rem 1rem;
            border-radius: 10px;
            margin-top: 0.5rem;
            font-size: 14px !important;
            background: #3E52C2;
            border: none;
            outline: none;
        }

        #wp-submit:focus {
            outline: none;
            box-shadow: none;
        }

        input[type="text"],
        input[type="password"] {
            font-size: 16px !important;
            width: 100% !important;
            border: 1px solid #3E52C2 !important;
            padding: 0.5rem !important;
            outline: none !important;
            color: #3E52C2 !important;
            background: #fbfaff !important;
            border-radius: 10px !important;
        }

        .wp-pwd {
            width: 100%;
        }

        .input-holder {
            flex-direction: column;
            align-items: flex-start !important;
            width: 100%;
        }

        .input-holder label {
            font-size: 20px !important;
            color: #3E52C2 !important;
            margin-bottom: 0.35rem !important;
            font-weight: bold !important;
        }

        #nav a {
            display: none;
        }

        #backtoblog {
            padding: 0 !important;
        }

        #backtoblog a {
            font-size: 18px;
            background: #fff;
            color: #3E52C2 !important;
            padding: 0.35rem 1rem;
            border: 1px solid #3E52C2;
            border-radius: 10px;
        }

        .user-pass-wrap {
            width: 100%;
        }

        .reset-pass-submit {
            display: flex !important;
            flex-direction: column !important;
        }

        .wp-generate-pw {
            color: #F47920 !important;
            border: 1px solid #F47920 !important;
            background: transparent !important;
            padding: 0.15rem 0.25rem !important;
            border-radius: 10px !important;
            margin-bottom: 1rem !important;
        }
        .wpml-login-ls {
            display: none !important;
        }
    </style>
    <?php wp_enqueue_script('custom-login', get_stylesheet_directory_uri() . '/dist/js/style-login.js', array(), 1, true); ?>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');
