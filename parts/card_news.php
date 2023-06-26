<?php
$categories = get_the_category();
$tag_flag = false;

$cat_count = 0;
if ($categories) {
    foreach ($categories as $category) {
        $cat_name = $category->cat_name;
        if ($cat_name !== '未分類') {
            $cat_count = $cat_count + 1;
        }
    }
};
if($cat_count || is_sticky()){
 $tag_flag = true;
}
?>
<a href="<?php the_permalink(); ?>" class="p-news-list__item__link <?php echo $tag_flag?'-tag':'-notag' ?>">
    <header class="p-news-list__item__header" >
        <time class="p-news-list__item__time"><?php echo get_the_date('Y年n月j日') ?></time>
        <div class="c-news-tag p-news-list__item__main__tag">
            <?php if (is_sticky()) : ?>
                <span class="c-news-tag__item p-news-list__item__main__tag__item -yellow">
                    <i class="c-icon-pin"></i>
                    固定されたお知らせ
                </span>
            <?php endif; ?>
            <?php
            if ($categories) {
                foreach ($categories as $category) {
                    $cat_name = $category->cat_name;
                    if ($cat_name !== '未分類') {
                        echo '<span class="c-news-tag__item p-news-list__item__main__tag__item -iryo">' . esc_html($cat_name) . '</span>';
                    }
                }
            };
            ?>
        </div>
    </header>
    <h3 class="p-news-list__item__main__title">
        <?php the_title(); ?>
    </h3>
</a>