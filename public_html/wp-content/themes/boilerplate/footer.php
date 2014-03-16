<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="footer-logo"><a href="<?php bloginfo('url'); ?>">affectors</a></div>
			<div class="copyright">&copy; Copyright <?php echo date('Y');?> | All Rights Reserved.</div>
            <div class="site">Site by Very Livingston</div>
		</div>
		<div class="social">
			<ul>
				<li class="hidden-xs"><a href="<?php //the_field('facebook_link','option'); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-facebook.png" alt=""></a></li>
				<li class="hidden-xs"><a href="<?php //the_field('tweet_link','option'); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-tweet.png" alt=""></a></li>
				<li class="hidden-xs"><a href="<?php //the_field('google_link','option'); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-google.png" alt=""></a></li>
				<li class="hidden-xs"><a href="<?php //the_field('pinterest_link','option'); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-pinterest.png" alt=""></a></li>
				<li class="hidden-xs"><a href="<?php //the_field('digg_link','option'); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-digg.png" alt=""></a></li>
				<li class="hidden-xs"><a href="<?php //the_field('twitter_link','option'); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-twitter.png" alt=""></a></li>
			</ul>
		</div>
	</div>
</div>
<script>
ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
</script>
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<!--footer started-->
<?php wp_footer(); ?>
<!--footer ended-->
</body>
</html>