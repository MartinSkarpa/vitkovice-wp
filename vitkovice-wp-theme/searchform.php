<form class="mt-4 mt-lg-0" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input class="form-control" type="search" placeholder="Hledat" aria-label="Hledat" name="s" id="s" value="<?php the_search_query(); ?>"><!--TODO-->
        <button class="btn btn-outline-primary" type="submit">Hledat</button><!--TODO-->
    </div>
</form>