<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php bloginfo('name'); ?></title><!--TODO-->
    <?php wp_head(); ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-info">
        <div class="container">
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>">Vítkovice<?php /* the_title(); */ ?></a><!--TODO-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarLinks" aria-controls="navbarLinks"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarLinks">
                <ul class="navbar-nav text-nowrap <?php if (is_home()) echo "navbar-nav-scroll"; ?>">
<?php
    if (is_home()) {
?>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionAboutUs"><?php _e("O nás", "vitkovice-wp-theme"); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionNews"><?php _e("Novinky", "vitkovice-wp-theme"); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionKidsPark"><?php _e("Dětský park", "vitkovice-wp-theme"); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionOurInstructors"><?php _e("Instruktoři", "vitkovice-wp-theme"); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionPricing"><?php _e("Ceník", "vitkovice-wp-theme"); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionContact"><?php _e("Kontakt", "vitkovice-wp-theme"); ?></a>
                    </li>
<?php
    } else {
?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_home_url(); ?>"><?php _e("Home", "vitkovice-wp-theme"); ?></a>
                    </li>
<?php
    }
?>
                </ul>
                <ul class="navbar-nav mt-4 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo _LANG_SHORTCUTS[determine_locale()]; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo home_url()."?lang=en_US"; ?>">
                                    <?php echo _LANG_SHORTCUTS["en_US"] ?>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo home_url()."?lang=cs_CZ"; ?>">
                                    <?php echo _LANG_SHORTCUTS["cs_CZ"] ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
	                    <?php get_search_form(); ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>