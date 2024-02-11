<?php get_header(); ?>

<?php
// TODO Decide what to do with page.php and single.php
// TODO Filter search by i18n
// TODO Show thumbnails or images in posts
?>

<main class="row mx-0">
  <section id="sectionAboutUs" class="col-12 px-0 pb-3 section-top">
    <!-- Animace kolotoče se nastavuje v OS někde v sekci accessibility (Animation effects) -->
    <div class="carousel carousel-fade slide mb-3">
      <div class="carousel-inner" data-bs-ride="carousel">
        <div class="carousel-item active">
          <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_1.jpeg" class="d-block w-100" alt="Slide one"/>
        </div>
        <div class="carousel-item">
          <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_2.jpeg" class="d-block w-100" alt="Slide two"/>
        </div>
        <div class="carousel-item">
          <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_3.jpeg" class="d-block w-100" alt="Slide three"/>
        </div>
        <div class="carousel-item">
          <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_4.jpeg" class="d-block w-100" alt="Slide four"/>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!--<h1 class="text-center appearable"><?php /* _e("About us", "vitkovice-wp-theme"); */ ?></h1>-->
<?php
  $about_us_post = get_post_by_name( _POST_ABOUT_US . determine_locale() );
  echo $about_us_post->post_content;
?>
        </div>
      </div>
    </div>
  </section>
  <section id="sectionKidsPark" class="col-12 px-0 py-3 bg-dark bg-opacity-75 text-white">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!--<h1 class="text-center appearable"><?php /* _e("Kindergarten", "vitkovice-wp-theme"); */ ?></h1>-->
<?php
  $kids_park_post = get_post_by_name( _POST_KIDS_PARK . determine_locale() );
  echo $kids_park_post->post_content;
?>
        </div>
      </div>
    </div>
  </section>
  <section id="sectionPricing" class="col-12 px-0 py-3 ">
    <div class="container">
      <div class="row revealable">
        <div class="col-12">
          <!--<h1 class="text-center appearable"><?php /* _e("Price list", "vitkovice-wp-theme"); */ ?></h1>-->
<?php
  $pricing_post = get_post_by_name( _POST_PRICING . determine_locale() );
  echo $pricing_post->post_content;
?>
        </div>
        <div class="w-100 btn-reveal-container btn-reveal-container-primary">
          <button class="btn btn-outline-primary btn-circular btn-reveal">
            <?php _e("More", "vitkovice-wp-theme"); ?>
          </button>
        </div>
      </div>
    </div>
  </section>
  <section id="sectionRental" class="col-12 px-0 py-3 bg-dark bg-opacity-75 text-white">
    <div class="container">
      <div class="row revealable">
        <div class="col-12">
          <!--<h1 class="text-center appearable"><?php _e("Rental & service", "vitkovice-wp-theme"); ?></h1>-->
<?php
  $rental_post = get_post_by_name( _POST_RENTAL . determine_locale() );
  echo $rental_post->post_content;
?>
        </div>
        <div class="w-100 btn-reveal-container btn-reveal-container-secondary">
          <button class="btn btn-outline-secondary btn-circular btn-reveal">
            <?php _e("More", "vitkovice-wp-theme"); ?>
          </button>
        </div>
      </div>
    </div>
  </section>
  <section id="sectionNews" class="col-12 px-0 py-3">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!--<h1 class="text-center appearable"><?php /* _e("News", "vitkovice-wp-theme"); */ ?></h1>-->
          <div class="row">
