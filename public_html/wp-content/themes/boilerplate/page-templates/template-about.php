<?php
/**
 * Template Name: About
 */

get_header(); 
the_post();
?>

	<div class="col-10 col-md-10 col-sm-9">
		<div class="content">

			<div class="content-block">
				<h1 class="main-title">/<?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
			<br>
			<?php
			query_posts('post_type=about'); ?>
            <hr>
			<?php
            while(have_posts()): the_post();
			?>
			<div class="content-block">
                <?php if(get_field('hide_title') != "yes"){ ?>
                <h2>//<?php the_title(); ?></h2>
                <?php the_content(); ?>
                <?php } else { ?>
				<div class="quote">
                    <div class="quote-content">
                        <?php the_content(); ?>
                    </div>
                </div>
				<?php } ?>
            </div>
            <br/>
            <br/>
			<?php
			endwhile;
			wp_reset_query();
			?>
            <div class="partners">
                <ul>
                    <?php
                    $companies = get_terms('company',array('hide_empty'=> false));
                    if($companies){
                    foreach($companies as $company) {
                        $taxonomy = $company->taxonomy;
                        $term_id = $company->term_id;
                        $logo = get_field('about_page_logo',$taxonomy . '_' . $term_id);
                        $link = get_field('link',$taxonomy . '_' . $term_id);
                        $target = "target='_blank'";
                        if(!$link){
                            $link = get_term_link($company);
                            $target = "";
                        }
                        ?>
                        <li><span class="logos"><img src="<?php echo $logo['url'] ; ?>" /></span><a class="text-link" href="<?php echo $link; ?>" <?php echo $target; ?>><?php echo $company->name; ?></a></li>
                    <?php }
                    }
                    ?>
                </ul>
            </div>
            <p>&nbsp;</p>
            <p>Interested in becoming an affector?  <a href="#"><em><strong>Click here</strong></em></a>.</p>
			<?php /*
			<div class="content-block">
				<hr>
				<h2>//Why?</h2>
				<p>Execution can bring something into existence but in today's world we have too much stuff and too much information. To create something isn't enough.It must move hearts and minds or else it has no value. We must create art.</p>
				<p>We believe that there’s an art to great business and a business in great art. Affectors meets in the middle, electrifying both hemispheres of the brain. Outcomes for our clients: </p>
				<div class="col-12">
					<div class="col-7 col-sm-12">
						<p><strong>Internal communications</strong> - increased alignment, productivity, motivation and innovative thinking.</p>
						<p><strong>External communications</strong> - customers and industry partners help drive your purpose and spread positive word of mouth. </p>
					</div>
				</div>
			</div>
			<br>
			<div class="content-block">
				<div class="quote">
					<div class="quote-content">
						<div class="row">
							<div class="col-5 col-sm-6">
								<blockquote>
									<p><em>“I've learned that people will forget what you said, people will forget what you did, but people will never forget how you made them feel.”</em></p>
								</blockquote>
								<p><em>- Maya Angelou. Poet, dancer, film producer, television producer, playwright, film director, author, actress, professor, civil rights activist<br>– AKA <a href="#" class="text-link">affector</a></em></p>
							</div>
							<div class="col-7 col-sm-6">
								<img src="<?php bloginfo("template_url"); ?>/assets/images/banner2.png" alt="" class="img-banner center" style="margin-top: -150px; margin-bottom: -30px;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="content-block">
				<h2>// How?</h2>
				<p>Once you engage the affectors a Creative Business Consultant is dedicated to finding out what moves the hearts and minds of you and your audience, through our Peripheral Vision workshops with you and your stakeholders. </p>
				<div class="video"><img src="<?php bloginfo("template_url"); ?>/assets/images/video/image1.jpg" alt="" class="img-default"></div>
				<p>Once we agree on scope and budget a team of affectors is assembled for you. The choice to use illustration, photography, animation, video, music, story, installation or event is made based on what you want to say and how we can deliver it to the greatest affect.Your Creative Business Consultant will manage your content marketing campaign from concept to final delivery ensuring it is delivered on brief, on time and on budget.</p>
			</div>
			<br><br><br><br>
			<div class="content-block">
				<div class="quote">
					<div class="quote-content">
						<div class="row">
							<div class="col-6">
								<blockquote>
									<br>
									<p><em>“Where the spirit does not work with the hand, <br>there is no art.”</em></p>
								</blockquote>
								<p><em>- Leonardo da Vinci. Painter, illustrator, inventor, engineer, architect, mathematician, surgeon, author – AKA affector.<br>– AKA <a href="#" class="text-link">affector</a></em></p>
							</div>
							<div class="col-6">
								<img src="<?php bloginfo("template_url"); ?>/assets/images/banner3.png" alt="" class="img-banner center" style="margin-top: -130px; margin-bottom: -100px;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="content-block">
				<h2>// Who?</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, nulla sed aspernatur quidem necessitatibus facere aliquam quis hic optio ab.</p>
				<div class="partners">
					<ul>
						<li><span class="logos"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/book-studios.png" alt=""></span><a href="#" class="text-link">Drawing Book Studios</a></li>
						<li><span class="logos"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/holding-pattern.png" alt=""></span><a href="#" class="text-link">The Holding Pattern</a></li>
						<li><span class="logos"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/very-livingston.png" alt=""></span><a href="#" class="text-link">Very Livingston</a></li>
						<li><span class="logos"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/super-vixen.png" alt=""></span><a href="#" class="text-link">Super Vixen</a></li>
					</ul>
				</div>
				<br>
				<div class="col-offset-1">
					Interested in becoming an <a href="#" class="text-link">affector?</a>&nbsp; &nbsp;<a href="#"><em><strong>Click here</strong></em></a>.
				</div>
			</div>
			<br><br>
			<?php */ ?>
		</div>
	</div>
<?php get_footer(); ?>