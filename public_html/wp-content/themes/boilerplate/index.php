<?php
/**
 * The main template file.
 * Used in following:
 * Homepage
 * Search Page
 * News Page
 * Category Page
 */

get_header(); ?>

<?php
global $query_string; //added for enabling search and category parameters
/*
?>
<div class="col-10 col-md-10 col-sm-9">
    <?php
    if(is_search()){ //Check for # in search queries. If yes then display category posts.
        $isTagSearch = (substr(get_search_query(),0,1) == "#");
    }
    if($isTagSearch){
        $query_string = "category_name=".get_search_query();
        ?>
        <h1 class="main-title">/ <?php echo "Results for tag '".get_search_query()."'"; ?></h1>
    <?php } elseif(is_category()){ ?>
        <h1 class="main-title">/ <?php echo "Results for tag '".single_cat_title('',false)."'"; ?></h1>
    <?php } elseif(is_search()){ ?>
        <h1 class="main-title">/ <?php echo "Search results for '".get_search_query()."'"; ?></h1>
    <?php } elseif(is_tax()){ ?>
        <h1 class="main-title">/ <?php echo "Results for ".get_queried_object()->taxonomy." '".single_term_title('',false)."'"; ?></h1>
    <?php }
    $query_string = $query_string."&showposts=12";
    query_posts($query_string);
    ?>
    <div class="row">
		<div class="col-12">
			<div class="articles">
				<div id="articles-columns">
					<div class="grid-sizer"></div>
                    <?php
                    if(!have_posts()){
                        echo "<p>No results found</p>";
                    }
                    while(have_posts()):the_post();
                    $listing_size = get_field('listing_size');
                    ?>
                    <div class="col <?php echo $listing_size; ?>">
                        <div class="article">
                            <?php
                            $default_attr = array(
                                'class'	=> "img-default",
                            );
                            ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', $default_attr); ?></a>
                            <div class="article-content">
                                <div class="article-details">
                                    <h1><a href="<?php the_permalink(); ?>?play=1"><?php the_title(); ?></a></h1>
                                    <p><?php //the_field("tagline"); ?></p
                                    <a href="<?php the_permalink(); ?>?play=1"><span class="icon icon-play"></span><em>PLAY VIDEO</em></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
				</div>
                <span class="show-more"></span>
                <span style="display:none" class="show-more-query"><?php echo trim($query_string,'&'); ?></span>
			</div>
		</div>
	</div>
</div>
<?php */ get_footer(); ?>