<?php

/**
 * Plugin Name: Sample Quilt Plugin
 * Plugin URI: --
 * Description: Shows cases how to build settings using Quilt & Lumber
 * Version: 1.0.0
 * Author: Zane Matthew Kolnik
 * Author URI: http://zanematthew.com/
 * License: GPL V2 or Later
 */



// Include the files
require plugin_dir_path( __FILE__ ) . 'lib/lumber/lumber.php';
require plugin_dir_path( __FILE__ ) . 'lib/quilt/quilt.php';


define( 'MY_SAMPLE_NAMESPACE', 'quilt_plugin' );

function quilt_plugin_init(){

    // Create settings
    $settings = array(
        'default_field_types' => array(
            'title' => 'Default Fields Types',
            'fields' => array(
                array(
                    'title' => 'Sample Text',
                    'type' => 'text'
                    ),
                array(
                    'title' => 'Sample FancyText',
                    'type' => 'fancyText',
                    'desc' => 'Any "fancy" field type has a description with it.'
                    ),
                array(
                    'title' => 'Sample Email',
                    'type' => 'email',
                    'desc' => 'Only allow a single email.',
                    'std' => get_option( 'admin_email' )
                    ),
                array(
                    'title' => 'Sample Number',
                    'type' => 'number',
                    'desc' => 'Only allow a single number, also shows usage of placeholder.',
                    'placeholder' => 'Enter a number'
                    ),
                array(
                    'title' => 'Sample Hidden',
                    'type' => 'hidden',
                    'desc' => 'Yes, its hidden, sometimes this is good for passing values between JS.'
                    ),
                array(
                    'title' => 'Sample URL',
                    'type' => 'url',
                    'desc' => 'Only a valid URL.'
                    ),
                array(
                    'title' => 'Sample Button',
                    'type' => 'button',
                    'desc' => 'A button.',
                    'std' => 'Button'
                    ),
                array(
                    'title' => 'Sample TextDisabled',
                    'type' => 'textDisabled',
                    'desc' => 'This text is disabled.',
                    'std' => 'You cannot edit this.'
                    ),
                array(
                    'title' => 'Sample Checkbox',
                    'type' => 'checkbox',
                    'desc' => ''
                    ),
                array(
                    'title' => 'Sample Group of Checkboxes',
                    'type' => 'checkboxes',
                    'desc' => 'Choose a transportation type.',
                    'options' => array(
                        'car' => 'Car',
                        'bike' => 'Bike'
                        )
                    ),
                array(
                    'title' => 'Sample Radio',
                    'type' => 'radio',
                    'desc' => 'Yes, or no.',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                        )
                    ),
                array(
                    'title' => 'Sample Select',
                    'type' => 'select',
                    'options' => array(
                        'maybe' => 'Maybe',
                        'yes' => 'Yes',
                        'no' => 'No'
                        )
                    ),
                array(
                    'title' => 'Sample FancySelect',
                    'type' => 'fancySelect',
                    'desc' => 'Which one?',
                    'options' => array(
                        'maybe' => 'Maybe',
                        'yes' => 'Yes',
                        'no' => 'No'
                        )
                    ),
                array(
                    'title' => 'Sample Multiselect',
                    'type' => 'multiselect',
                    'desc' => 'A multi-select',
                    'options' => array(
                        'maybe' => 'Maybe',
                        'yes' => 'Yes',
                        'no' => 'No'
                        )
                    ),
                array(
                    'title' => 'Sample UsStateSelect',
                    'type' => 'usStateSelect',
                    'desc' => 'No options are needed.'
                    ),
                array(
                    'title' => 'Sample MexicoStateSelect',
                    'type' => 'mexicoStateSelect',
                    'desc' => 'No options are needed.'
                    ),
                array(
                    'title' => 'Sample CanadaStateSelect',
                    'type' => 'canadaStateSelect',
                    'desc' => 'No options are needed.'
                    ),
                array(
                    'title' => 'Sample Textarea',
                    'type' => 'textarea'
                    ),
                array(
                    'title' => 'Sample CSS',
                    'type' => 'css',
                    'desc' => 'Allow for only CSS (sanitized with wp_kses).'
                    ),
                array(
                    'title' => 'Sample Emails',
                    'type' => 'emails',
                    'desc' => 'Allow for only emails. Enter each email on a new line.',
                    'placeholder' => 'Enter each email on a new line.'
                    ),
                array(
                    'title' => 'Sample Ips',
                    'type' => 'ips',
                    'desc' => 'Allow for only emails. Enter each email on a new line.',
                    'placeholder' => 'Enter each email on a new line.'
                    ),
                array(
                    'title' => 'Sample Upload',
                    'type' => 'upload',
                    'desc' => 'A WordPress upload field'
                    ),
                array(
                    'title' => 'Sample HTML',
                    'type' => 'html',
                    'desc' => 'Any HTML you want',
                    'std' => '<div>This is my <strong>custom</strong> HTML.</div>'
                    ),
                array(
                    'title' => 'Sample Thickbox',
                    'type' => 'thickbox',
                    'desc' => 'Yes, a thickbox. Via WordPress native Thickbox. Currently ONLY supports iFrame.',
                    'std' => 'http://zanematthew.com/',
                    'placeholder' => 'View Entries'
                    ),
                array(
                    'title' => 'Sample Touchtime',
                    'type' => 'touchtime',
                    'desc' => 'Another built in WordPress type.'
                    ),
                array(
                    'title' => 'Sample RoleToPage',
                    'type' => 'roleToPage',
                    'desc' => '',
                    'options' => array(
                        'administrator' => 'Administrator',
                        'editor' => 'Editor',
                        'author' => 'Author',
                        'contributor' => 'Contributor',
                        'subscriber' => 'Subscriber'
                        )
                    )
                )
        )
    );


    // Instantiate the class
    $quilt_plugin = new Quilt(
        MY_SAMPLE_NAMESPACE,
        $settings,
        'plugin'
    );

    // Set our global used to retrieve settings
    global $quilt_plugin_settings;

    // Assign the option. This allows us to use the standard option
    // values WITHOUT having to set any options in the database.
    $quilt_plugin_settings = $quilt_plugin->getSaneOptions();

}
add_action( 'init', 'quilt_plugin_init' );


function quilt_change_footer( $text ){

    $footer = sprintf( '%s. <a href="%s">%s</a> | <a href="%s">%s</a> | <a href="%s">%s</a>',
        'Quilt & Lumber',
        esc_url( 'https://github.com/zanematthew/quilt/blob/master/README.md' ),
        'About',
        esc_url( 'https://github.com/zanematthew/quilt/issues' ),
        'Contribute',
        esc_url( 'https://github.com/zanematthew/quilt' ),
        'Repo'
    );

    return $footer;

}
add_filter( 'quilt_quilt_plugin_footer', 'quilt_change_footer' );


function quilt_below_title( $text ){
    return 'Thanks';
}
add_filter( 'quilt_quilt_plugin_below_title', 'quilt_below_title' );