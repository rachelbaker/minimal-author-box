<?php
/*
Plugin Name: Minimal Author Box
Description: Adds minimal author box to the bottom of posts
Version: 0.1
License: GPL
Author: Rachel Baker
Author URI: http://www.rachelbaker.me
*/



function rb_author_bio_display($content)
{

    // this is where we will display the bio

      $rb_bio_box =
        "<div id=\"author-bio-box\">
            ".get_avatar( get_the_author_meta("user_email"), "80" )."
            <h5>".get_the_author_meta ('first_name')
    .' '. get_the_author_meta ('last_name')."</h5>
            <p>".get_the_author_meta("description")."</p>
            <div class=\"spacer\"></div>
        </div>";

    if  ( 'post' == get_post_type() && is_single() )
    {
        return $content . $rb_bio_box;
    } else {
        return $content;
    }
}

    function rb_author_bio_style() {
        $rb_author_styleurl = plugins_url('author-box.css', __FILE__);
        $rb_author_stylefile = WP_PLUGIN_DIR . '/minimal-author-box/author-box.css';
        if ( file_exists($rb_author_stylefile) && (is_single()) ) {
            wp_register_style('rb_author_bio_style', $rb_author_styleurl);
            wp_enqueue_style( 'rb_author_bio_style');
        }
    }

add_action('the_content', 'rb_author_bio_display', 40, 1 );
add_action('wp_print_styles', 'rb_author_bio_style');


?>