
<?php
require_once "navbar.php";
?>
<body class="bg-light">
    <div class="container py-5">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-primary mb-3">Contact Us</h1>
            <p class="lead text-muted">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>

        <div class="row g-4">
            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-geo-alt text-primary fs-4 me-3"></i>
                                <div>
                                    <h5 class="mb-1">Address</h5>
                                    <p class="mb-0 text-muted">Silicon University , Patia</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-telephone text-primary fs-4 me-3"></i>
                                <div>
                                    <h5 class="mb-1">Phone</h5>
                                    <p class="mb-0 text-muted">+91 8018886621</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-envelope text-primary fs-4 me-3"></i>
                                <div>
                                    <h5 class="mb-1">Email</h5>
                                    <p class="mb-0 text-muted">info@onlinevotingsystem.com</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-clock text-primary fs-4 me-3"></i>
                                <div>
                                    <h5 class="mb-1">Operating Hours</h5>
                                    <p class="mb-0 text-muted">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 1:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>

                                <div class="col-12">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5 py-2">
                                        Send Message
                                        <i class="bi bi-send ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once "footer.php";
?>