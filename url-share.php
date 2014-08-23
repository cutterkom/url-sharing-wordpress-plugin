<?
/*
Plugin Name: URL Sharing
Description: Easy sharing of the URL posts with a textfield
Version: 1.0
Author: Katharina Brunner
Author URI: http://www.katharinabrunner.de/
Plugin URI: http://www.katharinabrunner.de/url-share-wordpress-plugin
License: GPL2

Copyright 2014  Katharina Brunner  (email : mail@katharina-brunner.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

Contents: 
- Stylesheet
- Settings Page 
- URL Sharing 
*/



// Add Stylesheet
add_action( 'wp_enqueue_scripts', 'url_sharing_style' );
function url_sharing_style() {
    wp_enqueue_style( 'url_sharing_css', plugins_url('style.css', __FILE__), '', 1.0 );
}


// Add Settings Page for WordPress Backend

class url_sharing_SettingsPage
{ 
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_url_sharing_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_url_sharing_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'URL Sharing', 
            'manage_options', 
            'url-share-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'url_sharing_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>URL Sharing Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'url_sharing_option_group' );   
                do_settings_sections( 'url-share-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'url_sharing_option_group', // Option group
            'url_sharing_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Change Label', // label
            array( $this, 'print_section_info' ), // Callback
            'url-share-setting-admin' // Page
        );      

        add_settings_field(
            'label', 
            'Label', 
            array( $this, 'label_callback' ), 
            'url-share-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['label'] ) )
            $new_input['label'] = sanitize_text_field( $input['label'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Change the label before the URL Sharing field.';
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function label_callback()
    {
        printf(
            '<input type="text" id="label" name="url_sharing_option_name[label]" value="" />',
            isset( $this->options['label'] ) ? esc_attr( $this->options['label']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new url_sharing_SettingsPage();

// Add URL Share field 
function url_sharing($content) {     

    if ( is_singular('post') ) {
        $options_url_sharing = get_option('url_sharing_option_name'); 

        $content .= "<div class='url_sharing'><label class='url_sharing_label'>" . $options_url_sharing['label'] . " </label><input class='url_sharing_input' type='text' value='" . get_permalink() . " '></div>";
    }
        return $content;
}
add_filter('the_content', 'url_sharing', 20);
?>