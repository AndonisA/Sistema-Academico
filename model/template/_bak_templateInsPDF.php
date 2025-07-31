<?php 
  function matter($e){
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
        $listMatter .="<td class='text-center'>".$row['codigo']."35</td>";
        $unitCredit = $row['UC'];
      }
    }
    $listMatter .= "</tr>";
    $data = ["matter" => $listMatter, "Credit" => $unitCredit];
    return $data;
  }
  function plantilla($getID, $uB, $uD, $prd, $ct1, $ct2, $ct3){
    include('connectDataBase.php');

    $cedulaBD = $getID;
    $sql = "SELECT * FROM estudiantes WHERE cedula=$cedulaBD";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while(($row=mysqli_fetch_array($result)) && ($row['cedula'] == $cedulaBD)){
      $cedula = $row['cedula'];
      $nombre = $row['nombres'];
      $procedencia = $row['procedencia'];
      $carrera = $row['carrera'];
      $periodo = $row['periodoIngreso'];
    } 
    $sql = "SELECT * FROM alumnoinscrito WHERE cedula=$cedulaBD";
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
          <div class='h6'>PERIODO ACADÉMICO: $actualPeriodo</div>
          <div class='h6'>PLANILLA DE INSCRIPCIÓN</div>
        </div>
      </header>
      <div class='mb-3 text-left mt-0'>
        <strong class='info'>CÉDULA DE IDENTIDAD:</strong> ".number_format($cedula, 0," ", ".")." <br>
        <strong class='info'>NOMBRES Y APELLIDOS:</strong> $nombre <br>
        <strong class='info'>CARRERA:</strong> $carreraStudent <br>
        <strong class='info'>PERIODO DE INGRESO:</strong> $periodo <br>
        <strong class='info'>PROCEDENCIA DE RESIDENCIA:</strong> $procedencia
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
              <th class='service'>CÓDIGO</th>
              <th class='desc'>NOMBRE DE LA UNIDAD CURRICULAR</th>
              <th>U.C.</th>
              <th>SECCIÓN</th>              
            </tr>
          </thead>
          <tbody>
            <tr>
              ";
    
    $sql = "SELECT * FROM alumnoinscrito WHERE cedula=$cedula AND periodo='$prd'";
    $result = $connect->query($sql);
    $giveMatter = "";
    $array = array();
    $totalUC = 0;
    $row = $result->num_rows;
    while(($row=$result->fetch_array()) && ($row['cedula'] == $cedula)){
      if($row['materia1'] != null){
        $giveMatter = matter($row['materia1']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia2'] != null){
        $giveMatter = matter($row['materia2']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia3'] != null){
        $giveMatter = matter($row['materia3']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia4'] != null){
        $giveMatter = matter($row['materia4']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia5'] != null){
        $giveMatter = matter($row['materia5']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia6'] != null){
        $giveMatter = matter($row['materia6']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia7'] != null){
        $giveMatter = matter($row['materia7']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
      if($row['materia8'] != null){
        $giveMatter = matter($row['materia8']);
        $pdf .= $giveMatter["matter"];
        array_push($array, $giveMatter["Credit"]);
      }
    }
    $totalUC = array_sum($array);
    $valUC = $uB;
    $calUC = $valUC * $totalUC;
    $valUCD = $uD;
    $calUCD = $valUCD * $totalUC;
    $cuotaB = number_format($calUC/3, 2, ",", ".");
    $cuotaD = number_format($calUCD/3, 2, ",", ".");
    $pdf .="
            <tr>
              <td colspan='2' class='grand total'>TOTAL DE UNIDADES DE CRÉDITO INSCRITAS:</td>
              <td colspan='1' class='grand total'>$totalUC</td>
              <td colspan='1' class='grand total'><br></td>
            </tr>
          </tbody>
        </table>
        <table class='mt-5'>
          <thead>
            <tr>
              <th colspan='4' class='service'>Valor en bolivares</th>
              <th colspan='4' class='desc'>Valor en dolares</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan='3'>Valor de la unidad de crédito:</td>
              <td colspan='1'>".number_format($valUC,2, ",", ".")." BsS</td>
              <td colspan='3'>Valor de la unidad de crédito:</td>
              <td colspan='1'>".number_format($valUCD,2, ",", ".")." $</td>
            </tr>
            <tr>
              <td colspan='3'>Costo total del lapso académico:</td>
              <td colspan='1'>".number_format($calUC,2, ",", ".")." BsS</td>
              <td colspan='3'>Costo total del lapso académico:</td>
              <td colspan='1'>".number_format($calUCD,2, ",", ".")." $</td>
            </tr>
          </tbody>
        </table>
        <div class='text-center mt-3'>
          <div>Cronograma de pago</div>
          <br>
          <table>
            <thead>
              <tr>
                <th><br></th>
                <th>Cuotas Bs</th>
                <th>Fecha de pago</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong class='info'>Cuota 1:</strong></td>
                <td>$cuotaB Bs</td>
                <td>$ct1</td>
              </tr>
              <tr>
                <td><strong class='info'>Cuota 2:</strong></td>
                <td>$cuotaB Bs</td>
                <td>$ct2</td>
              </tr>
              <tr>
                <td><strong class='info'>Cuota 3:</strong></td>
                <td>$cuotaB Bs</td>
                <td>$ct3</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class='text-center mt-3'>
          <table>
              <thead>
                <tr>
                  <th><br></th>
                  <th>Cuotas $</th>
                  <th>Fecha de pago</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong class='info'>Cuota 1:</strong></td>
                  <td>$cuotaD $</td>
                  <td>$ct1</td>
                </tr>
                <tr>
                  <td><strong class='info'>Cuota 2:</strong></td>
                  <td>$cuotaD $</td>
                  <td>$ct2</td>
                </tr>
                <tr>
                  <td><strong class='info'>Cuota 3:</strong></td>
                  <td>$cuotaD $</td>
                  <td>$ct3</td>
                </tr>
              </tbody>
            </table>
        </div>
      </main>
      <footer>
        UNIVERSIDAD ALONSO DE OJEDA
        <br>
        Sistema desarrollado por Andonis Harin Ayala Avila
      </footer>
    </body>
    ";
    return $pdf;
  }
?>

