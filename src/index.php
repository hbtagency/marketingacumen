<?php get_header("blog"); ?>
  <div class="wrap-content container general-content">
    <div class="site-content col-md-12 col-xs-12 col-sm-12">
      <section id="primary" class="content-area">
        <main id="main" class="site-main">
        <?php if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <?php //$catgory = get_the_category(); 
             ?> 
            <?php if($catgory[0]->name != "TEMPLATE ElEMENT") : ?> 
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
              <header class="entry-header blog-header">
                <?php
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail();
                    }
                ?>
                <h2>
                    <?php the_title(); ?>
                </h2>
              </header>
              <br/>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </article>
          <?php endif;?>
          <?php endwhile;
        } else { ?>
          <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
              <h1><?php _e( 'Not found', 'voidx' ); ?></h1>
            </header>
            <div class="entry-content">
              <p><?php _e( 'Sorry, but your request could not be completed.', 'voidx' ); ?></p>
              <?php get_search_form(); ?>
            </div>
          </article>
        <?php } ?>
        </main>
        <?php //voidx_post_navigation(); ?>
      </section>
    </div>
    <?php //get_sidebar(); ?>
  </div>
<?php get_footer(); ?>