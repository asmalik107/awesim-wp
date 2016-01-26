<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awesim
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-masonry'); ?>>
    <div class="article-featured-image">
        <a class="post-link" href="<?php echo get_permalink(); ?>">
           <?php the_post_thumbnail('small-thumbnail'); ?>
        </a>


        <header class="entry-header">
            <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>


            <?php if ( 'post' === get_post_type() ) : ?>
                <p class="entry-meta">
                    <?php awesim_posted_on(); ?>
                    <?php awesim_on_comments(); ?>
                    <?php awesim_on_edit(); ?>
                </p>
            <?php endif; ?>

        </header><!-- .entry-header -->

    </div>

	<div class="entry-summary">
	    <?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'awesim' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
		<a href="<?php echo get_permalink(); ?>" class="button button-link button-small"> Read More...</a>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->
