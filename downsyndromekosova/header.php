<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <?php wp_head(); ?>
    <style>
        .menu-item-has-children .sub-menu {
            display: none;
        }

        .menu-item-has-children.active .sub-menu {
            display: block;
        }

        .menu-item-has-children .fa-chevron-down:before {
            content: "\f078"; /* Down arrow */
        }

        .menu-item-has-children.active .fa-chevron-down:before {
            content: "\f054"; /* Up arrow */
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <div class="site-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="Logo">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <?php
                    // Replace the following with your WordPress navigation menu
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navbar-nav',
                        'walker' => new Custom_Nav_Walker(),
                    ));
                    ?>
                    <div class="header-buttons d-flex ms-auto">
                        <a href="http://localhost/dsk/na-kontaktoni/" class="contact-button">KONTAKTONI</a>
                        <a href="http://localhost/dsk/kontribo/" class="donate-button">KONTRIBUONI</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get all menu items with sub-menus
            var menuItemsWithSubmenus = document.querySelectorAll('.menu-item-has-children');

            menuItemsWithSubmenus.forEach(function(menuItem) {
                // Get the submenu for this menu item
                var submenu = menuItem.querySelector('.sub-menu');
                submenu.style.display = 'none';

                // Add event listeners to show/hide the submenu
                menuItem.addEventListener('mouseover', function() {
                    submenu.style.display = 'block';
                });

                menuItem.addEventListener('mouseout', function() {
                    submenu.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>