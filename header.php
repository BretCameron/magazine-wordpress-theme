<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marketeer_Now
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

 <!-- HEADER -->
    <nav id="header-links">
        <div class="container">
			<?php
		wp_nav_menu(array(
			'theme_location' => 'menu-1',
			'menu_id' => 'primary-menu'
		));
		?>
        </div>
	</nav>
	



    <header id="nav-header">
        <div class="container">
            <div class="flex-logo">
				<?= the_custom_logo() ?>
				<p id="tagline"><?= get_bloginfo('description', 'display'); ?></p>
			</div>
		</div>
	</header>
	
<div class="container"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script></script>

    <!-- END OF HEADER -->
