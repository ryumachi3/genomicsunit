<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
  <link rel="stylesheet" href="https://use.typekit.net/hte5kno.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/slick/slick-theme.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/slick/slick.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?ver=0.0.12" type="text/css">
  <?php wp_head(); ?>
  <!-- <link rel="SHORTCUT ICON" href="https://kokeshimatsuri.com/wp/wp-content/themes/kokeshi/img/favicon.ico" /> -->
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta property="og:title" content="100oku | おしゃれなあの女性に今贈りたい100のプレゼント">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://kokeshimatsuri.com">
  <meta property="og:image" content="">
  <meta property="og:description" content="">
  <meta property="og:site_name" content="">
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:image" content="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/slick/slick.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>
  <script type="text/javascript">
  // ページ内リンクのみ取得
    var scroll = new SmoothScroll('a[href*="#"]', {
    speed: 200,//スクロールする速さ
    header: '#header'//固定ヘッダーがある場合
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" defer></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script type="application/javascript">
    var template_url = '<?php bloginfo('template_url'); ?>';
  </script>
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
  />
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script type="application/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js?ver=0.0.4" defer></script>
  <script>
    (function(d) {
      var config = {
          kitId: 'jup8xvg',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
</head>

<body>
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