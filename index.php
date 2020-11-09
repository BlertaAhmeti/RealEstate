<?php require('autoloader.php'); ?>
<?php include_once('includes/header.php'); ?>
<?php 
use App\Lib\Property; 
use App\Lib\User;
?>
<!-- Home -->
<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active h-75">
            <img src="images/slide1.jpg" class="img-fluid h-75" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Welcome to us!</h3>
                <p>We are a professional team</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/slide2.jpg" class="img-fluid h-75" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Welcome to us!</h3>
                <p>We buil professional buildings and more</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/slide3.jpg" class="img-fluid h-75" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Title</h3>
                <p>Description</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<!-- About -->
<section id="about" class="text-center py-5">
    <div class="container">
        <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">About</h1>
        <div class="row pt-5">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <p class=" text-justify">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam odit voluptates ducimus fugit
                    officiis rerum, consequuntur repudiandae fuga unde tempora illo, enim aspernatur ratione, dolore
                    iure nostrum cum impedit. Nesciunt.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat molestiae libero, ducimus
                    quisquam labore iusto necessitatibus fugit illo tempore a laboriosam molestias provident. Earum
                    saepe sunt perspiciatis et similique consequuntur.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam itaque voluptates eveniet,
                    id, laudantium sequi ducimus suscipit veniam dolore voluptatibus explicabo blanditiis a amet rem
                    ut quia. Voluptate, odit? Sit.
                </p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="images/slide3.jpg" class="img-fluid" alt="" style="box-shadow: 3px 3px 15px #000;">
            </div>
        </div>
    </div>
</section>

<?php 
$properties = new Property(); 
$users = new User();
?>
<!-- Properties -->
<section id="services" class="py-5 bg-light">
    <div class="container text-center">
        <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">Properties</h1>
        <div class="row pt-5">
            <?php foreach($properties->getProperties() as $property): ?>
            <div class="col-sm-12 col-md-4 col-lg-3 mb-4">
                <img src="images/<?php echo $property['image']; ?>" class="img-fluid" alt="">
                <div class="border">
                    <h4 class="card-title"><?php echo $property['title']; ?></h4>
                    <p class="card-title" style="font-size: 14px;">
                        <?php echo $property['description']; ?>
                    </p>
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
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Pages -->
<section id="pages" class="py-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h1 class="display-2"><?php echo $properties->getNrProperties()['nr_properties']; ?></h1>
                <p>Number of properties</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h1 class="display-2"><?php echo $properties->getNrForSale()['nr_sale']; ?></h1>
                <p>For sale</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <h1 class="display-2"><?php echo $properties->getNrForRent()['nr_rent']; ?></h1>
                <p>For rent</p>
            </div>
        </div>
    </div>
</section>

<!-- Users -->
<section id="users" class="py-5">
    <div class="container text-center">
        <h1 class="display-4 pb-1 border-bottom w-50 mx-auto pt-5 mb-5">Users</h1>
        <table id="example1" class="cell-border hover stripe text-left">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users->getUsers() as $user): ?>
                <tr>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>


<!-- Newest -->
<section id="contact" class="py-5 bg-light">
    <div class="container text-center pb-5">
        <h1 class="display-4 pb-1 border-bottom w-50 mx-auto pt-5">Newest properties</h1>
        <div class="row mt-5">
            <?php foreach($properties->get4LatestProperties() as $property): ?>
            <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
                <div class="row">
                    <div class="col-6">
                        <img src="images/<?php echo $property['image']; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-6 text-left">
                        <h2><?php echo $property['title']; ?></h2>
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