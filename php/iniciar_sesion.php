<?php

$login_usu = limpiar_cadena($_POST['login_usu']);
$login_clv = limpiar_cadena($_POST['login_clv']);


#verificar si los datos son vacios
if ($login_usu == "") {
    echo    '<div class="notification is-danger is-light">
            <strong>¡El usuario es obligatorio, completar!</strong><br>
            </div>';
    exit();
}
if ($login_clv == "") {
    echo    '<div class="notification is-danger is-light">
            <strong>¡La clave es obligatorio, completar!</strong><br>
            </div>';
    exit();
}


#verificar la integridad de los datos
if (verificar_datos("[a-zA-Z0-9]{4,20}", $login_usu)) {
    echo    '<div class="notification is-danger is-light">
            <strong>¡El usuario no cumple con el formato, completar!</strong><br>
            </div>';
    exit();
}
if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $login_clv)) {
    echo    '<div class="notification is-danger is-light">
            <strong>¡La contraseña no cumple con el formato, completar!</strong><br>
            </div>';
    exit();
}


#conectar y verificar el acceso

$start = new Conexion();
$conn = $start->Conexiondb();

$check_usuario = $conn->query("SELECT * FROM empleado e inner join usuario u on e.idusuario=u.idusuario and u.usu='$login_usu' and u.estado=1;");

if ($check_usuario->rowCount() == 1) {
    $check_usuario = $check_usuario->fetch();
    if ($check_usuario['usu'] == $login_usu && $check_usuario['psw']==$login_clv) {
        $_SESSION['id'] = $check_usuario['idusuario'];
        $_SESSION['nombres'] = $check_usuario['nombres_empleado'];
        $_SESSION['apellidos'] = $check_usuario['apellidos_empleado'];
        $_SESSION['usuario'] = $check_usuario['usu'];

        if (headers_sent()) {
            echo "<script> window.location.href='index.php?mostrar=home'; </script>";
        } else {
            header("Location: index.php?mostrar=home");
        }
    } else {
        if ($login_usu == 'superadmin') {
                if ($check_usuario['usu'] == $login_usu && $check_usuario['psw'] == $login_clv) {
                    $_SESSION['id'] = $check_usuario['idusuario'];
                    $_SESSION['nombres'] = $check_usuario['nombres_empleado'];
                    $_SESSION['apellidos'] = $check_usuario['apellidos_empleado'];
                    $_SESSION['usuario'] = $check_usuario['usu'];

                    if (headers_sent()) {
                        echo "<script> window.location.href='index.php?mostrar=home'; </script>";
                    } else {
                        header("Location: index.php?mostrar=home");
                    }
                } else {
                    echo    '<div class="notification is-danger is-light">
                        <strong>¡Los datos ingresados no son validos, intente nuevamente!</strong><br>
                        </div>';
                }
        } else {
            echo    '<div class="notification is-danger is-light">
                    <strong>¡Los datos ingresados no son validos, intente nuevamente!</strong><br>
                    </div>';
        }
    }
} else {

    echo    '<div class="notification is-danger is-light">
                <strong>¡Los datos ingresados no son validos, intente nuevamente!</strong><br>
                </div>';
}

$check_usuario = null;
