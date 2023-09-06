<?php 
/*
* Plugin Name: Blog Counter
* Plugin URI: test.com
* Description: This is Blog post counter plugin
* Version: 1.0.0
* Author: Ibrahim Monir
* Author URI: khalil.com
* License: GPL v2 or letter
* Text Domain: blog-counter

*/

add_shortcode( 'blog_counter', 'blog_counter_func' );

/* update version 3 */

function blog_counter_func(){
  
    $arg = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($arg);
    ob_start();
    if($query->have_posts()):
    ?>
    <ul>
        <?php
            while($query->have_posts()){
                $query->the_post();
                echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
            }
        
        ?>
    </ul>

    <?php
    endif;

    $html = ob_get_clean();

    return $html;
     
}
