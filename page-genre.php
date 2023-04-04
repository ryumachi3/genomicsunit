<?php get_header(); ?>
<?php get_template_part('nav'); ?>
<?php get_template_part('subnav'); ?>
<!-- main-visual-->
<!-- contents -->
<div id="contents">
    <div class="l-contents-wrap01">
      <section class="l-common-sec p-genre -page">
        <div class="l-common-sec__inner">
          <h2 class="p-genre__title -page">
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