<?php
require_once "./conexion/conection_db.php"; 
?>
<div class="container">
    <div>
        <br>
        <h1 class="title">ROL</h1>
        <h2 class="subtitle">Lista de rol</h2>
        <hr class="division">
        <div class="buttons">
            <a class="button is-info" href="./index.php?mostrar=rol_nuevo">
                <span>AGREGAR ROL</span>
            </a>
        </div>
    </div>
    <br>
    <div>

        <div class="container pb-6 pt-6 ">
        <?php

                if(isset($_POST['modulo_buscador'])){
                    require_once "./php/buscador.php";
                }

                if (!isset($_SESSION['busqueda_rol']) && empty($_SESSION['busqueda_rol'])) {

                ?>

                <div class="columns">
                    <div class="column">
                        <form action="" method="POST" autocomplete="off">
                            <input type="hidden" name="modulo_rol" value="personal">
                            <div class="field is-grouped">
                                <P class="control is-expanded">
                                    <input class="input is-rounded" type="text" name="txt_buscador" 
                                    placeholder="¿Puedes realizar la busqueda por nombre del rol?" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,30}" maxlength="30">
                                </P>
                                <p class="control">
                                    <button class="button is-info" type="submit">Buscar</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                    // verificar si existe o no la varible de tipo get 
                    if (!isset($_GET['page'])) {
                        $pagina = 1;
                    } else {
                        $pagina = (int) $_GET['page'];
                        if ($pagina <= 1) {
                            $pagina = 1;
                        }
                    }

                    $pagina = limpiar_cadena($pagina);
                    $url = "index.php?mostrar=rol_form&page=";
                    $registros = 15;
                    $busqueda = "";
                    require_once "./php/rol_lista.php";

                    
                    } else {
                ?>

                <div class="columns">
                    <div class="column">
                        <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off">
                            <input type="hidden" name="modulo_buscador" value="personal">
                            <input type="hidden" name="eliminar_buscador" value="personal">
                            <p style="color:#000">Estas buscando <strong>""</strong></p>
                            <br>
                        </form>
                    </div>
                </div>
                
                <?php
                    //para eliminar personal

                    // if(isset($_GET['idusuario_del'])){
                    //     require_once "./php/personal_eliminar.php";
                    // }

                    // verificar si existe o no la varible de tipo get 
                    if (!isset($_GET['page'])) {
                        $pagina = 1;
                    } else {
                        $pagina = (int) $_GET['page'];
                        if ($pagina <= 1) {
                            $pagina = 1;
                        }
                    }
                    $pagina = limpiar_cadena($pagina);
                    $url = "index.php?mostrar=rol_form&page=";
                    $registros = 15;
                    $busqueda = $_SESSION['busqueda_rol'];

                    require_once "./php/rol_lista.php";
                    }
                    ?>
        </div>
    </div>
</div>