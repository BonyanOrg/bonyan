<?php
function donation_share_shortcode() {
    ob_start(); // Start output buffering
    ?>

    <!-- Here comes the HTML and CSS part -->

    <style>
    #donationShareForm {
        margin: 20px 0;
        display: flex;
        flex-direction: column;
    }

    #donationShareForm label,
    #donationShareForm input,
    #donationShareForm textarea {
        margin-bottom: 10px;
    }

    .social-share .link {
        margin-right: 10px;
        padding: 8px 15px;
        border-radius: 3px;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .social-share .twitter {
        background-color: #55acee;
    }

    .social-share .facebook {
        background-color: #3b5998;
    }

    .social-share .whatsapp {
        background-color: #25D366;
    }

    .social-share .telegram {
        background-color: #0088cc;
    }
    </style>

 
<main id="content">
    <div class="container">
        <form id="donationShareForm">
            <label for="donationAmount">Donation Amount:</label>
            <input type="number" id="donationAmount" placeholder="$">

            <label for="shareMessage">Share Message:</label>
            <textarea id="shareMessage" placeholder="Enter your message"></textarea>

            <input type="button" value="Share" onclick="generateShareLinks()">
        </form>

        <div id="dynamicSocialShare"></div>
    </div>

    <script>
        function generateShareLinks() {
            var amount = document.getElementById('donationAmount').value;
            var message = document.getElementById('shareMessage').value;

            var url = encodeURIComponent(window.location.href);
            var shareMessage = encodeURIComponent(message + ' $' + amount + ' to this cause!');

            var twitterURL = 'https://twitter.com/intent/tweet?text=' + shareMessage + '&url=' + url;
            var facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' + url + '&quote=' + shareMessage;
            var whatsAppURL = 'https://api.whatsapp.com/send?text=' + shareMessage + ' ' + url;
            var telegramURL = 'https://telegram.me/share/url?url=' + url + '&text=' + shareMessage;

            var output = '<div class="social-share">';
            output += '<a class="link twitter" href="' + twitterURL + '" target="_blank">Twitter</a>';
            output += '<a class="link facebook" href="' + facebookURL + '" target="_blank">Facebook</a>';
            output += '<a class="link whatsapp" href="' + whatsAppURL + '" target="_blank">WhatsApp</a>';
            output += '<a class="link telegram" href="' + telegramURL + '" target="_blank">Telegram</a>';
            output += '</div>';

            document.getElementById('dynamicSocialShare').innerHTML = output;
        }
    </script>
</main>

    <?php
    return ob_get_clean(); // Return the buffered output
}

add_shortcode('donation_share', 'donation_share_shortcode');
