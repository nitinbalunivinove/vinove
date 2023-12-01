<?php

add_action( 'wp_enqueue_scripts', 'epcl_reco_child_styles', 100 );

function epcl_reco_child_styles() {
    wp_enqueue_style( 'reco-child-css', get_stylesheet_directory_uri().'/style.css', array(), '302112323' );
}

function epcl_child_theme_slug_setup() {
    load_child_theme_textdomain( 'reco', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'epcl_child_theme_slug_setup' );

add_action( 'rest_api_init', function(){
    register_rest_route( 'blogposts/v1', '/posts/', array(
        'methods' => 'GET',
        'callback' => 'getRequiredPosts',
    ));
});

function getRequiredPosts(){
    $loop = new WP_Query( 
        array(
            'post_type' => 'post', 
            'posts_per_page' => 3, 
            'meta_query' => array( array( 'key' => '_thumbnail_id', 'compare' => 'EXISTS' ) )  
        ) 
    );
    $data = [];
    if( $loop->have_posts() ){
        while( $loop->have_posts() ) : $loop->the_post();
        global $post;
        $author_id = $post->post_author;
        $data[] = array(
            'thumbnail'     => get_the_post_thumbnail_url( get_the_ID() ),
            'title'         => get_the_title( get_the_ID() ),
            'permalink'     => get_permalink( get_the_ID() ),
            'comments'      => ( get_comments_number() > 1 ) ? get_comments_number() .' comments': get_comments_number() .' comment',
            'created_at'    => get_the_date(),
            'author'        => get_the_author_meta( 'display_name' , $author_id ),
            'author_image'  => get_the_author_meta( 'avatar' , $author_id ),
            'experpt'       => get_the_excerpt( get_the_ID() )
        );    
        endwhile;
    }
    wp_send_json( $data );
    wp_reset_postdata();
}
?>