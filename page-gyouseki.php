<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
			<div class="l-container">
				<section class="l-common-sec">
					<h1 class="c-head-title -anime l-head-title l-iryo-head-title">
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">業</span></span>
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">績</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">一</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">覧</span></span>
						<span class="c-head-title__number c-contents">2024</span>
					</h1>

					<div class="c-contents">
						<ul class="p-gyouseki__btn__list">
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link -active">2024</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2023</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2022</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2021</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2020</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2019</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2018</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2017</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2016</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2015</a></li>
							<li class="p-gyouseki__btn__list__item"><a href="" class="p-gyouseki__btn__link">2014</a></li>
						</ul>
						<script>
						$(function(){
						$(".p-gyouseki__btn__link").click(function () {
						preventDefault(); //htmlデフォルトの挙動をキャンセルする
						$(".p-gyouseki__btn__link").removeClass("-active");
						$(this).addClass("-active");
						});
						})
						</script>
						
						<?php 
						$content_string = get_the_content();

						$content_string = str_replace('<h2 class="wp-block-heading">','<h2 class="wp-block-heading c-title -gyouseki"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span> ',$content_string);
						$content_string = str_replace('<ol','<ol class="p-gyouseki__list" ',$content_string);
						$content_string = str_replace('<li','<li class="p-gyouseki__list__item" ',$content_string);

						echo $content_string;
						?>
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