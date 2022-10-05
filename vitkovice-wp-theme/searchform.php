<form class="mt-4 mt-lg-0" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input class="form-control" type="search" placeholder="<?php _e("Hledat"); ?>" aria-label="<?php _e("Hledat"); ?>" name="s" id="s" value="<?php the_search_query(); ?>">
        <button class="btn btn-outline-primary" type="submit"><?php _e("Hledat"); ?></button>
    </div>
</form>