<!DOCTYPE html>
<html lang="ja">

<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MDQSLD8');</script>
  <!-- End Google Tag Manager -->  
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?ver=0.0.4" type="text/css">
  <?php wp_head(); ?>
  <link rel="SHORTCUT ICON" href="https://genomics-unit.pro/wp/wp-content/themes/genomicsunit/img/favicon.ico" />
  <meta name="description" content="がんの原因は遺伝子の変化であることが明らかになってきました。原因となる遺伝子が見つかれば、より効果的な治療が期待できます。これから先の治療に迷われている患者さんの一助になるよう、私たちが遺伝子検査をサポートいたします。">
  <meta name="keywords" content="がん、原因、遺伝子、腫瘍、研究">
  <meta property="og:title" content="慶應義塾大学医学部 腫瘍センター・ゲノム医療ユニット">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://genomics-unit.pro">
  <meta property="og:image" content="https://genomics-unit.pro/wp/wp-content/themes/genomicsunit/img/ogp.jpg">
  <meta property="og:description" content="がんの原因は遺伝子の変化であることが明らかになってきました。原因となる遺伝子が見つかれば、より効果的な治療が期待できます。これから先の治療に迷われている患者さんの一助になるよう、私たちが遺伝子検査をサポートいたします。">
  <meta property="og:site_name" content="慶應義塾大学医学部 腫瘍センター・ゲノム医療ユニット">
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:image" content="https://genomics-unit.pro/wp/wp-content/themes/genomicsunit/img/ogp.jpg">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  <script type="application/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js?ver=0.0.1" defer></script>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDQSLD8"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
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