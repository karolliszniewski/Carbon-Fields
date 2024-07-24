<form id="enquiry_form">
    <?php wp_nonce_field('wp_rest') ?>

    <label>Name:</label>
    <input type="text" name="name"><br /><br />
    <label>Email:</label>
    <input type="text" name="email"><br /><br />
    <label>Phone:</label>
    <input type="text" name="phone"><br /><br />
    <input style="display:inline-block;background:white;border:1px solid black;padding:0.5rem;" type="submit" value="submit">
</form>


<script>
    jQuery(document).ready(function($) {
        $("#enquiry_form").submit(function(event) { // Changed selector to ID selector
            event.preventDefault(); // Prevent the default form submission
            let form = $(this);
            $.ajax({
                type: "POST",
                url: "<?= get_rest_url(null, "v1/contact-form/submit") ?>",
                data: form.serialize()
            })
        });
    });
</script>


<?php
function enqueue_custom_scripts()
{
?>
    <script>
        jQuery(document).ready(function($) {
            $("#enquiry_form").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                let form = $(this);
                $.ajax({
                    type: "POST",
                    url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                    data: form.serialize()
                });
            });
        });
    </script>
<?php
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
