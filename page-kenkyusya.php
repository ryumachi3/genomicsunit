<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
      <div class="l-container">
				<section class="l-common-sec">
					<h1 class="c-head-title l-head-title l-iryo-head-title">
						<span class="c-head-title__char -iryo">研</span>
						<span class="c-head-title__char -iryo">究</span>
						<span class="c-head-title__char -iryo">者</span>
						<span class="c-head-title__char -iryo-frame">の</span>
						<span class="c-head-title__char -iryo-frame">方</span>
						<span class="c-head-title__char -iryo-frame">へ</span>
					</h1>
					<section class="l-iryo-description">
						<p class="l-iryo-description__txt">ゲノム医療ユニットから研究者の方に向けたお知らせや臨床研究の内容をご紹介します。</p>
					</section>
					<?php /*
					<section class="l-iryo-news">
						<div class="l-top-title">
							<h2 class="c-top-title">お知らせ</h2>
						</div>
						<ul class="p-news-list l-news-list">
							<li class="p-news-list__item">
								<a href="<?php echo get_home_url(); ?>/news/26/" class="p-news-list__item__link">
									<time class="p-news-list__item__time">2023年3月22日</time>
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
						</ul>
						<div class="l-btn">
							<!-- □TODO:↓リンクを研究者カテゴリページに遷移させる -->
							<a href="<?php echo get_home_url() ?>/news" class="c-btn p-iryo-news__btn -iryo">
								もっと見る
							</a>
						</div>
					</section>
					*/ ?>
					<section class="l-iryo-rinsyo">
						<h2 class="c-title l-iryo-rinsyo__title">臨床研究のご紹介</h2>
						<div class="l-container2 l-iryo-rinsyo__description">
							<p class="l-iryo__description__txt">ゲノム医療ユニットで実施中の臨床研究については<a href="<?php echo get_theme_file_uri() ?>/rinsyo" class="">臨床研究ご協力のお願い</a>をご覧ください。</p>
						</div>
						<div class="l-btn">
							<a href="<?php echo get_theme_file_uri() ?>/rinsyo" class="c-btn p-iryo-news__btn -iryo">
								実施中の臨床研究一覧を見る
							</a>
						</div>
						</ul>
					</section>
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