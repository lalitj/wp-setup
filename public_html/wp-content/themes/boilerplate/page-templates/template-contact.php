<?php
/**
 * Template Name: Contact
 */

get_header(); 
the_post();
?>
<?php
if(isset($_POST['submit'])) {
    $name = $_POST['contact_name'];
    $email = $_POST['contact_email'];
    $comment = $_POST['contact_comment'];
    $to = get_bloginfo('admin_email');
    $subject = "Contact Enquiry on ".get_bloginfo('name');
    $message = "<table><tbody>";
    $message .= "<tr><th>Name:</th><td>".$name."</td></tr>";
    $message .= "<tr><th>Email:</th><td>".$email."</td></tr>";
    $message .= "<tr><th>Comment:</th><td>".$comment."</td></tr>";
    $message .= "</tbody></table>";
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );
    wp_mail($to,$subject,$message);
    remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
    $show_message = 1;
}
?>
	<div class="col-10 col-md-10 col-sm-9">
		<div class="content">
			<h1 class="main-title">/ <?php the_title(); ?></h1>
			<div class="content-box">
					<div class="inner-content col-offset-2 col-md-offset-0 col-sm-offset-0">
                        <?php the_content(); ?>
                        <?php if($show_message == 1){ ?>
                        <p class="thanks">Thanks, your message has been sent. We'll get back to you shortly.</p>
                        <?php } ?>
						<div class="row">
							<div class="col-8">
								<form action="" id="validateForm" method="post" class="form-block">
									<div class="form-group">
										<div class="row">
											<div class="col-12"><label for="" class="input-label">Name <em>(required)</em></label></div>
											<div class="col-8"><input type="text" id="contact_name" name="contact_name" class="input-text required"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-12"><label for="" class="input-label">Email <em>(required)</em></label></div>
											<div class="col-8"><input type="text" id="contact_email" name="contact_email" class="input-text required email"></div>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="input-label">Comment <em>(required)</em></label>
										<textarea id="contact_comment" name="contact_comment" id="" cols="10" rows="10" class="required"></textarea>
										<button name="submit" class="btn btn-dark right"><em>submit</em></button>
									</div>
								</form>
							</div>
						</div>
						<br>
						<p>For direct contact please use the following details</p>
						<p><a href="mailto:matt@affectors.com.au"><strong><em>matt@affectors.com.au</em></strong></a></p>
						<p><strong><em>P +6 12 9310 4522 <br>Level 5, Studio 7, 35 Buckingham, Surry Hills, 2010 <br>Sydney, NSW, Australia</em></strong></p>
					</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>