<?php
function twentytwentythree_child_enqueue_styles() {
    wp_enqueue_style( 'twentytwentythree-style', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'twentytwentythree-child-style', 
        get_stylesheet_directory_uri() . '/style.scss', 
        array( 'twentytwentythree-style' ) 
    );

    wp_enqueue_style( 'bootstrap', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', 
        array(), 
        '5.3.0', 
        'all' 
    );

    wp_enqueue_style( 'inter-font', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap', 
        array(), 
        null 
    );

    wp_enqueue_style( 'bootstrap-icons', 
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css', 
        array(), 
        '1.11.3', 
        'all' 
    );
}

add_action( 'wp_enqueue_scripts', 'twentytwentythree_child_enqueue_styles' );

function r_handle_wizard_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $quantity = intval($_POST['quantity']);

        if (!is_email($email)) {
            wp_die('Invalid email address.');
        }

        $message = "Hello Sasha,\n\n";
        $message .= "Thank you for your request. Here are the details you provided:\n";
        $message .= "Name: Sasha\n";
        $message .= "Email: sashapopovych2003@gmail.com\n";
        $message .= "Phone: +380969943318\n";
        $message .= "Quantity: 1000\n";

        $subject = 'Your Form Submission';

        $sent = wp_mail('sashapopovych2003@gmail.com', $subject, $message);

        if ($sent) {
            wp_redirect(home_url('/thank-you')); 
        } else {
            wp_die('Failed to send email. Please try again.');
        }

        exit;
    }
}

