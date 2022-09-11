<?php get_header(); ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-info">
    <div class="container">
        <a class="navbar-brand" href="<?php the_permalink(); ?>">Vítkovice<?php /* the_title(); */ ?></a><!--TODO-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarLinks" aria-controls="navbarLinks"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse  navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav">
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
            </ul>
        </div>
    </div>
</nav>

<main class="container">
    <section id="sectionAboutUs" class="p-3 mt-5">
        <h1>O nás</h1><!--TODO-->
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
    <section id="sectionNews" class="p-3 bg-light">
        <h1>Novinky</h1><!--TODO-->
        <div class="row">
<?php
    $newsQueryArgs = [
        "category_name" => "news",
        "posts_per_page" => 3
    ];
    $newsQuery = new WP_Query($newsQueryArgs);
    $postCount = 1;
    while ($newsQuery->have_posts()) {
        $isEven = $postCount % 2 === 0;
        $newsQuery->the_post();
?>
            <article class="col-12 col-md-10 col-lg-8 col-xl-6 <?php echo $isEven ? 'offset-md-2' : ''; ?>">
                <h2><?php the_title(); ?></h2>
                <p class="text-justify">
                    <?php the_post_thumbnail(array(100, 100), array("class" => "rounded mb-3 ".($isEven ? "ms-3 float-end" : "me-3 float-start"))); ?>
                    <?php the_excerpt(); ?>
                    <!--<a href="<?php the_permalink(); ?>" class="">Číst dále....</a>--><!--TODO-->
                </p>
            </article>
            <div class="w-100"></div>
<?php
        $postCount++;
    }

    if (!have_posts()) {
        echo "<p>Nebyl nalezen žádný obsah.</p>";//TODO
    }
?>

            <div class="col-12">
                <a href="#" class="btn btn-primary">Starší příspěvky</a><!--TODO-->
            </div>
        </div>
    </section>
    <section id="sectionKidsPark" class="p-3 ">
        <h1>Dětský park</h1><!--TODO-->
        <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aenean id metus id velit ullamcorper pulvinar. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Aliquam erat volutpat. Etiam quis quam. Fusce aliquam vestibulum ipsum. Nulla quis diam. Mauris dictum facilisis augue.
        </p>
        <div id="sectionKidsParkImgContainer" class="row">
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
        </div>
    </section>
    <section id="sectionOurInstructors" class="p-3 bg-light">
        <h1>Instruktoři</h1><!--TODO-->
        <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aenean id metus id velit ullamcorper pulvinar. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Aliquam erat volutpat. Etiam quis quam. Fusce aliquam vestibulum ipsum. Nulla quis diam. Mauris dictum facilisis augue.
        </p>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                <div class="card">
                    <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="Instructor one"/>
                    <div class="card-body">
                        <h2 class="h4">Instructor one</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.
                            <br/>
                            <a href="#">Přejít do profilu >></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                <div class="card">
                    <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="Instructor two"/>
                    <div class="card-body">
                        <h2 class="h4">Instructor two</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.
                            <br/>
                            <a href="#">Přejít do profilu >></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3 d-none d-md-block">
                <div class="card">
                    <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="Instructor three"/>
                    <div class="card-body">
                        <h2 class="h4">Instructor three</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.
                            <br/>
                            <a href="#">Přejít do profilu >></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3 d-none d-lg-block">
                <div class="card">
                    <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="Instructor four"/>
                    <div class="card-body">
                        <h2 class="h4">Instructor four</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.
                            <br/>
                            <a href="#">Přejít do profilu >></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3 d-none d-xxl-block">
                <div class="card">
                    <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="Instructor five-o"/>
                    <div class="card-body">
                        <h2 class="h4">Instructor five-o</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.
                            <br/>
                            <a href="#">Přejít do profilu >></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3 d-none d-xxl-block">
                <div class="card">
                    <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="Instructor six"/>
                    <div class="card-body">
                        <h2 class="h4">Instructor six</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec iaculis gravida nulla. In rutrum. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit.
                            <br/>
                            <a href="#">Přejít do profilu >></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a href="#" class="btn btn-primary">Další instruktoři</a>
            </div>
        </div>
    </section>
    <section id="sectionPricing" class="p-3 ">
        <h1>Ceník</h1><!--TODO-->
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
    <section id="sectionContact" class="p-3 bg-light">
        <h1>Kontakt</h1><!--TODO-->
        <div class="row">
            <div class="col-12 col-md-6">
                <address class="col-12">
                    <h2 class="h3"><i class="bi bi-geo-alt-fill me-3"></i>Adresa</h2><!--TODO-->
                    Imaginární 123<br/>
                    Kocourkov<br/>
                    543 21<br/>
                    Za sedmero horami
                </address>
                <address class="col-12 col-lg-10 offset-lg-2 text-start text-lg-end">
                    <h2 class="h3"><i class="bi bi-telephone-fill me-3 d-lg-none"></i>Odpovědný vedoucí<i class="bi bi-telephone-fill ms-3 d-none d-lg-inline-block"></i></h2><!--TODO-->
                    John Doe<br/>
                    +420 123 456 789
                </address>
            </div>
            <div class="col-12 col-md-6">
                <img id="addressMapContainer" src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/address_map.jpg" alt="Visit us!"/>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>