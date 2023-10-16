<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="./index.php?mostrar=home">
      <img src="./img/logo3.jpg" alt="CONTROL NOTAS" style="width: 150px;height: 150px;">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
   
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          ADMINISTRATIVA
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="./index.php?mostrar=rol_form">
            Roles
          </a>
          <a class="navbar-item" href="./index.php?mostrar=personal_form">
            Módulos
          </a>
          <a class="navbar-item" href="./index.php?mostrar=personal_form">
            Empleado
          </a>
          <a class="navbar-item" href="./index.php?mostrar=personal_form">
            Docente
          </a>
          <a class="navbar-item" href="./index.php?mostrar=personal_form">
            Estudiante
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          ITINERARIO FORMATIVO
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="./index.php?mostrar=consulta_form">
            Programas de estudio
          </a>
          <a class="navbar-item" href="./index.php?mostrar=paciente_form">
            Módulos de Carrera
          </a>
          <a class="navbar-item" href="./index.php?mostrar=paciente_form">
            Unidades Didácticas
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          ASIGNACION U.D.
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="./index.php?mostrar=historia_form">
            Docente
          </a>
          <a class="navbar-item" href="./index.php?mostrar=historial_form_antiguo">
            Gestionar U.D.
          </a>
          <a class="navbar-item" href="./index.php?mostrar=historia_form">
            Estudiante
          </a>
          <a class="navbar-item" href="./index.php?mostrar=historia_form">
            Matricula
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          GESTION DE NOTAS
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="./index.php?mostrar=historia_form">
            Capacidad Terminal
          </a>
          <a class="navbar-item" href="./index.php?mostrar=historial_form_antiguo">
            Criterios de Evalución
          </a>
          <a class="navbar-item" href="./index.php?mostrar=historial_form_antiguo">
            Evalución
          </a>
        </div>
      </div>
      <!-- <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          RESPORTES
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="./index.php?mostrar=historia_form">
            Notas
          </a>
        </div>
      </div> -->

    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a href="index.php?mostrar=personal_update&idusuario_up=<?php echo $_SESSION['id'] ?>" class="button is-primary">
            <strong>Bienvenido <?php echo $_SESSION['nombres']." ".$_SESSION['apellidos'] ?></strong>
          </a>
          <a href="index.php?mostrar=logout" class="button is-danger">
            Salir
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>