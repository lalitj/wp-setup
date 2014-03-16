<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
			<div id="content">
				<div class="ribbon"><span class="ribbon-left"></span><span class="ribbon-right"></span></div>
				<div class="title">
					<h1>404 Not Found</h1>
				</div>
				<div class="panel block">
					<div class="articles main-articles">
						<div class="article">
							<div class="article-content">
								<p><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentytwelve' ); ?></p>
								<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentytwelve' ); ?></p>
							</div>							
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>