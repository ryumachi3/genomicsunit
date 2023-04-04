<?php get_header(); ?>
<?php get_template_part('nav'); ?>
<?php get_template_part('subnav'); ?>
<h2 class="c-title-sub-jp p-colum__title__jp"></h2>
</div>
<div id="contents">

	<div class="l-contents-wrap01">
		<section class="l-common-sec p-100oku -genre">
			<div class="l-common-sec__inner">
				<h2 class="p-100oku-taxonomy__title -<?php echo $term; ?>"><span class="p-100oku-taxonomy__title__txt"><?php single_term_title(); ?></span></h2>
				<form method="get" action="<?php bloginfo('url'); ?>" class="p-100oku__form -genre">
					<div class="p-100oku__select__wrap">
						<?php wp_dropdown_categories('orderby=name&hide_empty=-&show_option_all=ジャンル&selected=0&class=c-select p-100oku__select -genre'); ?>
						<?php /*
          <?php $tags = get_tags(); if ( $tags ) : ?>
        */ ?>
						<select class="c-select p-100oku__select -budged" name='tag' id='tag'>
							<option value="" selected="selected">予算</option>
							<?php /*
            <?php foreach ( $tags as $tag ): ?>
            <option value="<?php echo esc_html( $tag->slug); ?>"><?php echo esc_html( $tag->name ); ?></option>
            <?php endforeach; ?>
            */ ?>
							<option value="">1,000円</option>
						</select>
						<?php /*
          <?php endif; ?>
        */ ?>
						<select class="c-select p-100oku__select -popular" name='tag' id='tag'>
							<option value="">人気順</option>
							<option value="">殿堂入優先</option>
							<option value="">価格が低い順</option>
							<option value="">価格が高い順</option>
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
						'tax_query' => array(
							array(
									'taxonomy' => '100okutag',
									'field' => 'slug',
									'terms' => $term,
								)
							),
						'posts_per_page' => 1000,
						'post_status' => 'publish',
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
		<section class="l-common-sec p-genre -top">
			<div class="l-common-sec__inner">
				<h2 class="p-genre__title -top">
					<span class="c-title-top-en p-genre__title__en">Genre</span>
					<span class="c-title-top-jp p-genre__title__jp">人気のプレゼントジャンル</span>
				</h2>
				<ul class="p-genre__list">
					<?php
					$terms = get_terms('genre', ['parent' => 0, 'hide_empty' => 0]);
					foreach ($terms as $term) {
						echo '<li class="p-genre__list__item"><a class="p-genre__list__item__link -' . $term->slug . '" href="' . get_term_link($term) . '"><h3 class="p-genre__list__item__link__title">' . $term->name . '</h3></a></li>';
					}
					?>
				</ul>
			</div>
		</section>
	</div>
</div>
<?php get_template_part('template-parts/breadcrumbs'); ?>
<?php get_footer(); ?>
<?php get_template_part('wp-footer'); ?>