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
                <img src="<?php echo get_theme_file_uri() ?>/img/kv_photo_main.jpg" alt=""
                  class="p-kv__inner__photo__main">
                </source>
              </picture>
              <img src="<?php echo get_theme_file_uri() ?>/img/kv_photo_sub.jpg" alt="" class="p-kv__inner__photo__sub">
            </div>
          </div>
          <div class="p-kv__inner__title">
            <div class="p-kv__inner__title__line1">
              <span class="p-kv__inner__title__char -navy">遺</span>
              <span class="p-kv__inner__title__char -navy">伝</span>
              <span class="p-kv__inner__title__char -navy">子</span>
              <span class="p-kv__inner__title__char -navy">検</span>
              <span class="p-kv__inner__title__char -navy">査</span>
              <span class="p-kv__inner__title__char -white">で</span>
            </div>
            <div class="p-kv__inner__title__line2">
              <span class="p-kv__inner__title__char -navy">が</span>
              <span class="p-kv__inner__title__char -navy">ん</span>
              <span class="p-kv__inner__title__char -navy">治</span>
              <span class="p-kv__inner__title__char -navy">療</span>
              <span class="p-kv__inner__title__char -white">が</span>
              <span class="p-kv__inner__title__char -white">変</span>
              <span class="p-kv__inner__title__char -white">わ</span>
              <span class="p-kv__inner__title__char -white">る</span>
            </div>
          </div>
        </div>
        <div class="p-kv__inner__description">
          <p class="p-kv__inner__description__txt">
            <span
              class="p-kv__inner__description__txt__point">がんの原因は遺伝子の変化</span>であることが明らかになってきました。<br>原因となる遺伝子が見つかれば、より効果的な治療が期待できます。<br>これから先の治療に迷われている患者さんの一助になるよう、私たちが遺伝子検査をサポートいたします。
          </p>
          <img src="<?php echo get_theme_file_uri() ?>/img/kv_illust.png" alt=""
            class="p-kv__inner__description__illust">
        </div>
      </div>
    </article>
    <!-- contents -->
    <div id="contents" class="l-contents">
      <div class="l-container">
        <section class="l-top-news">
          <div class="l-top-title">
            <h2 class="c-top-title">お知らせ</h2>
          </div>
          <ul class="p-news-list l-top-news-list">
            <li class="p-news-list__item">
              <a href="<?php echo get_home_url(); ?>/news/26/" class="p-news-list__item__link">
                <time class="p-news-list__item__time">2023年4月10日</time>
                <div class="c-news-tag p-news-list__item__main__tag">
                  <span class="c-news-tag__item p-news-list__item__main__tag__item -iryo">
                    研究者の方へ
                  </span>
                </div>
                <h3 class="p-news-list__item__main__title">
                  臨床研究支援員募集
                </h3>
              </a>
            </li>
            <!-- <li class="p-news-list__item">
              <a class="p-news-list__item__link">
                <time class="p-news-list__item__time">
                  2023年5月9日
                </time>
                <div class="c-news-tag p-news-list__item__main__tag">
                  <span class="c-news-tag__item p-news-list__item__main__tag__item -yellow">
                    <i class="c-icon-pin"></i>
                    固定されたお知らせ
                  </span>
                </div>
                <h3 class="p-news-list__item__main__title">
                  タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル
                </h3>
              </a>
            </li>
            <li class="p-news-list__item">
              <a class="p-news-list__item__link">
                <time class="p-news-list__item__time">2023年12月10日</time>
                <h3 class="p-news-list__item__main__title">
                  がんゲノム医療キックオフミーティングの開催
                </h3>
              </a>
            </li>
            <li class="p-news-list__item">
              <a href="http://genomicsunit.local/1/" class="p-news-list__item__link">
                <time class="p-news-list__item__time">2023年1月12日</time>
                <div class="c-news-tag p-news-list__item__main__tag">
                  <span class="c-news-tag__item p-news-list__item__main__tag__item -iryo">
                    研究者の方へ
                  </span>
                </div>
                <h3 class="p-news-list__item__main__title">
                  「がん」の遺伝子を調べる臨床研究「次世代統合的病理・遺伝子診断法の開発」の開始
                </h3>
              </a>
            </li>
            <li class="p-news-list__item">
              <a class="p-news-list__item__link">
                <time class="p-news-list__item__time">2023年12月10日</time>
                <div class="c-news-tag p-news-list__item__main__tag">
                  <span class="c-news-tag__item p-news-list__item__main__tag__item -iryo">
                    医療機関の方へ
                  </span>
                </div>
                <h3 class="p-news-list__item__main__title">
                  がんゲノム医療キックオフミーティングの開催
                </h3>
              </a>
            </li> -->
          </ul>
          <div class="l-btn">
            <a href="<?php echo get_home_url() ?>/news" class="c-btn">
              お知らせ一覧
            </a>
          </div>
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