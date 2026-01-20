<?php get_header(); ?>
<div class="l-main-grid">
	<?php get_template_part('nav'); ?>
	<div class="l-main p-main">
		<div id="contents" class="l-contents">
      <div class="l-container">
				<section class="l-common-sec">
          <section class="p-404">
            <div class="p-404__contents">
              <h1 class="p-404__ttl">404 Not Found</h1>
              <p class="p-404__txt">お探しのページはありません。<br><a href="<?php echo home_url('/'); ?>" class="">HOME</a>からご覧ください。</p>
            </div>
          </section>
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