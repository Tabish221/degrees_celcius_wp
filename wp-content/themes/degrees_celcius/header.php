<!-- <?php // echo get_template_directory_uri(); 
        ?>
<?php // bloginfo('template_directory'); 
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="">
    <title>Degrees Celcius | <?php the_title(); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/layout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">


    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <div class="main-header">
            <div class="container">
                <div class="menu-Bar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-2 text-start">
                        <a href="<?php echo site_url(); ?>" class="logo">
                            <img src="<?php echo get_header_image(); ?>" alt="Site Logo">
                        </a>
                    </div>
                    <div class="col-md-8 text-center">
                        <div class="menuWrap">
                            <?php  wp_nav_menu(array('theme_loaction' => 'primary-menu')); ?>
                        </div>
                    </div>
                    <div class="col-md-2 text-end">
                        <a href="#" class="user_profile">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/user_profile.png" alt="User Profile">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>