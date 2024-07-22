<?php
// Removed the unnecessary use statement
// use function PHPSTORM_META\map;

// Register the shortcode
add_shortcode('contact', 'show_contact_form');

// Register the REST API endpoint
add_action('rest_api_init', 'create_rest_endpoint');

// Function to display the contact form
function show_contact_form()
{
    // Ensure MY_PLUGIN_PATH is defined and points to the correct path
    if (defined('MY_PLUGIN_PATH')) {
        include MY_PLUGIN_PATH . '/inc/templates/contact-form.php';
    } else {
        // Handle the error case where MY_PLUGIN_PATH is not defined
        echo 'Contact form template path not found.';
    }
}

// Function to create the REST API endpoint
function create_rest_endpoint()
{
    register_rest_route('myplugin/v1', '/contact-form/submit', [
        'methods' => 'POST', // Corrected 'method' to 'methods'
        'callback' => 'handle_enquiry',
        'permission_callback' => '__return_true', // Added permission callback for security
    ]);
}

// Function to handle the form submission
function handle_enquiry(WP_REST_Request $request)
{
    // Handle the enquiry logic here
    // You can retrieve POST parameters like this:
    // $name = $request->get_param('name');
    // $email = $request->get_param('email');
    // etc.

    // For now, just echo a response
    return new WP_REST_Response('Hello', 200); // Use WP_REST_Response for proper API response
}
