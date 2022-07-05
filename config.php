<?php 
    session_start();
    $pname = @$_REQUEST['page'];

    switch($pname)
    {

        case 'register':
        $mainpage = 'register.php';
        break;

        case 'admin':
        $mainpage = 'admin-dashboard.php';
        break;

        case 'logout':
        $mainpage = 'logout.php';

        default:
        $mainpage = 'home.php';

    }

