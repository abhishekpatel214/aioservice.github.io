<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['go_to_cart'])) {
        if (isset($_SESSION['category'])) {
            $myitems = array_column($_SESSION['category'], 'item_name');
            if (in_array($_POST['item_name'], $myitems)) {

            // unset($_SESSION['category']);
            } else {

                $count = count($_SESSION['category']);
                $_SESSION['category'][$count] = array('id' => $_POST['id'], 'name' => $_POST['name']);
                echo ("<script LANGUAGE='JavaScript'>
            
            window.location.href='cart.php';
            </script>");
            }
        } else {
            $_SESSION['category'][0] = array('id' => $_POST['id'], 'name' => $_POST['name']);
            echo ("<script LANGUAGE='JavaScript'>
    
    window.location.href='cart.php';
    </script>");
        }
    }
    
    
}
