<?php

//project
function project()
{
	return 'genomicsunit'; //プロジェクト名を入力（英数字）
}

//version
function lastupdate()
{
	return '20230525'; //キャッシュ対策に更新日を入れる
}

function theme_setup()
{
	/* titleタグ出力 */
	add_theme_support('title-tag');
}

add_action('after_setup_theme', 'theme_setup');

//タイトルのセパレーター変更
function change_title_separator($separator)
{
	$separator = '|';
	return $separator;
}
add_filter('document_title_separator', 'change_title_separator');

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

//head成形//
//METAタグのgeneratorを消す
remove_action('wp_head', 'wp_generator');
// wp-jsonを出力させない
remove_action('wp_head', 'rest_output_link_wp_head');
// ブログ編集ツールのタグを出力させない
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
// ショートリンクを出力させない
remove_action('wp_head', 'wp_shortlink_wp_head');
// Embed埋め込み用のタグを出力させない
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//RSSを削除
remove_action('wp_head', 'feed_links_extra', 3);

//絵文字無効
function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

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


// 固定ページで「抜粋」を有効化
add_post_type_support('page', 'excerpt');

// WordPressのjQueryをフロントでは無効
function deregister_script()
{
	if (!is_admin()) {
		wp_deregister_script('jquery');
	}
}
add_action('wp_enqueue_scripts', 'deregister_script', 100);

