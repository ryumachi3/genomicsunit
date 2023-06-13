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


////////////////////
//クエリ変更
////////////////////
function change_query($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if (is_front_page() || is_post_type_archive('post')) {
		$query->set('post__not_in', get_option('sticky_posts'));
		$query->set('orderby', 'date');
		$query->set('oder', 'DESC');
		if (is_front_page()) {
			$query->set('posts_per_page', 5);
		}
	}
	if (is_category()) {
		$query->set('post__not_in', get_option('sticky_posts'));
		$query->set('orderby', 'date');
		$query->set('oder', 'DESC');
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
