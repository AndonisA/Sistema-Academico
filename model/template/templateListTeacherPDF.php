<?php
  function plantilla(){
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
          <div class='h6'>LISTA DE PROFESORES</div>
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
              <th>N°</th>
              <th>CEDULA</th>
              <th>NOMBRE Y APELLIDO</th>
            </tr>
          </thead>
          <tbody>
            
              ";
              //SELECCIONAR * FROM miembros PEDIR POR date_of_birth ASC
              $num = 0;
              $sql ="SELECT * FROM profesores ORDER BY cedula ASC";
              $result = $connect->query($sql);
              $row = $result->num_rows;
              while(($row=mysqli_fetch_array($result))){
                $num++;
                $pdf .= "<tr>";
                $pdf .="<td class='text-center'>".$num."</td>";
                $pdf .="<td class='text-center'>".$row['cedula']."</td>";
                $pdf .="<td class='text-center'>".$row['nombres']."</td>";
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
