<?php
  error_reporting(E_ALL);
  function plantilla($correoPDF,$prd){
    echo "[".$correoPDF."]";
    $array = array();
    include('connectDataBase.php');
    $periodo = $prd;
    $sql = "SELECT * FROM notasestudiantes WHERE correo='$correoPDF'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    $row=mysqli_fetch_array($result);
    $ID = $row['cedula'];
    $name = $row['apellido']." ".$row['nombre'];
    date_default_timezone_set('America/Caracas');
    $date = date('d/m/Y', time());
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
          <h2 class='h5'>$periodo</h2>
          <h2 class='h6'>PREGRADO</h2>
          <div class='h6'>CORTE DE NOTAS</div>
        </div>
      </header>
      <div class='mb-3 text-left mt-0'>
        <strong class='info'>CEDULA: </strong>".number_format($ID, 0," ", ".")."<br>
        <strong class='info'>NOMBRE Y APELLIDO:</strong> $name <br>
        <strong class='info'>CORREO: </strong> $correoPDF <br> 
        <strong class='info'>FECHA:</strong> $date<br>
      </div>
      <div class='col-12 text-center m-2'>
        <strong class='info'>
          UNIDADES CURRICULARES INSCRITAS
        </strong>
        <br>
        A/A
      </div>
      <main>
        <table>
          <thead>
            <tr>
              <th>N°</th>
              <th>MATERIA</th>
              <th>SECCIÓN</th>
              <th>CORTE I</th>
              <th>CORTE II</th>
              <th>CORTE III</th>
              <th>DEFINITIVA</th>
            </tr>
          </thead>
          <tbody>
            
              ";
              $num = 0;
              $sql ="SELECT * FROM notas WHERE correo='$correoPDF' AND periodo='$periodo'";
              $result = $connect->query($sql);
              $row = $result->num_rows;
              while(($row=mysqli_fetch_array($result)) && ($row['correo'] == $correoPDF)){
                $periodo = $row['periodo'];
                $num++;
                $total = $row['definitiva'];
                if($total == 0 ){
                  $total = "NP";
                }
                $pdf .= "<tr>";
                $pdf .="<td class='text-center'>".$num."</td>";
                $pdf .="<td class='text-center'>".$row['asignatura']."</td>";
                $pdf .="<td class='text-center'>".$row['seccion']."</td>";
                if($row['definitiva'] == "AP" || $row['definitiva'] == "RP"){
                  $pdf .="<td class='text-center'> </td>";
                  $pdf .="<td class='text-center'> </td>";
                  $pdf .="<td class='text-center'> </td>";
                  $pdf .="<td class='text-center'>".$row['definitiva']."</td>";
                }else{
                  if($row['corte1'] == null || $row['corte1'] == "" || $row['corte1'] == "-" || $row['corte1'] == "NP" || $row['corte1'] == "np" || $row['corte1'] == "Np"){
                    $pdf .="<td class='text-center'> 0 </td>";
                  } else{
                    $pdf .="<td class='text-center'>".$row['corte1']."</td>";
                  }
                  if($row['corte2'] == null || $row['corte2'] == "" || $row['corte2'] == "-" || $row['corte2'] == "NP" || $row['corte2'] == "np" || $row['corte2'] == "Np"){
                    $pdf .="<td class='text-center'> 0 </td>";
                  } else{
                    $pdf .="<td class='text-center'>".$row['corte2']."</td>";
                  }
                  if($row['corte3'] == null || $row['corte3'] == "" || $row['corte3'] == "-" || $row['corte3'] == "NP" || $row['corte3'] == "np" || $row['corte3'] == "Np"){
                    $pdf .="<td class='text-center'> 0 </td>";                    
                  } else{
                    $pdf .="<td class='text-center'>".$row['corte3']."</td>";                    
                  }
                  $totalTemp = ($row['corte1']*0.2)+($row['corte2']*0.4)+($row['corte3']*0.4);
                  $pdf .="<td class='text-center'>".$totalTemp."</td>";
                  $total = $totalTemp;
                 /*  if($row['definitiva'] != $totalTemp){
                  } else {
                    $pdf .="<td class='text-center'>".$row['definitiva']."</td>";
                    $total = $row['definitiva'];
                  } */
                  array_push($array, $total);
                }
                $pdf .= "</tr>";
              }
              //$valorInicial = 0;
              $test = array_sum($array);
              /* $sum = array_reduce($array, function ($acarreo, $numero) {
                return $acarreo + $numero;
              }, $valorInicial); */
              $cantidadDeElementos = count($array);
              //$promedio = $sum / $cantidadDeElementos;
              $promedio = $test / $cantidadDeElementos;
    $pdf .="
            <tr>
              <td colspan='6' class='grand total'>Promedio del estudiante:<br></td>
              <td colspan='1' class='grand total text-right'>".number_format($promedio,2, ",", ".")."<br></td>
            </tr>
          </tbody>
        </table>

      </main>
      <footer>
        UNIVERSIDAD ALONSO DE OJEDA
        <br>
        www.uniojeda.edu.ve
        <br>
        Sistema desarrollado por Andonis Harin Ayala Avila
      </footer>
    </body>
    ";
    //header("Cache-Control: no-cache, must-revalidate");
    return $pdf;
  }
