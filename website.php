<?php
include 'functions.php'; 
$teamMembers = readCSV('team-member.csv'); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>NaturaTech Solutions Inc</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
        <meta content="Themesbrand" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20">
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                  </div>
            </div>
        </div>

        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" id="navbar">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo" href="index-1.html">
                    <img src="images/logo-dark.png" alt="" class="logo-dark" height="28" />
                    <img src="images/logo-light.png" alt="" class="logo-light" height="28" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
                        <li class="nav-item">
                            <a href="#Overview" class="nav-link active">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a href="#Mission Statement" class="nav-link">Mission Statement</a>
                        </li>
                        <li class="nav-item">
                            <a href="#Key Products & Services" class="nav-link">Key Products & Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#Awards" class="nav-link">Awards</a>
                        </li>
                        <li class="nav-item">
                            <a href="#team" class="nav-link">Team</a>
                        </li>
            
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
            <!-- end container -->
        </nav>
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="hero-3 bg-center position-relative" style="background-image: url(images/hero-3-bg.png);" id="Overview">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                        
                            <h1 class="font-weight-semibold mb-4 hero-3-title">Overview</h1>
                            <p class="mb-5 text-muted subtitle w-75 mx-auto">NaturaTech Solutions Inc., established in 2019,
                                 is an eco-tech enterprise headquartered amidst the greenery of Portland, Oregon. 
                                 Embracing the philosophy of "Progress in Harmony," the company strives to produce 
                                 technology that integrates seamlessly with nature, aiming to restore environmental 
                                 balance and promote sustainable living.</p>


                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
        </section>
        <!-- Hero End -->

        
        <section class="section" id="Mission Statement">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="fw-bold">Mission Statement:</h2>
                        <p class="text-muted">"To bridge the chasm between technology and nature,
                             weaving them together to pioneer solutions that nurture the Earth and 
                             advance humanity."</p>

                    </div>
                </div>
                

        </section>
        <!-- Services end -->

      
        <section class="section bg-light" id="Key Products & Services">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="fw-bold">Key Products & Services:</h2>
                        <p class="text-muted">	<li>GreenRoof™: A modular green roofing system that utilizes smart sensors to regulate water, sunlight, and nutrients, allowing urban spaces to contribute positively to the environment.</li>
                        </br>	
                            <ul>Applications:</br>
                            	<li>Smart Irrigation: The system detects soil moisture levels and provides optimal water quantities, reducing wastage and ensuring plant health.</li>
                            	<li>Pollinator Patches: Specific sections within the GreenRoof™ are designed to attract and support urban pollinators like bees and butterflies.</li>
                            	<li>Air Purification Zones: Incorporates certain plants known to absorb pollutants, promoting cleaner urban air and combating the urban heat island effect.</li>
                            	</ul>
                            </br> 
                               <li> PureStream Filters™: Bio-engineered filters that harness the power of specific bacteria and plants to purify water without chemicals, making potable water accessible and sustainable.</li>
                            
                               <ul> Applications:</br>
                            	<li>Microbial Cleansing: Harnesses beneficial bacteria to break down harmful pathogens, ensuring water purity without chemical residues.</li>
                            	<li>Floating Gardens: Aesthetically pleasing modules that float on water surfaces, removing heavy metals and other toxins using specific wetland plants.</li>
                            	<li>Portable Units: Compact, travel-friendly variants designed for trekkers and campers, ensuring access to clean water even in remote areas.</li>
                            	</ul>
                                </br>
                                <li>TerraCharge™: Pathways made with special tiles that convert foot traffic into usable energy, illuminating pathways at night or powering nearby amenities.</li>
                            	<ul>Applications:</br>
                            	<li>Energy Storage: Surplus energy from foot traffic during the day is stored in sleek, underground batteries, allowing extended use after dark.</li>
                            	<li>Intelligent Lighting: The stored energy powers adaptive lighting systems that adjust based on ambient light and movement, ensuring pathways are well-lit without unnecessary energy consumption.</li>
                                <li>Interactive Displays: Some TerraCharge™ pathways feature interactive elements like ground-projected games or information graphics, all powered by pedestrian movement.</li>
                            	</ul>
                            </br>
                                <li>EcoLearn Hub™: A digital platform offering educational courses on sustainable living, organic farming, and eco-technology innovations.</li>
                            	<ul>Applications:</br>
                            	<li>DIY Workshops: Practical sessions teaching users how to upcycle waste, create home gardens, or even set up solar panels.</li>
                            	<li>Children's Series: Tailored courses introducing children to nature conservation, renewable energy, and the importance of biodiversity.</li>
                            	<li>Global Webinars: Regular online sessions featuring guest experts in fields like permaculture, green architecture, and sustainable transportation. These webinars foster a community of eco-enthusiasts and offer the latest in green innovations.</li>
                                    </ul>
                            </p>
                    </div>
                    <!-- end col -->
                </div>
        
            </div>
            <!-- end container -->
        </section>
        <section class="section" id="Awards">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="fw-bold">Awards:</h2>
                        <p class="text-muted">
                        <li>2022: Awarded "Green Innovator of the Year" by Eco Warrior Digest in 2022.</li>
                        <li>2021: GreenRoof™ installations have increased urban green spaces by 150% in cities like Seattle and Austin.</li>
                        <li>2021: Partnered with UNICEF to implement PureStream Filters™ in areas suffering from water scarcity.</li>
                        <li>2020: TerraCharge™ pathways have been adopted by 20 major city parks globally, reducing their carbon footprint.</li>

                        </p>

                    </div>
                </div>
                

        </section>
       

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

        <!-- Contact us start -->
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
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter name*" >
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="email" class="text-muted form-label">Email</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email*">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="subject" class="text-muted form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject.." />
                                        </div>
    
                                        <div class="mb-4 pb-2">
                                            <label for="comments" class="text-muted form-label">Message</label>
                                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter message..."></textarea>
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
        <!-- Contact us end -->

        <!-- Footer Start -->
        <footer class="footer" style="background-image: url(images/footer-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-4">
                            <a href="index-1.html"><img src="images/logo-light.png" alt="" class="" height="30" /></a>
                            <p class="text-white-50 my-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</p>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="mt-4 mt-lg-0">
                                    <h4 class="text-white font-size-18 mb-3">Customer</h4>
                                    <ul class="list-unstyled footer-sub-menu">
                                        <li><a href="javascript: void(0);" class="footer-link">Works</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Strategy</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Releases</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Press</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Mission</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-3 col-6">
                                <div class="mt-4 mt-lg-0">
                                    <h4 class="text-white font-size-18 mb-3">Product</h4>
                                    <ul class="list-unstyled footer-sub-menu">
                                        <li><a href="javascript: void(0);" class="footer-link">Trending</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Popular</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Customers</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Features</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-3 col-6">
                                <div class="mt-4 mt-lg-0">
                                    <h4 class="text-white font-size-18 mb-3">Information</h4>
                                    <ul class="list-unstyled footer-sub-menu">
                                        <li><a href="javascript: void(0);" class="footer-link">Developers</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Support</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Customer Service</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Get Started</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Guide</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-3 col-6">
                                <div class="mt-4 mt-lg-0">
                                    <h4 class="text-white font-size-18 mb-3">Support</h4>
                                    <ul class="list-unstyled footer-sub-menu">
                                        <li><a href="javascript: void(0);" class="footer-link">FAQ</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Contact</a></li>
                                        <li><a href="javascript: void(0);" class="footer-link">Disscusion</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-5">
                            <p class="text-white-50 f-15 mb-0">
                                <script>
                                document.write(new Date().getFullYear())
                            </script> © Qexal. Design By Themesbrand</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- Footer End -->

        <!-- Style switcher -->
        <div id="style-switcher">
            <div class="bottom">
                <a href="javascript: void(0);" id="mode" class="mode-btn text-white">
                    <i class="mdi mdi-white-balance-sunny mode-light"></i>
                    <i class="mdi mdi-moon-waning-crescent mode-dark"></i>
                </a>
                <a href="javascript: void(0);" class="settings" onclick="toggleSwitcher()"><i class="mdi mdi-cog  mdi-spin"></i></a>
            </div>
        </div>

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/smooth-scroll.polyfills.min.js"></script>

        <script src="https://unpkg.com/feather-icons"></script>

        <!-- App Js -->
        <script src="js/app.js"></script>
    </body>
</html>
