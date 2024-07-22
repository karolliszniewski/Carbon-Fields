<form id="enquiry_form">
    <label>Name:</label>
    <input type="text" name="name"><br /><br />
    <label>Email:</label>
    <input type="text" name="email"><br /><br />
    <label>Phone:</label>
    <input type="text" name="phone"><br /><br />
    <input style="display:inline-block;background:white;border:1px solid black;padding:0.5rem;" type="submit" value="submit">
</form>


<?php
function enqueue_custom_scripts()
{

    echo '<script>
    jQuery(document).ready(function($) {
        $("#enquiry_form").submit(function(event) { // Changed selector to ID selector
            event.preventDefault(); // Prevent the default form submission
            alert("test");
        });
    });
</script>';
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
