<?php /* Template Name: page-all-instructors */ ?>
<?php get_header(); ?>

<main class="container bg-white">
    <section id="" class="p-3 mt-5">
        <!--TODO Breadcrumbs-->

        <div class="row">
<?php
    $instructorsQueryArgs = [
        "category_name" => _INSTRUCTORS,
        "posts_per_page" => -1
    ];
    $instructorsQuery = new WP_Query($instructorsQueryArgs);
    $postCount = 1;
    while ($instructorsQuery->have_posts()) {
        $instructorsQuery->the_post();
?>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
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
                                <a href="<?php the_permalink(); ?>">Přejít do profilu >></a><!--TODO--><!--TODO Spravny odkaz-->
                            </p>
                        </div>
                    </div>
                </div>
<?php
        $postCount++;
    }

    if (!have_posts()) {
        echo "<p>Nebyl nalezen žádný obsah.</p>";//TODO
    }
?>
        </div>

    </section>
</main>

<?php get_footer(); ?>