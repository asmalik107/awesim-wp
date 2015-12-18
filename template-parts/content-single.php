<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awesomo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>>
	<div class="article-featured-image">
	    <a href="<?php echo get_permalink(); ?>">
		   <?php the_post_thumbnail('large-thumbnail'); ?>
		</a>


        <header class="entry-header"
            <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'awesomo' ) ); ?></span>

            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

            <div class="entry-meta"
                <?php awesomo_posted_on(); ?>
            </div><!-- .entry-meta -->

        </header><!-- .entry-header -->
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesomo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

<!--	<footer class="entry-footer">
		<?php awesomo_entry_footer(); ?>
	</footer> --><!-- .entry-footer -->
</article><!-- #post-## -->

