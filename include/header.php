

<nav id="navbar" class="navbar navbar-expand-lg navbar-light text-center text-white p-4 border-0 rounded">
    <div class="container-fluid">
        <a class="navbar-brand title text-white" href="#">ICart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-white"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="displayall.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup> </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="#">Total Price: 852rs </a>
                </li> -->
                <?php
                session_start();
                        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

                ?>

                        <li class="nav-item">
                            <a class="nav-link " href="./users_area/signup.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./users_area/login.php">Login</a>
                        </li>
                <?php
                        }
                        else{
                            

                            echo '
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                              '.$_SESSION['username'].'
                            </a>
                            <div class="dropdown-menu bg-dark">
                              <a class="dropdown-item " href="./users_area/profile.php">Go to Profile</a>
                         
                              <a class="nav-link" href="./users_area/logout.php">Logout</a>
                              
                            </div>
                          </li>'
                          ;
                              
                
                        }
                ?>

            </ul>
            <form action="search.php" method="get" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                aria-label="Search">
                <button class="btn btn-outline-light border-0 " type="submit" name="search"><i
                class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>
