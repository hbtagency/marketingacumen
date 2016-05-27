<?php 
/*
* Template Name: About Template
*/
get_header(); 
?>
<div class="full-container">
<section class="container">
     <?php if ( have_posts() ) {
            while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                <div class="body-content">
                    <?php the_content(); ?>
                    <?php //wp_link_pages(); ?>
                </div>
            </article>
            <?php endwhile;
        } else { ?>
            <article role="article">
                <p><?php _e( 'Sorry, but your request could not be completed.', 'voidx' ); ?></p>
                <?php get_search_form(); ?>
            </article>
    <?php } ?>
</section>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>