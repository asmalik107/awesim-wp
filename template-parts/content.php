<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awesomo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-masonry'); ?>>


    <div class="article-featured-image">
        <a href="<?php echo get_permalink(); ?>">
         <?php the_post_thumbnail('small-thumbnail'); ?>
        </a>

         <span class="cat-links button button-tag"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'awesomo' ) ); ?></span>

        <header class="entry-header">
            <?php if ( 'post' === get_post_type() ) : ?>
                <p class="entry-meta">
                    <?php awesomo_posted_on(); ?>
                    <?php awesomo_on_comments(); ?>
                    <?php awesomo_on_edit(); ?>
                </p>
            <?php endif; ?>

            <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>


        </header><!-- .entry-header -->

	 </div>

	<div class="entry-content">
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'awesomo' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
		<a href="<?php echo get_permalink(); ?>" class="button button-link"> Read More...</a>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesomo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<!--	<footer class="entry-footer">
		<?php awesomo_entry_footer(); ?>
	</footer>--><!-- .entry-footer -->
</article><!-- #post-## -->
