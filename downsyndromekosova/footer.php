<footer class="site-footer">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-4 col-12">
                </div> -->
                <div class="col-md-4 col-12">
                <div class="footer-logo">
                    <?php
                    // Display your site logo in the footer. You can use an image or text.
                    // Example with an image:
                    echo '<img src="' . get_template_directory_uri() . '/logo-white.png" alt="Logo" class="img-fluid">';
                    // Example with text:
                    // echo get_bloginfo( 'name' );
                    ?>
                </div>
                <div class="footer-menu">
                    <!-- <div class="footer-logo">  -->
                        <?php
                    // echo "<h6>Developed by Harrisia</h6>"; 
                    // echo '<a href="https://www.harrisia.com"><img src="' . get_template_directory_uri() . '/logo-harrisia-white3.png" alt="Logo Harrisia" class="img-fluid"></a>';
                    // Display a footer menu (if available).
                    // Replace 'footer' with the name of your footer menu location.
                    // Example: wp_nav_menu( array( 'theme_location' => 'footer' ) );
                    // ?>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="footer-social">
                    <?php
                    // Display social media icons or links here.
                    echo '<h6>NA NDIQNI NE RRJETET SOCIALE</h6><br>';
                    echo '<a href="https://instagram.com"><i class="fab fa-instagram"></i> downsyndromekosovadsk</a><br>';
                    echo '<a href="https://facebook.com"><i class="fab fa-facebook"></i> Down Syndrome Kosova</a><br>';
                    // echo '<a href="https://twitter.com"><i class="fab fa-twitter"></i></a>';
                    // echo '<a href="mailto:contact@example.com"><i class="fas fa-envelope"></i></a>'; // Add your email link
                    ?>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="footer-social">
                    <?php
                    // Display social media icons or links here.
                    echo '<h6>KONTAKT</h6><br>';
                    echo '<a href="mailto:contact@example.com"><i class="fas fa-envelope"></i> info@downsyndromekosova.org</a><br>'; // Add your email link
                    echo '+383 38 610 715';
                    // echo '<a href="https://twitter.com"><i class="fab fa-twitter"></i></a>';
                    // echo '<a href="https://instagram.com"><i class="fab fa-instagram"></i></a>';
                    ?>
                </div>
            </div>
        </div>
        <div class="footer-logo mt-5"> <?php
                    echo "<h6>Developed by Harrisia</h6>"; 
                    echo '<a href="https://www.harrisia.com"><img src="' . get_template_directory_uri() . '/logo-harrisia-white3.png" alt="Logo Harrisia" class="img-fluid"></a>';
                    // Display a footer menu (if available).
                    // Replace 'footer' with the name of your footer menu location.
                    // Example: wp_nav_menu( array( 'theme_location' => 'footer' ) );
                    ?>
                    </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