function r_test_wizard_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'title' => 'Test Work',
        ),
        $atts,
        'r_test'
    );

    $output = '
        <div class="container">
            <div class="row" style="display: grid; grid-template-columns: 1fr; gap: 54px;">
                <div class="bg-secondary rounded col-10 mx-auto py-5">
                    <form id="wizard-form" class="col-12 mx-auto" style="max-width: 70%;" method="POST" action="' . esc_url(admin_url('admin-post.php?action=send_email')) . '">                        
                        <div id="breadcrumbs" class="mb-5 bg-white">
                            <span>
                                <i class="bi bi-house-door-fill fs-6"></i>
                            </span>
                            <span id="step-1-breadcrumb" class="breadcrumb-item active">Contact Info</span>
                            <span id="step-2-breadcrumb" class="breadcrumb-item">Quantity</span>
                            <span id="step-3-breadcrumb" class="breadcrumb-item">Price</span>
                            <span id="step-4-breadcrumb" class="breadcrumb-item">Done</span>
                        </div>

                        <div id="form-step-1">
                            <h2 class="display-5 fw-bold">Contact Info</h2>
                            <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                <label for="name" class="col-3 text-end">Name <span class="required-message">required</span></label>
                                <div class="col-8">
                                    <input type="text" id="name" name="name" class="form-control" required> 
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                <label for="email" class="col-3 text-end">Email <span class="required-message">required</span></label>
                                <div class="col-8">
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                <label for="phone" class="col-3 text-end">Phone <span class="required-message">required</span></label>
                                <div class="col-8">
                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <button type="button" id="next-btn-1" class="btn btn-primary px-3 py-2">Continue</button>
                        </div>

                        <div id="form-step-2" style="display: none;">
                            <h2 class="display-5 fw-bold">Quantity</h2>
                            <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                <label for="quantity" class="col-3 text-end">Quantity <span class="required-message">required</span></label>
                                <div class="col-8">
                                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                                </div>
                            </div>
                            <button type="button" id="next-btn-2" class="btn btn-primary">Continue</button>
                            <button type="button" id="prev-btn-2" class="btn btn-light" style="display: none;">
                                <i class="bi bi-arrow-left"></i>Back
                            </button>
                        </div>

                        <div id="form-step-3" style="display: none;">
                            <h2 class="display-5 fw-bold" for="price">Price <span class="required-message">required</span></h2>
                            <h1 class="display-1 fw-bold" id="price"></h1>
                            <button type="submit" id="next-btn-3" class="btn btn-primary">Send to Email</button>
                            <button type="button" id="prev-btn-3" class="btn btn-light" style="display: none;">
                                <i class="bi bi-arrow-left"></i>Back
                            </button>
                        </div>

                        <div id="form-step-4" style="display: none;">
                            <h2 class="display-5 fw-bold">Done</h2>
                            <p>Your email was sent successfully</p>
                            <button type="button" id="start-again-btn" class="btn btn-primary">Start again</button>
                        </div>
                    </form>
                </div>

                <div class="col-10 mx-auto">
                    <div class="col-12 mx-auto" style="max-width: 70%;">
                        <h2>' . esc_html($atts['title']) . '</h2>
                        <p>' . $content . '</p>
                    </div>
                </div>
            </div>

        <script>
            function validateForm(formId) {
                let isValid = true;
                const form = document.getElementById(formId);
                const inputs = form.querySelectorAll("input[required], textarea[required]");

                inputs.forEach(function(input) {
                    const label = form.querySelector(`label[for="${input.id}"]`); 

                    const errorSpan = label.querySelector(".required-message"); 

                    if (!input.value.trim()) {
                        errorSpan.style.display = "inline";
                        isValid = false;
                    } else {
                        errorSpan.style.display = "none"; 
                    }
                });

                return isValid;
            }
            
            function calculatePrice(quantity) {
                if (quantity >= 1 && quantity <= 10) {
                    return "$10";
                } else if (quantity >= 11 && quantity <= 100) {
                    return "$100";
                } else if (quantity >= 101 && quantity <= 1000) {
                    return "$1000";
                } else  {
                    return "Invalid quantity";
                }
            }

            document.getElementById("next-btn-1").addEventListener("click", function() {
                if (validateForm("form-step-1")) {
                    document.getElementById("form-step-1").style.display = "none";
                    document.getElementById("form-step-2").style.display = "block";
                    document.getElementById("step-1-breadcrumb").classList.remove("active");
                    document.getElementById("step-2-breadcrumb").classList.add("active");
                    document.getElementById("prev-btn-2").style.display = "inline-block";
                }
            });

            document.getElementById("prev-btn-2").addEventListener("click", function() {
                document.getElementById("form-step-2").style.display = "none";
                document.getElementById("form-step-1").style.display = "block";
                document.getElementById("step-1-breadcrumb").classList.add("active");
                document.getElementById("step-2-breadcrumb").classList.remove("active");
                this.style.display = "none";
            });

            document.getElementById("next-btn-2").addEventListener("click", function() {
                if (validateForm("form-step-2")) {
                    const quantity = parseInt(document.getElementById("quantity").value, 10);
                    const price = calculatePrice(quantity);
                    document.getElementById("price").textContent = price;

                    document.getElementById("form-step-2").style.display = "none";
                    document.getElementById("form-step-3").style.display = "block";
                    document.getElementById("step-2-breadcrumb").classList.remove("active");
                    document.getElementById("step-3-breadcrumb").classList.add("active");
                    document.getElementById("prev-btn-3").style.display = "inline-block";
                }
            });

            document.getElementById("prev-btn-3").addEventListener("click", function() {
                document.getElementById("form-step-3").style.display = "none";
                document.getElementById("form-step-2").style.display = "block";
                document.getElementById("step-2-breadcrumb").classList.add("active");
                document.getElementById("step-3-breadcrumb").classList.remove("active");
                this.style.display = "none";
            });

            document.getElementById("next-btn-3").addEventListener("click", function() {
                if (validateForm("form-step-3")) {
                    document.getElementById("form-step-3").style.display = "none";
                    document.getElementById("form-step-4").style.display = "block";
                    document.getElementById("step-3-breadcrumb").classList.remove("active");
                    document.getElementById("step-4-breadcrumb").classList.add("active");
                }
            });

            document.getElementById("start-again-btn").addEventListener("click", function() {
                const inputs = document.querySelectorAll("input[type=text], input[type=email], input[type=number]");
                inputs.forEach(input => input.value = "");

                document.getElementById("step-1-breadcrumb").classList.add("active");
                document.getElementById("step-2-breadcrumb").classList.remove("active");
                document.getElementById("step-3-breadcrumb").classList.remove("active");
                document.getElementById("step-4-breadcrumb").classList.remove("active");

                document.getElementById("form-step-1").style.display = "block";
                document.getElementById("form-step-2").style.display = "none";
                document.getElementById("form-step-3").style.display = "none";
                document.getElementById("form-step-4").style.display = "none";
            });
        </script>

        <style>
            #breadcrumbs {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 15px;
                border-radius: 8px;
                font-family: Arial, sans-serif;
                margin-bottom: 20px;
                font-size: 14px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .breadcrumb-item {
                position: relative;
                color: #6c757d;
                font-weight: 600;
                text-transform: capitalize;
                padding: 5px 10px;
                cursor: default;
            }

            .breadcrumb-item.active {
                color: #fff;
                color: #4F46E5;
                border-radius: 4px;
                padding: 5px 10px;
            }

            .breadcrumb-item:hover {
                text-decoration: underline;
                color: #4F46E5;
            }

            .breadcrumb-item.active:hover {
                text-decoration: none;
                cursor: default;
            }
        </style>
    ';

    return $output;
}

add_shortcode('r_test', 'r_test_wizard_shortcode');

add_action('admin_post_send_email', 'r_handle_wizard_submission');
add_action('admin_post_nopriv_send_email', 'r_handle_wizard_submission');
