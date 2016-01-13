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
	    <!-- <a href="<?php echo get_permalink(); ?>"></a> -->

		<?php the_post_thumbnail('large-thumbnail'); ?>


        <header class="entry-header">
            <span class="cat-links button button-tag cat-size"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'awesomo' ) ); ?></span>

            <?php the_title( '<h3 class="entry-title entry-title-single">', '</h3>' ); ?>
            <p class="entry-meta entry-meta-single">
                <?php awesomo_posted_on(); ?>
                <?php awesomo_on_comments(); ?>
                <?php awesomo_on_edit(); ?>
            </p>
            <?php awesomo_tags(); ?>

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

</article><!-- #post-## -->

