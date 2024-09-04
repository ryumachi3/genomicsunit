<header class="l-header p-header" :class="[ isMenu ? '-ismenu' : '' ]">
  <?php if (is_front_page()) : ?>
    <h1 class="l-header__logo p-header__logo">
    <? else : ?>
      <div class="l-header__logo p-header__logo">
      <?php endif; ?>
      <a tabindex="1" href="<?php echo home_url(); ?>" class="p-header__logo__link">
        <img width="262" height="69" src="<?php bloginfo('template_url'); ?>/img/logo.png?v2" alt="慶應義塾大学医学部 がんゲノム医療センター／腫瘍センター がんゲノム医療ユニット" class="p-header__logo__img">
      </a>
      <?php if (is_front_page()) : ?>
    </h1>
  <?php else : ?>
    </div>
  <?php endif; ?>
  <nav class="p-nav" :class="isMenu?'-open':''">
    <ul class="p-nav__list l-nav__list js-light-out">
      <li class="p-nav__list__item -line <?php echo is_home() || is_front_page() ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url() ?>" class="p-nav__list__item__link ">
          HOME
        </a>
      </li>
      <li class="p-nav__list__item -line <?php echo is_page('about') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url() ?>/about" class="p-nav__list__item__link">
          がん遺伝子検査について
        </a>
      </li>
      <li class="p-nav__list__item -line <?php echo is_page('hoken') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url() ?>/hoken" class="p-nav__list__item__link">
          <span class="p-nav__list__item__link__txt">
            保険診療
          </span>
          <!-- <span class="p-nav__list__item__link__day">
            <span class="p-nav__list__item__link__day__week__wrap">
              <span class="p-nav__list__item__link__day__week -tue">火</span>
              <span class="p-nav__list__item__link__day__week -thu">木</span>
            </span>
            <span class="p-nav__list__item__link__day__time">13:30〜15:00</span>
          </span> -->
        </a>
      </li>
      <li class="p-nav__list__item -line -point <?php echo is_page('jihi') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url() ?>/jihi" class="p-nav__list__item__link -point">
          <span class="p-nav__list__item__link__txt">
            自費診療
          </span>
          <!-- <span class="p-nav__list__item__link__day">
            <span class="p-nav__list__item__link__day__week__wrap">
              <span class="p-nav__list__item__link__day__week -wed">水</span>
              <span class="p-nav__list__item__link__day__week -thu">木</span>
            </span>
            <span class="p-nav__list__item__link__day__time">13:30〜15:00</span>
          </span> -->
        </a>
      </li>
      <li class="p-nav__list__item -line <?php echo is_post_type_archive('staff') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url(); ?>/staff" class="p-nav__list__item__link">
          スタッフ紹介
        </a>
      </li>
      <li class="p-nav__list__item -line <?php echo is_page('rinsyo') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url(); ?>/rinsyo" class="p-nav__list__item__link">
          患者の皆さまへ (臨床研究)
        </a>
      </li>
      <?php
      $gyouseki_args = array(
        'post_type' => 'gyouseki',
        'posts_per_page' => 1
      );
      $gyouseki_posts = get_posts($gyouseki_args);
      if (!empty($gyouseki_posts)) :
        foreach ($gyouseki_posts as $post) :
          setup_postdata($post);
      ?>
          <li class="p-nav__list__item -line -iryo <?php echo is_singular('gyouseki') ? '-is-active' : '' ?>">
            <a tabindex="100" href="<?php the_permalink(); ?>" class="p-nav__list__item__link">
              業績一覧
            </a>
          </li>
      <?php endforeach;
        wp_reset_postdata();
      endif; ?>
      <li class="p-nav__list__item -line -iryo <?php echo is_page('iryo') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url(); ?>/iryo" class="p-nav__list__item__link">
          医療機関の方へ
        </a>
      </li>
      <li class="p-nav__list__item -line <?php echo is_post_type_archive('post') || is_singular('post') ? '-is-active' : '' ?>">
        <a tabindex="100" href="<?php echo home_url(); ?>/news" class="p-nav__list__item__link">
          お知らせ
        </a>
      </li>
      <li class="p-nav__list__item -balloon g-nav-access">
        <span class="p-nav__list__item__horn g-nav-access-horn"></span>
        <a tabindex="100" href="#footer" @click="scrollToSection" class="p-nav__list__item__link -horn">
          アクセス・お問い合わせ
        </a>
      </li>
    </ul>
    <?php /*
    <ul class="p-nav__sublist l-nav__sublist js-light-out">
      <li class="p-nav__sublist__item">
        <a tabindex="100" href="<?php echo home_url(); ?>/iryo" class="p-nav__sublist__item__link <?php echo is_page('iryo') ? '-is-active' : '' ?>">
          医療機関の方へ
        </a>
      </li>
      <li class="p-nav__sublist__item">
        <a tabindex="100" href="<?php echo home_url(); ?>/kenkyusya" class="p-nav__sublist__item__link <?php echo is_page('kenkyusya') ? '-is-active' : '' ?>">
          研究者の方へ
        </a>
      </li>
    </ul>
    */ ?>
  </nav>
</header>
<!-- スマホ用ヘッダー -->
<div class="p-nav__bg" :class="isMenu?'-open':''"></div>
<header class="l-header-sp p-header-sp">
  <div class="l-header-sp__inner">
    <div class="l-header-sp__logo p-header-sp__logo">
      <a href="<?php echo home_url(); ?>" class="p-header-sp__logo__link">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png?v2" alt="慶應義塾大学医学部 がんゲノム医療センター／腫瘍センター がんゲノム医療ユニット" class="p-header-sp__logo__img">
      </a>
    </div>
    <!-- <button class="c-toggle p-header-sp__btn -toggle" :class="isMenu?'-ismenu':''" @click="isMenu=!isMenu"> -->
    <button class="c-toggle p-header-sp__btn -toggle js-light-out" :class="isMenu?'-ismenu':''" @click="clickMenu()" ref="hamburger">
      <div class="c-toggle__bar p-toggle__bar -bar01"></div>
      <div class="c-toggle__bar p-toggle__bar -bar02"></div>
      <div class="c-toggle__bar p-toggle__bar -bar03"></div>
    </button>
  </div>
</header>