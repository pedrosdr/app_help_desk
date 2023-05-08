<?php
    session_start();

    /*
    $var = 'Pedro';
    echo $var . '<br>';

    unset($var);

    echo $var;
    */

    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    unset($_SESSION['x']); // remove indíce apenas se ele existir

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    session_destroy(); // forçar nova requisição http
    header('Location: index.php');

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    */

    session_destroy(); // forçar nova requisição http
    header('Location: index.php');
?>