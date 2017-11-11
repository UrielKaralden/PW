<?php
    // Funciones para el control de la sesion MySQL
    function initiate_session()
    {
        session_start();
        // No permitir un ID de sesión demasiado antiguo
        if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 180)
        {
            session_destroy();
            session_start();
        }
    }

    function reset_session($user_nickname, $user_permission)
    {
        // Evitar colisiones creando el id mientras la sesión está activa
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
            $user_session = session_create_id($user_nickname);
            session_name($user_nickname);
            $_SESSION['admin'] = $user_permission;
            $_SESSION['deleted_time'] = time();
            session_commit();
            ini_set('session.use_strict_mode',0);
            session_id($user_session);
            session_start();
        }
    }
?>
