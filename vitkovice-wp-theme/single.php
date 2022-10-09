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
        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */
        //get_template_part('content', get_post_format());

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

        // Previous/next post navigation.
        /* the_post_navigation(array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', "vitkovice-wp-theme") . '</span> ' .
                '<span class="screen-reader-text">' . __('Next post:', "vitkovice-wp-theme") . '</span> ' .
                '<span class="post-title">%title</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', "vitkovice-wp-theme") . '</span> ' .
                '<span class="screen-reader-text">' . __('Previous post:', "vitkovice-wp-theme") . '</span> ' .
                '<span class="post-title">%title</span>',
        )); */
    }
?>

    </section>
</main>

<?php get_footer(); ?>