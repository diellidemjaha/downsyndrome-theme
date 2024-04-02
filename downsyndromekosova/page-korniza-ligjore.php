<?php
/**
 * Template Name: Korniza Ligjore Page
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
<!-- <section>
    <div class="single-image">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'custom-thumbnail']);
                } ?>
    </div></section> -->
    <div class="test">

        <section class="custom-card">
            <div class="card-content p-5">

                <?php
                the_title('<h1>', '</h1>'); // Display the title within <h1> tags
                the_content(); // Display the content
            }
        }
        ?>

<table class="table">
    <?php
        // Query the custom post type "PDF Documents"
        $args = array(
            'post_type' => 'pdf_document4', // Replace with your custom post type name
            'posts_per_page' => -1,       // Show all posts
        );
        $pdf_query = new WP_Query($args);
        
        if ($pdf_query->have_posts()) :
            while ($pdf_query->have_posts()) :
                $pdf_query->the_post();
                ?>
  <thead>
    <tr>
        <th scope="col">Ligjet</th>
        <!-- <th scope="col">Last</th>
        <th scope="col">Handle</th> -->
    </tr>
</thead>
<tbody>
    <tr>
        <td>
            <?php
          $pdf_link = get_field('ligji_pdf');
          if ($pdf_link) {
              echo '<a href="' . esc_url($pdf_link['url']) . '" target="_blank">' . get_the_title() . '</a>';
            } else {
                echo "Nuk ka PDF te ngarkuar ne sistem";
            }
            ?>
          
        </td>
        
    </tr>
</tbody>
</table>
<?php
            endwhile;
            wp_reset_postdata();
            else :
                echo 'No PDF documents found.';
            endif;
            ?>

</div>
</section>

</div>
<?php get_footer(); ?>