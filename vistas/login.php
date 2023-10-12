<div class="main-container">

    <article class="panel is-primary">
        <p class="panel-heading">
            SISTEMA DE NOTAS DEL IESTP SAN MARCOS
        </p>
        <form class="box login" action="" method="POST" autocomplete="off">
            <div class="field">
                <label class="label">Usuario</label>
                <div class="control">
                    <input class="input" type="text" name="login_usu" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required placeholder="junior.emt10@gmail.com" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" type="password" name="login_clv" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" placeholder="********" required>
                </div>
            </div>

            <button type="submit" class="button is-primary">Ingresar</button>
            <button class="button is-danger">Salir</button>

            <?php
                if(isset($_POST['login_usu']) && isset($_POST['login_clv'])){
                    require_once "./conexion/conection_db.php";
                    require_once "./php/main.php";
                    require_once "./php/iniciar_sesion.php";
                }
            ?>
        </form>

    </article>

</div>