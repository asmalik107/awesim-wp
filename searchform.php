<div class="search-container">
    <a class="search-click"><i class="fa fa-2x fa-search"></i></a>

    <div class="search-bar">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
            <label>
                <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type and hit enter …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            </label>
            <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
        </form>
        <a class="search-click close-search"><i class="fa fa-close"></i></a>
    </div>
</div> <!-- .search-container -->