<?php get_header(); ?>
<div class="l-main-grid">
  <?php get_template_part('nav'); ?>
  <!-- main-visual-->
  <!-- キービジュアル -->
  <div class="l-main p-main">
    <article id="kv" class="p-kv l-kv" scroll-dest="kv">
      <div class="p-kv__inner">
        <div class="p-kv__inner__main">
          <div class="p-kv__inner__photo">
            <div class="l-kv__inner__photo__inner">
              <picture>
                <source media="(max-width: 960px)" srcset="<?php echo get_theme_file_uri() ?>/img/kv_photo_main_tb.jpg">
                <img src="<?php echo get_theme_file_uri() ?>/img/kv_photo_main.jpg" alt="" class="p-kv__inner__photo__main">
                </source>
              </picture>
              <img src="<?php echo get_theme_file_uri() ?>/img/kv_photo_sub.jpg" alt="" class="p-kv__inner__photo__sub">
            </div>
          </div>
          <div class="p-kv__inner__title">
            <div class="p-kv__inner__title__line1">
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">遺</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">伝</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">子</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">検</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">査</span></span>
              <span class="p-kv__inner__title__char -white"><span class="p-kv__inner__title__char__inner">で</span></span>
            </div>
            <div class="p-kv__inner__title__line2">
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">が</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">ん</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">治</span></span>
              <span class="p-kv__inner__title__char -navy"><span class="p-kv__inner__title__char__inner">療</span></span>
              <span class="p-kv__inner__title__char -white"><span class="p-kv__inner__title__char__inner">が</span></span>
              <span class="p-kv__inner__title__char -white"><span class="p-kv__inner__title__char__inner">変</span></span>
              <span class="p-kv__inner__title__char -white"><span class="p-kv__inner__title__char__inner">わ</span></span>
              <span class="p-kv__inner__title__char -white"><span class="p-kv__inner__title__char__inner">る</span></span>
            </div>
          </div>
        </div>
        <div class="p-kv__inner__description">
          <p class="p-kv__inner__description__txt ">
            <span class="u-txt-point g-mv-txt-point">がんの原因は遺伝子の変化</span>であることが明らかになってきました。<br>原因となる遺伝子が見つかれば、より効果的な治療が期待できます。<br>これから先の治療に迷われている患者さんの一助になるよう、私たちが遺伝子検査をサポートいたします。
          </p>
          <div class="p-kv__inner__description__illust__wrap">
            <span class="p-kv__inner__description__illust__light"></span>
            <img src="<?php echo get_theme_file_uri() ?>/img/kv_illust_no-light.png" alt="" class="p-kv__inner__description__illust">
          </div>
        </div>
      </div>
    </article>
    <!-- contents -->
    <div id="contents" class="l-contents">
      <div class="l-container">
        <?php
        $sticky = show_sticky();
        if (have_posts() || !empty($sticky)) : ?>
          <section class="l-top-news">
            <div class="l-top-title">
              <h2 class="c-top-title">お知らせ</h2>
            </div>
            <ul class="p-news-list l-top-news-list">
              <?php
              $sticky_arg = array(
                'include' => $sticky,
              );
              if (!empty($sticky)) {
                $sticky_posts = get_posts($sticky_arg);
                foreach ($sticky_posts as $post) {
                  setup_postdata($post);
                  echo '<li class="p-news-list__item">';
                  get_template_part('parts/card_news');
                  echo '</li>';
                }
                wp_reset_postdata();
              }
              ?>
              <?php while (have_posts()) : the_post(); ?>
                <li class="p-news-list__item">
                  <?php get_template_part('parts/card_news'); ?>
                </li>
              <?php endwhile; ?>
            </ul>
            <div class="l-btn">
              <a href="<?php echo get_home_url() ?>/news/" class="c-btn">
                お知らせ一覧
              </a>
            </div>
          </section>
        <?php endif; ?>
        <section class="l-top-about">
          <div class="l-top-title">
            <h2 class="c-top-title">
              <span class="c-top-title-child">が</span>
              <span class="c-top-title-child">ん</span>
              <span class="c-top-title-child">遺</span>
              <span class="c-top-title-child">伝</span>
              <span class="c-top-title-child">子</span>
              <span class="c-top-title-child">検</span>
              <span class="c-top-title-child">査</span>
              <span class="c-top-title-child">と</span>
              <span class="c-top-title-child">は</span>
              <span class="c-top-title-child">？</span>
            </h2>
          </div>
          <ul class="p-about-list l-top-about-list">
            <li class="p-about-list__item">
              <div class="p-about-list__item__illust">
                <img src="<?php echo get_theme_file_uri() ?>/img/illust_about01.png" alt="" class="p-about-list__item__illust__img -img01">
              </div>
              <div class="p-about-list__item__info">
                <p class="p-about-list__item__info__txt">
                  <span class="u-txt-point">がんは遺伝子の変化によって発症する</span>ことが分かってきました。がんの発症に強く関連する遺伝子はこれまでに数百種類見つかっています。それらの遺伝子に異常がないかどうかを調べるのが「がん遺伝子検査」です。
                </p>
              </div>
            </li>
            <li class="p-about-list__item">
              <div class="p-about-list__item__illust -illust02">
                <img src="<?php echo get_theme_file_uri() ?>/img/illust_about02.png" alt="" class="p-about-list__item__illust__img -img02">
              </div>
              <div class="p-about-list__item__info">
                <p class="p-about-list__item__info__txt">
                  次世代シークエンサーという解析装置を使った「<span class="u-txt-point">パネル検査</span>」の登場により、がん遺伝子検査は大きく進化しました。どの遺伝子に異常があるのかが分かれば、<span class="u-txt-point">効率的で効果的な診断と治療が期待できる</span>のです。
                </p>
              </div>
            </li>
          </ul>
          <div class="l-btn">
            <a href="<?php echo get_home_url() ?>/about" class="c-btn">
              がん遺伝子検査について
            </a>
          </div>
        </section>

        <section class="l-top-kensa">
          <div class="l-top-title">
            <h2 class="c-top-title">
              <span class="c-top-title-child">検</span>
              <span class="c-top-title-child">査</span>
              <span class="c-top-title-child">の</span>
              <span class="c-top-title-child">種</span>
              <span class="c-top-title-child">類</span>
            </h2>
          </div>
          <ul class="p-kensa-list l-top-kensa-list">
            <li class="p-kensa-list__item">
              <h3 class="p-kensa-list__item__title">
                <div class="c-square-title -center">
                  <span class="c-square-title__char -navy"><span class="c-square-title__char__inner">保</span></span>
                  <span class="c-square-title__char -navy"><span class="c-square-title__char__inner">険</span></span>
                  <span class="c-square-title__char -navy-frame"><span class="c-square-title__char__inner">診</span></span>
                  <span class="c-square-title__char -navy-frame"><span class="c-square-title__char__inner">療</span></span>
                </div>
              </h3>
              <div class="p-kensa-list__item__illust">
                <img src="<?php echo get_theme_file_uri() ?>/img/illust_kensa01.png" alt="" class="p-kensa-list__item__illust__img -img01">
              </div>
              <div class="p-kensa-list__item__info">
                <p class="p-kensa-list__item__info__txt">
                  2019年6月に保険診療下でのがん遺伝子パネル検査がスタートしました。
                </p>
              </div>
              <div class="p-kensa-list__item__btn l-btn">
                <a href="<?php echo get_home_url() ?>/hoken" class="c-btn">
                  詳しく見る
                </a>
              </div>
            </li>
            <li class="p-kensa-list__item">
              <h3 class="p-kensa-list__item__title">
                <div class="c-square-title -center">
                  <span class="c-square-title__char -point"><span class="c-square-title__char__inner">自</span></span>
                  <span class="c-square-title__char -point"><span class="c-square-title__char__inner">費</span></span>
                  <span class="c-square-title__char -point-frame"><span class="c-square-title__char__inner">診</span></span>
                  <span class="c-square-title__char -point-frame"><span class="c-square-title__char__inner">療</span></span>
                </div>
              </h3>
              <div class="p-kensa-list__item__illust">
                <img src="<?php echo get_theme_file_uri() ?>/img/illust_kensa02.png" alt="" class="p-kensa-list__item__illust__img -img02">
              </div>
              <div class="p-kensa-list__item__info">
                <p class="p-kensa-list__item__info__txt">
                  保険診療を受けられない、より詳しい検査をしたい、という方には自費診療でのがん遺伝子パネル検査をお勧めします。
                </p>
              </div>
              <div class="p-kensa-list__item__btn l-btn">
                <a href="<?php echo get_home_url() ?>/jihi" class="c-btn -point">
                  詳しく見る
                </a>
              </div>
            </li>
          </ul>
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