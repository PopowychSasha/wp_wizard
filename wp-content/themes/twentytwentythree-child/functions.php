<?php
    require_once get_stylesheet_directory() . '/email-handler.php';

    function add_viewport_meta_tag() {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    }

    function twentytwentythree_child_enqueue_styles() {
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

        wp_enqueue_style( 'twentytwentythree-child-style', 
            get_stylesheet_uri(),
            array(), 
            wp_get_theme()->get('Version'), 
            'all' 
        );
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
                    <div class="bg-secondary rounded col-sm-10 mx-auto py-5">
                        <form class="col-11 col-md-9 mx-auto" method="POST" action="' . esc_url(admin_url('admin-post.php?action=send_email')) . '">                        
                            <div class="breadcrumbs d-flex justify-content-between align-items-center rounded mb-4 me-4 bg-white pt-2 pe-4 pb-2 ps-3">
                                <span class="breadcrumb-item p-0">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.7069 2.293C10.5194 2.10553 10.2651 2.00021 9.99992 2.00021C9.73475 2.00021 9.48045 2.10553 9.29292 2.293L2.29292 9.293C2.11076 9.4816 2.00997 9.7342 2.01224 9.9964C2.01452 10.2586 2.11969 10.5094 2.3051 10.6948C2.49051 10.8802 2.74132 10.9854 3.00352 10.9877C3.26571 10.99 3.51832 10.8892 3.70692 10.707L3.99992 10.414V17C3.99992 17.2652 4.10528 17.5196 4.29281 17.7071C4.48035 17.8946 4.7347 18 4.99992 18H6.99992C7.26514 18 7.51949 17.8946 7.70703 17.7071C7.89456 17.5196 7.99992 17.2652 7.99992 17V15C7.99992 14.7348 8.10528 14.4804 8.29281 14.2929C8.48035 14.1054 8.7347 14 8.99992 14H10.9999C11.2651 14 11.5195 14.1054 11.707 14.2929C11.8946 14.4804 11.9999 14.7348 11.9999 15V17C11.9999 17.2652 12.1053 17.5196 12.2928 17.7071C12.4803 17.8946 12.7347 18 12.9999 18H14.9999C15.2651 18 15.5195 17.8946 15.707 17.7071C15.8946 17.5196 15.9999 17.2652 15.9999 17V10.414L16.2929 10.707C16.4815 10.8892 16.7341 10.99 16.9963 10.9877C17.2585 10.9854 17.5093 10.8802 17.6947 10.6948C17.8801 10.5094 17.9853 10.2586 17.9876 9.9964C17.9899 9.7342 17.8891 9.4816 17.7069 9.293L10.7069 2.293Z" fill="#9CA3AF"/>
                                    </svg>
                                </span>
                                <span id="step-1-breadcrumb" class="breadcrumb-item p-0 fw-medium text-light active">Contact Info</span>
                                <span id="step-2-breadcrumb" class="breadcrumb-item p-0 fw-medium text-light">Quantity</span>
                                <span id="step-3-breadcrumb" class="breadcrumb-item p-0 fw-medium text-light">Price</span>
                                <span id="step-4-breadcrumb" class="breadcrumb-item p-0 fw-medium text-light">Done</span>
                            </div>
                            
                            <div id="form-step-1">
                                <div>
                                    <h2 class="display-5 fw-bold text-dark mb-4">Contact Info</h2>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                        <label for="name" class="col-md-4 col-lg-3 text-end text-info" style="font-size:15px;">Name <span class="required-message text-danger">Required</span></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" id="name" name="name" class="form-control border-success" required> 
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                        <label for="email" class="col-md-4 col-lg-3 text-end text-info" style="font-size:15px;">Email <span class="required-message text-danger">Required</span></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" id="email" name="email" class="form-control border-success" required>
                                        </div>
                                    </div>

                                    <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                        <label for="phone" class="col-md-4 col-lg-3 text-end text-info" style="font-size:15px;">Phone <span class="required-message text-danger">Required</span></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" id="phone" name="phone" class="form-control border-success" required>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" id="next-btn-1" class="btn bg-primary text-white border-primary px-4 d-flex align-items-center justify-content-center" style="height:44px;">Continue</button>
                                </div>
                            </div>

                            <div id="form-step-2" style="display: none;">
                                <div>
                                    <h2 class="display-5 fw-bold mb-4">Quantity</h2>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-3 row">
                                        <label for="quantity" class="col-md-4 col-lg-3 text-end" style="font-size:15px;">Quantity <span class="required-message">Required</span></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="number" max="1000" min="0" id="quantity" name="quantity" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button type="button" id="next-btn-2" class="btn bg-primary text-white border-primary px-4 py-2 me-2 d-flex align-items-center justify-content-center">Continue</button>
                                    <button type="button" id="prev-btn-2" class="btn btn-light text-primary d-flex align-items-center">
                                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>Back
                                    </button>
                                </div>
                            </div>

                            <div id="form-step-3" style="display: none;">
                                <div>
                                    <h2 class="display-5 fw-bold mb-0" for="price">Price <span class="required-message">required</span></h2>
                                    <h1 class="display-1 fw-bold mb-5" id="price"></h1>
                                </div>

                                <div class="d-flex">
                                    <button type="submit" id="next-btn-3" class="btn bg-primary text-white border-primary px-3 me-2">Send to Email</button>
                                    <button type="button" id="prev-btn-3" class="btn btn-light text-primary d-flex align-items-center">
                                        <i class="bi bi-arrow-left-short fs-5 me-1"></i>Back
                                    </button>
                                </div>
                            </div>

                            <div id="form-step-4" style="display: none;">
                                <div>
                                    <h2 class="display-5 fw-bold mb-4">Done</h2>
                                    <p id="done-step-content"></p>
                                </div>
                                <div>
                                    <button type="button" id="start-again-btn" class="btn bg-primary text-white border-primary d-flex align-items-center px-4">
                                        Start again <i class="bi bi-arrow-right-short fs-5 ms-1 align-middle"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-10 mx-auto">
                        <div class="col-11 col-md-9 mx-auto">
                            <h2>' . esc_html($atts['title']) . '</h2>
                            <p>' . $content . '</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                const urlParams = new URLSearchParams(window.location.search);
                const step = urlParams.get("step");
                const status = urlParams.get("status");
                
                if (step === "done") {
                    document.getElementById("form-step-4").style.display = "flex";
                    document.getElementById("step-3-breadcrumb").classList.remove("active");
                    document.getElementById("step-4-breadcrumb").classList.add("active");

                    document.getElementById("form-step-1").style.display = "none";
                    document.getElementById("form-step-2").style.display = "none";
                    document.getElementById("form-step-3").style.display = "none";

                    document.getElementById("step-1-breadcrumb").classList.remove("active");

                    if (status === "success") {
                        document.getElementById("done-step-content").innerHTML = "<div class=\"d-flex align-items-center\"><i class=\"bi bi-check-square fs-5\" style=\"color: #12c922;\"></i><span class=\"text-info ms-2\" >Your email was sent successfully</span></div>";
                    } else if (status === "failed") {
                        document.getElementById("done-step-content").innerHTML = "<div class=\"d-flex align-items-center\"><i class=\"bi bi-exclamation-triangle fs-5\" style=\"color: #FF0000;\"></i><span class=\"text-info ms-2\">We cannot send you email right now. Use an alternative way to contact us</span></div>";
                    }

                }

                const isValidEmail = (email) => {
                    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return emailPattern.test(email);
                };

                const validateForm = (formId) => {
                    let isValid = true;
                    const form = document.getElementById(formId);
                    const inputs = form.querySelectorAll("input[required], textarea[required]");

                    inputs.forEach((input) => {
                        const label = form.querySelector(`label[for="${input.id}"]`);
                        const errorSpan = label.querySelector(".required-message");

                        if (!input.value.trim()) {
                            errorSpan.style.display = "inline";
                            isValid = false;
                        } else {
                            errorSpan.style.display = "none";
                        }

                        if (input.type === "number" && input.value > 1000 && input.value) {
                            console.log(input.value);
                            errorSpan.style.display = "inline";
                            errorSpan.textContent = "Large value"; 
                            isValid = false;
                        }
                        else if (input.type === "number" && input.value < 0 && input.value) {
                            console.log(input.value);
                            errorSpan.style.display = "inline";
                            errorSpan.textContent = "Negative value"; 
                            isValid = false;
                        }
                        else if(input.type === "number" && !input.value){
                            errorSpan.style.display = "inline";
                            errorSpan.textContent = "Required"; 
                            isValid = false;
                        }

                        if (input.type === "email" && input.value && !isValidEmail(input.value)) {
                            errorSpan.style.display = "inline";
                            errorSpan.textContent = "Invalide email";
                            isValid = false;
                        }
                        else if(input.type === "email" && !input.value){
                            errorSpan.style.display = "inline";
                            errorSpan.textContent = "Required"; 
                            isValid = false;
                        }
                    });

                    return isValid;
                };

                const calculatePrice = (quantity) => {
                    if (quantity >= 1 && quantity <= 10) {
                        return "$10";
                    } else if (quantity >= 11 && quantity <= 100) {
                        return "$100";
                    } else if (quantity >= 101 && quantity <= 1000) {
                        return "$1000";
                    } else {
                        return "$1000";
                    }
                };

                document.getElementById("next-btn-1").addEventListener("click", () => {
                    if (validateForm("form-step-1")) {
                        document.getElementById("form-step-1").style.display = "none";
                        document.getElementById("form-step-2").style.display = "flex";
                        document.getElementById("step-1-breadcrumb").classList.remove("active");
                        document.getElementById("step-2-breadcrumb").classList.add("active");
                        document.getElementById("prev-btn-2").style.display = "inline-block";
                    }
                });

                document.getElementById("prev-btn-2").addEventListener("click", () => {
                    document.getElementById("form-step-2").style.display = "none";
                    document.getElementById("form-step-1").style.display = "flex";
                    document.getElementById("step-1-breadcrumb").classList.add("active");
                    document.getElementById("step-2-breadcrumb").classList.remove("active");
                    document.getElementById("prev-btn-2").style.display = "none";
                });

                document.getElementById("next-btn-2").addEventListener("click", () => {
                    if (validateForm("form-step-2")) {
                        const quantity = parseInt(document.getElementById("quantity").value, 10);
                        const price = calculatePrice(quantity);
                        document.getElementById("price").textContent = price;

                        document.getElementById("form-step-2").style.display = "none";
                        document.getElementById("form-step-3").style.display = "flex";
                        document.getElementById("step-2-breadcrumb").classList.remove("active");
                        document.getElementById("step-3-breadcrumb").classList.add("active");
                        document.getElementById("prev-btn-3").style.display = "inline-block";
                    }
                });

                document.getElementById("prev-btn-3").addEventListener("click", () => {
                    document.getElementById("form-step-3").style.display = "none";
                    document.getElementById("form-step-2").style.display = "flex";
                    document.getElementById("step-2-breadcrumb").classList.add("active");
                    document.getElementById("step-3-breadcrumb").classList.remove("active");
                    document.getElementById("prev-btn-3").style.display = "none";
                });

                document.getElementById("next-btn-3").addEventListener("click", () => {
                    if (validateForm("form-step-3")) {
                        document.getElementById("form-step-3").style.display = "none";
                        document.getElementById("form-step-4").style.display = "flex";
                        document.getElementById("step-3-breadcrumb").classList.remove("active");
                        document.getElementById("step-4-breadcrumb").classList.add("active");
                    }
                });

                document.getElementById("start-again-btn").addEventListener("click", () => {
                    history.replaceState(null, null, window.location.pathname);                    
                    
                    const inputs = document.querySelectorAll("input[type=text], input[type=email], input[type=number]");
                    inputs.forEach((input) => (input.value = ""));

                    document.getElementById("step-1-breadcrumb").classList.add("active");
                    document.getElementById("step-2-breadcrumb").classList.remove("active");
                    document.getElementById("step-3-breadcrumb").classList.remove("active");
                    document.getElementById("step-4-breadcrumb").classList.remove("active");

                    document.getElementById("form-step-1").style.display = "flex";
                    document.getElementById("form-step-2").style.display = "none";
                    document.getElementById("form-step-3").style.display = "none";
                    document.getElementById("form-step-4").style.display = "none";
                });

            </script>
        ';

        return $output;
    }

    add_shortcode('r_test', 'r_test_wizard_shortcode');

    add_action('admin_post_send_email', 'r_handle_wizard_submission');
    add_action('admin_post_nopriv_send_email', 'r_handle_wizard_submission');

    add_action( 'wp_enqueue_scripts', 'twentytwentythree_child_enqueue_styles' );
    add_action('wp_head', 'add_viewport_meta_tag');