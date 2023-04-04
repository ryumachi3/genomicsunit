<?php get_header(); ?>
<?php get_template_part('nav'); ?>
<?php get_template_part('subnav'); ?>
<h2 class="c-title-sub-jp p-colum__title__jp"></h2>
</div>
<div id="contents">
	<div class="l-contents-wrap01">
		<section class="l-common-sec p-100oku">
			<div class="l-common-sec__inner">
				<h2 class="p-100oku__title"><img class="" src="<?php bloginfo('template_url'); ?>/img/100oku_title.svg" alt="おしゃれなあの女性に今贈りたい100のモノ。"></h2>
			</div>
			<div class="l-common-sec__inner">
				<?php 
					$p_genre = get_query_var( 'genre' );
					$p_price = get_query_var( 'price' );
					$p_order = get_query_var( 'odr' );
				?>
				<form method="get" action="<?php echo home_url('100oku') ?>" class="p-100oku__form">
					<div class="p-100oku__select__wrap">
							<select class="c-select p-100oku__select -genre" name='genre' id='genre'>
									<option value="" selected="selected">ジャンル</option>
									<?php
									$terms = get_terms('genre', ['parent' => 0, 'hide_empty' => 0]);
									foreach ($terms as $term) {
										$is_selected = "";
										if(strcmp($p_genre,$term->slug) == 0){
											$is_selected = 'selected';
										}
										echo '<option class="p-100oku__select__option" value="' . $term->slug . '" ' . $is_selected . ' >' . $term->name . '</option>';
									}
									?>
						</select>
						<select class="c-select p-100oku__select -budged" name='price' id='price'>
							<option value="" >予算</option>
							<?php
							$terms = get_terms('price_tag', ['parent' => 0, 'hide_empty' => 0]);
							foreach ($terms as $term) {
								$is_selected = "";								
								if(strcmp($p_price,$term->slug) == 0){
									$is_selected = 'selected';
								}
								echo '<option class="p-100oku__select__option" value="' . $term->slug . '"' . $is_selected . '>' . $term->name . '</option>';
							}
							?>
						</select>
						<select class="c-select p-100oku__select -popular" name='order' id='order'>
							<option value="popular" <?php echo strcmp($p_order,'popular') == 0?'selected':''; ?> >人気順</option>
							<option value="best" <?php echo strcmp($p_order,'best') == 0?'selected':''; ?>>殿堂入優先</option>
							<option value="cheap" <?php echo strcmp($p_order,'cheap') == 0?'selected':''; ?>>価格が低い順</option>
							<option value="expensive" <?php echo strcmp($p_order,'expensive') == 0?'selected':''; ?>>価格が高い順</option>
						</select>
					</div>
					<div class="p-100oku__submit__wrap">
						<input class="c-submit p-100oku__submit" id="submit" type="submit" value="で表示" />
					</div>
				</form>

				<ul class="p-100oku__list">
					<?php
					// 100の贈りもの
					$args = array(
						'post_type' => '100oku',
						'posts_per_page' => 1000,
						'post_status' => 'publis　h',
						'tax_query' => array(
							'relation' => 'AND',
							array(
									'taxonomy' => 'genre',
									'field' => 'slug',
									'terms' => !empty($p_genre) ? $p_genre : null // ジャンルの値が空でなければ、パラメーターに追加
							),
							array(
									'taxonomy' => 'price',
									'field' => 'slug',
									'terms' => !empty($p_price) ? $p_price : null, // 価格のIDが空でなければ、パラメーターに追加
							)
						),
						'orderby' => array('menu_order' => 'ASC'),
					);
					$my_query = new WP_Query($args);
					if ($my_query->have_posts()) :
					?>
						<?php
						$i = 1;
						while ($my_query->have_posts()) : $my_query->the_post();
							// ここに記事を表示するコードを書く
							$images = get_field('garally'); // フィールド名の指定
							$image_url = '';
							if ($images) :
								$image_url = $images[0]['sizes']['large'];
								$image_alt = $images[0]['alt'];
							endif;
							if (empty($image_url)) {
								$image_url = get_theme_file_uri() . '/img/no-img.png';
							}
							$brand = get_field('brand');
							$price = get_field('price');
							$capa = get_field('capa');
						?>
            <?php // 殿堂入りタグ有無判定
              $custom_post_tag = '100okutag'; // タクソノミーのスラッグを指定
              $custom_post_tag_terms = get_the_terms($id,$custom_post_tag);
              $best_seller_flag = false;
              if(!empty($custom_post_tag_terms)){
                if(!is_wp_error( $custom_post_tag_terms )){
                  foreach($custom_post_tag_terms as $term){                    
                    if($term->slug == 'best-seller'){
                      $best_seller_flag = true;
                      break;
                    }
                  }
                }
              }
            ?>
              <li class="p-100oku__list__item">
                <a href="<?php echo get_post_permalink(); ?>" class="p-100oku__list__item__thumb__link">
									<span class="p-100oku__list__item__num"><?php echo $i ?></span>
                  <span class="p-100oku__list__item__thumb__wrap <?php echo $best_seller_flag?'-best-seller':''; ?>">
                    <img class="p-100oku__list__item__thumb" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt ?>">
                  </spam>
                </a>
                <div class="p-100oku__list__item__box">
                  <a href="<?php echo get_post_permalink(); ?>" class="p-100oku__list__item__title__link">
                    <h3 class="p-100oku__list__item__title">
                      <span class="p-100oku__list__item__title__brand"><?php echo $brand; ?></span>
                      <span class="p-100oku__list__item__title__name"><?php the_title(); ?></span>
                    </h3>
                    <p class="p-100oku__list__item__spec">
                      <span class="p-100oku__list__item__spec__price">¥<?php echo number_format($price); ?></span>
                      <?php if ($capa) : ?>
                        /
                        <span class="p-100oku__list__item__spec__capa"><?php echo $capa; ?></span>
                      <?php endif; ?>
                    </p>
                  </a>
                </div>
              </li>
            <?php
              $i++;
            endwhile;
            ?>
          <?php
            wp_reset_query();
          endif;
          ?>
        </ul>
				<h2 class="p-archive__title">
					<span class="c-title-top-en p-archive__title__en">Archive</span>
					<span class="c-title-top-jp p-archive__title__jp">これまでに100okuで紹介されたプレゼント</span>
				</h2>
				<ul class="p-100oku__list">
					<?php
					// 100の贈りもの
					$args = array(
						'post_type' => '100oku',
						'posts_per_page' => 1000,
						'post_status' => 'publis　h',
						'orderby' => array('date' => 'DESC'),
					);
					$my_query = new WP_Query($args);
					if ($my_query->have_posts()) :
					?>
						<?php
						$i = 1;
						while ($my_query->have_posts()) : $my_query->the_post();
							// ここに記事を表示するコードを書く
							$images = get_field('garally'); // フィールド名の指定
							$image_url = '';
							if ($images) :
								$image_url = $images[0]['sizes']['large'];
								$image_alt = $images[0]['alt'];
							endif;
							if (empty($image_url)) {
								$image_url = get_theme_file_uri() . '/img/no-img.png';
							}
							$brand = get_field('brand');
							$price = get_field('price');
							$capa = get_field('capa');
						?>
            <?php // 殿堂入りタグ有無判定
              $custom_post_tag = '100okutag'; // タクソノミーのスラッグを指定
              $custom_post_tag_terms = get_the_terms($id,$custom_post_tag);
              $best_seller_flag = false;
              if(!empty($custom_post_tag_terms)){
                if(!is_wp_error( $custom_post_tag_terms )){
                  foreach($custom_post_tag_terms as $term){                    
                    if($term->slug == 'best-seller'){
                      $best_seller_flag = true;
                      break;
                    }
                  }
                }
              }
            ?>
              <li class="p-100oku__list__item">
                <a href="<?php echo get_post_permalink(); ?>" class="p-100oku__list__item__thumb__link">
                  <span class="p-100oku__list__item__thumb__wrap <?php echo $best_seller_flag?'-best-seller':''; ?>">
                    <img class="p-100oku__list__item__thumb" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt ?>">
                  </spam>
                </a>
                <div class="p-100oku__list__item__box">
                  <a href="<?php echo get_post_permalink(); ?>" class="p-100oku__list__item__title__link">
                    <h3 class="p-100oku__list__item__title">
                      <span class="p-100oku__list__item__title__brand"><?php echo $brand; ?></span>
                      <span class="p-100oku__list__item__title__name"><?php the_title(); ?></span>
                    </h3>
                    <p class="p-100oku__list__item__spec">
                      <span class="p-100oku__list__item__spec__price">¥<?php echo number_format($price); ?></span>
                      <?php if ($capa) : ?>
                        /
                        <span class="p-100oku__list__item__spec__capa"><?php echo $capa; ?></span>
                      <?php endif; ?>
                    </p>
                  </a>
                </div>
              </li>
            <?php
              $i++;
            endwhile;
            ?>
          <?php
            wp_reset_query();
          endif;
          ?>
        </ul>
			</div><!-- l-common-sec__inner -->
		</section>
	</div>
</div>
<?php get_template_part('template-parts/breadcrumbs'); ?>
<?php get_footer(); ?>
<?php get_template_part('wp-footer'); ?>