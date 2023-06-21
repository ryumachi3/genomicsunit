<?php

add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {
    global $post_type;
    echo $post_type;
    if ($post_type == 'post' || $post_type == 'page') {
        $allowed_block_types = [
            'core/paragraph', // 段落
            'core/heading', // 見出し
            'core/image', // 画像
            'core/list', // リスト
            'core/table', // テーブル
            'core/html', // カスタムHTML
            //'core/columns', //カラム
            //'core/spacer', // スペーサー
            //'core/group', //グループ
            'core/separator', //区切り
            'core/file', //ファイル
            'core/embed', //埋め込み
        ];
    }
    return $allowed_block_types;
}, 10, 2);
