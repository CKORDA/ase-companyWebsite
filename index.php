<?php
// Read data from JSON file
$json_data = file_get_contents('data.json');
$data = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($data['title']); ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <!-- Header Start -->
    <header class="header">
        <div class="container">
            <h1 class="fw-bold"><?php echo htmlspecialchars($data['title']); ?></h1>
        </div>
    </header>
    <!-- Header End -->

    <!-- Overview Start -->
    <section class="section" id="overview">
        <div class="container">
            <h2 class="fw-bold mb-4">Overview</h2>
            <p><?php echo htmlspecialchars($data['overview']); ?></p>
        </div>
    </section>
    <!-- Overview End -->

    <!-- About Section Start -->
    <section class="section" id="about">
        <div class="container">
            <h2 class="fw-bold mb-4">Mission Statement</h2>
            <p><?php echo htmlspecialchars($data['mission_statement']); ?></p>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Products and Services Section Start -->
    <section class="section" id="products">
        <div class="container">
            <h2 class="fw-bold mb-4">Products and Services</h2>
            <div class="row">
                <?php
                // Loop through products and services from the JSON data
                foreach ($data['productsAndServices'] as $product) {
                    echo '<div class="col-lg-6">';
                    echo '<h5 class="font-size-19 mb-2">' . htmlspecialchars($product['name']) . '</h5>';
                    echo '<p>' . htmlspecialchars($product['description']) . '</p>';
                    echo '<ul>';
                    foreach ($product['applications'] as $application) {
                        echo '<li>';
                        echo '<strong>' . htmlspecialchars($application['name']) . ':</strong>';
                        echo '<p>' . htmlspecialchars($application['description']) . '</p>';
                        echo '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Products and Services Section End -->

    <!-- Awards Section Start -->
    <section class="section" id="awards">
        <div class="container">
            <h2 class="fw-bold mb-4">Awards</h2>
            <ul>
                <?php
                foreach ($data['awards'] as $award) {
                    echo '<li>' . htmlspecialchars($award) . '</li>';
                }
                ?>
            </ul>
        </div>
    </section>
    <!-- Awards Section End -->

         <!-- Team start -->
<section class="section bg-light" id="team">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-7 text-center">
                <h2 class="fw-bold">Our Team Members</h2>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <?php foreach ($teamMembers as $key => $member) : ?>
                <?php if ($key === 0) continue; // Skip the header row ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="position-relative overflow-hidden">
                            <img src="images/team/<?php echo $key + 1; ?>.jpg" alt="" class="img-fluid d-block mx-auto" /> <!-- Adjust image path if needed -->
                            <ul class="list-inline p-3 mb-0 team-social-item">
                                <li class="list-inline-item mx-3">
                                    <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                                </li>
                                <li class="list-inline-item mx-3">
                                    <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-4">
                            <h5 class="font-size-19 mb-1"><?php echo htmlspecialchars($member[0]); ?></h5>
                            <p class="text-muted text-uppercase font-size-14 mb-0"><?php echo htmlspecialchars($member[1]); ?>: <?php echo htmlspecialchars($member[3]); ?></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            <?php endforeach; ?>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- Team end -->



    <!-- Contact Us Section Start -->
    <section class="section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Get in Touch</h2>
                    <p class="text-muted mb-5">Et harum quidem rerum facilis est expedita distinctio temporecum soluta nobis est eligendi optio cumque nihil impedit quo minus maxime.</p>
                    <div>
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <p id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="name" class="text-muted form-label">Name</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Enter name*" required>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="email" class="text-muted form-label">Email</label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Enter email*" required>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="subject" class="text-muted form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject.." required>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="comments" class="text-muted form-label">Message</label>
                                        <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter message..." required></textarea>
                                    </div>

                                    <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-5 ms-lg-auto">
                    <div class="mt-5 mt-lg-0">
                        <img src="images/contact.png" alt="" class="img-fluid d-block" />
                        <p class="text-muted mt-5 mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="mail"></i> Support@info.com</p>
                        <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i> +91 123 4556 789</p>
                        <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="map-pin"></i> 2976 Edwards Street Rocky Mount, NC 27804</p>
                        <ul class="list-inline pt-4">
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="facebook"></i></a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Contact Us Section End -->

    <!-- Footer Start -->
    <footer class="footer" style="background-image: url(images/footer-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-4">
                        <a href="index-1.html"><img src="images/logo-light.png" alt="" class="" height="30" /></a>
                        <p class="text-white-50 my-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
                        <ul class="list-inline">
                            <li class="list-inline-item me-4"><a href="#" class="text-white">Terms</a></li>
                            <li class="list-inline-item me-4"><a href="#" class="text-white">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- Footer End -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>
