<?php
/*
* Template Name: Blog Template
*/
get_header(); ?>

  <div class="wrap-content container general-content">
    <div class="site-content col-md-12 col-xs-12 col-sm-12">
      <section id="primary" class="content-area">
        <main id="main" class="site-main">
         <?php if ( have_posts() ) {
          while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php //post_class(); ?> role="article">
              <header class="entry-header">
                <h2><?php the_title(); ?></h2>
              </header>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </article>
          <?php endwhile;
        } else { ?>
          <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
              <h2><?php _e( 'Not found', 'voidx' ); ?></h2>
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
      
      
      <section class="blog-area">
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
                //echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
                foreach($posts as $post) {
                setup_postdata($post); ?>
                <article class="col-sm-4">
                    <div class="img-container clearfix">
                        <a href="<?php the_permalink() ?>">
                            <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                the_post_thumbnail();
                            }else{?>
                                <div style="width:100%;height:200px;background-color:gray;position:relative;">
                                    <h3 style="position:absolute;left:0;right:0;top:50px;bottom:0;width:200px;height:80px;margin:auto;text-align:center;color:#fff;">
                                        No Image
                                    </h3>
                                </div>
                            <?php    
                            }
                            ?>
                        </a>
                    </div>
                    <div class="blog-item-content">
                        <span class="blog-item-content-row title clearfix">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
                        </span>
                        <span class="blog-item-content-row desc clearfix">
                            <?php the_excerpt(); ?>
                        </span>
                        <a class="blog-item-link-button" href="<?php the_permalink() ?>"></a>
                    </div>
                </article>
                <?php
                } // foreach($posts
            } // if ($posts
            } // foreach($categories
       ?>
         </section>     
    </div>

  </div>
<?php get_footer(); ?>