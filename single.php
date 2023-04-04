<?php get_header(); ?>
	<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
		<div class="l-main p-main">
			<div id="contents" class="l-contents">
	      <div class="l-container">
					<section class="l-common-sec">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<header class="l-news-dt__head">
								<div class="l-news-dt__head-title__wrap">
									<p class="c-head-title l-head-title l-news-dt__head-title">
										<span class="c-head-title__char -small -navy">お</span>
										<span class="c-head-title__char -small -navy-frame">知</span>
										<span class="c-head-title__char -small -navy-frame">ら</span>
										<span class="c-head-title__char -small -navy-frame">せ</span>
									</p>
									<div class="p-news-dt__tag c-news-tag">
										<span class="p-news-dt__tag__item c-news-tag__item -yellow">
											<i class="c-icon-pin"></i>
											固定されたお知らせ
										</span>
										<span class="p-news-dt__tag__item c-news-tag__item -iryo">
												研究者の方へ
										</span>
									</div>
								</div>
								<h1 class="l-news-dt__main-title p-news-dt__main-title">
									<?php the_title() ?>
								</h1>
								<div class="l-news-dt__date__wrap">
									<time class="p-news-dt__date l-news-dt__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y年n月j日'); ?></time>
								</div>
							</header>
							<section class="l-news-dt__body p-news-dt__body">
								<?php the_content(); ?>
							</section>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php 
								$prev_post = get_previous_post();
								$next_post = get_next_post();
						?>
						<?php if($prev_post || $next_post): ?>
							<nav class="l-news-dt__pager p-news-dt__pager">
								<?php if($next_post): ?>
									<span class="p-news-dt__pager__link__wrap -next">
										<a href="<?php echo get_permalink($next_post->ID); ?>" class="p-news-dt__pager__link -next">
											<div class="p-news-dt__pager__date__wrap">
												<time class="p-news-dt__pager__date l-news-dt__pager__date" datetime="<?php echo get_the_date('Y-m-d',$next_post->ID); ?>"><?php echo get_the_date('Y年n月j日',$next_post->ID); ?></time>
											</div>
											<p class="p-news-dt__pager__title">
												<?php echo get_the_title( $next_post->ID ); ?>
											</p>
										</a>
									</span>
								<?php endif ?>
								<?php if($prev_post): ?>
									<span class="p-news-dt__pager__link__wrap -prev">
										<a href="<?php echo get_permalink($prev_post->ID); ?>" class="p-news-dt__pager__link -prev">
											<div class="p-news-dt__pager__date__wrap">
												<time class="p-news-dt__pager__date l-news-dt__pager__date" datetime="<?php echo get_the_date('Y-m-d',$prev_post->ID); ?>"><?php echo get_the_date('Y年n月j日',$prev_post->ID); ?></time>
											</div>
											<p class="p-news-dt__pager__title">
												<?php echo get_the_title( $prev_post->ID ); ?>
											</p>
										</a>
									</span>
								<?php endif ?>
							</nav>
						<?php endif ?>
						<div class="l-btn">
							<a href="<?php echo get_home_url() ?>/news" class="c-btn p-news-dt__pager__btn">
								お知らせ一覧
							</a>
						</div>
					</section>
				</div>
				<!-- l-container -->
			</div>
			<!-- contents -->
		</div>
		<!-- l-main -->
	</div>
	<!-- l-main-grid -->
<?php get_footer(); ?>
<?php get_template_part('wp-footer'); ?>