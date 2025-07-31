<?php
function matter($e, $s)
{
  $row = null;
  $unitCredit = null;
  $listMatter = null;
  $listMatter = "<tr>";
  include('connectDataBase.php');
  $sql = "SELECT * FROM materias WHERE codigo='$e'";
  $result = $connect->query($sql);
  $row = $result->num_rows;
  if ($e != null) {
    while (($row = mysqli_fetch_array($result)) && ($row['codigo'] == $e)) {
      $unitCredit = $row['UC'];
    }
  }
  $listMatter .= "</tr>";
  $data = ["matter" => $listMatter, "Credit" => $unitCredit];
  return $data;
}

function plantilla($prd)
{
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
  $pdf = "
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
              <th>N</th>
              <th>CEDULA</th>
              <th>NOMBRE Y APELLIDO</th>
              <th>PROCEDENCIA</th>
              <th>CARRERA</th>
              <th>UC</th>
            </tr>
          </thead>
          <tbody>
            
              ";
  $num = 0;
  $StotalUC = 0;
  $StudentBefore = "";
  if (isset($prd)) {
    $sql = "SELECT * FROM alumnoinscrito WHERE periodo='$prd' ORDER BY cedula ASC";
    $result = $connect->query($sql);
    $row = $result->num_rows;
    while (($row = mysqli_fetch_array($result))) {
      
      if($StudentBefore == $row['cedula']){
        echo "este esta duplicado: ".$row['cedula']."</br>" ;
      }      
      
      $sqlE = "SELECT * FROM estudiantes WHERE cedula=" . $row['cedula'];
      $resultE = $connect->query($sqlE);
      $rowE = $resultE->num_rows;
      $rowE = mysqli_fetch_array($resultE);
      if( $rowE['procedenciaPago'] == 1 || $rowE['procedenciaPago'] == 2){
        continue;
      }
      $num ++;
      /*- busqueda de unidades de creditos por estudiantes-*/
      $giveMatter = "";
      $array = array();
      $arrayUC = array();
      $totalUC = 0;

      if ($row['materia1'] != null) {
        $giveMatter = matter($row['materia1'], $row['seccion1']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia2'] != null) {
        $giveMatter = matter($row['materia2'], $row['seccion2']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia3'] != null) {
        $giveMatter = matter($row['materia3'], $row['seccion3']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia4'] != null) {
        $giveMatter = matter($row['materia4'], $row['seccion4']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia5'] != null) {
        $giveMatter = matter($row['materia5'], $row['seccion5']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia6'] != null) {
        $giveMatter = matter($row['materia6'], $row['seccion6']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia7'] != null) {
        $giveMatter = matter($row['materia7'], $row['seccion7']);
        array_push($array, $giveMatter["Credit"]);
      }
      if ($row['materia8'] != null) {
        $giveMatter = matter($row['materia8'], $row['seccion8']);
        array_push($array, $giveMatter["Credit"]);
      }
      $totalUC = array_sum($array);
      $StotalUC +=$totalUC;
      array_push($arrayUC, $totalUC);
      $sqlE = "SELECT * FROM estudiantes WHERE cedula=" . $row['cedula'];
      $resultE = $connect->query($sqlE);
      $rowE = $resultE->num_rows;
      $rowE = mysqli_fetch_array($resultE);
      
      $pdf .= "<tr>";
      $pdf .= "<td class='text-center'>" . $num . "</td>";
      $pdf .= "<td class='text-center'>" . $row['cedula'] . "</td>";
      $pdf .= "<td class='text-center'>" . $rowE['nombres'] . "</td>";
      $sqlP = "SELECT * FROM procedencia WHERE id=" . $rowE['procedenciaPago'];
      $resultP = $connect->query($sqlP);
      $rowP = $resultP->num_rows;
      $rowP = mysqli_fetch_array($resultP);
      $precedent = $rowP['procedencia'];
      $pdf .= "<td class='text-center'>" . $precedent . "</td>";
      $sqlC = "SELECT * FROM carrera WHERE codigo=" . $rowE['carrera'];
      $resultC = $connect->query($sqlC);
      $rowC = $resultP->num_rows;
      $rowC = mysqli_fetch_array($resultC);
      $career = $rowC['nombre'];
      $pdf .= "<td class='text-center'>" . $career . "</td>";
      $pdf .= "<td class='text-center'>" . $totalUC . "</td>";
      $pdf .= "</tr>";
      array_push($arrayUC, $totalUC);
      $StudentBefore = $row['cedula'];
    }
  }
  //$StotalUC = array_sum($arrayUC);
  $pdf .= "
            <tr>
              <td colspan='5' class='grand total'>TOTAL DE UNIDADES DE CRÉDITO:</td>
              <td colspan='1' class='grand total'>$StotalUC</td>
            </tr>
            <tr>
              <td colspan='7' class='grand total'><br></td>
            </tr>
          </tbody>
        </table>

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
