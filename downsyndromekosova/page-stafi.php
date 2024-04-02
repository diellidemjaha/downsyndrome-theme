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


<body>

    <section>
        <!-- <div class="single-image">

            <img src="<?php echo get_template_directory_uri(); ?>/image1.jpg">
        </div> -->
    </section>

    <!-- <div class="custom-card"> -->
        <div class="card-content">

            
            <div class="container mt-5">
                <h1>Stafi i shoqatës Down Syndrome Kosova</h1><br>
                <div class="row">
                    <!-- <h2>Prishtinë</h2><br><br><br> -->

                    <?php
                $args = array(
                    'post_type' => 'staff_member', // Use the custom post type
                    'posts_per_page' => -1, // Display all staff members
                );

                $staff_members = new WP_Query($args);

                if ($staff_members->have_posts()) {
                    while ($staff_members->have_posts()) {
                        $staff_members->the_post();
                ?>

                    <div class="col-md-6 col-lg-4  col-12 mb-4 ">
                        <div class="card card-2">
                            <!-- <img src="<?php echo get_template_directory_uri(); ?>/female-profile-pic.jpg" class="card-img-top"> -->
                            <!-- <img src="/image1.jpg" class="card-img-top" alt="Staff Member 1"> -->
                            <div class="test">

                                <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail', ['class' => 'card-img-top']);
                            }
                            ?>
                            </div>
                            <div class="card-body">
                                <!-- <h5 class="card-title"><?php the_title(); ?></h5> -->
                                <p class="card-text text-light">
                                    <strong>Emri:</strong> <?php the_field('name'); ?><br>
                                    <strong>Titulli:</strong> <?php the_field('title'); ?><br>
                                    <strong>Vendi:</strong> <?php the_field('region'); ?><br>
                                    <strong>Email:</strong> <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                                </p>
                            
                            <!-- <div class="card-body">
                                <h5 class="card-title">Sebahate Beqiri</h5>
                                <p class="card-text">Drejtoreshë Ekzekutive</p>
                                <p class="card-text">
                                    <a href="mailto:sebahate.beqiri@downsyndromekosova.com">sebahate.beqiri@downsyndromekosova.com</a> -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
                wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    <!-- </div> -->
    <?php get_footer(); ?>