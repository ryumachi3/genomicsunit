<?php
$modal_id = 'doctor_' . get_the_ID();
$face = get_field('face');
$photo = '';
switch ($face) {
    case 'ill_a':
        $photo = get_theme_file_uri('/img/photo_doctor_female.png');
        $photo_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__list__item__img" alt="' . esc_attr(get_the_title()) . '">';
        $modal_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__modal__profile__img" alt="' . esc_attr(get_the_title()) . '">';
        break;
    case 'ill_b':
        $photo = get_theme_file_uri('/img/photo_doctor_male.png');
        $photo_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__list__item__img" alt="' . esc_attr(get_the_title()) . '">';
        $modal_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__modal__profile__img" alt="' . esc_attr(get_the_title()) . '">';
        break;
    case 'photo':
        $photo = get_field('photo');
        if (!$photo) {
            $photo = get_theme_file_uri('/img/photo_doctor_male.png');
            $photo_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__list__item__img" alt="' . esc_attr(get_the_title()) . '">';
            $modal_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__modal__profile__img" alt="' . esc_attr(get_the_title()) . '">';
        } else {
            $normal_size = wp_get_attachment_image_url($photo, 'thumbnail');
            $medium_size = wp_get_attachment_image_url($photo, 'medium');
            $photo_elm = '<img srcset="' . $medium_size . ' 2x" src="' . $normal_size . '" alt="" class="p-doctor-sec__list__item__img" alt="' . esc_attr(get_the_title()) . '">';
            $modal_elm = '<img srcset="' . $medium_size . ' 2x" src="' . $normal_size . '" alt="" class="p-doctor-sec__modal__profile__img" alt="' . esc_attr(get_the_title()) . '">';
        }
        break;
    default:
        $photo = get_theme_file_uri('/img/photo_doctor_male.png');
        $photo_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__list__item__img" alt="' . esc_attr(get_the_title()) . '">';
        $modal_elm = '<img src="' . $photo . '" alt="" class="p-doctor-sec__modal__profile__img" alt="' . esc_attr(get_the_title()) . '">';
        break;
}
?>
<a tabindex="200" data-fancybox="gallery" data-src="<?php echo '#' . $modal_id; ?>" class="p-doctor-sec__list__item__link js-light-out js-fancybox" @keydown.enter="clickOnEnter">
    <picture>
        <?php echo $photo_elm; ?>
    </picture>
    <div class="p-doctor-sec__list__item__info">
        <p class="p-doctor-sec__list__item__info__position"><?php the_field('yaku') ?></p>
        <h3 class="p-doctor-sec__list__item__info__name"><?php the_title(); ?></h3>
        <p class="p-doctor-sec__list__item__info__kana"><?php the_field('roman'); ?></p>
        <div class="p-doctor-sec__list__item__info__field">
            <?php the_field('senmon'); ?>
        </div>
    </div>
</a>
<div class="modal p-doctor-sec__modal" id="<?php echo $modal_id; ?>">
    <nav class="p-doctor-sec__modal__carousel__nav">
        <button @click="clickCarouselPrev()" title="Previous" class="p-doctor-sec__modal__carousel__nav__button -prev" tabindex="0"></button>
        <button @click="clickCarouselNext()" title="Next" class="p-doctor-sec__modal__carousel__nav__button -next" tabindex="0"></button>
    </nav>
    <div class="p-doctor-sec__modal__profile">
        <picture>
            <?php echo $modal_elm; ?>
        </picture>
        <div class="p-doctor-sec__modal__profile__info">
            <div class="p-doctor-sec__modal__profile__info__name__wrap">
            <p class="p-doctor-sec__modal__profile__info__position"><?php the_field('yaku') ?></p>
                <h3 class="p-doctor-sec__modal__profile__info__name"><?php the_title(); ?></h3>
            </div>
            <p class="p-doctor-sec__modal__profile__info__kana"><?php the_field('roman'); ?></p>
            <h4 class="p-doctor-sec__modal__profile__info__field__title">専門/担当分野</h4>
            <div class="p-doctor-sec__modal__profile__info__field">
                <div class="p-doctor-sec__modal__profile__info__field__item"><?php the_field('senmon'); ?></div>
            </div>
        </div>
    </div>
    <div class="p-doctor-sec__modal__description">
        <?php if (get_field('biography')) : ?>
            <h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">略歴</h4>
            <div class="p-doctor-sec__modal__description__biography p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
                <?php the_field('biography'); ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('shikaku')) : ?>
            <h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">認定資格等</h4>
            <div class="p-doctor-sec__modal__description__license p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
                <?php the_field('shikaku'); ?>
            </div>
        <?php endif; ?>
        <?php if (get_field('gyouseki')) : ?>
            <h4 class="p-doctor-sec__modal__description__title l-doctor-sec__modal__description__title">研究業績等</h4>
            <div class="p-doctor-sec__modal__description__txt l-doctor-sec__modal__description__txt">
                <?php the_field('gyouseki'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>