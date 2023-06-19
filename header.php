<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MDQSLD8');
  </script>
  <!-- End Google Tag Manager -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script type="application/javascript">
    var template_url = '<?php bloginfo('template_url'); ?>';
  </script>
  <?php get_template_part('parts/meta_ogp'); ?>
  <?php wp_head(); ?>
  <script type="text/javascript">
    // ページ内リンクのみ取得
    var scroll = new SmoothScroll('a[href*="#"]', {
      speed: 200, //スクロールする速さ
      header: '#header' //固定ヘッダーがある場合
    });
  </script>
  <link rel="shortcut icon" href="<?php echo get_theme_file_uri('/img/favicon.ico'); ?>">
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDQSLD8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="bg"></div>
  <div id="app">
    <!-- <transition name="loadin">
      <div v-if="isloading" class="c-loading p-loading">
        <div class="p-loading__inner">
          <img class="p-loading__gif" src="<?php bloginfo('template_url'); ?>/img/loading.gif" alt="">
          <img class="p-loading__title" src="<?php bloginfo('template_url'); ?>/img/title_load.png" alt="">
        </div>
      </div>
    </transition> -->
    <div class="v-home" :class="[ isloading ? '-isloading' : '-noloading' ]">
      <div ref="cursor" class="p-cursor" :style="{ top: cursorY + 'px', left: cursorX + 'px' }"></div>