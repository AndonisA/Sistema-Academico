<!-- <!DOCTYPE html> -->
<html lang="es">
<?php
include("../../../SistemaEaD/model/php/head.php");
?>

<body class="bg-light">
	<?php
	include("../../../SistemaEaD/model/php/main.php");
	?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<h2 class="m1">Gestor de notas.</h2>
				</div>
				<!-- ****************************************************************************************** -->
				<ul class="nav nav-tabs">
					<li class="nav-item"><a href="#noteStuden" class="nav-link active" data-toggle="tab">Planilla de notas por estudiante</a></li>
					<li class="nav-item"><a href="#regMateria" class="nav-link" data-toggle="tab">Modificar notas</a></li>
				</ul>
				<!-- ****************************************************************************************** -->
				<div class="bg-white border tab-content rounded-bottom col-md-12 mb-3">
					
					<!-- ******************************************************************** -->
					<div class="tab-pane active" id="noteStuden">
						<h2 class="mt-1 mr-4">Planilla de notas por estudiante</h2>
						<hr>
						<form method='POST' class='md-form form-sm' id='planilla' enctype='multipart/form-data' autocomplete="off">
							<label class='mt-2'>Cedula del estudiante</label>
							<div class='input-group mb-3 justify-content-center'>
								<input type='text' class='buscarCedulaM form-control col-md-11 cedulaP' id='buscarNotaEstudiante'>
								<div class='input-group-append'>
									<button type='button' class='buscarLNB btn btn-outline-secondary btn-sm my-0'>Buscar</button>
								</div>
							</div>
							<small class='form-text text-muted'>Cedula del estudiante que desee obtener el corte de notas.</small>
							<label class='mt-2'>Cedula del estudiante</label>
							<input type="text" name="nombre" maxlength="25" id='cedulaLN' class="form-control md-2" readonly>
							<label class='mt-2'>Nombre del estudiante</label>
							<input type="text" name="nombre" maxlength="25" id='nombreLN' class="form-control md-2" readonly>
							<label class='mt-2'>Periodo</label>
							<input type='text' id='periodoPD' name='periodoPD' maxlength='45' class='form-control md-2' readonly>
							<small class='form-text text-muted'>Periodo la cual desee obtener la planilla. Hacer click en en la lista desplegable.</small>
							<div class='dropdown justify-content-center col-12'>
								<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
									Lista de periodo del estudiante
								</button>
								<div class='dropdown-menu insert-ul dropdown-menu-scroll form-check' id='payrollList'>
								</div>
							</div>

							<div class='input-group-append mx-auto justify-content-center m-4'>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarP'>Cancelar</button>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='AceptarP'>Aceptar</button>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="regMateria">
						<h2 class="mt-1 mr-4">Notas del estudiante</h2>
						<form method='POST' class='md-form form-sm' enctype='multipart/form-data' id='searchStudent' autocomplete="off">
							<div class='text-center'>
								<br>
								<label>Ingresar cédula del estudiante</label>
								<div class='input-group mb-3 justify-content-center'>
									<input type='text' class='form-control col-md-5 buscarCedulaN' placerholder='Cedula del estudiante' aria-label='Search' id='buscarCedula' name='buscarMateriaM'>
									<div class='input-group-append'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaMB'>Buscar</button>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<form method="post" class="md-form form-sm" enctype="multipart/form-data" id="updateNote" autocomplete="off">
							<div class="form-group">
								<label>Cedula</label>
								<input type="text" maxlength="10" class="cedula form-control md-2" readonly>
								<label>Correo</label>
								<input type="text" maxlength="10" class="correo form-control md-2" readonly>
								<label class="mt-2">Nombre del estudiante</label>
								<input type="text" maxlength="65" class="nombre form-control md-2" readonly>
								<label class="mt-2">Carrera</label>
								<input type="text" maxlength="10" class="carrera form-control md-2" readonly>
								<input type="text" maxlength="10" hidden class='carreraCodigo'>
								<label class='mt-2'>Periodo</label>
								<input type='text' id='periodoPD' name='periodoPD' maxlength='45' class='form-control md-2' readonly>
								<div class='dropdown justify-content-center col-12'>
									<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
										Lista de periodo del estudiante
									</button>
									<div class='dropdown-menu insert-ul dropdown-menu-scroll form-check' id='payrollListStudent'>
									</div>
									<small class="form-text text-muted">Periodo la cual se cursa la materia.</small>
								</div>

								<div class='row'>
									
									<div class='col'>
										<label class='col h6 text-center'>Asignaturas</label>
										<label class='mt-2'>Materia 1</label>
										<input type='text' id='m1ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 2</label>
										<input type='text' id='m2ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 3</label>
										<input type='text' id='m3ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 4</label>
										<input type='text' id='m4ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 5</label>
										<input type='text' id='m5ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 6</label>
										<input type='text' id='m6ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 7</label>
										<input type='text' id='m7ID' readonly maxlength='25' class='form-control md-2'>
										<label class='mt-2'>Materia 8</label>
										<input type='text' id='m8ID' readonly maxlength='25' class='form-control md-2'>
									</div>
									<div class='col'>
										<label class='col h6 text-center'>Primer Corte</label>
										<label class='mt-2'> <br></label>
										<input type='text' id='m1c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m2c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m3c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m4c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m5c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m6c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m7c1' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m8c1' readonly maxlength='2' class='form-control md-2'>
									</div>
									<div class='col'>
										<label class='col h6 text-center'>Segundo Corte</label>
										<label class='mt-2'> <br></label>
										<input type='text' id='m1c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m2c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m3c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m4c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m5c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m6c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m7c2' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m8c2' readonly maxlength='2' class='form-control md-2'>
									</div>
									<div class='col'>
										<label class='col h6 text-center'>Tercer Corte</label>
										<label class='mt-2'> <br></label>
										<input type='text' id='m1c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m2c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m3c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m4c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m5c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m6c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m7c3' readonly maxlength='2' class='form-control md-2'>
										<label class='mt-2'> <br></label>
										<input type='text' id='m8c3' readonly maxlength='2' class='form-control md-2'>
									</div>
								</div>

								<div class="input-group-append mx-auto justify-content-center m-4">
									<button type="button" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelarC">Cancelar</button>
									<button type="button" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="AceptarNS">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					
				</div>
<!-- ****************************************************************************************** -->
			</div>
		</section>
		<h3 class='position-fixed text-center textInfoProM text-white'></h3>
	</div>
	<?php
		include("../../../SistemaEaD/model/php/managerJS.php");
	?>
	<script src="../../../SistemaEaD/controller/js/sendNote.js"></script>
	<script src="../../../SistemaEaD/controller/js/getCarreraI.js"></script>
	<script src="../../../SistemaEaD/controller/js/getMateria.js"></script>
</body>

</html>