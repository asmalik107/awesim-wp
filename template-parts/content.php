<?php
/**
 * Template part for displaying posts.
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
            <span class="cat-item"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'awesim' ) ); ?></span>
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

	<div class="entry-content">
		<?php

		  //  awesim_custom_excerpt(
                the_excerpt( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'awesim' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ));
			//);
		?>
		<a href="<?php echo get_permalink(); ?>" class="button button-link button-small"> Read More...</a>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesim' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
