<?php
    session_start();
    if(!$_SESSION['username']){
        header("Location: ../../../index.php");
    }
    if(isset($_SESSION['username'])){
        $_SESSION['loggedin'];
    }
    if(isset($_SESSION['expire'])){
        $inactive = 1200;
        $sessionTime = time() - $_SESSION['expire'];
        if($sessionTime > $inactive){
            session_unset();
            session_destroy();
            header("Location: ../../../index.php");
        } else {
            $_SESSION['expire'] = time();
        }
    } else {
        $_SESSION['expire'] = time();
    }
    if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)){
        echo "
        <div class='bg-bs'>
        <svg class='bi bi-people-circle float-left mt-2 ml-2' width='2em' height='2em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
        <path d='M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z'/>
        <path fill-rule='evenodd' d='M8 9a3 3 0 100-6 3 3 0 000 6z' clip-rule='evenodd'/>
        <path fill-rule='evenodd' d='M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z' clip-rule='evenodd'/>
        </svg> 
        <div class='mt-2 ml-2 float-left'>Bienvenido <strong>[".$_SESSION['username']."]</strong></div>"."<button type='button' class='ml-2 mt-1 mb-2 btn btn-dark btn-outline-light destroySession'>Cerrar Sesion</button></div>
        ";

        echo "
        <div class='bg-Uniojeda m-0'>
            <nav class='navbar navbar-expand-md navbar-light bg-Uniojeda border-bottom border-fermaca m-0'>
                <img class='position-relative mt-2 float-left' src='../../../SistemaEaD/style/icon/ead-logo.jpg' alt='logo-Uniojeda' height='95px'>
                <div class='container-fluid'>
                    <h1 class='h4 text-light'>UNIVERSIDAD ALONSO DE OJEDA</h1>
                    <button type='button' class='navbar-toggler ml-auto' data-toggle='collapse' data-target='#navBar'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div id='navBar' class='collapse navbar-collapse m-0'>
                        <ul class='navbar-nav ml-auto'>
                            <li class='nav-item'><a class='nav-link text-white' href='../../../SistemaEaD/model/html/estudiante.php'>Estudiantes</a></li>
                            <li class='nav-item'><a class='nav-link text-white' href='../../../SistemaEaD/model/html/materia.php'>Materias y periodos</a></li>
                            <li class='nav-item'><a class='nav-link text-white' href='../../../SistemaEaD/model/html/notas.php'>Notas</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>";
    }
    echo"<br>";
?>