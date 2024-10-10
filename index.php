<?php

include 'lib/readPlainText.php';
include 'lib/readCSV.php';
include 'lib/json.php';

// Load Data
$overview = readPlainText('data/overview.txt');
$mission = readPlainText('data/mission_statement.txt');
$products = readJSON('data/data.json');
//$awards = readJSON('data/data.json');
$team = readCSV('data/team-member.csv');


// Debugging
var_dump($overview);
var_dump($mission);
var_dump($products);
var_dump($team);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuratech Solutions Inc.</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Header Start -->
    <header class="header">
        <div class="container">
            <h1 class="fw-bold" id="company-title">Nuratech Solutions Inc.</h1>
        </div>
    </header>
    <!-- Header End -->

    <!-- Overview Start -->
    <section class="section" id="overview">
        <div class="container">
            <h2 class="fw-bold mb-4">Overview</h2>
            <p><?php echo $overview; ?></p>
        </div>
    </section>
    <!-- Overview End -->

    <!-- Mission Statement Start -->
    <section class="section" id="mission">
        <div class="container">
            <h2 class="fw-bold mb-4">Mission Statement</h2>
            <p><?php echo $mission; ?></p>
        </div>
    </section>
    <!-- Mission Statement End -->

    <!-- Products and Services Start -->
    <section class="section" id="products">
        <div class="container">
            <h2 class="fw-bold mb-4">Products and Services</h2>
            <div class="row">
                <?php foreach ($products['productsAndServices'] as $product): ?>
                    <div class="col-lg-6">
                        <h5 class="font-size-19 mb-2"><?php echo $product['name']; ?></h5>
                        <p><?php echo $product['description']; ?></p>
                        <ul>
                            <?php foreach ($product['applications'] as $app): ?>
                                <li><strong><?php echo $app['name']; ?>:</strong> <?php echo $app['description']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Products and Services End -->

    <!-- Awards Section Start -->
    <section class="section" id="awards">
        <div class="container">
            <h2 class="fw-bold mb-4">Awards</h2>
            <ul>
                <?php foreach ($products['awards'] as $award): ?>
					<li><?php echo $award; ?></li>
				<?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!-- Awards Section End -->

    <!-- Team Members Section Start -->
    <section class="section" id="team">
        <div class="container">
            <h2 class="fw-bold mb-4">Our Team</h2>
            <div class="row">
                <?php foreach ($team as $member): ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                            <div class="p-4">
                                <h5 class="font-size-19 mb-1"><?php echo $member["Name"]; ?></h5>
                                <h6 class="font-size-16 mb-1"><?php echo $member['Role']; ?></h6>
                                <p class="text-muted text-uppercase font-size-14 mb-0"><?php echo $member['Description']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Team Members Section End -->

    <!-- Contact Us Section -->
    <section class="section" id="contact">
        <!-- Contact Form HTML remains the same -->
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>
