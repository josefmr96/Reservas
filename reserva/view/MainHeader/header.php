<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="/reserva/public/2.jpg" alt="">
            <img class="hidden-lg-up" src="/reserva/public/2.jpg" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        
        <div class="site-header-content mb-0">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="label label-pill label-success"><span class="font-icon font-icon-user"></span><?php  echo ''.' '. ($_SESSION["usu_nom"]) ?></span> 
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesion</a>
                        </div>
                    </div>
                </div>

                <div class="mobile-menu-right-overlay"></div>

               

                <div class="dropdown dropdown-typical">
                    <a href="#" class="dropdown-toggle no-arr">
                       
                        
                    </a>
                </div>

            </div>
        </div>
    </div>
</header>