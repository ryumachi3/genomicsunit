<?php
add_shortcode('tp', 'shortcode_tp');
function shortcode_tp($atts, $content = '')
{
	return get_template_directory_uri() . $content;
}

/* 投稿アーカイブページの作成 */
function post_has_archive($args, $post_type)
{

	if ('post' == $post_type) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'news'; //任意のスラッグ名
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

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

// ユーザーごとの投稿数
function count_user_posttype($userid, $posttype)
{
	global $wpdb;
	$where = get_posts_by_author_sql($posttype, true, $userid, true);
	$count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts $where");
	return $count;
}

add_action('admin_menu', 'remove_menus');

function remove_menus()
{
	if (current_user_can('author')) {
		remove_menu_page('index.php');                  //ダッシュボードを隠します
		remove_menu_page('edit.php');                   //投稿メニュを隠します
		remove_menu_page('upload.php');                 //メディアを隠します
		remove_menu_page('edit.php?post_type=page');    //ページ追加を隠します
		remove_menu_page('edit.php?post_type=news');    //ニュースを隠します
		remove_menu_page('edit.php?post_type=model');    //モデルハウスを隠します
		remove_menu_page('wpcf7');                       //お問い合わせを隠します
		remove_menu_page('edit-comments.php');          //コメントメニューを隠します
		remove_menu_page('themes.php');                 //外観メニューを隠します
		remove_menu_page('plugins.php');                //プラグインメニューを隠します
		remove_menu_page('tools.php');                  //ツールメニューを隠します
		remove_menu_page('options-general.php');        //設定メニューを隠します

		remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); //サイトヘルスステータス
		//remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //概要
		remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //アクティビティ
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //クイックドラフト
		remove_meta_box('dashboard_primary', 'dashboard', 'side'); //WordPressニュース
		remove_action('welcome_panel', 'wp_welcome_panel'); //ようこそ
	}
}

// 自分の投稿だけ見えるように
function show_only_authorpost($query)
{
	global $current_user;
	if (is_admin()) {
		if (current_user_can('author')) {
			if (
				isset($query->query['post_type'])
				&& ('works' === $query->query['post_type']
					|| 'architect' === $query->query['post_type']
					|| 'builder' === $query->query['post_type'])
			) {
				$query->set('author', $current_user->ID);
			}
		}
	}
}
add_action('pre_get_posts', 'show_only_authorpost');

// 一覧画面に作成者列の追加
add_action('admin_menu', 'myplugin_add_custom_box');
function myplugin_add_custom_box()
{

	if (is_admin()) {
		if (current_user_can('manage_options')) {
			if (function_exists('add_meta_box')) {
				add_meta_box('myplugin_sectionid', __('作成者', 'myplugin_textdomain'), 'post_author_meta_box', 'house', 'advanced');
			}
		}
	}
}
function manage_works_columns($columns)
{
	$columns['author'] = '作成者';

	// // 日付を列の最後に移動
	// $date = $columns['date'];
	// unset($columns['date']);
	// $columns['date'] = $date;

	return $columns;
}
function add_works_column($column, $post_id)
{
	if ('author' == $column) {
		$value = get_the_term_list($post_id, 'author');
		echo attribute_escape($value);
	}
}
add_filter('manage_posts_columns', 'manage_works_columns');
add_action('manage_posts_custom_column', 'add_works_column', 10, 2);

// 管理画面アイコンの変更
function my_dashboard_print_styles()
{
?>
	<style>
		#dashboard_right_now .\3100oku-count:before {
			content: "\f487";
		}

		#adminmenu #menu-posts-100oku div.wp-menu-image:before {
			content: "\f487";
		}
	</style>
<?php
}
add_action('admin_print_styles', 'my_dashboard_print_styles');

// 外観 > メニュー を使う宣言
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}

// 商品紹介ブロック
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
			'name'              => 'product block',
			'title'             => __('商品紹介'),
			'description'       => __('商品紹介用のカスタムブロックです。'),
			'render_template'   => 'acf/blocks/product.php',
			'category'          => 'formatting',
			'icon'              => 'wordpress',
			'keywords'          => array( 'product', '商品' ),
			'mode' => 'auto',
		));
	}
}

// 検索用のURLパラメーター
function add_query_vars_filter( $vars ){
	$vars[] = "genre";
	$vars[] = "price";
	$vars[] = "odr";
	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );