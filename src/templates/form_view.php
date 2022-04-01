<?php $nonce = wp_create_nonce( "fbf-nonce-security" );?>
<div class="fbf-form-container">
    <form id="fbfFeedback" method="POST">
        <input type="hidden" name="action" value="fbf_requests">
        <input type="hidden" name="fbf_type" value="fbf_feedback">
        <input type="hidden" name="security" value="<?php echo $nonce;?>">
        <label for="fullname">Full name:</label>
        <input type="text" name="fullname" required>
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>
        <button>Submit</button>
    </form>
</div>