<form class="my-0" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input class="form-control" type="search" placeholder="<?php _e("Hledat", "vitkovice-wp-theme"); ?>" aria-label="<?php _e("Hledat", "vitkovice-wp-theme"); ?>" name="s" id="s" value="<?php the_search_query(); ?>">
        <button class="btn btn-outline-primary" type="submit"><?php _e("Hledat", "vitkovice-wp-theme"); ?></button>
    </div>
</form>