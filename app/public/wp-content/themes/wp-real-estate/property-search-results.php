<?php
/**
 * The template for displaying search results, when the search if performed using the Advanced Search Option.
 * This template has been provided to work with WP Property Listings Plugin.
 * This file will not be executed if the Required plugin is not active.
 * (c) Rohit Tripathi 2017
 *
 * @package wpre
 */

$_name = $_GET['name'] != '' ? esc_html($_GET['name']) : '';
$_bed = $_GET['bed'] != '' ? esc_html($_GET['bed']) : '1';
$_cmax = $_GET['cost'] != '' ? esc_html($_GET['cost']) : '99999999999';
$_type = $_GET['listing_type'] != '' ? esc_html($_GET['listing_type']) : '';

echo $_name;
echo $_type;
echo $_bed;
echo $_cmax;

get_header();?>

	<div id="primary" class="content-area <?php apply_filters('wpre_primary-width', 'wpre_primary_class')?>">
		<main id="main" class="site-main" role="main">

		<?php
$p_args = array(
    'post_type' => 'objects', // your CPT
    's' => $_name, // looks into everything with the keyword from your 'name field'
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'rooms',
            'value' => $_bed,
            'type' => 'NUMERIC',
            'compare' => '>=',
        ),
        array(
            'key' => 'price',
            'value' => $_cmax,
            'type' => 'NUMERIC',
            'compare' => '<=',
        ),
    ),
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $_type,
            'include_children' => true,
            'operator' => 'IN',
        ),
    ),
);
var_dump($p_args);
$propSearchQuery = new WP_Query($p_args);

?>

		<?php if ($propSearchQuery->have_posts()): ?>

			<header class="page-header">
				<h1 class="page-title"><?php _e('Search Results', 'wp-real-estate');?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */?>
			<?php while ($propSearchQuery->have_posts()): $propSearchQuery->the_post();?>

					<?php
    /**
     * Run the loop for the search to output the results.
     */
    get_template_part('framework/layouts/content', 'wp-real-estate');
    ?>

				<?php endwhile;?>

			<?php wpre_pagination();?>

		<?php else: ?>

			<?php _e('No Properties were found with specified parameters. Please search using different parameters.', 'wp-real-estate')?>

		<?php endif;?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar();?>
<?php get_footer();?>