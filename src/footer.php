    <footer id="colophon" class="site-footer">
        <div class="footer-container container">
            
             <?php 
                $my_postid = 41;//This is page id or post id
                $content_post = get_post($my_postid);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                echo $content;
             ?>
             <div class="footer-bottom">
                 <div class="footer-bottom-left pull-left">
                     <?php
                                wp_nav_menu( array(
                                    'menu'              => 'footer',
                                    'theme_location'    => 'footer',
                                    'depth'             => 2,
                                    'container'         => 'nav',
                                    'container_class'   => '',
                                    'container_id'      => '',
                                    'menu_class'        => '',
                                    'walker'            => new wp_bootstrap_navwalker())
                                );
                            ?>
                 </div>
                 <div class="footer-bottom-right pull-right">
                     <span class="copyright">
                         Copyright 2015. Market Acumen
                     </span>
                 </div>
             </div>
         </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>