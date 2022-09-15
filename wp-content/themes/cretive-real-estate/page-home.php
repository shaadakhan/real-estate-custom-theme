<?php

/**
 * Template Name: Home Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Creative_Edge_Real_Estate_Theme
 */

get_header();

?>
<!-- Home Page -->
<div class="home-page-container">
    <!-- Hero Section Starts -->
    <?php
    $bg_img = "";
    $hero_background_image = get_field('hero_background_image'); ?>
    <?php if ($hero_background_image) { ?>
        <?php $bg_img = esc_url($hero_background_image['url']); ?>
    <?php } ?>
    <section id="hero-section" class="hero-section section m-lg-auto" style="background: linear-gradient(0deg, rgba(16,14,15,0.35),rgba(16,14,15,0.35)) ,url(<?php echo $bg_img; ?>) ;">
        <div class="search-form-container">
            <h1 class="hero-heading text-white text-center mb-4">Find Your Dream Properties</h1>
            <div class="search-form bg-white">
                <h3>Search Your Properties</h3>
                <div class="separator"></div>
                <form action="<?php echo home_url(); ?>/property" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="property_type">Looking For</label>
                                <select name="property_type" id="property_type" class="form-control">
                                    <?php
                                    $property_types = get_terms(array(
                                        'taxonomy' => 'property_type',
                                        'hide_empty' => false,
                                    ));
                                    foreach ($property_types as $property_type) {
                                    ?>
                                        <option value="<?php echo $property_type->slug; ?>"><?php echo $property_type->name; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="property_size">Property size</label>
                                <select name="property_size" id="property_size" class="form-control">
                                    <?php
                                    // Arguments
                                    $args = array(
                                        'post_type' => 'property',
                                        'post_status' => 'publish'
                                    );
                                    // The Query
                                    $the_query = new WP_Query($args);

                                    // The Loop
                                    if ($the_query->have_posts()) {
                                        echo '<ul>';
                                        while ($the_query->have_posts()) {
                                            $the_query->the_post();
                                            $id = get_the_ID();
                                    ?>
                                            <option value="<?php the_field('property_size', get_the_ID()); ?>"><?php the_field('property_size', $id); ?> mq2</option>
                                    <?php }
                                    } else {
                                        // no posts found
                                    }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();
                                    ?>


                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="property_location">Location</label>
                                <select name="location" id="property_location" class="form-control">
                                    <?php
                                    $locations = get_terms(array(
                                        'taxonomy' => 'location',
                                        'hide_empty' => false,
                                    ));
                                    foreach ($locations as $location) {
                                    ?>
                                        <option value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="submit" style="visibility: hidden;">Submit</label>
                                <input type="submit" class="btn search-btn btn-success form-control" value="SEARCH">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Hero Section Ends Here -->
    <!-- Featured Property Section Starts -->
    <?php echo featured_properties(); ?>
    <!-- Featured Property Section Ends -->
    <section class="email-signup-section" id="email-signup-section" style="background-image:url('<?php echo img_dir_url() ?>/sign-up-bg.png')">
        <div class="bg-overlay-email-signup-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h2 class="text-left">Subscribe Our Email Address
                            For Future Lettest News & Updates</h2>
                    </div>
                    <div class="col-md-6 text-white text-center">
                        <h2 class="section-heading">Contact Form 7</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommend Property Section Starts -->
    <?php echo recommend_properties(); ?>
    <!-- Recommend Property Section Ends -->
    <!-- Locations -->

    <?php echo locations(); ?>

    <!-- Locations -->

    <!-- Agents  -->
    <?php echo agents(); ?>
    <!-- Agents  -->
    <!-- Our latest property news -->
    <?php echo blog_posts(); ?>
    <!-- Our latest property news -->


</div><!-- Home Page ending tag -->

<?php
get_sidebar();
get_footer();
