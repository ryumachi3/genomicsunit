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
						<?php if (have_posts()) : ?>
							<ul class="p-news-list l-news-list-archive">
								<?php
								$cat_id = get_query_var('cat');
								$sticky = get_option('sticky_posts');
								$sticky_arg = array(
									'post__in' => $sticky,
									'category' => $cat_id,
								);
								if (!empty($sticky) && !is_paged()) {
									$sticky_posts = get_posts($sticky_arg);
									foreach ($sticky_posts as $post) {
										setup_postdata($post);
										echo '<li class="p-news-list__item">';
										get_template_part('parts/card_news');
										echo '</li>';
									}
									wp_reset_postdata();
								}
								?>
								<?php while (have_posts()) : the_post(); ?>
									<li class="p-news-list__item">
										<?php get_template_part('parts/card_news'); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						<div class="l-news-pagination">
							<?php if (function_exists("pagination")) {
								pagination($wp_query->max_num_pages);
							} ?>
							<?php
							/*<ul class="page-numbers">
								<li class="js-light-out"><a href="" class="first page-numbers"><i class="c-pagination-icon -first"></i></a></li>
								<li class="js-light-out"><a href="" class="prev page-numbers"><i class="c-pagination-icon -prev"></i></a></li>
								<li class="js-light-out"><a href="" class="page-numbers">1</a></li>
								<li class="js-light-out"><span aria-current="page" class="page-numbers current">2</span></li>
								<li class="js-light-out"><a href="" class="page-numbers">3</a></li>
								<li class="js-light-out"><a href="" class="dot page-numbers">…</a></li>
								<li class="js-light-out"><a href="" class="next page-numbers"><i class="c-pagination-icon -next"></i></a></li>
								<li class="js-light-out"><a href="" class="last page-numbers"><i class="c-pagination-icon -last"></i></a></li>
							</ul>
							*/ ?>
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