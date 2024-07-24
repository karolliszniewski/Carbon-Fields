<?php

add_shortcode('contact', 'show_contact_form');


add_action('rest_api_init', 'create_rest_endpoint');

// Function to display the contact form
function show_contact_form()
{
    if (defined('MY_PLUGIN_PATH')) {
        include MY_PLUGIN_PATH . '/inc/templates/contact-form.php';
    } else {
        echo 'Contact form template path not found.';
    }
}

// Function to create the REST API endpoint
function create_rest_endpoint()
{
    register_rest_route('v1/contact-form', 'submit', [
        'methods' => 'POST',
        'callback' => 'handle_enquiry',
    ]);
}

function handle_enquiry(WP_REST_Request $request)
{
    print_r($request);
}
