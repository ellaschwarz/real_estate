<?php
//	
// The Template to render the search form for properties, only when WP Property Listings Plugin is Active.
// This template will not be included when the plugin is not active.
//	
?>


<div id="property-search-form-child" class="container">
<div class="psf-inner">	
<form method="get" id="property-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="property">
    <fieldset>
    <input type="text" value="<?php echo (isset($_GET['name'])) ? $_GET['name'] : ''?>" placeholder="<?php _e( 'Property Address', 'wp-real-estate' ); ?>" name="name" id="name" />
    </fieldset>
    <fieldset>
    <input type="text" value="<?php echo (isset($_GET['area'])) ? $_GET['area'] : ''?>" placeholder="<?php _e( 'Property Area', 'wp-real-estate' ); ?>" name="area" id="area" />
    </fieldset>

	<fieldset>
	<label for="listing_type" class=""><?php _e( 'Option: ', 'wp-real-estate' ); ?></label>
    <select name="listing_type" id="listing_type">
    <?php 
      $terms = get_terms( array(
        'taxonomy' => 'post_tag',
        'hide_empty' => false,
    ) );
        if(!empty($terms ) && !is_wp_error($terms)){
            foreach($terms as $term){?>
                <option <?php echo (isset($_GET['listing_type']) && $_GET['listing_type'] == $term->name) ? 'selected' : ''?> value="<?php echo $term->slug ?>"><?php _e( $term->name , 'wp-real-estate' ); ?></option>
            <?php 
            }
        }
    ?>
    </select>
	</fieldset>

	<fieldset>
    <label for="minbed" class=""><?php _e( 'Bedrooms (Min): ', 'wp-real-estate' ); ?></label>
    <select name="minbed" id="minbed">
        <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '1') ? 'selected' : ''?> value="1"><?php _e( '1', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '2') ? 'selected' : ''?> value="2"><?php _e( '2', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '3') ? 'selected' : ''?> value="3"><?php _e( '3', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '4') ? 'selected' : ''?> value="4"><?php _e( '4', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '5') ? 'selected' : ''?> value="5"><?php _e( '5', 'wp-real-estate' ); ?></option>
		<option <?php echo (isset($_GET['minbed']) && $_GET['minbed'] == '6') ? 'selected' : ''?> value="6"><?php _e( '6', 'wp-real-estate' ); ?></option>
    </select>
    </fieldset>
    <fieldset>
    <label for="maxbed" class=""><?php _e( 'Bedrooms (Max): ', 'wp-real-estate' ); ?></label>
    <select name="maxbed" id="maxbed">
        <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '1') ? 'selected' : ''?> value="1"><?php _e( '1', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '2') ? 'selected' : ''?> value="2"><?php _e( '2', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '3') ? 'selected' : ''?> value="3"><?php _e( '3', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '4') ? 'selected' : ''?> value="4"><?php _e( '4', 'wp-real-estate' ); ?></option>
        <option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '5') ? 'selected' : ''?> value="5"><?php _e( '5', 'wp-real-estate' ); ?></option>
		<option <?php echo (isset($_GET['maxbed']) && $_GET['maxbed'] == '6') ? 'selected' : ''?> value="6"><?php _e( '6', 'wp-real-estate' ); ?></option>
    </select>
	</fieldset>

    <fieldset>
    <label for="mincost" class=""><?php _e( 'Price (Min) : ', 'wp-real-estate' ); ?></label>
    <input type="number" step="0.1" value="<?php echo (isset($_GET['mincost'])) ? $_GET['mincost'] : ''?>" placeholder="<?php _e( '240000 (no symbols)', 'wp-real-estate' ); ?>" name="mincost" id="mincost" />
    </fieldset>

    <fieldset>
    <label for="maxcost" class=""><?php _e( 'Price (Max) : ', 'wp-real-estate' ); ?></label>
    <input type="number" step="0.1" value="<?php echo (isset($_GET['maxcost'])) ? $_GET['maxcost'] : ''?>" placeholder="<?php _e( '240000 (no symbols)', 'wp-real-estate' ); ?>" name="maxcost" id="maxcost" />
    </fieldset>

    <fieldset>
    <input type="submit" id="searchsubmit" value="Search!" />
    </fieldset>
</form>
</div>
</div> 