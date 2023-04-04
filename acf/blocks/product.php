<?php

$product_archive = get_field('product_article');
$product_id = $product_archive->ID;

?>
  <div id="post-<?php the_ID(); ?>" class="topic-post">
    <article class="c-dt-article p-100oku-dt__article">
      <?php // ACF Gallery Field の表示
        $product_images = get_field('garally',$product_id); // フィールド名の指定
        if( $product_images ):
      ?>
      <div class="p-100oku-dt__image">
        <a href="<?php echo $$product_images[0]['url']; ?>">
          <img src="<?php echo $product_images[0]['sizes']['large']; ?>" alt="<?php echo $product_images[0]['alt']; ?>" />
        </a>
      </div>
      <?php endif; ?>
      
      <section class="p-100oku-dt__header">
        <p class="c-dt-copy p-100oku-dt__copy"><?php the_field('copy',$product_id); ?></p>
        <h2 class="c-dt-title p-100oku-dt__title"><?php echo get_the_title($product_id); ?></h2>
        <p class="c-dt-brand p-100oku-dt__brand"><?php the_field('brand',$product_id); ?></p>
        <p class="p-100oku-dt__price">
          <span class="p-100oku-dt__price__big">¥<?php echo number_format(get_field('price',$product_id)); ?></span>(税込)  <?php if(get_field('capa',$product_id)){ ?>/ <?php echo the_field('capa',$product_id); ?><?php } ?>
        </p>
        <?php 
        $product_description = get_field('product_description');
        if( $product_description ): 
        ?>
        <p class="p-100oku-dt__description">
          <?php echo $product_description; ?>
        </p>
        <?php endif; ?>
        <?php
        $link_site = '';
          $link_site = get_field('url',$product_id);
          $link_amazon = get_field('amazon_url',$product_id);
          $link_rakuten = get_field('rakuten_url',$product_id);
        ?>
        <div class="c-button-brock">
          <a href="<?php echo get_permalink($product_id) ?>" class="c-button -normal  -detail" >詳しく見る</a>
          <?php if($link_site): ?>
          <a href="<?php echo $link_site; ?>" class="c-button -normal -exlink" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -exlink">公式サイト・販売サイトへ行く</span></a>
          <?php endif; ?>
          <?php if($link_amazon || $link_rakuten): ?>
          <div class="c-button-brock__flex">
            <?php if($link_amazon): ?>
            <a href="<?php the_field($link_amazon,$product_id) ?>" class="c-button -normal -amazon" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -amazon">Amazonで見る</span></a>
            <? endif; ?>
            <?php if($link_rakuten): ?>
            <a href="<?php the_field($link_rakuten,$product_id) ?>" class="c-button -normal -rakuten" target="_blank" rel="noopener noreferrer"><span class="c-button-icon -rakuten">Rakutenで見る</span></a>
            <? endif; ?>
          </div>
          <?php endif; ?>										
        </div>
      </section>
