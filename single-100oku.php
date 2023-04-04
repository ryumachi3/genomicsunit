<?php get_header(); ?>
<?php get_template_part('nav'); ?>
<?php
$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
?>
<?php if ($image_url) : ?>
	<img class="p-colum-dt__thumb" src="<?php echo $image_url[0]; ?>">
<?php endif; ?>
<div id="wrapper">
	<div id="contents" class="l-contents-width p-100oku-dt__contents">
		<div id="content">
			<div class="contentWrapper">
				<div class="contentBox">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();

					// ここに記事を表示するコードを書く
					$prev_images = get_post_meta( $prev_post->ID, 'garally', $single = true); 
					$next_images = get_post_meta( $next_post->ID, 'garally', $single = true); 
					if ($prev_images) {
						$prev_image_url = wp_get_attachment_url($prev_images[0]);
						$prev_image_alt = get_post_meta( $prev_images[0], '_wp_attachment_image_alt', true); 
					}
					if ($next_images) {
						$next_image_url = wp_get_attachment_url($next_images[0]);
						$next_image_alt = get_post_meta( $next_images[0], '_wp_attachment_image_alt', true); 
					}
					if (empty($prev_image_url)) {
						$prev_image_url = get_theme_file_uri() . '/img/no-img.png';
					}
					if (empty($next_image_url)) {
						$next_image_url = get_theme_file_uri() . '/img/no-img.png';
					}
					$next_images = get_post_meta( $next_post->ID, 'garally', $single = true); 

					$next_brand = get_post_meta( $next_post->ID, 'brand'); 
					$next_title = get_the_title( $next_post->ID); 
					$next_price = '¥' . number_format(get_field('price'));
					if(get_field('capa')){ 
						$next_price = $next_price . '/' . get_field('capa');
					};
					?>
					<nav class="p-100oku-dt__pager">
					<?php if($prev_post){ ?>
					<a class="p-100oku-dt__pager__link -prev" href="<?php echo get_permalink($prev_post->ID); ?>">
						<img class="p-100oku-dt__pager__img -prev" src="<?php echo $prev_image_url; ?>" alt="<?php echo $prev_image_alt ?>">
						<p class="p-100oku-dt__pager__txt -prev">前のプレゼント</p>
					</a>
					<?php } ?>
					<?php if($next_post){ ?>
					<a class="p-100oku-dt__pager__link  -next" href="<?php echo get_permalink($next_post->ID); ?>">
						<p class="p-100oku-dt__pager__txt -next">次のプレゼント</p>
						<img  class="p-100oku-dt__pager__img -next" src="<?php echo $next_image_url; ?>" alt="<?php echo $next_image_alt ?>">
					</a>
					<?php } ?>
					</nav>
							<div id="post-<?php the_ID(); ?>" class="topic-post">
								<article class="c-dt-article p-100oku-dt__article">

									<?php // ACF Gallery Field の表示
										$images = get_field('garally'); // フィールド名の指定
										if( $images ):
									?>
									<div class="p-100oku-dt__garally">
										<!-- Slider main container -->
										<div class="swiper c-mySwiper2">
											<!-- Additional required wrapper -->
											<div class="swiper-wrapper">
											<?php foreach( $images as $image ): // ループ処理の開始 ?>
												<div class="swiper-slide">
														<a href="<?php echo $image['url']; ?>">
															<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
														</a>
												</div>
											<?php endforeach; ?>
											</div>
										</div>

										<!-- Slider main container -->
										<div class="swiper c-mySwiper">
											<!-- Additional required wrapper -->
											<div class="swiper-wrapper">
											<?php foreach( $images as $image ): // ループ処理の開始 ?>
												<div class="swiper-slide">
															<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
												</div>
											<?php endforeach; ?>
											</div>
										</div>
									</div>
									<?php endif; ?>
									
									<section class="p-100oku-dt__header">
										<p class="c-dt-copy p-100oku-dt__copy"><?php the_field('copy'); ?></p>
										<h2 class="c-dt-title p-100oku-dt__title"><?php the_title(); ?></h2>
										<p class="c-dt-brand p-100oku-dt__brand"><?php the_field('brand'); ?></p>
										<p class="p-100oku-dt__price">
											<span class="p-100oku-dt__price__big">¥<?php echo number_format(get_field('price')); ?></span>(税込)  <?php if(get_field('capa')){ ?>/ <?php echo the_field('capa'); ?><?php } ?>
										</p>
										<?php
										$link_site = '';
											$link_site = get_field('url');
											$link_amazon = get_field('amazon_url');
											$link_rakuten = get_field('rakuten_url');
										?>
										<div class="c-button-brock">
											<a href="#" class="c-button -normal -like"><span class="c-button-icon -heart">お気に入りに追加する</span></a>
											<?php if($link_site): ?>
											<a href="<?php echo $link_site; ?>" class="c-button -normal -exlink" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -exlink">公式サイト・販売サイトへ行く</span></a>
											<?php endif; ?>
											<?php if($link_amazon || $link_rakuten): ?>
											<div class="c-button-brock__flex">
												<?php if($link_amazon): ?>
												<a href="<?php the_field($link_amazon) ?>" class="c-button -normal -amazon" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -amazon">Amazonで見る</span></a>
												<? endif; ?>
												<?php if($link_rakuten): ?>
												<a href="<?php the_field($link_rakuten) ?>" class="c-button -normal -rakuten" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -rakuten">Rakutenで見る</span></a>
												<? endif; ?>
											</div>
											<?php endif; ?>										
										</div>
									</section>
									<section class="p-100oku-dt__content">
										<?php the_content(); ?>
									</section>
									<section class="p-100oku-dt__recommend">
										<h2 class="p-100oku-dt__recommend__title -heart">こんな人におすすめ</h2>
										<ul class="p-100oku-dt__recommend__list">
											<?php if(have_rows('recommended')): ?>
												<?php while(have_rows('recommended')): the_row(); ?>
													<li class="p-100oku-dt__recommend__list__item"><?php the_sub_field('recommended-child'); ?></li>
												<?php endwhile; ?>
											<?php endif; ?>
										</ul>
										<h2 class="p-100oku-dt__recommend__title -concern">懸念があるとすれば…</h2>
										<ul class="p-100oku-dt__recommend__list">
											<?php if(have_rows('concern')): ?>
												<?php while(have_rows('concern')): the_row(); ?>
													<li class="p-100oku-dt__recommend__list__item"><?php the_sub_field('concern-child'); ?></li>
												<?php endwhile; ?>
											<?php endif; ?>
										</ul>
									</section>

									<?php // ACF Gallery Field の表示
										$images = get_field('garally'); // フィールド名の指定
										if( $images ):
									?>
									<div class="p-100oku-dt__garally">
										<!-- Slider main container -->
										<div class="swiper c-mySwiper2-copy">
											<!-- Additional required wrapper -->
											<div class="swiper-wrapper">
											<?php foreach( $images as $image ): // ループ処理の開始 ?>
												<div class="swiper-slide">
														<a href="<?php echo $image['url']; ?>">
															<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
														</a>
												</div>
											<?php endforeach; ?>
											</div>
										</div>

										<!-- Slider main container -->
										<div class="swiper c-mySwiper-copy">
											<!-- Additional required wrapper -->
											<div class="swiper-wrapper">
											<?php foreach( $images as $image ): // ループ処理の開始 ?>
												<div class="swiper-slide">
															<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
												</div>
											<?php endforeach; ?>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<section class="p-100oku-dt__header">
										<p class="c-dt-copy p-100oku-dt__copy"><?php the_field('copy'); ?></p>
										<h3 class="c-dt-title p-100oku-dt__title"><?php the_title(); ?></h3>
										<p class="c-dt-brand p-100oku-dt__brand"><?php the_field('brand'); ?></p>
										<p class="p-100oku-dt__price">
											<span class="p-100oku-dt__price__big">¥<?php echo number_format(get_field('price')); ?></span>(税込) <?php if(get_field('capa')){ ?>/ <?php echo the_field('capa'); ?><?php } ?>
										</p>
										<?php
										$link_site = '';
											$link_site = get_field('url');
											$link_amazon = get_field('amazon_url');
											$link_rakuten = get_field('rakuten_url');
										?>
										<div class="c-button-brock">
											<a href="#" class="c-button -normal -like"><span class="c-button-icon -heart">お気に入りに追加する</span></a>
											<?php if($link_site): ?>
											<a href="<?php echo $link_site; ?>" class="c-button -normal -exlink" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -exlink">公式サイト・販売サイトへ行く</span></a>
											<?php endif; ?>
											<?php if($link_amazon || $link_rakuten): ?>
											<div class="c-button-brock__flex">
												<?php if($link_amazon): ?>
												<a href="<?php the_field($link_amazon) ?>" class="c-button -normal -amazon" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -amazon">Amazonで見る</span></a>
												<? endif; ?>
												<?php if($link_rakuten): ?>
												<a href="<?php the_field($link_rakuten) ?>" class="c-button -normal -rakuten" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -rakuten">Rakutenで見る</span></a>
												<? endif; ?>
											</div>
											<?php endif; ?>										
										</div>
									</section>
									<ul class="p-100oku-dt__tag-list">
										<?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
											$custom_post_tag = 'genre'; // タクソノミーのスラッグを指定
											$custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
											if(!empty($custom_post_tag_terms)){
												if(!is_wp_error( $custom_post_tag_terms )){
													foreach($custom_post_tag_terms as $term){
														$tag_term_link = get_term_link($term->slug, $custom_post_tag);
														$tag_term_name = $term->name;
														echo '<li class="p-100oku-dt__tag-list__item"><a href="'.$tag_term_link.'">'.$tag_term_name.'</a></li>';
													}
												}
											}
										?>
										<?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
											$custom_post_tag = 'price_tag'; // タクソノミーのスラッグを指定
											$custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
											if(!empty($custom_post_tag_terms)){
												if(!is_wp_error( $custom_post_tag_terms )){
													foreach($custom_post_tag_terms as $term){
														$tag_term_link = get_term_link($term->slug, $custom_post_tag);
														$tag_term_name = $term->name;
														echo '<li class="p-100oku-dt__tag-list__item"><a href="'.$tag_term_link.'">'.$tag_term_name.'</a></li>';
													}
												}
											}
										?>
										<?php // 投稿に紐付いてるタームのリンク付きタイトル一覧を表示
											$custom_post_tag = '100okutag'; // タクソノミーのスラッグを指定
											$custom_post_tag_terms = wp_get_object_terms($post->ID, $custom_post_tag);
											if(!empty($custom_post_tag_terms)){
												if(!is_wp_error( $custom_post_tag_terms )){
													foreach($custom_post_tag_terms as $term){
														$tag_term_link = get_term_link($term->slug, $custom_post_tag);
														$tag_term_name = $term->name;
														echo '<li class="p-100oku-dt__tag-list__item"><a href="'.$tag_term_link.'">'.$tag_term_name.'</a></li>';
													}
												}
											}
										?>
									</ul>
									<?php
										$author_id = get_the_author_meta('ID');
										$profileImage = get_field( 'profile_img',  "user_" . $author_id );											
										$profileTwitter = get_field( 'twitter_url',  "user_" . $author_id );

									?>
									<section class="p-100oku-dt__writer">
										<div class="p-100oku-dt__writer__photo">
										<?php if( !empty( $profileImage ) ): ?>
											<div class="p-100oku-dt__writer__photo__wrap">
												<img src="<?php echo esc_url($profileImage['url']); ?>" alt="<?php echo esc_attr($profileImage['alt']); ?>" class="p-100oku-dt__writer__photo__img">
											</div>
										<?php endif; ?>
										</div>
										<div class="p-100oku-dt__writer__info">
											<h3 class="p-100oku-dt__writer__info__title">この記事を書いた人</h3>
											<p class="p-100oku-dt__writer__info__name"><?php the_author_meta('nickname'); ?></p>
											<p class="p-100oku-dt__writer__info__desc"><?php the_author_meta('description') ?></p>
											<a href="<?php echo $profileTwitter ?>" target="_blank" rel="noopener noreferrer" class="p-100oku-dt__writer__info__twitter">
											</a>
										</div>
									</section>
								</article>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part('template-parts/breadcrumbs'); ?>
	<nav class="p-100oku-dt__footpager l-contents-width">
		<div class="p-100oku-dt__footpager__flex">
		<?php if($prev_post){ ?>
		<a class="p-100oku-dt__footpager__link -prev" href="<?php echo get_permalink($prev_post->ID); ?>">
			<p class="p-100oku-dt__footpager__txt -prev">前のプレゼント</p>
			<div class="p-100oku-dt__footpager__img__wrap">
				<img class="p-100oku-dt__footpager__img -prev" src="<?php echo $prev_image_url; ?>" alt="<?php echo $prev_image_alt ?>">
			</div>
			<p class="p-100oku-dt__footpager__brand"><?php the_field('brand',$prev_post->ID); ?></p>
			<p class="p-100oku-dt__footpager__title"><?php echo get_the_title( $prev_post->ID ); ?></p>
			<p class="p-100oku-dt__footpager__price">
				¥<?php echo number_format(get_field('price',$prev_post->ID)); ?>(税込)  <?php if(get_field('capa',$prev_post->ID)){ ?>/ <?php echo the_field('capa',$prev_post->ID); ?><?php } ?>
			</p>
		</a>
		<?php } ?>
		<?php if($next_post){ ?>
		<a class="p-100oku-dt__footpager__link  -next" href="<?php echo get_permalink($next_post->ID); ?>">
			<p class="p-100oku-dt__footpager__txt -next">次のプレゼント</p>
			<div class="p-100oku-dt__footpager__img__wrap">
				<img  class="p-100oku-dt__footpager__img -next" src="<?php echo $next_image_url; ?>" alt="<?php echo $next_image_alt ?>">
			</div>
			<p class="p-100oku-dt__footpager__brand"><?php the_field('brand',$next_post->ID); ?></p>
			<p class="p-100oku-dt__footpager__title"><?php echo get_the_title( $next_post->ID ); ?></p>
			<p class="p-100oku-dt__footpager__price">
				¥<?php echo number_format(get_field('price',$next_post->ID)); ?>(税込)  <?php if(get_field('capa',$next_post->ID)){ ?>/ <?php echo the_field('capa',$prev_post->ID); ?><?php } ?>
			</p>
		</a>
		<?php } ?>
		</div>
		<a href="<?php echo get_post_type_archive_link('100oku'); ?>" class="c-button -footer">一覧へ戻る</a>
	</nav>
	<?php get_footer(); ?>
	<?php get_template_part('wp-footer'); ?>