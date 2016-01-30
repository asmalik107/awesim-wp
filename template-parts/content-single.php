<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awesim
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>>
	<div class="article-featured-image">
	    <!-- <a href="<?php echo get_permalink(); ?>"></a> -->

		<?php the_post_thumbnail('large-thumbnail'); ?>


        <header class="entry-header">
            <span class="cat-item cat-size"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'awesim' ) ); ?></span>

            <?php the_title( '<h3 class="entry-title entry-title-single">', '</h3>' ); ?>
            <p class="entry-meta entry-meta-single">
                <?php awesim_posted_on(); ?>
                <?php awesim_on_comments(); ?>
                <?php awesim_on_edit(); ?>
            </p>
            <?php awesim_tags(); ?>

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

</article><!-- #post-## -->

