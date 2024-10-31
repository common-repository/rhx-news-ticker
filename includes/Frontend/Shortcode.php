<?php

namespace RhxNews\Ticker\Frontend;

/**
 * Shortcode handler class
 */
if (!class_exists('Shortcode')){
class Shortcode {

    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'rhxnews-ticker', [ $this, 'render_shortcode' ] );
        
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_shortcode( $atts, $content = '' ) {
        
        wp_enqueue_script( 'academy-script' );
        wp_enqueue_style( 'academy-style' ); 

        ?>
        <?php ob_start(); ?>
        <div class="wpnhtp_body">
        <div class="label">
          <?php 
                $wpnhtp_label = get_option('wpnhtp_label'); 
                if(!empty($wpnhtp_label)) {echo esc_html($wpnhtp_label);} else {echo esc_html__("Breaking News:");}
              ?>
        </div>
        <ul class="<?php $wpnhtp_effect = get_option('wpnhtp_effect');
                         if(!empty($wpnhtp_effect)) {echo esc_html($wpnhtp_effect);} else {echo esc_html__("typing");}?>">
        <?php    
        /**
            Get post data.
        **/ 
        $wpnhtp_post_category = get_option('wpnhtp_post_category');
        $wpnhtp_number_post = get_option('wpnhtp_number_post'); 
        $wpnhtp_order = get_option('wpnhtp_order');
        
        /**
            Post query.
        **/     
        $wpnhtp_args = array(
                            'post_type' => 'post',
                            'category_name' => $wpnhtp_post_category,
                            'showposts' => $wpnhtp_number_post,
                            'orderby' => 'date',
                            'order' => $wpnhtp_order
                          );
        $wpnhtp_query = new \WP_Query($wpnhtp_args);
        while ($wpnhtp_query->have_posts()) : $wpnhtp_query->the_post(); 
        ?>
        <li><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
          <?php the_title(); ?></a></li>
        <?php
        endwhile; 
        wp_reset_query(); ?>
        </ul></div>
        <?php $my_var = ob_get_clean();
        return $my_var;
         ?>
        <?php
    }

}

}



