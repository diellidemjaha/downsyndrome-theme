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

<!-- <section>
        <div class="single-image">
            
            <img src="<?php echo get_template_directory_uri(); ?>/image1.jpg">
            </div>
    </section> -->

    <div class="custom-card">
        <div class="card-content">

<h1><?php the_title(); ?></h1>
<div class="container mt-5">
    <div class="row">
        <?php
        // Query the custom post type "PDF Documents"
        $args = array(
            'post_type' => 'pdf_document3', // Replace with your custom post type name
            'posts_per_page' => -1,       // Show all posts
        );
        $pdf_query = new WP_Query($args);

        if ($pdf_query->have_posts()) :
            while ($pdf_query->have_posts()) :
                $pdf_query->the_post();
        ?>
                <div class="col-md-6 col-lg-4  col-12 mb-4 d-flex justify-content-center">
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
                            <?php
                            // Output a link to the PDF file using the ACF "pdf_file" field
                            $pdf_link = get_field('materiali_pdf');
                            if ($pdf_link) {
                                echo '<a href="' . esc_url($pdf_link['url']) . '" target="_blank">Shkarko PDF</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No PDF documents found.';
        endif;
        ?>
    </div>
</div>

</div></div>
<?php get_footer(); ?>