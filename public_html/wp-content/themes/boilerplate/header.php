<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_template_part('layouts/head');
?>
<body class="<?php if(is_user_logged_in()): echo "with-admin-bar"; endif; ?>">
<div id="outer-wrapper">
	<div class="graphic-topleft hidden-xs"></div>
	<div class="graphic-bottomright hidden-xs"></div>
	<div class="container">
		<div class="header">
			<div class="header-left">
				<div class="logo"><a href="<?php bloginfo("url"); ?>">Affectors</a></div>
			</div>
			<button type="button" class="nav-toggle">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
			<div class="tagline hidden-xs"><?php //the_field('tagline','option'); ?></div>

		</div>
		<div class="main">
			<div class="row">
				<div class="col-2 col-md-2 col-sm-3">
					<div class="nav-collapse">
						<?php get_search_form(); ?>
						<br>
						<ul class="nav">
    					      <?php
                              wp_nav_menu( array('menu' => 'Nav Menu'));
                              ?>
						</ul>
       					<?php /*
						<ul class="nav">
							<li <?php if(is_home()) { echo 'Class="active"'; } ?>><a href="<?php bloginfo("url"); ?>">home</a></li>
							<li <?php if(is_page(4)) { echo 'Class="active"'; } ?>><a href="<?php echo get_permalink(4); ?>">about</a></li>
							<li <?php if(is_page(8)) { echo 'Class="active"'; } ?>><a href="<?php echo get_permalink(8); ?>">contact</a></li>
							<li <?php if(is_page(13)) { echo 'Class="active"'; } ?>><a href="<?php echo get_permalink(13); ?>">subscribe</a></li>
							<li <?php if(is_single() || is_page(57)) { echo 'Class="active"'; } ?>><a href="<?php echo get_permalink(57); ?>">news</a></li>
							<li><a href="#">members</a></li>
						</ul>
						*/ ?>
					</div>
				</div>