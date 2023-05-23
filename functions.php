<?php
add_shortcode('tp', 'shortcode_tp');
function shortcode_tp($atts, $content = '')
{
	return get_template_directory_uri() . $content;
}

/* 投稿アーカイブページの作成 */
// function post_has_archive($args, $post_type)
// {
// 	if ('post' == $post_type) {
// 		$args['rewrite'] = true;
// 		$args['has_archive'] = 'news'; //任意のスラッグ名
// 		$args['label'] = 'お知らせ'; //管理画面左ナビに「投稿」の代わりに表示される		
// 	}
// 	return $args;
// }
// add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ループ回数を取得
function loopNumber()
{
	global $wp_query;
	return $wp_query->current_post + 1;
}

// アイキャッチ画像を利用
add_theme_support('post-thumbnails');
set_post_thumbnail_size(960, 960, true);

// アイキャッチ画像のショートコード
function thumbnail_disp()
{
	return get_the_post_thumbnail();
}

function title_disp()
{
	return get_the_title();
}

add_shortcode('thumbnail', 'thumbnail_disp');
add_shortcode('the_title', 'title_disp');

// メディアを追加で「HTTPエラー」が出るのでその対処
add_filter('wp_image_editors', 'change_graphic_lib');
function change_graphic_lib($array)
{
	return array('WP_Image_Editor_GD', 'WP_Image_Editor_Imagick');
}

add_filter('wp_calculate_image_srcset_meta', '__return_null');


//メニュー項目名称変更
// function change_menu_label($args, $post_type)
// {
//   if ($post_type === 'post') {
//     $slug = 'news';
//     $args['label'] = 'お知らせ';
//     $args['labels'] = ['name' => 'お知らせ', 'singular_name' => 'お知らせ記事', 'menu_name' => 'お知らせ'];
//     $args['show_in_nav_menus'] = 'お知らせ';
//     $args['has_archive'] = $slug;//アーカイブページを持たせる
//     $args['rewrite'] = array(
//       'slug' => $slug,
//       'with_front' => false,//アーカイブページのURLを処理する（パーマリンクと被らないように）
//     );
//   }
//   return $args;
// }
// add_filter('register_post_type_args', 'change_menu_label', 10, 2);


/**
 * 投稿の設定変更
 * post_has_archive()
 *
 * @param object $args args.
 * @param string $post_type post_type.
 * @return object $args args.
 */
function post_has_archive( $args, $post_type ) {
	if ( 'post' === $post_type ) {
			$args['rewrite']     = true;
			$args['has_archive'] = 'news';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/**
* 投稿のパーマリンク変更.
* add_article_post_permalink()
*
* @param string $permalink permalink.
* @return string $permalink permalink.
*/
function add_article_post_permalink( $permalink ) {
	$permalink = '/news' . $permalink;
	return $permalink;
}
add_filter( 'pre_post_link', 'add_article_post_permalink' );

/**
* 投稿のリライトルール変更
* add_article_post_rewrite_rules()
*
* @param object $post_rewrite post_rewrite.
* @return string $return_rule return_rule.
*/
function add_article_post_rewrite_rules( $post_rewrite ) {
	$return_rule = array();
	foreach ( $post_rewrite as $regex => $rewrite ) {
			$return_rule[ 'news/' . $regex ] = $rewrite;
	}
	return $return_rule;
}
add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );

//コメント