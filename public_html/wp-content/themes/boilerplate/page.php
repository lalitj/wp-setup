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

<?php the_post(); ?>

    <div class="col-10 col-md-10 col-sm-9">
        <div class="content">
            <div class="content-block">
                <h1 class="main-title">/ <?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>