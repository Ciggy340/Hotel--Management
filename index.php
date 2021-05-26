<?php

require_once './autoload.php';
require_once './database/connect.php';
require_once './controllers/homeController.php';
require_once './controllers/userController.php';
require_once './models/user.php';
require_once './views/includes/header.php';


$home = new homeController();
$pages = ['home', 'home_user', 'bivago', 'highlights', 'reserve', 'add', 'delete', 'update', 'signup', 'login' , 'logout'];

if(isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn']) === true ){
    if(isset($_GET['page'])){
        if(in_array($_GET['page'],$pages)){
            $page = $_GET['page'];
            $home->index($page);
        }
        else{
            include('views/includes/404.php');
        }
    }

    require_once './views/includes/footer.php';

    // else if((isset($_GET['page']) && $_GET['page'] === 'signup'){
    //     $home->index('signup');
    // }

    }
    else if(isset($_GET['page']) && $_GET['page'] === 'signup'){
	$home->index('signup');
    }
    else{
        $home->index('login');
    }
    
?>


<!-- SELECT * FROM (reserve as rs, customer as c,reservation as r) WHERE c.id=rs.id_customer_fk AND r.id=rs.id_reservation_fk -->
