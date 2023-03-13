<footer>
    <div class="content text-center">
        <p>&copy;&nbsp;<?php echo date('Y') ?> Erstellt von <a href="https://zoja-aegerter.ch" target="_blank">Aegerter</a> | <a href="https://prorepairch.com/impressum/" target="_blank">Impressum</a> | <a href="https://prorepairch.com/datenschutz/" target="_blank">Datenschutz</a></p>

    </div>




</footer>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script>
    //Lazy Load script
    // This is "probably" IE9 compatible but will need some fallbacks for IE8
    // - (event listeners, forEach loop)

    // wait for the entire page to finish loading
    window.addEventListener('load', function() {

        // setTimeout to simulate the delay from a real page load
        setTimeout(lazyLoad, 1000);

    });

    function lazyLoad() {
        var card_images = document.querySelectorAll('.card-image');

        // loop over each card image
        card_images.forEach(function(card_image) {
            var image_url = card_image.getAttribute('data-image-full');
            var content_image = card_image.querySelector('img');

            // change the src of the content image to load the new high res photo
            content_image.src = image_url;

            // listen for load event when the new photo is finished loading
            content_image.addEventListener('load', function() {
                // swap out the visible background image with the new fully downloaded photo
                card_image.style.backgroundImage = 'url(' + image_url + ')';
                // add a class to remove the blur filter to smoothly transition the image change
                card_image.className = card_image.className + ' is-loaded';
            });

        });

    }

    function showImages(el) {
        var windowHeight = jQuery(window).height();
        $(el).each(function() {
            var thisPos = $(this).offset().top;

            var topOfWindow = $(window).scrollTop();
            if (topOfWindow + windowHeight - 200 > thisPos) {
                $(this).addClass("fadeIn");
            }
        });
    }

    // if the image in the window of browser when the page is loaded, show that image
    $(document).ready(function() {
        showImages('.star');
    });

    // if the image in the window of browser when scrolling the page, show that image
    $(window).scroll(function() {
        showImages('.star');
    });
</script>

<style>
    /* Lazy Load Styles */
    .card-image {
        display: block;
        min-height: 200px;
        /* layout hack */
        background: #fff center center no-repeat;
        background-size: cover;
        filter: blur(3px);
        /* blur the lowres image */
    }




    .star {
        visibility: hidden;
    }

    .fadeIn {
        -webkit-animation: animat_show 0.8s;
        animation: animat_show 0.8s;
        visibility: visible !important;
    }

    @-webkit-keyframes animat_show {
        0% {
            opacity: 0
        }

        100% {
            opacity: 1
        }
    }
</style>
</body>

</html>