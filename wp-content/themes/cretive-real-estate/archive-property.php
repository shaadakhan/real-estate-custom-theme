<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Creative_Edge_Real_Estate_Theme
 */

get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<div>
    <?php

    echo hero_section(get_the_ID());
    ?>
</div>
<main id="primary" class="site-main section">

    <div class="container">
        <div class="row item-space">
            <div class="col-lg-12">
                <div class="search-form-container property-archive">
                    <div class="search-form bg-white">
                        <div class="item-space">
                            <h3>Search Your Properties</h3>
                            <div class="separator"></div>
                        </div>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="property_type">Looking For</label>
                                        <select name="property_type" id="property_type" class="form-control">

                                            <?php if (isset($_GET['property_type'])) {
                                                $property_type = $_GET['property_type'];
                                            ?>
                                                <option value="<?php echo $property_type; ?> "><?php echo $property_type; ?> </option>
                                            <?php
                                            } else { ?>
                                                <option value="">Select Property Type</option>
                                            <?php } ?>


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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="property_size">Property size</label>
                                        <select name="property_size" id="property_size" class="form-control">
                                            <?php if (isset($_GET['property_size'])) {
                                                $property_type = $_GET['property_size'];
                                            ?>
                                                <option value="<?php echo $property_type; ?> "><?php echo $property_type; ?> </option>
                                            <?php
                                            } else { ?>
                                                <option value="">Select Property Size</option>
                                            <?php } ?>

                                            <option value="100">100 mq2</option>
                                            <option value="200">200 mq2</option>
                                            <option value="300">300 mq2</option>
                                            <option value="400">400 mq2</option>
                                            <option value="500">500 mq2</option>
                                            <option value="600">600 mq2</option>
                                            <option value="700">700 mq2</option>
                                            <option value="2000">800+ mq2</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="property_location">Location</label>
                                        <select name="location" id="property_location" class="form-control">
                                            <?php if (isset($_GET['location'])) {
                                                $property_type = $_GET['location'];
                                            ?>
                                                <option value="<?php echo $property_type; ?> "><?php echo $property_type; ?> </option>
                                            <?php
                                            } else { ?>
                                                <option value="">Select Property Location</option>
                                            <?php } ?>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="property_price">Property Price</label>
                                        <select name="property_price" id="property_price" class="form-control" aria-required="true">
                                            <?php if (isset($_GET['property_price'])) {
                                                $property_type = $_GET['property_price'];
                                            ?>
                                                <option value="<?php echo $property_type; ?> "><?php echo $property_type; ?> </option>
                                            <?php
                                            } else { ?>
                                                <option value="">Select Property Price</option>
                                            <?php } ?>
                                            <option value="50000">50,000 </option>
                                            <option value="100000">100,000 </option>
                                            <option value="200000">200,000 </option>
                                            <option value="300000">300,000 </option>
                                            <option value="400000">400,000 </option>
                                            <option value="500000">500,000 </option>
                                            <option value="600000">600,000 </option>
                                            <option value="700000">700,000 </option>
                                            <option value="800000">800,000 </option>
                                            <option value="900000">900,000 </option>
                                            <option value="1000000">1,000,000 </option>
                                            <option value="1500000">1,500,000 </option>
                                            <option value="2000000">2,000,000 </option>
                                            <option value="2500000">2,500,000 </option>
                                            <option value="3000000">3,000,000 </option>
                                            <option value="4000000">4,000,000 </option>
                                            <option value="5000000">5,000,000 </option>
                                            <option value="6000000">6,000,000 </option>
                                            <option value="7000000">7,000,000 </option>
                                            <option value="10000000">10,000,000 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="property_bedrooms">Total Beds</label>
                                        <select name="property_bedrooms" id="property_bedrooms" class="form-control">
                                            <?php if (isset($_GET['property_bedrooms'])) {
                                                $property_type = $_GET['property_bedrooms'];
                                            ?>
                                                <option value="<?php echo $property_type; ?> "><?php echo $property_type; ?> </option>
                                            <?php
                                            } else { ?>
                                                <option value="">Select Property Bedrooms</option>
                                            <?php } ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="20">7+</option>



                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="property_bath">Total Bathrooms</label>
                                        <select name="property_bath" id="property_bath" class="form-control">
                                            <?php if (isset($_GET['property_bath'])) {
                                                $property_type = $_GET['property_bath'];
                                            ?>
                                                <option value="<?php echo $property_type; ?> "><?php echo $property_type; ?> </option>
                                            <?php
                                            } else { ?>
                                                <option value="">Select Property Baths</option>
                                            <?php } ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="20">7+</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="submit" style="visibility: hidden;">Submit</label>
                                        <input type="submit" class="btn search-btn btn-success form-control" value="SEARCH">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row item-space searched-data">
            <?php
            // if (isset($_GET['property_type'])) {
            //     $property_type = $_GET['property_type'];
            // }
            // if (isset($_GET['location'])) {
            //     $property_location = $_GET['location'];
            // }
            // property_type
            // property_size
            // location
            // property_price
            // property_bedrooms
            // property_bath

            $args = array(
                'post_type' => 'property',
                'posts_per_page' => post_per_page(),
                'post_status' => 'publish',
                'order' => 'ASC',
                'paged' => $paged,
            );


            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : ?>
                <?php
                /* Start the Loop */
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                    echo property_card_render(get_the_ID());
                endwhile;
                wp_reset_postdata();
                ?>

                <div class="searched-pagination">
                    <?php
                    echo pagination();
                    ?>
                </div>
        </div>
    <?php
            else :

                get_template_part('template-parts/content', 'none');

            endif;
    ?>

    </div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
