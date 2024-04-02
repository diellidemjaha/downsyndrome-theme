<?php
/*
 * Template Name: Custom Posts Page
 * Description: A custom template for displaying all posts.
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

<div class="container">
    <div class="row">
    <h1 class="text-center mb-5">Lajmet e fundit:</h1><br><br><br>
    <?php
			$args = array(
				'post_type' => 'post'
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
                        // Display the post thumbnail (featured image)
                        the_post_thumbnail('large', ['class' => 'card-img-top']);
                    }
                    ?>
                    <div class="card-body">
                        <a class="links text-decoration-none" href="<?php the_permalink(); ?>" rel="bookmark">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                        </a>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="card-button">Mëso më shumë</a>
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
</div>


<?php get_footer(); ?>
