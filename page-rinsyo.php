<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
			<div class="l-container">
				<section class="l-common-sec">
					<h1 class="c-head-title__wrap l-head-title l-iryo-head-title">
						<div class="c-head-title -anime">
							<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">臨</span></span>
							<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">床</span></span>
							<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">研</span></span>
							<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">究</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">へ</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">の</span></span>
						</div>
						<div class="c-head-title -anime">
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">ご</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">協</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">力</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">の</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">お</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">願</span></span>
							<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">い</span></span>
						</div>
					</h1>
					<div class="c-contents">
						<section class="l-rinsyo-description">
							<p class="l-rinsyo-description__txt">慶應義塾大学病院腫瘍センターゲノム医療ユニットでは研究機関として今後の医療の発展に役立てるため、様々な臨床・基礎研究を実施しております。<span class="u-txt-point">患者さんの診療に直接影響しない下記の研究に関して、主に手術検体等の臨床検体や診療録のデータを集積・解析して研究を行っております。</span><br>
								当院の倫理委員会の承認の下、患者さんのプライバシーに充分配慮した上で実施しております。これらのデータを学会発表や論文の発表に貴重なデータとして利用させていただくことがございます。ご理解、ご協力のほどよろしくお願いいたします。なお、<span class="u-txt-point">下記の研究へのご協力を希望されない場合は、担当医もしくはゲノム医療ユニットまでお知らせください。</span></p>
							<img class="p-rinsyo-description__img" src="<?php echo get_theme_file_uri(); ?>/img/illust_rinsyo01.png" alt="">
						</section>
						<?php if (have_rows('files', 'rinsyo_pdf')) : ?>
							<section class="l-iryo-rinsyo">
								<ul class="p-info-list l-info-list">
									<?php while (have_rows('files', 'rinsyo_pdf')) : the_row();
										$file = get_sub_field('file');
										if ($file) :
											$file_url = $file['url'];
											$file_title = $file['title'];
											$file_name = get_sub_field('file_name');
											if (!$file_name) {
												$file_name = $file_title;
											}; ?>
											<li class="p-info-list__item">
												<a class="p-info-list__item__link" href="<?php echo esc_url($file_url); ?>" target="_blank" rel="noopener noreferrer">
													<h3 class="p-info-list__item__title">
														<?php echo esc_html($file_name); ?>
													</h3>
												</a>
											</li>
									<?php endif;
									endwhile; ?>
								</ul>
							</section>
						<?php endif; ?>
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