<?php 
require('autoloader.php'); 
use App\Lib\Session;
use App\Lib\Property;

$session = new Session();
$properties = new Property;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/2112736a95.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
    <title>Real Estate WebApp</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        #pages {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(images/slide2.jpg);
            background-position: top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: #fff;
            overflow: hidden;
        }

        #projects .row img:hover {
            transform: scale(1.1);
            transition: .3s;
        }

        #services .card {
            box-shadow: 1px 1px 35px #000;
            margin-bottom: 50px;
        }

        #services .card:hover {
            margin-top: -10px;
            transition: .3s;
        }

        .activeItem {
            border-bottom: 1px solid #000;
            transition: .2s;
        }
    </style>
</head>

<body>

    <!-- Navigimi -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #fff;border-bottom: 1px solid #000;">
        <a class="navbar-brand text-dark" href="#"><img src="images/logo.png" class="img-fluid" width="100" height="50" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item activeItem">
                    <a class="nav-link text-dark" href="index.php">Home</a>
                </li>
            </ul>
        </div>
        <?php
        if (isset($_SESSION['user_id'])) {  ?>
            <span class="d-inline-block" style="margin-right: 100px;">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if (isset($_SESSION['user_id'])) {
                            echo $session->fullname;
                        } else {
                            echo "Profile";
                        }
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="your_properties.php">Your properties</a>
                        <a class="dropdown-item" href="add_new_property.php">Add new property</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </span>
        <?php
        } else {
        ?>
            <span class="d-inline-block mr-5">
                <a href="login.php" style="color:black;padding-right: 5px;">Login</a>
            </span>
        <?php } ?>
    </nav>

    <!-- Your Properties -->
    <section id="your_properties" class="py-5 my-5">
        <div class="container text-center mb-5 pb-5">
            <h1 class="display-4 pb-1 border-bottom w-50 mx-auto pt-5">Your properties</h1>
            <div class="row mt-5">
            <?php foreach($properties->get_properties_by_user_id($_SESSION['user_id']) as $property): ?>
                <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
                    <div class="row">
                        <div class="col-6">
                            <img src="images/<?php echo $property['image'] ?>" class="img-fluid" alt="">
                        </div>
                        <div class="col-6 text-left">
                            <h2><a href="property_details.php?propertyid=<?php echo $property['id']; ?>"><?php echo $property['title']; ?></a></h2>
                            <p><?php echo $property['description']; ?></p>
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa fa-bed"></i>
                                    <p><?php echo $property['rooms']; ?></p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-bath"></i>
                                    <p><?php echo $property['bathrooms']; ?></p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-euro"></i>
                                    <p><?php echo $property['price']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>