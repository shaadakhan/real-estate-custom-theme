<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Creative_Edge_Real_Estate_Theme
 */

get_header();
?>
<div>
    <?php

    echo hero_section(get_the_ID());
    ?>
</div>
<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <div class="row item-space">
                <div class="col-lg-12">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="single-property-img" />
                    <div class="d-flex flex-row flex-wrap justify-content-between item-space">
                        <h1 class="single-property-title"><?php the_title(); ?></h1>
                        <h4 class="single-property-price">$<?php the_field('price'); ?></h4>
                    </div>
                    <hr>
                    <div class="property-description item-space">
                        <h2 class="single-heading">Property Overview</h2>
                        <p><?php the_content(); ?></p>
                    </div>
                    <div class="item-space">
                        <h3 class="single-heading">
                            Property Features
                        </h3>
                    </div>
                    <div class="single-property-features">
                        <div class="single-property-feature-box">
                            <div class="f-p-details">
                                <img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bed.png'; ?>" />
                                <span class="f-p-item"><?php the_field('bedrooms'); ?> Bedrooms</span>
                            </div>
                        </div>
                        <div class="single-property-feature-box">
                            <div class="f-p-details">
                                <img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bath.png'; ?>" />
                                <span class="f-p-item"><?php the_field('bath'); ?> Bathrooms</span>
                            </div>
                        </div>
                        <div class="single-property-feature-box">
                            <div class="f-p-details">
                                <img class="f-p-icon-img" src="<?php echo img_dir_url() . '/area.png'; ?>" />
                                <span class="f-p-item"><?php the_field('property_size'); ?> mq2</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="single-heading item-space">
                            Property Gallery
                        </h3>
                        <div>
                            <?php $gallery_images = get_field('gallery'); ?>
                            <?php if ($gallery_images) :  ?>
                                <div class="row">
                                    <?php foreach ($gallery_images as $gallery_image) : ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                            <a href="<?php echo esc_url($gallery_image['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($gallery_image['alt']); ?>" />
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="item-space">
                        <h3 class="single-heading">
                            Property Video
                        </h3>
                        <?php the_field('video'); ?>
                    </div>
                    <div class="item-space">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13796.249868768566!2d71.3900808892722!3d30.17820950883376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b33d4cc95dbb3%3A0xc5dc139a9b62ab2!2sMultan%20Cantonment%2C%20Multan%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1654089531308!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div><!-- .col-12 -->
            </div>
        <?php
        endwhile; // End of the loop.
        ?>
    </div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