/* CSS・JSファイルを読み込み */
function genome_js_css()
{
	//CSS読み込み
	wp_enqueue_style(project() . '-googlefonts', 'https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap');
	wp_enqueue_style(project() . '-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array(project() . '-googlefonts'));
	wp_enqueue_style(project() . '-genomics', get_template_directory_uri() . '/css/style.css' . '?date=' . lastupdate(), array(project() . '-fancybox'));


	//JS読み込み
	wp_enqueue_script(project() . '-sakuraFont', '//webfonts.sakura.ne.jp/js/sakurav3.js');
	wp_enqueue_script(project() . '-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
	wp_enqueue_script(project() . '-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array(project() . '-jquery'));
	wp_enqueue_script(project() . '-smoothscroll', 'https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js', array(project() . '-fancybox'));

	wp_enqueue_script(project() . '-vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', array(project() . '-smoothscroll'));
	wp_enqueue_script(project() . '-scrollreveal', 'https://unpkg.com/scrollreveal', array(project() . '-vue'));
	wp_enqueue_script(project() . '-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(project() . '-scrollreveal'));

	wp_enqueue_script(project() . '-ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array(project() . '-gsap'));

	wp_enqueue_script(project() . '-pixi', get_template_directory_uri() . '/js/pixi.min.js' . '?date=' . lastupdate(), array(project() . '-ScrollTrigger'));
	wp_enqueue_script(project() . '-bganimation', get_template_directory_uri() . '/js/bganimation.js' . '?date=' . lastupdate(), array(project() . '-pixi'));
	wp_enqueue_script(project() . '-main', get_template_directory_uri() . '/js/main.js' . '?date=' . lastupdate(), array(project() . '-bganimation'));
}
add_action('wp_enqueue_scripts', 'genome_js_css');

/* jsファイルを読み込みタイミング制御 */
function add_defer($tag, $handle)
{
	if ($handle == project() . '-vue' || $handle == project() . '-pixi' || $handle == project() . '-bganimation' || $handle == project() . '-main') {
		return str_replace(' src=', ' defer src=', $tag);
	}
	return $tag;
}
add_filter('script_loader_tag', 'add_defer', 10, 2);

//タイトルの変更
function change_title_parts($title)
{
	if (is_front_page()) {
		unset($title['tagline']);
	}
	if (is_page('hoken') || is_page('jihi')) {
		$title['title'] .= ' | がん遺伝子パネル検査';
	}
	if (is_post_type_archive('staff')) {
		$title['title'] = 'スタッフ紹介';
	}
	if (is_category()) {
		$title['title'] = 'お知らせ（' . single_cat_title('', false) . '）';
	}
	if (is_404()) {
		// 404ページ
		$title['title'] = 'お探しのページは見つかりませんでした';
	}
	// 以下のパラメータを使用できます。
	// $title['page']  = ''; // ページ送りがあるページのページ番号（オプション）
	// $title['tagline'] = 'キャッチフレーズ'; // トップページの時のキャッチフレーズ（オプション）
	// $title['site'] = 'サイト名'; // トップページ以外の時のサイトタイトル（オプション）
	return $title;
}
add_filter('document_title_parts', 'change_title_parts', 10, 1);


////////////////////
//クエリ変更
////////////////////
function change_query($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if (is_front_page()) {
		$query->set('post__not_in', get_option('sticky_posts'));
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
		if (is_front_page()) {
			$query->set('posts_per_page', 3);
		}
	}
	if (is_post_type_archive('staff')) {
		$query->set('posts_per_page', -1);
	}
	if (is_post_type_archive('post')) {
		$query->set('post__not_in', get_option('sticky_posts'));
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
	}

	if (is_category()) {
		$query->set('post__not_in', get_option('sticky_posts'));
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
	}
}
add_action('pre_get_posts', 'change_query');


////////////////////
// 投稿のラベルを変更
////////////////////
add_filter('register_post_type_args', function ($args, $post_type) {
	if ($post_type === 'post') {
		$slug = 'news';
		$args['label'] = 'お知らせ';
		$args['labels'] = ['name' => 'お知らせ', 'singular_name' => 'お知らせ記事', 'menu_name' => 'お知らせ'];
		$args['show_in_nav_menus'] = 'お知らせ';
		$args['has_archive'] = $slug;
		$args['rewrite'] = array(
			'slug' => $slug,
			'with_front' => false,
		);
	}
	return $args;
}, 10, 2);


/**
 * 投稿の設定変更
 * post_has_archive()
 *
 * @param object $args args.
 * @param string $post_type post_type.
 * @return object $args args.
 */
function post_has_archive($args, $post_type)
{
	if ('post' === $post_type) {
		$args['rewrite']     = true;
		$args['has_archive'] = 'news';
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

/**
 * 投稿のパーマリンク変更.
 * add_article_post_permalink()
 *
 * @param string $permalink permalink.
 * @return string $permalink permalink.
 */
function add_article_post_permalink($permalink)
{
	$permalink = '/news' . $permalink;
	return $permalink;
}
add_filter('pre_post_link', 'add_article_post_permalink');

/**
 * 投稿のリライトルール変更
 * add_article_post_rewrite_rules()
 *
 * @param object $post_rewrite post_rewrite.
 * @return string $return_rule return_rule.
 */
function add_article_post_rewrite_rules($post_rewrite)
{
	$return_rule = array();
	foreach ($post_rewrite as $regex => $rewrite) {
		$return_rule['news/' . $regex] = $rewrite;
	}
	return $return_rule;
}
add_filter('post_rewrite_rules', 'add_article_post_rewrite_rules');

//ページネーション

function pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2) + 1;

	global $paged; //現在のページの値
	if (empty($paged)) {  //デフォルトのページ
		$paged = 1;
	}
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;  //全ページ数を取得
		if (!$pages) { //全ページ数が空の場合は、1にする
			$pages = 1;
		}
	}

	if (1 != $pages) {  //全ページ数が1以外の場合は以下を出力する
		echo "<ul class=\"page-numbers\">";
		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
			echo "<li class=\"js-light-out\"><a href='" . get_pagenum_link(1) . "' class=\"first page-numbers\" title=\"最初のページへ\"><i class=\"c-pagination-icon -first\"></i></a></li>";
		}
		if ($paged > 1 && $showitems < $pages) {
			echo "<li class=\"js-light-out\"><a href='" . get_pagenum_link($paged - 1) . "' class=\"prev page-numbers\" title=\"前のページへ\"><i class=\"c-pagination-icon -prev\"></i></a></li>";
		}
		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				echo ($paged == $i) ? "<li class=\"js-light-out\"><span aria-current=\"page\" class=\"page-numbers current\">" . $i . "</span></li>" : "<li class=\"js-light-out\"><a href='" . get_pagenum_link($i) . "' class=\"page-numbers\"" . $page_no_index . ">" . $i . "</a></li>";
			}
		}

		if ($paged < $pages && $showitems < $pages) {
			echo "<li class=\"js-light-out\"><a href=\"" . get_pagenum_link($paged + 1) . "\" class=\"next page-numbers\" title=\"次のページへ\"><i class=\"c-pagination-icon -next\"></i></a></li>";
		}
		if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) {
			echo "<li class=\"js-light-out\"><a href='" . get_pagenum_link($pages) . "' class=\"last page-numbers\" title=\"最後のページへ\"><i class=\"c-pagination-icon -last\"></i></a></li>";
		}
		echo "</ul>\n";
	}
}