<?php
  $newsQueryArgs = [
    "category_name" => _NEWS . "+" . determine_locale(),
    "posts_per_page" => 3
  ];
  $newsQuery = new WP_Query($newsQueryArgs);
  $postCount = 1;
  while ($newsQuery->have_posts()) {
    $isEven = $postCount % 2 === 0;
    $newsQuery->the_post();
?>
            <article class="col-12 col-md-10 col-lg-8 col-xl-6 <?php echo $isEven ? 'offset-md-2 offset-lg-4' : ''; ?>" id="post-<?php the_ID(); ?>">
              <h2 class="appearable"><?php the_title(); ?></h2>
              <div class="text-justify">
<?php
    if (has_post_thumbnail()) {
      the_post_thumbnail(array(150, 150), array("class" => "mb-3 ".($isEven ? "ms-3 float-end" : "me-3 float-start")));
    } else {
?>
                <img class="mb-3 <?php echo $isEven ? 'ms-3 float-end' : 'me-3 float-start'; ?>" height="149" src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/placeholder_150x150.png" alt="Placeholder" aria-label="Placeholder" />
<?php
    }
?>
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

            <div class="col-12 d-flex justify-content-center mt-3">
              <a href="<?php echo get_page_link(get_id_by_slug('/news-archive')); ?>" class="btn btn-outline-primary btn-circular">
                <?php _e("Older posts", "vitkovice-wp-theme"); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sectionOurInstructors" class="col-12 px-0 py-3 bg-dark bg-opacity-75 text-white">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!--<h1 class="text-center appearable"><?php /* _e("Instructors", "vitkovice-wp-theme"); */ ?></h1>-->
          <div class="w-100">
<?php
  $instructors_post = get_post_by_name( _POST_INSTRUCTORS . determine_locale() );
  echo $instructors_post->post_content;
?>
          </div>
          <div class="row">
<?php
  $instructorsQueryArgs = [
    "category_name" => _INSTRUCTORS . "+" . determine_locale(),
    "posts_per_page" => 4
  ];
  $instructorsQuery = new WP_Query($instructorsQueryArgs);
  $postCount = 1;
  while ($instructorsQuery->have_posts()) {
    $instructorsQuery->the_post();
    $displayClasses = "";
    switch ($postCount) {
      case 3:
      case 4:
        $displayClasses = "d-none d-lg-block";
        break;
    }
?>
            <div class="col-6 col-lg-3 mb-3 <?php echo $displayClasses; ?>">
              <div class="card h-100">
<?php
    if (has_post_thumbnail()) {
      the_post_thumbnail('medium', array("class" => "card-img-top height-200px object-fit-cover", "alt" => get_the_title()));
    } else {
?>
                <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/instructor.jpg" class="card-img-top" alt="<?php the_title(); ?>"/>
<?php
    }
?>
                <div class="card-body bg-dark bg-opacity-75 text-white">
                  <h2 class="card-title h4"><?php the_title(); ?></h2>
                  <p class="card-text">
                    <?php the_excerpt(); ?>
                  </p>
                </div>
                <div class="card-footer bg-dark bg-opacity-75 text-white text-center">
                  <a class="card-link link-secondary" href="<?php the_permalink(); ?>"><?php _e("Into the profile >>", "vitkovice-wp-theme"); ?></a><!--TODO Spravny odkaz-->
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
            <div class="col-12 d-flex justify-content-center">
              <a href="<?php echo get_page_link(get_id_by_slug('/all-instructors')); ?>" class="btn btn-outline-secondary btn-circular">
                <?php _e("Other instructors", "vitkovice-wp-theme"); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sectionContact" class="col-12 px-0 py-3 bg-dark text-white">
    <div class="container">
      <div class="row">
        <!--<div class="col-12">
          <h1 class="text-center appearable text-secondary"><?php /* _e("Contact us", "vitkovice-wp-theme"); */ ?></h1>
        </div>-->
        <div class="col-12 col-md-6">
          <div class="row">
            <div class="col-12 mb-3">
              <?php _e("You can find our office 100m from the top station of the Jizerka lift in the area of ALDROV RESORT. Our ski kindergarten for children or complete beginners is right next to the snow park FREESTYLE AREA VÍTKOVICE.", "vitkovice-wp-theme"); ?>
              <br/><br/>
              <a href="mailto:" class="link-secondary" id="contact"></a>
            </div>
            <div class="col-12 mb-3">
              <h2 class="h3 text-secondary"><i class="bi bi-shop me-3"></i><?php _e("Opening Times", "vitkovice-wp-theme"); ?></h2>
              <?php _e("Office opening Times", "vitkovice-wp-theme"); ?>: <b>8:30-16:30</b><br/>
              <?php _e("Teaching time", "vitkovice-wp-theme"); ?>: <b>9:00-16:00</b>
            </div>
            <address class="col-12 col-lg-10 offset-lg-2 text-start text-lg-end">
              <h2 class="h3 text-secondary"><i class="bi bi-geo-alt-fill me-3 d-lg-none"></i><?php _e("Address", "vitkovice-wp-theme"); ?><i class="bi bi-geo-alt-fill ms-3 d-none d-lg-inline-block"></i></h2>
              Aldrov Resort<br/>
              Vítkovice 445<br/>
              Vítkovice v Krkonoších<br/>
              512 38
            </address>
            <address class="col-12">
              <h2 class="h3 text-secondary"><i class="bi bi-telephone-fill me-3"></i><?php _e("Manager", "vitkovice-wp-theme"); ?></h2>
              Václav Liška<br/>
              <span class="phone-number">
                <span>+420</span><span>775</span><span>244</span><span>556</span>
              </span>
            </address>
            <div id="socialMediaContainer" class="col-12 col-lg-10 offset-lg-2 text-start text-lg-end mb-3">
              <a href="https://www.facebook.com/aldrov.snow/" class="link-secondary" target="_blank"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/aldrov.snow/" class="link-secondary" target="_blank"><i class="bi bi-instagram"></i></a>
            </div>
            <div class="col-12 font-xs">
              ALDROV SNOWSPORTS SCHOOL, s.r.o.<br/>
              Zámecká 2, 543 01 Vrchlabí IČO: 177 10 294<br/>
              Společnost zapsaná u Krajského soudu v Hradci Králové pod sp. zn. C 50262.
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 d-flex flex-column">
          <div id="addressMapContainer" class="border-0 flex-grow-1 w-100"></div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>