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


register_sidebar(array(
     'name' => 'Footer' ,
     'id' => 'footer' ,
     'before_widget' => '<div class="widget">',
     'after_widget' => '</div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));


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


function yellowfuto( $atts, $content = null) {
    return '<div class="marker_yellow_futo ">' . $content . '</div>';
}
add_shortcode('yellowfuto', 'yellowfuto');


// アイキャッチ画像を有効にする
add_theme_support('post-thumbnails');
add_image_size(300,300,true);

function slider_scripts(){
wp_enqueue_script( 'slider', get_template_directory_uri() .'/slider.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'slider_scripts' );


// 固定カスタムフィールドボックス
function add_book_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	//第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
	//第5引数はnormalの他にsideとadvancedがあります。
	add_meta_box( 'book_setting', '本の情報', 'insert_book_fields', 'post', 'normal');
}
add_action('admin_menu', 'add_book_fields');
 
 
// カスタムフィールドの入力エリア
function insert_book_fields() {
	global $post;
 	$book_label_check ="";
	//下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
	echo '題名： <input type="text" name="book_name" value="'.get_post_meta($post->ID, 'book_name', true).'" size="50" /><br>';
	echo '作者： <input type="text" name="book_author" value="'.get_post_meta($post->ID, 'book_author', true).'" size="50" /><br>';
	echo '価格： <input type="text" name="book_price" value="'.get_post_meta($post->ID, 'book_price', true).'" size="50" />　<br>';
	
	if( get_post_meta($post->ID,'book_label',true) == "is-on" ) {
		$book_label_check = "checked";
	}//チェックされていたらチェックボックスの$book_label_checkの場所にcheckedを挿入
	echo 'ベストセラーラベル： <input type="checkbox" name="book_label" value="is-on" '.$book_label_check.' ><br>';
}
 
 
// カスタムフィールドの値を保存
function save_book_fields( $post_id ) {
	if(!empty($_POST['book_name'])){ //題名が入力されている場合
		update_post_meta($post_id, 'book_name', $_POST['book_name'] ); //値を保存
	}else{ //題名未入力の場合
		delete_post_meta($post_id, 'book_name'); //値を削除
	}
	
	if(!empty($_POST['book_author'])){
		update_post_meta($post_id, 'book_author', $_POST['book_author'] );
	}else{
		delete_post_meta($post_id, 'book_author');
	}
	
	if(!empty($_POST['book_price'])){
		update_post_meta($post_id, 'book_price', $_POST['book_price'] );
	}else{
		delete_post_meta($post_id, 'book_price');
	}
	
	if(!empty($_POST['book_label'])){
		update_post_meta($post_id, 'book_label', $_POST['book_label'] );
	}else{
		delete_post_meta($post_id, 'book_label');
	}
}
add_action('save_post', 'save_book_fields');



//-- phpをインクルードして実行のショートコード
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
            'file' => 'default'
    ), $params));
     ob_start(); 
     include(get_theme_root() . '/' . get_template() . "/$file.php"); 
     return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');
