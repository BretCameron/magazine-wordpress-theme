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

	
	<div id="primary" class="content-area container">
		<main id="main" class="site-main">


<!-- Test -->

<!-- <div class="image-wrapper">
<img class= "inner-image" src="http://localhost:3000/marketeer-now-wordpress/wp-content/uploads/2019/01/1920x1080placeholder2-768x432.jpg">
</div> -->


<!-- FEATURED POST -->
	<?php
$readingSpeed = 200; //words per minute
$myFeaturedPost = new WP_Query();
$myFeaturedPost->query('showposts=1');

while ($myFeaturedPost->have_posts()) : $myFeaturedPost->the_post();
$ids[] = get_the_ID();
?>
<?php if (get_the_ID() == $ids[0]) :
?>
	<div id="featured-post">
		<div class="image-wrapper"><div class="inner-image"><?php marketeer_now_post_thumbnail(); ?></div></div>
<a class="permalink" href="<?php the_permalink(); ?>">
<h1><?= the_title() ?></h1>
</a>
<!-- READ TIME -->
<?php 
$content = apply_filters('the_content', $post->post_content);
?>  
<a class="permalink" href="<?php the_permalink(); ?>">
<div class="read-time"><?= getReadingTime($content) ?></div>
</a>

</div>
<!-- END READ TIME -->

<?php
endif;
endwhile;
?>

<!-- LATEST POSTS -->

<h2>Latest Posts</h2>


<div id="latest-posts">
<?php

$myPosts = new WP_Query();
$myPosts->query('showposts=5');

while ($myPosts->have_posts()) : $myPosts->the_post();
$ids[] = get_the_ID();
?>
<?php if (get_the_ID() !== $ids[0]) :
?>
	<div class="latest-post">
		
		<div class="image-wrapper"><div class="inner-image"><?php marketeer_now_post_thumbnail(); ?></div></div>
<a class="permalink" href="<?php the_permalink(); ?>">
<h1><?= the_title() ?></h1>
</a>
<!-- READ TIME -->
<?php 
$content = apply_filters('the_content', $post->post_content);
?>  
<a class="permalink" href="<?php the_permalink(); ?>">
<div class="read-time"><?= getReadingTime($content) ?></div>
</a>

</div>
<!-- END READ TIME -->

<?php else :
?>
<?php
endif;
endwhile;
?>
</div>

<br><br>



</div>

</main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();


// FUNCTION TO GET READING TIME
function getReadingTime($content, $wordsPerMinute = 200, $message = 'minute read')
{
	$readingTime = round(str_word_count(strip_tags($content)) / $wordsPerMinute);
	if ($readingTime == 0) {
		$readingTime += 1;
	}
	return $readingTime . ' ' . $message;
}