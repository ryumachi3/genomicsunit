<div class="c-breadcrumbs" typeof="BreadcrumbList">
<?php if(function_exists('bcn_display'))
{
    bcn_display();
}?>
<?php if(is_post_type_archive('post')): ?>
<span property="itemListElement" typeof="ListItem" class="c-bc__parts">
  <span property="name" class="post post-page current-item">コラム一覧</span>
  <meta property="url" content=""><meta property="position" content="2">
</span>
<?php endif; ?>
</div>