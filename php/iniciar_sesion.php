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

// $check_usuario = $conn->query("SELECT * FROM empleado e inner join usuario u on e.idusuario=u.idusuario and u.usu='$login_usu' and u.estado=1;");

$check_empleado = $conn->query("SELECT * FROM empleado e inner join usuario u on e.idusuario=u.idusuario and u.usu='$login_usu' and u.estado=1;");


if($check_empleado->rowCount()==1){
    $check_empleado = $check_empleado->fetch();
    if ($check_empleado['usu'] == $login_usu && $check_empleado['psw']==$login_clv) {
        $_SESSION['id'] = $check_empleado['idusuario'];
        $_SESSION['nombres'] = $check_empleado['nombres_empleado'];
        $_SESSION['apellidos'] = $check_empleado['apellidos_empleado'];
        $_SESSION['usuario'] = $check_empleado['usu'];

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

}else {
    $check_alumno = $conn->query("SELECT * FROM alumno a inner join usuario u on a.idusuario=u.idusuario and u.usu='$login_usu' and u.estado=1;");
    if($check_alumno->rowCount()==1){
        $check_alumno = $check_alumno->fetch();
        if ($check_alumno['usu'] == $login_usu && $check_alumno['psw']==$login_clv) {
            $_SESSION['id'] = $check_alumno['idusuario'];
            $_SESSION['nombres'] = $check_alumno['nombres_alumno'];
            $_SESSION['apellidos'] = $check_alumno['apellidos_alumno'];
            $_SESSION['usuario'] = $check_alumno['usu'];

            if (headers_sent()) {
                echo "<script> window.location.href='index.php?mostrar=home'; </script>";
            } else {
                header("Location: index.php?mostrar=home");
            }
        }else {
            if ($login_usu == 'superadmin') {
                    if ($check_empleado['usu'] == $login_usu && $check_empleado['psw'] == $login_clv) {
                        $_SESSION['id'] = $check_empleado['idusuario'];
                        $_SESSION['nombres'] = $check_empleado['nombres_empleado'];
                        $_SESSION['apellidos'] = $check_empleado['apellidos_empleado'];
                        $_SESSION['usuario'] = $check_empleado['usu'];
    
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
        $check_docente = $conn->query("SELECT * FROM docente d inner join usuario u on d.idusuario=u.idusuario and u.usu='$login_usu' and u.estado=1;");
        if($check_docente->rowCount()==1){
            $check_docente = $check_docente->fetch();
            if ($check_docente['usu'] == $login_usu && $check_docente['psw']==$login_clv) {
                $_SESSION['id'] = $check_docente['idusuario'];
                $_SESSION['nombres'] = $check_docente['nombres_docente'];
                $_SESSION['apellidos'] = $check_docente['apellidos_docente'];
                $_SESSION['usuario'] = $check_docente['usu'];

                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?mostrar=home'; </script>";
                } else {
                    header("Location: index.php?mostrar=home");
                }
            }else {
                echo    '<div class="notification is-danger is-light">
                    <strong>¡Los datos ingresados no son validos, intente nuevamente!</strong><br>
                    </div>';
            }
        }else {
            echo    '<div class="notification is-danger is-light">
                <strong>¡Los datos ingresados no son validos, intente nuevamente!</strong><br>
                </div>';
        }
    }
}


$check_usuario = null;
