<?php get_header(); ?>

<?php
// TODO Google map
// TODO Decide what to do with page.php and single.php
// TODO Template parts with i18n of index.php
// TODO Template part of price list
// TODO Filter search by i18n
// TODO Show thumbnails or images in posts
// TODO Hide comments
// TODO JS/CSS tricks
?>

<main class="container bg-white">
    <div class="row">
        <section id="sectionAboutUs" class="col-12 py-3 mt-5">
            <h1><?php _e("About us", "vitkovice-wp-theme"); ?></h1>
            <!--TODO Vyřeš problikávání kolotoče-->
            <div class="carousel carousel-fade slide">
                <div class="carousel-inner" data-bs-ride="carousel">
                    <div class="carousel-item active">
                        <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/carousel_1.jpg" class="d-block w-100" alt="Slide one"/>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/carousel_2.webp" class="d-block w-100" alt="Slide two"/>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/carousel_3.jpg" class="d-block w-100" alt="Slide three"/>
                    </div>
                </div>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aenean id metus id velit ullamcorper pulvinar. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Aliquam erat volutpat. Etiam quis quam. Fusce aliquam vestibulum ipsum. Nulla quis diam. Mauris dictum facilisis augue. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Ut tempus purus at lorem. Donec iaculis gravida nulla.
            </p>
        </section>
        <section id="sectionNews" class="col-12 py-3 bg-light">
            <h1><?php _e("News", "vitkovice-wp-theme"); ?></h1>
            <div class="row">
<?php
    $newsQueryArgs = [
        "category_name" => _NEWS."+".determine_locale(),
        "posts_per_page" => 3
    ];
    $newsQuery = new WP_Query($newsQueryArgs);
    $postCount = 1;
    while ($newsQuery->have_posts()) {
        $isEven = $postCount % 2 === 0;
        $newsQuery->the_post();
?>
                <article class="col-12 col-md-10 col-lg-8 col-xl-6 <?php echo $isEven ? 'offset-md-2' : ''; ?>" id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <div class="text-justify">
                        <?php the_post_thumbnail(array(100, 100), array("class" => "rounded mb-3 ".($isEven ? "ms-3 float-end" : "me-3 float-start"))); ?>
                        <?php the_excerpt(); ?><!--TODO Zarovnat text-->
                        <a href="<?php the_permalink(); ?>" class=""><?php _e("Read more....", "vitkovice-wp-theme"); ?></a><!--TODO Spravny odkaz-->
                    </div>
                </article>
                <div class="mb-3 w-100"></div>
<?php
        $postCount++;
    }

    if (!$newsQuery->have_posts()) {
        echo "<p>".__("No content found.", "vitkovice-wp-theme")."</p>";
    }
?>

                <div class="col-12">
                    <a href="<?php echo get_page_link(get_id_by_slug('/news-archive')); ?>" class="btn btn-primary">
                        <?php _e("Older posts", "vitkovice-wp-theme"); ?>
                    </a>
                </div>
            </div>
        </section>
        <section id="sectionKidsPark" class="col-12 py-3 ">
            <h1><?php _e("Kindergarten", "vitkovice-wp-theme"); ?></h1>
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aenean id metus id velit ullamcorper pulvinar. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Aliquam erat volutpat. Etiam quis quam. Fusce aliquam vestibulum ipsum. Nulla quis diam. Mauris dictum facilisis augue.
            </p>
            <!--<div id="sectionKidsParkImgContainer" class="row">
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-3">
                    <svg class="img-fluid rounded" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="5%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>
                </div>
            </div>-->
        </section>
        <section id="sectionOurInstructors" class="col-12 py-3 bg-light">
            <h1><?php _e("Instructors", "vitkovice-wp-theme"); ?></h1>
            <p>
                <!-- TODO -->
                <?php echo category_description(get_category_id_by_slug(_INSTRUCTORS)); ?>
            </p>
            <div class="row">
