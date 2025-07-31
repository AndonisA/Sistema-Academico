<?php 
error_reporting(E_ALL ^ E_NOTICE);
  function matter($e, $s){
    $row = null;
    $unitCredit = null;
    $listMatter = null;
    $listMatter = "<tr>";
    include('connectDataBase.php');
    $sql ="SELECT * FROM materias WHERE codigo='$e'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    if($e != null){
      while(($row=mysqli_fetch_array($result)) && ($row['codigo'] == $e)){
        $listMatter .="<td class='text-center'>".$row['codigo']."</td>";
        $listMatter .="<td class='text-center'>".$row['materia']."</td>";
        $listMatter .="<td class='text-center'>". $row['UC']."</td>";
        $countLength = strlen($row['codigo'])-1;
        for ($i=0; $i < $countLength ; $i++) { 
          # code...
          $section .=$row['codigo'][$i] ;
        }
        echo $s;
        $section .= $s;
        $listMatter .="<td class='text-center'>".$section."</td>";
        $unitCredit = $row['UC'];
      }
    }
    $listMatter .= "</tr>";
    $data = ["matter" => $listMatter, "Credit" => $unitCredit];
    return $data;
  }
  function plantilla($getID, $periodo){
    include('connectDataBase.php');
    $periodoActual = $periodo;
    $cedulaBD = $getID;

    $sql = "SELECT * FROM estudiantes WHERE cedula=$cedulaBD";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
      $cedula = $row['cedula'];
      $nombre = $row['nombres'];
      $correo = $row['email'];
      $procedencia = $row['procedenciaPago'];
      $carrera = $row['carrera'];
    } 

    $sql = "SELECT * FROM alumnoinscrito WHERE cedula=$cedulaBD and periodo='$periodoActual'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
      $actualPeriodo = $row['periodo'];
    }

    $sql = "SELECT * FROM carrera WHERE codigo=$carrera";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['codigo'] == $carrera)){
      $carreraStudent = $row['nombre'];
    }

    $sql = "SELECT * FROM procedencia WHERE id=$procedencia";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['id'] == $procedencia)){
      $procedenciaStudent = $row['procedencia'];
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
          <h1 class='h2'>UNIVERSIDAD ALONSO DE OJEDA</h1>
          <h2 class='h6'>PREGRADO</h2>
        </div>
      </header>
      <div class='mb-3 text-left mt-0'>
        <strong class='info'>CÉDULA DE IDENTIDAD:</strong> ".number_format($cedula, 0," ", ".")." <br>
        <strong class='info'>NOMBRES Y APELLIDOS:</strong> ".strtoupper($nombre)." <br>
        <strong class='info'>CORREO:</strong> $correo <br>
        <strong class='info'>CARRERA:</strong> ".strtoupper($carreraStudent)." <br>
        <strong class='info'>PROCEDENCIA:</strong> $procedenciaStudent <br>
        <strong class='info'>FECHA:</strong> $date<br> 
      </div>
      <div class='col-12 text-center m-1'>
        <strong class='info'>
          UNIDAD CURRICULARES INSCRITAS
        </strong>	
      </div>
      <main>
        <table>
          <thead>
            <tr>
              <th>CODIGO</th>
              <th>NOMBRE DE LA MATERIA</th>              
              <th>U.C.</th>
              <th>SECCION</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              ";
    $sql ="SELECT * FROM alumnoinscrito WHERE cedula=$cedula AND periodo='$actualPeriodo'";
    $result = $connect->query($sql);
    $giveMatter = "";
    $array = array();
    $totalUC = 0;
    $row = $result->num_rows;
    while(($row=$result->fetch_array()) && ($row['cedula'] == $cedulaBD)){
      if($row['materia1'] != null){
        $giveMatter = matter($row['materia1'], $row['seccion1']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia2'] != null){
        $giveMatter = matter($row['materia2'], $row['seccion2']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia3'] != null){
        $giveMatter = matter($row['materia3'], $row['seccion3']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia4'] != null){
        $giveMatter = matter($row['materia4'], $row['seccion4']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia5'] != null){
        $giveMatter = matter($row['materia5'], $row['seccion5']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia6'] != null){
        $giveMatter = matter($row['materia6'], $row['seccion6']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia7'] != null){
        $giveMatter = matter($row['materia7'], $row['seccion7']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia8'] != null){
        $giveMatter = matter($row['materia8'], $row['seccion8']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
    }
    $totalUC = array_sum($array);
    $sql = "SELECT * FROM periodo WHERE idPeriodo='$periodoActual'";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['idPeriodo'] == $periodoActual)){
      $ucB = $row['UCB'];
      $ic = $row['IC'];
      $ct1 = $row['cuota1'];
      $ct2 = $row['cuota2'];
      $ct3 = $row['cuota3'];
      $ct4 = $row['cuota4'];
    }
      /* if($row['materia8'] != null){
        $giveMatter = matter($row['materia8']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      } */
      $totalB = $totalUC * $ucB;
      $ct = ($totalB-$ic)/4;
      $pdf .="
            <tr>
              <td colspan='2' class='grand total'>TOTAL DE UNIDADES DE CRÉDITO INSCRITAS:</td>
              <td colspan='1' class='grand total'>$totalUC</td>
              <td colspan='1' class='grand total'><br></td>
            </tr>
          </tbody>
        </table>
        <table class='mt-1'>
          <tbody>
            <tr>
              <td colspan='3'>Valor de la unidad de crédito:</td>
              <td colspan='1'>".number_format($ucB,2, ",", ".")." PETRO</td>
            </tr>
            <tr>
              <td colspan='3'>Costo total del lapso académico:</td>
              <td colspan='1'>".number_format($totalB,2, ",", ".")." PETRO</td>
            </tr>
          </tbody>
        </table>
        <div class='text-center'>
          <div>Cronograma de pago</div>
          <br>
          <table>
            <thead>
              <tr>
                <th colspan='1'><br><br></th>
                <th colspan='2'>Cuotas</th>
                <th colspan='1'>Fecha de pago</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong class='info'>Cuota Inicial:</strong></td>
                <td>"."</td> <td>".number_format($ic,2, ",", ".")." PETRO</td> 
                <td></td>
              </tr>
              <tr>
                <td><strong class='info'>Cuota 1:</strong></td>
                <td>"."</td> <td>".number_format($ct,2, ",", ".")." PETRO</td> 
                <td>$ct1</td>
              </tr>
              <tr>
                <td><strong class='info'>Cuota 2:</strong></td>
                <td>"."</td> <td>".number_format($ct,2, ",", ".")." PETRO</td> 
                <td>$ct2</td>
              </tr>
              <tr>
                <td><strong class='info'>Cuota 3:</strong></td>
                <td>"."</td> <td>".number_format($ct,2, ",", ".")." PETRO</td> 
                <td>$ct3</td>
              </tr>
              <tr>
                <td><strong class='info'>Cuota 4:</strong></td>
                <td>"."</td> <td>".number_format($ct,2, ",", ".")." PETRO</td> 
                <td>$ct4</td>
              </tr>
            </tbody>
          </table>
        </div>
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
    return $pdf;
  }
