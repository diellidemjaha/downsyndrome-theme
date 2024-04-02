<?php
/*
 * Template Name: Single Post Page
 * Description: A custom template for displaying a single post.
 */
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

<div class="content-container">
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <?php if (has_post_thumbnail()) :
            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
            $image_url = $featured_image[0];
        ?>
            <div class="container" style="background-color: #eee; min-height: 100vh; margin-top: 25px; margin-bottom: 25px;">
                <div class="justify-content-center mt-5 py-4">
                    <h1 style="padding: 25px;"><?php the_title(); ?></h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">

                            <div class="single-paragraph">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">

                            <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>" class="singlee-image" />
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>