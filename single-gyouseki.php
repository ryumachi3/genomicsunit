<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
			<div class="l-container">
				<section class="l-common-sec">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<h1 class="c-head-title -anime l-head-title l-iryo-head-title">
								<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">業</span></span>
								<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">績</span></span>
								<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">一</span></span>
								<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">覧</span></span>
								<span class="c-head-title__number c-contents"><?php the_title(); ?></span>
							</h1>
							<?php
							$gyouseki_args = array(
								'post_type' => 'gyouseki',
								'posts_per_page' => -1
							);
							$now_page = get_the_permalink();
							$gyouseki_posts = get_posts($gyouseki_args);
							if (!empty($gyouseki_posts)) : ?>
								<ul class="p-gyouseki__btn__list">
									<?php
									foreach ($gyouseki_posts as $post) :
										setup_postdata($post);
										$a_classes = 'p-gyouseki__btn__link';
										if ($now_page == get_the_permalink()) {
											$a_classes .= ' -active';
										}
									?>
										<li class="p-gyouseki__btn__list__item"><a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($a_classes); ?>"><?php the_title(); ?></a></li>
									<?php endforeach;
									wp_reset_postdata(); ?>
								</ul>
							<?php endif; ?>

							<div class="c-contents -gyouseki">
								<?php
								$content_string = get_the_content();
								$content_string = str_replace('<h2 class="wp-block-heading">', '<h2 class="wp-block-heading c-title -gyouseki"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span> ', $content_string);
								$content_string = str_replace('<ol', '<ol class="p-gyouseki__list" ', $content_string);
								$content_string = str_replace('<li', '<li class="p-gyouseki__list__item" ', $content_string);

								echo $content_string;
								?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
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