<?php

/**
 * Creative Edge Real Estate Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Creative_Edge_Real_Estate_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
// Navwalker class
/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
	require_once get_template_directory() . '/inc/bootsrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cretive_real_estate_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Creative Edge Real Estate Theme, use a find and replace
		* to change 'cretive-real-estate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('cretive-real-estate', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary', 'cretive-real-estate'),
			'secondry' => esc_html__('Secondry', 'cretive-real-estate'),
			'sidebar' => esc_html__('Sidebar', 'cretive-real-estate'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cretive_real_estate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'cretive_real_estate_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cretive_real_estate_content_width()
{
	$GLOBALS['content_width'] = apply_filters('cretive_real_estate_content_width', 640);
}
add_action('after_setup_theme', 'cretive_real_estate_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cretive_real_estate_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'cretive-real-estate'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'cretive-real-estate'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'cretive_real_estate_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cretive_real_estate_scripts()
{
	// JQuery
	wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/jQuery.min.js', array(), _S_VERSION, true);

	// Default Styles
	wp_enqueue_style('cretive-real-estate-style', get_stylesheet_uri(), array(), _S_VERSION);
	// Bootstaps Styles
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', array());

	wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css', array());
	// Slick Slider
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/slick.css', array());
	wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/slick/slick-theme.css', array());



	wp_style_add_data('cretive-real-estate-style', 'rtl', 'replace');

	wp_enqueue_script('cretive-real-estate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	// Bootstrap Javascript
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_enqueue_script('ajax_custom_script',  get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'));
	wp_localize_script('ajax_custom_script', 'ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'cretive_real_estate_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Option Pages

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'administrator',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}
// img directory url function

function img_dir_url()
{
	$img_dir_url = get_template_directory_uri() . '/assets/images';
	return $img_dir_url;
}


// Featured Properties section
function featured_properties()
{
	ob_start();
?>
	<section class="section featured-property-section" id="featured-property-section">
		<div class="container">
			<!-- Top heading are -->
			<div class="row text-center">
				<div class="col-lg-8 mx-auto col-sm-12 col-xm-12">
					<h2 class="section-heading item-space"><?php the_field('featured_section_heading', 'option'); ?>
					</h2>
					<p class="section-description item-space">
						<?php the_field('featured_section_description', 'option'); ?>
					</p>
				</div>
			</div>
			<!-- Properties area -->

			<div class="row">
				<?php $our_feature_property_section = get_field('our_feature_property_section', 'option'); ?>
				<?php if ($our_feature_property_section) : ?>
					<?php foreach ($our_feature_property_section as $post) :  ?>
						<?php setup_postdata($post);
						$id = $post->ID;
						?>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xm-12 item-space">
							<div class="property-container">
								<div class="f-p-img position-relative" style="background-image:url('<?php echo get_the_post_thumbnail_url($id); ?>')">
									<space class="f-p-price position-absolute">
										$<?php the_field('price', $id); ?>
									</space>
								</div>
								<div class="f-p-content">
									<h2>
										<?php echo get_the_title($id); ?>
									</h2>
									<p>
										<?php echo wp_trim_words(get_the_excerpt($id), 22, '...') ?>
									</p>
									<div class="f-p-details d-flex justify-content-start item-space">
										<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/map.png'; ?>" />
										<span class="f-p-item"><?php the_field('address', $id); ?></span>
									</div>
									<hr>
									<div class="d-flex justify-content-between flex-wrap flex-row item-space">
										<div class="f-p-details">
											<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bed.png'; ?>" />
											<span class="f-p-item"><?php the_field('bedrooms', $id); ?> Bedrooms</span>
										</div>
										<div class="f-p-details">
											<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bath.png'; ?>" />
											<span class="f-p-item"><?php the_field('bath', $id); ?> Bath</span>
										</div>
										<div class="f-p-details">
											<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/area.png'; ?>" />
											<span class="f-p-item"><?php the_field('property_size', $id); ?> mq</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

			</div>

			<!-- Properties area -->
			<div class="row">
				<div class="col-lg-12 text-center item-space">
					<?php $button_for_featured_property = get_field('button_for_featured_property', 'option'); ?>
					<?php if ($button_for_featured_property) : ?>
						<a href="<?php echo esc_url($button_for_featured_property['url']); ?>" class="btn-global" target="<?php echo esc_attr($button_for_featured_property['target']); ?>"><?php echo esc_html($button_for_featured_property['title']); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php
	$html = ob_get_clean();
	return $html;
}

function recommend_properties()
{
	ob_start();
?>
	<section class="section pb-0 recommend-p-section" id="recommend-p-section">
		<div class="container top-container">
			<div class="row">
				<div class="col-lg-6">
					<h2 class="section-heading text-left item-space">
						<?php the_field('recommended_section_heading', 'option'); ?>

					</h2>
					<p class="section-description">
						<?php the_field('recommended_section_description', 'option'); ?>

					</p>
				</div>
				<div class="col-lg-6 text-right my-auto">
					<?php $button_for_recommended_property = get_field('button_for_recommended_property', 'option'); ?>
					<?php if ($button_for_recommended_property) : ?>
						<a href="<?php echo esc_url($button_for_recommended_property['url']); ?>" class="btn-global my-auto" target="<?php echo esc_attr($button_for_recommended_property['target']); ?>"><?php echo esc_html($button_for_recommended_property['title']); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container-fluid bottom-container r-p-section section pb-0 mb-0 item-space" style="background-image: url('<?php echo img_dir_url(); ?>/slider-bg.png');">
			<?php $recommended_for_you_section_copy = get_field('recommended_for_you_section_copy', 'option'); ?>
			<?php if ($recommended_for_you_section_copy) :
				$count = count($recommended_for_you_section_copy);
				$int = 1;
			?>
				<div class="container">
					<div class="r-p-slider-container">
						<?php foreach ($recommended_for_you_section_copy as $post) :  ?>
							<?php setup_postdata($post);
							$id = $post->ID;

							?>
							<div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
										<div class="r-p-slider-content pt-2">
											<span class="count-slides ">
												<?php
												echo $count . '/' . $int++;
												?>
											</span>
											<h2 class="item-space">
												<?php echo get_the_title($id); ?>
											</h2>
											<span class="r-p-price item-space">$<?php the_field('price', $id); ?></span>
											<p class="item-space">
												<?php echo wp_trim_words(get_the_excerpt($id), 22, '...') ?>
											</p>
											<div class="f-p-details d-flex justify-content-start item-space">
												<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/mapW.png'; ?>" />
												<span class="f-p-item"><?php the_field('address', $id); ?></span>
											</div>
											<hr>
											<div class="d-flex justify-content-between flex-wrap flex-row item-space">
												<div class="f-p-details">
													<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bedW.png'; ?>" />
													<span class="f-p-item"><?php the_field('bedrooms', $id); ?> Bedrooms</span>
												</div>
												<div class="f-p-details">
													<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bathW.png'; ?>" />
													<span class="f-p-item"><?php the_field('bath', $id); ?> Bath</span>
												</div>
												<div class="f-p-details">
													<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/areaW.png'; ?>" />
													<span class="f-p-item"><?php the_field('property_size', $id); ?> mq</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
										<div class="r-p-slider-img" style="background-image:url('<?php echo get_the_post_thumbnail_url($id); ?>'); ">

										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php wp_reset_postdata(); ?>
				<style>
					.prev-arrow {
						background-image: url('<?php echo img_dir_url(); ?>/prev.png');
						background-size: contain;
						background-repeat: no-repeat;
						background-position: center;
						height: 40px;
						width: 40px;
						padding-right: 15px;

					}

					.next-arrow {
						background-image: url('<?php echo img_dir_url(); ?>/next.png');
						background-size: contain;
						background-repeat: no-repeat;
						background-position: center;
						height: 40px;
						width: 40px;
						margin-left: 65px;
					}
				</style>
			<?php endif; ?>
		</div>
	</section>
<?php
	$html = ob_get_clean();
	return $html;
}


function locations()
{
	ob_start(); ?>
	<?php $choose_locations_to_show = get_field('choose_locations_to_show', 'option'); ?>
	<?php if ($choose_locations_to_show) : ?>
		<?php $get_terms_args = array(
			'taxonomy' => 'location',
			'hide_empty' => 0,
			'include' => $choose_locations_to_show,
		); ?>
		<?php $terms = get_terms($get_terms_args); ?>
		<section class="section location-section">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-12">
						<h2 class="section-title text-center item-space">
							<?php the_field('section_title_locations', 'option'); ?>
						</h2>
						<p class="section-description text-center item-space">
							<?php the_field('section_description_locations', 'option'); ?>
						</p>
					</div>
				</div>
				<?php if ($terms) : ?>
					<div class="row item-space">
						<?php foreach ($terms as $term) : ?>
							<div class="col-lg-4 col-md-4 col-sm-2 col-xm-1">
								<?php
								$taxonomy_prefix = 'location';
								$term_id = $term->term_id;
								$term_id_prefixed = $taxonomy_prefix . '_' . $term_id;
								?>
								<a href="<?php echo esc_url(get_term_link($term)); ?>">
									<?php $location_featured_image = get_field('location_featured_image', $term_id_prefixed); ?>
									<?php if ($location_featured_image) : ?>
										<div class="location-bg-img item-space" style="background-image:url('<?php echo esc_url($location_featured_image['url']); ?>') ;">
											<div class="location-bg-img-overlay">
												<div class="location-content-container">
													<div class="d-flex flex-start justify-content-start">
														<span class="location-img"><img src="<?php echo img_dir_url() . '/mapW.png' ?>" /> </span>
														<span class="location-title"><?php echo esc_html($term->name); ?></span>
													</div>

													<?php
													if ($term->count > 0) {
													?>
														<div class="count-location-properties">
															<?php
															echo '(We have ' . $term->count . ' property)';
															?>
														</div>
													<?php
													}
													?>
												</div>
											</div>
										</div>
									<?php endif; ?>

								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php $button_for_locations = get_field('button_for_locations', 'option'); ?>
				<?php if ($button_for_locations) : ?>
					<div class="text-center">
						<a href="<?php echo esc_url($button_for_locations['url']); ?>" class="btn-global text-center mx-auto item-space" target="<?php echo esc_attr($button_for_locations['target']); ?>"><?php echo esc_html($button_for_locations['title']); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php
	endif; ?>
<?php
	$html =	ob_get_clean();
	return $html;
}

function agents()
{
	ob_start();
?>
	<section class="section agent-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-12">
					<h2 class="sectoin-title item-space">
						<?php the_field('agent_section_title', 'option'); ?>
					</h2>
					<p class="sectoin-description item-space">
						<?php the_field('agent_section_description', 'option'); ?>
					</p>
				</div>
			</div>
			<div class="row item-space">
				<?php $select_agents_to_show = get_field('select_agents_to_show', 'option'); ?>
				<?php if ($select_agents_to_show) : ?>
					<?php foreach ($select_agents_to_show as $post) :  ?>
						<?php setup_postdata($post); ?>
						<?php $agent_id = $post->ID; ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xm-12 agent-col agent-id-<?php echo $agent_id; ?>">
							<div class="agent-container">
								<img src="<?php echo get_the_post_thumbnail_url($agent_id) ?>" alt="Agent" class="agent-img" />
								<h3 class="agent-name"><?php echo get_the_title($agent_id); ?></h3>
								<p class="agent-desigation"><?php echo  get_field('designation', $agent_id); ?></p>
								<div class="agent-links">
									<?php if (have_rows('social_links')) : ?>
										<?php while (have_rows('social_links')) : the_row(); ?>
											<a href=" <?php the_sub_field('social_link'); ?>" target="_blank"><?php the_sub_field('icon'); ?></a>
										<?php endwhile; ?>
									<?php else : ?>
										<?php // no rows found 
										?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

			</div>
			<div class="row item-space">
				<div class="col-lg-12 text-center">
					<?php $agent_button = get_field('agent_button', 'option'); ?>
					<?php if ($agent_button) : ?>
						<a href="<?php echo esc_url($agent_button['url']); ?>" class="btn-global item-space" target="<?php echo esc_attr($agent_button['target']); ?>"><?php echo esc_html($agent_button['title']); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php
	$html = ob_get_clean();
	return $html;
}


function blog_posts()
{
	ob_start();
?>
	<section class="section ">
		<div class="container">
			<div class="row item-space">
				<div class="col-md-12 text-center">
					<h2 class="section-heading item-space">Our Latest Property News</h2>
					<p class="section-description item-space">There are many variations of passages of Lorem Ipsum available but the this in majority have suffered alteration in some</p>
				</div>
			</div>
			<div class="row item-space">
				<?php
				$args =    array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$loop = new WP_Query($args);
				if ($loop->have_posts()) {
					while ($loop->have_posts()) :
						$loop->the_post();
						$post_id = get_the_ID(); ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xm-12">
							<div class="blog-posts-container">
								<a href="<?php echo get_the_permalink($post_id); ?>">
									<div class="blog-post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url($post_id); ?>');">
										<span class="post-date">
											<?php echo get_the_date('j', $post_id); ?>
											<br>
											<?php echo get_the_date('M', $post_id); ?>
										</span>
									</div>
								</a>
								<div class="blog-post-content">
									<span>
										<?php $terms = get_the_terms($post_id, 'category');
										foreach ($terms as $term) {
											echo $term->name;
										}
										?>
									</span>
									<a href="<?php echo get_the_permalink($post_id); ?>">
										<h3>
											<?php echo get_the_title($post_id); ?>
										</h3>
									</a>
									<p>
										<?php echo wp_trim_words(get_the_excerpt($post_id), 15, '...'); ?>
									</p>
								</div>
							</div>
						</div>
				<?php
					endwhile;
					wp_reset_postdata();
				} else {
					echo "no posts found";
				}

				?>

			</div>
	</section>
<?php
	$html = ob_get_clean();
	return $html;
}






function blog_post_card_render($post_id)
{
	ob_start();
?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xm-12">
		<div class="blog-posts-container">
			<a href="<?php echo get_the_permalink($post_id); ?>">
				<div class="blog-post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url($post_id); ?>');">
					<span class="post-date">
						<?php echo get_the_date('j', $post_id); ?>
						<br>
						<?php echo get_the_date('M', $post_id); ?>
					</span>
				</div>
			</a>
			<div class="blog-post-content">
				<span>
					<?php $terms = get_the_terms($post_id, 'category');
					foreach ($terms as $term) {
						echo $term->name;
					}
					?>
				</span>
				<a href="<?php echo get_the_permalink($post_id); ?>">
					<h3>
						<?php echo get_the_title($post_id); ?>
					</h3>
				</a>
				<p>
					<?php echo wp_trim_words(get_the_excerpt($post_id), 15, '...'); ?>
				</p>
			</div>
		</div>
	</div>
<?php
	$html = ob_get_clean();
	return $html;
}


function property_card_render($proper_id)
{
	ob_start();
?>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xm-12 item-space">
		<div class="property-container">
			<div class="f-p-img position-relative" style="background-image:url('<?php echo get_the_post_thumbnail_url($proper_id); ?>')">
				<space class="f-p-price position-absolute">
					$<?php the_field('price', $proper_id); ?>
				</space>
			</div>
			<div class="f-p-content">
				<h2>
					<?php echo get_the_title($proper_id); ?>
				</h2>
				<p>
					<?php echo wp_trim_words(get_the_excerpt($proper_id), 22, '...') ?>
				</p>
				<div class="f-p-details d-flex justify-content-start item-space">
					<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/map.png'; ?>" />
					<span class="f-p-item"><?php the_field('address', $proper_id); ?></span>
				</div>
				<hr>
				<div class="d-flex justify-content-between flex-wrap flex-row item-space">
					<div class="f-p-details">
						<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bed.png'; ?>" />
						<span class="f-p-item"><?php the_field('bedrooms', $proper_id); ?> Bedrooms</span>
					</div>
					<div class="f-p-details">
						<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/bath.png'; ?>" />
						<span class="f-p-item"><?php the_field('bath', $proper_id); ?> Bath</span>
					</div>
					<div class="f-p-details">
						<img class="f-p-icon-img" src="<?php echo img_dir_url() . '/area.png'; ?>" />
						<span class="f-p-item"><?php the_field('property_size', $proper_id); ?> mq</span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	$html = ob_get_clean();
	return $html;
}


function post_per_page()
{
	$post_per_page = 6;
	return $post_per_page;
}
function pagination($the_query = null)
{
	ob_start();
?>
	<div class="row item-space">
		<div class="col-lg-12 mx-auto pagination-container">
			<div class="pagination">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				if (empty($the_query)) {
					global $wp_query;
					$the_query = $wp_query;
				}
				$big = 999999999; // need an unlikely integer
				echo paginate_links(array(
					'base' => str_replace($big, '%#%', get_pagenum_link($big)),
					'format' => '?paged=%#%',
					'current' => max(1, $paged),
					'total' => $the_query->max_num_pages,
					'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>',
					'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
  <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>',
					'show_all' => true,
				));
				$html = ob_get_clean();
				?>
			</div>
		</div>
	</div>

<?php
	return $html;
}


function hero_section($page_id)
{
	ob_start();
	if (is_archive()) {
		$post_type = get_post_type();
		$current_page_link = get_post_type_archive_link($post_type);
	} else {
		$current_title = get_the_title($page_id);
		$current_page_link = get_the_permalink($page_id);
	}

?>
	<div class="page-hero-section section" style="background-image:url('<?php echo img_dir_url(); ?>/hero-section.png') ;">
		<div class="container my-auto hero-section-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="d-flex justify-content-center align-items-center flex-column m-auto">
						<h1>

							<?php if (is_archive()) {
								post_type_archive_title();
							} else {
								echo $current_title;
							} ?>

						</h1>
						<div>
							<a href="<?php echo home_url(); ?>" class="breadcrumbs">Home</a> |
							<a href="<?php echo $current_page_link; ?>" class="curren-page">
								<?php if (is_archive()) {
									post_type_archive_title();
								} else {
									echo $current_title;
								} ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	return ob_get_clean();
}


function searchProperties()
{

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	ob_start();
	$property_type   = isset($_POST['property_type']) ? $_POST['property_type'] : null;
	$property_size   = isset($_POST['property_size']) ? $_POST['property_size'] : null;
	$property_location   = isset($_POST['property_location']) ? $_POST['property_location'] : null;
	$property_price   = isset($_POST['property_price']) ? $_POST['property_price'] : null;
	$property_bedrooms   = isset($_POST['property_bedrooms']) ? $_POST['property_bedrooms'] : null;
	$property_bath   = isset($_POST['property_bath']) ? $_POST['property_bath'] : null;


	// echo 'Type : ' . $property_type . '<br>';
	// echo 'Bath: ' . $property_bath . '<br>';
	// echo 'Location: ' . $property_location . '<br>';
	// echo 'Price: ' . $property_price . '<br>';
	// echo 'Bed : ' . $property_bedrooms . '<br>';
	// echo 'Size: '. $property_size . '<br>';

	// Tax Quries
	$args = array(
		'post_type' => 'property',
		'posts_per_page' => post_per_page(),
		'post_status' => 'publish',
		'order' => 'ASC',
		'paged' => $paged,
	);
	$meta_query = array();
	if (!empty($property_price)) {
		$meta_query[] = array(
			'key' => 'price',
			'value' => $property_price,
			'compare' => '<=',

		);
	}
	if (!empty($property_size)) {
		$meta_query[] = array(
			'key' => 'property_size',
			'value' => $property_size,
			'compare' => '=',

		);
	}
	if (!empty($property_bedrooms)) {
		$meta_query[] = array(
			'key' => 'bedrooms',
			'value' => $property_bedrooms,
			'compare' => '=',

		);
	}
	if (!empty($property_bath)) {
		$meta_query[] = array(
			'key' => 'bath',
			'value' => $property_bath,
			'compare' => '=',

		);
	}
	$tax_query = array();
	if (!empty($property_type)) {
		$tax_query[] = array(
			'taxonomy' => 'property_type',
			'field' => 'slug',
			'terms' => $property_type,
			'operator' => 'IN',

		);
	}
	if (!empty($property_location)) {
		$tax_query[] = array(
			'taxonomy' => 'location',
			'field' => 'slug',
			'terms' => $property_location,
			'operator' => 'IN',

		);
	}


	if (count($meta_query) > 0) {
		$meta_query['relation'] = 'AND';
	}
	if (!empty($meta_query)) {
		$args['meta_query'] = $meta_query;
	}
	if (count($tax_query) > 0) {
		$tax_query['relation'] = 'AND';
	}
	if (!empty($tax_query)) {
		$args['tax_query'] = $tax_query;
	}
	// Meta Quries





	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) :
		/* Start the Loop */
		while ($the_query->have_posts()) :
			$the_query->the_post();
			echo property_card_render(get_the_ID());

		endwhile;
		wp_reset_postdata();

		$pagination = pagination($the_query);
	endif;
	$html = ob_get_clean();
	$result = array(
		'items' => $html,
		'pagination' => $pagination,
	);
	wp_send_json_success($result);
}
add_action('wp_ajax_nopriv_searchProperties', 'searchProperties');
add_action('wp_ajax_searchProperties', 'searchProperties');
