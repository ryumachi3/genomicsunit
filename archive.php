<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
      <div class="l-container">
				<section class="l-common-sec">
					<h1 class="c-head-title -anime l-head-title l-news-head-title">
						<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">お</span></span>
						<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">知</span></span>
						<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">ら</span></span>
						<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">せ</span></span>
					</h1>
					<div class="c-contents">
						<ul class="p-news-list l-news-list-archive">
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
							<li class="p-news-list__item">
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
							</li>
						</ul>
						<div class="l-news-pagination">
							<ul class="page-numbers">
								<li class="js-light-out"><a href="" class="first page-numbers"><i class="c-pagination-icon -first"></i></a></li>
								<li class="js-light-out"><a href="" class="prev page-numbers"><i class="c-pagination-icon -prev"></i></a></li>
								<li class="js-light-out"><a href="" class="page-numbers">1</a></li>
								<li class="js-light-out"><span aria-current="page" class="page-numbers current">2</span></li>
								<li class="js-light-out"><a href="" class="page-numbers">3</a></li>
								<li class="js-light-out"><a href="" class="dot page-numbers">…</a></li>
								<li class="js-light-out"><a href="" class="next page-numbers"><i class="c-pagination-icon -next"></i></a></li>
								<li class="js-light-out"><a href="" class="last page-numbers"><i class="c-pagination-icon -last"></i></a></li>
							</ul>
						</div>
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