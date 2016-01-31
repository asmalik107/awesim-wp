<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Awesim
 */

if ( ! function_exists( 'awesim_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function awesim_posted_on() {
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

if ( ! function_exists( 'awesim_on_comments' ) ) :
/**
 * Prints HTML with meta information for the edit link.
 */
function awesim_on_comments() {

	if (  ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comment-o"></i>';
		comments_popup_link(esc_html__('0', 'awesim' ),
		    esc_html__('1', 'awesim' ),
		    esc_html__('%', 'awesim' ) );
		echo '</span>';
	}

}
endif;



if ( ! function_exists( 'awesim_on_edit' ) ) :
/**
 * Prints HTML with meta information for the edit link.
 */
function awesim_on_edit() {

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


if ( ! function_exists( 'awesim_tags' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function awesim_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '' );
		if ( $tags_list ) {
			printf('<div class="tagcloud text-center">' . esc_html__('%1$s', 'awesim' ) . '</div>', $tags_list);
		}
	}
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function awesim_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'awesim_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'awesim_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so awesim_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so awesim_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in awesim_categorized_blog.
 */
function awesim_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'awesim_categories' );
}

function awesim_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;

	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php esc_html_e( 'Pingback:', 'awesim' ); ?> <?php comment_author_link(); ?>
              <?php edit_comment_link( esc_html__( 'Edit', 'awesim' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
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
                            <?php edit_comment_link( esc_html__( 'Edit', 'awesim' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
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


function awesim_post_navigation( $args = array() ) {
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
		__(sprintf($template, 'fa-angle-left', 'post-previous-icon', 'post-next-content','Previous Post' ,$args['prev_text']), 'awesim'),
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	$next = get_next_post_link(
		'%link',
		__(sprintf($template, 'fa-angle-right', 'post-next-icon', 'post-previous-content', 'Next Post', $args['next_text']), 'awesim'),
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


function awesim_posts_navigation($args = array()) {
	$navigation = '';

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
		$args = wp_parse_args( $args, array(
			'prev_text'          => __( 'Older posts' ),
			'next_text'          => __( 'Newer posts' ),
			'screen_reader_text' => __( 'Posts navigation' ),
		) );

		$next_link = get_previous_posts_link( __($args['next_text'] . '<i class="fa fa-arrow-right"></i>', 'awesim'));
		$prev_link = get_next_posts_link( __('<i class="fa fa-arrow-left"></i>' . $args['prev_text'], 'awesim') );

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


function awesim_recent_posts() {
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


function awesim_posts_pagination($pages = '', $range = 4)
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


function awesim_social_icons() {
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


function awesim_footer_content() {
?>
	<div class="copyright">
	        <span>© Asim Malik</span>
	        <span>
	        	<?php printf( esc_html__( 'Theme: %1$s designed and developed by Asim Malik. Powered by %2$s.', 'awesim' ), '<a href="https://github.com/asmalik107/awesim-wp">Awesim</a>', 'WordPress' ); ?>
	        </span>
	    <!--<?php awesim_social_icons() ?> -->
    </div>
<?php
}


function awesim_get_archives() {

   $output = '';
   global $wpdb;
   $prev_year = null;

   $template = '
        <a href="%1$s">
            %2$s
            (%3$s)
        </a>
   ';

   $year_template = '
        <h3><a href="%1$s">%2$s</a></h3>
   ';

   $month_names = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June",
            7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");


   $months = $wpdb->get_results(	"SELECT DISTINCT MONTH( post_date ) AS month ,
   								YEAR( post_date ) AS year,
   								COUNT( id ) as post_count FROM $wpdb->posts
   								WHERE post_status = 'publish' and post_date <= now( )
   								and post_type = 'post'
   								GROUP BY month , year
   								ORDER BY post_date DESC");

   	  foreach($months as $month) :
        $current_year = $month->year;
        if ($current_year != $prev_year){
           	if ($prev_year != null){
           		$output .= '</ul></div>';
           	}

            $output .= '<div class="archive-years">';
            $output .= __(sprintf($year_template, get_year_link($current_year), esc_attr($current_year)));
            $output .= '<ul  class="archive-list">';
        }

        $output .= '<li>';

        if (isset($month_names[$month->month])){
            $output .= __(sprintf($template, get_month_link( $current_year, $month->month ),
                date("F", mktime(0, 0, 0, $month->month, 1,$current_year)), $month->post_count));
        } else {
            $output .= $month_names[$month->month];
        }

        $output .= '</li>';

        $prev_year = $current_year;
   	  endforeach;

   	  $output .= '</div>';
   	  echo $output;

}

function awesim_get_archives2(){
   global $wpdb;
    $yearliest_year = $wpdb->get_results(

        "SELECT YEAR(post_date) AS year
         FROM $wpdb->posts
         WHERE post_status = 'publish'
         AND post_type = 'post'
         ORDER BY post_date
         ASC LIMIT 1

    ");


    //If there are any posts
    if($yearliest_year){

        //This year
        $this_year = date('Y');

        //Setup months
        $months = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");

        $current_year = $yearliest_year[0]->year;


        //Loop through every year and check each monnth of each year for posts
        while($current_year <= $this_year){

            echo "<h3>" . $current_year . "</h3>";

            echo "<ul>";

            foreach($months as $month_num => $month){


                //Checks to see if a month a has posts
                if($search_month = $wpdb->query(

                        "SELECT MONTHNAME(post_date) as month

                            FROM $wpdb->posts
                            WHERE MONTHNAME(post_date) = '$month'
                            AND YEAR(post_date) = $current_year
                            AND post_type = 'post'
                            AND post_status = 'publish'
                            LIMIT 1

                ")){

                    //Month has post -> link it
                    echo "<li>

                            <a href='" . get_bloginfo('url') . "/" . $current_year . "/" . $month_num . "/'><span class='archive-month'>" . $month . "</span></a>

                          </li>";


                }else{

                    //Month does not have post -> just print it

                    echo "<li>

                            <span class='archive-month'>" . $month . "</span>

                          </li>";
                }



            }

            echo "</ul>";

            $current_year++;


        }

    }else{

        echo "No Posts Found.";

    }
}


add_action( 'edit_category', 'awesim_category_transient_flusher' );
add_action( 'save_post',     'awesim_category_transient_flusher' );
