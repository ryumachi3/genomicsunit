<?php get_header(); ?>
<div class="l-main-grid">
    <?php get_template_part('nav'); ?>
    <div class="l-main p-main">
        <div id="contents" class="l-contents">
            <div class="l-container -staff">
                <section class="l-common-sec">
                    <h1 class="c-head-title -anime l-head-title l-staff-head-title">
                        <span class="c-head-title__char -navy"><span class="c-head-title__char__inner">ス</span></span>
                        <span class="c-head-title__char -navy"><span class="c-head-title__char__inner">タ</span></span>
                        <span class="c-head-title__char -navy"><span class="c-head-title__char__inner">ッ</span></span>
                        <span class="c-head-title__char -navy"><span class="c-head-title__char__inner">フ</span></span>
                        <span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">紹</span></span>
                        <span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">介</span></span>
                    </h1>
                    <div class="c-contents">
                        <section class="l-staff-description">
                            <p class="l-staff-description__txt">ゲノム医療ユニットのメンバーを紹介します。</p>
                        </section>
                        <section class="l-doctor-sec p-doctor-sec -sec01">
                            <h2 class="c-title l-doctor-sec__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>医師</h2>
                            <?php if (have_posts()) : ?>
                                <ul class="p-doctor-sec__list">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <li class="p-doctor-sec__list__item">
                                            <?php get_template_part('parts/card_doctor'); ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </section>
                        <?php if (have_rows('member', 'staff_sec2')) : ?>
                            <section class="l-staff-sec p-staff-sec -sec02">
                                <h2 class="c-title l-staff-sec__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>スタッフ・共同研究員</h2>

                                <ul class="p-staff-sec__list">
                                    <?php while (have_rows('member', 'staff_sec2')) : the_row();
                                        $st_name = get_sub_field('name');
                                        $st_yaku = get_sub_field('yaku');
                                        $roman = get_sub_field('roman');
                                        if ($st_name) :
                                    ?>
                                            <li class="p-staff-sec__list__item">
                                                <?php if ($st_yaku) : ?>
                                                    <p class="p-staff-sec__list__item__info__position"><?php echo esc_html($st_yaku); ?></p>
                                                <?php endif; ?>
                                                <h3 class="p-staff-sec__list__item__info__name"><?php echo esc_html($st_name); ?></h3>
                                                <?php if ($roman) : ?>
                                                    <p class="p-staff-sec__list__item__info__kana"><?php echo esc_html($roman); ?></p>
                                                <?php endif; ?>
                                            </li>
                                    <?php endif;
                                    endwhile; ?>
                                </ul>
                            </section>
                        <?php endif; ?>
                    </div><!-- c-contents -->
                </section>
            </div>
        </div>
        <!-- contents -->
    </div>
    <!-- l-main -->
</div>
<!-- l-main-grid -->
<?php get_footer(); ?>
<?php get_template_part('wp-footer'); ?>