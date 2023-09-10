<?php get_header(); ?>

<?php
// TODO Decide what to do with page.php and single.php
// TODO Filter search by i18n
// TODO Show thumbnails or images in posts
// TODO Hide comments
?>

<main class="container">
  <div class="row">
    <section id="sectionAboutUs" class="col-12 py-3 section-top">
      <h1><?php _e("About us", "vitkovice-wp-theme"); ?></h1>
      <!--TODO Vyřeš problikávání kolotoče-->
      <div class="carousel carousel-fade slide mb-3">
        <div class="carousel-inner" data-bs-ride="carousel">
          <div class="carousel-item active">
            <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_1.jpg" class="d-block w-100" alt="Slide one"/>
          </div>
          <div class="carousel-item">
            <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_2.jpg" class="d-block w-100" alt="Slide two"/>
          </div>
          <div class="carousel-item">
            <img src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/aldrov_carousel_3.jpg" class="d-block w-100" alt="Slide three"/>
          </div>
        </div>
      </div>
      <div class="w-100">
<?php
  $about_us_post = get_post_by_name( _POST_ABOUT_US.determine_locale() );
  echo $about_us_post->post_content;
?>
      </div>
    </section>
    <section id="sectionNews" class="col-12 py-3 section-secondary">
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
<?php
    if (has_post_thumbnail()) {
      the_post_thumbnail(array(150, 150), array("class" => "rounded mb-3 ".($isEven ? "ms-3 float-end" : "me-3 float-start")));
    } else {
?>
          <img class="rounded mb-3 <?php echo $isEven ? 'ms-3 float-end' : 'me-3 float-start'; ?>" height="149" src="<?php echo get_theme_root_uri()._ROOT_DIR; ?>/img/placeholder_150x150.png" alt="Placeholder" aria-label="Placeholder" />
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

        <div class="col-12">
          <a href="<?php echo get_page_link(get_id_by_slug('/news-archive')); ?>" class="btn btn-outline-primary">
            <?php _e("Older posts", "vitkovice-wp-theme"); ?>
          </a>
        </div>
      </div>
    </section>
    <section id="sectionKidsPark" class="col-12 py-3 ">
      <h1><?php _e("Kindergarten", "vitkovice-wp-theme"); ?></h1>
      <div class="w-100">
<?php
  $kids_park_post = get_post_by_name( _POST_KIDS_PARK.determine_locale() );
  echo $kids_park_post->post_content;
?>
      </div>
    </section>
    <section id="sectionOurInstructors" class="col-12 py-3 section-secondary">
      <h1><?php _e("Instructors", "vitkovice-wp-theme"); ?></h1>
      <div class="w-100">
<?php
  $instructors_post = get_post_by_name( _POST_INSTRUCTORS.determine_locale() );
  echo $instructors_post->post_content;
?>
      </div>
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
        <div class="card h-100">
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
          <h2 class="card-title h4"><?php the_title(); ?></h2>
          <p class="card-text">
            <?php the_excerpt(); ?>
          </p>
        </div>
        <div class="card-footer bg-white">
          <a class="card-link" href="<?php the_permalink(); ?>"><?php _e("Into the profile >>", "vitkovice-wp-theme"); ?></a><!--TODO Spravny odkaz-->
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
          <a href="<?php echo get_page_link(get_id_by_slug('/all-instructors')); ?>" class="btn btn-outline-primary">
            <?php _e("Other instructors", "vitkovice-wp-theme"); ?>
          </a>
        </div>
      </div>
    </section>
    <section id="sectionPricing" class="col-12 py-3 ">
      <h1><?php _e("Price list", "vitkovice-wp-theme"); ?></h1>
<?php
  $pricing_post = get_post_by_name( _POST_PRICING.determine_locale() );
  echo $pricing_post->post_content;
?>
    </section>
    <section id="sectionContact" class="col-12 py-3 section-secondary">
      <h1><?php _e("Contact us", "vitkovice-wp-theme"); ?></h1>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="row">
            <div class="col-12 mb-3">
              <?php _e("You can find our office 100m from the top station of the Jizerka lift in the area of ALDROV RESORT. Our ski kindergarten for children or complete beginners is right next to the snow park FREESTYLE AREA VÍTKOVICE.", "vitkovice-wp-theme"); ?>
              <br/><br/>
              <a href="mailto:" id="contact"></a>
            </div>
            <div class="col-12 mb-3">
              <h2 class="h3"><i class="bi bi-shop me-3"></i><?php _e("Opening Times", "vitkovice-wp-theme"); ?></h2>
              <?php _e("Office opening Times", "vitkovice-wp-theme"); ?>: <b>8:30-16:30</b><br/>
              <?php _e("Teaching time", "vitkovice-wp-theme"); ?>: <b>9:00-16:00</b>
            </div>
            <address class="col-12 col-lg-10 offset-lg-2 text-start text-lg-end">
              <h2 class="h3"><i class="bi bi-geo-alt-fill me-3 d-lg-none"></i><?php _e("Address", "vitkovice-wp-theme"); ?><i class="bi bi-geo-alt-fill ms-3 d-none d-lg-inline-block"></i></h2>
              Aldrov Resort<br/>
              Vítkovice v Krkonoších<br/>
              512 38
            </address>
            <address class="col-12">
              <h2 class="h3"><i class="bi bi-telephone-fill me-3"></i><?php _e("Manager", "vitkovice-wp-theme"); ?></h2>
              Jakub Schuster<br/>
              <span class="phone-number">
                <span>+420</span><span>775</span><span>244</span><span>556</span>
              </span>
            </address>
            <div id="socialMediaContainer" class="col-12 col-lg-10 offset-lg-2 text-start text-lg-end mb-3">
              <a href="https://www.facebook.com/aldrov.snow/" target="_blank"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/aldrov.snow/" target="_blank"><i class="bi bi-instagram"></i></a>
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
    </section>
  </div>
</main>

<?php get_footer(); ?>