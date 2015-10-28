 <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>

<!--<div id="sb-search" class="sb-search">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input class="sb-search-input" type="search" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<input class="sb-search-submit" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
		<span class="fa fa-search"></span>
	</form>
</div>-->