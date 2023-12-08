<?php /* Template Name: page-all-instructors */ ?>
<?php get_header(); ?>

<main class="container">
  <section id="" class="py-3 section-top">
    <!--TODO Breadcrumbs-->

    <div class="row">
<?php
  $instructorsQueryArgs = [
    "category_name" => _INSTRUCTORS."+".determine_locale(),
    "posts_per_page" => -1
  ];
  $instructorsQuery = new WP_Query($instructorsQueryArgs);
  $postCount = 1;
  while ($instructorsQuery->have_posts()) {
    $instructorsQuery->the_post();
?>
      <div class="col-6 col-lg-3 mb-3">
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
    </div>

  </section>
</main>

<?php get_footer(); ?>