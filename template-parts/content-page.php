<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awesim
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>>
	<div class="article-featured-image">
		   <?php the_post_thumbnail('large-thumbnail'); ?>

       <?php the_title( '<h3 class="entry-title entry-title-single">', '</h3>' ); ?>

        <header class="entry-header">
             <p class="entry-meta entry-meta-single">
                 <?php awesim_posted_on(); ?>
                 <?php awesim_on_comments(); ?>
                 <?php awesim_on_edit(); ?>
             </p>

        </header><!-- .entry-header -->
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesim' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'awesim' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

