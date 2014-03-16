<?php
/**
 * Template Name: news
 */

get_header(); 
the_post();
?>
	<div class="col-10 col-md-10 col-sm-9">
		<div class="content">
			<h1 class="main-title">/ MadMex</h1>
			<div class="video"><img src="<?php bloginfo("template_url"); ?>/assets/images/video/image1.jpg" alt="" class="img-default"></div>
			<div class="block-bar">
				<a href="#" class="text-link">affectors</a>
				<div class="logos">
					<ul>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/h.png" alt="" class="img-default"></a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/vl.png" alt="" class="img-default"></a></li>
					</ul>
				</div>
				<div class="social">
					<ul>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-facebook1.png" alt="" class="img-default"></a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-twitter1.png" alt="" class="img-default"></a></li>
					</ul>
				</div>
			</div>
			<hr>
			<div class="article">
				<div class="row">
					<div class="col-3 col-md-4 col-sm-4 right">
						<div class="img-content">
							<img src="<?php bloginfo("template_url"); ?>/assets/images/banner2.jpg" alt="" class="img-default">
							<div class="img-caption">
								<a href="#">#Animation</a> <a href="#">#Illustration</a> <a href="#">#Mexicana</a> <a href="#">#DiaDelLosMuertos</a> <a href="#">#Art</a>
							</div>
						</div>
					</div>
					<div class="col-9 col-md-8 col-sm-8">
						<h3><em><strong>A 3D animated Interactive online experience to celebrate Cinco de Mayo</strong></em></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fermentum felis velit, facilisis vehicula risus rhoncus quis. Morbi porttitor leo in justo ultricies mattis. Aenean ligula nisl, sodales sit amet gravida eu, feugiat quis lectus. Suspendisse nec nunc pellentesque, pretium eros posuere, aliquet dui. Suspendisse facilisis nulla vel condimentum tincidunt. Duis luctus sapien arcu, eu interdum augue tempus in. Curabitur mi magna, viverra eget sapien vel, molestie sagittis odio.</p>
						<p>Vestibulum dui elit, imperdiet aliquet justo non, pretium tristique velit. Donec tempus sem vitae dapibus elementum. Duis accumsan ante risus, quis pretium tortor rutrum quis. Phasellus tempor volutpat molestie. Mauris suscipit justo neque, vel dapibus mauris pellentesque sed. Nunc non urna suscipit, ultricies elit bibendum, posuere enim.</p>
						<p>Vestibulum dui elit, imperdiet aliquet justo non, pretium tristique velit. Donec tempus sem vitae dapibus elementum. Duis accumsan ante risus, quis pretium tortor rutrum quis. Phasellus tempor volutpat molestie. Mauris suscipit justo neque, vel dapibus mauris pellentesque sed. Nunc non urna suscipit, ultricies elit bibendum, posuere enim.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="paging right">
							<a href="#">&lt; <em>Previous</em></a> // <a href="#"> <em>Next</em> &gt;</a>
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</div>
<?php get_footer(); ?>