<?php
    // Funciones para el control de la sesion MySQL
    function iniciate_session()
    {
        session_start();
        // No permitir un ID de sesión demasiado antiguo
        if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 180)
        {
            session_destroy();
            session_start();
        }
    }

    function reset_session($user_nickname, $user_email, $user_permission)
    {
        // Evitar colisiones creando el id mientras la sesión está activa
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
            $user_session = session_create_id($user_nickname);
            $_SESSION['email'] = $user_email;
            $_SESSION['admin'] = $user_permission;
            $_SESSION['deleted_time'] = time();
            session_commit();
            ini_set('session.use_strict_mode',0);
            session_id($user_session);
            session_start();
        }
    }
?>
