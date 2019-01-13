<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marketeer_Now
 */

get_header();
?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			
			
			<?php
		while (have_posts()) :
			the_post();
		?> 
			<br>
			<div class="flex-article">
				<div class="article-block">
<?php

get_template_part('template-parts/content', get_post_type());


the_post_navigation();






// If comments are open or we have at least one comment, load up the comment template.
if (comments_open() || get_comments_number()) :
	comments_template();
endif;

endwhile; // End of the loop.
?>





				</div>
				<div class="related-block">
				
					<h2>Related Stories</h2>

					<?php

				$relatedPosts = new WP_Query('posts_per_page=5');
				$postid = get_the_ID();

				while ($relatedPosts->have_posts()) : $relatedPosts->the_post();

				if (get_the_ID() !== $postid) :
					$content = apply_filters('the_content', $post->post_content);
				?>
<a class="permalink" href="<?php the_permalink(); ?>">

<!-- MAKE IMAGE THUMBNAIL A CLICKABLE LIGHTBOX -->
<div class="related-img-wrapper">					
<div class="related-stories-img">
						<?php marketeer_now_post_thumbnail(); ?>
					</div></div>
				
					<div class="related-title"><?= the_title() ?></div>
					<br>
				
				</a>

<?php
endif;
				
				// require 'post-preview.php';
endwhile;

?>

<hr><br>
<h2>Don't miss a story</h2>
<div style="text-align:center;">Get the highlights of Marketeer Now straight to your inbox, once a week.<p>
<form class="sidebar-form">
<input type="email" name="emailaddress" placeholder="name@email.com">
<button type="button">Sign up</button>
</form><br><hr>

				</div>
			</div>
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
