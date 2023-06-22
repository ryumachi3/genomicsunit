<!--inc:ogtag-->
<?php

function my_meta_ogp()
{
    if (is_front_page() || is_home() || is_singular() || is_post_type_archive() || is_archive()) {
        global $post;
        $ogp_title = get_the_title();
        $ogp_descr = '';
        $ogp_url = '';
        $ogp_img = '';
        $insert = '';
        $posttype = '';

        //title og:description
        $bloginfo_des = get_bloginfo('description');

        if (is_front_page()) {
            $ogp_title = get_bloginfo('name') . '｜' . get_bloginfo('description');
            $bloginfo_des = get_bloginfo('description');
        }
        if (is_singular()) {
            $page_description = get_the_excerpt();
            if ($page_description) {
                $ogp_descr =  esc_html($page_description);
            }
            if (is_page('about')) {
                $ogp_title = get_the_title() . ' | 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
            }
            if (is_page('hoken') || is_page('jihi')) {
                $ogp_title = get_the_title() . ' | がん遺伝子パネル検査 | 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
            }
            if (is_page('rinsyo')) {
                $ogp_title = get_the_title() . ' | 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
            }
            if (is_singular('post')) {
                $ogp_title = get_the_title() . ' | 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
                $ogp_descr = '';
            }
        }
        if (is_archive()) {
            if (is_post_type_archive('news')) {
                $ogp_title = 'お知らせ | 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
                $ogp_descr = 'ゲノム医療に関するお知らせをお届けします。';
            } elseif (is_post_type_archive('staff')) {
                $ogp_title = 'スタッフ紹介 | 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
                $ogp_descr = 'ゲノム医療ユニットのメンバー（医師、スタッフ、共同研究員）を紹介します。';
            } elseif (is_category()) {
                $cat_title = single_cat_title('', false);
                $ogp_title = 'お知らせ（' . $cat_title . '）| 慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット';
                $ogp_descr = 'ゲノム医療に関するお知らせをお届けします。';
            }
        }

        if ($ogp_descr == '' && !is_singular('post')) {
            $ogp_descr = $bloginfo_des;
        }

        //og:type
        $ogp_type = (is_front_page()) ? 'website' : 'article';

        //og:url
        $ogp_url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

        //og:image
        $ogp_img = get_template_directory_uri() . '/img/ogp.jpg';

        if (is_singular()) {
            if (has_post_thumbnail()) {
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'larger');
                $ogp_img = $thumb[0];
            } else { //共通
                $ogp_img = get_template_directory_uri() . '/img/ogp.jpg';
            }
        }


        //出力するOGPタグをまとめる
        $insert .= '<meta name="description" content="' . esc_attr($ogp_descr) . '">' . "\n";
        $insert .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '" />' . "\n";
        $insert .= '<meta property="og:description" content="' . esc_attr($ogp_descr) . '" />' . "\n";
        $insert .= '<meta property="og:type" content="' . $ogp_type . '" />' . "\n";
        $insert .= '<meta property="og:url" content="' . esc_url($ogp_url) . '" />' . "\n";
        $insert .= '<meta property="og:image" content="' . esc_url($ogp_img) . '" />' . "\n";
        $insert .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '" />' . "\n";
        $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
        //$insert .= '<meta name="twitter:site" content="ツイッターのアカウント名" />' . "\n";
        $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";


        echo $insert;
    }
} //END my_meta_ogp

add_action('wp_head', 'my_meta_ogp'); //headにOGPを出力

?>