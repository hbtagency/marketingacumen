<?php
/*
* Template Name: Blog Template
*/
get_header(); ?>

  <div class="wrap-content container general-content">
    <div class="site-content col-md-9 col-xs-12 col-sm-12">
      <section id="primary" class="content-area">
        <main id="main" class="site-main">
       
         <?php if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php //post_class(); ?> role="article">
              <header class="entry-header">
                <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
              </header>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </article>
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
        <?php voidx_post_navigation(); ?>
      </section>
      
      <?php
        //for each category, show all posts
        $cat_args=array(
        'orderby' => 'name',
        'order' => 'ASC'
        );
        $categories=get_categories($cat_args);
        foreach($categories as $category) {
            $args=array(
            'showposts' => -1,
            'category__in' => array($category->term_id),
            'caller_get_posts'=>1
            );
            $posts=get_posts($args);
            if ($posts) {
                echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
                foreach($posts as $post) {
                setup_postdata($post); ?>
                <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                <?php
                } // foreach($posts
            } // if ($posts
            } // foreach($categories
       ?>
        
      
      
      
    </div>
    <div class="siderbar col-md-3 hidden-xs">
    <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>