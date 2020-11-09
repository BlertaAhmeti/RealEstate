<?php 
require('autoloader.php'); 
use App\Lib\Session;
use App\Lib\Property;
use App\Lib\User;
$session = new Session();
$properties = new Property;
$user = new User;

$property_data = $properties->get_property_by_id($_GET['propertyid']); 

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

    <!-- Property Details -->
    <section id="your_properties" class="py-5 my-5">
        <div class="container text-center mb-5 pb-5">
            <h1 class="display-4 pb-1 border-bottom w-50 mx-auto pt-5">Property Details</h1>
            <div class="row mt-5">
                <img src="images/<?php echo $property_data['image']; ?>" alt="" class="img-fluid">
            </div>
            <br>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Number of rooms</th>
                            <th>Number of bathrooms</th>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $property_data['title']; ?></td>
                            <td><?php echo $property_data['description']; ?></td>
                            <td><?php echo $property_data['rooms']; ?></td>
                            <td><?php echo $property_data['bathrooms']; ?></td>
                            <td><?php echo $property_data['category']; ?></td>
                            <td><?php echo $property_data['price']; ?> &euro; </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <p class="text-left">Added by <b><?php echo $property_data['first_name'] . " " . $property_data['last_name']; ?></b> </p>
            <p class="text-left">Kontakto pronarin permes email-it <a href="mailto:<?php echo $property_data['email']; ?>">ketu</a>!</p>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>