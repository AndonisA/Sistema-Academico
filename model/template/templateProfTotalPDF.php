<?php
  function career($e){
    $row = null;
    $career = null;
    include('connectDataBase.php');
    $sql ="SELECT * FROM carrera WHERE codigo=$e";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    if($e != null){
      while(($row=mysqli_fetch_array($result)) && ($row['codigo'] == $e)){
        $career = $row['nombre'];
      }
    }
    $data = ["career" => $career];
    return $data;
  }
  function matter($e){
    $row = null;
    $matter = null;
    include('connectDataBase.php');
    $sql ="SELECT * FROM materias WHERE codigo='$e'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    if($e != null){
      while(($row=mysqli_fetch_array($result)) && ($row['codigo'] == $e)){
        $matter = $row['materia'];
      }
    }
    $data = ["matter" => $matter];
    return $data;
  }
  function student($e){
    $row = null;
    $name = null;
    $career = null;
    include('connectDataBase.php');
    $sql ="SELECT * FROM estudiantes WHERE cedula='$e'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    if($e != null){
      while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $e)){
        $id = $row['cedula'];
        $name = $row['nombres'];
        $career = $row['carrera'];
      }
    }
    $data = ["name" => $name, "career" => $career, "id" => $id];
    return $data;
  }
  function studentMatter($e, $m){
    $row = null;
    $listStudent = null;
    $listCareer = null;
    $listId = null;
    include('connectDataBase.php');
    $sql ="SELECT * FROM notasestudiante WHERE periodo='$e' AND materia='$m'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    if($e != null){
      while(($row=mysqli_fetch_array($result)) && ($row['periodo'] == $e) && ($row['materia'] == $m)){
        $tempName = student($row['cedulaEstudiante']);
        $listStudent .=$tempName['name']."<br>";
        $listId .=$tempName['id']."<br>";
        $tempCareer = career($tempName['career']);
        $listCareer .=$tempCareer['career']."<br>";
      }
    }
    //$listMatter .= "</tr>";
    $data = ["listStudent" => $listStudent, "listCareer" => $listCareer, "listId" => $listId];
    return $data;
  }
  function plantilla($prd){
    include('connectDataBase.php'); 
    date_default_timezone_set('America/Caracas');
    $date = date('m/d/Y', time());
    $time = date('h:i:s a', time());
    /* function ve_date($d){
      date_default_timezone_set("America/Caracas");
      $t = time()-(1800);
      return date($d,$t);
      }
      echo ve_date('h:i A, d-m-Y'); */
    $pdf ="
    <body>
      <header class='clearfix'>
        <div id='logo'>
          <img src='../../style/icon/cropped-UNIOJEDA-sin-fondo-32x32.png'>
        </div>
        <div class='text-right'>$time</div>
        <div class='text-center'>
          <h1 class='m1'>UNIVERSIDAD ALONSO DE OJEDA</h1>
          <h2 class='h6'>PREGRADO</h2>
          <div class='h6'>PERIODO ACADÉMICO: $prd</div>
        </div>
      </header>
      <div class='mt-2 mb-3 text-left'>
          <strong class='info'>FECHA:</strong> $date<br>
      </div>
      <div class='col-12 text-center m-2'>
        <strong class='info'>
          LISTA DE PAGO DE PROFESORES
        </strong>	
        <br>
        A/A
      </div>
      <main>
        <table>
          <thead>
            <tr>
              <th>PROFESOR</th>
              <th>MATERIA</th>
              <th>ESTUDIANTE</th>
              <th>CEDULA</th>
              <th>CARRERA</th>
            </tr>
          </thead>
          <tbody>
            
              ";
              $sql ="SELECT * FROM profmater WHERE periodo='$prd'";
              $result = $connect->query($sql);
              $row = $result->num_rows;
              while(($row=mysqli_fetch_array($result)) && ($row['periodo'] == $prd)){
                $sqlE ="SELECT * FROM profesores WHERE cedula=".$row['cedulaProfesor'];
                $resultE = $connect->query($sqlE);
                $rowE = $resultE->num_rows;
                $rowE=mysqli_fetch_array($resultE);
                $pdf .= "<tr>";
                $pdf .="<td class='text-center'>".$rowE['nombres']."</td>";
                $nameMatter = matter($row['materia']);
                $pdf .="<td class='text-center'>".$nameMatter['matter']."</td>";
                $student = studentMatter($prd, $row['materia']);
                $pdf .= $student['listStudent'];
                $pdf .="<td class='text-center'>".$student['listStudent']."</td>";
                $pdf .="<td class='text-center'>".$student['listId']."</td>";
                $pdf .="<td class='text-center'>".$student['listCareer']."</td>";
                $pdf .= "</tr>";
                

              }
              
    $pdf .="
            <tr>
              <td colspan='7' class='grand total'><br></td>
            </tr>
          </tbody>
        </table>

      </main>
      <footer>
        UNIVERSIDAD ALONSO DE OJEDA
        <br>
      </footer>
    </body>
    ";
    return $pdf;
  }
