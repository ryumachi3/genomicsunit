<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
			<div class="l-container">
				<section class="l-common-sec">
					<h1 class="c-head-title -anime l-head-title l-iryo-head-title">
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">医</span></span>
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">療</span></span>
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">機</span></span>
						<span class="c-head-title__char -iryo"><span class="c-head-title__char__inner">関</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">の</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">方</span></span>
						<span class="c-head-title__char -iryo-frame"><span class="c-head-title__char__inner">へ</span></span>
					</h1>
					<div class="c-contents">
						<section class="l-iryo-description">
							<p class="l-iryo-description__txt">患者さんが「がん遺伝子検査」を受けるための<span class="u-txt-point">ご予約方法</span>と<span class="u-txt-point">検体や書類の準備</span>について、医療機関の方へのお願い事をまとめました。ご確認のうえ、ご対応をお願いいたします。</p>
						</section>
						<?php
						$cat_id = get_cat_ID('医療機関の方へ');
						$cat_link = get_category_link($cat_id);
						$sticky = get_option('sticky_posts');
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
						<section class="l-hoken-sec p-hoken-sec -sec01">
							<h2 class="c-title l-hoken-sec__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>検査のご予約方法</h2>
							<div class="l-container3 l-hoken-sec__description p-hoken-sec__description -desc01-01">
								<div class="c-txtbox">
									<h3 class="p-hoken-sec__description__title">保険診療の場合</h3>
									<p class="p-hoken-sec__description__txt">慶應義塾大学病院<span class="u-txt-point">セカンドオピニオン外来</span>をご予約ください。</p>
									<p class="p-hoken-sec__description__txt">必要書類や送付先等の詳細は慶應義塾大学病院ホームページ内「<a class="p-hoken-sec__link" href="https://www.hosp.keio.ac.jp/annai/raiin/2ndopini/taimen_nagare.html" target="_blank" rel="noopener noreferrer">セカンドオピニオン外来（対面）の申し込みから相談終了までの流れ</a>」をご確認ください。</p>
								</div>
							</div>
							<div class="l-container3 l-hoken-sec__description p-hoken-sec__description -desc01-02">
								<div class="c-txtbox">
									<h3 class="p-hoken-sec__description__title">自費診療の場合</h3>
									<p class="p-hoken-sec__description__txt">慶應義塾大学病院へ<span class="u-txt-point">電話にて</span>ご予約ください。<br><span class="u-txt-point">がん専門初診外来予約窓口：<a class="p-hoken-sec__tel -point" href="tel:03-5363-3020">03-5363-3020</a></span><br>（電話受付時間：診察日の午前8時30分～午後4時00分）</p>
									<p class="p-hoken-sec__description__txt">必要書類や送付先等の詳細は慶應義塾大学病院ホームページ内「<a class="p-hoken-sec__link" href="https://www.hosp.keio.ac.jp/annai/raiin/yoyaku_nagare.html" target="_blank" rel="noopener noreferrer">診察のご予約の流れ</a>」をご確認のうえ、がん専門初診外来予約窓口へお電話ください。</p>
								</div>
							</div>
							<div class="l-container3 l-hoken-sec__note p-hoken-sec__note">
								<p class="p-hoken-sec__note c-description__note -kome"><span class="u-txt-point">既往病理診断報告書</span>についても、検査用検体の選定において重要な情報となりますので、可能な範囲でご提供をお願いいたします。検査所見、CT、MRI 等の画像データの提出については必須ではありませんが、結果の解釈や推奨治療法の選定において参考になる場合がありますので、可能であればご提供をお願いいたします。</p>
							</div>
						</section>
						<section class="l-hoken-sec p-hoken-sec -sec02">
							<h2 class="c-title l-hoken-sec__title"><span class="c-title__line-tate"></span><span class="c-title__line-yoko"></span>病理検体の準備について</h2>
							<div class="l-container3 l-hoken-sec__intro p-hoken-sec__intro">
								<p class="p-hoken-sec__intro__txt">1回目の受診後に、病理検体をご準備いただきますので、<span class="u-txt-point">ご予約前に病理検体の有無をご確認ください</span>。核酸抽出検査を行うための手術・生検時のホルマリン固定パラフィン包埋（FFPE）から作成された未染色標本が必要となります。</p>
							</div>
							<div class="l-container3 l-hoken-sec__description p-hoken-sec__description -desc02-01">
								<div class="c-txtbox">
									<h3 class="p-hoken-sec__description__title">ご用意いただく病理検体</h3>
									<ul class="p-hoken-sec__taisyo__list">
										<li class="c-list__item p-hoken-sec__taisyo__list__item">HE標本3枚(未染標本を作製したものと同一ブロックから作製)</li>
										<li class="c-list__item p-hoken-sec__taisyo__list__item">未染色標本4枚(5 μm厚・コーティングガラス)</li>
										<li class="c-list__item p-hoken-sec__taisyo__list__item">未染色標本10枚 (10 μm厚、ノンコーティングガラス)</li>
									</ul>
								</div>
							</div>
							<div class="l-container3 l-hoken-sec__description p-hoken-sec__description -desc02-02">
								<div class="c-txtbox">
									<h3 class="p-hoken-sec__description__title">病理検体とあわせてご用意いただく書類</h3>
									<ul class="p-hoken-sec__taisyo__list">
										<li class="c-list__item p-hoken-sec__taisyo__list__item">病理診断書のコピー</li>
										<li class="c-list__item p-hoken-sec__taisyo__list__item">該当するブロックが記載されている切り出し図のコピー</li>
									</ul>
								</div>
							</div>
							<div class="l-container3 l-hoken-sec__note p-hoken-sec__note">
								<p class="p-hoken-sec__note c-description__note -kome"><span class="u-txt-point">病理検体がない場合は先に検査の可否についてゲノム医療ユニットまでご相談ください</span>。尚、予約確定後、使用する病理検体の選定についてのご案内を、こちらの担当者よりご連絡させて頂きますので、診療情報提供書内に連絡先を明記願います。</p>
							</div>
						</section>
						<?php /*
						<section class="l-hoken-sec p-hoken-sec -sec03 -last">
							<h2 class="c-title l-hoken-sec__title">病理検体の提出先</h2>
							<div class="l-container3 l-hoken-sec__intro p-hoken-sec__intro">
								<p class="p-hoken-sec__intro__txt">下記の「検体送付・受領書」をダウンロードして必要事項をご記入いただき、<span class="u-txt-point">病理検体、病理診断書コピー、該当するブロックが記載されている切り出し図コピー</span>を同封のうえ、郵便または宅急便(ワレモノ・室温)にて郵送をお願い致します。</p>
								<a href="" class="c-btn p-hoken-sec__intro__btn -iryo">
									<i class="c-icon-pdf"></i>検体送付・受領書(送付表)
								</a>
							</div>
							<div class="l-container3 l-hoken-sec__note p-hoken-sec__note">
								<p class="p-hoken-sec__note c-description__note -kome">受領時には、FAXで受領のご連絡をさせていただきます。</p>
								<p class="p-hoken-sec__note c-description__note -kome">郵送が間に合わない場合には、患者さんに渡して、受診当日持参でも構いません。(患者さんに渡した際に、送付表の FAX をお願い致します。)</p>
							</div>
							<div class="l-container3 l-hoken-sec__description p-hoken-sec__description -desc01-02">
								<div class="c-txtbox">
									<h3 class="p-hoken-sec__description__title">病理検体の提出先 / お問い合わせ</h3>
									<p>
										〒160-8582 東京都新宿区信濃町35　総合医科学研究棟3階 3-S5<br>
										慶應義塾大学医学部 腫瘍センター ゲノム医療ユニット<br>
										TEL：<a class="p-hoken-sec__tel" href="tel:03-5315-4374">03-5315-4374</a><br>
										FAX：<a class="p-hoken-sec__tel" href="tel:03-5315-4495">03-5315-4495</a>
									</p>
								</div>
							</div>
						</section>
						*/ ?>
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