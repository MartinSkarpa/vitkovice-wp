<?php get_header(); ?>

<main class="container bg-white">
	<section id="" class="py-3 mt-5">
		<!--TODO Breadcrumbs-->

		<h1><?php _e("Stránka nenalezena", "vitkovice-wp-theme"); ?></h1>

		<div class="text-justify">
			<p><?php _e("Jejda! Stránka na kterou se snažíte dostat neexistuje.", "vitkovice-wp-theme"); ?></p>
            <!--"The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place."-->
		</div>

        <div class="row">
            <div class="col-sm-6 col-lg-4 col-xxl-3 offset-sm-6 offset-lg-8 offset-xxl-9">
<?php
    get_search_form(
        array(
            "aria_label" => __("404 nenalezeno", "vitkovice-wp-theme"),
        )
    );
?>
            </div>
        </div>

	</section>
</main>

<?php get_footer(); ?>