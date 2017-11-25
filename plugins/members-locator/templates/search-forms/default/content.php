<?php
/**
 * Members Locator "default" search form template file. 
 * 
 * The information on this file outputs the search form.
 * 
 * You can modify this file to apply custom changes. However, it is not recomended
 * since your changes will be overridden on the next update of the plugin.
 * 
 * Instead you can copy-paste this template ( the "default" folder contains this file 
 * and the "css" folder ) into the theme's or child theme's folder of your site 
 * and apply your changes from there. 
 * 
 * The template folder will need to be placed under:
 * your-theme's-or-child-theme's-folder/geo-my-wp/members-locator/search-forms/
 * 
 * Once the template folder is in the theme's folder you will be able to select 
 * it in the form editor. It will show in the "Search form" dropdown menu as "Custom: default".
 *
 * @param $gmw_form ( object ) the entire form object
 * @param $gmw      ( array )  the form settings and values only
 * 
 * @author Eyal Fitoussi
 * 
 */
?>
<?php do_action( 'gmw_before_search_form_template', $gmw ); ?>

<div class="gmw-form-wrapper default gmw-fl-default-form-wrapper <?php echo $gmw['ID']; ?> <?php echo $gmw['prefix']; ?>">

	<?php do_action( 'gmw_before_search_form', $gmw ); ?>

    <form class="standard-form gmw-form" data-form_id="<?php echo $gmw['ID']; ?>" name="gmw_form" action="<?php echo $gmw_form->get_results_page(); ?>" method="get">

        <?php do_action( 'gmw_search_form_start', $gmw ); ?>

        <?php gmw_fl_xprofile_fields( $gmw ); ?>

        <?php do_action( 'gmw_search_form_before_address', $gmw ); ?>

		<?php gmw_search_form_address_field( $gmw ); ?>
	
		<?php do_action( 'gmw_search_form_before_locator', $gmw ); ?>
		
        <?php gmw_search_form_locator_button( $gmw ); ?>

        <?php do_action( 'gmw_search_form_before_distance', $gmw ); ?>

        <div class="gmw-unit-distance-wrapper">
            
            <div class="gmw-radius-dropdown-wrapper">
            	<!--distance values -->
            	<?php gmw_search_form_radius( $gmw ); ?>
            </div>
            
            <div class="gmw-units-dropdown-wrapper">
            	<!--distance units-->
            	<?php gmw_search_form_units( $gmw ); ?>
            </div>	
        </div>

        <?php gmw_form_submit_fields( $gmw, false ); ?>

        <?php do_action( 'gmw_search_form_end', $gmw ); ?>

   </form>
	
	<?php do_action( 'gmw_after_search_form', $gmw ); ?>
	
</div><!--form wrapper -->	

<?php do_action( 'gmw_after_search_form_template', $gmw ); ?>