<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 
the_post(); ?>

	<div class="col-10 col-md-10 col-sm-9">
		<div class="content">
			<h1 class="main-title">/ <?php the_title(); ?></h1>
			<div class="video">
				<?php echo video_from_acf("video_url",960,544); ?>
			</div>
			<div class="block-bar">
				<!--<a href="#" class="text-link">affectors</a>-->
                <?php $client_logos = get_field('client_logos'); ?>
                <div class="logos">
                 <?php
                 //$value = get_field('logo', 'company'); echo $value; die();
                 ?>
                    <ul>
                        <?php
                        $companies = wp_get_post_terms(get_the_ID(),'company');
                        //print_r($companies);
                        foreach($companies as $company) {
                            $taxonomy = $company->taxonomy;
                            $term_id = $company->term_id;
                            $logo = get_field('logo',$taxonomy . '_' . $term_id);
                           // $link = get_field('link',$taxonomy . '_' . $term_id);
                            //$target = "target='_blank'";
                            //if(!$link){
                                $link = get_term_link($company);
                              //  $target = "";
                            //}
                        ?>
                            <li><a href="<?php echo $link; ?>"><img src="<?php echo $logo['url'] ; ?>" class='img-default' /></a></li>
                       <?php } ?>
                    </ul>

                </div>
                <?php /*
                    <div class="logos">
                        <ul>
						   <?php
                           if(is_array($client_logos)) {
							   foreach($client_logos as $client_logo){ ?>
									<li><a href="<?php echo $client_logo['link']; ?>" target="_blank"><img src="<?php echo $client_logo['logo']['url']; ?>" alt="" class="img-default"></a></li>
							   <?php 
							   }
                           }
                           ?>
                        </ul>
                    </div>
                        */ ?>
                <?php /*
				<div class="logos">
					<ul>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/h.png" alt="" class="img-default"></a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/logos/vl.png" alt="" class="img-default"></a></li>
					</ul>
				</div>
				  */?>
				 <div class="social">
					<ul>
						<li><a class="popup_link" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-facebook1.png" alt="" class="img-default"></a></li>
						<li><a class="popup_link" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-twitter1.png" alt="" class="img-default"></a></li>
					</ul>
				 </div> 
				 <?php /*
				<div class="social">
					<ul>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-facebook1.png" alt="" class="img-default"></a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/assets/images/icons/icon-twitter1.png" alt="" class="img-default"></a></li>
					</ul>
				</div>   
                */ ?>				
			</div>
			<hr>
			<div class="article">
				<div class="row">
                    <?php /*
					<div class="col-3 col-md-4 col-sm-4 right">
						<div class="img-content">
							<?php the_post_thumbnail("news_thumb"); ?>
							<div class="img-caption">
								<?php the_category(' '); ?>
							</div>
						</div>
					</div>
					<div class="col-9 col-md-8 col-sm-8">
                    */ ?>
                    <div class="col-12">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="paging right">
							<?php previous_post_link('%link','&lt; <em>Previous</em>'); ?> // <?php next_post_link('%link','<em>Next</em> &gt;'); ?>
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</div>
<?php get_footer(); ?>