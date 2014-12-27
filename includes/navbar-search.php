<?php
/*
Navbar search form
==================

If you don't want a search form in your navbar, then delete the link to this PHP page from within the navbar in header.php.

Then you can insert the Search Widget into the sidebar.
*/
?>

<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<input class="form-control" type="text" value="<?php echo get_search_query(); ?>" placeholder="Search..." name="s" id="s">
	</div>
	<button type="submit" id="searchsubmit" value="<?php esc_attr_x('Search', 'bst') ?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
</form>
