<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
			<div class="l-container">
				<section class="l-common-sec">
					<h1 class="c-head-title -anime l-head-title l-iryo-head-title">
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">研</span></span>
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">究</span></span>
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">者</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">の</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">方</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">へ</span></span>
					</h1>
					<div class="c-contents">
						<section class="l-iryo-description">
							<p class="l-iryo-description__txt">ゲノム医療ユニットから研究者の方に向けたお知らせや臨床研究の内容をご紹介します。</p>
						</section>
						<?php
						$cat_id = get_cat_ID('研究者の方へ');
						$cat_link = get_category_link($cat_id);
						$sticky = show_sticky(array($cat_id));
						$cat_posts_args = array(
							'category' => $cat_id,
							'orderby' => 'date',
							'order' => 'DESC',
							'exclude' => $sticky,
							'posts_per_page' => 3
						);
						$cat_posts = get_posts($cat_posts_args);
						?>

						<?php if (!empty($sticky) || !empty($cat_posts)) : ?>
							<section class="l-iryo-news">
								<div class="l-top-title">
									<h2 class="c-top-title">お知らせ</h2>
								</div>
								<ul class="p-news-list l-news-list">
									<?php if (!empty($sticky)) {
										$sticky_args = array(
											'category' => $cat_id,
											'include' => $sticky,
										);
										$cat_posts_sticky = get_posts($sticky_args);
										foreach ($cat_posts_sticky as $post) {
											setup_postdata($post);
											echo '<li class="p-news-list__item">';
											get_template_part('parts/card_news');
											echo '</li>';
										}
										wp_reset_postdata();
									} ?>
									<?php if (!empty($cat_posts)) {
										foreach ($cat_posts as $post) {
											setup_postdata($post);
											echo '<li class="p-news-list__item">';
											get_template_part('parts/card_news');
											echo '</li>';
										}
										wp_reset_postdata();
									}; ?>

								</ul>
								<div class="l-btn">
									<a href="<?php echo esc_url($cat_link); ?>" class="c-btn p-iryo-news__btn -iryo">
										もっと見る
									</a>
								</div>
							</section>
						<?php endif; ?>
						<section class="l-iryo-rinsyo">
							<h2 class="c-title l-iryo-rinsyo__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>臨床研究のご紹介</h2>
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
					</div><!-- c-contents -->
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