<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marketeer_Now
 */

?>

	<?php marketeer_now_post_thumbnail(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
	if (is_singular()) :
		the_title('<h1 class="entry-title">', '</h1>');
	else :
		the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
	endif;

	if ('post' === get_post_type()) :
	?>
	
			<div class="entry-meta">
				<?php
			marketeer_now_posted_on();
			marketeer_now_posted_by();
			?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
	the_content(sprintf(
		wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
			__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'marketeer-now'),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	));

	wp_link_pages(array(
		'before' => '<div class="page-links">' . esc_html__('Pages:', 'marketeer-now'),
		'after' => '</div>',
	));
	?>


</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php marketeer_now_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

