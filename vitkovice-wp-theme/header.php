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
                <ul class="navbar-nav">
<?php
    if (is_home()) {
?>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionAboutUs">O nás</a><!--TODO-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionNews">Novinky</a><!--TODO-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionKidsPark">Dětský park</a><!--TODO-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionOurInstructors">Instruktoři</a><!--TODO-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionPricing">Ceník</a><!--TODO-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sectionContact">Kontakt</a><!--TODO-->
                    </li>
<?php
    } else {
?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_home_url(); ?>">Home</a><!--TODO-->
                    </li>
<?php
    }
?>
                </ul>
                <?php get_search_form(); ?>
            </div>
        </div>
    </nav>