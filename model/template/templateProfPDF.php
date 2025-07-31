<?php
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
      <div class='mb-3 text-left mt-0'>
        <strong class='info'>CODIGO DE LA MATERIA:</strong> $code<br>
        <strong class='info'>NOMBRE DE LA MATERIA:</strong> $matter<br>
        <strong class='info'>CARRERA: </strong>$college <br> 
      </div>
      <div class='mt-2 mb-3 text-left'>
          <strong class='info'>FECHA:</strong> $date<br>
      </div>
      <div class='col-12 text-center m-2'>
        <strong class='info'>
          LISTA DE PROFESORES
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
              <th>CORREO</th>
            </tr>
          </thead>
          <tbody>
            
              ";
              $num = 0;
              $sql ="SELECT * FROM profmater WHERE materia='$getMatter' AND periodo='$prd'";
              $result = $connect->query($sql);
              $row = $result->num_rows;
              while(($row=mysqli_fetch_array($result)) && ($row['materia'] == $getMatter)){
                $num++;
                $sqlE ="SELECT * FROM profesores WHERE cedula=".$row['cedulaProfesor'];
                $resultE = $connect->query($sqlE);
                $rowE = $resultE->num_rows;
                $rowE=mysqli_fetch_array($resultE);
                $pdf .= "<tr>";
                $pdf .="<td class='text-center'>".$num."</td>";
                $pdf .="<td class='text-center'>".$row['cedulaProfesor']."</td>";
                $pdf .="<td class='text-center'>".$rowE['nombres']."</td>";
                $pdf .="<td class='text-left'>".$rowE['correo']."</td>";

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
