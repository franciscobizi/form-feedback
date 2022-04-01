<?php

// handle ajax requests

use FBF\inc\FBF_Tables;

if(isset($_POST['fbf_type']) && $_POST['fbf_type'] == 'fbf_feedback'){

    check_ajax_referer( 'fbf-nonce-security', 'security' );

    if(empty($_POST['email']) || empty($_POST['fullname']) || empty($_POST['phone'])){
        wp_send_json_success( array( 
            'success' => false, 
            'message' => 'All fieds are required',
        ), 200 );
    }

    $res = FBF_Tables::insert([
        'name' => sanitize_text_field($_POST['fullname']),
        'email' => sanitize_text_field($_POST['email']),
        'phone' => sanitize_text_field($_POST['phone']),
    ]);

    if(is_numeric($res)){
        wp_send_json_success( array( 
            'success' => true, 
            'message' => 'Submitted successful!',
        ), 200 );
    }

    wp_send_json_success( array( 
        'success' => false, 
        'message' => 'Something gone wrong!',
    ), 200 );

}