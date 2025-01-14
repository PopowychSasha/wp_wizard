<?php

if (!function_exists('r_handle_wizard_submission')) {
    function r_handle_wizard_submission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $phone = sanitize_text_field($_POST['phone']);
            $quantity = intval($_POST['quantity']);

            if (empty($name) || empty($phone) || $quantity <= 0) {
                wp_die('Please fill in all fields correctly.');
                return;
            }

            if (!is_email($email)) {
                wp_die('Invalid email address.');
            }
            
            $subject = 'Form Submission';

            $message = "Hello $name,\n\n";
            $message .= "You have received the following details:\n\n";
            $message .= "--------------------------------------\n";
            $message .= "Name:       $name\n";
            $message .= "Email:      $email\n";
            $message .= "Phone:      $phone\n";
            $message .= "Quantity:   $quantity\n";
            $message .= "--------------------------------------\n\n";
            $message .= "We will get back to you shortly.\n\n";
            $message .= "Best regards,\n";
            $message .= "The Support Team";

            $headers = array(
                'Content-Type: text/plain; charset=UTF-8',
                'From: wb-wizard.site',
                'Reply-To: ' . $email,
            );

            $sent = wp_mail($email, $subject, $message, $headers);

            if ($sent) {
                wp_redirect(home_url('/')); 
                exit;
            } else {
                error_log('Email failed to send.');
                wp_die('Failed to send email. Please try again.');
            }
        }
    }
}
