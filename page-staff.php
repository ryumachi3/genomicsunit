<?php
/*
Template Name: スタッフ紹介テンプレート
*/
?>
<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
			<div class="l-container -staff">
				<section class="l-common-sec">
					<h1 class="c-head-title -anime l-head-title l-staff-head-title">
						<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">ス</span></span>
						<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">タ</span></span>
						<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">ッ</span></span>
						<span class="c-head-title__char -navy"><span class="c-head-title__char__inner">フ</span></span>
						<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">紹</span></span>
						<span class="c-head-title__char -navy-frame"><span class="c-head-title__char__inner">介</span></span>
					</h1>
					<div class="c-contents">
						<section class="l-doctor-sec p-doctor-sec -sec01">
							<h2 class="c-title l-doctor-sec__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>医師</h2>
							<?php if (have_posts()) : ?>
								<ul class="p-doctor-sec__list">
									<?php while (have_posts()) : the_post(); ?>
										<li class="p-doctor-sec__list__item">
											<?php get_template_part('parts/card_doctor'); ?>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<ul class="p-doctor-sec__list">
								<li class="p-doctor-sec__list__item">
									<a tabindex="200" data-fancybox="gallery" data-src="#modal_doctor_001" class="p-doctor-sec__list__item__link js-light-out js-fancybox" @keydown.enter="clickOnEnter">
										<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_nishihara.jpg" alt="" class="p-doctor-sec__list__item__img">
										<div class="p-doctor-sec__list__item__info">
											<p class="p-doctor-sec__list__item__info__position">教授</p>
											<h3 class="p-doctor-sec__list__item__info__name">西原 広史</h3>
											<p class="p-doctor-sec__list__item__info__kana">Hiroshi Nishihara</p>
											<ul class="p-doctor-sec__list__item__info__field">
												<li class="p-doctor-sec__list__item__info__field__item">がんゲノム研究</li>
												<li class="p-doctor-sec__list__item__info__field__item">分子病理学</li>
											</ul>
										</div>
									</a>
									<div class="modal p-doctor-sec__modal" id="modal_doctor_001">
										<nav class="p-doctor-sec__modal__carousel__nav">
											<button @click="clickCarouselPrev()" title="Previous" class="p-doctor-sec__modal__carousel__nav__button -prev" tabindex="0"></button>
											<button @click="clickCarouselNext()" title="Next" class="p-doctor-sec__modal__carousel__nav__button -next" tabindex="0"></button>
										</nav>
										<div class="p-doctor-sec__modal__profile">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_nishihara.jpg" alt="" class="p-doctor-sec__modal__profile__img">
											<div class="p-doctor-sec__modal__profile__info">
												<div class="p-doctor-sec__modal__profile__info__name__wrap">
													<h3 class="p-doctor-sec__modal__profile__info__name">西原 広史</h3>
													<p class="p-doctor-sec__modal__profile__info__position">教授</p>
												</div>
												<p class="p-doctor-sec__modal__profile__info__kana">Hiroshi Nishihara</p>
												<h4 class="p-doctor-sec__modal__profile__info__field__title">専門/担当分野</h4>
												<ul class="p-doctor-sec__modal__profile__info__field">
													<li class="p-doctor-sec__modal__profile__info__field__item">がんゲノム研究</li>
													<li class="p-doctor-sec__modal__profile__info__field__item">分子病理学</li>
												</ul>
											</div>
										</div>
										<div class="p-doctor-sec__modal__description">
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__biography p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__biography__item">1995年3月 北海道大学医学部卒業</li>
												<li class="p-doctor-sec__modal__description__biography__item">1999年3月 北海道大学大学院医学研究科博士課程修了</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__license p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__license__item">日本病理学会 病理専門医</li>
												<li class="p-doctor-sec__modal__description__license__item">死体解剖医</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">研究業績等</h4>
											<div class="p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<p>○○○○○○○○○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○</u></p>
												<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
												<p>○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○○○○</u></p>
											</div>
										</div>
									</div>
								</li>
								<li class="p-doctor-sec__list__item">
									<a tabindex="200" data-fancybox="gallery" data-src="#modal_doctor_002" class="p-doctor-sec__list__item__link js-light-out" @keydown.enter="clickOnEnter">
										<div class="p-doctor-sec__list__item__img__wrap">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_hayashi.jpg" alt="" class="p-doctor-sec__list__item__img">
										</div>
										<div class="p-doctor-sec__list__item__info">
											<p class="p-doctor-sec__list__item__info__position">統括マネージャー・特任講師</p>
											<h3 class="p-doctor-sec__list__item__info__name">林 秀幸</h3>
											<p class="p-doctor-sec__list__item__info__kana">Hideyuki Hayashi</p>
											<ul class="p-doctor-sec__list__item__info__field">
												<li class="p-doctor-sec__list__item__info__field__item">臨床腫瘍学</li>
												<li class="p-doctor-sec__list__item__info__field__item">ゲノム生物学</li>
												<li class="p-doctor-sec__list__item__info__field__item">腫瘍内科学</li>
												<li class="p-doctor-sec__list__item__info__field__item">消化器内科学</li>
												<li class="p-doctor-sec__list__item__info__field__item">内科学全般</li>
											</ul>
										</div>
									</a>
									<div class="modal p-doctor-sec__modal" id="modal_doctor_002">
										<nav class="p-doctor-sec__modal__carousel__nav">
											<button @click="clickCarouselPrev()" title="Previous" class="p-doctor-sec__modal__carousel__nav__button -prev" tabindex="0"></button>
											<button @click="clickCarouselNext()" title="Next" class="p-doctor-sec__modal__carousel__nav__button -next" tabindex="0"></button>
										</nav>
										<div class="p-doctor-sec__modal__profile">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_hayashi.jpg" alt="" class="p-doctor-sec__modal__profile__img">
											<div class="p-doctor-sec__modal__profile__info">
												<div class="p-doctor-sec__modal__profile__info__name__wrap">
													<h3 class="p-doctor-sec__modal__profile__info__name">西原 広史</h3>
													<p class="p-doctor-sec__modal__profile__info__position">教授</p>
												</div>
												<p class="p-doctor-sec__modal__profile__info__kana">Hiroshi Nishihara</p>
												<h4 class="p-doctor-sec__modal__profile__info__field__title">専門/担当分野</h4>
												<ul class="p-doctor-sec__modal__profile__info__field">
													<li class="p-doctor-sec__modal__profile__info__field__item">がんゲノム研究</li>
													<li class="p-doctor-sec__modal__profile__info__field__item">分子病理学</li>
												</ul>
											</div>
										</div>
										<div class="p-doctor-sec__modal__description">
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__biography p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__biography__item">1995年3月 北海道大学医学部卒業</li>
												<li class="p-doctor-sec__modal__description__biography__item">1999年3月 北海道大学大学院医学研究科博士課程修了</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__license p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__license__item">日本病理学会 病理専門医</li>
												<li class="p-doctor-sec__modal__description__license__item">死体解剖医</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">研究業績等</h4>
											<div class="p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<p>○○○○○○○○○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○</u></p>
												<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
												<p>○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○○○○</u></p>
											</div>
										</div>
									</div>
								</li>

								<li class="p-doctor-sec__list__item">
									<a tabindex="200" data-fancybox="gallery" data-src="#modal_doctor_003" class="p-doctor-sec__list__item__link js-light-out" @keydown.enter="clickOnEnter">
										<div class="p-doctor-sec__list__item__img__wrap">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_female.png" alt="" class="p-doctor-sec__list__item__img">
										</div>
										<div class="p-doctor-sec__list__item__info">
											<p class="p-doctor-sec__list__item__info__position">特任助教</p>
											<h3 class="p-doctor-sec__list__item__info__name">石川 麻倫</h3>
											<p class="p-doctor-sec__list__item__info__kana">Marin Ishikawa</p>
											<ul class="p-doctor-sec__list__item__info__field">
												<li class="p-doctor-sec__list__item__info__field__item">消化器内科</li>
											</ul>
										</div>
									</a>
									<div class="modal p-doctor-sec__modal" id="modal_doctor_003">
										<nav class="p-doctor-sec__modal__carousel__nav">
											<button @click="clickCarouselPrev()" title="Previous" class="p-doctor-sec__modal__carousel__nav__button -prev" tabindex="0"></button>
											<button @click="clickCarouselNext()" title="Next" class="p-doctor-sec__modal__carousel__nav__button -next" tabindex="0"></button>
										</nav>
										<div class="p-doctor-sec__modal__profile">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_female.png" alt="" class="p-doctor-sec__modal__profile__img">
											<div class="p-doctor-sec__modal__profile__info">
												<div class="p-doctor-sec__modal__profile__info__name__wrap">
													<h3 class="p-doctor-sec__modal__profile__info__name">石川 麻倫</h3>
													<p class="p-doctor-sec__modal__profile__info__position">特任助教</p>
												</div>
												<p class="p-doctor-sec__modal__profile__info__kana">Marin Ishikawa</p>
												<h4 class="p-doctor-sec__modal__profile__info__field__title">専門/担当分野</h4>
												<ul class="p-doctor-sec__modal__profile__info__field">
													<li class="p-doctor-sec__modal__profile__info__field__item">消化器内科</li>
												</ul>
											</div>
										</div>
										<div class="p-doctor-sec__modal__description">
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__biography p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__biography__item">1995年3月 北海道大学医学部卒業</li>
												<li class="p-doctor-sec__modal__description__biography__item">1999年3月 北海道大学大学院医学研究科博士課程修了</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__license p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__license__item">日本病理学会 病理専門医</li>
												<li class="p-doctor-sec__modal__description__license__item">死体解剖医</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">研究業績等</h4>
											<div class="p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<p>○○○○○○○○○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○</u></p>
												<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
												<p>○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○○○○</u></p>
											</div>
										</div>
									</div>
								</li>

								<li class="p-doctor-sec__list__item">
									<a tabindex="200" data-fancybox="gallery" data-src="#modal_doctor_004" class="p-doctor-sec__list__item__link js-light-out" @keydown.enter="clickOnEnter">
										<div class="p-doctor-sec__list__item__img__wrap">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_male.png" alt="" class="p-doctor-sec__list__item__img">
										</div>
										<div class="p-doctor-sec__list__item__info">
											<p class="p-doctor-sec__list__item__info__position">XXXX</p>
											<h3 class="p-doctor-sec__list__item__info__name">○○ ○○</h3>
											<p class="p-doctor-sec__list__item__info__kana">Namae Myouji</p>
											<ul class="p-doctor-sec__list__item__info__field">
												<li class="p-doctor-sec__list__item__info__field__item">専門</li>
												<li class="p-doctor-sec__list__item__info__field__item">担当分野</li>
											</ul>
										</div>
									</a>
									<div class="modal p-doctor-sec__modal" id="modal_doctor_004">
										<nav class="p-doctor-sec__modal__carousel__nav">
											<button @click="clickCarouselPrev()" title="Previous" class="p-doctor-sec__modal__carousel__nav__button -prev" tabindex="0"></button>
											<button @click="clickCarouselNext()" title="Next" class="p-doctor-sec__modal__carousel__nav__button -next" tabindex="0"></button>
										</nav>
										<div class="p-doctor-sec__modal__profile">
											<img src="<?php echo get_theme_file_uri() ?>/img/photo_doctor_male.png" alt="" class="p-doctor-sec__modal__profile__img">
											<div class="p-doctor-sec__modal__profile__info">
												<div class="p-doctor-sec__modal__profile__info__name__wrap">
													<h3 class="p-doctor-sec__modal__profile__info__name">○○ ○○</h3>
													<p class="p-doctor-sec__modal__profile__info__position">XXXX</p>
												</div>
												<p class="p-doctor-sec__modal__profile__info__kana">Namae Myouji</p>
												<h4 class="p-doctor-sec__modal__profile__info__field__title">専門/担当分野</h4>
												<ul class="p-doctor-sec__modal__profile__info__field">
													<li class="p-doctor-sec__modal__profile__info__field__item">専門</li>
													<li class="p-doctor-sec__modal__profile__info__field__item">担当分野</li>
													<li class="p-doctor-sec__modal__profile__info__field__item">専門</li>
													<li class="p-doctor-sec__modal__profile__info__field__item">担当分野</li>
												</ul>
											</div>
										</div>
										<div class="p-doctor-sec__modal__description">
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__biography p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__biography__item">1995年3月 北海道大学医学部卒業</li>
												<li class="p-doctor-sec__modal__description__biography__item">1999年3月 北海道大学大学院医学研究科博士課程修了</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
											<ul class="p-doctor-sec__modal__description__license p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<li class="p-doctor-sec__modal__description__license__item">日本病理学会 病理専門医</li>
												<li class="p-doctor-sec__modal__description__license__item">死体解剖医</li>
											</ul>
											<h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">研究業績等</h4>
											<div class="p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
												<p>○○○○○○○○○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○</u></p>
												<p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
												<p>○○○○○○○○○○○○○</p>
												<p><u>○○○○○○○○○○○○○○○○○○○○○</u></p>
											</div>
										</div>
									</div>
								</li>


							</ul>
						</section>
						<section class="l-staff-sec p-staff-sec -sec02">
							<h2 class="c-title l-staff-sec__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>スタッフ・共同研究員</h2>
							<ul class="p-staff-sec__list">
								<li class="p-staff-sec__list__item">
									<p class="p-staff-sec__list__item__info__position">共同研究員</p>
									<h3 class="p-staff-sec__list__item__info__name">○○ ○○</h3>
									<p class="p-staff-sec__list__item__info__kana">Namae Myouji</p>
								</li>
								<li class="p-staff-sec__list__item">
									<p class="p-staff-sec__list__item__info__position">共同研究員</p>
									<h3 class="p-staff-sec__list__item__info__name">○○ ○○</h3>
									<p class="p-staff-sec__list__item__info__kana">Namae Myouji</p>
								</li>
								<li class="p-staff-sec__list__item">
									<p class="p-staff-sec__list__item__info__position">共同研究員</p>
									<h3 class="p-staff-sec__list__item__info__name">○○ ○○</h3>
									<p class="p-staff-sec__list__item__info__kana">Namae Myouji</p>
								</li>

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