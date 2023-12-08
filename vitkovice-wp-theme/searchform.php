<form id="formSearch" class="my-0" role="search" method="get" action="<?php echo home_url('/'); ?>">
  <div class="input-group flex-nowrap">
    <input class="form-control bg-transparent inputSearch" type="search" placeholder="<?php _e("Search", "vitkovice-wp-theme"); ?>" aria-label="<?php _e("Search", "vitkovice-wp-theme"); ?>" name="s" id="s" value="<?php the_search_query(); ?>">
    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
  </div>
</form>