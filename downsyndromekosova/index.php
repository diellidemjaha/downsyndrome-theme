<?php

/**
 * Template Name: Home Page
 */ ?>

<head>

    <?php
    get_header(); ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <?php wp_head(); ?>
</head>
<script>
    $(document).ready(function() {
        $('.home_slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            autoplay: true,
            autoplaySpeed: 2000,
            fade: true,
            cssEase: 'linear',
            dots: true, // Add dots for navigation
            arrows: false, // Remove previous and next buttons
            swipe: true,
            fade: false,
            //  rtl: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
<!-- <div class="site-main">
    <div class="home_slider" dir>
        <img src="<?php echo get_template_directory_uri(); ?>/image1.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/image2.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/image3.jpg">
    </div> -->
<div class="site-main">
    <div class="home_slider" dir>
        <?php
        // Query to retrieve images from the custom post type "image_gallery"
        $args = array(
            'post_type' => 'slider_gallery',
            'posts_per_page' => -1,
        );

        $image_posts = new WP_Query($args);

        if ($image_posts->have_posts()) {
            while ($image_posts->have_posts()) {
                $image_posts->the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'custom-post-image']);
                }
            }
        }
        ?>
    </div>

    <div class="main-card">
        <?php
        // Query to retrieve text content from the custom post type "text_content"
        $args = array(
            'post_type' => 'text_content',
            'posts_per_page' => 1, // Assuming you have one main text content
        );

        $text_posts = new WP_Query($args);

        if ($text_posts->have_posts()) {
            while ($text_posts->have_posts()) {
                $text_posts->the_post();
        ?>
                <div class="card-body">
                    <?php the_content(); // Display text content 
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <h1 class="text-center mb-5 mt-5">Lajmet e fundit:</h1><br><br><br>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
        );

        $posts_sticker = new WP_Query($args);
        if ($posts_sticker->have_posts()) {
            while ($posts_sticker->have_posts()) {
                $posts_sticker->the_post();
        ?>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <?php
                        if (has_post_thumbnail()) {
                            // Display the post thumbnail (featured image)
                            the_post_thumbnail('large', ['class' => 'card-img-top']);
                        }
                        ?>
                        <div class="card-body">
                            <a class="links text-decoration-none" href="<?php the_permalink(); ?>" rel="bookmark">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                            </a>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="card-button d-flex">Mëso me shumë</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "nuk ka poste";
        }
        ?>
    </div>
    <div class="text-center">
        <a href="http://localhost/dsk/lajmet/" class="btn btn-default"><b>Shiko më shumë lajme</b></a>
    </div>
</div>

<!-- New container for social media links and contact information -->
<div class="container-fluid bg-light py-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4 mb-4">
                <h1 class="mb-5">Hulumtimet:</h1>
                <div class="card card-2">
                    <div class="card-img-top"> <img src="<?php echo get_template_directory_uri(); ?>/image1.jpg"></div>
                    <div class="card-body">
                        <a class="links text-decoration-none" href="#" rel="bookmark">
                            <h3 class="card-title mb-2">Title 1</h3>
                        </a>
                        <p class="card-text">Lorem Ipsum</p>
                        <a href="#" class="card-button-2">Lexo me shumë</a>
                    </div>
                </div>
                <div class="text-center m-5">
                    <a href="http://localhost/dsk/hulumtimet/" class="btn btn-default"><b>Shiko më shumë hulumtime</b></a>
                </div>
            </div>
            <!-- Add your social media links here -->

            <!-- Add more social media links/buttons as needed -->
            <div class="col-sm-6 col-lg-4 mb-4">
                <h1 class="mb-5">Raportet:</h1>
                <div class="card card-2">
                    <div class="card-img-top"> <img src="<?php echo get_template_directory_uri(); ?>/image2.jpg"></div>
                    <div class="card-body">
                        <a class="links text-decoration-none" href="#" rel="bookmark">
                            <h3 class="card-title mb-2">Title 2</h3>
                        </a>
                        <p class="card-text">Lorem Ipsum</p>
                        <a href="#" class="card-button-2">Lexo me shumë</a>
                    </div>
                </div>
                <div class="text-center m-5">
                    <a href="http://localhost/dsk/raportet/" class="btn btn-default"><b>Shiko më shumë raporte</b></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-4">
                <h1 class="mb-5">Materialet:</h1>
                <div class="card card-2">
                    <div class="card-img-top"> <img src="<?php echo get_template_directory_uri(); ?>/image3.jpg"></div>
                    <div class="card-body">
                        <a class="links text-decoration-none" href="#" rel="bookmark">
                            <h3 class="card-title mb-2">Title 2</h3>
                        </a>
                        <p class="card-text">Lorem Ipsum</p>
                        <a href="#" class="card-button-2">Lexo me shumë</a>
                    </div>
                </div>
                <div class="text-center m-5">
                    <a href="http://localhost/dsk/materialet/" class="btn btn-default"><b>Shiko më shumë materiale</b></a>
                </div>
            </div>
        </div>

        <!-- Add your contact information here -->

    </div>
</div>

<div class="container-fluid py-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 linqet">
                <!-- Add your social media links here -->
                <h3>Na ndiqni ne rrjetet sociale:</h4>
                    <!-- Add your social media icons/links here -->
                    <a href="#" class="btn btn-primary">Facebook</a>
                    <a href="#" class="btn btn-primary">Twitter</a>
                    <!-- Add more social media links/buttons as needed -->
            </div>
            <div class="col-md-6 linqet">
                <!-- Add your contact information here -->
                <h3>Na kontaktoni:</h4>
                    <p>Email: info@downsyndromekosova.org</p>
                    <p>Phone: +383 44 11 22 33</p>
            </div>
        </div>
    </div>
</div>

</main>
</div>

<?php get_footer(); ?>