<?php
function sample_scripts(){
  wp_enqueue_style('style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'sample_scripts');
 
//カスタムメニュー
register_nav_menus(array(
    'navigation' => 'ナビゲーションバー'
));
 
//カスタムメニュー
add_theme_support('menus'); 

//ウィジェット
function sample_widgets(){
  
register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'sidebar',
    'before_widget'=>'<div class="sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar-title">',
    'after_title' => '</h4>'
));  
}
add_action('widgets_init', 'sample_widgets');


function leftVerticalLine($atts, $content = null) {
    return '<div class="leftVerticalLine">' . $content . '</div>';
}
add_shortcode('leftv', 'leftVerticalLine');

function leftyellow($atts, $content = null) {
    return '<div class="leftVerticalLineYellow">' . $content . '</div>';
}
add_shortcode('leftvy', 'leftyellow');

function akawaku( $atts, $content = null) {
    return '<div class="akawaku">' . $content . '</div>';
}
add_shortcode('akawaku', 'akawaku');



// アイキャッチ画像を有効にする
add_theme_support('post-thumbnails');
add_image_size(300,300,true);

function slider_scripts(){
wp_enqueue_script( 'slider', get_template_directory_uri() .'/slider.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'slider_scripts' );
