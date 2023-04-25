<header class="l-header p-header" :class="[ isMenu ? '-ismenu' : '' ]">
  <div class="l-header__logo p-header__logo">
    <a href="<?php echo home_url(); ?>" class="p-header__logo__link">
      <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="慶應義塾大学病院腫瘍センター ゲノム医療ユニット"
        class="p-header__logo__img">
    </a>
  </div>
  <nav class="p-nav" :class="isMenu?'-open':''">
    <ul class="p-nav__list l-nav__list">
      <li class="p-nav__list__item <?php echo is_home() || is_front_page()?'-is-active':'' ?>">
        <a href="<?php echo home_url() ?>" class="p-nav__list__item__link ">
          HOME
        </a>
      </li>
      <li class="p-nav__list__item <?php echo is_page( 'about' )?'-is-active':'' ?>">
        <a href="<?php echo home_url() ?>/about" class="p-nav__list__item__link">
          がん遺伝子検査について
        </a>
      </li>
      <li class="p-nav__list__item <?php echo is_page( 'hoken' )?'-is-active':'' ?>">
        <a href="<?php echo home_url() ?>/hoken" class="p-nav__list__item__link">
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
      <li class="p-nav__list__item <?php echo is_page( 'jihi' )?'-is-active':'' ?>">
        <a href="<?php echo home_url() ?>/jihi" class="p-nav__list__item__link -point">
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
      <!-- <li class="p-nav__list__item">
        <a href="" class="p-nav__list__item__link">
          スタッフ紹介
        </a>
      </li> -->
      <li class="p-nav__list__item <?php echo is_page( 'rinsyo' )?'-is-active':'' ?>">
        <a href="<?php echo home_url(); ?>/rinsyo" class="p-nav__list__item__link">
          患者の皆さまへ(臨床研究)
        </a>
      </li>
      <!-- <li class="p-nav__list__item <?php echo is_archive()?'-is-active':'' ?>">
        <a href="<?php echo home_url(); ?>/news" class="p-nav__list__item__link">
          お知らせ
        </a>
      </li> -->
      <li class="p-nav__list__item">
        <a href="#footer" class="p-nav__list__item__link" @click="isMenu=!isMenu">
          アクセス・お問い合わせ
        </a>
      </li>
    </ul>
    <ul class="p-nav__sublist l-nav__sublist">
      <li class="p-nav__sublist__item">
        <a href="<?php echo home_url(); ?>/iryo" class="p-nav__sublist__item__link <?php echo is_page( 'iryo' )?'-is-active':'' ?>">
          医療機関の方へ
        </a>
      </li>
      <li class="p-nav__sublist__item">
        <a href="<?php echo home_url(); ?>/kenkyusya" class="p-nav__sublist__item__link <?php echo is_page( 'kenkyusya' )?'-is-active':'' ?>">
          研究者の方へ
        </a>
      </li>
    </ul>
  </nav>
</header>
<!-- スマホ用ヘッダー -->
<header class="l-header-sp p-header-sp">
  <div class="l-header-sp__inner">
    <div class="l-header-sp__logo p-header-sp__logo">
      <a href="<?php echo home_url(); ?>" class="p-header-sp__logo__link">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="慶應義塾大学病院腫瘍センター ゲノム医療ユニット"
          class="p-header-sp__logo__img">
      </a>
    </div>
    <button class="c-toggle p-header-sp__btn -toggle" :class="isMenu?'-ismenu':''" @click="isMenu=!isMenu">
      <div class="c-toggle__bar p-toggle__bar -bar01"></div>
      <div class="c-toggle__bar p-toggle__bar -bar02"></div>
      <div class="c-toggle__bar p-toggle__bar -bar03"></div>
    </button>
  </div>
</header>