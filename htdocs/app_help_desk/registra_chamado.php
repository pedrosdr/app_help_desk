<?php
    session_start();

    foreach($_POST as $name => $data) {
        $_POST[$name] = str_replace('#', '(hash)', $data);
    }

    $texto = $_SESSION['id'] . '#' . implode('#', $_POST) . PHP_EOL; //php end of line ("\n")
    
    $arquivo = fopen('../../app_help_desk/arquivo.hd', 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);

    header('Location: abrir_chamado.php');
?>