<?php
    $instructorsQueryArgs = [
        "category_name" => _INSTRUCTORS."+".determine_locale(),
        "posts_per_page" => 6
    ];
    $instructorsQuery = new WP_Query($instructorsQueryArgs);
    $postCount = 1;
    while ($instructorsQuery->have_posts()) {
        $instructorsQuery->the_post();
        $displayClasses = "";
        switch ($postCount) {
            case 3:
                $displayClasses = "d-none d-md-block";
                break;
            case 4:
                $displayClasses = "d-none d-lg-block";
                break;
            case 5:
            case 6:
                $displayClasses = "d-none d-xxl-block";
                break;
        }
?>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3 <?php echo $displayClasses; ?>">
                    <div class="card">
<?php
        if (has_post_thumbnail()) {
            the_post_thumbnail(array(300, 150), array("class" => "card-img-top", "alt" => get_the_title()));
        } else {
?>
                        <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="<?php the_title(); ?>"/>
<?php
        }
?>
                        <div class="card-body">
                            <h2 class="h4"><?php the_title(); ?></h2>
                            <p>
                                <?php the_excerpt(); ?><!--TODO Zarovnat text-->
                                <br/>
                                <a href="<?php the_permalink(); ?>"><?php _e("Into the profile >>", "vitkovice-wp-theme"); ?></a><!--TODO Spravny odkaz-->
                            </p>
                        </div>
                    </div>
                </div>
<?php
        $postCount++;
    }

    if (!$instructorsQuery->have_posts()) {
        echo "<p>".__("No content found.", "vitkovice-wp-theme")."</p>";
    }
?>
                <div class="col-12">
                    <a href="<?php echo get_page_link(get_id_by_slug('/all-instructors')); ?>" class="btn btn-primary">
                        <?php _e("Other instructors", "vitkovice-wp-theme"); ?>
                    </a>
                </div>
            </div>
        </section>
        <section id="sectionPricing" class="col-12 py-3 ">
            <h1><?php _e("Price list", "vitkovice-wp-theme"); ?></h1>
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aenean id metus id velit ullamcorper pulvinar. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Aliquam erat volutpat. Etiam quis quam. Fusce aliquam vestibulum ipsum. Nulla quis diam. Mauris dictum facilisis augue. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor.
            </p>
            <table class="table table-borderless table-striped">
                <tr class="table-info">
                    <th></th>
                    <th>1 hodina</th><!--TODO-->
                    <th>2 hodiny</th><!--TODO-->
                    <th>4 hodiny</th><!--TODO-->
                </tr>
                <tr>
                    <td>Privát</td><!--TODO-->
                    <td>999</td>
                    <td>999</td>
                    <td>999</td>
                </tr>
                <tr>
                    <td>Rodina</td><!--TODO-->
                    <td>999</td>
                    <td>999</td>
                    <td>999</td>
                </tr>
                <tr>
                    <td>Skupina</td><!--TODO-->
                    <td>999</td>
                    <td>999</td>
                    <td>999</td>
                </tr>
            </table>
        </section>
        <section id="sectionContact" class="col-12 py-3 bg-light">
            <h1><?php _e("Contact us", "vitkovice-wp-theme"); ?></h1>
            <div class="row">
                <div class="col-12 col-md-6">
                    <address class="col-12">
                        <h2 class="h3"><i class="bi bi-geo-alt-fill me-3"></i><?php _e("Address", "vitkovice-wp-theme"); ?></h2>
                        Imaginární 123<br/>
                        Kocourkov<br/>
                        543 21<br/>
                        Za sedmero horami
                    </address>
                    <address class="col-12 col-lg-10 offset-lg-2 text-start text-lg-end">
                        <h2 class="h3"><i class="bi bi-telephone-fill me-3 d-lg-none"></i><?php _e("Manager", "vitkovice-wp-theme"); ?><i class="bi bi-telephone-fill ms-3 d-none d-lg-inline-block"></i></h2>
                        John Doe<br/>
                        +420 123 456 789
                    </address>
                </div>
                <div class="col-12 col-md-6">
                    <img id="addressMapContainer" src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/address_map.jpg" alt="Visit us!"/>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>