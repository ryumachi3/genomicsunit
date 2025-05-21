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
              <img src="<?php echo get_theme_file_uri() ?>/img/kv_photo_sub_v2.jpg" alt="" class="p-kv__inner__photo__sub">
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
              <span class="c-top-title-child">当</span>
              <span class="c-top-title-child">院</span>
              <span class="c-top-title-child">に</span>
              <span class="c-top-title-child">お</span>
              <span class="c-top-title-child">け</span>
              <span class="c-top-title-child">る</span><br class="u-sp_br">
              <span class="c-top-title-child">が</span>
              <span class="c-top-title-child">ん</span>
              <span class="c-top-title-child">ゲ</span>
              <span class="c-top-title-child">ノ</span>
              <span class="c-top-title-child">ム</span>
              <span class="c-top-title-child">医</span>
              <span class="c-top-title-child">療</span>
              <span class="c-top-title-child">に</span>
              <span class="c-top-title-child">つ</span>
              <span class="c-top-title-child">い</span>
              <span class="c-top-title-child">て</span>
            </h2>
          </div>
          <div class="l-about-main__description p-about-main__description -desc04">
            <div class="c-txtbox">
              <p class="l-about-main__description__txt">私たちは、人の細胞の中にあるDNAの遺伝情報 (<span class="u-txt-point">ヒトゲノム*</span>と呼ばれています)を調べ、病気の診断や治療に役立つように医療と研究を行っています。<br>2017年から「遺伝子パネル検査」を導入し、2019年3月よりヒトのほぼ全ての遺伝子を解析するPleSSision-Exome検査を開始しており、我が国のがんゲノム医療をけん引してきました。2018年2月に厚生労働省から「がんゲノム医療中核拠点病院」に認定され、当院のがんゲノム連携病院16施設 (2024年8月現在)と共に、がんゲノム医療を推進しています。</p>
              <p class="l-about-main__description__note p-about-main__description__note"><span class="u-txt-point">*ヒトゲノムの情報量は32億文字ほどもあります。その中の“タンパク質の設計図の部分”が「遺伝子」と呼ばれ、人間には約23,000個の遺伝子があると言われています。</span></p>
            </div>
            <img class="p-about-main__description__img -img04" src="<?php echo get_theme_file_uri() ?>/img/illust_about05.png" alt="">
          </div>
        </section>
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
                  <span class="u-txt-point">がんは遺伝子の変化によって発症する</span>ことが分かってきました。がんの発症に強く関連する遺伝子はこれまでに数百種類見つかっています。それらの遺伝子に変化がないかどうかを調べるのが「がん遺伝子検査」です。
                </p>
              </div>
            </li>
            <li class="p-about-list__item">
              <div class="p-about-list__item__illust -illust02">
                <img src="<?php echo get_theme_file_uri() ?>/img/illust_about02.png" alt="" class="p-about-list__item__illust__img -img02">
              </div>
              <div class="p-about-list__item__info">
                <p class="p-about-list__item__info__txt">
                  次世代シークエンサーという解析装置を使った「<span class="u-txt-point">がん遺伝子パネル検査</span>」の登場により、がん遺伝子検査は大きく進化しました。どの遺伝子に変化があるのかが分かれば、<span class="u-txt-point">効率的で効果的な診断と治療が期待できる</span>のです。
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
                  保険診療を受けられない、より詳しい検査をしたい、という方には自費診療でのがん遺伝子検査をお勧めします。
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