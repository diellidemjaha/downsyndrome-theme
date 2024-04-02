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
            dots: true, 
            arrows: false, 
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
<div class="site-main">
    <div class="home_slider" dir>
        <?php
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
        $args = array(
            'post_type' => 'text_content',
            'posts_per_page' => 1, 
        );

        $text_posts = new WP_Query($args);

        if ($text_posts->have_posts()) {
            while ($text_posts->have_posts()) {
                $text_posts->the_post();
        ?>
                <div class="card-body">
                    <?php the_content();  
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
        <h1 class="text-center mb-5 mt-5">Lajmet e fundit</h1><br><br><br>
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
                <div class="col-md-6 col-lg-4  col-12 mb-4 d-flex justify-content-center">
                    <div class="card">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large', ['class' => 'card-img-top']);
                        }
                        ?>
                        <div class="card-body">
                            <a class="links text-decoration-none" href="<?php the_permalink(); ?>" rel="bookmark">
                                <h3 class="card-title"><?php the_title(); ?></h3>
                            </a>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <div class="text-center row justify-content-center my-2">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <a href="<?php the_permalink(); ?>" class="card-button">Mëso më shumë</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "nuk ka poste";
        }
        ?>
        <div class="text-center">
            <a href="http://localhost/dsk/lajmet/" class="btn btn-default"><b>Shiko më shumë lajme</b></a>
        </div>
    </div>



    <div class="row py-5 mb-3">
        <div class="col-md-6 col-lg-4 col-12 mb-4  d-flex justify-content-center">
            <div class="hulumtimet">
                <h1 class="mb-5 text-center">Hulumtimet</h1>

                <?php
              
                $hulumtimet_args = array(
                    'post_type' => 'pdf_document', 
                    'posts_per_page' => 1,
                );
                $hulumtimet_query = new WP_Query($hulumtimet_args);

                if ($hulumtimet_query->have_posts()) :
                    while ($hulumtimet_query->have_posts()) :
                        $hulumtimet_query->the_post();
                ?>

                        <div class="card card-2">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <span class="card-text"><?php the_field('pdf_description'); ?></span>
                                <span class="card-text">
                                    <?php the_excerpt(); ?>
                                </span>
                                <div class="text-center">
                                    <?php
                                    $pdf_file = get_field('hulumtimi_pdf');
                                    if ($pdf_file) {
                                        echo '<a class="download-button" href="' . esc_url($pdf_file['url']) . '" target="_blank">Shkarko PDF<i class="fa fa-download pe-1" aria-hidden="true"></i></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <a href="http://localhost/dsk/hulumtimet/" class="btn btn-default"><b>Shiko më shumë hulumtime</b></a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'No Hulumtimet found.';
                endif;
                ?>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-4  d-flex justify-content-center">
            <div class="raportet">
            <h1 class="mb-5 text-center">Raportet</h1>

            <?php $raportet_args = array(
                'post_type' => 'pdf_document2', 
                'posts_per_page' => 1,
            );
            $raportet_query = new WP_Query($raportet_args);

            if ($raportet_query->have_posts()) :
                while ($raportet_query->have_posts()) :
                    $raportet_query->the_post();
            ?>


                    <div class="card card-2">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_field('pdf_description'); ?></p>
                            <p class="card-text">
                                <?php the_excerpt(); ?>
                            </p>
                            <div class="text-center">
                            <?php
                            $pdf_file = get_field('raporti_pdf');
                            if ($pdf_file) {
                                echo '<i class="fa fa-download pe-1" aria-hidden="true"></i><a class="download-button" href="' . esc_url($pdf_file['url']) . '" target="_blank">Shkarko PDF</a>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-3">
                        <a href="http://localhost/dsk/raportet/" class="btn btn-default"><b>Shiko më shumë raporte</b></a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No Raportet found.';
            endif;
            ?>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 col-12 mb-4  d-flex justify-content-center">
            <div class="materialet">
        
            <h1 class="mb-5 text-center">Materialet</h1>

            <?php
            $materialet_args = array(
                'post_type' => 'pdf_document3', 
                'posts_per_page' => 1,
            );
            $materialet_query = new WP_Query($materialet_args);

            if ($materialet_query->have_posts()) :
                while ($materialet_query->have_posts()) :
                    $materialet_query->the_post();
            ?>

                    <div class="card card-2">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_field('pdf_description'); ?></p>
                            <p class="card-text">
                                <?php the_excerpt(); ?>
                            </p>
                            <div class="text-center">
                            <?php
                            $pdf_file = get_field('materiali_pdf');
                            if ($pdf_file) {
                                echo '<i class="fa fa-download pe-1" aria-hidden="true"></i><a class="download-button" href="' . esc_url($pdf_file['url']) . '" target="_blank">Shkarko PDF</a>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-3">
                        <a href="http://localhost/dsk/materialet/" class="btn btn-default"><b>Shiko më shumë materiale</b></a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No Materialet found.';
            endif;
            ?>
        </div>
        
        </div>

    </div>

    <div class=" py-5 mb-3">
        <div class="row">
            <div class="col-md-6 linqet">
                <h3>Na ndiqni ne rrjetet sociale:</h4>
                    <a href="#" class="btn btn-primary">Facebook</a>
                    <a href="#" class="btn btn-primary">Twitter</a>
            </div>
            <div class="col-md-6 linqet">
                <h3>Na kontaktoni:</h4>
                    <p><b>Email:</b> info@downsyndromekosova.org</p>
                    <p><b>Phone:</b> +383 44 11 22 33</p>
            </div>
        </div>
    </div>
</div>

</div>
</div>

</main>
</div>

<?php get_footer(); ?>