//acfのリッチエディタを追加
function my_acf_toolbars($toolbars)
{
	// ツールバーの種類に「Simple」という項目を追加
	$toolbars['Simple'] = array();
	$toolbars['Simple'][1] = array('link', 'unlink'); // 「Simple」の中に表示したいボタンを選択

	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'my_acf_toolbars');

//ブロックの制御
require_once dirname(__FILE__) . '/parts/blockeditor.php';


//スラッグの日本語禁止
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
	if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
		$slug = utf8_uri_encode($post_type) . $post_ID;
	}
	return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);


//オプションページ追加
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'post_id'       => 'staff_sec2',
		'page_title'    => 'スタッフ・共同研究員',
		'menu_title'    => 'スタッフ・共同研究員',
		'menu_slug'     => 'staff_sec2',
		'capability'    => 'edit_posts',
		'parent_slug'   => 'edit.php?post_type=staff',
		'position'  => 50,
		'redirect'  => false,
	));
	acf_add_options_page(array(
		'post_id'       => 'rinsyo_pdf',
		'page_title'    => '臨床研究PDF',
		'menu_title'    => '臨床研究PDF',
		'menu_slug'     => 'rinsyo_pdf',
		'capability'    => 'edit_posts',
		'parent_slug'   => 'edit.php?post_type=page',
		'position'  => 50,
		'redirect'  => false,
	));
};


//先頭固定表示で公開されている記事のIDを返す
////show_sticky(array('category1', 'category2', 'category3'))
function show_sticky($categories = array())
{
	$sticky_posts_ID = get_option('sticky_posts');
	$show_sticky_posts_ID = [];

	foreach ($sticky_posts_ID as $show_sticky_post_ID) {
		$post_categories = wp_get_post_categories($show_sticky_post_ID);

		if (get_post_status($show_sticky_post_ID) == 'publish' && (empty($categories) || array_intersect($categories, $post_categories))) {
			$show_sticky_posts_ID[] = $show_sticky_post_ID;
		}
	}

	return $show_sticky_posts_ID;
}

//wordpressのデフォルトのサイトマップをカスタマイズ
///ユーザ一覧を除外
function exclude_sitemap_user($provider, $name)
{
	if ('users' === $name) {
		return false;
	}
	return $provider;
}
add_filter('wp_sitemaps_add_provider', 'exclude_sitemap_user',  10, 2);

////投稿タイプを除外
function exclude_sitemap_posttype($post_types)
{
	unset($post_types['staff']);
	return $post_types;
}
add_filter('wp_sitemaps_post_types', 'exclude_sitemap_posttype',  10, 2);


//ログイン画面カスタマイズ
function login_logo()
{
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login-style.css" />';
}
add_action('login_head', 'login_logo');
