<?php
    session_start();

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 2)
    );

    $usuario_autenticado = false;
    $usuario_id = null;
    $perfil_id = null;

    foreach ($usuarios_app as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $perfil_id = $user['perfil_id'];
            break;
        }
    }

    if($usuario_autenticado) {
        $_SESSION['autenticado'] = true;
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $perfil_id;
        header('Location: home.php');
    }
    else {
        $_SESSION['autenticado'] = false;
        header('Location: index.php?login=erro');
    }
?>