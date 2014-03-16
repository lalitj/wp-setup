<?php
/**
 * Template Name: Subscribe
 */

get_header(); 
the_post();

?>
	<div class="col-10 col-md-10 col-sm-9">
		<div class="content">
			<h1 class="main-title">/ <?php the_title(); ?></h1>
			<div class="content-box">
                <div class="inner-content col-offset-2 col-md-offset-0 col-sm-offset-0">
                    <?php the_content(); ?>
                    <p><strong>What content would move your heart and mind most?</strong></p>
                    <div class="row">
                        <div class="col-12">
                            <form action="http://vmail.verylivingston.com/t/r/s/tjuiilr/" id="validateForm" class="form-block">
                                <div class="form-group">
                                    <div class="radio">
									<?php $subscribe_options = get_field('subscribe_options','option'); ?>
                                            <label for="">
                                                <input type="radio" class="icheck required" required name="cm-fo-jjtyuhj" value="4365279" checked><?php echo $subscribe_options[0]['option']; ?>
                                            </label>
											<label for="">
                                                <input type="radio" class="icheck required" required name="cm-fo-jjtyuhj" value="4365280"><?php echo $subscribe_options[1]['option']; ?>
                                            </label>
											<label for="">
                                                <input type="radio" class="icheck required" required name="cm-fo-jjtyuhj" value="4365281"><?php echo $subscribe_options[2]['option']; ?>
                                            </label>
											<label for="">
                                                <input type="radio" class="icheck required" required name="cm-fo-jjtyuhj" value="4365282"><?php echo $subscribe_options[3]['option']; ?>
                                            </label>
                                            <label for="">
                                                <input type="radio" class="icheck required" required name="cm-fo-jjtyuhj" value="4400662"><?php echo $subscribe_options[4]['option']; ?>
                                            </label>
									</div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12"><label for="" class="input-label">Name <em>(required)</em></label></div>
                                        <div class="col-7"><input type="text"  name="cm-name" class="input-text required"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12"><label for="" class="input-label">Email <em>(required)</em></label></div>
                                        <div class="col-7"><input type="text" name="cm-tjuiilr-tjuiilr" class="input-text required email"></div>
                                    </div>
                                </div>
                                <button class="btn btn-dark"><em>submit</em></button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>