<?php
function profesor($codeMatter, $periodo){
  include('connectDataBase.php');
  $sql = "SELECT * FROM profmater WHERE materia='$codeMatter' AND periodo='$periodo'";
  $result = $connect->query($sql);
  $row = $result->num_rows;
  while(($row=mysqli_fetch_array($result))&&($row['materia'] == $codeMatter && $row['periodo'] == $periodo)){
    $cedulaProfesor = $row['cedulaProfesor'];
  }  
  $sql = "SELECT * FROM profesores WHERE cedula=$cedulaProfesor";
  $result = $connect->query($sql);
  $row = $result->num_rows;
  while(($row=mysqli_fetch_array($result))&&($row['cedula'] == $cedulaProfesor)){
    $nombreProfesor = $row['nombres'];
  } 
  $data = ['cedula' => $cedulaProfesor, 'nombre' => $nombreProfesor];
  return $data;
}
  function plantilla($getMatter, $prd){
    include('connectDataBase.php');
    $sql = "SELECT * FROM materias WHERE codigo='$getMatter'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    $row=mysqli_fetch_array($result);
    if ($row['codigo'] == $getMatter){
      $matter = $row['materia'];
      $code = $row['codigo'];
      $codeCollege = $row['carrera'];
    }  
    $sql = "SELECT * FROM carrera WHERE codigo=$codeCollege";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    $row=mysqli_fetch_array($result);
    if ($row['codigo'] == $codeCollege){
      $college = $row['nombre'];
    }  
    date_default_timezone_set('America/Caracas');
    $dataTeacher = profesor($code, $prd);
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
          <div class='h6'>PLANILLA DE ESTUDIANTES</div>
        </div>
      </header>
      <div class='mb-3 text-left mt-0'>
        <strong class='info'>CODIGO DE LA MATERIA:</strong> $code<br>
        <strong class='info'>NOMBRE DE LA MATERIA:</strong> $matter<br>
        <strong class='info'>CARRERA: </strong> $college <br> 
        <strong class='info'>NOMBRE DEL PROFESOR: </strong>".$dataTeacher['nombre']." <br> 
        <strong class='info'>CEDULA: </strong>".number_format($dataTeacher['cedula'], 0," ", ".")." <br> 
      </div>
      <div class='mt-2 mb-3 text-left'>
          <strong class='info'>FECHA:</strong> $date<br>
      </div>
      <div class='col-12 text-center m-2'>
        <strong class='info'>
          UNIDAD CURRICULARES INSCRITAS
        </strong>
        <br>
        A/A
      </div>
      <main>
        <table>
          <thead>
            <tr>
              <th >N°</th>
              <th >CEDULA</th>
              <th>NOMBRE Y APELLIDO</th>
              <th>CORTE I</th>
              <th>CORTE II</th>
              <th>CORTE III</th>
              <th>TOTAL</th>
            </tr>
          </thead>
          <tbody>
            
              ";
              $num = 0;
              $sql ="SELECT * FROM notasestudiante WHERE periodo='$prd' AND materia='$getMatter'";
              $result = $connect->query($sql);
              $row = $result->num_rows;
              while(($row=mysqli_fetch_array($result)) && ($row['materia'] == $getMatter)){
                $num++;
                $sqlE ="SELECT * FROM estudiantes WHERE cedula=".$row['cedulaEstudiante'];
                $resultE = $connect->query($sqlE);
                $rowE = $resultE->num_rows;
                $rowE=mysqli_fetch_array($resultE);
                $totalTemp = ($row['m1n1']*0.2)+($row['m1n2']*0.4)+($row['m1n2']*0.4);
                $total = round($totalTemp);
                if($total == 0 ){
                  $total = "NP";
                }
                $pdf .= "<tr>";
                $pdf .="<td class='text-center'>".$num."</td>";
                $pdf .="<td class='text-center'>".$row['cedulaEstudiante']."</td>";
                $pdf .="<td class='text-center'>".$rowE['nombres']."</td>";
                $pdf .="<td class='text-center'>".$row['m1n1']."</td>";
                $pdf .="<td class='text-center'>".$row['m1n2']."</td>";
                $pdf .="<td class='text-center'>".$row['m1n3']."</td>";
                $pdf .="<td class='text-center'>".$total."</td>";
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
