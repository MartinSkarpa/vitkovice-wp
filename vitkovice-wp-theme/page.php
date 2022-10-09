<?php get_header(); ?>

<main class="container bg-white">
    <section id="" class="py-3 mt-5">
        <!--TODO Breadcrumbs-->

<?php
    while (have_posts()) {
        the_post();
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="text-justify">
<?php
        the_content();

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . /* esc_attr__( 'Page', "vitkovice-wp-theme" ) */ "blah" . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => /* esc_html__( 'Page %', "vitkovice-wp-theme" ) */ "blah",
            )
        );
?>
            </div>
        </article>

<?php
        // If comments are open or there is at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    }
?>

    </section>
</main>

<?php get_footer(); ?>