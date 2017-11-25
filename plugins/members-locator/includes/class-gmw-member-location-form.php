<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * GMW_FL_Location_Form Class extends GMW_Location_Form class
 *
 * Location form for Location tab of BuddyPress member's profile page.
 *
 * @since 3.0
 * 
 */
class GMW_Member_Location_Form extends GMW_Location_Form {

    /**
     * Run the form class
     * 
     * @param array $attr [description]
     */
    public function __construct( $attr = array() ) {

        parent::__construct( $attr );

        // add custom tab panels
        add_action( 'gmw_lf_content_end',  array( $this, 'create_tabs_panels' ) ); 
    }

    /**
     * Additional custom form tabs
     *     
     * @return array
     */
    public function form_tabs() {
        
        $tabs = parent::form_tabs();

        return apply_filters( 'gmw_member_location_form_tabs', $tabs );
    }

    /**
     * Additional form fields
     * 
     * @return array
     */
    public function form_fields() {

        // retreive parent fields
        $fields = parent::form_fields();

        return apply_filters( 'gmw_member_location_tab_fields', $fields );
    }

    /**
     * Generate custom tabs panels
     * 
     * @return void
     */
    public function create_tabs_panels() {
        
        do_action( 'gmw_member_location_tabs_panels', $this );
    }
}

global $bp;

// form args
$form_args = apply_filters( 'gmw_member_location_form_args', array(
    'slug'           => 'members_locator',
    'object_type'    => 'user',
    'object_id'      => $bp->displayed_user->id,
    'form_template'  => 'location-form-tabs-left',
    'submit_enabled' => 1,
    'stand_alone'    => 1,
    'ajax_enabled'   => 1,
    'auto_confirm'   => 1
), $bp->displayed_user->id, $this );
    
// generate new location form
$location_form = new GMW_Member_Location_Form( $form_args );

// display the location form
$location_form->display_form();      
?>