<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Awesomo
 */

if ( ! function_exists( 'awesomo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function awesomo_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	echo '<i class="fa fa-calendar-o"></i><span class="posted-on">&nbsp;' . $time_string . '</span>'; // WPCS: XSS OK.


}
endif;

if ( ! function_exists( 'awesomo_on_comments' ) ) :
/**
 * Prints HTML with meta information for the edit link.
 */
function awesomo_on_comments() {

	if (  ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comment-o"></i>';
		comments_popup_link(esc_html__('0', 'awesomo' ),
		    esc_html__('1', 'awesomo' ),
		    esc_html__('%', 'awesomo' ) );
		echo '</span>';
	}

}
endif;



if ( ! function_exists( 'awesomo_on_edit' ) ) :
/**
 * Prints HTML with meta information for the edit link.
 */
function awesomo_on_edit() {

	edit_post_link(

		sprintf(
			/* translators: %s: Name of current post */
			'<i class="fa fa-pencil-square-o"></i>&nbsp;Edit',
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);

}
endif;


if ( ! function_exists( 'awesomo_tags' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function awesomo_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '' );
		if ( $tags_list ) {
			printf('<div class="tagcloud text-center">' . esc_html__('%1$s', 'awesomo' ) . '</div>', $tags_list);
		}
	}
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function awesomo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'awesomo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'awesomo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so awesomo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so awesomo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in awesomo_categorized_blog.
 */
function awesomo_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'awesomo_categories' );
}

function awesemo_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;

	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php esc_html_e( 'Pingback:', 'awesomo' ); ?> <?php comment_author_link(); ?>
              <?php edit_comment_link( esc_html__( 'Edit', 'awesomo' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
			</p>

        <?php else : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            	    <div class="comment-avatar">
                        <?php echo get_avatar( $comment, 48 ); ?>
            	    </div><!--.comment-avatar -->
            	    <div class="comment-content">
            	        <header>
            	            <span class="author-name"><?php comment_author(); ?></span>
            	            <div class="comment-metadata">
                    		    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                        <?php echo get_comment_date(); ?>
                                        <?php echo get_comment_time(); ?>
                                    </a>

                                </div>
                            <?php edit_comment_link( esc_html__( 'Edit', 'awesomo' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
            	        </header>
            	        <div class="comment-content-body">
                            <?php if ($comment->comment_approved == '0') : ?>
                                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'dynamic-news-lite' ); ?></p>
                            <?php endif; ?>
                            <?php comment_text(); ?>
            	        </div><!-- .comment-content-body-->
            	        <footer>
                            <div class="reply">
                                <?php comment_reply_link(array_merge( $args, array(
                                    'reply_text' => __( '<i class="fa fa-reply"></i>&nbsp; Reply' ),
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth']
                                ))) ?>
                            </div>
            	        </footer>

            	    </div> <!-- .comment-content -->


            </article><!-- .comment-body -->
    <?php
    endif;
}


function awesemo_post_navigation( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'prev_text'          => '%title',
		'next_text'          => '%title',
		'in_same_term'       => false,
		'excluded_terms'     => '',
		'taxonomy'           => 'category',
		'screen_reader_text' => __( 'Post navigation' ),
	) );

	$navigation = '';

    $template = '
        <div class="post-previous">
            <i class="fa %1$s %2$s"></i>
            <div class="%3$s">
            	<span class="post-label">%4$s</span>
            	<h5>%5$s</h5>
            </div>
         </div>';

	$previous = get_previous_post_link(
        '%link',
		__(sprintf($template, 'fa-angle-left', 'post-previous-icon', 'post-next-content','Previous Post' ,$args['prev_text']), 'awesemo'),
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	$next = get_next_post_link(
		'%link',
		__(sprintf($template, 'fa-angle-right', 'post-next-icon', 'post-previous-content', 'Next Post', $args['next_text']), 'awesemo'),
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
		$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
	}

	echo($navigation);
}


function awesemo_posts_navigation($args = array()) {
	$navigation = '';

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
		$args = wp_parse_args( $args, array(
			'prev_text'          => __( 'Older posts' ),
			'next_text'          => __( 'Newer posts' ),
			'screen_reader_text' => __( 'Posts navigation' ),
		) );

		$next_link = get_previous_posts_link( __($args['next_text'] . '<i class="fa fa-arrow-right"></i>', 'awesemo'));
		$prev_link = get_next_posts_link( __('<i class="fa fa-arrow-left"></i>' . $args['prev_text'], 'awesemo') );

		if ( $prev_link ) {
			$navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
		}

		if ( $next_link ) {
			$navigation .= '<div class="nav-next">' . $next_link . '</div>';
		}


		$navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
	}
    echo($navigation);
}

/*add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button button-link button-large"';
}*/

/*add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="button button-link button-large"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}*/


function awesemo_recent_posts() {
    ?>
        <aside id="recent-post-widget" class="widget widget_recent_entries article-single">
            <h3>Latest Posts</h3>
            <ul>
            <?php
                $args = array( 'numberposts' => '5' );
                $recent_posts = wp_get_recent_posts($args);
                foreach( $recent_posts as $recent ){
                    if($recent['post_status']=="publish"){
                    ?>
                        <li>
                            <div class="thumbnail">
                            <?php
                                echo '<a href="' . get_permalink($recent["ID"]) . '">' .get_the_post_thumbnail($recent["ID"], 'recent-thumbnail').'</a>'
                            ?>
                            </div>
                            <div class="detail">
                            <?php
                                echo '<a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a>';
                                echo '<span class="post-date">'.mysql2date('F j, Y', $recent['post_date']).'</span>';
                            ?>
                            </div>
                        </li>
                    <?php
                    }
                }
                ?>
            </ul>
        </aside>
    <?php
}


function awesemo_posts_pagination($pages = '', $range = 4)
{
    $prev_arrow = is_rtl() ? '<i class="fa fa-angle-right"></i>' :'<i class="fa fa-angle-left"></i>';
    $next_arrow = is_rtl() ? '<i class="fa fa-angle-left"></i>' :'<i class="fa fa-angle-right"></i>';

    global $wp_query;
    $total = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if( $total > 1 )  {
         if( !$current_page = get_query_var('paged') )
             $current_page = 1;
         if( get_option('permalink_structure') ) {
             $format = 'page/%#%/';
         } else {
             $format = '&paged=%#%';
         }
        echo paginate_links(array(
            'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'		=> $format,
            'current'		=> max( 1, get_query_var('paged') ),
            'total' 		=> $total,
            'mid_size'		=> 3,
            'type' 			=> 'list',
            'prev_text'		=> $prev_arrow,
            'next_text'		=> $next_arrow,
         ) );
    }
}


function awesemo_social_icons() {
?>
        <div class="header-social-icons">
            <ul>
                <li>
                    <a class="icon-facebook" href="https://www.facebook.com/asimsaeedmalik">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="icon-twitter" href="https://twitter.com/asimmalik">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="icon-linkedin" href="https://uk.linkedin.com/in/asimsmalik">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="icon-github" href="https://github.com/asmalik107">
                        <span class="fa-stack fa-stack-header">
                            <i class="fa fa-circle fa-stack-2x fa-stack-square"></i>
                            <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    <?php

}


function awesemo_footer_content() {

}


add_action( 'edit_category', 'awesomo_category_transient_flusher' );
add_action( 'save_post',     'awesomo_category_transient_flusher' );
