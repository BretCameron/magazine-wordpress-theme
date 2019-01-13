<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marketeer_Now
 */

get_header();
?>

<div id="primary" class="content-area"> 
	<div class="container">
		<main id="main" class="site-main">
			<br>
<?php

$myFeaturedPost = new WP_Query();
$myFeaturedPost->query('posts_per_page=1');

while ($myFeaturedPost->have_posts()) :
	$myFeaturedPost->the_post();
$content = apply_filters('the_content', $post->post_content);
require 'post-preview.php';
endwhile;
wp_reset_postdata();
?>


		<!-- LATEST POSTS -->

				<h2>Latest Posts</h2>
				<div class="latest-posts">

<?php

$myPosts = new WP_Query('posts_per_page=5');

while ($myPosts->have_posts()) : $myPosts->the_post();
$ids[] = get_the_ID();

if (get_the_ID() !== $ids[0]) :
	$content = apply_filters('the_content', $post->post_content);
require 'post-preview.php';
endif;
endwhile;
wp_reset_postdata();
?>
				</div>
				<br>

				
				<h2>Influencer Marketing</h2>
				<div class="latest-posts">
<?php
// query_posts('category_name="Influencer Marketing" &posts_per_page=6');

$infMarketingPosts = new WP_Query('category_name=influencer-marketing');

while ($infMarketingPosts->have_posts()) : $infMarketingPosts->the_post();
$ids[] = get_the_ID();

$content = apply_filters('the_content', $post->post_content);
require 'post-preview.php';
endwhile;

?>
			</div>
			<br>


				<h2>Social Media</h2>
				<div class="latest-posts">
<?php
// query_posts('category_name="Influencer Marketing" &posts_per_page=6');

$infMarketingPosts = new WP_Query('category_name=social-media');

while ($infMarketingPosts->have_posts()) : $infMarketingPosts->the_post();
$ids[] = get_the_ID();

$content = apply_filters('the_content', $post->post_content);
require 'post-preview.php';
endwhile;

?>
			</div>
			<br>






			
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->


<?php
// get_sidebar();
get_footer();
?>


<!-- FUNCTIONS -->

<?php
// FUNCTION TO GET READING TIME
function getReadingTime($content, $wordsPerMinute = 200, $message = 'minute read')
{
	$readingTime = round(str_word_count(strip_tags($content)) / $wordsPerMinute);
	if ($readingTime == 0) {
		$readingTime += 1;
	}
	return $readingTime . ' ' . $message;
};


// FUNCTION TO RETURN A PREVIEW OF THE ARTICLE CONTENT
$content = apply_filters('the_content', $post->post_content);
function contentPreview($content, $numOfWords = 10)
{
	$content = str_replace(array("\r", "\n"), '', $content);
	$spaceString = str_replace('<', ' <', $content);
	$doubleSpace = strip_tags($spaceString);
	$singleSpace = str_replace('  ', ' ', $doubleSpace);
	$pieces = explode(" ", $singleSpace);
	$first_part = implode(" ", array_splice($pieces, 0, $numOfWords));
	return $first_part;
};