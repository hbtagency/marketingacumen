<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="<?php bloginfo('description') ?>"/>
<meta name="keywords" content=""/>
<meta name="author" content="HBT | hbtagency.com.au">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Google fonts -->
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap-theme.min.css' rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/jquery-1.12.4.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>

<?php wp_head(); ?>
</head>
<body>
<header>
      <div class="container nav-container">
         <div class="row">
            <div class="logo-wrapper col-md-3 col-sm-4 col-xs-7">
                <a href="<?php echo bloginfo('url'); ?>">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="search"/>
                </a>
            </div>    
            <div class="nav-wrapper col-md-9 col-sm-8 col-xs-5">
                
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        </div>
                            <?php
                                wp_nav_menu( array(
                                    'menu'              => 'primary',
                                    'theme_location'    => 'primary',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav pull-right',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker())
                                );
                            ?>
                        </div>
                    </nav>
            </div>
         </div>
      </div>
      
      

      <?php
        if(is_front_page()){         
            echo do_shortcode("[rev_slider main-slider]");
        }else{?>
            <div class="header-banner" style="background:url('<?php do_shortcode('[WP_HEADER_IMAGES]'); ?>') no-repeat;background-size:cover;">
                 <div class="captions">
                      <span class="title"><h1><?php echo ((get_the_title() != "") && (get_the_title() != NULL)) ? get_the_title():$post->post_name;?></h1></span>
                      <span class="desc"></span>
                      <!--
                      <span class=""><h4><?php //custom_breadcrumbs(); ?></h4></span>
                      -->
                 </div>
            </div>
        <?php }
      ?>
  </header>  

