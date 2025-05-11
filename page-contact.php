<?php
/* Template Name: Contact Page */
get_header(); ?>

<div class="container my-5">
    <h2>Contact Us</h2>
    <form id="contact-form" class="w-50">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
        <div id="form-response" class="mt-3"></div>
    </form>
</div>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    var data = new FormData();
    data.append('action', 'handle_contact_form');
    data.append('name', document.getElementById('name').value);
    data.append('email', document.getElementById('email').value);
    data.append('message', document.getElementById('message').value);

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: data
    })
    .then(res => res.text())
    .then(response => {
        document.getElementById('form-response').innerHTML = '<div class="alert alert-success">' + response + '</div>';
        document.getElementById('contact-form').reset();
    });
});
</script>

<?php get_footer(); ?>
